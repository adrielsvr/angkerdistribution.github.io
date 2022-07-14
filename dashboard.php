<?php
session_start();
require 'function.php';

$result = mysqli_query($conn, "SELECT * FROM pendaftaran INNER JOIN user ON pendaftaran.id_user = user.id_user WHERE keterangan = 'Uncheck'");
$is = mysqli_query($conn, "SELECT * FROM interview INNER JOIN pendaftaran ON interview.no_pendaftaran = pendaftaran.no_pendaftaran INNER JOIN user ON pendaftaran.id_user = user.id_user WHERE keterangan = 'Lulus'");
$score = mysqli_query($conn, "SELECT * FROM interview INNER JOIN pendaftaran ON interview.no_pendaftaran = pendaftaran.no_pendaftaran INNER JOIN user ON pendaftaran.id_user = user.id_user WHERE skor != 0");
$passed = mysqli_query($conn, "SELECT * FROM `hasil` INNER JOIN interview ON hasil.no_interview = interview.no_interview INNER JOIN pendaftaran ON interview.no_pendaftaran = pendaftaran.no_pendaftaran INNER JOIN user ON pendaftaran.id_user = user.id_user");

if(isset($_POST['logout'])){
  header('location: logout.php');
}


if ($_SESSION['tingkat'] == 'admin'){
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <title>Angker Distribution</title>
  </head>
  <body>
    <section class="cv container-fluid">
      <div class="row">
        <div class="col-lg-2 text-center" style="background-color: #da1212; height: 615px">
          <img src="img/logoangker.png" alt="Logo Angker" width="150px" class="text-center mt-3">
          <img src="img/admin.png" width="120px" class="mt-2 mb-1">
          <p class="text-light mb-4"><?= $_SESSION['nama']; ?></p>
            <div id="list-example" class="list-group" style="background-color: #eee; border-radius: 12px;">
              <a class="list-group-item list-group-item-action active" href="javascript:void(0)">Curriculum Vitae</a>
              <a class="list-group-item list-group-item-action" href="javascript:void(0)">Interview Session</a>
              <a class="list-group-item list-group-item-action" href="javascript:void(0)">Score</a>
              <a class="list-group-item list-group-item-action" href="javascript:void(0)">Passed</a>
            </div>
            <form action="" method="post" style="margin-top: 140px">
              <button type="submit" name="logout" class="btn mt-2 text-light" style="background-color: #041562; border-radius: 16px">log out</button>
            </form>
        </div>
        <div class="col-10 content">
          <div class="container">
            <div id="cv" class="row active">
              <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <div class="col-md-2 text-center text-light mt-3 ms-3">
                  <div class="card ms-2" style="background-color: #da1212; width: 150px; height: 260px; border-radius: 20px ">
                    <img src="img/pp.png" class="card-img-top p-2" />  
                    <div class="card-body p-2">
                      <p class="text-start"> 
                        <?php echo $row["nama"]; ?><br>
                        Applying For : <br />
                        <?php echo $row["Posisi"]; ?>
                      </p>
                    </div>
                  </div>
                  <form action="cv.php" method="get">
                    <button type="submit" name="check" value="<?= $row['id_user']; ?>" class="btn text-light mt-1 ms-1" style="background-color: #041562; border-radius: 15px; width: 150px">Check</button>
                  </form>
                </div>
              <?php } ?>
            </div>
            <div id="is" class="row">
              <?php while($row = mysqli_fetch_assoc($is)){ ?>
                <div class="col-md-2 text-center text-light mt-3 ms-3">
                  <div class="card ms-2" style="background-color: #da1212; width: 150px; height: 260px; border-radius: 20px ">
                    <img src="img/pp.png" class="card-img-top p-2" />  
                    <div class="card-body p-2">
                      <p class="text-start"> 
                        <?php echo $row["nama"]; ?><br>
                        Applying For : <br />
                        <?php echo $row["Posisi"]; ?>
                      </p>
                    </div>
                  </div>
                  <form action="interview.php" method="get">
                    <button type="submit" name="score" value="<?= $row['id_user']; ?>" class="btn text-light mt-1" style="background-color: #041562; border-radius: 15px; width: 150px">Score</button>
                  </form>
                </div>
              <?php } ?>
            </div>
            <div id="score" class="row">
              <?php while($row = mysqli_fetch_assoc($score)){ ?>
                <div class="col-md-2 text-center text-light mt-3 ms-3">
                  <div class="card ms-2" style="background-color: #da1212; width: 150px; height: 260px; border-radius: 20px ">
                    <img src="img/pp.png" class="card-img-top p-2" />  
                    <div class="card-body p-2">
                      <p class="text-start"> 
                        <?php echo $row["nama"]; ?><br>
                        Applying For : <br />
                        <?php echo $row["Posisi"]; ?><br>
                        Score : <?= $row['skor']; ?>
                      </p>
                    </div>
                  </div>
                  <form action="score.php" method="get">
                    <button type="submit" name="detail" value="<?= $row['id_user']; ?>" class="btn text-light mt-1" style="background-color: #041562; border-radius: 15px; width: 150px">Detail</button>
                  </form>
                </div>
              <?php } ?>
            </div>
            <div id="passed" class="row">
              <?php while($row = mysqli_fetch_assoc($passed)){ ?>
                <div class="col-md-2 text-light mt-3 ms-3">
                  <div class="card ms-2" style="background-color: #da1212; width: 150px; height: 260px; border-radius: 20px ">
                    <img src="img/pp.png" class="card-img-top p-2" />  
                    <div class="card-body p-2">
                      <p> 
                        <?php echo $row["nama"]; ?><br>
                        Applying For : <br />
                        <?php echo $row["Posisi"]; ?> <br>
                        <div class="text-center" style="font-weight: bolder;"><?= $row['hasilakhir'] ?></div>
                      </p>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>  
    </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
      let nav = document.querySelectorAll(".list-group .list-group-item");
      let cv = document.getElementById("cv");
      let is = document.getElementById("is");
      let score = document.getElementById("score");
      let passed = document.getElementById("passed");
      console.log(nav.length);
      for (let i = 0; i < nav.length; i++) {
        nav[i].onclick = function () {
          let j = 0;
          while (j < nav.length) {
            nav[j++].className = "list-group-item";
          }
          nav[i].className = "list-group-item active";
          if (i == 0) {
            cv.className = "active";
            is.className = "";
            score.className = "";
            passed.className = "";
          } else if (i == 1) {
            is.className = "active";
            cv.className = "";
            score.className = "";
            passed.className = "";
          } else if (i == 2) {
            score.className = "active";
            cv.className = "";
            is.className = "";
            passed.className = "";        
          } else if (i == 3) {
            passed.className = "active";
            cv.className = "";
            is.className = ""; 
            score.className = "";           
          } 
        };
      }
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php }else{ header ('location: login.php'); } ?>
