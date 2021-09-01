<?php
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./shop.css">
</head>
<body>
<h1>Online Stationary Shop</h1>
    <div id="container">
        <header>
            <div class="topnav">
                <a  href="./stationary.php">Home</a>
                <a class="active"  href="#shop" >Shop</a>
                <a href="./orders.php">orders</a>
           </header>
</div>
  <div id="items">
    <?php
                $sql="select * from product";
                $res=$conn->query($sql);
                $imagesLinks["pen"] = "./HomePageImages/pen.jpg";
                $imagesLinks["notepad"] = "./HomePageImages/notepad.png";
                $imagesLinks["pencil"] = "./HomePageImages/pencil.jpg";
                if($res->num_rows > 0)
                {
                        while($row=$res->fetch_assoc())
                        {
                          echo '
                            <div class="flex=-item"><h2>'.$row['name'].'</h2><img id="image1" src="'.$imagesLinks[$row["name"]].'" width="300px" height="300px"/>
                            <p> Available item(s)='.$row['quantity'].'</p>
                            <p>Price:Rs '.$row['price'].'per/item </p>
                            <button class="book">order</button>
                            </div>';
                        }
                }
    ?>
</div>
 </body>
</html>
