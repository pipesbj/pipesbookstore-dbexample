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
    .col-1 {width: 20%;}
    .col-2 {width: 40%;}
    .col-3 {width: 60%;}
    .col-4 {width: 80%;}
    .col-5 {width: 100%;} 
    .alert {
    position: fixed;
    top: 0px;
    right: 0px;
    width: 33%;
    padding: 20px;
    background-color: #f44336;
    color: white;
    }   
    .alertSuccess {
    position: fixed;
    top: 0px;
    right: 0px;
    width: 25%;
    padding: 20px;
    background-color: #009900;
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
    <form style="text-align:center" action = "handleAccounts.php" method = "post">
   Username: 
    <input type= "text" name= "CFname" placeholder ="..."><br>
    Password:
    <input type= "password" name= "CLname" placeholder ="..."><br>
    <input type="submit" class="loginOut" name="login" value="Login">
   <input type="submit" class="loginOut" name="logout" value="Logout">
  </form>     
        
    <form style="text-align:center" action = "customerDashboard.php" method = "post">
        <input type = "submit" class="navOperator"  value = "Customer Home" name = "returnHome"><br>
    </form>
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
        </div>
     <div class="col-1">
    <form style="text-align: right" name="createCustProfile" method="POST">
    <h5>Create Customer Profile</h5>
       
        <?php
        //for keeping previously entered information so the user doesn't have
        //to re-enter if they fail validation
        if(isset($_POST["createCustProfile"])){
        $CFname = $_POST["CFname"];
        $CLname = $_POST["CLname"];
        $Contact_Phone =  $_POST["Contact_Phone"];
        $Contact_Email = $_POST["Contact_Email"];
        $Contact_Address =$_POST["Contact_Address"];
        }
        else{
          
        $CFname = "";
        $CLname = "";
        $Contact_Phone = "";
        $Contact_Email = "";
        $Contact_Address = "";
        }
       ?>
    
        Username: 
    <input type= "text" name= "CFname" placeholder ="..."><br>
    Password:
    <input type= "password" name= "CLname" placeholder ="..."><br>
        Phone #:
        <input type= "text" name ="Contact_Phone" value="<?php echo $Contact_Phone;?>"><br>
        Email:
        <input type= "text" name ="Contact_Email" value="<?php echo $Contact_Email;?>"><br>
        Address:
        <input type= "text" name ="Contact_Address" value="<?php echo $Contact_Address;?>"><br>
        <input type="submit" class="regOperator" name="createCustProfile" value="Create New Profile & Login">
    </form>
       </div>    
       
       <div class="col-1">
    <form style="text-align: right" name="overwriteCustAttributes" method="POST">
        <h5>Overwrite Details for Existing Profile</h5>
  
        - Select Detail to Overwrite - <br>
        
        Phone #:
        <input type= "radio" name ="Contact_Phone" value="<?php echo $Contact_Phone;?>"><br>
        Email:
        <input type= "radio" name ="Contact_Email" value="<?php echo $Contact_Email;?>"><br>
        Address:
        <input type= "radio" name ="Contact_Address" value="<?php echo $Contact_Address;?>"><br>
        <input type="submit" class="regOperator" name="selectCustAttr" value="Overwrite ">
    </form>
       </div>
       
       <div class="col-1">
           
       <form style="text-align: right" name="updateCustAttributes" method="POST">
        <h5>Add Details for Existing Profile</h5>
        
         <?php
        //for keeping previously entered information so the user doesn't have
        //to re-enter if they fail validation
        if(isset($_POST["updateCustAttr"])){
        $Contact_Phone =  $_POST["Contact_Phone"];
        $Contact_Email = $_POST["Contact_Email"];
        $Contact_Address =$_POST["Contact_Address"];
        }
        else{

        $Contact_Phone = "";
        $Contact_Email = "";
        $Contact_Address = "";
        }
       ?>
       
        - Info to update - <br>
        
        Phone #:
        <input type= "text" name ="Contact_Phone" value="<?php echo $Contact_Phone;?>"><br>
        Email:
        <input type= "text" name ="Contact_Email" value="<?php echo $Contact_Email;?>"><br>
        Address:
        <input type= "text" name ="Contact_Address" value="<?php echo $Contact_Address;?>"><br>
        <input type="submit" class="regOperator" name="updateCustAttr" value="Update Existing Profile">
    </form>
       </div>

<?php

 if(isset($_POST["createCustProfile"])){
     createCustProfile();
 }
 else if(isset($_POST["selectCustAttr"])){
     selectCustAttr();
 }
 else if(isset($_POST["updateCustAttr"])){
     updateCustAttr();
 }
 else if (isset($_POST["overwriteAttr"])){
     overwriteAttr();
 }
 
 function createCustProfile(){     
     $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
     
    $CFname = $_POST["CFname"];
    $CLname = $_POST["CLname"];
    $Contact_Phone = $_POST["Contact_Phone"];
    $Contact_Email = $_POST["Contact_Email"];
    $Contact_Address = $_POST["Contact_Address"];
    
    //If user inputs an existing name, displays error message
    $sql = mysqli_query($conn, 'SELECT CFname, CLname from Customers '
            . 'WHERE CFname="'.$CFname .'" AND CLname="'.$CLname .'"');
    $row = mysqli_fetch_assoc($sql);
    $CFnameAttempt = $row["CFname"];
    $CLnameAttempt = $row["CLname"];
    
    if(!is_null($CFnameAttempt) && !is_null($CLnameAttempt)){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
           The name you entered already exists
            </div>';
        exit();
    }
    
//    Need to refuse creation of account if email already exist for customer 
//    contact details. But if its an email that exists only for authors, 
//    it should allow.
//    links contact ID where the emails match to compare with
//    contact ID for customers
    if ($Contact_Phone=="" || $Contact_Email =="" || $Contact_Address==""){
        echo '<div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
       Please enter unique phone, email, & address
            </div>';
        exit();
    }
    checkDupePhone($Contact_Phone, 'C');
    checkDupeEmail($Contact_Email, 'C');
    
    //If user inputs blank values for the name fields, display error message
    if($CFname == "" || $CLname == ""){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
           Please enter a first and last name
            </div>';
        exit();
    }

    //selects last known contact_id, increments it for new contact tuple
    $sql = mysqli_query($conn, 'SELECT Contact_ID from Contact_Details ORDER BY Contact_ID DESC LIMIT 1');
    $row = mysqli_fetch_assoc($sql);
    $newContID = $row["Contact_ID"] + 1;
    
    $sql = 'INSERT INTO Customers(CFname, CLname, Contact_ID)'
            . 'VALUES("'.$CFname .'","'.$CLname .'",'.$newContID .')';
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo ''.mysqli_error($conn);
    }
    $sql = 'INSERT INTO Contact_Details(Contact_ID)'
            . 'VALUES('.$newContID.')';
    $result = mysqli_query($conn, $sql);
    
     $sql = 'INSERT INTO Email(Contact_Email, Contact_ID)'
            . 'VALUES("'.$Contact_Email .'",' .$newContID.')';
    $result = mysqli_query($conn, $sql);
    
    $sql = 'INSERT INTO Address(Contact_Address, Contact_ID)'
            . 'VALUES("'.$Contact_Address .'",' .$newContID.')';
    $result = mysqli_query($conn, $sql);
    
    $sql = 'INSERT INTO Phone(Contact_Phone, Contact_ID)'
            . 'VALUES("'.$Contact_Phone .'",' .$newContID.')';
    $result = mysqli_query($conn, $sql);
        
    echo '<div class="alertSuccess">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
           Account created successfully!
            </div>';
    
    
    $_SESSION["CFname"] = $CFname;
    $_SESSION["CLname"] = $CLname;
    if(!is_null($_SESSION["CFname"]) && !is_null($_SESSION["CLname"])){
       
       echo '<div class="alertLogin">
            User: ' .$_SESSION["CFname"].
            '</div>';
        } 
    }//if create customer profile is triggered
 
 function overwriteAttr(){
    $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    $CFname = $_SESSION["CFname"];
    $CLname = $_SESSION["CLname"];
    //fetch the contact_ID to use as PK for updating
    $sql = mysqli_query($conn, 'SELECT Contact_ID from Customers '
            . 'WHERE CFname="'.$CFname .'" AND CLname="'.$CLname .'"');
    $row = mysqli_fetch_assoc($sql);
    $custContID = $row["Contact_ID"];
    
    
    if (isset($_POST["Customer_Phone"])){
    $newCustPhone = $_POST["new_Cust_Phone"];
    $oldCustPhone = $_POST["Customer_Phone"];
    checkDupePhone($newCustPhone, 'C');
    
    $sql = 'DELETE from Phone WHERE Contact_Phone="' .$oldCustPhone.'"'
            .'AND Contact_ID =' .$custContID;
        mysqli_query($conn, $sql);


        $sql = 'INSERT into Phone(Contact_Phone, Contact_ID)'
                . 'VALUES("'.$newCustPhone .'",' .$custContID .')';
        mysqli_query($conn, $sql);
        echo '<div class="alertSuccess">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
          Profile updated successfully
            </div>';
    }
    else if (isset($_POST["Customer_Email"])){
    $newCustEmail = $_POST["new_Cust_Email"];
    $oldCustEmail = $_POST["Customer_Email"];
    checkDupeEmail($newCustEmail, 'C');
    $sql = 'DELETE from Email WHERE Contact_Email="' .$oldCustEmail.'"'
            .'AND Contact_ID =' .$custContID;
        mysqli_query($conn, $sql);
        
        $sql = 'INSERT into Email(Contact_Email, Contact_ID)'
                . 'VALUES("'.$newCustEmail .'",' .$custContID .')';
        mysqli_query($conn, $sql);
        echo '<div class="alertSuccess">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
          Profile updated successfully
            </div>';
    }
    else if (isset($_POST["Customer_Address"])){
    $newCustAddr = $_POST["new_Cust_Addr"];
    $oldCustAddr = $_POST["Customer_Address"];

    $sql = 'DELETE from Address WHERE Contact_Address="' .$oldCustAddr.'"'
            .'AND Contact_ID =' .$custContID;
        mysqli_query($conn, $sql);
        
        $sql = 'INSERT into Address(Contact_Address, Contact_ID)'
                . 'VALUES("'.$newCustAddr .'",' .$custContID .')';
        mysqli_query($conn, $sql);
        echo '<div class="alertSuccess">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
          Profile updated successfully
            </div>';
    }
 }   
    
 function selectCustAttr(){
  $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
     
    $CFname = $_SESSION["CFname"];
    $CLname = $_SESSION["CLname"];
    
    //If user tries to edit a non-existing profile, displays error message
    $sql = mysqli_query($conn, 'SELECT CFname, CLname from Customers '
            . 'WHERE CFname="'.$CFname .'" AND CLname="'.$CLname .'"');
    $row = mysqli_fetch_assoc($sql);
    $CFnameAttempt = $row["CFname"];
    $CLnameAttempt = $row["CLname"];
    
    if(is_null($CFnameAttempt) && is_null($CLnameAttempt)){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
           The account to be updated doesn\'t exist in the customer list
            </div>';
        exit();
    }
    else{
        //the first/last name exists within the DB
        //fetch the contact_ID to use as PK for updating
    $sql = mysqli_query($conn, 'SELECT Contact_ID from Customers '
            . 'WHERE CFname="'.$CFname .'" AND CLname="'.$CLname .'"');
    $row = mysqli_fetch_assoc($sql);
    $custContID = $row["Contact_ID"]; 
    }//fetch contact ID 
    
    //check which button was pressed
    //grab all details for that button and display
   echo '<div class="row"></div>';
   echo '<div class="col-2"></div>';
    
    //user picks phone detail to overwrite, enters new phone number
    //sends info to overwriteAttr method
  if (isset($_POST["Contact_Phone"])){
      echo '<div class="col-1">';
    $sql = 'SELECT Contact_Phone from Phone where Contact_ID=' .$custContID;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<form style="text-align: right" action= "handleAccounts.php" name="overwriteCustPhone" method="POST">';
      if (mysqli_num_rows($result) > 0) {
          echo '<select class="regSelect" name="Customer_Phone">';
          while ($row) {
              $currPhone = $row["Contact_Phone"];
              echo '<option value="'.$currPhone.'">'.$currPhone.'</option>';
              $row = mysqli_fetch_assoc($result);
          }
          echo  '</select>';
      }
      echo '<br>replace with <br><input type="text" style="height: 50px; font-size: 16px;"  name="new_Cust_Phone" placeholder="New phone #...">';
      echo '<input class="regOperator" type="submit" name="overwriteAttr" value="Overwrite Selected">';
      echo '</form>';
      echo '</div>';
    }//showing overwrite phone fields
    
   else if (isset($_POST["Contact_Email"])){
      echo '<div class="col-1">';
    $sql = 'SELECT Contact_Email from Email where Contact_ID=' .$custContID;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<form style="text-align: right" action= "handleAccounts.php" name="overwriteCustPhone" method="POST">';
      if (mysqli_num_rows($result) > 0) {
          echo '<select class="regSelect" name="Customer_Email">';
          while ($row) {
              $currEmail = $row["Contact_Email"];
              echo '<option value="'.$currEmail.'">'.$currEmail.'</option>';
              $row = mysqli_fetch_assoc($result);
          }
          echo  '</select>';
      }
      echo '<br>replace with <br><input type="text" style="height: 50px; font-size: 16px;" name="new_Cust_Email" placeholder="New Email ...">';
      echo '<input type="submit" class="regOperator" name="overwriteAttr" value="Overwrite Selected">';
      echo '</form>';
      echo '</div>';
    }//showing overwrite email fields
    
    else if (isset($_POST["Contact_Address"])){
      echo '<div class="col-1">';
    $sql = 'SELECT Contact_Address from Address where Contact_ID=' .$custContID;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<form style="text-align: right" action= "handleAccounts.php" name="overwriteCustPhone" method="POST">';
      if (mysqli_num_rows($result) > 0) {
          echo '<select class="regSelect" name="Customer_Address">';
          while ($row) {
              $currAddr = $row["Contact_Address"];
              echo '<option value="'.$currAddr.'">'.$currAddr.'</option>';
              $row = mysqli_fetch_assoc($result);
          }
          echo  '</select>';
      }
      echo '<br>replace with <br><input type="text" style="height: 50px; font-size: 16px;"  name="new_Cust_Addr" placeholder="New Address ...">';
      echo '<input type="submit" class="regOperator" name="overwriteAttr" value="Overwrite Selected">';
      echo '</form>';
      echo '</div>';
    }//showing overwrite email fields
 
 }  //if customer wants to overwrite their profile information. 

 function updateCustAttr(){
  //if customer wants to add additional email/address/phone # (not overwrite)   
    
   $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
     
    $CFname = $_SESSION["CFname"];
    $CLname = $_SESSION["CLname"];
    $Contact_Phone = $_POST["Contact_Phone"];
    $Contact_Email = $_POST["Contact_Email"];
    $Contact_Address = $_POST["Contact_Address"];
    
    //If user tries to edit a non-existing profile, displays error message
    $sql = mysqli_query($conn, 'SELECT CFname, CLname from Customers '
            . 'WHERE CFname="'.$CFname .'" AND CLname="'.$CLname .'"');
    $row = mysqli_fetch_assoc($sql);
    $CFnameAttempt = $row["CFname"];
    $CLnameAttempt = $row["CLname"];
    
    if(is_null($CFnameAttempt) && is_null($CLnameAttempt)){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
           The account to be updated doesn\'t exist in the customer list
            </div>';
        exit();
    }
    else{
        //the first/last name exists within the DB
        //fetch the contact_ID to use as PK for updating
    $sql = mysqli_query($conn, 'SELECT Contact_ID from Customers '
            . 'WHERE CFname="'.$CFname .'" AND CLname="'.$CLname .'"');
    $row = mysqli_fetch_assoc($sql);
    $custContID = $row["Contact_ID"]; 
    }//fetch contact ID 
    
    if ($Contact_Phone == "" && $Contact_Email == "" && $Contact_Address == ""){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
          No information given to update
            </div>';
        exit();
    }
    
    else if ($Contact_Email == "" && $Contact_Address == ""){
        //phone number not null, insert new phone number
        
        checkDupePhone($Contact_Phone, 'C');
        $sql = 'INSERT into Phone(Contact_Phone, Contact_ID)'
                . 'VALUES("'.$Contact_Phone .'",' .$custContID .')';
        mysqli_query($conn, $sql);
    }
    else if ($Contact_Email == "" && $Contact_Phone == ""){
        //address not null, insert new address
          
        $sql = 'INSERT into Address(Contact_Address, Contact_ID)'
                . 'VALUES("'.$Contact_Address .'",' .$custContID .')';
        mysqli_query($conn, $sql);
    }
    else if ($Contact_Address == "" && $Contact_Phone == ""){
        //email not null, insert new email
        
        checkDupeEmail($Contact_Email, 'C');
        $sql = 'INSERT into Email(Contact_Email, Contact_ID)'
                . 'VALUES("'.$Contact_Email .'",' .$custContID .')';
        mysqli_query($conn, $sql);
    }
    else if ($Contact_Address == ""){
        //email & phone not null, insert new attributes
        
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
    
     
 }//if customer wants to add additional email/address/phone # (not overwrite)
 
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
}
 ?>
