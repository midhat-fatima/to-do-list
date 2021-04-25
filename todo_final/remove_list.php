<?php

if (isset($_COOKIE['todo_list'])) {

    $list = unserialize($_COOKIE['todo_list']);
    $remove  = $_GET['remove'];
    $new_list['new_list'] = $list;
    unset($list[$remove]);

    setcookie('todo_list', serialize($list), time() + 86400, "/");
    header("Location: to_do_list.php");
}