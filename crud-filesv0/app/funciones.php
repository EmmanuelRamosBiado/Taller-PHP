<?php
include_once 'app/config.php';

// Cargo los datos segun el formato de configuración
function cargarDatos(){
    $funcion =__FUNCTION__.TIPO; // cargarDatostxt
    return $funcion();
}

function volcarDatos($valores){
    $funcion =__FUNCTION__.TIPO;
    $funcion($valores);
}

// ----------------------------------------------------
// FICHERO DE TEXT 
//Carga los datos de un fichero de texto
function cargarDatostxt(){
    // Si no existe lo creo
    $tabla=[]; 
    if (!is_readable(FILEUSER) ){
        // El directorio donde se crea tiene que tener permisos adecuados
        $fich = @fopen(FILEUSER,"w") or die ("Error al crear el fichero.");
        fclose($fich);
    }
    $fich = @fopen(FILEUSER, 'r') or die("ERROR al abrir fichero de usuarios"); // abrimos el fichero para lectura
    
    while ($linea = fgets($fich)) {
        $partes = explode('|', trim($linea));
        // Escribimos la correspondiente fila en tabla
        $tabla[]= [ $partes[0],$partes[1],$partes[2],$partes[3]];
    }
    fclose($fich);
    return $tabla;
}

//Vuelca los datos a un fichero de texto
function volcarDatostxt($tvalores){
    $fichero = @fopen(FILEUSER, "w");

    if($fichero===false){
        die("Error al volcar los datos");
    }

    foreach($tvalores as $usuario){
        $linea = implode("|", $usuario)."\n";
        fwrite($fichero, $linea);
    }

    fclose($fichero);
}

// ----------------------------------------------------
// FICHERO DE CSV

function cargarDatoscsv (){
    $tabla=[];

    if (!is_readable(FILEUSER) ){
        // El directorio donde se crea tiene que tener permisos adecuados
        $fich = @fopen(FILEUSER,"w") or die ("Error al crear el fichero.");
        fclose($fich);
    }

    $fich = @fopen(FILEUSER, 'r') or die("ERROR al abrir fichero de usuarios");

    while ($linea = fgetcsv($fich)) {
        $tabla[]= [ $linea[0],$linea[1],$linea[2],$linea[3]];
    }

    fclose($fich);

    return $tabla;
}

//Vuelca los datos a un fichero de csv
function volcarDatoscsv($tvalores){
    $fichero = @fopen(FILEUSER, "w");

    foreach($tvalores as $usuario){
        fputcsv($fichero, $usuario);
    }

    fclose($fichero);
}

// ----------------------------------------------------
// FICHERO DE JSON
function cargarDatosjson (){
    $tabla=[];
    $datosjson = @file_get_contents(FILEUSER) or die("ERROR al abrir fichero de usuarios");
    $tabla = json_decode($datosjson, true);   
    return $tabla;
}

function volcarDatosjson($tvalores){
    $datosjson=json_encode($tvalores);
    @file_put_contents(FILEUSER, $datosjson);
   
    
}




// MOSTRA LOS DATOS DE LA TABLA DE ALMACENADA EN AL SESSION 
function mostrarDatos (){
    
    $titulos = [ "Nombre","login","Password","Comentario"];
    $msg = "<table>\n";
     // Identificador de la tabla
    $msg .= "<tr>";
    for ($j=0; $j < CAMPOSVISIBLES; $j++){
        $msg .= "<th>$titulos[$j]</th>";
    }  
    $msg .= "</tr>";
    $auto = $_SERVER['PHP_SELF'];
    $id=0;
    $nusuarios = count($_SESSION['tuser']);
    for($id=0; $id< $nusuarios ; $id++){
        $msg .= "<tr>";
        $datosusuario = $_SESSION['tuser'][$id];
        for ($j=0; $j < CAMPOSVISIBLES; $j++){
            $msg .= "<td>$datosusuario[$j]</td>";
        }
        $msg .="<td><a href=\"#\" onclick=\"confirmarBorrar('$datosusuario[0]',$id);\" >Borrar</a></td>\n";
        $msg .="<td><a href=\"".$auto."?orden=Modificar&id=$id\">Modificar</a></td>\n";
        $msg .="<td><a href=\"".$auto."?orden=Detalles&id=$id\" >Detalles</a></td>\n";
        $msg .="</tr>\n";
        
    }
    $msg .= "</table>";
   
    return $msg;    
}

/*
 *  Funciones para limpiar la entreda de posibles inyecciones
 */


// Función para limpiar todos elementos de un array
function limpiarArrayEntrada(array &$entrada){
    // Sin implementar
    foreach($entrada as $linea){
    htmlspecialchars($linea);
    }
}

function checkCSRF(){
    if ( !isset($_REQUEST['token']) || 
         $_REQUEST['token'] != $_SESSION['token']){
          exit(); // Termina sin dar nada de información
         }
  }

