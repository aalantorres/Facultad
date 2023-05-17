<?php
class Pasajero {
    //string $nombre, $apellido
    // int $nroAsiento, $nroTicket, $nroDocumento, $nroTelefono
    private $nombre;
    private $apellido;
    private $nroAsiento;
    private $nroTicket;
    private $nroDocumento;
    private $nroTelefono;

    public function __construct($nombre, $apellido, $nroAsiento, $nroTicket, $nroDocumento, $nroTelefono)
    {
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> nroDocumento = $nroDocumento;
        $this -> nroTelefono = $nroTelefono;
        $this -> nroAsiento = $nroAsiento;
        $this -> nroTicket = $nroTicket;
    }

    public function getNombre (){
        return $this -> nombre;
    }

    public function setNombre ($nombre){
        $this -> nombre = $nombre;
    }

    public function getApellido (){
        return $this -> apellido;
    }

    public function getNroTicket (){
        return $this -> nroTicket;
    }

    public function getNroAsiento (){
        return $this -> nroAsiento;
    }

    public function setApellido ($apellido){
        $this -> apellido = $apellido;
    }

    public function getNroDocumento (){
        return $this -> nroDocumento;
    }

    public function setNroDocumento ($nroDocumento){
        $this -> nroDocumento = $nroDocumento;
    }

    public function getNroTelefono (){
        return $this -> nroTelefono;
    }

    public function setNroTelefono ($nroTelefono){
        $this -> nroTelefono = $nroTelefono;
    }

    public function setNroTicket ($nroTicket){
        $this -> nroTicket = $nroTicket;
    }

    public function setNroAsiento ($nroAsiento){
        $this -> nroAsiento = $nroAsiento;
    }

    /**
     * Metodo que permite calcular el porcentaje que debe adicionarse al precio como incremento
     * @return float
     */
    public function darPorcentajeIncremento(){
        $porcentaje = 0.1;
        return $porcentaje;
    }
    public function __toString()
    {
        return "\nNombre:".$this -> getNombre()."\nApellido:".$this -> getApellido()."\nNro de documento:".$this -> getNroDocumento()."\nNro de telefono::".$this -> getNroTelefono().
        "\nNro de Asiento:".$this -> getNroAsiento(). "\nNro Ticket:".$this -> getNroTicket();
    }

}