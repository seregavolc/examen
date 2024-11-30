<?php
include "header.php";
include "nav.php";
session_start();
$id = $_SESSION["id_user"];
$sql = "select * from users where id_user = '$id'";
$result = $mysql->query($sql);
?>
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <h3 class="text-center mt-4 mb-4">Личный кабинет</h3>
            <?php
            foreach($result as $row){
                echo '
                    <h4 class="mt-4 mb-4">ФИО: '.$row["fio"].'</h4>
                ';
            }
            ?>
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Машина</th>
                    <th scope="col">Дата начала оренды</th>
                    <th scope="col">Конец оренды</th>
                    <th scope="col">Сумма</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "select * from arenda, cars where cars.id_cars = arenda.id_cars AND id_user = '$id'";
                        $result = $mysql->query($sql);
                        foreach($result as $row){
                            echo '
                                <tr>
                                    <th scope="row">'.$row["id_arenda"].'</th>
                                    <td>'.$row["name"].'</td>
                                    <td>'.$row["data_start"].'</td>
                                    <td>'.$row["data_end"].'</td>
                                    <td>'.$row["summa"].'</td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
<?php
include "footer.php";
?>