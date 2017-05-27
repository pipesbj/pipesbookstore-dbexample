<?php
session_start();
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
    .col-1 {width: 25%;}
    .col-2 {width: 50%;}
    .col-3 {width: 75%;}
    .col-4 {width: 100%;}
    
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
    <input type = "submit" class="navOperator" value = "Home" name = "returnHome"><br>
    </form>
    <form style="text-align:center" action = "adminDashboard.php" method = "post">
    <input type = "submit" class="navOperator" value = "Go back" name = "adminDashboard"><br>
    </form>
</div>
    <div class="col-2">

        <form style="text-align: center" action="adminUpdateDetails.php" name="updateTable" method="POST">
         <select class ="regSelect" name="pickTable">
           <option value="">. . .</option>
           <option value="customers">Customer</option>
           <option value="authors">Author</option>
           <option value="books">Book</option>
           <option value="supplier">Supplier</option>
           <option value="supplierRep">Supplier Representative</option>
         </select>
        <input type="submit" class="regOperator" name="subPickTableUp" value="Update From Table">
         
            <?php
         if (isset($_POST["subPickTableUp"])){
            
            offerEntityUp();
            }
         ?>
           
        
</form>
        </div>
    <div class="col-1"></div>
<?php

//if (isset($_POST["subPickTableUp"])){
//    offerEntityUp();
//}
if (isset($_POST["subUpdateEntity"])){
    offerEntityFields();
    }
else if(isset($_POST["subUpdateCustField"])){
    updateGivenCustFields();
}
else if(isset($_POST["subUpdateAuthField"])){
    updateGivenAuthFields();
}
else if(isset($_POST["subUpdateBookField"])){
    updateGivenBookFields();
}
else if(isset($_POST["subUpdateSuppField"])){
    updateGivenSuppField();
}
else if(isset($_POST["subUpdateSRField"])){
    updateGivenSRField();
}

function offerEntityUp(){
     $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    
    if($_POST["pickTable"] == 'customers'){
    $sql = 'SELECT CFname, CLname, Customer_ID from Customers';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<form style="text-align: center; height: 50px; font-size: 16px;" name="pickEntity" method="POST">';
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
      echo '<input type="submit" class="regOperator" name="subUpdateEntity" value="Update Entity">';
      echo '</form>';
    }
    
    else if($_POST["pickTable"] == 'authors'){ 
    $sql = 'SELECT AFname, ALname, Author_ID from Author';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<form style="text-align: center; height: 50px; font-size: 16px;" name="pickEntity" method="POST">';
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
      echo '<input type="submit" class="regOperator" name="subUpdateEntity" value="Update Entity">';
      echo '</form>';

    }
    
    else if($_POST["pickTable"] == 'books'){ 
    $sql = 'SELECT ISBN, Title from Books';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<form style="text-align: center; height: 50px; font-size: 16px;" name="pickEntity" method="POST">';
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
      echo '<input type="submit" class="regOperator" name="subUpdateEntity" value="Update Entity">';
      echo '</form>';
    }
    
    else if($_POST["pickTable"] == 'supplier'){
    $sql = 'SELECT Sname from Supplier';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<form style="text-align: center; height: 50px; font-size: 16px;" name="pickEntity" method="POST">';
      if (mysqli_num_rows($result) > 0) {
          echo '<select class="regSelect" name="Sname">';
          while ($row) {
              $currSname = $row["Sname"];
              echo '<option value="'.$currSname.'">'.$currSname.'</option>';
              $row = mysqli_fetch_assoc($result);
          }
          echo  '</select>';
      }
      echo '<input type="submit" class="regOperator" name="subUpdateEntity" value="Update Entity">';
      echo '</form>';
    }
    else if($_POST["pickTable"] == 'supplierRep'){
    $sql = 'SELECT SRFname, SRLname, ID from Supplier_Rep';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<form style="text-align: center; height: 50px; font-size: 16px;" name="pickEntity" method="POST">';
      if (mysqli_num_rows($result) > 0) {
          echo '<select class="regSelect" name="SRID">';
          while ($row) {
              $currSRID = $row["ID"];
              $currSRFname = $row["SRFname"];
              $currSRLname = $row["SRLname"];
              echo '<option value="'.$currSRID.'">'.$currSRFname.' '.$currSRLname.'</option>';
              $row = mysqli_fetch_assoc($result);
          }
          echo  '</select>';
      }
      echo '<input type="submit" class="regOperator" name="subUpdateEntity" value="Update Entity">';
      echo '</form>';
    }
}

function offerEntityFields(){
     $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    
    if (isset($_POST["customerID"])){

    $_SESSION["custID"] = $_POST["customerID"];
    $currCustID = $_SESSION["custID"];
    
     if(is_null($currCustID)){ 
        echo '<h1> No authors to choose from </h1>';
    }
    else{
        //get author first and last name for ease of use
    $sql = 'SELECT CFname, CLname from Customers where Customer_ID=' .$currCustID;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $currCFname = $row["CFname"];
    $currCLname = $row["CLname"];
    }
    
    //fetch contact ID for updating contact deails
    $sql = 'SELECT Contact_ID from Customers where Customer_ID=' .$currCustID;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $currContID = $row["Contact_ID"];
    $_SESSION["contID"] = $currContID;
    
    echo '<div class="row"></div>';
   echo '<div class="col-1"></div>';
    echo '<div class="col-2">';
    echo '<h4 style="text-align:center">Editing: ' .$currCFname .' ' .$currCLname .'</h4>';

    echo '<form style="text-align: center" name="pickEntityField" method="POST">';
              echo 'First Name ';
              echo '<input type="text" name="CFname" placeholder="New first name..."><br>';
              echo 'Last Name ';
              echo '<input type="text" name="CLname" placeholder="New last name..."><br>';
              echo 'Phone ';
              echo '<input type="text" name="Contact_Phone" placeholder="New Phone..."><br>';
              echo 'Email ';
              echo '<input type="text" name="Contact_Email" placeholder="New Email..."><br>';
              echo 'Address ';
              echo '<input type="text" name="Contact_Address" placeholder="New Address..."><br>';
              
      echo '<input type="submit" class="regOperator" name="subUpdateCustField" value="Update Field">';
      echo '</form>';
      echo '</div>';
    
     }//if updating customer fields
     else if (isset($_POST["authorID"])){

    $_SESSION["authID"] = $_POST["authorID"];
    $currAuthID = $_SESSION["authID"];
    
    if($currAuthID == ""){ 
        echo '<h1> No authors to choose from </h1>';
    }
    else{
        //get author first and last name for ease of use
    $sql = 'SELECT AFname, ALname from Author where Author_ID=' .$currAuthID;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $currAFname = $row["AFname"];
    $currALname = $row["ALname"];
    }
    
    //fetch contact ID for updating contact deails
    $sql = 'SELECT Contact_ID from Author where Author_ID=' .$currAuthID;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $currContID = $row["Contact_ID"];
    $_SESSION["authContID"] = $currContID;
    
    echo '<div class="row"></div>';
    echo '<div class="col-1"></div>';
    echo '<div class="col-2">';
    echo '<h4 style="text-align:center">Editing: ' .$currAFname .' ' .$currALname .'</h4>';
    echo '<form style="text-align: center" name="pickEntityField" method="POST">';
              echo 'First Name ';
              echo '<input type="text" name="AFname" placeholder="New first name..."><br>';
              echo 'Last Name ';
              echo '<input type="text" name="ALname" placeholder="New last name..."><br>';
              echo 'Phone ';
              echo '<input type="text" name="Contact_Phone" placeholder="New Phone..."><br>';
              echo 'Email ';
              echo '<input type="text" name="Contact_Email" placeholder="New Email..."><br>';
              echo 'Address ';
              echo '<input type="text" name="Contact_Address" placeholder="New Address..."><br>';
              
      echo '<input type="submit" class="regOperator" name="subUpdateAuthField" value="Update Field">';
      echo '</form>';
      echo '</div>';
    
     }//if updating Author fields
     
     else if (isset($_POST["bookISBN"])){

    $_SESSION["ISBN"] = $_POST["bookISBN"];
    $selectedISBN = $_SESSION["ISBN"];
    
        //get Title for ease of use
    $sql = 'SELECT Title from Books where ISBN="' .$selectedISBN.'"';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $selectedTitle = $row["Title"];

    echo '<div class="row"></div>';
    echo '<div class="col-1"></div>';
    echo '<div class="col-2">';
    echo '<h4 style="text-align:center">Editing: ' .$selectedTitle .'</h4>';
    echo '<form style="text-align: center" name="pickEntityField" method="POST">';
              echo 'Title ';
              echo '<input type="text" name="Title" placeholder="New Title..."><br>';
              echo 'Price ';
              echo '<input type="text" name="Price" placeholder="New Price..."><br>';
              echo 'Category ';
              echo '<input type="text" name="Category" placeholder="New Category..."><br>';
              echo 'Supplier ';
              echo '<input type="text" name="Supplier" placeholder="New Supplier..."><br>';
              echo 'User Review ';
              echo '<input type="text" name="UserReview" placeholder="New User Review..."><br>';
              
      echo '<input type="submit" class="regOperator" name="subUpdateBookField" value="Update Field">';
      echo '</form>';
      echo '</div>';
    
     }//if updating Book fields

     else if (isset($_POST["Sname"])){
     $_SESSION["Sname"] = $_POST["Sname"];
    $selectedSname = $_SESSION["Sname"];

    echo '<div class="row"></div>';
    echo '<div class="col-1"></div>';
    echo '<div class="col-2">';
    echo '<h4 style="text-align:center">Editing: ' .$selectedSname .'</h4>';
    echo '<form style="text-align: center" name="pickEntityField" method="POST">';
              echo 'Supplier name: ';
              echo '<input type="text" name="Supplier" placeholder="New Name..."><br>';
              
      echo '<input type="submit" class="regOperator" name="subUpdateSuppField" value="Update Field">';
      echo '</form>';
      echo '</div>';    
     }
     else if(isset($_POST["SRID"])){
    $_SESSION["SRID"] = $_POST["SRID"];
    $selectedSRID = $_SESSION["SRID"];
    
    $sql = 'SELECT SRFname, SRLname from Supplier_Rep WHERE ID='.$selectedSRID;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $SRFname = $row["SRFname"];
    $SRLname = $row["SRLname"];
    
    echo '<div class="row"></div>';
    echo '<div class="col-1"></div>';
    echo '<div class="col-2">';
    echo '<h4 style="text-align:center">Editing: ' .$SRFname.' '.$SRLname .'</h4>';
    echo '<form style="text-align: center" name="pickEntityField" method="POST">';
              echo ' First Name: ';
              echo '<input type="text" name="SRFname" placeholder="New First..."><br>';
              echo ' Last Name: ';
              echo '<input type="text" name="SRLname" placeholder="New Last..."><br>';
              echo ' Work Number: ';
              echo '<input type="text" name="Work_Num" placeholder="New Work Phone..."><br>';
              echo ' Cell Number: ';
              echo '<input type="text" name="Cell_Num" placeholder="New Cell Phone..."><br>';
              echo ' Email: ';
              echo '<input type="text" name="Email" placeholder="New Email..."><br>';
              echo ' Supplier: ';
              echo '<input type="text" name="Supplier" placeholder="New Supplier..."><br>';
      echo '<input type="submit" class="regOperator" name="subUpdateSRField" value="Update Field">';
      echo '</form>';
      echo '</div>';  
     }
}

function updateGivenBookFields(){
     $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    $selectedISBN = $_SESSION["ISBN"]; 
        
    $Title = $_POST["Title"];
    $Price = $_POST["Price"];
    $Category = $_POST["Category"];
    $Supplier = $_POST["Supplier"];
    $User_Review = $_POST["UserReview"];
    
    //get old information
    $sql = 'SELECT Title, Price, Sname from Books WHERE ISBN="'. $selectedISBN.'"';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $oldTitle = $row["Title"];
 //   $oldPrice = $row["Price"];
    $oldSupp = $row["Sname"];
    $sql = 'SELECT Cat_Code from Assigned_To WHERE ISBN="'.$selectedISBN.'"';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $oldCatCode = $row["Cat_Code"];
    
   
    if ($Title != ""){
        //title not null
        //check for duplicate title
        
        $sql = 'SELECT ISBN from Books WHERE Title ="'.$Title.'"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $dupeTitle = $row["ISBN"];
        
        if(!is_null($dupeTitle)){
               echo '<div class="alert">
               <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
               Title exists withing the database. Use unique title
               </div>';
           exit();
        }
        $sql = 'UPDATE Books SET Title="'.$Title.'" WHERE ISBN="'.$selectedISBN.'"';
        $result = mysqli_query($conn, $sql);
    }//if title field wants to be changed.
    
    if ($Supplier !=""){
        //supplier not null
        //check if supplier already exists
        
        $sql = 'SELECT ISBN from Books WHERE Sname="'.$Supplier.'" AND ISBN="'.$selectedISBN. '"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $dupeSupplier = $row["ISBN"];
        
        if(!is_null($dupeSupplier)){
            //supplier given already exists
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Supplier already supplies this book. Supplier not changed
            </div>';
        exit(); 
        }
        $sql = 'UPDATE Books SET Sname="'.$Supplier.'" WHERE ISBN="'.$selectedISBN.'"';
        $result = mysqli_query($conn, $sql);
        $sql = 'INSERT INTO Supplier(Sname) VALUES ("'.$Supplier.'")';
        $result = mysqli_query($conn, $sql);
        
        //if the supplier change made a supplier supply zero books, delete from DB
        $sql = 'SELECT ISBN from Books WHERE Sname="'.$oldSupp.'"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $dupeSupplier = $row["ISBN"];
        
        if(is_null($dupeSupplier)){
            //old supplier doesnt exist for any books anymore
        $sql = 'DELETE from Supplier WHERE Sname="'.$oldSupp.'"';
        $result = mysqli_query($conn, $sql);
        }
        
    }//if supplier fields wants to be changed
    
    if ($Category !=""){
        //category not null
        //check if category already tied to book
             
        $sql = 'SELECT Cat_Code from Book_Categories WHERE Cat_Desc="'.$Category.'"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $existingCatCode = $row["Cat_Code"];
        
        $sql = 'SELECT ISBN from Assigned_To WHERE ISBN="'.$selectedISBN.'" AND Cat_Code="'.$existingCatCode.'"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $dupeCat = $row["ISBN"];
 
        if(!is_null($dupeCat)){
        //category already tied to this book
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Category already tied to this book. Category not changed
            </div>';
        exit(); 
        }
        
        //check if category already exists for any book.     
        if(!is_null($existingCatCode)){
        //category exists already
        
        //delete whatever the book was tied to
        $sql = 'DELETE FROM Assigned_to WHERE ISBN="'.$selectedISBN.'"';
        mysqli_query($conn, $sql);    
        
        //tie entered category to selected book
        $sql = 'INSERT INTO Assigned_To(Cat_Code, ISBN) VALUES ('.$existingCatCode.',"'.$selectedISBN.'")';
        mysqli_query($conn, $sql);
        
        }
        else{
            //category doesnt exist
            //enter new category and tie 
            
            //delete whatever the book was tied to
            $sql = 'DELETE FROM Assigned_to WHERE ISBN="'.$selectedISBN.'"';
            mysqli_query($conn, $sql);
            
            //select last existing cat code
            $sql = 'SELECT Cat_Code from Book_Categories ORDER BY Cat_Code DESC LIMIT 1';
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $newCatCode = $row["Cat_Code"] + 1;
            
            $sql = 'INSERT INTO Assigned_To(Cat_Code, ISBN) VALUES ('.$newCatCode.',"'.$selectedISBN.'")';
            mysqli_query($conn, $sql);
            
            $sql = 'INSERT INTO Book_Categories(Cat_Code, Cat_Desc) VALUES ('.$newCatCode.',"'.$Category.'")';
            mysqli_query($conn, $sql);
        }
    }//if category field wants to be changed
    
    if ($Price != ""){
        if(!preg_match("~^[0-9]+.[0-9]+$~", $Price)){
           echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Enter proper price. Check for typo
            </div>';
        exit();  
        }
        if($Price <= 0.00){
           echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Price has to be greater than $0.00
            </div>';
        exit();  
        }
        if($Price > 9999.99){
           echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Price has to be less than $10,000.00
            </div>';
        exit();  
        }
        if(!preg_match("~^[\d.]+$~", $Price)){
           echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Enter proper price
            </div>';
        exit();  
        }
        //$Price = floatval($Price);
        //need to see if any orders exist with selected book.
        //update orders if warranted

        //book not null, find and delete book, order items, and contact details.
        //see if order exists for any books
        //loop through all ISBNS by author, query order Items for each ISBN   

    //attempt to find an existing order item
    $sql = 'SELECT ISBN from Order_Items where ISBN="' .$selectedISBN.'"';
    $resultOrderISBN = mysqli_query($conn, $sql);
    $rowOrderISBN = mysqli_fetch_assoc($resultOrderISBN);
    $orderAttempt = $rowOrderISBN["ISBN"];
    if(!is_null($orderAttempt)){
        //order item exists with book in it
        //need update book from order_Items, change total order value
        //for each order with book present

        //find orders that have these order items in them
        $sql = 'SELECT Order_ID from Order_Items where ISBN="' .$orderAttempt.'"';
        $resultOrderID = mysqli_query($conn, $sql);
        $rowOrderExists= mysqli_fetch_assoc($resultOrderID);

            //find price for particular item
            $sql = 'SELECT Item_Price from Order_Items WHERE ISBN="'.$orderAttempt.'" AND IPlaced="N"';
            $resultPrice = mysqli_query($conn, $sql);
            $rowTemp = mysqli_fetch_assoc($resultPrice);
            $oldPrice = $rowTemp["Item_Price"];
            
            
            //while orders exist with these books in them
            //decrease price for removed book
            while($rowOrderExists){

                //fetch current order ID
                $orderIDforBook = $rowOrderExists["Order_ID"];
                
                //fetch current order total for specific order
                $sql = 'SELECT Order_Value,Placed from Orders WHERE Order_ID='.$orderIDforBook;
                $resultPrice = mysqli_query($conn, $sql);
                $rowTemp = mysqli_fetch_assoc($resultPrice);
                $totalPrice = $rowTemp["Order_Value"];
                //see if order has been placed yet.
                $orderPlaced = $rowTemp["Placed"];
                
                //all Items in a placed order will be ignored as well
                $sql = 'SELECT IPlaced from Order_Items WHERE Order_ID='.$orderIDforBook;
                $resultOrderPlaced = mysqli_query($conn, $sql); 
                $rowTemp1 = mysqli_fetch_assoc($resultOrderPlaced);
                $itemPlaced = $rowTemp1["IPlaced"];
                
                //If order is marked as placed, ignore it
                if($orderPlaced != 'Y'){
                $priceDifference = $Price - $oldPrice;
                //echo 'price difference: ' .$priceDifference .'<br>';
                if ($priceDifference <0){
                //new price is cheaper than old price
                //decrease total order cost
               //echo $totalPrice .' + '. $priceDifference .',  from order '. $orderIDforBook.'<br>';
                $totalPrice += $priceDifference;
                }
                else{
                //new price is more expensive than old
                //increase total order
                //echo $totalPrice .' + '. $priceDifference .', from order '. $orderIDforBook.'<br>';
                $totalPrice += $priceDifference;    
                }

                //update new order value for specific order
                $sql = 'UPDATE Orders SET Order_Value='.$totalPrice .' WHERE Order_ID='.$orderIDforBook;
                mysqli_query($conn, $sql);
                
                if($itemPlaced != 'Y'){
                    //echo 'item placed for orders in: ' .$orderIDforBook .' : ' .$itemPlaced .'<br>';
                $sql = 'UPDATE Order_Items SET Item_Price='.$Price .' WHERE ISBN="'.$selectedISBN.'" AND IPlaced="N"';
                mysqli_query($conn, $sql);
                }
                }
                $rowOrderExists= mysqli_fetch_assoc($resultOrderID);
            }//for each order that holds one of these books

            $rowOrderISBN = mysqli_fetch_assoc($resultOrderISBN);
           
            //echo 'UPDATE Books SET Price='.$Price .'WHERE ISBN="'.$selectedISBN .'"';
        $sql = 'UPDATE Books SET Price='.$Price .' WHERE ISBN="'.$selectedISBN .'"';
        mysqli_query($conn, $sql);
    }//if order_item with specific ISBN exists

        //no order_item with book exists
        //update books price

    //echo 'UPDATE Books SET Price='.$Price .'WHERE ISBN="'.$selectedISBN .'"';
        $sql = 'UPDATE Books SET Price='.$Price .' WHERE ISBN="'.$selectedISBN .'"';
        mysqli_query($conn, $sql);
    
    }//if price field wants to be changed
    
    if($User_Review != ""){
        //user review not null
        $sql = 'UPDATE Books SET User_Reviews="'.$User_Review. '" WHERE ISBN="'.$selectedISBN .'"';
        mysqli_query($conn, $sql);
    }
    
    echo '<div class="alertSuccess">
    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
  Data updated successfully
    </div>'; 
}//update given book fields

function updateGivenAuthFields(){
     $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    $currAuthID = $_SESSION["authID"];
    $authContID = $_SESSION["authContID"];
    
    $AFname = $_POST["AFname"];
    $ALname = $_POST["ALname"];
    $Contact_Phone = $_POST["Contact_Phone"];
    $Contact_Email = $_POST["Contact_Email"];
    $Contact_Address = $_POST["Contact_Address"];
    
    //get old information
    $sql = 'SELECT AFname, ALname from Author WHERE Author_ID='. $currAuthID;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $oldAFname = $row["AFname"];
    $oldALname = $row["ALname"];
    
    if($AFname !="" && $ALname !=""){
        //both names entered. Check to see if new change will conflict
        //see if auth id exists for new first/ new last
       $sql = 'SELECT Author_ID from Author WHERE AFname="'. $AFname .'"'
               . ' AND ALname="'. $ALname.'"';
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);
       $dupeName = $row["Author_ID"];

       if (!is_null($dupeName)){
               echo '<div class="alert">
               <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
               Author Name exists withing the database. Use unique name
               </div>';
           exit();
       }

       $sql = 'UPDATE Author SET AFname="'.$AFname. '", ALname="'.$ALname. '" WHERE Author_ID='.$currAuthID;
       mysqli_query($conn, $sql);   
    }
    
    else if($AFname != ""){
        //first name entered. Check to see if new change will conflict
           //with existing authors

           //see if auth id exists for new first/ old last
       $sql = 'SELECT Author_ID from Author WHERE AFname="'. $AFname .'"'
               . ' AND ALname="'. $oldALname.'"';
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);
       $dupeName = $row["Author_ID"];

       if (!is_null($dupeName)){
               echo '<div class="alert">
               <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
               Author Name exists withing the database. Use unique name
               </div>';
           exit();
       }

       $sql = 'UPDATE Author SET AFname="'.$AFname. '" WHERE Author_ID='.$currAuthID;
       mysqli_query($conn, $sql);   
    }//first name entered
    
    else if ($ALname != "") {
        //last name entered. Check to see if new change will conflict
            //with existing authors

           //see if auth id exists for new last/ old first
       $sql = 'SELECT Author_ID from Author WHERE AFname="'. $oldAFname .'"'
               . ' AND ALname="'. $ALname.'"';
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);
       $dupeName = $row["Author_ID"];

       if (!is_null($dupeName)){
               echo '<div class="alert">
               <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
               Author Name exists withing the database. Use unique name
               </div>';
           exit();
       }

       $sql = 'UPDATE Author SET ALname="'.$ALname. '" WHERE Author_ID='.$currAuthID;
       mysqli_query($conn, $sql); 
    }
    
    //copied straight from handleAccoutns.php
    if ($Contact_Phone == "" && $Contact_Email == "" && $Contact_Address == "" && $AFname =="" && $ALname ==""){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
          No information given to update
            </div>';
        exit();
    }
    
    else if ($Contact_Email == "" && $Contact_Address == ""){
        //phone number not null, check if already exists for customer contacts

        checkDupePhone($Contact_Phone, 'A');
        
        $sql = 'INSERT into Phone(Contact_Phone, Contact_ID)'
                . 'VALUES("'.$Contact_Phone .'",' .$authContID .')';
        mysqli_query($conn, $sql);
    }
    else if ($Contact_Email == "" && $Contact_Phone == ""){
        //address not null, insert new address
        //allow duplicate addresses
          
        $sql = 'INSERT into Address(Contact_Address, Contact_ID)'
                . 'VALUES("'.$Contact_Address .'",' .$authContID .')';
        mysqli_query($conn, $sql);
    }
    
    else if ($Contact_Address == "" && $Contact_Phone == ""){
        //email not null, check if already exists for customer contacts
        
        checkDupeEmail($Contact_Email, 'A');
        
        $sql = 'INSERT into Email(Contact_Email, Contact_ID)'
                . 'VALUES("'.$Contact_Email .'",' .$authContID .')';
        mysqli_query($conn, $sql);
    }
    else if ($Contact_Address == ""){
        //email & phone not null
        
        checkDupePhone($Contact_Phone);
        checkDupeEmail($Contact_Email);
        
        $sql = 'INSERT into Email(Contact_Email, Contact_ID)'
                . 'VALUES("'.$Contact_Email .'",' .$authContID .')';
        mysqli_query($conn, $sql);
        $sql = 'INSERT into Phone(Contact_Phone, Contact_ID)'
                . 'VALUES("'.$Contact_Phone .'",' .$authContID .')';
        mysqli_query($conn, $sql);
    }
    else if ($Contact_Email == ""){
        //Address & phone not null, insert new attributes
        
        checkDupePhone($Contact_Phone, 'A');
        
        $sql = 'INSERT into Address(Contact_Address, Contact_ID)'
                . 'VALUES("'.$Contact_Address .'",' .$authContID .')';
        mysqli_query($conn, $sql);
        $sql = 'INSERT into Phone(Contact_Phone, Contact_ID)'
                . 'VALUES("'.$Contact_Phone .'",' .$authContID .')';
        mysqli_query($conn, $sql);
    }
    else if ($Contact_Phone == ""){
        //email & address not null, insert new attributes
        
        checkDupeEmail($Contact_Email, 'A');
        
        $sql = 'INSERT into Email(Contact_Email, Contact_ID)'
                . 'VALUES("'.$Contact_Email .'",' .$authContID .')';
        mysqli_query($conn, $sql);
        $sql = 'INSERT into Address(Contact_Address, Contact_ID)'
                . 'VALUES("'.$Contact_Address .'",' .$authContID .')';
        mysqli_query($conn, $sql);
    }
    else{
        //phone, email & address not null, insert new attributes
        
        checkDupePhone($Contact_Phone, 'A');
        checkDupeEmail($Contact_Email, 'A');
        
        $sql = 'INSERT into Email(Contact_Email, Contact_ID)'
                . 'VALUES("'.$Contact_Email .'",' .$authContID .')';
        mysqli_query($conn, $sql);
        $sql = 'INSERT into Address(Contact_Address, Contact_ID)'
                . 'VALUES("'.$Contact_Address .'",' .$authContID .')';
        mysqli_query($conn, $sql);
        $sql = 'INSERT into Phone(Contact_Phone, Contact_ID)'
                . 'VALUES("'.$Contact_Phone .'",' .$authContID .')';
        mysqli_query($conn, $sql);

    }    
    echo '<div class="alertSuccess">
    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
  data updated successfully
    </div>'; 

}//update given Author fields

function updateGivenCustFields(){
     $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    $currCustID = $_SESSION["custID"];
    $custContID = $_SESSION["contID"];
    
    $CFname = $_POST["CFname"];
    $CLname = $_POST["CLname"];
    $Contact_Phone = $_POST["Contact_Phone"];
    $Contact_Email = $_POST["Contact_Email"];
    $Contact_Address = $_POST["Contact_Address"];
    
    //get old information
    $sql = 'SELECT CFname, CLname from Customers WHERE Customer_ID='. $currCustID;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $oldCFname = $row["CFname"];
    $oldCLname = $row["CLname"];

    if ($CLname != "" && $CFname != ""){
        //first and last entered.
        
        $sql = 'SELECT Customer_ID from Customers WHERE CLname="'. $CLname .'"'
                . ' AND CFname="'. $CFname.'"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $dupeCustName = $row["Customer_ID"];

        if (!is_null($dupeCustName)){
                echo '<div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                Customer Name exists withing the database. Use unique name
                </div>';
            exit();
        }

        $sql = 'UPDATE Customers SET CFname ="'.$CFname.'", CLname="'.$CLname. '" WHERE Customer_ID='.$currCustID;
        mysqli_query($conn, $sql);
    }
    
    else if($CFname != ""){
        //first name entered. Check to see if new change will conflict
           //with existing authors

           //see if cust id exists for new first/ old last
       $sql = 'SELECT Customer_ID from Customers WHERE CFname="'. $CFname .'"'
               . ' AND CLname="'. $oldCLname.'"';
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);
       $dupeCustName = $row["Customer_ID"];

       if (!is_null($dupeCustName)){
               echo '<div class="alert">
               <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
               Customer Name exists withing the database. Use unique name
               </div>';
           exit();
       }

       $sql = 'UPDATE Customers SET CFname="'.$CFname. '" WHERE Customer_ID='.$currCustID;
       mysqli_query($conn, $sql);   
    }//first name entered
    
    else if ($CLname != "") {
        //last name entered. Check to see if new change will conflict
            //with existing authors

            //see if cust id exists for new first/ old last
        $sql = 'SELECT Customer_ID from Customers WHERE CLname="'. $CLname .'"'
                . ' AND CFname="'. $oldCFname.'"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $dupeCustName = $row["Customer_ID"];

        if (!is_null($dupeCustName)){
                echo '<div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                Customer Name exists withing the database. Use unique name
                </div>';
            exit();
        }

        $sql = 'UPDATE Customers SET CLname="'.$CLname. '" WHERE Customer_ID='.$currCustID;
        mysqli_query($conn, $sql);       
    }
    
    
    //copied straight from handleAccoutns.php
    if ($Contact_Phone == "" && $Contact_Email == "" && $Contact_Address == "" && $CFname =="" && $CLname==""){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
          No information given to update
            </div>';
        exit();
    }
    
    else if ($Contact_Email == "" && $Contact_Address == ""){
        //phone number not null, check if already exists for customer contacts

        checkDupePhone($Contact_Phone, 'C');
        
        $sql = 'INSERT into Phone(Contact_Phone, Contact_ID)'
                . 'VALUES("'.$Contact_Phone .'",' .$custContID .')';
        mysqli_query($conn, $sql);
    }
    else if ($Contact_Email == "" && $Contact_Phone == ""){
        //address not null, insert new address
        //allow duplicate addresses
          
        $sql = 'INSERT into Address(Contact_Address, Contact_ID)'
                . 'VALUES("'.$Contact_Address .'",' .$custContID .')';
        mysqli_query($conn, $sql);
    }
    
    else if ($Contact_Address == "" && $Contact_Phone == ""){
        //email not null, check if already exists for customer contacts
        
        checkDupeEmail($Contact_Email, 'C');
        $sql = 'INSERT into Email(Contact_Email, Contact_ID)'
                . 'VALUES("'.$Contact_Email .'",' .$custContID .')';
        mysqli_query($conn, $sql);
    }
    else if ($Contact_Address == ""){
        //email & phone not null
        
        checkDupePhone($Contact_Phone, 'C');
        checkDupeEmail($Contact_Email, 'C');
        
        $sql = 'INSERT into Email(Contact_Email, Contact_ID)'
                . 'VALUES("'.$Contact_Email .'",' .$custContID .')';
        mysqli_query($conn, $sql);
        $sql = 'INSERT into Phone(Contact_Phone, Contact_ID)'
                . 'VALUES("'.$Contact_Phone .'",' .$custContID .')';
        mysqli_query($conn, $sql);
    }
    else if ($Contact_Email == ""){
        //Address & phone not null, insert new attributes
        
        checkDupePhone($Contact_Phone, 'C');
        
        $sql = 'INSERT into Address(Contact_Address, Contact_ID)'
                . 'VALUES("'.$Contact_Address .'",' .$custContID .')';
        mysqli_query($conn, $sql);
        $sql = 'INSERT into Phone(Contact_Phone, Contact_ID)'
                . 'VALUES("'.$Contact_Phone .'",' .$custContID .')';
        mysqli_query($conn, $sql);
    }
    else if ($Contact_Phone == ""){
        //email & address not null, insert new attributes
        
        checkDupeEmail($Contact_Email, 'C');
        
        $sql = 'INSERT into Email(Contact_Email, Contact_ID)'
                . 'VALUES("'.$Contact_Email .'",' .$custContID .')';
        mysqli_query($conn, $sql);
        $sql = 'INSERT into Address(Contact_Address, Contact_ID)'
                . 'VALUES("'.$Contact_Address .'",' .$custContID .')';
        mysqli_query($conn, $sql);
    }
    else{
        //phone, email & address not null, insert new attributes
        
        checkDupePhone($Contact_Phone, 'C');
        checkDupeEmail($Contact_Email, 'C');
        
        $sql = 'INSERT into Email(Contact_Email, Contact_ID)'
                . 'VALUES("'.$Contact_Email .'",' .$custContID .')';
        mysqli_query($conn, $sql);
        $sql = 'INSERT into Address(Contact_Address, Contact_ID)'
                . 'VALUES("'.$Contact_Address .'",' .$custContID .')';
        mysqli_query($conn, $sql);
        $sql = 'INSERT into Phone(Contact_Phone, Contact_ID)'
                . 'VALUES("'.$Contact_Phone .'",' .$custContID .')';
        mysqli_query($conn, $sql);

    }    
            echo '<div class="alertSuccess">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
          Profile updated successfully
            </div>'; 
}//update given Customer Fields

function updateGivenSRField(){
    $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    $currSRID = $_SESSION["SRID"];
    $SRFnameAttempt = $_POST["SRFname"];
    $SRLnameAttempt = $_POST["SRLname"];
    $SRWorkNumAttempt = $_POST["Work_Num"];
    $SRCellNumAttempt = $_POST["Cell_Num"];
    $SREmailAttempt = $_POST["Email"];
    $SRSupplierAttempt = $_POST["Supplier"];
    
    //get old information
    $sql = 'SELECT SRFname, SRLname from Supplier_Rep WHERE ID='. $currSRID;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $oldSRFname = $row["SRFname"];
    $oldSRLname = $row["SRLname"];

    if ($SRFnameAttempt != "" && $SRLnameAttempt != ""){
        //first and last entered.
        
        //check if first and last name already exist for supreps
        $sql = 'SELECT ID from Supplier_Rep WHERE SRLname="'. $SRLnameAttempt .'"'
                . ' AND SRFname="'. $SRFnameAttempt.'"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $dupeSRName = $row["ID"];

        if (!is_null($dupeSRName)){
                echo '<div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                Supplier Rep name exists within the database. Use unique name
                </div>';
            exit();
        }

        $sql = 'UPDATE Supplier_Rep SET SRFname ="'.$SRFnameAttempt.'", SRLname="'.$SRLnameAttempt. '" WHERE ID='.$currSRID;
        mysqli_query($conn, $sql);
    }
    
    else if($SRFnameAttempt != ""){
        //first name entered. Check to see if new change will conflict
           //with existing SRs

           //see if id exists for new first/ old last
       $sql = 'SELECT ID from Supplier_Rep WHERE SRFname="'. $SRFnameAttempt .'"'
               . ' AND SRLname="'. $oldSRLname.'"';
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);
       $dupeSRName = $row["ID"];

       if (!is_null($dupeSRName)){
               echo '<div class="alert">
               <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
              Supplier Rep name exists within the database. Use unique name
               </div>';
           exit();
       }

       $sql = 'UPDATE Supplier_Rep SET SRFname="'.$SRFnameAttempt. '" WHERE ID='.$currSRID;
       mysqli_query($conn, $sql);   
    }//first name entered
    
    else if ($SRLnameAttempt != "") {
        //last name entered. Check to see if new change will conflict
            //with existing authors

            //see if cust id exists for new first/ old last
        $sql = 'SELECT ID from Supplier_Rep WHERE SRLname="'. $SRFLnameAttempt .'"'
               . ' AND SRFname="'. $oldSRFname.'"';
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);
       $dupeSRName = $row["ID"];

        if (!is_null($dupeSRName)){
                echo '<div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                Supplier Rep name exists within the database. Use unique name
                </div>';
            exit();
        }

         $sql = 'UPDATE Supplier_Rep SET SRLname="'.$SRLnameAttempt. '" WHERE ID='.$currSRID;
        mysqli_query($conn, $sql);       
    }
    
    if ($SREmailAttempt == "" && $SRCellNumAttempt == "" && $SRWorkNumAttempt == "" && $SRFnameAttempt =="" && $SRLnameAttempt=="" && $SRSupplierAttempt==""){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
          No information given to update
            </div>';
        exit();
    }
    
    if($SREmailAttempt !=""){
        //email given. check if unique withing SR's
        $sql = 'SELECT ID from Supplier_Rep WHERE Email="'.$SREmailAttempt.'"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $dupeEmail = $row["ID"];
        
        if(!is_null($dupeEmail)){
          echo '<div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
               Email exists within the database. Use unique name
                </div>';
            exit();  
        }
        $sql = 'UPDATE Supplier_Rep SET Email="'.$SREmailAttempt.'" WHERE ID='.$currSRID;
        mysqli_query($conn, $sql);
        
    }
    if($SRCellNumAttempt !=""){
        //cell num given. check if unique withing SR's
        $sql = 'SELECT ID from Supplier_Rep WHERE Cell_Num="'.$SRCellNumAttempt.'"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $dupe = $row["ID"];
        
        if(!is_null($dupe)){
          echo '<div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
               Cell Number exists within the database. Use unique number
                </div>';
            exit();  
        }
        $sql = 'UPDATE Supplier_Rep SET Cell_Num="'.$SRCellNumAttempt.'" WHERE ID='.$currSRID;
        mysqli_query($conn, $sql);
        
    }
    if($SRWorkNumAttempt !=""){
        //work num given. check if unique withing SR's
        $sql = 'SELECT ID from Supplier_Rep WHERE Work_Num="'.$SRWorkNumAttempt.'"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $dupe = $row["ID"];
        
        if(!is_null($dupe)){
          echo '<div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
               Work Number exists within the database. Use unique number
                </div>';
            exit();  
        }
        $sql = 'UPDATE Supplier_Rep SET Work_Num="'.$SRWorkNumAttempt.'" WHERE ID='.$currSRID;
        mysqli_query($conn, $sql);
        
    }
    if($SRSupplierAttempt !=""){
        //Supplier given. 
        $sql = 'UPDATE Supplier_Rep SET Sname="'.$SRSupplierAttempt.'" WHERE ID='.$currSRID;
        mysqli_query($conn, $sql);
        
    }
  
            echo '<div class="alertSuccess">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
          Profile updated successfully
            </div>';
}

function updateGivenSuppField(){
    $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    $oldSname = $_SESSION["Sname"];
    $Sname = $_POST["Supplier"];
    
    if ($Sname !=""){
        //supplier not null
        //check if supplier already exists
        
        $sql = 'SELECT Sname from Supplier WHERE Sname="'.$Sname.'"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $dupeSupplier = $row["Sname"];
        
        if(!is_null($dupeSupplier)){
            //supplier given already exists
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Supplier name already present. Try changing supplier field in book entity
            </div>';
        exit(); 
        }
        
        $sql = 'UPDATE Books SET Sname="'.$Sname.'" WHERE Sname="'.$oldSname.'"';
        $result = mysqli_query($conn, $sql);
        $sql = 'INSERT INTO Supplier(Sname) VALUES ("'.$Sname.'")';
        $result = mysqli_query($conn, $sql);
        $sql = 'UPDATE Supplier_Rep SET Sname="'.$Sname.'" WHERE Sname="'.$oldSname.'"';
        $result = mysqli_query($conn, $sql);

        if(is_null($dupeSupplier)){
            //old supplier doesnt exist for any books anymore
        $sql = 'DELETE from Supplier WHERE Sname="'.$oldSname.'"';
        $result = mysqli_query($conn, $sql);
        }  
}
}

    function checkDupeEmail($Contact_Email, $TableToCheck){
     $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);

    if($TableToCheck == 'C'){
    $sql = 'SELECT Contact_ID from Customers';
        $resultCustCont = mysqli_query($conn, $sql);
        $rowCustCont = mysqli_fetch_assoc($resultCustCont);
        //$contToCheck = $rowCustCont["Contact_ID"];

        while($rowCustCont){
        $contToCheck = $rowCustCont["Contact_ID"];    
         //while cycling through all customer contact ID's
         //search contact details to see if phone number matches
         $sql = 'SELECT Contact_Email from Email WHERE Contact_ID='.$contToCheck;
         $resultEmailDupe = mysqli_query($conn, $sql);
         $rowEmailDupe = mysqli_fetch_assoc($resultEmailDupe);


         while($rowEmailDupe){
         //while cycling through phone #s for specific customer
        $EmailToCheck = $rowEmailDupe["Contact_Email"];
         if($Contact_Email == $EmailToCheck){
          echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
          Email exists withing customer contacts. Enter unique Email
            </div>';
        exit();
         }
         $rowEmailDupe = mysqli_fetch_assoc($resultEmailDupe); //fetch new tuple, new phone for specific customer
         }//while cycling through phone #s for specific customer
        $rowCustCont = mysqli_fetch_assoc($resultCustCont); //fetch new tuple, new customer contact    
        }//while cycling through all customer contact ID's
    }
    else{
       $sql = 'SELECT Contact_ID from Author';
        $resultCont = mysqli_query($conn, $sql);
        $rowCont = mysqli_fetch_assoc($resultCont);
        //$contToCheck = $rowCustCont["Contact_ID"];

        while($rowCont){
        $contToCheck = $rowCont["Contact_ID"];    
         //while cycling through all customer contact ID's
         //search contact details to see if phone number matches
         $sql = 'SELECT Contact_Email from Email WHERE Contact_ID='.$contToCheck;
         $resultEmailDupe = mysqli_query($conn, $sql);
         $rowEmailDupe = mysqli_fetch_assoc($resultEmailDupe);


         while($rowEmailDupe){
         //while cycling through phone #s for specific customer
        $EmailToCheck = $rowEmailDupe["Contact_Email"];
         if($Contact_Email == $EmailToCheck){
          echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
          Email exists withing author contacts. Enter unique Email
            </div>';
        exit();
         }
         $rowEmailDupe = mysqli_fetch_assoc($resultEmailDupe); //fetch new tuple, new phone for specific customer
         }//while cycling through phone #s for specific customer
        $rowCont = mysqli_fetch_assoc($resultCont); //fetch new tuple, new customer contact    
        }//while cycling through all customer contact ID's 
    }
    }

    function checkDupePhone($Contact_Phone, $tableToCheck){
     $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);

    if($tableToCheck == 'C'){
    $sql = 'SELECT Contact_ID from Customers';
        $resultCustCont = mysqli_query($conn, $sql);
        $rowCustCont = mysqli_fetch_assoc($resultCustCont);
        //$contToCheck = $rowCustCont["Contact_ID"];

        while($rowCustCont){
        $contToCheck = $rowCustCont["Contact_ID"];    
         //while cycling through all customer contact ID's
         //search contact details to see if phone number matches
         $sql = 'SELECT Contact_Phone from Phone WHERE Contact_ID='.$contToCheck;
         $resultPhoneDupe = mysqli_query($conn, $sql);
         $rowPhoneDupe = mysqli_fetch_assoc($resultPhoneDupe);


         while($rowPhoneDupe){
         //while cycling through phone #s for specific customer
        $phoneToCheck = $rowPhoneDupe["Contact_Phone"];
         if($Contact_Phone == $phoneToCheck){
          echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
          Phone number exists withing customer contacts. Enter unique number
            </div>';
        exit();
         }
         $rowPhoneDupe = mysqli_fetch_assoc($resultPhoneDupe); //fetch new tuple, new phone for specific customer
         }//while cycling through phone #s for specific customer
        $rowCustCont = mysqli_fetch_assoc($resultCustCont); //fetch new tuple, new customer contact    
        }//while cycling through all customer contact ID's
    }
    else{
            $sql = 'SELECT Contact_ID from Author';
        $resultCont = mysqli_query($conn, $sql);
        $rowCont = mysqli_fetch_assoc($resultCont);
        //$contToCheck = $rowCustCont["Contact_ID"];

        while($rowCont){
        $contToCheck = $rowCont["Contact_ID"];    
         //while cycling through all customer contact ID's
         //search contact details to see if phone number matches
         $sql = 'SELECT Contact_Phone from Phone WHERE Contact_ID='.$contToCheck;
         $resultPhoneDupe = mysqli_query($conn, $sql);
         $rowPhoneDupe = mysqli_fetch_assoc($resultPhoneDupe);


         while($rowPhoneDupe){
         //while cycling through phone #s for specific customer
        $PhoneToCheck = $rowPhoneDupe["Contact_Phone"];
         if($Contact_Phone == $PhoneToCheck){
          echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
          Phone exists withing author contacts. Enter unique Email
            </div>';
        exit();
         }
         $rowPhoneDupe = mysqli_fetch_assoc($resultPhoneDupe); //fetch new tuple, new phone for specific customer
         }//while cycling through phone #s for specific customer
        $rowCont = mysqli_fetch_assoc($resultCont); //fetch new tuple, new customer contact    
        }//while cycling through all customer contact ID's    
    }
    }
?>