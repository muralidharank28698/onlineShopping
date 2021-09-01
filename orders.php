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
                <a  href="./home.php">Home</a>
                <a  href="./shop.php" >Shop</a>
                <a class="active"  href="./orders.php">orders</a>
           </header>
</div>

<?php
 $sql="SELECT sum(price) as total from orders";
 $res=$conn->query($sql);
 if($res->num_rows > 0)
                {
                    $row=$res->fetch_assoc();
                    echo "<h2>TotalBill:".$row['total']."</h2>" ;
                }
                else{
                    echo "no items";

                }
?>

<div id="items">
<?php
                $sql="select * from orders";
                $res=$conn->query($sql);
                $imagesLinks["pen"] = "./HomePageImages/pen.jpg";
                $imagesLinks["notepad"] = "./HomePageImages/notepad.png";
                if($res->num_rows > 0)
                {
                        while($row=$res->fetch_assoc())
                        {
                          echo '
                            <div class="flex=-item"><h2>'.$row['name'].'</h2><img id="image1" src="'.$imagesLinks[$row["name"]].'" width="300px" height="300px"/>
                            
                            <p>Price:Rs '.$row['price'].'per/item </p>
                           
                            </div>';
                        }
                }
        ?>
</div>
 </body>
</html>