<?php 
$fname = "";
$sname = "";
$phone = "";
$city = "";
$email = "";
$zip = "";
$DOB = "";
$username = "";
$password = "";
$validation ="";

if (isset($_GET['q']) &&  $_GET['q'] =='creataccount'){
    if(empty($_POST["fname"])){
        $validation .="please enter first_name, ";
    }else{
        $fname = test($_POST["fname"]);
        if(!preg_match("/^[a-zA-Z-' ]*$/",$fname)){
            $validation .= "enter a valid first_name,";
        }
    }
    if(empty($_POST["sname"])){
        $validation .= "please enter second name, ";
    }else{
        $sname = test($_POST["sname"]);
        if(!preg_match("/^[a-zA-Z-' ]*$/",$sname)){
            $validation .= "enter a valid second_name,".'  ';
         }
    }
    if(empty($_POST["phone"])){
        $validation.= "please enter phone number, " ;
    }else{
        $phone = test($_POST["phone"]);
        if(!filter_var($phone ,FILTER_VALIDATE_INT)){
            $validation.= "enter a valid PHONE NUMBER, ";
         }
    }
    if(empty($_POST["email"])){
        $validation.= "please enter email, ";
    }else{
        $email = test($_POST["email"]);
        if(!filter_var($email ,FILTER_VALIDATE_EMAIL)){
            $validation.= "enter a valid email ";
         }
    }
    if(empty($_POST["zip"])){
        $validation.= "please enter zip " ;
    }else{
        $zip = test($_POST["zip"]);
    
    }
    if(empty($_POST["username"])){
        $validation.="please enter username ";
        
    }else{
        $username = test($_POST["username"]);
    }
    if(empty($_POST["password"])){
        $validation.="please enter password ";
    }else{
        $password = test($_POST["password"]);
    }
    if(empty($_POST["city"])){
        $validation.="please enter city ";
    }else{
        $city = test($_POST["city"]);
    }
   if (empty($validation)){
        include("dbconnect.php");
        $sql = "INSERT INTO customer_table (first_name, second_name, email, phone, `city`,zip,DOB,username, `password`)
            VALUES ('$fname' ,'$sname', '$email', '$phone', '$city', '$zip', '$DOB', '$username','$password')";
        $stmt = $conn->query($sql);
        echo "record updated succefully";
    }else{
        echo($validation);
    }
    
}else {
    echo "couldn't update record pliz retry";
    var_dump($_POST['search']);
}
function test($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>