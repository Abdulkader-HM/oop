<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
  
<?php
 session_start();
if ($_SESSION['user']->type == 'user') {
     echo 'welcome user';
} else {
    header('location:http://localhost/oop/login.php');
}
?>

</body>
</html>