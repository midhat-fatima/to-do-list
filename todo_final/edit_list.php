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
    
</body>
</html>

<?php

$edit_list = array();

if (isset($_COOKIE['todo_list'])) {

    $edit  = $_GET['edit'];
    $list = unserialize($_COOKIE['todo_list']);
    $edit_list = $list[$edit];  ?>

    <form class="form" method="POST">
        <input class="task" type="text" name="edit_list" value="<?php echo $edit_list;?>">
        <input class="btn" type="submit" name="edit_button" value="Edit" >
    </form> <?php

    if(isset($_REQUEST['edit_button'])){

        $list = unserialize($_COOKIE['todo_list']);
        $edit_list = $_POST['edit_list'];
        $list[$edit] = $edit_list;

        setcookie('todo_list', serialize($list), time() + 86400, "/");
        header("Location: to_do_list.php");
    }
}