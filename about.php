
<?php include("header.php") ?>
<section class ="sectcontainer">
    <div class="aboutslider"> <h2>about us</h2></div>
    <div class="swiper mySwiper2">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="./pictures/slider pictures/chicken image 1-COLLAGE.jpg" alt="collage1">
                <div class="content">
                    <h5>chicken dinner</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi explicabo debitis
                     ad modi sapiente pariatur laudantium, adipisci minima. Accusamus, perspiciatis.
                    </p>
                    <button>grab table</button>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="./pictures/slider pictures/fish food 2-COLLAGE.jpg" alt="collage1">
                <div class="content">
                    <h5>fish lovers</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi explicabo debitis
                     ad modi sapiente pariatur laudantium, adipisci minima. Accusamus, perspiciatis.
                    </p>
                    <button>grab table</button>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="./pictures/slider pictures/pilau 1-ANIMATION (1).gif" alt="collage1">
                <div class="content">
                    <h5>rice dishes</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi explicabo debitis
                     ad modi sapiente pariatur laudantium, adipisci minima. Accusamus, perspiciatis.
                    </p>
                    <button>grab table</button>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="./pictures/menu pictures/bev 4.jpg" alt="collage1">
                <div class="content">
                    <h5>drinks conner</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi explicabo debitis
                     ad modi sapiente pariatur laudantium, adipisci minima. Accusamus, perspiciatis.
                    </p>
                    <button>grab table</button>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="./pictures/slider pictures/meat image 1-COLLAGE.jpg" alt="collage1">
                <div class="content">
                    <h5>stew dishes</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi explicabo debitis
                     ad modi sapiente pariatur laudantium, adipisci minima. Accusamus, perspiciatis.
                    </p>
                    <button>grab table</button>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="./pictures/slider pictures/meat image 1-COLLAGE (1).jpg" alt="collage1">
                <div class="content">
                     <h5>meat delicacies</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi explicabo debitis
                        ad modi sapiente pariatur laudantium, adipisci minima. Accusamus, perspiciatis.
                    </p>
                    <button>grab table</button>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="./pictures/menu pictures/rice 4.jpg" alt="collage1">
                <div class="content">
                     <h5>deserts pala</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi explicabo debitis
                        ad modi sapiente pariatur laudantium, adipisci minima. Accusamus, perspiciatis.
                    </p>
                    <button>grab table</button>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="./pictures/menu pictures/pizza 1.jpg" alt="collage1">
                <div class="content">
                     <h5>rascon pizza</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi explicabo debitis
                        ad modi sapiente pariatur laudantium, adipisci minima. Accusamus, perspiciatis.
                    </p>
                    <button>grab table</button>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="./pictures/menu pictures/noodels 6.jpg" alt="collage1">
                <div class="content">
                     <h5>noodels treat</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi explicabo debitis
                        ad modi sapiente pariatur laudantium, adipisci minima. Accusamus, perspiciatis.
                    </p>
                    <button>grab table</button>
                </div>
            </div>
        </div>
    </div> 
    <div class="about_us ">
        <img src="./pictures/menu pictures/bev 3.png" alt="about pic ">
        <div class="content">
            <h3>why choose us </h3>
            <h2>best tastes in the country</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro quae, 
                laboriosam dolore mollitia magni veniam accusantium quia ab officia omnis neque 
                odit repellat aliquid velit quo necessitatibus eveniet iste incidunt facere officiis.
                 Obcaecati, odit natus?
            </p>
            <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore,
             quae maxime rem esse repellat perferendis.
            </p>
            <div class="about_icons">
                <button><i class="fas fa-shipping-fast fa-lg"></i><span>fast delivery</span></button>
                <button><i class="fas fa-headset fa-lg"></i><span>24hr service</span></button>
                <button><i class="fas fa-dollar-sign fa-lg"></i><span>easy pay</span></button>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper2", {
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
<?php  include("footer.php") ?>