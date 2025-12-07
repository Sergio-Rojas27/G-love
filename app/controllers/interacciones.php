<?php
class InteraccionesController {
    public function getInteractions($userId) {
        require 'db_conexion.php';
        $likes = [];

        $stmt = $mysqli->prepare("CALL obtenerLikesHaciaPersona(?)");
        if (!$stmt) {
            return $likes;
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $likes[] = $row;
                }
                $result->free();
            } else {
                // Manejar error en la obtención de resultados
                return $likes;
            }
        }
        $stmt->close();

        // Consumir posibles resultados adicionales del procedimiento almacenado
        while ($mysqli->more_results() && $mysqli->next_result()) {
            $extra = $mysqli->use_result();
            if ($extra) {
                $extra->free();
            }
        }
        
        return $likes;
    }
}
?>