<?php session_start(); ?>
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

<?php 

$list_of_users = [

    "u1" => [
        "name"  =>  "batool",
        "email" =>  "batool@gmail.com",
        "pass"  =>  "p1",
    ],
    "u2" => [
        "name"  =>  "maira",
        "email" =>  "maira@gmail.com",
        "pass"  =>  "p2",
    ],
    "u3" => [
        "name"  =>  "shiza",
        "email" =>  "shiza@gmail.com",
        "pass"  =>  "p3",
    ],
    "u4" => [
        "name"  =>  "seher",
        "email" =>  "seher@gmail.com",
        "pass"  =>  "p4",
    ],
    "u5" => [
        "name"  =>  "areeba",
        "email" =>  "areeba@gmail.com",
        "pass"  =>  "p5",
    ],
];

// include('constants.php');
if(!isset($_SESSION['name']) && empty($_SESSION['name'])){ 
    
    if(isset($_POST['submit'])) {

        $error_msg = [];

        foreach ($list_of_users as $user => $userinfo) {  
                
            if ($_POST["email"] === $userinfo["email"] && $_POST["pass"] === $userinfo["pass"]){
                header('Location: to_do_list.php');
                // return;
            }
        }
        if ($_POST["email"] !== $userinfo["email"] || $_POST["pass"] !== $userinfo["pass"]){
        echo "WRONG EMAIL OR PASSWORD";
        }   
    }
}

?>

<form class="form" method="POST">
    
    <label class="label"> E-mail : </label> <br>
    <input class="task" type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : "" ?>"> 
    <b> <?php echo isset($error_msg['email']) ? $error_msg['email'] : ''  ?> <br> </b> <br>

    <label class="label"> Password : </label> <br>
    <input class="task" type="password" name="pass" value="<?php echo isset($_POST['pass']) ? $_POST['pass'] : "" ?>"> 
    <b> <?php echo isset($error_msg['pass']) ? $error_msg['pass'] : ''  ?> <br> </b> <br>

        
    <input class="btn" type="submit" name="submit" value="LOG IN">
 
</form>

</body>
</html>