<?php
    if(!isset($nama)){
        $nama = "";
    }
    if(!isset($email)){
        $email = "";
    }
    if(!isset($username)){
        $username = "";
    }
    if(!isset($password)){
        $password = "";
    }
?>

<h2>Halaman Daftar Akun</h2>

<form method="POST" action="process_daftar.php">

    <!-- Daftar Nama -->
    <label>Nama: </label>
    <input type="text" name="nama" placeholder="Nama" value="<?php echo $nama ?>"><br>
    <?php if(isset($nameErr)){?>
        <?php echo $nameErr ?>
    <?php } ?>
    <br>

    <!-- Daftar Email -->
    <label>Email: </label>
    <input type="text" name="email" placeholder="Email" value="<?php echo $email ?>"><br>
    <?php if(isset($emailErr)){?>
        <?php echo $emailErr ?>
    <?php } ?>
    <br>

    <!-- Daftar Username -->
    <label>Username: </label>
    <input type="text" name="username" placeholder="Username" value="<?php echo $username ?>"><br>
    <?php if(isset($usernameErr)){?>
        <?php echo $usernameErr ?>
    <?php } ?>
    <br>

    <!-- Daftar Password -->
    <label>Password: </label>
    <input type="password" name="password" placeholder="Password" value="<?php echo $password ?>"><br>
    <?php if(isset($passwordErr)){?>
        <?php echo $passwordErr ?>
    <?php } ?>
    <br>

    <button type="submit">Daftar!</button>

</form>
