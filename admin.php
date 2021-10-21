<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <?php
  session_start();
  include 'User.php';

  use App\backend\User;

  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);

  if ($_SESSION['user']->type == 'admin') {
      $user = new User();
      echo ' <div class="container">
    <div class="table-responsive-sm">
    <table class="table table-stiped table-hover">
      <thead>
        <tr>
          <th class="align-middle" scope="col">#</th>
          <th class="align-middle" scope="col">Name</th>
          <th class="align-middle" scope="col">email</th>
          <th class="align-middle text-center" scope="col">Action</th>
        </tr>
      </thead>
      <tbody>';
      $users = $user->show();
    //   return $showData;
      foreach ($users as $show) {
          echo '
          <tr>
             <th class="align-middle" scope="row">' . $show["id"] . '</th>
             <td class="align-middle">"' . $show["name"] . '"</td>
             <td class="align-middle">"' . $show["email"] . '"</td>
             <td class="align-middle text-center">

             <row> 
              <form method="GET">
             <button type="submit" name="delete" class="btn btn-danger" value="' . $show["id"] . '">Delete</button>
             </form>
             </row>

            <row> 
            <form action="edit.php" method="GET">
            <button type="submit" name="edit" class="btn btn-success" value="' . $show["id"] . '">Edit</button>
            </form>
            </row>
          
            </td>
          </tr>';
      }
      echo '
        </tbody>
    </table>
    </div>
    </div>';
      if (isset($_GET['delete'])) {
          $user->delete();
      }
  } else {
      header('location:http://localhost/oop/login.php');
  }


    ?>
</body>

</html>