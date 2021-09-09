<?php
    if(!isset($usernameLogin)){
        $usernameLogin = "";
    }
    if(!isset($passwordLogin)){
        $passwordLogin = "";
    }
?>

<h2>Halaman Login</h2>

<form action="process_login.php" method="POST">

    <label>Username: </label>
    <input type="text" name="usernameLogin" placeholder="Username" value="<?php echo $usernameLogin ?>"><br>
    <?php if(isset($usernameErrLog)){?>
        <?php echo $usernameErrLog ?>
    <?php } ?>
    <br>

    <label>Password: </label>
    <input type="password" name="passwordLogin" placeholder="Password" value="<?php echo $passwordLogin ?>"><br>
    <?php if(isset($passwordErrLog)){?>
        <?php echo $passwordErrLog ?>
    <?php } ?>
    <br>

    <button type="submit">Login</button>
</form>
