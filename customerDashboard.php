            <?php session_start();
            if(is_null($_SESSION["CFname"]) && is_null($_SESSION["CLname"])){
            $_SESSION["CFname"] = "";
            $_SESSION["CLname"] = "";
            }
            
            ?>    
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
    br.special {
            display: block; /* makes it have a width */
            content: ""; /* clears default height */
            margin-top: 146; /* change this to whatever height you want it */
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
  <form style="text-align:center" action = "customerDashboard.php" method = "post">
    Username: 
    <input type= "text" name= "CFname" placeholder ="..."><br>
    Password:
    <input type= "password" name= "CLname" placeholder ="..."><br>
   <input type="submit" class="loginOut" name="login" value="Login">
   <input type="submit" class="loginOut" name="logout" value="Logout">
  </form>             
           
    <form style="text-align:center" action = "index.php" method = "post">
        <input type = "submit" class="navOperator"  value = "Home" name = "returnHome"><br>
    </form>
    <form style="text-align:center" action = "handleAccounts.php" method = "post">
        <input type = "submit" class="navOperator"  value = "Create/Edit Account" name = "handleAccounts"><br>
    </form>
    <form style="text-align:center" action = "handleOrders.php" method = "post">
        <input type = "submit" class="navOperator"  value = "Handle Order" name = "handleOrders"><br>
    </form> 
     
       </div>       
  
  <!-- handles login storage  -->     
  <?php
  
  error_reporting(E_ALL);
  ini_set('display_errors', 'on');
  
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
  ?>
  
  <div class="col-1">
<form style="text-align:right" action = "customerDashboard.php" method = "post">
    <h3>Search for books</h3>
    <input type="text" style="font-size: 16px; height:50px" name="authorFLname" placeholder="First or Last...">
    <input type="submit" class="regOperator" name="searchByAuthTitleCat" value="Search">
</form>
  </div>  
  
  <div class="col-1">       
<form style="text-align:left" action = "customerDashboard.php" method = "post">
    <h3>Sort All Books By: </h3>
    <select class="regSelect" onchange = "this.form.submit()" name="sortBy">
  <option value="">...</option>
  <option value="Title">Book Title</option>
  <option value="Price">Price</option>
  <option value="Author">Author</option>
  <option value="Publication_Date">Publication Date</option>
  <option value="Reviews">Reviews</option>
  <option value="Category">Category</option>
    </select>
    
</form>
       </div> 
       <div class="col-1"></div>  
       <div class="row"></div>
           <div class="col-4">
<!-- BEGIN PHP CODE, form data handling -->
  <?php

    if(isset($_POST["searchByAuthTitleCat"])) {
        //for searching by an inputted first & last name
    searchByAuthTitleCat();   
    }

    else if(isset($_POST["sortBy"])) {
        //for sorting by price, title, etc
    sortBy();
    }
    else if(isset($_POST["placeOrder"])){
        //for placing orders on a single book
    placeOrder();
    }
    else{
        //else, no options hit, display all book tuples
    displayAllBooks();
    }

    function sortBy(){
    $dbuser = 'id1766566_pipesbj';
	$dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
        
        if(isset($_POST["sortBy"])) {
        $sortBy = $_POST["sortBy"];
        
        switch($sortBy){
            case "Title" : 
                $orderBy = 'Title';
                $orderByStr = 'Title';
                break;
            case "Price" :
                $orderBy = 'Price';
                $orderByStr = 'Price';
                break;
            case "Author" : 
                $orderBy = 'ALname';
                $orderByStr = 'Author\'s Last Name';
                break;
            case "Publication_Date" :
                $orderBy = 'Publication_Date';
                $orderByStr = 'Publication Date';
                break;
            case "Reviews" :
                $orderBy = 'User_Reviews';
                $orderByStr = 'User Review';
                break;
            case "Category" :
                $orderBy = 'Cat_Desc';
                $orderByStr = 'Category';
                break;          
        }
  
        $sql = 'SELECT * FROM Author, Books, Written_By, Book_Categories, Assigned_To '
                 . 'WHERE Author.Author_ID = Written_By.Author_ID'
                 . ' AND Books.ISBN = Written_By.ISBN'
                 . ' AND Books.ISBN = Assigned_To.ISBN'
                 . ' AND Assigned_To.Cat_Code = Book_Categories.Cat_Code'
                 . ' ORDER BY '.$orderBy. ' ASC';
	$result = mysqli_query($conn, $sql);
        
    $row = mysqli_fetch_assoc($result);
    
    echo '<form action = "customerDashboard.php" method = "post">';
    
   if(!is_null($_SESSION["CFname"]) && !is_null($_SESSION["CLname"])){
       
       echo '<div class="alertLogin">
            User: ' .$_SESSION["CFname"].
            '</div>';
        } 

    echo '<p style="text-align:center"><input type="submit" class="regOperator" name="placeOrder" value="Add Selected to Order"></p>';
    echo '<p style="text-align:center"><b> All Books, Sorted by: ' .$orderByStr. ' </b></p>';
  
    echo '<table class="center">'
        . '<tr>'
        . '<th>Order</th>'    
        . '<th>Title</th>'
        . '<th>Price</th>'
        . '<th>Author</th>'
        . '<th>Publication Date</th>'    
        . '<th>User Review</th>'
        . '<th>Category</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
            $bookCt = 0;
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
                $retTitle = $row["Title"];
                $retPrice = $row["Price"];
                $retALname = $row["ALname"];
                $retPubDate = $row["Publication_Date"];
                $retReview = $row["User_Reviews"];
                $retCat = $row["Cat_Desc"];
                
                //fetch ISBN for each book, for use with the radio buttons to
                //place orders
                $sql = 'SELECT ISBN from Books WHERE Title="'.$retTitle .'"';
                $resultISBN = mysqli_query($conn, $sql);
                $rowISBN = mysqli_fetch_assoc($resultISBN);
                $currISBN = $rowISBN["ISBN"];
                
                echo"<tr>";
                echo '<td><input type="radio" name="orderISBN" value="'.$currISBN.'"></td>';
                echo "<td> $retTitle </td>";
                echo "<td> $retPrice </td>";
                echo "<td> $retALname </td>";
                echo "<td> $retPubDate </td>";
                echo "<td> $retReview </td>";
                echo "<td> $retCat </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        }
        else {
            echo "0 results";
        }
        
        echo "</table>";
        echo '</form>';
    }//if sort all books is triggered
  }
  
    function searchByAuthTitleCat(){
     $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    
         /* takes a string that user puts in
          * whether one or two words, searchs author first and last successfully
          * as well as title and category
          * 
         */
    
        $givenString = $_POST["authorFLname"];
        
        $testTwoWords = explode(' ',$givenString);
        if(sizeof($testTwoWords) == 2){
            //if user entered two words. split into first and last name
            $AFStr = $testTwoWords[0];
            $ALStr = $testTwoWords[1];
            $AFwc = "%" .$AFStr. "%";
            $ALwc = "%" .$ALStr. "%";
        }
        else{
            //set first and last name WC to blank. So it doesnt fuck up
            $AFwc = "";
            $ALwc = "";
        }

       $stringwc = "%" . $givenString . "%";
       $sql = 'SELECT * FROM Author, Books, Written_By, Book_Categories, Assigned_To '
            . 'WHERE Author.Author_ID = Written_By.Author_ID'
            . ' AND Books.ISBN = Written_By.ISBN'
            . ' AND Books.ISBN = Assigned_To.ISBN'
            . ' AND Assigned_To.Cat_Code = Book_Categories.Cat_Code'
            . ' AND (CONCAT(Author.AFname," ",Author.ALname) LIKE CONCAT("'.$AFwc.'"," ","'.$ALwc.'")'
            . ' OR Author.AFname LIKE "' . $stringwc .'"' 
            . ' OR Author.ALname LIKE "' . $stringwc .'"'
            . ' OR Books.Title LIKE "'.$stringwc .'"'
            . ' OR Cat_Desc LIKE "'. $stringwc .'")';     
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    echo '<form action = "customerDashboard.php" method = "post">';
   
    if(!is_null($_SESSION["CFname"]) && !is_null($_SESSION["CLname"])){
       
       echo '<div class="alertLogin">
            User: ' .$_SESSION["CFname"].
            '</div>';
        }
        
    echo '<p style="text-align:center"><input type="submit" class="regOperator" name="placeOrder" value="Add Selected to Order"></p>';
    echo '<p style="text-align:center"><b>items that match with: "'.$givenString.'"</b></p>'; 
    echo '<table class="center">'
        . '<tr>'
        . '<th>Order</th>'    
        . '<th>Title</th>'
        . '<th>Price</th>'
        . '<th>Author</th>'
        . '<th>Publication Date</th>'    
        . '<th>User Review</th>'
        . '<th>Category</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
            $bookCt = 0;
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
                $retTitle = $row["Title"];
                $retPrice = $row["Price"];
                $retALname = $row["ALname"];
                $retPubDate = $row["Publication_Date"];
                $retReview = $row["User_Reviews"];
                $retCat = $row["Cat_Desc"];
                
                //fetch ISBN for each book, for use with the radio buttons to
                //place orders
                $sql = 'SELECT ISBN from Books WHERE Title="'.$retTitle .'"';
                $resultISBN = mysqli_query($conn, $sql);
                $rowISBN = mysqli_fetch_assoc($resultISBN);
                $currISBN = $rowISBN["ISBN"];
                
                echo"<tr>";
                echo '<td><input type="radio" name="orderISBN" value="'.$currISBN.'"></td>';
                echo "<td> $retTitle </td>";
                echo "<td> $retPrice </td>";
                echo "<td> $retALname </td>";
                echo "<td> $retPubDate </td>";
                echo "<td> $retReview </td>";
                echo "<td> $retCat </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        }
        else {
            echo '<div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
               We don\'t have any books available that match your searched term. Sorry!
                </div>';
            exit();
        }
        
        echo "</table>";
        echo '</form>';
       
    }//if searchByAuthor is triggered
    
    function displayAllBooks(){
	 $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    
    $sql = 'SELECT * FROM Author, Books, Written_By, Book_Categories, Assigned_To '
                 . 'WHERE Author.Author_ID = Written_By.Author_ID'
                 . ' AND Books.ISBN = Written_By.ISBN'
                 . ' AND Books.ISBN = Assigned_To.ISBN'
                 . ' AND Assigned_To.Cat_Code = Book_Categories.Cat_Code'
                 . ' ORDER BY ALname ASC';
     
    $result = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_assoc($result);
    
   echo '<form action = "customerDashboard.php" method = "post">';
   
   if(!is_null($_SESSION["CFname"]) && !is_null($_SESSION["CLname"])){
       
       echo '<div class="alertLogin">
            User: ' .$_SESSION["CFname"].
            '</div>';
        } 
   
   echo '<p style="text-align:center"><input type="submit" class="regOperator" name="placeOrder" value="Add Selected to Order"></p>';

    echo '<p style="text-align:center"><b> All Books </b></p>';
  
    echo '<table class="center">'
        . '<tr>'
        . '<th>Order</th>'    
        . '<th>Title</th>'
        . '<th>Price</th>'
        . '<th>Author</th>'
        . '<th>Publication Date</th>'    
        . '<th>User Review</th>'
        . '<th>Category</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
            //$bookCt = 0;
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
                $retTitle = $row["Title"];
                $retPrice = $row["Price"];
                $retALname = $row["ALname"];
                $retPubDate = $row["Publication_Date"];
                $retReview = $row["User_Reviews"];
                $retCat = $row["Cat_Desc"];
                
                //fetch ISBN for each book, for use with the radio buttons to
                //place orders
                $sql = 'SELECT ISBN from Books WHERE Title="'.$retTitle .'"';
                $resultISBN = mysqli_query($conn, $sql);
                $rowISBN = mysqli_fetch_assoc($resultISBN);
                $currISBN = $rowISBN["ISBN"];
                
                echo"<tr>";
                echo '<td><input type="radio" name="orderISBN" value="'.$currISBN.'"></td>';
                echo "<td> $retTitle </td>";
                echo "<td> $retPrice </td>";
                echo "<td> $retALname </td>";
                echo "<td> $retPubDate </td>";
                echo "<td> $retReview </td>";
                echo "<td> $retCat </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        }
        else {
            echo "0 results";
        }
        
        echo "</table>";
        echo '</form>';
    }//displays all tuples in book table. no option hit
    
    function placeOrder(){
        
     $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);

        $CFname = $_SESSION["CFname"];
        $CLname = $_SESSION["CLname"];
        
        if ($CLname=="" || $CFname ==""){
        //if user didnt give info to identify account.
            echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
           Please log in to add books to your order tab
            </div>';
            displayAllBooks();
        exit();
        }
        
        //If user tries to order for a non-existing profile, displays error message
        $sql = mysqli_query($conn, 'SELECT CFname, CLname from Customers '
            . 'WHERE CFname="'.$CFname .'" AND CLname="'.$CLname .'"');
        $row = mysqli_fetch_assoc($sql);
        $CFnameAttempt = $row["CFname"];
        $CLnameAttempt = $row["CLname"];
  
        if(is_null($CFnameAttempt) && is_null($CLnameAttempt)){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
           The account to order from doesn\'t exist in the customer list
            </div>';
        displayAllBooks();
        exit();
    }

        if ($CFname =="" || $CLname ==""){
            //if user didnt give info to identify account.
            echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
           Please provide first and last name to identify your account
            </div>';
            displayAllBooks();
        exit();
        }
        
        if (!isset($_POST['orderISBN'])){
        //if user didnt give info to identify account.
            echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Please select a book if you wish to add to order
            </div>';
        displayAllBooks();
        exit();
        } 
        
        //assigns the value of the button, aka the specific ISBN to a variable
        $specISBN = $_POST['orderISBN'];
        
        //fetch the customer ID for the specific customer
        $sql = 'SELECT Customer_ID from Customers WHERE'
                . ' CFname="'.$CFname.'" AND CLname="'.$CLname.'"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $specCustID = $row["Customer_ID"];
           
        $sql = 'SELECT Customer_ID from Orders where Customer_ID='.$specCustID;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $newOrderAttempt = $row["Customer_ID"];
           
           if(is_null($newOrderAttempt)){
               //if the given customer ID doesnt exist in the Order table,
               //insert a new Order tuple
               
               //grab most recent order id.
               $sql = 'SELECT Order_ID FROM Orders ORDER BY Order_ID DESC LIMIT 1';
               $result = mysqli_query($conn, $sql);
               
               //if result is null, no order id exists. Set to 1
               if(!$result){
                   $newOrderID = 1;
               }
               else{
                   //result exists, set order id to most recent + 1
                   $rowOrderID = mysqli_fetch_assoc($result);
                   $newOrderID = $rowOrderID["Order_ID"] + 1;
               }
               
               
               $sql = 'INSERT into Orders(Order_ID, Order_Date, Customer_ID, Placed)'
                . 'VALUES ('.$newOrderID.',"'.date("Y-m-d").'",'.$specCustID.',"N")';
                mysqli_query($conn, $sql);
           }
        
        
           
        //fetch the price for the selected book.
        $sql = 'SELECT Price from Books WHERE ISBN="'.$specISBN.'"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $specPrice = $row["Price"];
        
        //fetch the Order_ID for the current order in use.
        $sql = 'SELECT Order_ID from Orders where Customer_ID='.$specCustID;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $specOrderID = $row["Order_ID"];
        
        //see if order is already placed. if so, dont allow any new books
            $sql = 'SELECT Placed FROM Orders WHERE Order_ID='.$specOrderID;
            $result = mysqli_query($conn, $sql);
            $roworderplaced = mysqli_fetch_assoc($result);
            $orderplaced = $roworderplaced["Placed"];
               if($orderplaced == 'Y'){
                   echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            You\'ve already placed an order. Remove all books from order and start again if you want to add after order placement
            </div>';
                   exit();
               }
        
        //see if an item number exists
        $sql = 'SELECT Item_Number from Order_Items ORDER BY Item_Number DESC LIMIT 1';
        $resultItemNum = mysqli_query($conn, $sql);
        
        if(!$resultItemNum){
            //no item number exists, insert into order items with item_number = 1
            $newItemNum = 1;
        }
        else{
            //item numbers exist, set number to most recent + 1;
            $rowItemNum = mysqli_fetch_assoc($resultItemNum);
            $newItemNum = $rowItemNum["Item_Number"] + 1;
        }
        
         //add order_item to the list of items for a specific customer.   
        $sql = 'INSERT into Order_Items(Item_Number, Item_Price, Order_ID, ISBN, IPlaced)'
                . 'VALUES('.$newItemNum.','.$specPrice.','.$specOrderID.',"'.$specISBN.'","N")';
        mysqli_query($conn, $sql);
        
        $sql = 'UPDATE Orders SET Placed="N" WHERE Order_ID='.$specOrderID;
        mysqli_query($conn, $sql);
        
        //accumulate the total order value.
        $sql = 'SELECT Order_Value from Orders where Order_ID='.$specOrderID;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $specOrderValue = $row["Order_Value"];
        $specOrderValue+= $specPrice;
        
        //update new total order value into repsective tuple
        $sql = 'UPDATE Orders SET Order_Value='.$specOrderValue
                . ' where Order_ID='.$specOrderID;
        $result = mysqli_query($conn, $sql);
        
    echo '<div class="alertItemAdded">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
           Item added to your order tab!
            </div>';
            displayAllBooks();
    
        
    }//places book into order for a specific customer
    
    ?>
</div>           
</body>
