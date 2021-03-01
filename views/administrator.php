<?php
$_SESSION['role'] = 'Admin';
$_SESSION['password'] = 'admin365';

    if($_SESSION['role'] === $_GET['role']){
        echo "Добро пожаловать Админ";
        ?>
        <form action="#" method="GET">
            <input type="hidden" name="role" value="user"><br>
            <button type="submit"> Log Out </button>
        </form>
        <?php
    }else{
        ?>
        <form action="#" method="GET">
            <input type="text" name="role" placeholder="Login"><br>
            <input type="text" name= "password" placeholder="Password">
            <button type="submit"> Sing IN </button>
        </form>
        <?php
    }
?>

<form action="">



</form>
