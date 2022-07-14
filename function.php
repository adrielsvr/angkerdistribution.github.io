<?php
    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "angker_distribution");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    function registrasi($data){
        global $conn;

        $email = strtolower(stripslashes($data["email"]));
        $nama = $data["nama"];
        $nohp = $data["nohp"];
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
        $keterangan = 'user';

        $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

        //cek email sudah terdaftar
	    if( mysqli_fetch_assoc($result) ) {
		    echo "<script>
				    alert('email sudah terdaftar!')
		         </script>";
		    return false;
	    }

        // cek konfirmasi password
        if ($password !== $password2){
            echo "<script>
                    alert ('Konfirmasi password tidak sesuai');
                  </script>";
            return false;
        }

        // enkripsi password
        // $password = password_hash($password, PASSWORD_DEFAULT);
        
        //tambah data user baru ke database
        mysqli_query($conn, "INSERT INTO user VALUES ('', '$nama', '$email', '$password', '$nohp', '$keterangan')");

        return mysqli_affected_rows($conn);

    }    
?>