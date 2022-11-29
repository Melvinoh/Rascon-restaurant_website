<?php include('header.php')?>
<body>
    <section class="home">
        <div class="container">
            <img src="./pictures/menu pictures/burger-10956.png" alt="">
            <div class="content">
                <p>
                    <h1> its not just food its an experience  </h1>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi ab beatae perspiciatis odio,
                    assumenda ad dolore nihil fuga incidunt iusto!
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem tempore unde nostrum obcaecati expedita perferendis, ut id sit! Aliquam consectetur 
                    vitae eius quod dignissimos reach us out on our socila hundels through our tead
                </p>
                <img src="" alt="">
                <a href="menu.php"><button>order now</button></a>
            </div>
          
        </div>

      
        <div class="category">
            <div class="cat-title"> <h2>categories </h2></div>
            <div class=" swiper myswipe">
                <?php
                    $sql ="SELECT * FROM category_table ";
                    $results =$conn->query($sql);
                    $row = $results->fetch_assoc();  
                ?>
                <div class="swiper-wrapper">
                     <?php foreach($results as $row): ?>
                    <div class ="swiper-slide">
                    <a href="menu.php?f=<?php echo ($row['cat_name']) ?>"><?php echo '<img src="./pictures/menu pictures/'.$row['url_image'].'" alt="">'?></a>
                        <p><?php echo ($row['cat_name']) ?></p>
                    </div>
                    <?php endforeach; ?> 
                </div>
            </div>
           
        </div>  
        <div class="deliver">
            <div class="content">
                <i class="fas fa-shipping-fast fa-lg"></i>
                <span>fast delivery</span>
            </div>
            <div class="content">
                <i class="fas fa-headset fa-lg"></i>
                <span>easy pay</span>
            </div>
            <div class="content">
                <i class="fas fa-dollar-sign fa-lg"></i>
                <span>24hr service </span>
            </div>
        </div>
    </section>
    <div class="blog">
        <img src="./pictures/menu pictures/chicken nugets.png" alt="">
        <p>
            <h1>classic deals</h1>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quae eius labore sint magni, ad culpa aspernatur sunt asperiores nihil sequi odit? Voluptatum 
            iusto earum quas porro aut repudiandae est?
        </p>

        <button>view now</button>
    </div>
    <section class="blogs">
        
        <div class="swiper mySwiper ">
            <?php
            $sql ="SELECT * FROM food_menu   limit 20";
            $results =$conn->query($sql);
            $row = $results->fetch_assoc();  
            ?>
            <h3>popular products</h3>
            <div class="swiper-wrapper">
                <?php foreach($results as $row): ?>
                <div class="swiper-slide">
                <?php echo '<img src="./pictures/menu pictures/'.$row['url_image'].'" alt="">'?>
                    <div class="cont">
                        <p><?php echo ($row['food_name']) ?></p>
                        <i class="fas fa-star fa-sl"></i>
                        <i class="fas fa-star fa-sl"></i>
                        <i class="fas fa-star fa-sl"></i>
                        <i class="fas fa-star fa-sl"></i>
                        <p> <a href="productdetails.php?f=<?php echo ($row['food_name']) ?>"><button> view</button></a></p>
                    </div>
                </div>
                <?php endforeach; ?> 
                
            </div>
        </div>
    
        <div class="del">
            <h1>best services </h1>
        </div>

    </section>
    
    
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
</script>
<script>
    var swiper = new Swiper(".myswipe", {
    slidesPerView: "4",
    spaceBetween: 1,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    });
</script>
<?php include('footer.php')?>
</html>