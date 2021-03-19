<!DOCTYPE html>
<html lang="ru">
<head>
    <?php require_once 'admin/data_base.php';?>
    <meta charset="utf-8">
    <title>Activity tracker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  integrity="sha384ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
 

<body>
    <div class="container">
    <!---------------------------------------------------------------------------------Верхній блок------------------>
        <div class="row">
            <div class="col-md-12 upper_block">
                <h4>Activity tracker</h4>
            </div>
        </div>
    <!-------------------------------------------------------------------Блок додавання активності------------------->
        <div class="row">
            <div class="col-md-12 add_block">
                <form id="save_info" action="admin/add_activity.php" method="post">
                    <table>
                        <tr>
                            <td><label> Add new activity:</label></td>
                            <td><label><input type="text" placeholder="Start time" name="start_time"> </label></td>
                            <td> <label><input type="text" placeholder="Finish time" name="end_time"> </label></td>
                            <td> <label><input type="text" placeholder="Distance" name="distance"> </label></td>
                            <td><label>
                                <select size="1" form="save_info" name="type">
                                    <option disabled selected value="0">Select activity type</option>
                                    <option value="Run">Run</option>
                                    <option value="Ride">Ride</option>
                                </select>
                            </label></td>
                            <td><input id="button" type=submit name="save" value="Save"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <div class="row">
    <!---------------------------------------------------------------------Блок виводу активностей--------------------->
        <div class="col-md-8">
            <?php
                $activities = mysqli_query($link, "SELECT * FROM `activ_info`");
                $activities = mysqli_fetch_all($activities);

                    foreach ($activities as $act_info){
                        $seconds = strtotime($act_info[4])-strtotime($act_info[3]);
                        $minutes = floor( $seconds/ 60); // кількість хвилини
                        $hours = floor($minutes / 60); // кількість повних годин
                        $minutes = $minutes - ($hours * 60);  // кількість хвилин в залишку

                        if($hours>0) $hours = $hours.' h'; //якщо час<60хв - години не виводиться
                        else $hours='' ;
                        if(!$hours == 0) $division_hours = $hours;
                        else $division_hours = 1;
                        ?>
                        <div class="list_block">
                            <table>
                              <tr>
                                <td id="asd"><?= $act_info[1] ?></td>
                                <td><?= $act_info[5] ?> </td>
                                <td><?= round($act_info[2]/1000, 1) ?> km</td>
                                <td><?= $hours.' '.$minutes ?> min</td>
                                <td><?= round($act_info[2]/1000/$division_hours ,1) ?> km/h</td>
                              </tr>
                            </table>
                        </div><div style="margin: 3px;"></div>
            <?php   } ?>
        </div>
    <!---------------------------------------------------------------------Блок рекордів------------------------------->
        <div class="col-md-4">
            <div class="row">

                <div class="col-md-12 scores_block">
                    <p><b>Longest ride:</b></p>
                        <?php
                        $max_ride_score = mysqli_query($link, "SELECT * FROM `activ_info` WHERE `type` = 'ride' ");
                        $max_ride_score = mysqli_fetch_all($max_ride_score);
                        $max_ride = 0;

                        foreach ($max_ride_score as $max_info){
                            if($max_info[2] > $max_ride) {$max_ride=$max_info[2];}
                        }
                            foreach ($max_ride_score as $max_info){
                                if($max_info[2] == $max_ride) {

                                    $seconds = strtotime($max_info[4])-strtotime($max_info[3]);
                                    $minutes = floor( $seconds/ 60); // кількість хвилини
                                    $hours = floor($minutes / 60); // кількість повних годин
                                    $minutes = $minutes - ($hours * 60);  // кількість хвилин в залишку

                                    if($hours>0) $hours = $hours.' h'; //якщо час<60хв - години не виводиться
                                    else $hours='' ;
                                    ?>
                                    <table>
                                        <tr>
                                            <td><?= $max_info[1] ?></td>
                                            <td><?= round($max_info[2]/1000, 1) ?> km</td>
                                            <td><?= $hours.' '.$minutes ?> min</td>
                                        </tr>
                                    </table>
                                    <?php
                                }
                            }
                        ?>

                    <p><b>Longest run:</b></p>
                        <?php
                            $max_run_score = mysqli_query($link, "SELECT * FROM `activ_info` WHERE `type` = 'run'");
                            $max_run_score = mysqli_fetch_all($max_run_score);
                            $max_run = 0;

                            foreach ($max_run_score as $max_info){
                                if($max_info[2] > $max_run) {$max_run=$max_info[2];}
                            }
                                foreach ($max_run_score as $max_info){
                                    if($max_info[2] == $max_run) {
                                    $seconds = strtotime($max_info[4])-strtotime($max_info[3]);
                                    $minutes = floor( $seconds/ 60); // кількість хвилини
                                    $hours = floor($minutes / 60); // кількість повних годин
                                    $minutes = $minutes - ($hours * 60);  // кількість хвилин в залишку

                                    if($hours>0) $hours = $hours.' h'; //якщо час<60хв - години не виводиться
                                    else $hours='' ;
                                    ?>
                                    <table>
                                        <tr>
                                            <td><?= $max_info[1] ?></td>
                                            <td><?= round($max_info[2]/1000, 1) ?> km</td>
                                            <td><?= $hours.' '.$minutes ?> min</td>
                                        </tr>
                                    </table>
                                <?php
                                    }
                                }
                        ?>
                </div>

                <div style="margin: 3px;"></div>
    <!---------------------------------------------------------------------Блок сумарних кілометрів-------------------->
                <div class="col-md-12 total_block">
                    <p><b>Total run distance:</b>&nbsp;&nbsp;&nbsp;
                        <?php
                            $total_info = mysqli_query($link, "SELECT * FROM `activ_info` WHERE `type` = 'run'");
                            $total_info = mysqli_fetch_all($total_info);
                            $show_total_run=0;
                            foreach ($total_info as $total_run){
                                $show_total_run = $show_total_run + $total_run[2];
                            }
                        ?>
                        <?= round($show_total_run/1000, 1)  ?> km
                    </p>

                    <p><b>Total ride distance:</b>&nbsp;&nbsp;&nbsp;
                        <?php
                            $total_info = mysqli_query($link, "SELECT * FROM `activ_info`  WHERE `type` = 'ride'");
                            $total_info = mysqli_fetch_all($total_info);
                            $show_total_ride=0;
                            foreach ($total_info as $total_ride){
                                $show_total_ride = $show_total_ride + $total_ride[2];
                            }
                        ?>
                        <?= round($show_total_ride/1000, 1)  ?> km
                    </p>
                </div>
            </div>
        </div>

        </div>
    </div>
</body>
</html>