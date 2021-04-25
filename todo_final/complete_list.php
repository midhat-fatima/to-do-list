<?php

if(isset($_COOKIE['todo_list'])){ 

    $list = unserialize($_COOKIE['todo_list']);
    $complete_list  = $_GET['complete'];

    $list[$complete_list] = "<del>" .  $list[$complete_list] . "</del>";

    setcookie('todo_list', serialize($list), time() + 86400, "/" );
    header('Location: to_do_list.php');
}
?>