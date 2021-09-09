<?php
    //Nangkap data dari form daftar.php
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $dataPengguna[] = [
        "nama" => "pertama",
        "email" => "pertama",
        "username" => "pertama",
        "password" => "pertama"

    ];

    //Name Check
    if(empty($nama)){
        $nameErr = "Name is required!";
    }
    else{
        if(!preg_match("/^[a-zA-Z ]*$/", $nama)){
            $nameErr = "Only letters and white space allowed!";
        }
    }

    //Email Check
    if(empty($email)){
        $emailErr = "Email is required!";
    }
    else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Invalid email format!";
        }
    }

    //Username Check
    if(empty($username)){
        $usernameErr = "Username is required";
    }
    else if(strlen($username) < 6){
        $usernameErr = "Your username have a minimum of 6 characters";
    }

    //Password Check
    if(empty($password)){
        $passwordErr = "Password is required";
    }
    else if(strlen($password) < 6){
        $passwordErr = "Your password have a minimum of 6 characters";
    }

    // Jika tidak kosong
    if(empty($nameErr) && empty($emailErr) && empty($usernameErr) && empty($passwordErr)){

        if(file_exists("dataPengguna.txt")){
            $file = file_get_contents("dataPengguna.txt");
            $dataPengguna = unserialize($file);   
        }

        $dataPengguna[] = [
            "nama" => $nama,
            "email" => $email,
            "username" => $username,
            "password" => $password
        ];

        $banyakData = count($dataPengguna);
        file_put_contents("banyakData.txt", $banyakData);

        $serialized_dataPengguna = serialize($dataPengguna);
        file_put_contents("dataPengguna.txt", $serialized_dataPengguna);
        include("index.php");
    }
	// Jika kosong
    else {
        include("daftar.php");
    }
?>
