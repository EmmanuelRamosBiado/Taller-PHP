<?php

class Vehiculo{

    private $cod_car;
    private $localidad;
    private $estado;
    private $bateria;

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