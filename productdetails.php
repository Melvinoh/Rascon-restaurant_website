<?php //include("header.php");

?>
    <?php
    include ('dbconnect.php');
    if (isset($_GET['f'])){
        $filter = $_GET['f'];
        include("header.php");
    }else{
        if(!empty($_POST['search'])){
            $filter = $_POST['search'];
        }else{
            echo "could not intiate search";
        }  
    }

    $sql = "SELECT * FROM food_menu where food_name like '%$filter%' or category_name like '%$filter%'";
    $results =$conn->query($sql);
    $row = $results->fetch_assoc();
    //$count = $results->mysqli_num_rows();
    if(isset($row)) {
        if ( $row['category_id'] == 1){
            $category = 'chicken';
        }elseif($row['category_id']==2){
            $category = 'fish';
        }elseif($row['category_id']==3){
            $category ='meat';
        }elseif($row['category_id'] == 4){
            $category = 'rice';
        }elseif($row['category_id']==5){
            $category ='stew ';
        }elseif($row['category_id'] == 6) {
            $category ='beverages';
        }elseif($row['category_id']==7){
            $category ='noodels';
        }
        foreach($results as $row ){
            $product= '
            <div class ="products">
            <div class= pf>
                <form action="" method="post"class="formdata">
                    <div class="'.$category.'">
                        <h5 class="foodname">'.$row['food_name'].'</h5>
                        <img src="./pictures/menu pictures/'.$row['url_image'].'" alt='.$row['food_name'].'"meat1">
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet.</p><br>
                        </div>
                        <input type="hidden" name="foodid" class="id" value="'.$row['id'].'">
                        <input type="hidden" name="foodname"class="name" value="'.$row['food_name'].'">
                        <input type="hidden" name="image" class="img"value="'.$row['url_image'].'">
                        <input type="hidden" name="price" class="price"value="'.$row['price'].'">
                        <input type="submit" name="addcart" value="add to cart" class="addcart">
                    </div>  
                </form>
            </div>
                
                <div class="prodcontent">
                    <h3> category: '.$row['category_name'].'</h3>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo,
                        quasi nisi qui officia recusandae in doloremque natus?
                    </p>
                    <div class="prodd">
                        <div class="prod">
                            <h5> name :</h5>
                            <span>'.$row['food_name'].'</span>
                            <h5>price:</h5>
                            <i class="fas fa-dollar-sign fa-sl"></i>
                            <span>'.$row['price'].'</span>
                            <h5>QTY:</h5><input type="number" value ="" class ="uptqty" ><br>
                            <div> 
                                <h5> ratings:  4.5</h5>
                                <i class="fas fa-star fa-sl"></i>
                                <i class="fas fa-star fa-sl"></i>
                                <i class="fas fa-star fa-sl"></i>
                                <i class="fas fa-star fa-sl"></i>
                                <i class="fas fa-star-half-alt fa-sl"></i>
                            </div>
                        </div>
                        <div class="ingred">
                            <h5>ingredients</h5>
                            <ul>
                                <li>1tsp butternut squach</li>
                                <li>1/2sp topical curry powder </li>
                                <li>2tsp table salt </li>
                                <li>4pc chopped large onions </li>
                                <li>3pc chopped large tomatoes  </li>
                                <li>2tsp of garlic source </li>
                            </ul>
                        </div>
                    <div>                       
                </div>
            </div>
            ';
            echo "$product";
        }
    }elseif(isset($row) && $count > 2) {
        header("location:./db.php?f=$filter");
    }else{
        echo '<div =class="neg-results">could not find results</div>';
    }
    
    ?>
<script>
    $(document).ready(function(){
        $(".formdata").on("submit", function(event){
            event.preventDefault();
    
            var formValues= $(this).serialize();
    
            $.post("action.php?q=addtocart", formValues , function(data){
                
                $("#cart").html(data);
            //   $('#count').html($(data).find('#cc').html());
            })
            /*$.getJSON('action.php?q=addtocart',formValues, function(data) {
                $('#count').html(data.ct);  
                $("#cart").html(data.out);      
            });*/
        })          
    }); 

</script>

