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
        $this->report();
        return '1';
      break;
  }

    
  }

  function report() {
    
  }
}


?>
