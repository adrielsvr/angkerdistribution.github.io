<?php
session_start();
require 'function.php';

$id_user = $_SESSION['id_user'];
$query = "SELECT * FROM user WHERE id_user = '$id_user'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

if(isset($_POST['apply'])){
  $posisi = $_POST['posisi'];
  $lampiran = $_POST['lampiran'];
  $id = $row['id_user'];

  $db = "INSERT INTO pendaftaran
            VALUES
          ('', $id, '$posisi', '$lampiran', 'Uncheck')";
  mysqli_query($conn, $db);
}

$query = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE id_user = '$id_user'");
$chek = mysqli_num_rows($query);

//status
$bd = "SELECT * FROM pendaftaran WHERE id_user = '$id_user'";
$hasil = mysqli_query($conn, $bd);
$baris = mysqli_fetch_array($hasil);

  if(mysqli_num_rows($hasil) === 0){
    $value = '0%';
  }


if(isset($baris['keterangan'])){
  if ($baris['keterangan'] == 'Uncheck' || $baris['keterangan'] == 'Tidak Lulus'){
    $value = '33%';
  }elseif ($baris['keterangan'] == 'Lulus'){
    $value = '66%';
  } 
}

$hasilAkhir = "SELECT * FROM hasil WHERE id_user = '$id_user'";
$queryHasil = mysqli_query($conn, $hasilAkhir);
$bungkus = mysqli_fetch_array($queryHasil);
if(isset($bungkus['hasilakhir'])){
  if($bungkus['hasilakhir'] == 'Passed'){
    $value = '100%';
  }
}


//Edit akun
$id_user = $_SESSION['id_user'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
$edit = mysqli_fetch_array($result);

if(isset($_POST['save'])){
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $nohp = $_POST['nohp'];
  $password = $_POST['password'];

  $cekemail = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
  if( mysqli_fetch_assoc($cekemail) ) {
    echo "<script>
        alert('email sudah terdaftar!')
         </script>";
    return false;
  }
  header('location: halamanUser.php');

  $db = "UPDATE user
            SET
          nama = '$nama',
          email = '$email',
          no_telp = '$nohp',
          password = '$password'
            WHERE
          id_user = $id_user";
  mysqli_query($conn, $db);
  header('location: halamanUser.php');
}


if(isset($_POST['logout'])){
  header('location: logout.php');
}

if ($_SESSION['tingkat'] == 'user'){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Angker Distribution</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <section class="user container-fluid">
      <div class="row">
        <div class="col-lg-2 text-center" style="background-color: #da1212; height: 615px">
          <img src="img/logoangker.png" alt="Logo Angker" width="150px" class="text-center mt-3" />
          <img src="img/admin.png" width="120px" class="mt-2 mb-1" />
          <p class="text-light mb-4"><?= $_SESSION['nama']; ?></p>
          <div id="list-example" class="list-group" style="background-color: #eee; border-radius: 12px">
            <a class="list-group-item list-group-item-action active" href="javascript:void(0)">Home</a>
            <a class="list-group-item list-group-item-action" href="javascript:void(0)">Apply</a>
            <a class="list-group-item list-group-item-action" href="javascript:void(0)">Status</a>
            <a class="list-group-item list-group-item-action" href="javascript:void(0)">Edit Account</a>
          </div>
          <form action="" method="post" style="margin-top: 140px">
            <button type="submit" name="logout" class="btn mt-2 text-light" style="background-color: #041562; border-radius: 16px">log out</button>
          </form>
        </div>
        <div class="col-10 content bg-light">
          <div class="container">
            <div id="home" class="row active">
              <div class="col-12 text-center-mt-3">
                <h3 class="text-center mt-5 mb-5" style="color: #041562">Follow the Timeline</h3>
              </div>
              <div class="row">
                <div class="col-5 text-end mt-5">
                  <img src="img/Login.png" width="150px" />
                </div>
                <div class="col-6 text-start" style="margin-top: 105px; margin-left: 40px">
                  <h6>Applicants must login to our website</h6>
                </div>
              </div>
              <div class="row">
                <div class="col-7 text-end" style="margin-top: 105px">
                  <h6>Send us your CV and fill in the form we provided</h6>
                </div>
                <div class="col-4 mt-5" style="margin-left: 40px">
                  <img src="img/cv.png" width="150px" />
                </div>
              </div>
              <div class="row">
                <div class="col-5 text-end mt-5">
                  <img src="img/review.png" width="150px" />
                </div>
                <div class="col-6 text-start" style="margin-top: 105px; margin-left: 40px; padding-right: 150px">
                  <h6>We will review your CV and let you know when your interview scheduled</h6>
                </div>
              </div>
              <div class="row">
                <div class="col-7 text-end" style="margin-top: 105px; padding-left: 200px">
                  <h6>Sit back and be hopeful, always check your apply status in our website for the result</h6>
                </div>
                <div class="col-4 mt-5" style="margin-left: 40px">
                  <img src="img/waiting.png" width="150px" />
                </div>
              </div>
              <div class="row text-center mt-3">
                <h3 class="mt-5 mb-5">We’re Hiring</h3>
                <h6 class="mt-3 mb-3">IT SUPPORT</h6>
                <div class="text-center">
                  <img src="img/Login.png" class="img" />
                </div>
                <div class="col-2"></div>
                <div class="col-4 mt-3 mb-5" style="background-color: #eee; border-radius: 18px; margin-left: -20px;">
                  <p class="text-start">Jobdesk :</p>
                  <ul class="text-start">
                    <li>Installing and configuring computer hardware, software, systems, networks, printers, and scanners</li>
                    <li>Monitoring and maintaining computer systems and networks</li>
                    <li>Responding in a timely manner to service issues and requests</li>
                    <li>Providing technical support across the company (this may be in person or over the phone)</li>
                    <li>Setting up accounts for new users</li>
                    <li>Repairing and replacing equipment as necessary</li>
                    <li>Testing new technology</li>
                    <l  i>Possibly training junior staff</li>
                  </ul>
                </div>
                <div class="col-4 mt-3 mb-5" style="background-color: #eee; border-radius: 18px; margin-left: 40px;">
                  <p class="text-start"> Needed Skills</p>
                  <ul class="text-start">
                    <li>Communication skills</li>
                    <li>Interpersonal skills</li>
                    <li>Problem solving skills</li>
                    <li>Punctuality</li>
                    <li>Critical thinking skills</li>
                    <li>Teamwork and collaboration skills</li>
                    <li>Adaptability skills</li>
                    <li>Work ethic</li>
                    <li>Project management skills</li>
                  </ul>
                </div>
                <div class="row">
                  <h6 class="mt-3 mb-3">DATA ANALYST</h6>
                  <div class="text-center">
                    <img src="img/data.png" class="img" />
                  </div>
                  <div class="col-2"></div>
                  <div class="col-4 mt-3 mb-5" style="background-color: #eee; border-radius: 18px; margin-left: -20px;">
                    <p class="text-start">Jobdesk :</p>
                    <ul class="text-start">
                      <li>Using automated tools to extract data from primary and secondary sources</li>
                      <li>Removing corrupted data and fixing coding errors and related problems</li>
                      <li>Developing and maintaining databases, data systems – reorganizing data in a readable format</li>
                      <li>Performing analysis to assess quality and meaning of data</li>
                      <li>Filter Data by reviewing reports and performance indicators to identify and correct code problems</li>
                      <li>Using statistical tools to identify, analyze, and interpret patterns and trends in complex data sets that could be helpful for the diagnosis and prediction</li>
                      <li>Assigning numerical value to essential business functions so that business performance can be assessed and compared over periods of time.</li>
                    </ul>
                  </div>
                  <div class="col-4 mt-3 mb-5" style="background-color: #eee; border-radius: 18px; margin-left: 40px;">
                    <p class="text-start"> Needed Skills</p>
                    <ul class="text-start">
                      <li>Knowledge of data visualization software like Tableau, Qlik</li>
                      <li>Knowledge of how to create and apply the most accurate algorithms to datasets in order to find solution</li>
                      <li>Problem-solving skills</li>
                      <li>Accuracy and attention to detail</li>
                      <li>Adept at queries, writing reports, and making presentations</li>
                      <li>Team-working skills</li>
                      <li>Verbal and Written communication skills</li>
                      <li>Proven working experience in data analysis</li>
                      <li>excellent communication and presentation skills</li>
                      <li>ability for critical thinking</li>
                      <li>creativity</li>
                      <li>Having a systematic and logical approach to problem-solving</li>
                      <li>team working skills</li>
                    </ul>
                  </div>
                  <div class="row">
                    <h6 class="mt-3 mb-3">ACCOUNTANT</h6>
                    <div class="text-center">
                      <img src="img/Login.png" class="img" />
                    </div>
                    <div class="col-2"></div>
                    <div class="col-4 mt-3 mb-5" style="background-color: #eee; border-radius: 18px; margin-left: -20px;">
                      <p class="text-start">Jobdesk :</p>
                      <ul class="text-start">
                        <li>Manage all accounting transactions</li>
                        <li>Prepare budget forecasts</li>
                        <li>Publish financial statements in time</li>
                        <li>Handle monthly, quarterly and annual closings</li>
                        <li>Reconcile accounts payable and receivable</li>
                        <li>Ensure timely bank payments</li>
                        <li>Compute taxes and prepare tax returns</li>
                        <li>Manage balance sheets and profit/loss statements</li>
                        <li>Report on the company’s financial health and liquidity</li>
                        <li>Audit financial transactions and documents</li>
                        <li>Reinforce financial data confidentiality and conduct database backups when necessary</li>
                        <li>Comply with financial policies and regulations</li>
                      </ul>
                    </div>
                    <div class="col-4 mt-3 mb-5" style="background-color: #eee; border-radius: 18px; margin-left: 40px;">
                      <p class="text-start"> Needed Skills</p>
                      <ul class="text-start">
                        <li>Work experience as an Accountant</li>
                        <li>Excellent knowledge of accounting regulations and procedures, including the Generally Accepted Accounting Principles (GAAP)</li>
                        <li>Hands-on experience with accounting software like FreshBooks and QuickBooks</li>
                        <li>Advanced MS Excel skills including Vlookups and pivot tables</li>
                        <li>Experience with general ledger functions</li>
                        <li>Strong attention to detail and good analytical skills</li>
                        <li>BSc in Accounting, Finance or relevant degree</li>
                        <li>Additional certification (CPA or CMA) is a plus</li></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="apply" class="row">
              <h4 class="mt-5 mb-3">Apply Your CV</h4>
              <?php if($chek == 1){ ?>
                <h5 class="mb-2">
                  Your CV has been sent
                </h5>
              <?php } ?>
              <form action="" method='post'>
                <table>
                  <tr>
                    <td>Nama &nbsp</td>
                    <td>:</td>
                    <td>&nbsp <input type="text" name="nama" value="<?= $row['nama'] ?>" style="border-radius: 9px" disabled/></td>
                  </tr>
                  <tr>
                    <td>No Handphone &nbsp</td>
                    <td>:</td>
                    <td>&nbsp <input type="text" name="nohp" value="<?= $row['no_telp'] ?>" style="border-radius: 9px" disabled /></td>
                  </tr>
                  <tr>
                    <td>Email &nbsp</td>
                    <td>:</td>
                    <td>&nbsp <input type="email" name="email" value="<?= $row['email'] ?>" style="border-radius: 9px;" disabled /></td>
                  </tr>
                  <tr>
                    <td>Posisi &nbsp</td>
                    <td>:</td>
                    <td>
                      &nbsp
                      <select name="posisi" id="posisi" <?php if($chek == 1){echo "disabled";} ?>>
                        <option value="IT Support">IT Support</option>
                        <option value="Data Analyst">Data Analyst</option>
                        <option value="Accountant">Accountant</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Lampiran &nbsp</td>
                    <td>:</td>
                    <td>&nbsp <input type="text" name="lampiran" value="" <?php if($chek == 1){echo "disabled";} ?> style="border-radius: 9px" /></td>
                  </tr>
                </table>
                <button  type="submit" name="apply" class="btn text-center mt-4 text-light" <?php if($chek == 1){echo "disabled";} ?> style="background-color: #00AB30; border-radius: 16px; width: 80px">Submit</button>
                <p class="mt-3" style="color: red; font-style: italic; font-weight:bold; font-size: 8pt">
                  &#42 Lampiran berisikan CV, Surat Lamaran, dan Foto identitas diri yang diupload ke Google Drive
                  <br> &#42 Jika ingin merubah nama, dapat dilakukan dengan mengedit akun
                </p>
              </form>
            </div>
            <div id="status">
              <?php if(isset($baris['keterangan']) && isset($bungkus['hasilakhir'])){
                      if($baris['keterangan'] == 'Tidak Lulus' || $bungkus['hasilakhir'] == 'Tidak Lulus'){ 
                ?>
              <div class="card text-center mt-5">
                <div class="card-body">
                  <h4>We are sorry but you havent passed our needed terms, May we meet again int brighter future</h4>
                </div>
              </div>
              <?php } }?>
              <div class="row text-center" style="margin-top: 10%;">
                <div class="col-4 text-center">
                  <p class="mt-5">Your CV Being Reviewed</p>
                </div>
                <div class="col-4 text-center">
                  <img src="img/review.png" width="150px">
                </div>
                <div class="col-4 mt-5 text-center">
                  <p>You Are Hired, Check Your Email For Your Contract Signing Schedule.</p>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="progress m-5">
                    <div class="progress-bar" role="progressbar" style="width: <?= $value ?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= $value ?></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-4 text-center">
                  <img src="img/cv.png" width="150px" />
                </div>
                <div class="col-4 text-center mt-5">
                  <p>Your CV Passed The Bar, Come To Your Interview. The Schedule is Sent to Your Email</p>
                </div>
                <div class="col-4 text-center">
                  <img src="img/waiting.png" width="150px" />
                </div>
              </div>
            </div>
            <div id="edit">
              <h4 class="mt-5 mb-3">Edit Account</h4>
              <form action="" method="post">
                <table>
                  <tr>
                    <td>Nama &nbsp</td>
                    <td>:</td>
                    <td>&nbsp
                      <input type="text" value="<?= $edit['nama'] ?>" name="nama" style="border-radius: 9px;">
                    </td>
                  </tr>
                  <tr>
                    <td>Email &nbsp</td>
                    <td>:</td>
                    <td>&nbsp
                      <input type="text" value="<?= $edit['email'] ?>" name="email" style="border-radius: 9px;">
                    </td>
                  </tr>
                  <tr>
                    <td>No Handphone &nbsp</td>
                    <td>:</td>
                    <td>&nbsp
                      <input type="text" value="<?= $edit['no_telp'] ?>" name="nohp" style="border-radius: 9px;">
                    </td>
                  </tr>
                  <tr>
                    <td>Password &nbsp</td>
                    <td>:</td>
                    <td>&nbsp
                      <input type="password" value="<?= $edit['password'] ?>" name="password" style="border-radius: 9px;">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3">
                      <button type="submit" name="save" class="btn text-light mt-4" style="background-color: #041562; border-radius: 15px; ">Save</button>
                    </td>
                  </tr>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir HTML -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
      let nav = document.querySelectorAll(".list-group .list-group-item");
      let home = document.getElementById("home");
      let apply = document.getElementById("apply");
      let status = document.getElementById("status");
      let Edit = document.getElementById("edit");
      console.log(nav.length);
      for (let i = 0; i < nav.length; i++) {
        nav[i].onclick = function () {
          let j = 0;
          while (j < nav.length) {
            nav[j++].className = "list-group-item";
          }
          nav[i].className = "list-group-item active";
          if (i == 0) {
            home.className = "active";
            apply.className = "";
            status.className = "";
            Edit.className = "";
          } else if (i == 1) {
            apply.className = "active";
            home.className = "";
            status.className = "";
            Edit.className = "";
          } else if (i == 2) {
            status.className = "active";
            home.className = "";
            apply.className = "";
            Edit.className = "";        
          } else if (i == 3) {
            Edit.className = "active";
            home.className = "";
            apply.className = ""; 
            status.className = "";           
          } 
        };
      }
    </script>
  </body>
</html>
<?php }else{ header ('location: login.php'); } ?>
