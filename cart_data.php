<link rel="stylesheet" href="./rascon.css">
<?php

session_start();
// include ('db.php');

if(isset($_SESSION['cart'])){

 $output="";   
     foreach($_SESSION['cart']as $item=>$value){
         $output.=
         '   <div class="cartitem">
                 <span class="food">'.$value['n.o'].'</span>
                 <span class="food">'.$value['img'].'</span>
                 <span class="food">'.$value['name'].'</span>
                 <span class="food">'.$value['price'].'</span>
                 <span class="food">'.$value['qty'].'</span>    
                 <span class="food"><a href= "action.php?q=removefromcart&id='.$value['name'].' "><button class="remove">remove</button></span>              
             </div>
                       
         ';
     };
     $output.='<button class ="clear"><a href= "action.php?q=clearcart> clear cart</a></button>';
     echo ($output); 
}else{
     echo" your cart is empty";
}
?>    


            
            
    
