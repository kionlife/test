<?php 

include 'config.php';

class receipt {
  public $connect;
 
  function __construct($db) {
    $connect = new mysqli($db['server'], $db['username'], $db['password'], $db['db']);
    $connect->set_charset("utf8");
    $this->connect = $connect;
  }

  function actions($dir, $type, $update_data) {

    switch($type) {
      case 'add':
        $files = array_values(array_diff(scandir($dir), array('..', '.')));
        $count = count($files);
        $new = 0;
        for ($i = 0; $i < $count; $i++) {
          $check = $this->connect->query("SELECT id FROM receipt WHERE doc = '$files[$i]'");
          $row = $check->fetch_assoc();
          if ($row == NULL) {
            $this->connect->query("INSERT INTO receipt (status, doc) VALUES ('Новый', '$files[$i]')");
            $new++;
          }
        }
        echo 'Добавлено новых: ' . $new;
        return '1';
          break;
      case 'list':
        $list = $this->connect->query("SELECT * FROM receipt");
        return $list;  
      break;
      case 'update':
        $id = $update_data['id'];
        $field = $update_data['field'];
        $value = $update_data['value'];
        $this->connect->query("UPDATE receipt SET $field = $value WHERE id = $id");
        return '1';
      break;
      case 'report':
        return '2';
      break;
  }

    
  }

  function getSubs($date) {
    $field = $this->connect->query("SELECT * FROM subscription WHERE date = '$date'");
    $count = $field->num_rows;
    if ($count > 0) {
        while ($row = $field->fetch_assoc()) {
        $data[] = 'ID: ' . $row['id'] . '; Срок подписки: ' . $row['time'];
    }
    
    foreach ($data as $value) {
       echo $value . '<br>';
    }
    } else {
        echo "Данных не найдено";
    }
  }
  
  

  function getSubsrs($data) {
    $field = $this->connect->query("SELECT * FROM subscriber WHERE (name LIKE '%$data%')");
    $count = $field->num_rows;
    if ($count > 0) {
    while ($row = $field->fetch_assoc()) {
        echo $row['id'] . ' - ' . $row['name'] . '<br>';
     }
   
    } else {
        echo "Данных не найдено";
    }
  }
  
  

  function report($d1, $d2) {
    $start_date = $d1;
    $end_date = $d2;
    $field = $this->connect->query("SELECT * FROM receipt WHERE date BETWEEN '$start_date' AND '$end_date'");
    $count = $field->num_rows;
    
    if ($count > 0) {
    echo '<table border="2"><tr><td>ID</td>
                     <td>Номер</td>
                     <td>Дата</td>
                     <td>Номер отслеживания</td>
                     <td>Статус</td>
                     <td>Файл чека</td>';
    while ($row = $field->fetch_assoc()) {

      echo '<tr><td>' . $row['id'] . '</td>
                <td>' . $row['number'] . '</td>
                <td>' . $row['date'] . '</td>
                <td>' . $row['track_number'] . '</td>
                <td>' . $row['status'] . '</td>
                <td><a href="/uploads/' . $row['doc'] . '" target="_blank">Посмотреть</a></td>
                </tr>';
    }
    echo '</table>';
   
    } else {
        echo "Данных не найдено";
    }
    
  }
  
  function todayReport() {
    $todayDate = date("Y-m-d");
    $field1 = $this->connect->query("SELECT * FROM receipt WHERE date = '$todayDate' AND status = 'Внесенный'");
    $field2 = $this->connect->query("SELECT * FROM receipt WHERE date = '$todayDate' AND status = 'Новый'");
    $count = $field2->num_rows . '/' . $field2->num_rows;
    return $count;
  }

}


?>
