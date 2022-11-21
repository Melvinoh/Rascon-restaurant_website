<link rel="stylesheet" href="./rascon.css">
<link rel="stylesheet" href="./fontawsome/css/all.min.css">
<script src="./jquery-3.6.1.min.js"></script>
<script src="./main.js"></script>
<script src="./bootstrap.bundle.min.js"></script>

<?php
session_start();
if (!isset($_SESSION['cart'])){
    $_SESSION['count'] = 0;
    $_SESSION['cart']= array();
    $q = $_GET['q'];
    $rascon = new shopping;
    if($q == 'addtocart'){
        $rascon->addtocart();
        $count = count($_SESSION['cart']);
        $_SESSION['count'] = $count;
    };
}else {
    if (isset($_POST['foodid'])){ 
             
        $q = $_GET['q'];
        $rascon = new shopping;
        if($q == 'addtocart'){
            $rascon->addtocart();
            $count = count($_SESSION['cart']);
            $_SESSION['count'] = $count;  
        }
    }
    $q="your cart is empty";
    $rascon = new shopping;
    $q = $_GET['q'];
   
    if (isset($_POST['id'])){
       
        $fooname = $_POST['id'];
        if($q == 'removefromcart'){
            $rascon->removefromcart();
            $count = count($_SESSION['cart']);
            $_SESSION['count']= $count;
            foreach($_SESSION['cart']as $key=>$value){
            
                $value['n.o'] = $_SESSION['count'];
            }
        }
    }
    
    if($q == 'clearcart'){
        $rascon->clearcart(); 
        $_SESSION['count'] = 0; 
    };
    if($q == 'updatecart'){
        $qty = $_POST['qty'];
        $rascon->updatecart($qty);
    }
}   
class shopping {
    function updatecart($qty){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value['name'] == $_POST['id']){

                $_SESSION['cart'][$key]['qty'] =(int) $qty;
                $qty = $_SESSION['cart'][$key]['qty'];
                $price =(float) $_SESSION['cart'][$key]['price'];
                $_SESSION['cart'][$key]['total'] = number_format($price * $qty,2);
               
                if ($_SESSION['cart'][$key]['qty'] == 0){
                    unset($_SESSION['cart'][$key]); 
                }

            };
        };
    }
    function clearcart(){
        unset($_SESSION['cart']);
        unset($_SESSION['count']);
        //header('location:./cart_data.php');
    }
    function removefromcart(){
        foreach($_SESSION['cart']as $key=>$value)
            if($value['name']===$_POST['id']){
                unset($_SESSION['cart'][$key]);   
                
            }
        }
    function addtocart(){
        $id = $_POST['foodid'];
        $img =$_POST['image'];
        $food_name =$_POST['foodname'];
        $price =$_POST['price'];
        $qty = 1;
        $total = number_format(($price) * $qty,2);
        

        $item_cart_id = array_column($_SESSION['cart'],'name');
        $count = count($_SESSION['cart']);
        $_SESSION['count'] = $count + 1; 
        $cart = array(
            'n.o'=> $_SESSION['count'],
            'id'=>$id,
            'img'=>$img,
            'name'=>$food_name,
            'price'=>$price,
            'qty'=>$qty,
            'total'=>$total,
        );
        if (!in_array($food_name,$item_cart_id)){
                array_push($_SESSION['cart'],$cart);
        }
     
    }
};

// cart display ;
if(isset($_SESSION['cart'])){
    $output="";   
    foreach($_SESSION['cart']as $item=>$value){
        $output.='
        <div class= "item" >
            <div class="cartitem">
                <div class="name">'.$value['name'].'</div>
                <img src ="./pictures/menu pictures/'.$value['img'].'" alt ="gr">
            </div>
            <div class="cart-content">
                <p>  !! unabuy moja y? aa pulaia maisha men<p>
                <div class ="state">
                    <div class="food"> <em>price</em> :'.$value['price'].'
                        <div>
                            <input type="hidden" value ="'.$value['name'].'" class = "name">
                            <em>qty</em><input type="number" value="'.$value['qty'].'" class="uptqty">
                        </div> 
                        <div><em>total</em> : '.$value['total'].'</div> 
                    </div>        
                </div>
            </div>  
            <div class="buttons">
                <a href=""><button> details </button></a>
                <button class="remove" value = "'.$value['name'].'"><i class="fas fa-trash"></i></button>
            </div>
        </div>
        ';
    };
    $ct = $_SESSION['count'];
    $out = "malaya";

    $data['output'] = $out;
    $data['count'] = $ct;
    echo json_encode($data);
    echo($output);
}else{
    echo" your cart is empty";
    
};

   
   
//scripts  for remove,clear, chheckout, and invoice buttons

?>
<script>       
    $(document).ready(function(){
        $(".clear").on("click", function(){
            
            var q = "clearcart"

            $.post("action.php?q=clearcart", q, function(data){
                // Display the returned data in browser
            // alert(data);
            $("#cart").html(data);
            })
        });
    });   

</script> 
<script>
    $(document).ready(function(){
        $(".remove").on("click", function(){
            var id =$(this).val();
            
            $.post("action.php?q=removefromcart", {id:id} , function(data){
                 $("#cart").html(data);
            })
        });
    });  

    $(document).ready(function(){
        $(".uptqty").on("change", function(){
            var qty =$(this).val();
            var id = $(this).siblings(".name").val();
            $.post("action.php?q=updatecart", {qty:qty,id:id} , function(data){
                $("#cart").html(data);
            })
        });
    });  

</script>
