<?php
session_start();
require 'function.php';

if(isset($_GET['score'])){
  $id_user = $_GET['score'];
  $checkdata = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE id_user = $id_user");
  $user = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id_user");
  $baris = mysqli_fetch_array($checkdata);
  $bungkus = mysqli_fetch_array($user);
}

//penilaian
$id_user = $_GET['score'];
$query = "SELECT * FROM interview INNER JOIN pendaftaran ON interview.no_pendaftaran = pendaftaran.no_pendaftaran INNER JOIN user ON pendaftaran.id_user = user.id_user WHERE user.id_user = $id_user";
$result = mysqli_query($conn, $query);
$rows = mysqli_fetch_array($result);
$no = $rows['no_interview'];
// var_dump($rows['no_interview']);
// $row = mysqli_fetch_array($result);

if(isset($_POST['save'])){
    $kompetensi = $_POST['kompetensi'];
    $karakter = $_POST['karakter'];
    $attitude = $_POST['attitude'];
    $grooming = $_POST['grooming'];
    $komunikasi = $_POST['komunikasi'];
    $pengalaman = $_POST['pengalaman'];
    $antusias = $_POST['antusias'];
    $skor = ($kompetensi + $karakter + $attitude + $grooming + $komunikasi + $pengalaman + $antusias)/7;
    $skor = round($skor, 2);
    var_dump($skor);

    $query = "UPDATE interview 
                SET 
              competency = '$kompetensi',
              `character` = '$karakter',
              attitude = '$attitude',
              grooming = '$grooming',
              communication = '$komunikasi',
              experience = '$pengalaman',
              antusiasme = '$antusias',
              skor = '$skor'
                WHERE 
              no_interview = $no";
    mysqli_query($conn, $query);
    header('location: dashboard.php');
}


if (isset($_POST['back'])){
  header('location: dashboard.php');
}

if(isset($_POST['logout'])){
  header('location: logout.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <title>Angker Distribution</title>
  </head>
  <body>
    <section class="interview container-fluid">
      <div class="row">
        <div class="col-lg-2 text-center" style="background-color: #da1212; height: 615px">
          <img src="img/logoangker.png" alt="Logo Angker" width="150px" class="text-center mt-3" />
          <img src="img/admin.png" width="120px" class="mt-2 mb-1" />
          <p class="text-light mb-4">
            <?= $_SESSION['nama']; ?>
          </p>
          <form action="" method="post">
            <button type="submit" name="back" class="btn mb-5 mt-4" style="color: #041562; width: 80px; background-color: #eee; border-radius: 16px">Back</button>
          </form>
          <form action="" method="post" style="margin-top: 140px">
            <button type="submit" name="logout" class="btn mt-5 text-light" style="background-color: #041562; border-radius: 16px">log out</button>
          </form>
        </div>
        <div class="col-10">
          <div class="detail row mt-5">
            <div class="col-md-2">
              <div class="card ms-2" style="background-color: #da1212; width: 150px; height: 260px; border-radius: 20px">
                <img src="img/pp.png" class="card-img-top p-2" />
                <div class="card-body p-2">
                  <p class="text-start text-light">
                    <?php echo $bungkus["nama"]; ?><br />
                    Applying For : <br />
                    <?php echo $baris["Posisi"]; ?>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="card" style="width: 100%; border-radius: 18px; background-color: #eee">
                <div class="card-body">
                  <form action="" method="post">
                    <table>
                      <tr>
                        <td>Id &nbsp</td>
                        <td>:</td>
                        <td width="200px"><?php echo $bungkus["id_user"] ?></td>
                        <td width="150px">
                        <label for="kompetensi">Competency</label>
                        </td>
                        <td>
                          <select name="kompetensi" id="kompetensi">
                            <?php for($i=1; $i<=10; $i++) : ?>
                              <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Nama &nbsp</td>
                        <td>:</td>
                        <td><?php echo $bungkus["nama"] ?></td>
                        <td>
                        <label for="karakter">Character</label>
                        </td>
                        <td>
                          <select name="karakter" id="karakter">
                            <?php for($i=1; $i<=10; $i++) : ?>
                              <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Posisi &nbsp</td>
                        <td>:</td>
                        <td><?php echo $baris["Posisi"] ?></td>
                        <td>
                          <label for="attitude">Attitude</label>
                        </td>
                        <td>
                          <select name="attitude" id="attitude">
                            <?php for($i=1; $i<=10; $i++) : ?>
                              <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" rowspan="4"></td>
                        <td>
                          <label for="grooming">Grooming</label>
                        </td>
                        <td>
                          <select name="grooming" id="grooming">
                            <?php for($i=1; $i<=10; $i++) : ?>
                              <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label for="komunikasi">Communication</label>
                        </td>
                        <td>
                          <select name="komunikasi" id="komunikasi">
                            <?php for($i=1; $i<=10; $i++) : ?>
                              <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label for="pengalaman">Experience</label>
                        </td>
                        <td>
                          <select name="pengalaman" id="pengalaman">
                            <?php for($i=1; $i<=10; $i++) : ?>
                              <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label for="antusias">Antusisme</label>
                        </td>
                        <td>
                          <select name="antusias" id="antusias">
                            <?php for($i=1; $i<=10; $i++) : ?>
                              <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                          </select>
                        </td>
                      </tr>
                    </table>
                    <!-- <button type="submit" action="cv.php" name="checkcv" class="btn mt-2 text-light" style="background-color: #DA1212; border-radius: 16px; width: 100px">Check CV</button> -->
                    <button  type="submit" name="save" class="btn mt-2 text-light" style="background-color: #00AB30; border-radius: 16px; width: 100px">Save</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
