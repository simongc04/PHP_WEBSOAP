<?php
require_once 'config.php';

class CentroService {

    // Método principal para crear el centro
    public function crearCentro($request) {
        $idCentro = $request->ID_CENTRO;
        $nombreCentro = $request->NOMBRE_CENTRO;
        $urlPlataforma = $request->URL_PLATAFORMA;
        $urlSeguimiento = $request->URL_SEGUIMIENTO;
        $telefono = $request->TELEFONO;
        $email = $request->EMAIL;
        $origenCentro = $request->ORIGEN_CENTRO;
        $codigoCentro = $request->CODIGO_CENTRO;

        // Validación simple
        if (empty($idCentro) || empty($nombreCentro)) {
            return ['resultado' => 'Error: ID_CENTRO y NOMBRE_CENTRO son obligatorios.'];
        }

        // Ejemplo de lógica de negocio
        $resultado = "Centro '$nombreCentro' creado exitosamente con ID: $idCentro";

        // Registrar en el log
        $this->log("Crear Centro: $resultado");

        return ['resultado' => $resultado];
    }

    // Método para registrar logs
    private function log($message) {
        file_put_contents(LOG_FILE, date('Y-m-d H:i:s') . " - $message\n", FILE_APPEND);
    }
}
?>
