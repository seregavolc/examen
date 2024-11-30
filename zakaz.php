<?php
include "header.php";
include "nav.php";

$id_cars = $_GET["id_cars"];
$sql = "select * from cars where id_cars = '$id_cars'";
$res = $mysql->query($sql);


if(!empty($_POST["summ"])){
    $id_cars = $_POST["id_cars"];
    $id_user = $_SESSION["id_user"];
    $data_start = $_POST["data_start"];
    $data_end = $_POST["data_end"];
    $summ = $_POST["summ"];

    $sql = "INSERT INTO `arenda`(`id_user`,`id_cars`, `data_start`, `data_end`, `summa`) VALUES ($id_user,$id_cars,'$data_start','$data_end', $summ)";
    $res = $mysql->query($sql);
    var_dump($sql);
    header("location: lichcab.php");
}
?>
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <h3 class="text-center mt-4 mb-4">Аренда авто <?php foreach($res as $row){ echo $row["name"];} ?></h3>
            <p class="text-center mt-4 mb-4 text-danger"><?= $mess ?></p>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="data_start" class="form-label">Дата начала аренды</label>
                    <input type="date" class="form-control" id="data_start" name="data_start">
                </div>
                <div class="mb-3">
                    <input type="hidden" value="<?= $_GET["pryse"] ?>" class="form-control" id="pryse" name="pryse">
                </div>
                <div class="mb-3">
                    <input type="hidden" value="<?= $_GET["id_cars"] ?>" class="form-control" id="id_cars" name="id_cars">
                </div>
                <div class="mb-3">
                    <input type="hidden" value="" class="form-control" id="summ" name="summ">
                </div>
                <div class="mb-3">
                    <label for="data_end" class="form-label">Дата окончания аренды</label>
                    <input type="date" class="form-control" id="data_end" name="data_end">
                </div>
                <h5 class="text-center mt-4 mb-4" id="text"></h5>
                <button type="submit" class="btn btn-primary">Арендовать</button>
            </form>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>
<?php
include "footer.php";
?>

<script>
    $(document).ready(function(){
        $("#data_end").change(function(){
            var d1 = $("#data_end").val();
            var d2 = $("#data_start").val();
            var data1 = new Date(d1);
            var data2 = new Date(d2);
            var s = $("#pryse").val() * (data1 - data2) / (1000 * 60 * 60 * 24);
            $("#text").text(`Стоймость аренды: ${s} руб`);
            $("#summ").val(s);
        })
    })
</script>