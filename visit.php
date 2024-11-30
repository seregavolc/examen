<?php
include "header.php";
include "nav.php";

if(!empty($_POST)){
    $login = $_POST["login"];
    $pass = $_POST["pass"];
    $sql = "select * from users where login = '$login' and password = '$pass'";
    $result = $mysql->query($sql);
    $mess = "";
    if($result->num_rows == 0){
        $mess = "Логин или пароль неверный";
    }
    else{
        foreach($result as $row){
                session_start();
                $_SESSION["id_user"] = $row["id_user"];
                $_SESSION["role"] = $row["role"];
                header("location: lichcab.php");
        }
    }
}

?>
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <h3 class="text-center mt-4 mb-4">Авторизация</h3>
            <p class="text-center mt-4 mb-4 text-danger"><?= $mess ?></p>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="login" class="form-control" id="login" name="login">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="pass" name="pass">
                </div>
                <button type="submit" class="btn btn-primary">Войти</button>
            </form>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>
<?php
include "footer.php";
?>