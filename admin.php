<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>rascon_tasates</title>
        <link rel="stylesheet" href="./rascon.css">
        <link rel="stylesheet" href="./fontawsome/css/all.min.css">
        <script src="./rascon.js"></script>
        <script src="/java scripts/src/scriptaculous.js"></script>
        <script src="/java scripts/src/prototype.js"></script>
    </head>
    <body>
      <header class="header ">
            <div class="title">
                <img src="./pictures/wall paper/wall paper 3.jpg" alt="logo">
                <h2>Rascon Tastes</h2>
                <i class="fas fa-utensils"></i>
            </div>
            <nav id="nav">
                <a href="#food_upload">food_upload</a>
                <a href="#payments">payments</a>
                <a href="#oder_details">order details</a>
                <a href="#category_details ">food category</a>
                <a href="#casier details">contacts </a>
           </nav>
        </header>
        <div class="food" id="food_upload ">
            <form action="" class="food_upld">
                <label for="food">food_name</label>
                <input type="text" name="fd_name">
                <label for="category">category</label>
                <select name="category" id="">
                    <option value="chicken">chicken</option>
                    <option value="fish">fish</option>
                    <option value="meat_delicacies">meat_delicacies</option>
                    <option value="rice_recipe">rice recipe </option>
                    <option value="stew dishes">stew dishes</option>
                    <option value="bevarages">bevarages</option>
                    <option value="noodels">noodels spices</option>
                    <option value="deserts">deserts </option>
                </select>
                <label for="food">price</label>
                <input type="text" name="price">
                <label for="food">image</label>
                <input type="file" name="url_image">
                <lable for="status">status</lable>
                <input type="text" name="status">
                <input type="submit"name="upload" value="upload">
            </form>
        </div>
        <div class='login'>
        <form action="" method="post">
                <label for="user">user name</label>
                <input type="text" name="admin_user">
                <label for="user">admin_id</label>
                <input type="text" name="admin_id">
                <input type="submit" name="submit" value="login" >
            </form>
        </div>
        <?php
        if (isset($_POST['submit'])){

            $user = $_POST['admin_user'];
            $admin_id =$_POST['admin_id'];

            include("dbconnect.php");
            $results =$conn->query("SELECT 'f_name' WHERE id ='$admin_id'");
            $row = $results->fetch_assoc();
            if ($row['f_name'] === $user){
                session_start();
                $_SESSION['login']= $user;
                session_id("$admin_id");         
            }
            else{
                echo "incorrect username / id";
            }
        };
        ?>
    </body>
</html>