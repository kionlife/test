<?php

include 'core/core.php';

$receipt = new receipt($db);
if($_POST) {
    $update_data = $_POST;
} else {
    $update_data = NULL;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
</head>
<body>
    <?php
    $action = $receipt->actions($uploadDir, $_GET['type'], $update_data);
    if ($action != '1') {
    $action->data_seek(0);
    echo '<table id="receipt" border="2"><tr><td>ID</td>
                     <td>Номер</td>
                     <td>Дата</td>
                     <td>Номер отслеживания</td>
                     <td>Статус</td>
                     <td>Файл чека</td>
                     <td>ID подписки</td>
                     <td>ID подписчика</td></tr>';
    while ($row = $action->fetch_assoc()) {
      echo '<tr><td>' . $row['id'] . '</td>
                <td data-id="' . $row['id'] . '" class="edit number">' . $row['number'] . '</td>
                <td data-id="' . $row['id'] . '" class="edit date">' . $row['date'] . '</td>
                <td data-id="' . $row['id'] . '" class="edit track_number">' . $row['track_number'] . '</td>
                <td data-id="' . $row['id'] . '" class="edit status">' . $row['status'] . '</td>
                <td><a href="/uploads/' . $row['doc'] . '" target="_blank">Посмотреть</a></td>
                <td data-id="' . $row['id'] . '" class="edit subscription_id">' . $row['subscription_id'] . '</td>
                <td data-id="' . $row['id'] . '" class="edit subscriber_id">' . $row['subscriber_id'] . '</td></tr>';
    }
    echo '</table>';
}
    ?>   
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

    <script src="/js/main.js"></script> 
</body>
</html>