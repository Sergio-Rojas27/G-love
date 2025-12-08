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
    public function getPictures($userId) {
        require 'db_conexion.php';
        $pictures = [];

        $stmt = $mysqli->prepare("select photo_route from users_photos where id_user= ? and isProfile <> 1;");
        if (!$stmt) {
            return $pictures;
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $pictures[] = $row;
                }
                $result->free();
            } else {
                // Manejar error en la obtención de resultados
                return $pictures;
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
        
        return $pictures;
        }
    

    public function getProfilePic($userId) {
        require 'db_conexion.php';
        $profilePic = null;

        $stmt = $mysqli->prepare("select photo_route from users_photos where id_user= ? AND isProfile = 1;");
        if (!$stmt) {
            return $profilePic;
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result && $row = $result->fetch_assoc()) {
                $profilePic = $row['photo_route'];
                $result->free();
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
        return $profilePic;
    }
}
?>