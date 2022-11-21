

<?php include('header.php'); ?>
<section>
    <div class="container h5 text-center pt-3 w-75"> this are your items </div>
    <div class ="container">
        <table class ="table table-bordered table-striped " style="padding:5px;">               
            <thead style="padding:5px;">
                <th>n.o</th>
                <th> image </th>
                <th >name</th>
                <th>price</th>
                <th>qty</th>
                <th>total</th>
            </thead>
            <tbody>
                <?php
                if(isset($_SESSION['cart'])){  
                    foreach($_SESSION['cart']as $item=>$value){
                        echo '
                            <tr style="margin:3px;">
                                <td>'.$value['n.o'].'</td>
                                <td><img src ="./pictures/menu pictures/'.$value['img'].'" alt ="gr" style="width:50px;"></td>
                                <td>'.$value['name'].'</td>
                                <td>'.$value['price'].'</td>
                                <td>'.$value['qty'].'</td>
                                <td>'.$value['total'].'</td>
                                <td><i class="fas fa-trash" style="color:purple;"></i><td>
                            </tr>                
                        ';
                    };
                    //$total =$_SESSION['total'];
                }else{
                    echo" your cart is empty";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div>
        <div class="container h4">customer details</div>
        <?php 
        if (isset($_SESSION['login'])){
            $session =$_SESSION['login'];
            include ('dbconnect.php');
            $sql ="SELECT * FROM customer_table WHERE username = '$session'";
            $results = $conn->query($sql);
            $row =$results->fetch_assoc();
            foreach ($results as $row ){
                echo '
            
                <div class="container card px-3 w-100 ml-3">
                    <p class="lead text-primary"> confirm your details </p>
                    <div class ="row  pl-5">
                        <div class= " col-4 h6">first_name:</div>
                        <div class="col-6"><input value ="'.$row['first_name'].'"></div> 
                    </div>
                    <div class ="row pl-5">
                        <div class= " col-4 h6">second name:</div>
                        <div class="col-6"><input value="'.$row['second_name'].'"></div> 
                    </div>
                    <div class ="row  pl-5">
                        <div class= " col-4 h6">city:</div>
                        <div class="col-5"><input value ="'.$row['city'].'"></div> 
                    </div>
                    <div class ="row pl-5">
                        <div class= " col-4 h6">phone n.o:</div>
                        <div class="col-6"><input value="'.$row['phone'].'"></div> 
                    </div>
                    <div class ="row pl-5 ">
                        <div class= " col-4 h6"> zip adress:</div>
                        <div class="col-6"><input value="'.$row['zip'].'"></div> 
                    </div>
                    <div class ="row pl-5">
                        <div class= " col-4 h6">email:</div>
                        <div class="col-8"><input value="'.$row['email'].'"></div> <br>
                    </div><br>
                    <button class = " btn  btn-sm "> make changes  </button>
                    
                </div>
                ';
            }

        }else {
            echo '<div class ="container  ">   kindly login inorder to track your details  </div> 
            <div class=" container pt-4    w-75 card text-center ">
                <form action="" method="post" id="login">
                    <div id ="alert"></div>
                    <label for="username">username</label><br>
                    <input type="text" name="username"><br>
                    <label for="password">password</label><br>
                    <input type="password" name="password"><br>
                    <input type="checkbox" name = "check"><label for="">remember me?</label><br>
                    <input type="submit" value="log in"><br><br>
                    <span>do nt have an account ?</span><br><br>
                    <input type="button" value="create acount"><br><br>
                </form>
            </div>
            
            
            ';
            
        }
        
        
        ?>
    </div>
    <div id ="orderr" style ="display:none;">
        <p>order has been recieved successfully</p> 
    </div>
    <div class ="container  ml-2  px-4 text-center w-100 ">
        <div class="text-primary"> <em>select apayment method here</em></div>
        <button class = " btn  m-2 card_payment" id="card_p">cardpayment</button> 
        <button class = " btn  m-2 checkout">mpesa</button> 
        <button class = " btn  m-2 checkout">cash on delivery</button>
    </div>
    <form action="post">
        <div class="container card" id="vcard" >

        </div>
    </form>
   
    
    </div>
    <div class ="container pb-5  pt-3 mx-2" >
        <form action="order.php" method="POST" id ="checkout">
            <?php
            if (isset($_SESSION['login'])){
                $session =$_SESSION['login'];
                include ('dbconnect.php');
                $sql ="SELECT * FROM customer_table WHERE username = '$session'";
                $results = $conn->query($sql);
                $row =$results->fetch_assoc();
                foreach ($results as $row ){
                    echo'
                    <input type="hidden" name="cus_id" class="id" value="'.$row['id'].'">
                    <input type="hidden" name="f-name" class="id" value="'.$row['first_name'].'">
                    <input type="hidden" name="s-name"class="name" value="'.$row['second_name'].'">
                    <input type="hidden" name="city" class="img"value="'.$row['city'].'">
                    <input type="hidden" name="zip" class="price"value="'.$row['zip'].'">
                    <input type="hidden" name="email" class="price"value="'.$row['email'].'">
                    <input type="hidden" name="phone" class="price"value="'.$row['phone'].'">
                    ';
                }
                echo'<input type="submit" name="checkout" class="btn btn-warning m-2 checkout"value="place -order"> ';
               
            
            }
            ?>
        </form> 
       
             

    </div>
</section>
<script>
    $("#login").on("submit",function(event){
        event.preventDefault();
        var loginvalues =$(this).serialize();

        $.post("session.php?q=login", loginvalues, function(data){
            $("#alert").html(data);

        })

    });
</script>

<script src="./js/checkout.js"></script>









