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
        text-align: center;                  
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
        .srsOperatorBad{
           font-size: 16px; background: #ff3333; border-color: #990000; border-width:9px; width:175px; height:50px; text-align:center; 
        }
        .srsOperatorGood{
           font-size: 16px; background: #ccccff; border-color: #3333ff; border-width:9px; width:175px; height:50px; text-align:center; 
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
    .col-1 {width: 20%;}
    .col-2 {width: 40%;}
    .col-3 {width: 60%;}
    .col-4 {width: 80%;}
    .col-5 {width: 100%;}
    
    .alert {
    position: absolute;
    top: 0px;
    right: 0px;
    width: 33%;
    padding: 20px;
    background-color: #f44336;
    color: white;
    }
    
    .alertSuccess {
    position: absolute;
    top: 0px;
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
    .staticBoxSQL {
    position: fixed;
    bottom: 0px;
    left: 20%;
    width: auto;
    padding: 0px;
    background-color: whitesmoke;
    color: #222;
    font-size: 14px
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
<div class="staticBoxSignature">
           Created By Benjamin Pipes
</div>    
    <div class="col-1">    
<form style="text-align:center" action = "index.php" method = "post">
    <input type = "submit" class="navOperator"  value = "Home" name = "returnHome"><br>
    </form>
    <form style="text-align:center" action = "customerDashboard.php" method = "post">
    <input type = "submit" class="navOperator"  value = "Customer Home" name = "customerDashboard"><br>
</form> 

<form style="text-align:center" name="displayDBinfo" action="adminDashboard.php" method="POST">
    <h3>- ADMIN OPTIONS -</h3>
    <input type= "submit" class="regOperator" name ="displayDBinfo" value="Show DB info"><br>
</form>
        
<form style="text-align: center" name="showTable" method="POST">
         <select class="regSelect" name="showTable">
           <option value="">. . .</option>
           <option value="customers">Customers</option>
           <option value="orders">Orders</option>
           <option value="books">Books</option>
           <option value="suppliers">Suppliers</option>
           <option value="authors">Authors</option>
           <option value="supplierRep">Supplier Representatives</option>
         </select><br><br>
         <input type="submit" class="regOperator" name="showTables" value="Show Table">
</form>

<form style="text-align: center" name="deleteTable" method="POST">
         <select class="regSelect" name="pickTable">
           <option value="">. . .</option>
           <option value="customers">Customer</option>
           <option value="authors">Author</option>
           <option value="books">Book</option>
           <option value="suppliers">Supplier</option>
         </select><br><br>
         <input type="submit" class="regOperator" name="subPickTable" value="Delete From Database">
</form>
        
<form style="text-align:center" action = "adminAuthorBookRL.php" method = "post">
    <input type = "submit" class="regOperator"  value = "Add new Author / Add Books" name = "adminAuthorBookRL"><br>
</form>

<form style="text-align:center" action = "adminUpdateDetails.php" method = "post">
    <input type = "submit" class="regOperator" value = "Update Entity Details" name = "adminUpdateDetails"><br>
</form>        
        
 <form style="text-align: center" action = "adminDashboard.php" method = "post">
     <h4>- INITIALIZE OR DROP - </h4>
     <input type = "submit" class="srsOperatorGood" value = "Initialize DB" name = "initDB"><br>
</form>

 <!--       
<form style="text-align: center" name = "dropDB" method = "post">     
    <input type = "submit" class="srsOperatorBad" name="dropDB" value = "Drop Database">
</form>
-->

        <div class="row"></div>
        <div class="staticBoxSQL">
<form style="text-align: center" name = "rawSql" method = "post"> 
    <input type="text" style="width: 700px; height: 50px" name="rawSQL" placeholder="type SQL query... (DELETE operations are done using the 'Delete From Database' dropdown + button)">   
    <input type = "submit" class="regOperator" name="subRawSQL" value = "QUERY">
    <input type = "submit" class="regOperator" name="subShowInfo" value = "HELP">
</form>        
        </div>
    </div> 
   
<?php
if(isset($_POST["showTables"])){
    showTables();
}
else if(isset($_POST["subPickTable"])){
    offerEntity();
}
else if(isset($_POST["subDeleteEntity"])){
    deleteGivenEntity();
}
if(isset($_POST["displayDBinfo"])){
    showAllTuples();
}
else if (isset($_POST["initDB"])){
    initDB();
}
else if (isset($_POST["dropDB"])){
    dropDB();
}
else if (isset($_POST["subRawSQL"])){
    $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    
    $sql = $_POST["rawSQL"];
    mysqli_query($conn, $sql);
    
}
else if (isset($_POST["subShowInfo"])){
echo'-Author(Author_ID, Adob, Agender, AFname, ALname, Contact_ID)<br>
    Contact_ID FK → Contact_Details(Contact_ID)<br>
-Books(ISBN, Price, Title, User_Reviews, Publication_Date, Sname)<br>
    Sname FK → Supplier(Sname)<br>
-Contact_Details(Contact_ID)<br>
-Book_Categories(Cat_Code, Cat_Desc)<br>
-Supplier(Sname)<br>
-Customers(Customer_ID, CFname, CLname, Contact_ID)<br>
    Contact_ID FK → Contact_Details(Contact_ID)<br>
-Orders(Order_ID, Order_Value, Order_Date, Customer_ID)<br>
    Customer_ID FK → Customers(Customer_ID)<br>
-Order_Items(Item_Number, Item_Price, Order_ID, ISBN)<br>
    Order_ID FK → Orders(Order_ID)<br>
    ISBN FK → Books(ISBN)<br>
-Supplier_Rep(SRFname, SRLname, ID, Work_Num, Cell_num, Email, Sname)<br>
    Sname FK→ Supplier(Sname)<br>
-Written_By(Author_ID, ISBN)<br>
    Author_ID FK →Author(Author_ID)<br>
    ISBN FK → Books(ISBN)<br>
-Assigned_To(Cat_Code, ISBN)<br>
    Cat_Code FK → Book_Categories(Cat_Code)<br>
    ISBN FK → Books(ISBN)<br>
-Email(Contact_Email, Contact_ID)<br>
    Contact_ID FK → Contact_Details(Contact_ID)<br>
-Address(Contact _Address, Contact_ID)<br>
    Contact_ID FK → Contact_Details(Contact_ID)<br>
-Phone(Contact _Phone, Contact_ID)<br>
    Contact_ID FK → Contact_Details(Contact_ID)<br>';
    
}

function deleteGivenEntity(){
    $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    
    if (isset($_POST["customerID"])){

    $currCustID = $_POST["customerID"];

    //fetch contact ID for deleting contact deails
    $sql = 'SELECT Contact_ID from Customers where Customer_ID=' .$currCustID;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $currContID = $row["Contact_ID"];
    
    //see if order ID exists for given customer
    $sql = 'SELECT Order_ID from Orders where Customer_ID=' .$currCustID;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $orderIDAttempt = $row["Order_ID"];
    
    
    if(!is_null($orderIDAttempt)){
        //order id not null, find and delete order, order items, 
        //customer, and contact details.

        $sql = 'DELETE from Orders WHERE Order_ID='.$orderIDAttempt;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Order_Items WHERE Order_ID='.$orderIDAttempt;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Contact_Details WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Email WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Phone WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Address WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Contact_Details WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Customers WHERE Customer_ID='.$currCustID;
        mysqli_query($conn, $sql); 

    }
    else{
        //order id null, delete customer and contact details
        $sql = 'DELETE from Email WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Phone WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Address WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Contact_Details WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Customers WHERE Customer_ID='.$currCustID;
        mysqli_query($conn, $sql);   
    }
    }//if deleting customer entity
    
    if (isset($_POST["authorID"])){
    //need to delete any books, order items, book categories
    //and contact details associated

    $currAuthID = $_POST["authorID"];

    //fetch contact ID for deleting contact deails
    $sql = 'SELECT Contact_ID from Author where Author_ID=' .$currAuthID;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $currContID = $row["Contact_ID"];
    
    //see if books exists for given author
    $sql = 'SELECT ISBN from Written_By where Author_ID=' .$currAuthID;
    $resultAllISBNS = mysqli_query($conn, $sql);
    $rowAllISBNS = mysqli_fetch_assoc($resultAllISBNS);
    $bookAttempt = $rowAllISBNS["ISBN"];
    if(!is_null($bookAttempt)){
        //book not null, find and delete book, order items, and contact details.
        //see if order exists for any books
        //loop through all ISBNS by author, query order Items for each ISBN
            
        while($rowAllISBNS){
                $bookAttempt = $rowAllISBNS["ISBN"]; //new book ISBN attempt
                $sql = 'SELECT ISBN from Order_Items where ISBN="' .$bookAttempt.'"';
                $resultOrderISBNS = mysqli_query($conn, $sql);
                $rowOrderISBNS = mysqli_fetch_assoc($resultOrderISBNS);
                $orderAttempt = $rowOrderISBNS["ISBN"];
            if(!is_null($orderAttempt)){
                //order item exists with book in it
                //need to loop through all ISBNS, delete book from order_Items 
                //with each new ISBN
                
                //find orders that have these order items in them
                $sql = 'SELECT Order_ID from Order_Items where ISBN="' .$orderAttempt.'"';
                $resultOrderID = mysqli_query($conn, $sql);
                $rowOrderExists= mysqli_fetch_assoc($resultOrderID);
                
                while($rowOrderISBNS){
                    //find price for particular item
                    $sql = 'SELECT Price from Books WHERE ISBN="'.$orderAttempt.'"';
                    $resultPrice = mysqli_query($conn, $sql);
                    $rowTemp = mysqli_fetch_assoc($resultPrice);
                    $rowPrice = $rowTemp["Price"];
                    
                    //while orders exist with these books in them
                    //decrease price for removed book
                    while($rowOrderExists){
                        
                        //fetch current order ID
                        $orderIDforBook = $rowOrderExists["Order_ID"];
                        //fetch current order total for specific order
                        $sql = 'SELECT Order_Value from Orders WHERE Order_ID='.$orderIDforBook;
                        $resultPrice = mysqli_query($conn, $sql);
                        $rowTemp = mysqli_fetch_assoc($resultPrice);
                        $totalPrice = $rowTemp["Order_Value"];
                        
                    //  echo $totalPrice .' - '. $rowPrice .', removing '. $orderAttempt .' from order '. $orderIDforBook.'<br>';
                        $totalPrice -= $rowPrice;
                         
                        //update new order value for specific order
                        $sql = 'UPDATE Orders SET Order_Value='.$totalPrice .' WHERE Order_ID='.$orderIDforBook;
                        mysqli_query($conn, $sql);
                        
                        //if this remove makes the order $0, remove from table
                        if($totalPrice == 0.00){
                            $sql = 'DELETE FROM Orders WHERE Order_ID='.$orderIDforBook;
                            mysqli_query($conn, $sql);
                        }

                        $rowOrderExists= mysqli_fetch_assoc($resultOrderID);
                    }//for each order that holds one of these books
                    
                    $sql = 'DELETE from Order_Items WHERE ISBN="'.$orderAttempt.'"';
                    mysqli_query($conn, $sql);
                    
                    $rowOrderISBNS = mysqli_fetch_assoc($resultOrderISBNS);
                }//while (ISBNS that exist in order_items)
            }//if order_item with specific ISBN exists
            $rowAllISBNS = mysqli_fetch_assoc($resultAllISBNS);
        }//outer while (ISBNs by author)

        //need to loop through all ISBNS, delete book with each new ISBN
        $sql = 'SELECT ISBN from Written_By where Author_ID=' .$currAuthID;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $bookAttempt = $row["ISBN"];
        
        while($row){
//        $sql = 'SELECT ISBN from Written_By where Author_ID=' .$currAuthID;
//        $result = mysqli_query($conn, $sql);
        
        $bookAttempt = $row["ISBN"];
 
        $sql = 'DELETE from Books WHERE ISBN="'.$bookAttempt.'"';
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Written_By WHERE ISBN="'.$bookAttempt.'"';
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Assigned_To WHERE ISBN="'.$bookAttempt.'"';
        mysqli_query($conn, $sql);
        
        $row = mysqli_fetch_assoc($result);
        }//while
        
        $sql = 'DELETE from Email WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Phone WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Address WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Contact_Details WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Author WHERE Author_ID='.$currAuthID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Written_By WHERE Author_ID='.$currAuthID;
        mysqli_query($conn, $sql);
    }
    else{
        //no books written by author, delete from Authors and all contact details    
        $sql = 'DELETE from Email WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Phone WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Address WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Contact_Details WHERE Contact_ID='.$currContID;
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Author WHERE Author_ID='.$currAuthID;
        mysqli_query($conn, $sql);
    }
    }//if deleting author entity   
    if (isset($_POST["bookISBN"])){
    //need to delete any books, orders, order items, and book categories 
    //associated

    $currISBN = $_POST["bookISBN"];

        //book not null, find and delete book, order items, and contact details.
        //see if order exists for any books
        //loop through all ISBNS by author, query order Items for each ISBN   

    //attempt to find an existing order item
    $sql = 'SELECT ISBN from Order_Items where ISBN="' .$currISBN.'"';
    $resultOrderISBN = mysqli_query($conn, $sql);
    $rowOrderISBN = mysqli_fetch_assoc($resultOrderISBN);
    $orderAttempt = $rowOrderISBN["ISBN"];
    if(!is_null($orderAttempt)){
        //order item exists with book in it
        //need delete book from order_Items, reduce total order value
        //for each order with book present

        //find orders that have these order items in them
        $sql = 'SELECT Order_ID from Order_Items where ISBN="' .$orderAttempt.'"';
        $resultOrderID = mysqli_query($conn, $sql);
        $rowOrderExists= mysqli_fetch_assoc($resultOrderID);

        while($rowOrderISBN){
            //find price for particular item
            $sql = 'SELECT Price from Books WHERE ISBN="'.$orderAttempt.'"';
            $resultPrice = mysqli_query($conn, $sql);
            $rowTemp = mysqli_fetch_assoc($resultPrice);
            $rowPrice = $rowTemp["Price"];

            //while orders exist with these books in them
            //decrease price for removed book
            while($rowOrderExists){

                //fetch current order ID
                $orderIDforBook = $rowOrderExists["Order_ID"];
                //fetch current order total for specific order
                $sql = 'SELECT Order_Value from Orders WHERE Order_ID='.$orderIDforBook;
                $resultPrice = mysqli_query($conn, $sql);
                $rowTemp = mysqli_fetch_assoc($resultPrice);
                $totalPrice = $rowTemp["Order_Value"];

             //   echo $totalPrice .' - '. $rowPrice .', removing '. $orderAttempt .' from order '. $orderIDforBook.'<br>';
                $totalPrice -= $rowPrice;

                //update new order value for specific order
                $sql = 'UPDATE Orders SET Order_Value='.$totalPrice .' WHERE Order_ID='.$orderIDforBook;
                mysqli_query($conn, $sql);
                
                //if this removal made total order = $0, remove
                if($totalPrice == 0.00){
                            $sql = 'DELETE FROM Orders WHERE Order_ID='.$orderIDforBook;
                            mysqli_query($conn, $sql);
                        }
                
                $rowOrderExists= mysqli_fetch_assoc($resultOrderID);
            }//for each order that holds one of these books

            $sql = 'DELETE from Order_Items WHERE ISBN="'.$orderAttempt.'"';
            mysqli_query($conn, $sql);

            $rowOrderISBN = mysqli_fetch_assoc($resultOrderISBN);
        }//while (ISBNS that exist in order_items)
    }//if order_item with specific ISBN exists

        $sql = 'DELETE from Books WHERE ISBN="'.$currISBN.'"';
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Written_By WHERE ISBN="'.$currISBN.'"';
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Assigned_To WHERE ISBN="'.$currISBN.'"';
        mysqli_query($conn, $sql);
    }//if deleting book entity
    if (isset($_POST["suppName"])){
    //need to delete any books, order items, book categories
    //and contact details associated
        
    $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);

    $currSupp = $_POST["suppName"];
    
    //see if books exists for given Supplier
    $sql = 'SELECT ISBN from Books where Sname="' .$currSupp.'"';
    $resultAllISBNS = mysqli_query($conn, $sql);
    $rowAllISBNS = mysqli_fetch_assoc($resultAllISBNS);
    $bookAttempt = $rowAllISBNS["ISBN"];
    
    if(!is_null($bookAttempt)){
        //book not null, find and delete book, order items, orders, and supplier
        //see if order exists for any books
        //loop through all ISBNS by author, query order Items for each ISBN
            
        while($rowAllISBNS){
                $bookAttempt = $rowAllISBNS["ISBN"]; //new book ISBN attempt
                $sql = 'SELECT ISBN from Order_Items where ISBN="' .$bookAttempt.'"';
                $resultOrderISBNS = mysqli_query($conn, $sql);
                $rowOrderISBNS = mysqli_fetch_assoc($resultOrderISBNS);
                $orderAttempt = $rowOrderISBNS["ISBN"];
            if(!is_null($orderAttempt)){
                //order item exists with book in it
                //need to loop through all ISBNS, delete book from order_Items 
                //with each new ISBN
                
                //find orders that have these order items in them
                $sql = 'SELECT Order_ID from Order_Items where ISBN="' .$orderAttempt.'"';
                $resultOrderID = mysqli_query($conn, $sql);
                $rowOrderExists= mysqli_fetch_assoc($resultOrderID);
                
                while($rowOrderISBNS){
                    //find price for particular item
                    $sql = 'SELECT Price from Books WHERE ISBN="'.$orderAttempt.'"';
                    $resultPrice = mysqli_query($conn, $sql);
                    $rowTemp = mysqli_fetch_assoc($resultPrice);
                    $rowPrice = $rowTemp["Price"];
                    
                    //while orders exist with these books in them
                    //decrease price for removed book
                    while($rowOrderExists){
                        
                        //fetch current order ID
                        $orderIDforBook = $rowOrderExists["Order_ID"];
                        //fetch current order total for specific order
                        $sql = 'SELECT Order_Value from Orders WHERE Order_ID='.$orderIDforBook;
                        $resultPrice = mysqli_query($conn, $sql);
                        $rowTemp = mysqli_fetch_assoc($resultPrice);
                        $totalPrice = $rowTemp["Order_Value"];
                        
                      //  echo $totalPrice .' - '. $rowPrice .', removing '. $orderAttempt .' from order '. $orderIDforBook.'<br>';
                        $totalPrice -= $rowPrice;
                         
                        //update new order value for specific order
                        $sql = 'UPDATE Orders SET Order_Value='.$totalPrice .' WHERE Order_ID='.$orderIDforBook;
                        mysqli_query($conn, $sql);
                        
                        //if this removal made total order = $0, remove
                        if($totalPrice == 0.00){
                            $sql = 'DELETE FROM Orders WHERE Order_ID='.$orderIDforBook;
                            mysqli_query($conn, $sql);
                        }
                        
                        $rowOrderExists= mysqli_fetch_assoc($resultOrderID);
                    }//for each order that holds one of these books
                    
                    $sql = 'DELETE from Order_Items WHERE ISBN="'.$orderAttempt.'"';
                    mysqli_query($conn, $sql);
                    
                    $rowOrderISBNS = mysqli_fetch_assoc($resultOrderISBNS);
                }//while (ISBNS that exist in order_items)
            }//if order_item with specific ISBN exists
            $rowAllISBNS = mysqli_fetch_assoc($resultAllISBNS);
        }//outer while (ISBNs by author)

        //need to loop through all ISBNS, delete book with each new ISBN
        $sql = 'SELECT ISBN from Written_By where ISBN="' .$bookAttempt.'"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $bookAttempt = $row["ISBN"];
        
        while($row){
        $bookAttempt = $row["ISBN"];
 
//        $sql = 'DELETE from Books WHERE ISBN="'.$bookAttempt.'"';
//        mysqli_query($conn, $sql);
        $sql = 'DELETE from Written_By WHERE ISBN="'.$bookAttempt.'"';
        mysqli_query($conn, $sql);
        $sql = 'DELETE from Assigned_To WHERE ISBN="'.$bookAttempt.'"';
        mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        }//while
    }
    
    //remove all related books from their table
    $sql = 'DELETE from Supplier WHERE Sname="'.$currSupp.'"';
    mysqli_query($conn, $sql);
    $sql = 'DELETE from Books WHERE Sname="'.$currSupp.'"';
     mysqli_query($conn, $sql);
     $sql = 'DELETE from Supplier_Rep WHERE Sname="'.$currSupp.'"';
        $result = mysqli_query($conn, $sql);
    }//if deleting supplier entity
}//deleting a selected entity

function offerEntity(){
    $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    
    if($_POST["pickTable"] == 'customers'){
    echo '<div class="col-1">';
    $sql = 'SELECT CFname, CLname, Customer_ID from Customers';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<form style="text-align: right" name="deleteEntity" method="POST">';
      if (mysqli_num_rows($result) > 0) {
          echo '<select class="regSelect" name="customerID">';
          while ($row) {
              $currCustID = $row["Customer_ID"];
              $currCustF = $row["CFname"];
              $currCustL = $row["CLname"];
              echo '<option value="'.$currCustID.'">'.$currCustF.' '.$currCustL.'</option>';
              $row = mysqli_fetch_assoc($result);
          }
          echo  '</select>';
      }
      echo '<input type="submit" class="regOperator" name="subDeleteEntity" value="Delete Entity">';
      echo '</form>';
      echo '</div>';
    }
    
    else if($_POST["pickTable"] == 'authors'){ 
    echo '<div class="col-1">';
    $sql = 'SELECT AFname, ALname, Author_ID from Author';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<form style="text-align: right" name="deleteEntity" method="POST">';
      if (mysqli_num_rows($result) > 0) {
          echo '<select class="regSelect" name="authorID">';
          while ($row) {
              $currAuthID = $row["Author_ID"];
              $currAuthF = $row["AFname"];
              $currAuthL = $row["ALname"];
              echo '<option value="'.$currAuthID.'">'.$currAuthF.' '.$currAuthL.'</option>';
              $row = mysqli_fetch_assoc($result);
          }
          echo  '</select>';
      }
      echo '<input type="submit" class="regOperator" name="subDeleteEntity" value="Delete Entity">';
      echo '</form>';
      echo '</div>';
    }
    
    else if($_POST["pickTable"] == 'books'){ 
    echo '<div class="col-2">';
    $sql = 'SELECT ISBN, Title from Books';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<form style="text-align: right" name="deleteEntity" method="POST">';
      if (mysqli_num_rows($result) > 0) {
          echo '<select class="regSelect" name="bookISBN">';
          while ($row) {
              $currTitle = $row["Title"];
              $currISBN = $row["ISBN"];
              echo '<option value="'.$currISBN.'">'.$currTitle.'</option>';
              $row = mysqli_fetch_assoc($result);
          }
          echo  '</select>';
      }
      echo '<input type="submit" class="regOperator" name="subDeleteEntity" value="Delete Entity">';
      echo '</form>';
      echo '</div>';
    }
    
    else if($_POST["pickTable"] == 'suppliers'){ 
    echo '<div class="col-1">';
    $sql = 'SELECT Sname from Supplier';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<form style="text-align: right" name="deleteEntity" method="POST">';
      if (mysqli_num_rows($result) > 0) {
          echo '<select  class="regSelect" name="suppName">';
          while ($row) {
              $currSupp = $row["Sname"];
              echo '<option value="'.$currSupp.'">'.$currSupp.'</option>';
              $row = mysqli_fetch_assoc($result);
          }
          echo  '</select>';
      }
      echo '<input type="submit" class="regOperator" name="subDeleteEntity" value="Delete Entity">';
      echo '</form>';
      echo '</div>';
    } 
}

function showTables(){
   $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
   
    if($_POST["showTable"] == 'customers'){
    $sql = 'select * from Customers';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<div class="col-2">';
    echo '<h4 style="text-align: center">Customers</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th>Customer_ID</th>'
        . '<th>CFname</th>'
        . '<th>CLname</th>'
        . '<th>Contact_ID</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $Customer_ID = $row["Customer_ID"];
            $CFname = $row["CFname"];
            $CLname = $row["CLname"];
            $Contact_Id =$row["Contact_ID"];
    
                echo"<tr>";
                echo "<td> $Customer_ID </td>";
                echo "<td> $CFname </td>";
                echo "<td> $CLname </td>";
                echo "<td> $Contact_Id </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table></div>";
    }
    else if($_POST["showTable"] == 'orders'){
    $sql = 'select * from Orders';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    echo '<div class="col-2">';
    echo '<h4 style="text-align: center">Orders</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th>Order_ID</th>'
        . '<th>Order_Value</th>'
        . '<th>Order_Date</th>'
        . '<th>Customer_ID</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $Order_ID = $row["Order_ID"];
            $Order_Value = $row["Order_Value"];
            $Order_Date = $row["Order_Date"];
            $Customer_ID =$row["Customer_ID"];
    
                echo"<tr>";
                echo "<td> $Order_ID </td>";
                echo "<td> $Order_Value </td>";
                echo "<td> $Order_Date </td>";
                echo "<td> $Customer_ID </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table></div>";    
    }
    else if($_POST["showTable"] == 'books'){
    $sql = 'select * from Books';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    echo '<div class="col-3">';
    echo '<h4 style="text-align: center">Books</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th>ISBN</th>'
        . '<th>Price</th>'
        . '<th>Title</th>'
        . '<th>User_Review</th>'
        . '<th>Publication_Date</th>'
        . '<th>Sname</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $ISBN = $row["ISBN"];
            $Price = $row["Price"];
            $Title = $row["Title"];
            $User_Review = $row["User_Reviews"];
            $Publication_Date = $row["Publication_Date"];
            $Sname =$row["Sname"];
                
                echo"<tr>";
                echo "<td> $ISBN </td>";
                echo "<td> $Price </td>";
                echo "<td> $Title </td>";
                echo "<td> $User_Review </td>";
                echo "<td> $Publication_Date </td>";
                echo "<td> $Sname </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table></div>";
    }
    else if($_POST["showTable"] == 'suppliers'){
    $sql = 'select * from Supplier';
    $result = mysqli_query($conn, $sql);
  
    $row = mysqli_fetch_assoc($result);
    
    echo '<div class="col-2">';
    echo '<h4 style="text-align: center">Supplier</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th>Sname</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
            //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $Sname = $row["Sname"];
    
                echo"<tr>";
                echo "<td> $Sname </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table></div>";
        
    $sql = 'select * from Supplier';
    $resultSupp = mysqli_query($conn, $sql);
    $rowSupp = mysqli_fetch_assoc($resultSupp);
    echo '<div class="col-1">';
    while ($rowSupp) {
        //for each supplier, print out books associated with them
        $Sname = $rowSupp["Sname"];
        $sql = 'SELECT Title from Books WHERE Sname="'.$Sname.'"';
        $resultTitle = mysqli_query($conn, $sql);
        $rowTitle = mysqli_fetch_assoc($resultTitle);
        echo '<b>Books from ' .$Sname. ': </b><br>';
        while($rowTitle){
            //for each title associated with supplier, print out the title
            $currTitle = $rowTitle["Title"];
            echo $currTitle .'<br>';
            $rowTitle = mysqli_fetch_assoc($resultTitle);
            
        }
            
    $rowSupp = mysqli_fetch_assoc($resultSupp);
    }
    echo '</div>';
    }//show supplier table
    else if($_POST["showTable"] == 'authors'){
    $sql = 'select * from Author';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    echo '<div class="col-2">';
    echo '<h4 style="text-align: center">Author</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th>Author_ID</th>'
        . '<th>Adob</th>'
        . '<th>Agender</th>'
        . '<th>AFname</th>'
        . '<th>ALname</th>'
        . '<th>Contact_ID</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $Author_ID = $row["Author_ID"];
            $Adob = $row["Adob"];
            $Agender = $row["Agender"];
            $AFname = $row["AFname"];
            $ALname = $row["ALname"];
            $Contact_Id =$row["Contact_ID"];
    
                echo"<tr>";
                echo "<td> $Author_ID </td>";
                echo "<td> $Adob </td>";
                echo "<td> $Agender </td>";
                echo "<td> $AFname </td>";
                echo "<td> $ALname </td>";
                echo "<td> $Contact_Id </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table></div>"; 
    }
    else if ($_POST["showTable"] == 'supplierRep'){
    $sql = 'select * from Supplier_Rep';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<div class="col-3">';
    echo '<h4 style="text-align: center">Supplier Rep</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th>SRFname</th>'
        . '<th>SRLname</th>'
        . '<th>Sname</th>'    
        . '<th>ID</th>'
        . '<th>Work_Num</th>'
        . '<th>Cell_Num</th>'
        . '<th>Email</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $SRFname = $row["SRFname"];
            $SRLname = $row["SRLname"];
            $Sname = $row["Sname"];
            $ID = $row["ID"];
            $Work_Num = $row["Work_Num"];
            $Cell_Num =$row["Cell_Num"];
            $Email = $row["Email"];
                
                echo"<tr>";
                echo "<td> $ID </td>";
                echo "<td> $SRFname </td>";
                echo "<td> $SRLname </td>";
                echo "<td> $Sname </td>";
                echo "<td> $Work_Num </td>";
                echo "<td> $Cell_Num </td>";
                echo "<td> $Email </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table>";
    echo '</div>';        
    }
}

function showAllTuples(){
    $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
	
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    
    $sql = 'select * from Author';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result) or die(mysqli_error($conn));
    
    echo '<div class="col-3">';//****)00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000
    echo '<h4 style="text-align: center">Author</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th>Author_ID</th>'
        . '<th>Adob</th>'
        . '<th>Agender</th>'
        . '<th>AFname</th>'
        . '<th>ALname</th>'
        . '<th>Contact_ID</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $Author_ID = $row["Author_ID"];
            $Adob = $row["Adob"];
            $Agender = $row["Agender"];
            $AFname = $row["AFname"];
            $ALname = $row["ALname"];
            $Contact_Id =$row["Contact_ID"];
    
                echo"<tr>";
                echo "<td> $Author_ID </td>";
                echo "<td> $Adob </td>";
                echo "<td> $Agender </td>";
                echo "<td> $AFname </td>";
                echo "<td> $ALname </td>";
                echo "<td> $Contact_Id </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table>";
        
    $sql = 'select * from Books';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    echo '<h4 style="text-align: center">Books</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th>ISBN</th>'
        . '<th>Price</th>'
        . '<th>Title</th>'
        . '<th>User_Review</th>'
        . '<th>Publication_Date</th>'
        . '<th>Sname</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $ISBN = $row["ISBN"];
            $Price = $row["Price"];
            $Title = $row["Title"];
            $User_Review = $row["User_Reviews"];
            $Publication_Date = $row["Publication_Date"];
            $Sname =$row["Sname"];
                
                echo"<tr>";
                echo "<td> $ISBN </td>";
                echo "<td> $Price </td>";
                echo "<td> $Title </td>";
                echo "<td> $User_Review </td>";
                echo "<td> $Publication_Date </td>";
                echo "<td> $Sname </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table>";
        
    $sql = 'select * from Customers';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    echo '<h4 style="text-align: center">Customers</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th>Customer_ID</th>'
        . '<th>CFname</th>'
        . '<th>CLname</th>'
        . '<th>Contact_ID</th>'

        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $Customer_ID = $row["Customer_ID"];
            $CFname = $row["CFname"];
            $CLname = $row["CLname"];
            $Contact_Id =$row["Contact_ID"];
    
                echo"<tr>";
                echo "<td> $Customer_ID </td>";
                echo "<td> $CFname </td>";
                echo "<td> $CLname </td>";
                echo "<td> $Contact_Id </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table>";
        
    $sql = 'select * from Orders';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    echo '<h4 style="text-align: center">Orders</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th>Order_ID</th>'
        . '<th>Order_Value</th>'
        . '<th>Order_Date</th>'
        . '<th>Customer_ID</th>'
        . '<th>Placed</th>'            
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $Order_ID = $row["Order_ID"];
            $Order_Value = $row["Order_Value"];
            $Order_Date = $row["Order_Date"];
            $Customer_ID =$row["Customer_ID"];
            $Placed = $row["Placed"] ;
                echo"<tr>";
                echo "<td> $Order_ID </td>";
                echo "<td> $Order_Value </td>";
                echo "<td> $Order_Date </td>";
                echo "<td> $Customer_ID </td>";
                echo "<td> $Placed </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table>";       
        
 $sql = 'select * from Order_Items';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    echo '<h4 style="text-align: center">Order_Items</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th>Item_Price</th>'
        . '<th>Order_ID</th>'
        . '<th>ISBN</th>'
        . '<th>IPlaced</th>'
            . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $Item_Number = $row["Item_Number"];
            $Item_Price = $row["Item_Price"];
            $Order_ID = $row["Order_ID"];
            $ISBN =$row["ISBN"];
            $IPlaced = $row["IPlaced"];
                echo"<tr>";
                echo "<td> $Item_Price </td>";
                echo "<td> $Order_ID </td>";
                echo "<td> $ISBN </td>";
                echo "<td> $IPlaced </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table>";      
        
    $sql = 'select * from Book_Categories';
    $result = mysqli_query($conn, $sql);
  
    $row = mysqli_fetch_assoc($result);
    
    echo '<h4 style="text-align: center">Book_Categories</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th>Cat_Code</th>'
        . '<th>Cat_Desc</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $Cat_Code = $row["Cat_Code"];
            $Cat_Desc = $row["Cat_Desc"];
    
                echo"<tr>";
                echo "<td> $Cat_Code </td>";
                echo "<td> $Cat_Desc </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table>";
        
    $sql = 'select * from Supplier';
    $result = mysqli_query($conn, $sql);
  
    $row = mysqli_fetch_assoc($result);
    
    echo '<h4 style="text-align: center">Supplier</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th>Sname</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $Sname = $row["Sname"];
    
                echo"<tr>";
                echo "<td> $Sname </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table>";
        
        
        
        echo '</div>';//****)00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000
echo '<div class="col-1">';
    $sql = 'select * from Assigned_To';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    echo '<h4 style="text-align: center">Assigned_To</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th>Cat_Code</th>'
        . '<th>ISBN</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $Cat_Code = $row["Cat_Code"];
            $ISBN = $row["ISBN"];
    
                echo"<tr>";
                echo "<td> $Cat_Code </td>";
                echo "<td> $ISBN </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table>";
        
        $sql = 'select * from Email ORDER BY Contact_ID ASC';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    
    echo '<h4 style="text-align: center">Email</h4>';    
    echo '<table class="center">'
        . '<tr>'
        . '<th>Contact_Email</th>'
        . '<th>Contact_ID</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $Contact_Email =$row["Contact_Email"];
            $Contact_Id =$row["Contact_ID"];
            
                echo"<tr>";
                echo "<td> $Contact_Email </td>";
                echo "<td> $Contact_Id </td>";
                echo "</tr>";
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table>";
        
        $sql = 'select * from Address ORDER BY Contact_ID ASC';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    
    echo '<h4 style="text-align: center">Address</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th>Contact_Address</th>'
        . '<th>Contact_ID</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $Contact_Address =$row["Contact_Address"];
            $Contact_Id =$row["Contact_ID"];
            
                echo"<tr>";
                echo "<td> $Contact_Address </td>";
                echo "<td> $Contact_Id </td>";
                echo "</tr>";
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table>";
        
        $sql = 'select * from Phone ORDER BY Contact_ID ASC';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    
    echo '<h4 style="text-align: center">Phone</h4>';    
    echo '<table class="center">'
        . '<tr>'
        . '<th>Contact_Phone</th>'
        . '<th>Contact_ID</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $Contact_Phone =$row["Contact_Phone"];
            $Contact_Id =$row["Contact_ID"];
            
                echo"<tr>";
                echo "<td> $Contact_Phone </td>";
                echo "<td> $Contact_Id </td>";
                echo "</tr>";
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table>";
        
    $sql = 'select * from Supplier_Rep';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    echo '<h4 style="text-align: center">Supplier Rep</h4>';
    echo '<table class="center">'
        . '<tr>'
        . '<th>ID</th>'
        . '<th>SRLname</th>'
        . '<th>SRFname</th>'    
        . '<th>Sname</th>'
        . '<th>Work_Num</th>'
        . '<th>Cell_Num</th>'
        . '<th>Email</th>'
        . '</tr>';
    
        if (mysqli_num_rows($result) > 0) {
              //mysqli_fetch_assoc associates an array with the results
            while ($row) {
            $SRFname = $row["SRFname"];
            $SRLname = $row["SRLname"];
            $Sname = $row["Sname"];
            $ID = $row["ID"];
            $Work_Num = $row["Work_Num"];
            $Cell_Num =$row["Cell_Num"];
            $Email = $row["Email"];
                
                echo"<tr>";
                echo "<td> $ID </td>";
                echo "<td> $SRFname </td>";
                echo "<td> $SRLname </td>";
                echo "<td> $Sname </td>";
                echo "<td> $Work_Num </td>";
                echo "<td> $Cell_Num </td>";
                echo "<td> $Email </td>";
                echo "</tr>";
               
                $row = mysqli_fetch_assoc($result);
            }
        } 
        else {
            echo "0 results";
        }
        echo "</table>";    
         echo '</div>';
}

function initDB(){
	$dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    
    $sql = "CREATE DATABASE id1766566_bookstore";
    mysqli_query($conn, $sql);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    $sql = 'CREATE TABLE Author( Author_ID int not null auto_increment, Adob date, Agender char(1),'
        . 'AFname varchar(255), ALname varchar(255), Contact_ID int not null,'
        . 'PRIMARY KEY (Author_ID),'
        . 'CONSTRAINT FOREIGN KEY  (Contact_ID)'
        . 'REFERENCES Contact_Details(Contact_ID) ON DELETE CASCADE ON UPDATE CASCADE'
        . ')';
    mysqli_query($conn, $sql);
    $sql = 'CREATE TABLE Books(ISBN varchar(18) not null, Price decimal(6,2),'
        . 'Title varchar(255), User_Reviews varchar(255), Publication_Date int,'
        . 'Sname varchar(255),'
        . 'PRIMARY KEY (ISBN),'
        . 'CONSTRAINT FOREIGN KEY  (Sname)'
        . 'REFERENCES Supplier(Sname) ON DELETE CASCADE ON UPDATE CASCADE'
        . ')';
   mysqli_query($conn, $sql);
   $sql = 'CREATE TABLE Customers(Customer_ID int auto_increment, CFname varchar(255),'
        . 'CLname varchar(255), Contact_ID int not null,'    
        . 'PRIMARY KEY (Customer_ID),'
        . 'CONSTRAINT FOREIGN KEY  (Contact_ID)'
        . 'REFERENCES Contact_Details(Contact_ID) ON DELETE CASCADE ON UPDATE CASCADE'   
        . ')';
    mysqli_query($conn, $sql);
    $sql = 'CREATE TABLE Contact_Details(Contact_ID int not null,'
        . 'PRIMARY KEY (Contact_ID)'
        . ')';
    mysqli_query($conn, $sql);
    $sql = 'CREATE TABLE Book_Categories(Cat_Code int not null auto_increment, Cat_Desc varchar(255),'    
        . 'PRIMARY KEY (Cat_Code)'
        . ')';
    mysqli_query($conn, $sql);
    $sql = 'CREATE TABLE Supplier(Sname varchar(255) not null,' 
        . 'PRIMARY KEY (Sname)'
        . ')';
    mysqli_query($conn, $sql);
     $sql = 'CREATE TABLE Orders(Order_ID int not null, Order_Value decimal(8,2),'
        . 'Order_Date date, Customer_ID int, Placed char(1),'    
        . 'PRIMARY KEY (Order_ID),'
        . 'CONSTRAINT FOREIGN KEY  (Customer_ID) '
        . 'REFERENCES Customers(Customer_ID) ON DELETE CASCADE ON UPDATE CASCADE'
        . ')';
    mysqli_query($conn, $sql);
    $sql = 'CREATE TABLE Order_Items(Item_Number int not null, Item_Price decimal(6,2),'
        . 'Order_ID int, ISBN varchar(18), IPlaced char(1),'    
        . 'PRIMARY KEY (Item_Number),'
        . 'CONSTRAINT FOREIGN KEY  (Order_ID) REFERENCES Orders(Order_ID),'
        . 'CONSTRAINT FOREIGN KEY  (ISBN) REFERENCES Books(ISBN)'
        . ' ON DELETE CASCADE ON UPDATE CASCADE'
        . ')';
    mysqli_query($conn, $sql);
     $sql = 'CREATE TABLE Supplier_Rep(SRFname varchar(255) not null,'
        . 'SRLname varchar(255) not null, ID int not null, Work_Num varchar(25),'
        . 'Cell_Num varchar(25), Email varchar(255), Sname varchar(255) not null,'    
        . 'PRIMARY KEY (SRFname, SRLname, Sname),'
        . 'CONSTRAINT FOREIGN KEY  (Sname) REFERENCES Supplier(Sname) ON DELETE CASCADE ON UPDATE CASCADE'
        . ')';
   mysqli_query($conn, $sql);
    $sql = 'CREATE TABLE Written_By(Author_ID int not null, ISBN varchar(18) not null,'  
        . 'PRIMARY KEY (Author_ID, ISBN),'
        . 'CONSTRAINT FOREIGN KEY  (Author_ID) REFERENCES Author(Author_ID),'
        . 'CONSTRAINT FOREIGN KEY  (ISBN) REFERENCES Books(ISBN) ON DELETE CASCADE ON UPDATE CASCADE'
        . ')';
    mysqli_query($conn, $sql);
    $sql = 'CREATE TABLE Assigned_To(Cat_Code int not null, ISBN varchar(18) not null,'
        . 'PRIMARY KEY (Cat_Code, ISBN),'
        . 'CONSTRAINT FOREIGN KEY  (Cat_Code) REFERENCES Book_Categories(Cat_Code),'
        . 'CONSTRAINT FOREIGN KEY  (ISBN) REFERENCES Books(ISBN) ON DELETE CASCADE ON UPDATE CASCADE'
        . ')';
    mysqli_query($conn, $sql);
    $sql = 'CREATE TABLE Email(Contact_Email varchar(255) not null,'
        . 'Contact_ID int not null,'
        . 'PRIMARY KEY (Contact_Email, Contact_ID),'
        . 'CONSTRAINT FOREIGN KEY  (Contact_ID) REFERENCES Contact_Details(Contact_ID) ON DELETE CASCADE ON UPDATE CASCADE)';
    mysqli_query($conn, $sql);
    $sql = 'CREATE TABLE Address( Contact_Address varchar(255) not null,'
        . 'Contact_ID int not null,'
        . 'PRIMARY KEY (Contact_Address, Contact_ID),'
        . 'CONSTRAINT FOREIGN KEY  (Contact_ID) REFERENCES Contact_Details(Contact_ID) ON DELETE CASCADE ON UPDATE CASCADE)';
    mysqli_query($conn, $sql);
    $sql = 'CREATE TABLE Phone(Contact_Phone varchar(255) not null,'
        . 'Contact_ID int not null,'
        . 'PRIMARY KEY (Contact_Phone, Contact_ID),'
        . 'CONSTRAINT FOREIGN KEY  (Contact_ID) REFERENCES Contact_Details(Contact_ID) ON DELETE CASCADE ON UPDATE CASCADE)';
    mysqli_query($conn, $sql);
    $sql = 'INSERT INTO Author(Adob, Agender, AFname, ALname, Contact_ID)'
        . 'VALUES ("1945-2-15", "M", "Douglas", "Hofstadter", 1),'
        . '("1928-12-16", "M", "Philip K.", "Dick", 2),'
        . '("1903-7-25", "M", "George", "Orwell", 3),'
        . '("1908-5-28", "M", "Ian", "Fleming", 4),'
        . '("1915-1-6", "M", "Alan", "Watts", 5),'
        . '("1894-7-26","M", "Aldous", "Huxley", 6),'
        . '("1937-7-18", "M", "Hunter S.", "Thompson", 7),'
        . '("1892-1-3", "M", "J.R.R.", "Tolkien",8)';
     mysqli_query($conn, $sql);
    $sql = 'INSERT INTO Contact_Details(Contact_ID)'
            . 'VALUES(1), (2), (3), (4), (5), (6), (7), (8)';
    mysqli_query($conn, $sql);
     $sql = 'INSERT INTO Email(Contact_Email, Contact_ID)'
            . 'VALUES("hofstadter@gmail.com",1),'
            . '("PKD@gmail.com",2), ("orwell@gmail.com",3), ("fleming@gmail.com",4),'
            . '("watts@gmail.com",5), ("huxley@gmail.com",6),("hsthompson@gmail.com",7),'
            . '("JRR@gmail.com",8)';
    mysqli_query($conn, $sql);
    $sql = 'INSERT INTO Address(Contact_Address, Contact_ID)'
            . 'VALUES("123 Hofstadter\'s House",1),'
            . '("123 PKD\'s House",2), ("123 Orwells\'s House",3), ("123 Fleming\'s House",4),'
            . '("123 Watts\' House",5), ("123 Huxley\s House",6), ("Thompson\'s House",7),'
            . '("JRR\'s House",8)';
   mysqli_query($conn, $sql);
    $sql = 'INSERT INTO Phone(Contact_Phone, Contact_ID)'
            . 'VALUES("999-936-9990",1),'
            . '("999-908-9991",2), ("999-369-9992",3), ("999-123-9994",4),'
            . '("912-323-8800",5), ("999-121-1984",6), ("909-111-0021",7),'
            . '("111-323-8080",8)';
    mysqli_query($conn, $sql);
    
$sql = 'INSERT INTO Books(ISBN, Price, Title, User_Reviews, Publication_Date, Sname)'
        . 'VALUES ("978-1-55555-100-0", 19.99, "Godel, Escher, Bach", "Good Book!", 1979, "Baker & Taylor"),'
        . '("978-1-55555-100-1", 12.99, "I am A Strange Loop", "Eye opening.", 2007, "Baker & Taylor"),'
        . '("978-1-55555-200-0", 13.99, "Do Androids Dream of Electric Sheep?", "Neat book.", 1968, "Ingram Content Group"),'
        . '("978-1-55555-200-1", 9.99, "VALIS", "Neat book.", 1981, "Ingram Content Group"),'
        . '("978-1-55555-200-2", 9.99, "The Transmigration of Timothy Archer", "Wew lad!", 1982, "Ingram Content Group"),'
        . '("978-1-55555-200-3", 12.99, "A Scanner Darkly", "Lovely read", 1977, "Ingram Content Group"),'
        . '("978-1-55555-300-0", 12.99, "Nineteen Eighty-Four", "Burn this book", 1948, "A1 Supplier"),'
        . '("978-1-55555-300-1", 7.99, "Animal Farm", "Burn this book", 1945, "A1 Supplier"),'
        . '("978-1-55555-400-0", 7.99, "Casino Royale", "", 1953, "Jonathan Cape"),'
        . '("978-1-55555-400-1", 7.99, "Dr. No", "", 1958, "Jonathan Cape"),'
        . '("978-1-55555-400-2", 7.99, "Goldfinger", "", 1959, "Jonathan Cape"),'
        . '("978-1-55555-400-3", 7.99, "From Russia, with Love", "", 1957, "Jonathan Cape"),'
        . '("0-375-70510-4", 9.50, "The Way of Zen", "", 1957, "Pantheon Books"),'
        . '("0-375-00000-9", 10.75, "The Joyous Cosmology: Adventures in the Chemistry of Consciousness", "", 1960, "Pantheon Books"),'
        . '("0-394-71665-5", 5.00, "Does it Matter?: Essays on Man\'s Relation to Materiality", "", 1970, "Pantheon Books"),'
        . '("999-1-10011-000-0", 15.00, "Brave New World", "", 1932, "Chatto & Windus"),'
        . '("100-0-19232-000-0", 10.00, "The Doors of Perception","Good book!",1954,"Chatto & Windus"),'
        . '("0-679-78589-2", 14.00, "Fear and Loathing in Las Vegas","Interesting book", 1972, "Random House"),'
        . '("0-684-85521-6", 7.50, "The Rum Diary","",1998, "Simon & Schuster"),'
        . '("0-618-00221-9", 10.00, "The Hobbit","",1937, "UK Supplier"),'
        . '("0-618-00222-7", 15.00, "The Fellowship of the Ring","",1954,"UK Supplier"),'
        . '("0-618-00223-5", 15.00, "The Two Towers","",1954,"UK Supplier"),'
        . '("0-618-00224-3", 15.00, "The Return of the King","",1955,"UK Supplier"),'
        . '("978-0007557271", 6.00, "The Adventures of Tom Bombadil","",1962,"UK Supplier")';
    mysqli_query($conn, $sql);
  
$sql = 'INSERT INTO Supplier(Sname)'
        . 'VALUES ("Baker & Taylor"),'
        . '("Ingram Content Group"),'
        . '("A1 Supplier"),'
        . '("Jonathan Cape"),'
        . '("Pantheon Books"),'
        . '("Chatto & Windus"),'
        . '("Random House"),'
        . '("Simon & Schuster"),'
        . '("UK Supplier")';
    mysqli_query($conn, $sql);  
    
$sql = 'INSERT INTO Book_Categories(Cat_Desc)'
        . 'VALUES("Non-Fiction"),'
        . '("Fiction: Mystery"),'
        . '("Fiction: Sci-Fi"),'
        . '("Fiction: General"),'
        . '("Fiction: Fantasy")';
     mysqli_query($conn, $sql); 
     
$sql = 'INSERT INTO Written_By(Author_ID, ISBN)'
        . 'VALUES (1,"978-1-55555-100-0"),'
        . '(1,"978-1-55555-100-1"),'
        . '(2,"978-1-55555-200-0"),'
        . '(2,"978-1-55555-200-1"),'
        . '(2,"978-1-55555-200-2"),'
        . '(2,"978-1-55555-200-3"),'
        . '(3,"978-1-55555-300-0"),'
        . '(3,"978-1-55555-300-1"),'
        . '(4,"978-1-55555-400-0"),'
        . '(4,"978-1-55555-400-1"),'
        . '(4,"978-1-55555-400-2"),'
        . '(4,"978-1-55555-400-3"),'
        . '(5,"0-375-70510-4"),'
        . '(5,"0-375-00000-9"),'
        . '(5,"0-394-71665-5"),'
        . '(6,"999-1-10011-000-0"),'
        . '(6,"100-0-19232-000-0"),'
        . '(7,"0-679-78589-2"),'
        . '(7,"0-684-85521-6"),'
        . '(8,"0-618-00221-9"),'
        . '(8,"0-618-00222-7"),'
        . '(8,"0-618-00223-5"),'
        . '(8,"0-618-00224-3"),'
        . '(8,"978-0007557271")';
    mysqli_query($conn, $sql);

    $sql = 'INSERT INTO Assigned_To(Cat_Code, ISBN)'
        . 'VALUES (1,"978-1-55555-100-0"),'
        . '(1,"978-1-55555-100-1"),'
        . '(3,"978-1-55555-200-0"),'
        . '(3,"978-1-55555-200-1"),'
        . '(3,"978-1-55555-200-2"),'
        . '(3,"978-1-55555-200-3"),'
        . '(4,"978-1-55555-300-0"),'
        . '(4,"978-1-55555-300-1"),'
        . '(2,"978-1-55555-400-0"),'
        . '(2,"978-1-55555-400-1"),'
        . '(2,"978-1-55555-400-2"),'
        . '(2,"978-1-55555-400-3"),'
        . '(1,"0-375-70510-4"),'
        . '(1,"0-375-00000-9"),'
        . '(1,"0-394-71665-5"),'
        . '(4,"999-1-10011-000-0"),'
        . '(1,"100-0-19232-000-0"),'
        . '(1,"0-679-78589-2"),'
        . '(4,"0-684-85521-6"),'
        . '(5,"0-618-00221-9"),'
        . '(5,"0-618-00222-7"),'
        . '(5,"0-618-00223-5"),'
        . '(5,"0-618-00224-3"),'
        . '(5,"978-0007557271")';
        
    mysqli_query($conn, $sql);
    
    $sql = 'INSERT INTO Supplier_Rep(SRFname, SRLname, ID, Work_Num, Cell_Num, Email, Sname)'
        . 'VALUES("John","Doe",1,"999-556-4141","100-909-0022","johndoe@mail.com","A1 Supplier"),'
        . '("Jane","Doe",2,"999-556-4144","100-999-1122","janedoe@mail.com","Ingram Content Group"),'
        . '("Widdly","Scuds",3,"999-556-4555","100-999-5163","scuds@gmail.com","Baker & Taylor"),'
        . '("Bill","Hicks",4,"554-551-4123","999-922-3232","hicks@hotmail.com","Jonathan Cape"),'
        . '("Roger","Moore",5,"656-999-2233","121-999-9090","bond@gmail.com","Pantheon Books"),'
        . '("Rusty","Shackleford",6,"999-554-9999","100-909-9999","fakeEmail@mail.com","Chatto & Windus"),'
        . '("Peggy", "Hill",7,"400-111-9023","999-999-2323","hill@gmail.com","Random House"),'
        . '("Bill","Wilson",8,"112-323-4222","100-922-0222","bigguy@mail.com","Simon & Schuster"),'
        . '("Sheev","Palpatine",9,"999-111-4122","133-909-0312","sheevspin@mail.com","UK Supplier")';
    mysqli_query($conn, $sql); 
    
    echo '<div class="alertSuccess">
        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Created DB, tables, inserted dummy tuples.
            </div>'; 
  
}

function dropDB(){
    $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
	
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    $sql = 'DROP DATABASE id1766566_bookstore';
    mysqli_query($conn, $sql);
    
    echo '<div class="alertSuccess">
        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            DB dropped.
            </div>';
    
}

?>
</body>