<?php
   $title = $email=$ingredients = '';
  if(isset($_POST['submit'])){
    //echo $_GET['email'];
    //echo $_GET['title'];
    //echo $_GET['ingredients'];
    $errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');
    //check email
    if(empty($_POST['email'])){
      $errors['email'] = 'An email is required <br />';
      echo $errors['email'];
    }
    else{
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Email must be a valid email address <br />';
        echo $errors['email'];
      }
    }
    if(empty($_POST['title'])){
      $errors['title'] = 'An title is required <br />';
      echo $errors['title'];
    }
    else{
      $title = $_POST['title'];
      if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
        $errors['title'] =  'Title must be letters and spaces only! <br />';
        echo $errors['title'];
      }
    }
    if(empty($_POST['ingredients'])){
      $errors['ingredients'] =  'Atleast one ingredient is required. <br />';
       echo $errors['ingredients'];
    }
    else{
      $ingredients = $_POST['ingredients'];
      if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingredients)){
         $errors['ingredients'] =  'Ingredients must be a comma seperated list';
         echo $errors['ingredients'];
      }
    }

    if(array_filter($errors)){
      echo 'errors in the form';
    } else{
      // echo 'form is valid';

      include('config/db_connect.php');

      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $title = mysqli_real_escape_string($conn, $_POST['title']);
      $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

      //create sql
      $sql = "INSERT INTO pizzas(title,email,ingredients)
      VALUES('$title','$email','$ingredients')";

      //save to db and check
      if(mysqli_query($conn, $sql)){
        //success
        header('Location: index.php');
      }else{
        echo 'query error: ' . mysqli_error($conn);
      }

    }



  }

 ?>
