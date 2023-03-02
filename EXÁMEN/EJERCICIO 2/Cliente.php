<?php
class Cliente{

    private $cod_cli;
    private $nombre;
    private $clave;
    private $cod_car;

    function __set($name, $value)
   {
    if ( property_exists($this,$name)){
        $this->$name = $value;
    }
   }

   function &__get($name)
   {
       if ( property_exists($this,$name)){
           return $this->$name;
       }
   }

}