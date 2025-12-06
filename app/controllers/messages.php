<?php

// Controlador para manejar los mensajes entre usuarios
require 'db_conexion.php';
class MessagesController {
    
    // Función para enviar un mensaje
    public function sendMessage($fromUserId, $toUserId, $messageContent) {
        // Aquí iría la lógica para guardar el mensaje en la base de datos
        global $mysqli;
        $stmt = $mysqli->prepare("INSERT INTO messages (id_user_from, id_user_to, message) VALUES (?, ?, ?)");
        if (!$stmt) {
            return "Error al preparar la consulta: " . $mysqli->error;
        }
        $stmt->bind_param("iis", $fromUserId, $toUserId, $messageContent);
        if (!$stmt->execute()) {
            $err = $stmt->error;
            $stmt->close();
            return "Error al enviar mensaje: " . $err;
        }
        $stmt->close();
        
        return "Mensaje enviado de usuario $fromUserId a usuario $toUserId: $messageContent";
    }
    
    // Función para obtener mensajes entre dos usuarios
    public function getMessages($userId1, $userId2) {
        // Aquí iría la lógica para obtener los mensajes de la base de datos
        global $mysqli;
        $messages = [];

        $stmt = $mysqli->prepare("CALL ver_mensajes(?, ?)");
        if (!$stmt) {
            // si falla la preparación, devolver array vacío o manejar error
            return $messages;
        }

        $stmt->bind_param("ii", $userId1, $userId2);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $messages[] = $row;
                }
                $result->free();
            } else {
                // En algunos entornos MySQLi no devuelve get_result() para procedimientos,
                // se podría usar bind_result/store_result aquí si fuese necesario.
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
        
        return $messages;
    }
}


?>