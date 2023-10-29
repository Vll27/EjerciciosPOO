<?php

class Camion {
    private $numeroEjes;
    private $tonelaje;

    public function __construct($numeroEjes, $tonelaje) {
        $this->numeroEjes = $numeroEjes;
        $this->tonelaje = $tonelaje;
    }

    public function calcularPeaje() {
        $precioPorEje = 5;
        $precioPorTonelada = 10;
        $peaje = ($this->numeroEjes * $precioPorEje) + ($this->tonelaje * $precioPorTonelada);
        return $peaje;
    }
}

class CabinaDePeaje {
    private $totalRecaudado = 0;
    private $totalCamionesPasados = 0;

    public function recibirCamion(Camion $camion) {
        $peaje = $camion->calcularPeaje();
        $this->totalRecaudado += $peaje;
        $this->totalCamionesPasados++;
        $this->emitirRecibo($peaje);
    }

    private function emitirRecibo($peaje) {
        // Implementar la lógica para emitir un recibo
        echo "Recibo de peaje: Importe a pagar: $peaje córdobas\n";
    }

    public function mostrarEstadisticas() {
        echo "Total recaudado: {$this->totalRecaudado} córdobas\n";
        echo "Total de camiones que han pasado: {$this->totalCamionesPasados}\n";
    }
}

?>
