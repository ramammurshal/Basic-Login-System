<?php
    $usernameLogin = $_POST["usernameLogin"];
    $passwordLogin = $_POST["passwordLogin"];
    $userFound = 0;
    $passFound = 0;


    // Pengambilan data dari Database
    if(file_exists("dataPengguna.txt")){
        $file = file_get_contents("dataPengguna.txt");
        $dataPengguna = unserialize($file);   
    }
    if(file_exists("banyakData.txt")){
        $banyakData = file_get_contents("banyakData.txt"); 
    }

    // print_r($dataPengguna);

    //Pengecekan Username
    if (empty($usernameLogin)) {
        $usernameErrLog = "Username Invalid";
    }
    else {
        $userFound = array_search($usernameLogin, array_column($dataPengguna, "username"));
        if($userFound == 0) {
            $usernameErrLog = "Username invalid!";
        }
    }
    //Pengecekan Password
    if (empty($passwordLogin)) {
        $passwordErrLog = "Password invalid!";
    }
    else {
        $passFound = array_search($passwordLogin, array_column($dataPengguna, "password"));
        if($passFound == 0) {
            $passwordErrLog = "Password invalid!";
        }
    }


    if(($userFound != 0 && $passFound != 0)){
        header("Location:dashboard.php?usernameLogin=$usernameLogin");
    }
    else {
        include("login.php");
    }
?>
