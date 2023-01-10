<?php

/*
 * Acceso a datos con BD Usuarios : 
 * Usando la librería PDO *******************
 * Uso el Patrón Singleton :Un único objeto para la clase
 * Constructor privado, y métodos estáticos 
 */
class AccesoDatos
{

    private static $modelo = null;
    private $dbh = null;
    private $stmt1;
    private $stmt2;
    private $stmt3;

    public static function getModelo()
    {
        if (self::$modelo == null) {
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }



    // Constructor privado  Patron singleton

    private function __construct()
    {
        try {
            $dsn = "mysql:host=localhost;dbname=etienda;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión " . $e->getMessage();
            exit();
        }

        $this->stmt1 = $this->dbh->prepare("SELECT * FROM clientes WHERE nombre = ? AND clave = ?");
        $this->stmt2 = $this->dbh->prepare("SELECT * FROM pedidos WHERE cod_cliente = ?");
    }

    public function chequearUsuario(String $nombre, String $clave)
    {
        $this->stmt1->bindValue(1, $nombre);
        $this->stmt1->bindValue(2, $clave);

        $this->stmt1->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
        $this->stmt1->execute();

        $usuario = $this->stmt1->fetch();

        return $usuario;
    }

    public function obtenerListaPedidos($cod_cliente): array
    {
        $listapedidos = [];

        $this->stmt2->bindValue(1, $cod_cliente);
        $this->stmt2->setFetchMode(PDO::FETCH_CLASS, 'Pedido');
        $this->stmt2->execute();

        while ($pedido = $this->stmt2->fetch()) {
            $listapedidos[] = $pedido;
        }

        return $listapedidos;
    }
}
