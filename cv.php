<?php
session_start();
require 'function.php';

if(isset($_GET['check'])){
  $id_user = $_GET['check'];
  $checkdata = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE id_user = $id_user");
  $user = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id_user");
  $baris = mysqli_fetch_array($checkdata);
  $bungkus = mysqli_fetch_array($user);
}
  
//accepted
$id_user = $_GET['check'];
$result = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE id_user = $id_user");
$row = mysqli_fetch_array($result);

if(isset($_POST['acc'])){
  if(isset($row['no_pendaftaran'])){
    $no = $_POST['no_pendaftaran'];
    mysqli_query($conn, "UPDATE `pendaftaran` SET `keterangan` = 'Lulus' WHERE `pendaftaran`.`no_pendaftaran` = $no");
    mysqli_query($conn, "INSERT INTO interview VALUES ('', $no, '', '', '', '', '', '', '', '')");
    header('location: dashboard.php');
  } 
}

if(isset($_POST['ignore'])){
  if(isset($row['no_pendaftaran'])){
    $no = $_POST['no_pendaftaran'];
    mysqli_query($conn, "UPDATE `pendaftaran` SET `keterangan` = 'Tidak Lulus' WHERE `pendaftaran`.`no_pendaftaran` = $no");
    header('location: dashboard.php');
  }
}

//back
if(isset($_POST['back'])){
  header('location: dashboard.php');
}

//log out
if (isset($_POST['logout'])){
  header ('location: logout.php');
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

    <title>Angker Distribution</title>
  </head>
  <body>
    <section class="cv container-fluid">
      <div class="row">
        <div class="col-lg-2 text-center" style="background-color: #da1212; height: 615px">
          <img src="img/logoangker.png" alt="Logo Angker" width="150px" class="text-center mt-3" />
          <img src="img/admin.png" width="120px" class="mt-2 mb-1" />
          <p class="text-light mb-4"><?= $_SESSION['nama']; ?></p>
          <form action="" method="post">
          <button type="submit" name="back" class="btn mb-5 mt-4" style="color: #041562; width: 80px; background-color: #eee; border-radius: 16px">Back</button>
          </form>
          <form action="" method="post" style="margin-top: 140px">
            <button type="submit" name="logout" class="btn mt-5 text-light" style="background-color: #041562; border-radius: 16px">log out</button>
          </form>
        </div>
        <div class="col-10">
          <div class="container">
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
                    <table>
                      <tr>
                        <td>Id User &nbsp</td>
                        <td>:</td>
                        <td width="100%"><?php echo $bungkus["id_user"] ?></td>
                      </tr>
                      <tr>
                        <td>Name &nbsp</td>
                        <td>:</td>
                        <td><?php echo $bungkus["nama"] ?></td>
                      </tr>
                      <tr>
                        <td>Phone Number &nbsp</td>
                        <td>: </td>
                        <td><?php echo $bungkus["no_telp"] ?></td>
                      </tr>
                      <tr>
                        <td>Posisi &nbsp</td>
                        <td>: </td>
                        <td><?php echo $baris["Posisi"] ?></td>
                      </tr>
                      <tr>
                        <td>Email &nbsp</td>
                        <td>: </td>
                        <td><?php echo $bungkus["email"] ?></td>
                      </tr>
                      <tr>
                        <td>Lampiran &nbsp</td>
                        <td>: </td>
                        <td><a target="_blank" href="<?php echo $baris["dokumen_pendaftaran"] ?>"><?php echo $baris["dokumen_pendaftaran"] ?></a></td>
                      </tr>
                      <tr>
                        <td>
                        <form class="text-center" action="" method="post">
                          <input type="hidden" name="no_pendaftaran" value="<?= $row['no_pendaftaran'] ?>">
                          <button  type="submit" name="acc" class="btn mt-2 text-light" style="background-color: #00AB30; border-radius: 16px; width: 100px">Accepted</button>
                          <button type="submit" name="ignore" class="btn mt-2 text-light" style="background-color: #DA1212; border-radius: 16px; width: 100px">Ignore</button>
                        </form> 
                        </td>
                      </tr>
                    </table>
                  </div>
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
<?php }else{ header ('location: login.php'); } ?>
