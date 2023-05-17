<?php

class PasajeroNecEsp extends Pasajero {
    //string $comidaEsp, $asistencia
    private $comidaEsp;
    private $asistencia;

    public function __construct($nombre, $apellido, $nroAsiento, $nroTicket, $nroDocumento, $nroTelefono, $comidaEsp, $asistencia)
    {
        parent::__construct($nombre, $apellido, $nroAsiento, $nroTicket, $nroDocumento, $nroTelefono);
        $this -> comidaEsp = $comidaEsp;
        $this -> asistencia = $asistencia;
    }

    public function getComidaEsp (){
        return $this -> comidaEsp;
    }

    public function getAsistencia (){
        return $this -> asistencia;
    }

    public function setComidaEsp ($comidaEsp){
        $this -> comidaEsp = $comidaEsp;
    }

    public function setAsistencia ($asistencia){
        $this -> asistencia = $asistencia;
    }

    /**
     * Metodo que permite calcular el porcentaje que debe adicionarse al precio como incremento
     * @return float
     */
    public function darPorcentajeIncremento(){
        $porcentaje = 0;
        if($this -> getComidaEsp() == "si"&& $this -> getAsistencia() == "si"){
            $porcentaje = 0.3;
        } else {
            $porcentaje = 0.15;
        }
        return $porcentaje;
    }

    public function __toString()
    {
        return "Comida especial:".$this -> getComidaEsp(). "\nAsistencia:".$this-> getAsistencia(). "\n";
    }
}