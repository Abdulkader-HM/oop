<?php

namespace App\backend;

use PDO;

class User
{
    public function create()
    {
        $database = new PDO("mysql:host=localhost;dbname=User_manager;charset=utf8;", "root", "");
        $insert = $database->prepare("INSERT INTO signup (name,type,email,password)
         VALUES ('" . $_POST['name'] . "','user','" . $_POST['email'] . "','" . $_POST['password'] . "')");
        return $insert->execute();
        echo 'done';
    }

    public function login()
    {
        $eamil = $_POST['email'];
        $password = $_POST['password'];
        $database = new PDO("mysql:host=localhost;dbname=User_manager;charset=utf8;", "root", "");
        $check = $database->prepare(" SELECT * FROM signup WHERE email=:email AND password=:password");
        $check->bindParam("email", $eamil);
        $check->bindParam('password', $password);
        $check->execute();
        if ($check->rowCount() === 1) {
            $user = $check->fetchObject();
            session_start();
            $_SESSION['user'] = $user;
            if ($user->type === 'user') {
                header("location:http://localhost/oop/index.php");
            } else {
                header('location:http://localhost/oop/admin.php');
            }
        } else {
            echo '<div class="alert alert-danger" role="alert"><center>email or
             password is wrong please try again</center></div>';
        }
    }


    public function show()
    {
        $database = new PDO("mysql:host=localhost;dbname=User_manager;charset=utf8;", "root", "");
        $showData = $database->prepare(" SELECT * FROM signup WHERE type='user' ");
        $showData->execute();
        return $showData->fetchAll();
    }

    public function edit()
    {
        $name = $_POST['name'];
        $database = new PDO("mysql:host=localhost;dbname=User_manager;charset=utf8;", "root", "");
        $edit = $database->prepare(" UPDATE signup  SET name='$name'  WHERE id=" . $_GET['edit']);
        $edit->execute();
        echo 'done';
    }

    public function delete()
    {
        $database = new PDO("mysql:host=localhost;dbname=User_manager;charset=utf8;", "root", "");
        $delete = $database->prepare(" DELETE  FROM `signup` WHERE id=" . $_GET['delete']);
        $delete->execute();
        header('Location: admin.php');
    }
}
