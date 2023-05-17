<?php

class PasajeroVip extends Pasajero{
    //int $nroViajeroRec, $cantMillas
    private $nroViajeroRec;
    private $cantMillas;

    public function __construct($nombre, $apellido, $nroAsiento, $nroTicket, $nroDocumento, $nroTelefono, $nroViajeroRec, $cantMillas)
    {
        parent::__construct($nombre, $apellido, $nroAsiento, $nroTicket, $nroDocumento, $nroTelefono);
        $this -> nroViajeroRec = $nroViajeroRec;
        $this -> cantMillas = $cantMillas;
    }

    public function getNroViajeroRec (){
        return $this -> nroViajeroRec;
    }

    public function getCantMillas (){
        return $this -> cantMillas;
    }

    public function setNroViajeroRec ($nroViajeroRec){
        $this -> nroViajeroRec = $nroViajeroRec;
    }

    public function setCantMillas ($cantMillas){
        $this -> cantMillas = $cantMillas;
    }

    /**
     * Metodo que permite calcular el porcentaje que debe adicionarse al precio como incremento
     * @return float
     */
    public function darPorcentajeIncremento(){
        $porcentaje = 0;
        if($this -> getCantMillas() > 300){
            $porcentaje = 0.3;
        } else {
            $porcentaje = 0.35;
        }
        return $porcentaje;
    }

    public function __toString()
    {
        return "Numero de Viajero Recurrente:".$this -> getNroViajeroRec(). "\nCantidad de millas:".$this -> getCantMillas(). "\n";
    }
}