<?php
include_once "Cliente.php";
include_once "Vehiculo.php";

class AccesoDatos
{

    private static $modelo = null;
    private $dbh = null;
    private $stmt_clientes;
    private $stmt_vehiculo;
    private $stmt_updateVehiculo;
    private $stmt_updateCliente;

    public static function getModelo()
    {
        if (self::$modelo == null) {
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }

    private function __construct()
    {
        try {
            $dsn = "mysql:host=localhost;dbname=mycardb;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión " . $e->getMessage();
            exit();
        }

        $this->stmt_clientes = $this->dbh->prepare("SELECT * FROM clientes WHERE cod_cli = ? AND clave = ?");
        $this->stmt_vehiculo = $this->dbh->prepare("SELECT * from vehiculos WHERE localidad = ?  AND bateria > 0 and estado = 0 ORDER BY bateria DESC LIMIT 1");
        $this->stmt_updateCliente = $this->dbh->prepare("UPDATE clientes SET cod_car = ? WHERE cod_cli = ?");
        $this->stmt_updateVehiculo = $this->dbh->prepare("UPDATE vehiculos SET estado = 1 WHERE cod_car = ?");
    }

    public static function closeModelo()
    {
        if (self::$modelo != null) {
            $obj = self::$modelo;
            $obj->dbh = null;
            self::$modelo = null;
        }
    }

    public function getCliente($codigo, $clave)
    {
        $cli = null;

        $this->stmt_clientes->bindValue(1, $codigo);
        $this->stmt_clientes->bindValue(2, $clave);

        if ($this->stmt_clientes->execute()) {
            if ($obj = $this->stmt_clientes->fetch()) {
                $cli = $obj;
            }
        }

        return $cli;
    }

    public function getVehiculo($localidad)
    {
        $vehi = null;

        $this->stmt_vehiculo->bindValue(1, $localidad);


        if ($this->stmt_clientes->execute()) {
            if ($obj = $this->stmt_clientes->fetch()) {
                $vehi = $obj;
            }
        }

        return $vehi;
    }

    public function anotarVehiculoACliente(Vehiculo $vehiculo, Cliente $cliente)
    {
        $this->stmt_updateVehiculo->bindValue(1, $vehiculo->cod_car);
        $this->stmt_updateVehiculo->execute();
        $this->stmt_updateCliente->bindValue(1, $cliente->cod_car);
        $this->stmt_updateCliente->bindValue(2, $cliente->cod_cli);
    }

    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
}
