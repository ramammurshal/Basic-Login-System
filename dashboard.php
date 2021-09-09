<?php
    $todos = array();

    $usernameLogin = $_GET["usernameLogin"];

    if(file_exists("$usernameLogin.txt")){
        $file = file_get_contents("$usernameLogin.txt");
        $todos = unserialize($file);   
    }

    if(isset($_POST["todo"])){
        $data = $_POST["todo"];
        $todos[] = [
            "todo" => "$data",
            "status" => 0
        ];
        $serialized_todos = serialize($todos);
        file_put_contents("$usernameLogin.txt", $serialized_todos);
        header("Location:dashboard.php?usernameLogin=$usernameLogin");
    }

    if(isset($_GET["status"])){
        $todos[$_GET["key"]]["status"] = $_GET["status"];
        $serialized_todos = serialize($todos);
        file_put_contents("$usernameLogin.txt", $serialized_todos);
        header("Location:dashboard.php?usernameLogin=$usernameLogin");
    }

    if(isset($_GET["hapus"])){
        unset($todos[$_GET["key"]]);
        $serialized_todos = serialize($todos);
        file_put_contents("$usernameLogin.txt", $serialized_todos);
        header("Location:dashboard.php?usernameLogin=$usernameLogin");
    }
?>

<h1>ToDo App</h1>

<!-- FORM kita mengisi data To Do -->
<form action="" method="POST">
    <label>Apa kegiatanmu hari ini?</label>
    <input type="text" name="todo">
    <button type="submit">Simpan!</button>
</form>

<ul>
    <?php foreach($todos as $key => $value): ?>
    <li>

        <!-- Checkbox -->
        <input type="checkbox" name="todo" onclick="window.location.href='dashboard.php?usernameLogin=<?php echo $usernameLogin?>&status=<?php echo ($value["status"]==1)?'0':'1'?>&key=<?php echo $key?>'" <?php if($value["status"]==1) echo "checked"?>>
        
        <!-- Label -->
        <label>
            <?php
                if($value["status"]==1){
                    echo "<del>" . $value["todo"] . "</del>";
                }
                else{
                    echo $value["todo"];
                }
            ?>
        </label>

        <!-- Hapus Data -->
        <a href="dashboard.php?usernameLogin=<?php echo $usernameLogin?>&hapus=1&key=<?php echo $key ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?')">Hapus</a>
    </li>
    <?php endforeach ?>
</ul>

<form action="index.php" method="">
    <button type="submit">Kembali!</button>
</form>
