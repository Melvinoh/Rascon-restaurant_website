<?php include("header.php")?>
<body>
    <section class="mcontainer">
        <section class="sidebar">
            <div class="filters">
                <div id="searchform">
                    <form action="" method="post" id="search">
                        <input type="submit" value="submit" onkeyup = ""> 
                        <input type="text" placeholder="search here" name="search"  >
                    </form>
                </div>
                <div class="profile">
                   
                    <i class="fas fa-user"></i>
                    <span>kamau johnsone </span>
                    <button> login</button>
                </div>
                <div class="filter">
                    <span> <i class="fas fa-filter"></i>  </span>
                    <select name="filters" id="filters">
                        <option value="popular"> popular foods </option>
                        <option value="featured ">featured list</option>
                        <option value="deals ">deals of the day</option>
                        <option value="menu ">whole menu</option>
                        <option value="price ">price</option>
                    </select>
                    
                </div>
                 
            </div>
            <div class="mcategories">
                 <?php
                    $sql ="SELECT * FROM category_table ";
                    $results =$conn->query($sql);
                    $row = $results->fetch_assoc();  
                ?>
                <h3>categories</h3>
                <?php foreach($results as $row): ?>
                    <div class="mcat">
                    <a href="mlayout.php?f=<?php echo ($row['cat_name']) ?>"><?php echo '<img src="./pictures/menu pictures/'.$row['url_image'].'" alt="">'?></a>
                    <a href="mlayout.php?f=<?php echo ($row['cat_name']) ?>"> <h6><?php echo ($row['cat_name']) ?></h6></a>   
                        <p> tastey foods </p>
                    </div>
                <?php endforeach; ?> 
                
            </div>
            <span class="vcart">
                <button><h6>creat account</h6> </button>
                <button><i class="fas fa-shopping-cart "></i>  view your cart  </button>
            </span>
            
        </section>
        <section class="mcontent">   
            <div class="swiper myswipe3">
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
                    if(isset($row)){
                        
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
                ?>
                <h3> <?php $category ?></h3>
                <div class="menu">
                    <?php foreach($results as $row): ?>
                    <form action="" method="post"class="formdata swiper-slide">
                        <div class="<?php echo ($category) ?>">
                            <i class="fas fa-shopping-cart"></i>
                            <i class="fas fa-heart"></i><br>
                            <a href="#productdetails.php?f='.$row['food_name'].'"><h5 class="foodname"><?php echo ($row['food_name']) ?></h5></a>
                            <a href="#productdetails.php?f='.$row['food_name'].'"><?php echo '<img src="./pictures/menu pictures/'.$row['url_image'].'" alt="">'?></a>
                            <div class="content">
                            <a href="#productdetails.php?f='.$row['food_name'].'"><p>Lorem ipsum dolor sit amet.</p></a>
                                <i class="fas fa-star fa-sl"></i>
                                <i class="fas fa-star fa-sl"></i>
                                <i class="fas fa-star fa-sl"></i>
                                <i class="fas fa-star fa-sl"></i>
                                <i class="fas fa-star-half-alt fa-sl"></i><br>
                                <a href="#productdetails.php?f='.$row['food_name'].'"><i class="fas fa-dollar-sign"></i><span>20 $</span><br></a>
                            </div>
                                <input type="hidden" name="foodid" class="id" value="<?php echo ($row['id']) ?>">
                                <input type="hidden" name="foodname"class="name" value="<?php echo ($row['food_name']) ?>">
                                <input type="hidden" name="image" class="img"value="<?php echo ($row['url_image']) ?>">
                                <input type="hidden" name="price" class="price"value="<?php echo ($row['price']) ?>">
                                <input type="submit" name="addcart" value="add to cart" class="addcart">
                            </div>  
                        </div>
                    </form>
                    <?php endforeach; ?>
                    <?php } ?>
                    </div>
            </div>
            <div class="deals">
                <div class="dcard">
                    <h4>pinacols</h4>
                    <img src=".\pictures\menu pictures\chicken 2.jpg" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, dolorem?</p>
                    <h5>click to view me </h5>
                </div>
                <div class="dcard">
                    <h4>chicken burger
                    </h4>
                    <img src=".\pictures\menu pictures\chicken 3.jpg" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, dolorem?</p>
                    <h5>click to view me </h5>
                </div>
                <div class="dcard">
                    <h4>fish cury</h4>
                    <img src=".\pictures\menu pictures\fish 7.jpg" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, dolorem?</p>
                    <h5>click to view me </h5>
                </div>
                <div class="dcard">
                    <h4>chicken shawarma</h4>
                    <img src=".\pictures\menu pictures\chicken 8.jpg" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, dolorem?</p>
                    <h5>click to view me </h5>
                </div>
            </div>

            </div>
        </section>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper("myswipe3", {
          slidesPerView: 3,
          grid: {
            rows: 2,
          },
          spaceBetween: 10,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });
      </script>

<script>
    $("#search").on("submit",function(event){

        event.preventDefault();
        var searchValues =$(this).serialize();

        $.post( "productdetails.php", searchValues, function(data){
            $(".menu").html(data);
        })
    });
</script>

<?php include ('footer.php')?>
</body>