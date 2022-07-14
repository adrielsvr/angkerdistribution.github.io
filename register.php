<?php 
require 'function.php';

if( isset($_POST["submit"]) ) {

	if( registrasi($_POST) > 0 ) {
    echo "<script>
				alert('user baru berhasil ditambahkan!');
			  </script>";
	} else {
		echo mysqli_error($conn);
	}

}

if(isset($_POST['back'])){
  header('location: index.php');
}

if (isset($_POST["login"])){
  header ('location: login.php');
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
    <link rel="stylesheet" href="style.css" />
    <title>Register</title>
  </head>
  <body>
    <section class="login container-fluid" style="overflow-x: hidden">
      <div class="row text-center">
        <div class="masuk col-md-6">
          <form class="text-start" action="" method="POST">
            <button type="submit" name="back" class="btn mt-2 text-light" style="background-color: #041562; border-radius: 18px">About</button>
          </form>
          <img class="pt-1" src="img/image-removebg-preview (14).png" width="180px" style="margin-bottom: 25px" />
          <h2 class="text-light">Lets Join us!</h2>
          <h5 class="text-light">Fill in your data</h5>
          <form method="POST" action="">
            <div class="form-floating mt-5 mb-3">
              <input type="email" id="floatingInput" name="email" placeholder="Email" style="border-radius: 30px; border-width: 0; width: 300px; height: 30px; padding-left: 20px;" />
            </div>
            <div class="form-floating mb-3">
              <input type="text" id="floatingInput" name="nama" placeholder="Nama" style="border-radius: 30px; border-width: 0; width: 300px; height: 30px; padding-left: 20px;" />
            </div>
            <div class="form-floating mb-3">
              <input type="text" id="floatingInput" name="nohp" placeholder="No Handphone" style="border-radius: 30px; border-width: 0; width: 300px; height: 30px; padding-left: 20px;" />
            </div>
            <div class="form-floating mb-3">
              <input type="password" id="floatingPassword" name="password" placeholder="Password" style="border-radius: 20px; border-width: 0; width: 300px; height: 30px; padding-left: 20px;" />
            </div>
            <div class="form-floating">
              <input type="password" id="floatingPassword" name="password2" placeholder="Konfirmasi Password" style="border-radius: 20px; border-width: 0; width: 300px; height: 30px; padding-left: 20px;" />
            </div>
            <button type="submit" name="submit" class="btn mt-5 text-light" style="background-color: #041562; margin-bottom: 58px">Sign Up</button>
          </form>
        </div>
        <div class="daftar col-md-6" style="padding-top: 200px">
          <h2 style="margin-bottom: 30px">Already have an account?</h2>
          <h5 style="margin: 0 29% 50px 29%">Well, let’s start!</h5>
          <form action="" method="POST" style="padding-bottom: 90px">
            <button type="submit" name="login" class="btn mt-2 text-light" style="background-color: #da1212">Log In</button>
          </form>
        </div>
      </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.js delivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
