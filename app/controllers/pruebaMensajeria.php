<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require 'messages.php';
    $messagesController = new MessagesController();
    // Ejemplo de envío de mensaje
    $mensajes = $messagesController->getMessages(8, 9);
    ?>
    <div style="width: 30%; margin: auto; border: 1px solid #ccc; padding: 10px; box-shadow: 2px 2px 12px #aaa; display: flex; flex-direction: column;">
    <?php
    foreach ($mensajes as $row) {
        $hora_db = new DateTime($row['send_on']);

        if($row['Sended']) {
            echo "<div style='text-align: right; background-color: #DCF8C6; margin: 10px; padding: 10px; border-radius: 10px; display: inline-block; max-width: 80%; margin-left:auto'>" . htmlspecialchars($row['message']) ."<span style='font-size: 0.6rem'> ".htmlspecialchars($hora_db->format('h:i A')) ."</span></div><br>";
        } else {
            echo "<div style='text-align: left; background-color: #e3e3e3ff; margin: 10px; padding: 10px; border-radius: 10px; display: inline-block; max-width: 80%; margin-right:auto'>" . htmlspecialchars($row['message']) . "<span style='font-size: 0.6rem'> ".htmlspecialchars($hora_db->format('h:i A')) ."</span></div><br>";
        }
    }
?>
    </div>
</body>
</html>
