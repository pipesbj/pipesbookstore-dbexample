<?php session_start();?>    
<head>
    <style>
       body{
            line-height: 1.6;
            font-size: 18px;
            color: #222;
            background-color: whitesmoke;
        }
       table, th, td {
        border: 1px solid black;
        text-align:center;                  
        }
        table.center{
            margin-left:auto;
            margin-right:auto;
        }
        .regOperator{
            font-size: 16px; background: #ccccff; border-color: #3333ff; border-width:3px; height:50px; text-align:center;
        }
        .regOperatorFinalOrder{
            font-size: 16px; background: #66ff66; border-color: #000000; border-width:3px; height:50px; text-align:center;
        }
        .regOperatorAreYouSure{
            font-size: 16px; background: #ff0000; border-color: #000000; border-width:3px; height:50px; width: 150px; text-align:center;
        }
        .navOperator{
            font-size: 16px; background: aliceblue; border-color: activeborder; border-width:3px; width:175px; height:50px; text-align:center; 
        }
        .loginOut{
           font-size: 14px; background: aliceblue; border-color: activeborder; border-width:2px; height:25px; text-align:center; 
        }
        .regSelect{
           height: 50px; font-size: 16px; border-color: #3333ff; border-width:3px;
        }
    * {
        box-sizing: border-box;
    }

    .row::after {
        content: "";
        clear: both;
        display: block;
    }
    [class*="col-"] {
        float: left;
        padding: 15px;
       
    }
    .col-1 {width: 25%;}
    .col-2 {width: 50%;}
    .col-3 {width: 75%;}
    .col-4 {width: 100%;}
    
    .alert {
    position: fixed;
    top: 0px;
    right: 0px;
    width: 33%;
    padding: 20px;
    background-color: #f44336;
    color: white;
    }
    .alertLogin {
    position: fixed;
    top: 0px;
    left: 350px;
    width: 15%;
    padding: 2px;
    background-color: khaki;
    color: black;
    }
    .alertItemAdded {
    position: fixed;
    top: 25px;
    left: 350px;
    width: 15%;
    padding: 5px;
    background-color: #009900;
    color: white;
    }
    .alertSuccess {
    position: fixed;
    top: 0x;
    right: 0px;
    width: 33%;
    padding: 20px;
    background-color: #009900;
    color: white;
    }
    .alertAreYouSure{
    border: solid 1px black;
    position: fixed;
    left: 50%;
    top: 50%;
    background-color: tomato;
    z-index: 100;
    height: 400px;
    margin-top: -200px;
    width: 600px;
    margin-left: -300px;
    color: white;
    padding: 20px;

    }
    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }
    .staticBoxSignature {
    position: fixed;
    bottom: 0px;
    left: 0px;
    width: auto;
    padding: 0px;
    background-color: whitesmoke;
    color: #222;
    font-size: 14px
    }
    .closebtn:hover {
        color: black;
    }
    </style>
    </head>
    <body>
<div class="staticBoxSignature">
           Created By Benjamin Pipes
</div>        
        
     <div class="col-1">
                    <br>
  <form style="text-align:center" action = "handleOrders.php" method = "post">
    Username: 
    <input type= "text" name= "CFname" placeholder ="..."><br>
    Password:
    <input type= "password" name= "CLname" placeholder ="..."><br>
   <input type="submit" class="loginOut" name="login" value="Login">
   <input type="submit" class="loginOut" name="logout" value="Logout">
  </form>  
         
    <form style="text-align:center" action = "customerDashboard.php" method = "post">
        <input type = "submit" class="navOperator"  value = "Home" name = "returnHome"><br>
    </form>
    <form style="text-align:center" action = "handleAccounts.php" method = "post">
        <input type = "submit" class="navOperator"  value = "Create/Edit Account" name = "handleAccounts"><br>
    </form>
            
       </div>
        <!-- handles login storage  -->     
  <?php
  if (isset($_POST["login"])){
  
  //check if given name exists as a customer
  $CFname = $_POST["CFname"];
  $CLname = $_POST["CLname"];
  
     $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    $sql = 'SELECT CFname, CLname from Customers where CFname="'.$CFname .'" AND CLname="'.$CLname .'"';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $CFnameAttempt = $row["CFname"];
    $CLnameAttempt = $row["CLname"];
      
    if(is_null($CFnameAttempt) && is_null($CLnameAttempt)){
        //if user gave customer info that isn't yet created
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
           Customer name doesn\'t exist. Create customer account first before logging in.
            </div>';
    }
    else{
    
  $_SESSION["CFname"] = $CFname;
  $_SESSION["CLname"] = $CLname;    
    }
  }
  else if (isset($_POST["logout"])){
  $_SESSION["CFname"] = null;
  $_SESSION["CLname"] = null;  
  }
  
    if(!is_null($_SESSION["CFname"]) && !is_null($_SESSION["CLname"])){

        echo '<div class="alertLogin">
        User: ' .$_SESSION["CFname"].
        '</div>';
        }
        ?>
        
        <div class="col-2">
    <form style="text-align: center" name="viewOrder" method="POST">
        <input type = "submit" class="regOperator" value = "View Current Order Tab" name = "viewOrder"><br>
    </form>
        </div>   
        
    </body>
   
    
<?php
if (isset($_POST["viewOrder"])){
    displayOrder();
}
else if(isset($_POST["delOrderItem"])){
    deleteOrderItem();
}
else if(isset ($_POST["plAreYouSure"])){
    echo '<div class="alertAreYouSure"> 
          <h4><p>&nbsp&nbsp&nbsp&nbspAre you sure you want to place this order? One an order is finalized, it can not be edited in any way.
          If you want to change an order after placing it, you must wipe it from the database</p></h4>
            <form style="text-align: center" name="areYouSure" method="POST">
            <input type = "submit" class="regOperatorAreYouSure" value = "YES" name = "placeOrder"><br><br>
            <input type = "submit" class="regOperatorAreYouSure" value = "NO" name = "NO"><br>
            </form>
            </div>';
}
else if(isset($_POST["woAreYouSure"])){
   echo '<div class="alertAreYouSure"> 
           <h4><p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAre you sure you want to wipe order? This will erase all items in your tab and clear the placed order from the database</p></h4> 
            <form style="text-align: center" name="areYouSure" method="POST">
            <input type = "submit" class="regOperatorAreYouSure" value = "YES" name = "wipeOrder"><br><br>
            <input type = "submit" class="regOperatorAreYouSure" value = "NO" name = "NO"><br>
            </form>
            </div>'; 
}
else if (isset($_POST["placeOrder"])){
    
    $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);

        $CFname = $_SESSION["CFname"];
        $CLname = $_SESSION["CLname"];
        
        //fetch the customer_ID
        $sql = mysqli_query($conn, 'SELECT Customer_ID from Customers '
                . 'WHERE CFname="'.$CFname .'" AND CLname="'.$CLname .'"');
        $row = mysqli_fetch_assoc($sql);
        $custID = $row["Customer_ID"];      
        
        //fetch the order ID for given customer
        $sql = mysqli_query($conn, 'SELECT Order_ID from Orders '
                . 'WHERE Customer_ID=' .$custID);
        $row = mysqli_fetch_assoc($sql);
        $orderID = $row["Order_ID"];
        
        $sql = 'UPDATE Orders SET Placed="Y" WHERE Customer_ID='.$custID;
        mysqli_query($conn, $sql);
        
        $sql = 'UPDATE Order_Items SET IPlaced="Y" WHERE Order_ID='.$orderID;
        mysqli_query($conn, $sql);
        
    echo '<div class="alertSuccess">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
          Order has been placed
            </div>';
          
}
else if (isset($_POST["wipeOrder"])){
    $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);

        $CFname = $_SESSION["CFname"];
        $CLname = $_SESSION["CLname"];
        
        //fetch the customer_ID
        $sql = mysqli_query($conn, 'SELECT Customer_ID from Customers '
                . 'WHERE CFname="'.$CFname .'" AND CLname="'.$CLname .'"');
        $row = mysqli_fetch_assoc($sql);
        $custID = $row["Customer_ID"];      
        
        //fetch the order ID for given customer
        $sql = mysqli_query($conn, 'SELECT Order_ID from Orders '
                . 'WHERE Customer_ID=' .$custID);
        $row = mysqli_fetch_assoc($sql);
        $orderID = $row["Order_ID"];
        
        $sql = 'DELETE from Orders WHERE Customer_ID='.$custID;
        mysqli_query($conn, $sql);
        
        $sql = 'DELETE from Order_Items WHERE Order_ID='.$orderID;
        mysqli_query($conn, $sql);
        
    echo '<div class="alertSuccess">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Order has been removed from database
            </div>';
}

function deleteOrderItem(){

    $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);

        $CFname = $_SESSION["CFname"];
        $CLname = $_SESSION["CLname"];
        
        //fetch the customer_ID
        $sql = mysqli_query($conn, 'SELECT Customer_ID from Customers '
                . 'WHERE CFname="'.$CFname .'" AND CLname="'.$CLname .'"');
        $row = mysqli_fetch_assoc($sql);
        $custID = $row["Customer_ID"];

        //fetch the order ID for given customer
        $sql = mysqli_query($conn, 'SELECT Order_ID from Orders '
                . 'WHERE Customer_ID=' .$custID);
        $row = mysqli_fetch_assoc($sql);
        $orderID = $row["Order_ID"];
        
        //fetch the order value for given customer
        //if zero, theres no items to delete. Exit routine
        $sql = mysqli_query($conn, 'SELECT Order_Value from Orders '
                . 'WHERE Customer_ID=' .$custID);
        $row = mysqli_fetch_assoc($sql);
        $orderVal = $row["Order_Value"];
        
        if($orderVal == 0.00){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
           There is nothing to delete!
            </div>';
        exit();
        }
        //assigns the selected radio button (isbn) to a variable
        
        if(!isset($_POST['bookISBN'])){
            //user didnt press a book to delete
           echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
           Select a book to delete
            </div>';
        exit(); 
        }
        $specISBN = $_POST['bookISBN'];

        //fetch the price for the selected book.
        $sql = 'SELECT Price from Books WHERE ISBN="'.$specISBN.'"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $specPrice = $row["Price"];
        
        $sql = 'DELETE from Order_Items WHERE ISBN="' .$specISBN.'" '
                . 'AND Order_ID=' .$orderID .' LIMIT 1';
        mysqli_query($conn, $sql);

        //decrease the total order value.
        $sql = 'SELECT Order_Value from Orders where Customer_ID='.$custID;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $specOrderValue = $row["Order_Value"];
        $specOrderValue -= $specPrice;
        
        //update new total order value into repsective tuple
        $sql = 'UPDATE Orders SET Order_Value='.$specOrderValue
                . ' where Customer_ID='.$custID;
        $result = mysqli_query($conn, $sql);  
        
        //if order value = 0, remove order from Order table
        if($specOrderValue <= 0.00){
            $sql = 'DELETE from Orders WHERE Order_ID=' .$orderID;
            mysqli_query($conn, $sql);
             echo '<div class="alertSuccess">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            No items in tab, order removed.
            </div>';
             exit();
        }
        
        $sql = 'UPDATE Orders SET Placed="N" WHERE Customer_ID='.$custID;
        mysqli_query($conn, $sql); 
//        $sql = 'UPDATE Order_Items SET IPlaced="N" WHERE Order_ID='.$orderID;
//        mysqli_query($conn, $sql);
        echo '<div class="alertSuccess">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
          Item removed from order tab
            </div>';

   displayOrder();         
}

function displayOrder(){
   $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    $CFname = $_SESSION["CFname"];
    $CLname = $_SESSION["CLname"];
   
     if($CFname == "" && $CLname == ""){
        //if user gave customer info that isn't yet created
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
           Log in before trying to view an order tab
            </div>';
        exit();
    }
    
    //fetch the customer_ID
    $sql = mysqli_query($conn, 'SELECT Customer_ID from Customers '
            . 'WHERE CFname="'.$CFname .'" AND CLname="'.$CLname .'"');
    $row = mysqli_fetch_assoc($sql);
    $custID = $row["Customer_ID"];
    
    //fetch the order ID for given customer
    $sql = mysqli_query($conn, 'SELECT Order_ID from Orders '
            . 'WHERE Customer_ID=' .$custID);
    $row = mysqli_fetch_assoc($sql);
    $orderID = $row["Order_ID"];
    
    //get current total price for order tab
    $sql = 'SELECT Order_Value from Orders WHERE'
             . ' Order_ID=' .$orderID;  
    $result = mysqli_query($conn, $sql);
    
    if(!$result){
        //no order tab exists for this customer
        echo '<div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
       No order tab exists for you. Add books to tab to create one
        </div>';
        exit();
    }
    //order tab does exist, carry on with instructions
    $row = mysqli_fetch_assoc($result);
    $currTotal = $row["Order_Value"];
    
    $sql = 'SELECT * FROM Author, Books, Written_By, Book_Categories, Assigned_To, Order_Items '
                 . 'WHERE Author.Author_ID = Written_By.Author_ID'
                 . ' AND Books.ISBN = Written_By.ISBN'
                 . ' AND Books.ISBN = Assigned_To.ISBN'
                 . ' AND Assigned_To.Cat_Code = Book_Categories.Cat_Code'
                 . ' AND Order_Items.ISBN= Books.ISBN'
                 . ' AND Order_Items.Order_ID=' .$orderID;
                 
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

echo '<form action = "handleOrders.php" method = "post">';
    echo '<div class="row"></div>';
    echo '<div class="col-4">';
    echo '<h4 style="text-align: center">Your Current Order Tab - $'.$currTotal.'</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th></th>'   
        . '<th>Title</th>'
        . '<th>Author</th>'
        . '<th></th>'    
        . '<th>Item_Price</th>'
        . '<th>Cat_Desc</th>'
        . '<th>User_Reviews</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $Title = $row["Title"];
            $AFname = $row["AFname"];
            $ALname = $row["ALname"];
            $Item_Price = $row["Item_Price"];
            $Cat_Desc =$row["Cat_Desc"];
            $User_Review =$row["User_Reviews"];
             
                $sql = 'SELECT ISBN from Books WHERE Title="'.$Title .'"';
                $resultISBN = mysqli_query($conn, $sql);
                $rowISBN = mysqli_fetch_assoc($resultISBN);
                $currISBN = $rowISBN["ISBN"];
                
                echo"<tr>";
                echo '<td><input type="radio" name="bookISBN" value="'.$currISBN.'"></td>';
                echo "<td> $Title </td>";
                echo "<td> $AFname </td>";
                echo "<td> $ALname </td>";
                echo "<td> $Item_Price </td>";
                echo "<td> $Cat_Desc </td>";
                echo "<td> $User_Review </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
         
        echo "</table>";  
        echo '</div>';
        echo '<div class "row></div>';

       $sql = 'SELECT Placed from Orders WHERE Order_ID=' .$orderID;
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);
       $resultplacedTest = $row["Placed"];
       
       echo '<p style="text-align:center">';
       if($resultplacedTest !='Y'){ 
        
        echo '<br><input type="submit" '
        . 'class="regOperator" '
        . 'name="delOrderItem" value="Delete Selected from Order">';
        
        echo '&nbsp <input type="submit" '
        . 'class="regOperatorFinalOrder" '
        . 'name="plAreYouSure" value="Place Your Order">';
        echo '</form>';
       }
       else{
           echo '<input type="submit" '
        . 'class="regOperatorFinalOrder" '
        . 'name="woAreYouSure" value="Wipe Order">';
        echo '</form>';
       }
        echo '</p>';



}//end display order tab

?>
