<?php
require_once 'config.php';

class MoodleClient {
    private $host;
    private $apiRest;
    private $token;

    public function __construct() {
        $this->host = MOODLE_HOST;
        $this->apiRest = MOODLE_API_REST;
        $this->token = MOODLE_TOKEN;
    }

    /**
     * Método genérico para hacer solicitudes a la API REST de Moodle
     */
    private function callMoodleAPI($function, $params) {
        $params['wstoken'] = $this->token;
        $params['wsfunction'] = $function;
        $params['moodlewsrestformat'] = 'json';

        $url = $this->host . $this->apiRest . '?' . http_build_query($params);

        $response = file_get_contents($url);

        if ($response === false) {
            return ['codigo' => -2, 'mensaje' => 'WS no disponible.'];
        }

        $data = json_decode($response, true);

        if (isset($data['exception'])) {
            return ['codigo' => -1, 'mensaje' => 'Error inesperado: ' . $data['message']];
        }
        print($data['message']);
        return $data;
    }

    
    public function obtenerUsuarioPorId($userId) {
        $params = [
            'field' => 'id',
            'values[0]' => $userId
        ];

        return $this->callMoodleAPI('core_user_get_users_by_field', $params);
    }
}
?>
