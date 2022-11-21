<?php
if (isset($_POST['search'])){

    $search = $_POST['search'];
    include("dbconnect.php");
    $sql ="SELECT food_name from food_menu where food_name like '%$search%' ORDER BY category_name ASC";
    $results =$conn->query($sql);
    $row = $results->fetch_assoc();
    if (isset($row)){
        foreach($results as $row){
            echo "".$row['food_name']."<br>";    
        }
    }else{
        echo("results not found ");
    }
}else {
    echo "no results";
}

?>