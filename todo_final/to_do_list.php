<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<h1> ~ To Do List ~ </h1>

<form class="form" method="POST">
    <input class="task" type="text" name="todo_name" placeholder="Type Here" autocomplete="off">
    <input class="btn" type="submit" name="submit" value=" Add ">
</form>

<?php

$list = array();

if (isset($_REQUEST['submit'])) {

    $todo_name = trim($_REQUEST['todo_name']);

    if (empty($_COOKIE['todo_list'])) {

        array_push($list, $todo_name);
        $new_list['new_list'] = $list;
        setcookie('todo_list', serialize($list), time() + 86400, "/");
    }
    else {
        $list = unserialize($_COOKIE['todo_list']);
        array_push($list, $todo_name);
        $new_list['new_list'] = $list;
        setcookie('todo_list', serialize($list), time() + 86400, "/");
        header("Refresh:0");
    }
}
if (isset($_COOKIE['todo_list'])) {
        
    $list = unserialize($_COOKIE['todo_list']);
    $new_list['new_list'] = $list;
}
foreach ($new_list as $list_key => $list_value) { ?>
    <div> <?php
    foreach ($list_value as $key => $value) {
        echo "<li>$value"  ?>
        <a href="edit_list.php?edit=<?php echo  $key; ?>"> Edit </a>
        <a href="remove_list.php?remove=<?php echo $key; ?>"> Remove </a>
        <a href="complete_list.php?complete=<?php echo $key ?>"> Completed </a> </li> <br>  <?Php 
    }   ?>
    </div>  <?php
} 
if (isset($_POST['logout'])) {
    header("Location: index.php");
} ?>

<form class="form" method="POST">
    <input class="btn" type="submit" name="logout" value=" LOG OUT ">
</form>

</body>
</html>