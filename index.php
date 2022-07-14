<?php
if (isset($_POST['signin'])){
  header('location: login.php');
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Angker Distribution</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-md navbar-dark shadow-sm" style="background-color: #da1212">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="img/image-removebg-preview (14).png" style="width: 130px; height: 40px" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-sm-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#jumbotron">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#info">Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#job">Job Desk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#contact">Contact</a>
            </li>
            <li class="nav-item fw-bold">
            <form action="" method="post">
              <button type="submit" name="signin" class="btn ms-3 text-center" style="background-color: #eee; border-radius: 10px; color: #da1212; width: 90px"><b>Sign In</b></button>
            </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhri Navbar -->

    <!-- Jumbotron -->
    <section id="jumbotron" class="jumbotron container-fluid text-light" style="padding-top: 80px">
      <h1 class="display-4 fw-bold pt-5 pb-4 text-center">LET’S JOIN OUR JOURNEY</h1>
      <p class="lead text-center" style="margin: 0 15% 80px 15%">
        Angker Distribution is starting a very meaningful, powerfull, andjourney. we need a person who can join us on this exciting journey, a person who competent, not afraid to try and learn for mistakes, and eager to always find
        knowledge and collect experience. so what are you waiting for? let's explore, conquer, and reach for success with us!
      </p>
      <div class="text-center">
        <a class="btn text-light" href="#info" role="button" style="background-color: #041562; border-radius: 20px; margin-bottom: 170px">Know Us More</a>
      </div>
    </section>
    <!-- Akhir Jumbotron -->

    <!-- Info -->
    <section id="info" class="info" style="overflow-x: hidden;">
      <div class="row pt-3">
        <div class="col-12 pt-5 text-center">
          <img src="img/Logo.png" width="250px" />
        </div>
      </div>
      <p class="text-center" style="padding: 50px 15% 0 15%">Established in 2020, Angker Group Distribution were built by six people with variety Background. Started as a joke that soon going to be the next big things in business worid. Our company business vary from Shirt Manifacturing, Web Development, System Analysis, Software Maintenance, and ERP implementation.</p>
      </div>
        <h2 class="text-center pt-4 pb-5">Meet Our Founders</h2>
        <div class="row row-col-md-3 text-center">
          <div class="col-lg-4 col-sm-6 text-sm-end text-lg-end mb-5">
            <img src="img/nate.png" width="200px">
          </div>
          <div class="col-lg-4 col-sm-6 text-sm-start text-lg-center mb-5">
            <img src="img/sapisa.png" width="200px">
          </div>
          <div class="col-lg-4 col-sm-6 text-sm-end text-lg-start mb-5">
            <img src="img/agung.png" width="200px">
          </div>
          <div class="col-lg-4 col-sm-6 text-sm-start text-lg-end mb-5">
            <img src="img/andre.png" width="200px">
          </div>
          <div class="col-lg-4 col-sm-6 text-sm-end text-lg-center mb-5">
            <img src="img/sistmut.png" width="200px">
          </div>
          <div class="col-lg-4 col-sm-6 text-sm-start text-lg-start mb-5">
            <img src="img/stephen.png" width="200px">
          </div>
        </div>
    </section>
    <!-- Akhir Info -->

    <!-- Job -->
    <section id="job" class="job container-fluid pt-5">
      <h2 class="text-center pt-4">WE ARE LOOKING FOR</h2>
      <div class="row text-center pb-5">
        <div class="col-md-4 pt-5">
          <img src="img/bubledevice.png" width="200px">
          <h5 class="ps-4">IT Support</h5>
          <p class="ps-lg-5 ms-lg-5 text-md-start ps-md-5 text-lg-start pe-lg-3">
            The IT Support maintains the computer networks of all types of organisations, providing technical support and ensuring the whole company runs smoothly. Baphomet Fans
          </p>
        </div>
        <div class="col-md-4 pt-5">
          <img src="img/bubleacc.png" width="200px">
          <h5 class="ps-4">Accountant</h5>
          <p class="ps-lg-5 ms-lg-5 text-md-start ps-md-5 text-lg-start pe-lg-3">
            Accountant helps businesses make critical financial decisions by collecting, tracking, and correcting the company's finances. They are responsible for financial audits, reconciling bank statements, and ensuring financial records are accurate throughout the year.
          </p>
        </div>
        <div class="col-md-4 pt-5">
          <img src="img/bubledb.png" width="200px">
          <h5 class="ps-4">Data Analyst</h5>
          <p class="ps-lg-5 ms-lg-5 text-md-start ps-md-5 text-lg-start pe-lg-3">
            Data analysts collect, organise and interpret statistical information to help colleagues and clients use it make decisions. Data analysts gather and scrutinise data using specialist tools to generate information that helps others make decisions.
          </p>
        </div>
      </div>
    </section>
    <!-- Akhir Job -->

    <!-- Contact -->
    <section id="contact" class="contact container-fluid pt-4">
      <div class="row pt-5">
        <div class="col-sm-6 col-xs-6 text-center">
          <img src="img/Logo.png" width="250px">
        </div>
        <div class="col-sm-5 col-xs-5 text-md-start text-xs-center">
          <h1 class="text-light text-center text-sm-start pt-5">Let’s Be Part of <br> Our journey</h1>
          <h4 class="pt-2 text-center text-sm-start">Where Everyone is accepted <br> and history will be made</h4>
        </div>
      </div>
      <div class="row pt-2 mb-5">
        <div class="col-sm-6 col-xs-6 text-md-start text-xs-center">
          <h4 class="text-center text-sm-end pt-5">Our Contacts</h4>
          <h2 class="text-light text-center text-sm-end">Angker groups distibutions</h2>
        </div>
        <div class="col-sm-5 col-xs-5 text-md-start text-xs-center text-light">
          <ul type="none" class="text-center text-sm-start pt-5">
            <li>
              <span class="material-symbols-outlined pe-2 pb-3">
                phone_in_talk
              </span>
              +629517989798
            </li>
            <li>
              <span class="material-symbols-outlined pe-2 pb-3">
                mail
              </span>
              angkerbet@gmail.com
            </li>
            <li>
              <span class="material-symbols-outlined pe-2 pb-3">
                map
              </span>
              110 cipto mangunkusumo st. loa janan, samarinda
            </li>
          </ul>
        </div>
      </div>
      <div class="copyright text-light fw-bold pt-1" style="margin-top: 100px;">
        <center>
          &copy 2022 by kelompok 10 pemograman web KJ001 universitas Esa Unggul
        </center>
      </div>
    </section>
    <!-- Akhir Contact -->
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



