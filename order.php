<script src="./js/jquery-3.6.1.min.js"></script>
<script src="./css/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/rascon.css">

<?php
session_start();
if (isset($_POST['checkout'])){
    $customerid=$_POST['cus_id'];
    $f_name=$_POST['f-name'];
    $s_name=$_POST['s-name'];
    $contacts=$_POST['phone'];
    $email=$_POST['email'];
    $city=$_POST['city'];
    $adress=$_POST['zip'];
    $full_name = $f_name.' '.$s_name;

    $item = "";
    $item = json_encode($_SESSION['cart']);
    
    //$total =$_SESSION['total'];
    include ('dbconnect.php');


    //generating invoice auto id 
    $select =" SELECT invoice FROM  `oder` order by invoice asc limit 1";
    $rs = $conn->query($select);
    $inv = $rs->fetch_assoc();
    $slen= strlen($customerid);
    
    if(!empty($inv['invoice'])){
        $len = number_format($slen) + 6;
        $invoice = $inv['invoice'];
        $invoice = substr($invoice,$len);
        $invoice = intval($invoice);
        $invoice = 'C'. $customerid .'-INV-0'.($invoice + 1);
    }else {
        $invoice = 'C'.$customerid.'-INV-01';
    }
  
    //inserting to table
    $sql = "INSERT INTO `oder` (full_name,contacts,email,city,items,invoice,adress)
            values ('$full_name', '$contacts', '$email', '$city','$item','$invoice','$adress')";
    $insert = $conn->query($sql);
    echo '
        <div class="container">
        <div class="row">
            <div class="col-4">name</div>
            <div class="col-5">'.$full_name.'</div>
        
        </div>
        <div class="row">
            <div class="col-4">email</div>
            <div class="col-5">'.$email.'</div>
            
        </div>
        <div class="row">
            <div class="col-4">city</div>
            <div class="col-5">'.$city.'</div>
            
        </div>
        <div class="row">
            <div class="col-4">phone</div>
            <div class="col-5">'.$phone.'</div>
        
        </div>
        <div class="row">
            <div class="col-4">adress</div>
            <div class="col-5">'.$adress'</div>
            
        </div>
        <div class="card">
            <i class="fa-solid fa-square-check"></i>
        </div>
    ';
}


?>

</div>