<?php
include "header.php";
include "nav.php";

$sql = "select * from cars";
$cars = $mysql->query($sql);
?>
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <h3 class="text-center mt-4 mb-4">Авто в прокат</h3>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                    foreach($cars as $car){
                        echo '
                        <div class="col">
                        <div class="card">
                        <img src="img/'.$car["img"].'" class="card-img-top" alt="'.$car->name.'">
                        <div class="card-body">
                            <h5 class="card-title">'.$car["name"].'</h5>
                            <p class="card-text">От '.$car["pryse"].' руб/сутки</p>';
                            if(!empty($_SESSION["role"])){
                                echo '<a class="btn btn-primary" href="zakaz.php?id_cars='.$car["id_cars"].'&pryse='.$car["pryse"].'" role="button">Заказать</a>';
                            }
                            else{
                                echo '<a class="btn btn-primary" href="visit.php" role="button">Заказать</a>';
                            }
                        echo '</div>
                        </div>
                    </div>  
                        ';
                    }
                ?>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
<?php
include "footer.php";
?>
