<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include 'User.php';

echo '<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <title>Sign Up page</title>
</head>

<body>

   <form method="POST">
      <fieldset class="container">
         <legend>
            <center>Sign Up page</center>
         </legend>
         <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
         </div>
         <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
         </div>
         <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
         </div>
         <div class="mb-3">
            <label class="form-label">confirme password</label>
            <input type="password" class="form-control" name="cpassword" placeholder="confirme password">
         </div>
         <button type="submit" name="submit" class="btn btn-primary">Submit</button>
         <a href="http://localhost/oop/login.php" class="btn btn-success">Back</a>
      </fieldset>
   </form>';

use App\backend\User;

if (isset($_POST['submit'])) {
    $user = new User();
    $user->create();
    echo 'done';
   //  header('location:login.php');
}

?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>

</html>