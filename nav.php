<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">Автопрокат</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <?php
        session_start();
            if(!empty($_SESSION["role"])){
                if($_SESSION["role"] == 2){
                    echo '
                    <li class="nav-item">
                    <a class="nav-link" href="lichcab.php">Личный кабиет</a>
                  </li>
                    ';
                }
                echo '
                    <li class="nav-item">
                    <a class="nav-link" href="exit.php">Выйти</a>
                  </li>
                    ';
            }
            else{
                echo '
                    <li class="nav-item">
                    <a class="nav-link" href="visit.php">Авторизация</a>
                  </li>
                    ';
            }
        ?>
      </ul>
    </div>
  </div>
</nav>