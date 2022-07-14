<?php
  require 'function.php';

  if (isset($_POST["submit"])){
    $email = $_POST["email"];
    $nohp = $_POST["nohp"];
    $nama = $_POST["nama"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND nohp = '$nohp' AND nama = '$nama'");
    if (mysqli_num_rows($result) === 1){
      
    }
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

    <title>Forgot Password</title>
  </head>
  <body>
    <h3 class="text-center" style="margin: 50px 20%">to change your password, please put your email and we will send verficiation link and your new password</h3>
    <div class="text-center">
      <form action="" method="post">
        <div class="form-floating text-center mb-3 mt-5">
          <input type="email" id="floatingInput" name="email" placeholder="Email" style="border-radius: 30px; border-width: 0; width: 350px; height: 50px; padding-left: 20px; background-color: #eee" />
        </div>
        <div class="form-floating text-center mb-3">
          <input type="text" id="floatingInput" name="nohp" placeholder="No Handphone" style="border-radius: 30px; border-width: 0; width: 350px; height: 50px; padding-left: 20px; background-color: #eee" />
        </div>
        <div class="form-floating text-center mb-3">
          <input type="text" id="floatingInput" name="nama" placeholder="Nama" style="border-radius: 30px; border-width: 0; width: 350px; height: 50px; padding-left: 20px; background-color: #eee" />
        </div>
        <button type="submit" name="submit" class="btn text-light mt-2" style="border-radius: 30px; background-color: #041562">Submit</button>
      </form>
    </div>
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
