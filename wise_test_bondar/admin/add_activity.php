<?php
require_once 'data_base.php';

$start_t = $_POST['start_time'];
$end_t = $_POST['end_time'];
$distance = $_POST['distance'];
$type = $_POST['type'];
$date = date('F j');

if($start_t == 0 || $end_t == 0 || $distance == 0 || $type == NULL ){    //перевірка на ввід данних
    echo '<script>
             alert( "Введіть дані за зразком нижче: \n " +
             "Для Start time:  hh:mm:ss (exm: 15:43) \n " +
              "Для Finish time:  hh:mm:ss (exm: 15:43) \n" +
               " Для Distance:  num of meters (exm: 8556)" );
          </script>';

}
else{
mysqli_query($link, "INSERT INTO `activ_info`(`id`, `data`, `distance`, `start_time`, `end_time`, `type`) VALUES (NULL, '$date', '$distance', '$start_t', '$end_t', '$type')");
header('Location: ../index.php');
}