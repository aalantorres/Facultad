<?php
include_once ("viajeFeliz.php");
include_once ("pasajero.php");
include_once ("responsableV.php");
include_once ("pasajeroVip.php");
include_once ("pasajeroNecEsp.php");
/* Nombre:Alan 
   Apellido:Torres Rosas 
   Legajo:FAI-2835 */

/**
 * Muestra un menu de opciones por pantalla
 */
function menu (){
    echo"\n------------- Menu VIAJE FELIZ -------------\n";
    echo"1)  Cargar informacion de viaje\n";
    echo"2)  Modificar destino\n";
    echo"3)  Modificar cantidad maxima de pasajeros\n";
    echo"4)  Modificar codigo de viaje\n";
    echo"5)  Modificar datos de pasajero\n";
    echo"6)  Agregar pasajero\n";
    echo"7)  Agregar responsable de viaje\n";
    echo"8)  Borrar pasajero\n";
    echo"9)  Ver datos de viaje\n";
    echo"10) Ver datos de los pasajeros\n";
    echo"11) Vender Pasaje\n";
    echo"12) Salir\n";
    echo"--------------------------------------------\n";

}
/**
 * Carga los datos de viaje, retornando el objeto con su codigo de viaje, destino, cantidad maxima de pasajeros y si es un viaje de ida y vuelta
 * @return object
 */
function cargarDatosViaje(){
    echo"--------------- DATOS DE VIAJE ---------------\n";
    echo"Ingrese el codigo de viaje:";
    $codViaje = trim(fgets(STDIN));
    echo"Ingrese el nombre de destino:";
    $destino = trim(fgets(STDIN));
    echo"Ingrese la cantidad maxima de pasajeros:";
    $cantidadMax = trim(fgets(STDIN));
    $costoPasajero = 0;
    echo "Ingrese el precio del viaje:";
    $costo = trim(fgets(STDIN));
    return new Viaje($codViaje, $destino, $cantidadMax, $costoPasajero, $costo);
}

/**
 * Permite el ingreso de los datos de un pasajero, devolviendo un array con su nombre, apellido y numero de documento
 * @return object
 */
function cargarPasajero(){
    echo"Ingrese el nombre del pasajero:";
    $nombre = trim(fgets(STDIN));
    echo"Ingrese el apellido del pasajero:";
    $apellido = trim(fgets(STDIN));
    echo"Ingrese el DNI del pasajero:";
    $nroDocumento = trim(fgets(STDIN));
    echo"Ingrese el telefono del pasajero:";
    $nroTelefono = trim(fgets(STDIN));
    echo"Ingrese el numero de asiento del pasajero:";
    $nroAsiento = trim(fgets(STDIN));
    echo"Ingrese el numero de ticket del pasajero:";
    $nroTicket = trim(fgets(STDIN));
    echo "1) pasajero regular\n2) pasajero VIP\n3) pasajero con necesidades especiales\n";
    $opcion = trim(fgets(STDIN));
    if($opcion == 1){
        $pasajero = new Pasajero($nombre, $apellido, $nroAsiento, $nroTicket, $nroDocumento, $nroTelefono);
    } else if ($opcion == 2){
        echo"Ingrese el numero de viajero recurrente:";
        $nroViajero = trim(fgets(STDIN));
        echo"Ingrese el numero de millas:";
        $nroMillas = trim(fgets(STDIN));
        $pasajero = new PasajeroVip($nombre, $apellido, $nroAsiento, $nroTicket, $nroDocumento, $nroTelefono,$nroViajero, $nroMillas);
    }else {
        echo"Ingrese  'si' si necesita comida especial:";
        $comidaEsp = trim(fgets(STDIN));
        echo"Ingrese 'si' si necesita asistencia:";
        $asistencia = trim(fgets(STDIN));
        $pasajero = new PasajeroNecEsp($nombre, $apellido, $nroAsiento, $nroTicket, $nroDocumento, $nroTelefono, $comidaEsp, $asistencia);
    }
    return $pasajero;
}

//Inicializacion de variables
$datosViaje = cargarDatosViaje();
$opcion = 0;

//Menu de opciones
while($opcion != 12){
    menu();
    $opcion = trim(fgets(STDIN));
    switch($opcion){
        case 1: //Carga los datos de viaje
            $datosViaje = cargarDatosViaje();
            break;
        case 2:  //Modifica el destino del viaje
            echo"El destino actual es:".$datosViaje -> getnombreDestino();
            echo"\nIngrese el nuevo destino:";
            $nvoDestino = trim(fgets(STDIN));
            $datosViaje -> setnombreDestino($nvoDestino);
            echo"--------------------------------------------\n";
            echo"         El destino nuevo es:".$datosViaje -> getnombreDestino(). "\n";
            echo"--------------------------------------------\n";
            break;
        case 3: //Modifica la cantidad maxima de pasajeros
            echo"La cantidad maxima de pasajeros es:".$datosViaje -> getCantMaxPasajeros();
            echo"\nIngrese la nueva capacidad maxima de pasajeros:";
            $nvoCantMax = trim(fgets(STDIN));
            $datosViaje -> setCantMaxPasajeros($nvoCantMax);
            echo"--------------------------------------------\n";
            echo"La capacidad maxima de pasajeros ahora es de:".$datosViaje -> getCantMaxPasajeros()."\n";
            echo"--------------------------------------------\n";
            break;
        case 4: //Modifica el codigo de destino
            echo"El codigo de viaje actual es:".$datosViaje -> getCodigoViaje();
            echo"\nIngrese el nuevo codigo de viaje:";
            $nvoCodViaje = trim(fgets(STDIN));
            $datosViaje -> setCodigoViaje($nvoCodViaje);
            echo"--------------------------------------------\n";
            echo"       El codigo de viaje nuevo es:".$datosViaje -> getCodigoViaje(). "\n";
            echo"--------------------------------------------\n";
            break;
        case 5: //Modifica los datos de un pasajero
            echo"Ingrese el dni del pasajero a modificar:\n";
            $dniPasajero = trim(fgets(STDIN));
            if($datosViaje -> existenDatos($dniPasajero)){
                echo"DATOS NUEVOS:\n";
                $pasajeroNvo = cargarPasajero();
                $datosViaje -> modifDatosPasajero($dniPasajero, $pasajeroNvo);
                echo"--------------------------------------------\n";
                echo" Los datos del pasajero fueron cambiados\n";
                echo"--------------------------------------------\n";
            } else {
                echo"--------------------------------------------\n";
                echo" Los datos no coinciden con ningun pasajero\n";
                echo"--------------------------------------------\n";
            }
            break;
        case 6: //Agrega un pasajero 
            $pasajero = cargarPasajero();
            $dniPasajero = $pasajero -> getNroDocumento();
            if($datosViaje -> hayEspacioDisp()){
                if(!($datosViaje -> existenDatos($dniPasajero))){ // Verifica que no exista un pasajero con los datos ingresados
                    $datosViaje -> agregarPasajero($pasajero);
                    echo"--------------------------------------------\n";
                    echo"   El pasajero fue agregado exitosamente\n";
                    echo"--------------------------------------------\n";
                } else {
                    echo"--------------------------------------------\n";
                    echo"          El pasajero ya existe\n";
                    echo"--------------------------------------------\n";
                }
            } else {
                echo"--------------------------------------------\n";
                echo"        No hay espacio disponible\n";
                echo"--------------------------------------------\n";
            }
            break;
        case 7: //Agrega los datos del responsable de viaje
            echo"DATOS DEL RESPONSABLE DE VIAJE:\n";
            echo"Ingrese el numero de empleado:";
            $nroEmpleado = trim(fgets(STDIN));
            echo"Ingrese el numero de licencia:";
            $nroLicencia = trim(fgets(STDIN));
            echo"Ingrese el nombre del responsable:";
            $nombre = trim(fgets(STDIN));
            echo"Ingrese el apellido del responsable:";
            $apellido = trim(fgets(STDIN));
            $objResponsable = new ResponsableV($nroEmpleado, $nroLicencia, $nombre, $apellido);
            $datosViaje -> setResponsableV($objResponsable);
            echo"\nEl responsable del viaje ahora es:\n";
            echo $objResponsable;
            break;
        case 8: //Elimina los datos de un pasajero
            echo"DNI DEL PASAJERO A ELIMINAR:\n";
            $dniPasajero = trim(fgets(STDIN));
            if($datosViaje -> existenDatos($dniPasajero)){
                $datosViaje -> borrarPasajero($dniPasajero);
                echo"--------------------------------------------\n";
                echo"      Pasajero borrado correctamente\n";
                echo"--------------------------------------------\n";                
            } else {
                echo"--------------------------------------------\n";
                echo"Los datos no coinciden con ningun pasajero\n";
                echo"--------------------------------------------\n";
            }
            break;
            break;
        case 9: //Permite ver los datos del viaje
            echo $datosViaje;
            break;
        case 10://Permite ver los datos de los pasajeros
            foreach($datosViaje -> getPasajeros() as $indice => $valor){
                $nombre = $valor -> getNombre();
                $apellido = $valor -> getApellido();
                $nroDocumento = $valor -> getNroDocumento();
                $nroTelefono = $valor -> getNroTelefono();
                $nroPasajero = $indice + 1;
                echo"Pasajero ".$nroPasajero. "\nNombre:".$nombre."\nApellido:".$apellido."\nNumero de documento:".$nroDocumento."\nNumero de telefono:".$nroTelefono;
                echo"\n--------------------------------------------\n";
            }
            break; 
        case 11://Realiza la venta de un viaje si es posible
            $pasajero = cargarPasajero();
            $dniPasajero = $pasajero -> getNroDocumento();
            if($datosViaje -> hayEspacioDisp()){
                if(!($datosViaje -> existenDatos($dniPasajero))){ // Verifica que no exista un pasajero con los datos ingresados
                    $precioViaje = $datosViaje -> venderPasaje($pasajero);
                    echo"----------------------------------------------------------------------------------------\n";
                    echo"   El pasajero fue agregado exitosamente, el precio de venta fue de: $".$precioViaje."\n";
                    echo"----------------------------------------------------------------------------------------\n";
                } else {
                    echo"--------------------------------------------\n";
                    echo"          El pasajero ya existe\n";
                    echo"--------------------------------------------\n";
                }
            } else {
                echo"--------------------------------------------\n";
                echo"        No hay espacio disponible\n";
                echo"--------------------------------------------\n";
            }
            break;
    }
    
}
echo"\n ----------- PROGRAMA FINALIZADO -----------";
