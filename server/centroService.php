<?php
require_once 'config.php';
require_once 'AuthMiddleware.php';

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

        try {
            // Validación de parámetros
            if (empty($request->ID_CENTRO) || empty($request->NOMBRE_CENTRO)) {
                return $this->response(2, "Error en parámetro: ID_CENTRO y NOMBRE_CENTRO son obligatorios.");
            }

        
            $existe = $this->verificarExistencia($request->ID_CENTRO);

            if ($existe) {
                return $this->response(1, "Centro con acciones existentes.");
            }

            
            $resultado = "Centro '{$request->NOMBRE_CENTRO}' creado exitosamente con ID: {$request->ID_CENTRO}";
            
            // Registro de log
            $this->log("Crear Centro: $resultado");

            return $this->response(0, $resultado);

        } catch (Exception $e) {
            // Error inesperado
            $this->log("Error inesperado: " . $e->getMessage());
            return $this->response(-1, "Error inesperado.");
        }
    }

    //(Pendiente)
    // Método para verificar existencia del centro
    private function verificarExistencia($idCentro) {
        // Aquí iría la lógica para verificar si el centro ya existe (ej. base de datos)
        // Retorna true si existe, false si no existe
        return false;  // Asumimos que no existe para este ejemplo
    }

    // Método para estandarizar respuestas
    private function response($codigo, $mensaje) {
        return [
            'codigo' => $codigo,
            'mensaje' => $mensaje
        ];
    }

    // Método para registrar logs
    private function log($message) {
        file_put_contents(LOG_FILE, date('Y-m-d H:i:s') . " - $message\n", FILE_APPEND);
    }
}
?>
