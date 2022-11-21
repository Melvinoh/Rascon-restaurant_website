<?php include('header.php');?>
<section class ="menu-container">
    <div class="mtitle">
        <h2>menu list</h2>
    </div>
    <div class="menu">
        <div id="meatlovers">
            <h2>tastey food  </h2>
            <div class="meat_lovers">
                <?php   
                $menu =''; 
                if (isset($_GET['f'])){
                    $filter = $_GET['f'];
                    $sql = "SELECT * FROM food_menu WHERE category_name  like '%$filter%' or food_name like '%$filter%' ";
                    $results = $conn->query($sql);
                    $row = $results->fetch_assoc();
                }else{
                    $sql = "SELECT * FROM food_menu limit 30";
                    $results =$conn->query($sql);
                    $row = $results->fetch_assoc();         
                }
                if(!isset($row)){
                    echo "results not found";
                }else {
                    
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
                        
                    while ( $row =$results->fetch_assoc()){
                        $menu= '
                            <form action="" method="post"class="formdata">
                            
                                <div class="'.$category.'">
                                <i class="fas fa-shopping-cart"></i>
                                <i class="fas fa-heart"></i><br>
                                <a href="productdetails.php?f='.$row['food_name'].'"><h5 class="foodname">'. $row['food_name']. '</h5></a>
                                <a href="productdetails.php?f='.$row['food_name'].'"><img src="./pictures/menu pictures/'.$row['url_image'].'" alt='.$row['food_name'].'"meat1"></a>
                                <div class="content">
                                <a href="productdetails.php?f='.$row['food_name'].'"><p>Lorem ipsum dolor sit amet.</p></a>
                                    <i class="fas fa-star fa-sl"></i>
                                    <i class="fas fa-star fa-sl"></i>
                                    <i class="fas fa-star fa-sl"></i>
                                    <i class="fas fa-star fa-sl"></i>
                                    <i class="fas fa-star-half-alt fa-sl"></i><br>
                                    <a href="productdetails.php?f='.$row['food_name'].'"><i class="fas fa-dollar-sign"></i><span>'.$row['price'].'</span><br></a>
                                </div>
                                    <input type="hidden" name="foodid" class="id" value="'.$row['id'].'">
                                    <input type="hidden" name="foodname"class="name" value="'.$row['food_name'].'">
                                    <input type="hidden" name="image" class="img"value="'.$row['url_image'].'">
                                    <input type="hidden" name="price" class="price"value="'.$row['price'].'">
                                    <input type="submit" name="addcart" value="add to cart" class="addcart">
                                </div>  
                            </form>              
                        ';
                        echo "$menu";
                    }
                }
                ?>
            <div>
        </div>
        
    </div>  
</section>
<script>
    $(".formdata").on("submit", function(event){
        event.preventDefault();

        var formValues= $(this).serialize();
        $.post("action.php?q=addtocart",formValues,function(data){
            $('#cart').html(data);
            $('#count').html(data.count);
        });
    });

    
</script>
<?php include('footer.php')?>
