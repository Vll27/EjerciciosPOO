<?php

// Interfaz CapacidadLimite

interface CapacidadLimite {
    const LIMITE_PASAJEROS_AUTOMOVIL = 5;
    const LIMITE_PASAJEROS_FURGONETA = 9;
    const LIMITE_PASAJEROS_CAMION = 3;
}

// Clase VehiculoMotorizado (Clase padre)

class VehiculoMotorizado {
    protected $fabricante;
    protected $modelo;
    protected $anioFabricacion;
    protected $kilometraje;

    public function __construct($fabricante, $modelo, $anioFabricacion, $kilometraje) {
        $this->fabricante = $fabricante;
        $this->modelo = $modelo;
        $this->anioFabricacion = $anioFabricacion;
        $this->kilometraje = $kilometraje;
    }

    public function __toString() {
        return "Fabricante: $this->fabricante\nModelo: $this->modelo\nAño de Fabricación: $this->anioFabricacion\nKilometraje: $this->kilometraje";
    }
}

// Clase Motocicleta (Clase hija de VehiculoMotorizado)

class Motocicleta extends VehiculoMotorizado {
    protected $uso;

    public function __construct($fabricante, $modelo, $anioFabricacion, $kilometraje, $uso) {
        parent::__construct($fabricante, $modelo, $anioFabricacion, $kilometraje);
        $this->uso = $uso;
    }

    public function __toString() {
        return parent::__toString() . "\nTipo de Uso: $this->uso";
    }
}

// Clase Automovil (Clase hija de VehiculoMotorizado)

class Automovil extends VehiculoMotorizado implements CapacidadLimite {
    protected $estilo;

    public function __construct($fabricante, $modelo, $anioFabricacion, $kilometraje, $estilo) {
        parent::__construct($fabricante, $modelo, $anioFabricacion, $kilometraje);
        $this->estilo = $estilo;
    }

    public function __toString() {
        return parent::__toString() . "\nEstilo: $this->estilo\nLímite de Pasajeros: " . self::LIMITE_PASAJEROS_AUTOMOVIL;
    }
}

// Clase Camion (Clase hija de VehiculoMotorizado)

class Camion extends VehiculoMotorizado implements CapacidadLimite {
    protected $numeroRemolques;
    protected $seguridad;

    public function __construct($fabricante, $modelo, $anioFabricacion, $kilometraje, $numeroRemolques, $seguridad) {
        parent::__construct($fabricante, $modelo, $anioFabricacion, $kilometraje);
        $this->numeroRemolques = $numeroRemolques;
        $this->seguridad = $seguridad;
    }

    public function __toString() {
        return parent::__toString() . "\nNúmero de Remolques: $this->numeroRemolques\nNivel de Seguridad: $this->seguridad\nLímite de Pasajeros: " . self::LIMITE_PASAJEROS_CAMION;
    }
}


echo "¿Qué tipo de vehículo desea crear? (1: Motocicleta, 2: Automóvil, 3: Camión): ";
$opcion = intval(readline());

switch ($opcion) {
    case 1:
        $vehiculo = new Motocicleta("Genesis", "Sportster", 2020, 5000, "Recreativo");
        break;
    case 2:
        $vehiculo = new Automovil("Toyota", "Camry", 2022, 20000, "Sedán");
        break;
    case 3:
        $vehiculo = new Camion("Volvo", "VNL", 2018, 100000, 2, "Alto");
        break;
    default:
        echo "Opción no válida.";
        exit;
}

echo "Información del Vehículo:\n";
echo $vehiculo;

?>



