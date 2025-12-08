<?php

// Controlador para manejar los mensajes entre usuarios
require 'db_conexion.php';
class MessagesController {
    
    // Función para enviar un mensaje
    public function sendMessage($fromUserId, $toUserId, $messageContent) {
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
        require 'db_conexion.php';
        $messages = [];

        $stmt = $mysqli->prepare("CALL ver_mensajes(?, ?)");
        if (!$stmt) {
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
                // Manejar error en la obtención de resultados
                return $messages;
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
    public function getChats($userId) {
        require 'db_conexion.php';
        $chats = [];

        $stmt = $mysqli->prepare("CALL ObtenerChatsRecientes(?)");
        if (!$stmt) {
            return $chats;
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $chats[] = $row;
                }
                $result->free();
            } else {
                // Manejar error en la obtención de resultados
                return $chats;
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
        
        return $chats;
    }
}


?>