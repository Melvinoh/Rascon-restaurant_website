<?php
session_start();
if(!isset($_SESSION['login'])){
   if(!empty($_GET['q']) && $_GET['q']=='login'){
      $username = $_POST['username'];
      $password = $_POST['password'];
      include("dbconnect.php");
         
      $sql = " SELECT * FROM customer_table WHERE username = '$username' AND `password`= '$password'";
      $results = $conn->query($sql);
      $row = $results->fetch_assoc();
      if(isset($row)){
         if ($row['username'] == $username && $row['password']==$password){
            $_SESSION['login'] = $row['username'];
            echo "log in succefully to";
            echo ($_SESSION['login']);
         }else{
            echo "incorrect username or password";
         }
      }else{
         echo("no record found ");
      }
      
   };
}else{
    echo "you are already loged in  to ".($_SESSION['login']). "";
}

?>