<?php
require_once 'config.php';

class AuthMiddleware {

    
    public static function verifyToken($token) {
        if (empty($token)) {
            return ['codigo' => 2, 'mensaje' => 'Error en parámetro: Token no proporcionado.'];
        }

        if ($token !== ADMIN_TOKEN) {
            return ['codigo' => -1, 'mensaje' => 'Error de autenticación: Token inválido o no autorizado.'];
        }

        return true;
    }
}
?>
