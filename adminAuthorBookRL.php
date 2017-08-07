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
    
<div class="col-1">
    <form  name="authorBookRL" action="adminAuthorBookRL.php" method="POST">
    <h4>Enter Author/Book relationship</h4>
    
    <input type= "submit" class="regOperator"
            name ="authorBookRL" value="Create Relationships"><br>
    <h5>Author Info</h5>
    
    <?php
    if(isset($_POST["authorBookRL"])){
        //this holds user data if they hit an error. With this, they don't 
        //re-enter any data that is already acceptable
        $Adob = $_POST["Adob"];
        $Agender = $_POST["Agender"];
        $AFname = $_POST["AFname"];
        $ALname = $_POST["ALname"];
        $Contact_Phone = $_POST["Contact_Phone"];
        $Contact_Email = $_POST["Contact_Email"];
        $Contact_Address = $_POST["Contact_Address"];
        $ISBN = $_POST["ISBN"];
        $Price = $_POST["Price"];
        $Title = $_POST["Title"];
        $User_Reviews =$_POST["User_Reviews"];
        $Publication_Date = $_POST["Publication_Date"];
        $Sname = $_POST["Sname"];
        $Cat_Desc = $_POST["Cat_Desc"];
        }
        else{
        $Adob ="";
        $Agender ="";
        $AFname ="";
        $ALname ="";
        $Contact_Phone ="";
        $Contact_Email ="";
        $Contact_Address ="";
        $ISBN ="";
        $Price ="";
        $Title ="";
        $User_Reviews ="";
        $Publication_Date = "";
        $Sname = "";
        $Cat_Desc ="";
        }
       ?>

        Date of Birth:
        <input type= "text" name ="Adob" value="<?php echo $Adob;?>" placeholder="YYYY-MM-DD"><br>
        Gender: 
        <input type= "text" name ="Agender" value="<?php echo $Agender;?>"><br>
        First name: 
        <input type= "text" name ="AFname" value="<?php echo $AFname;?>"> <br>
        Last name:
        <input type= "text" name ="ALname" value="<?php echo $ALname;?>"><br>
        Phone #:
        <input type= "text" name ="Contact_Phone" value="<?php echo $Contact_Phone;?>" placeholder="xxx-xxx-xxxx"><br>
        Email:
        <input type= "text" name ="Contact_Email" value="<?php echo $Contact_Email;?>" placeholder="name@address.com"><br>
        Address:
        <input type= "text" name ="Contact_Address" value="<?php echo $Contact_Address;?>"><br>
     
    <h5>Book Info</h5>    
        ISBN: 
        <input type= "text" name ="ISBN" value="<?php echo $ISBN;?>" placeholder="xxx-x-xxxxx-xxx-x"><br>
        Price: 
        <input type= "text" name ="Price" value="<?php echo $Price;?>"><br>
        Title:
        <input type= "text" name ="Title" value="<?php echo $Title;?>"><br>
        User Reviews:
        <input type= "text" name ="User_Reviews" value="<?php echo $User_Reviews;?>"><br>
        Publication Date:
        <input type= "text" name ="Publication_Date" value="<?php echo $Publication_Date;?>"><br>
        Supplier Name:
        <input type= "text" name ="Sname" value="<?php echo $Sname;?>"><br>
        Book Category:
        <input type= "text" name ="Cat_Desc" value="<?php echo $Cat_Desc;?>"><br>
    </form>
</div>

<div class="col-1">
<form name="multBooksToAuthor" action="adminAuthorBookRL.php" method="POST">
    <h4>Connect Book to Existing Author
    </h4>
    <input type= "submit" class="regOperator" 
           name ="multBooksToAuthor" value="Connect Book To Author"><br> 
    
    <h5>Author Info</h5>
    
    <?php
    if(isset($_POST["multBooksToAuthor"])){
        //this holds user data if they hit an error. With this, they don't 
        //re-enter any data that is already acceptable
        $ISBN = $_POST["ISBN"];
        $Price = $_POST["Price"];
        $Title = $_POST["Title"];
        $User_Reviews =$_POST["User_Reviews"];
        $Publication_Date = $_POST["Publication_Date"];
        $Sname = $_POST["Sname"];
        $Cat_Desc = $_POST["Cat_Desc"];
        }
        else{
        $AFname ="";
        $ALname ="";
        $ISBN ="";
        $Price ="";
        $Title ="";
        $User_Reviews ="";
        $Publication_Date = "";
        $Sname = "";
        $Cat_Desc ="";
        }
       ?>
        
        <?php
          $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
        mysqli_query($conn, $sql);
        $sql = 'SELECT AFname, ALname, Author_ID from Author';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
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
     ?>
    <h5>Book Info</h5>    
        ISBN:
        <input type= "text" name ="ISBN" value="<?php echo $ISBN;?>" placeholder="xxx-x-xxxxx-xxx-x"><br>
        Price: 
        <input type= "text" name ="Price" value="<?php echo $Price;?>"><br>
        Title:
        <input type= "text" name ="Title" value="<?php echo $Title;?>"><br>
        User Reviews:
        <input type= "text" name ="User_Reviews" value="<?php echo $User_Reviews;?>"><br>
        Publication Date:
        <input type= "text" name ="Publication_Date" value="<?php echo $Publication_Date;?>"><br>
        Supplier Name:
        <input type= "text" name ="Sname" value="<?php echo $Sname;?>"><br>
        Book Category:
        <input type= "text" name ="Cat_Desc" value="<?php echo $Cat_Desc;?>"><br>         
    </form>
    </div>
    
    <div class="col-1">
<form name="newAuthor" method="POST">
    <h4>Insert New Author </h4>
    
    <input type= "submit" class="regOperator"
           name ="subNewAuthor" value="Insert New Author"><br> 
    
       <h5>Author Info</h5>
       
           <?php
    if(isset($_POST["subNewAuthor"])){
        //this holds user data if they hit an error. With this, they don't 
        //re-enter any data that is already acceptable
        $Adob = $_POST["Adob"];
        $Agender = $_POST["Agender"];
        $AFname = $_POST["AFname"];
        $ALname = $_POST["ALname"];
        $Contact_Phone = $_POST["Contact_Phone"];
        $Contact_Email = $_POST["Contact_Email"];
        $Contact_Address = $_POST["Contact_Address"];
        }
        else{
        $Adob ="";
        $Agender ="";
        $AFname ="";
        $ALname ="";
        $Contact_Phone ="";
        $Contact_Email ="";
        $Contact_Address ="";
        }
       ?>
       
        Date of Birth:
        <input type= "text" name ="Adob" value="<?php echo $Adob;?>" placeholder="YYYY-MM-DD"><br>
        Gender: 
        <input type= "text" name ="Agender" value="<?php echo $Agender;?>"><br>
        First name: 
        <input type= "text" name ="AFname" value="<?php echo $AFname;?>"> <br>
        Last name:
        <input type= "text" name ="ALname" value="<?php echo $ALname;?>"><br>
        Phone #:
        <input type= "text" name ="Contact_Phone" value="<?php echo $Contact_Phone;?>" placeholder="xxx-xxx-xxxx"><br>
        Email:
        <input type= "text" name ="Contact_Email" value="<?php echo $Contact_Email;?>" placeholder="name@address.com"><br>
        Address:
        <input type= "text" name ="Contact_Address" value="<?php echo $Contact_Address;?>"><br>
        
    </form>
    </div>

<div class="row"></div>


<?php
if (isset($_POST["authorBookRL"])){
    authorBookRL();
}
else if (isset($_POST["multBooksToAuthor"])){
    multBooksToAuthor();
}
else if (isset($_POST["subNewAuthor"])){
    newAuthor();
}

function multBooksToAuthor(){
    $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    
//    
//    $AFname = $_POST["AFname"];
//    $ALname = $_POST["ALname"];
    $ISBN = $_POST["ISBN"];
    $Price = $_POST["Price"];
    $Title = $_POST["Title"];
    $User_Reviews =$_POST["User_Reviews"];
    $Publication_Date = $_POST["Publication_Date"];
    $Sname = $_POST["Sname"];
     $Cat_Desc = $_POST["Cat_Desc"];
  
     
    //if user tries to add book for non-existing author
    $sql = mysqli_query($conn, 'SELECT AFname, ALname from Author '
            . 'WHERE Author_ID=' .$_POST['authorID']);
    $row = mysqli_fetch_assoc($sql);
    $AFnameAttempt = $row["AFname"];
    $ALnameAttempt = $row["ALname"];
    
    if(is_null($AFnameAttempt) && is_null($ALnameAttempt)){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Author name not present in Author table. Try adding a new Author/Book relationship.
            </div>';
        exit();
    }
    else{
        //valid author exists
        $AFname = $AFnameAttempt;
        $ALname = $ALnameAttempt;
    }
    if(strlen($ISBN) > 18){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            ISBN is too large. Enter a proper ISBN
            </div>';
        exit();
    }
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
     //if user tries to add duplicate ISBN's
     $sql = mysqli_query($conn, 'SELECT ISBN from Books '
            . 'WHERE ISBN="'.$ISBN .'"');
    $row = mysqli_fetch_assoc($sql);
    $ISBNAttempt = $row["ISBN"];
    
    if(!is_null($ISBNAttempt)){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            ISBN already present in Book table. Enter a unique ISBN for the new book.
            </div>';
        exit();
    }
    //if user tries to add book with a pre-existing title
     $sql = mysqli_query($conn, 'SELECT Title from Books '
            . 'WHERE Title="'.$Title .'"');
    $row = mysqli_fetch_assoc($sql);
    $TitleAttempt = $row["Title"];
    
    if(!is_null($TitleAttempt)){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Title already present in Book table. Edit title to avoid confusion.
            </div>';
        exit();
    }
    
    //search for existing category to see if match exists for new book
    $sql = mysqli_query($conn, 'SELECT Cat_Code from Book_Categories WHERE Cat_Desc="'.$Cat_Desc .'"');
    $row = mysqli_fetch_assoc($sql);
    $currentCatCode = $row["Cat_Code"];
    
    if (!is_null($currentCatCode)){
        $sql = 'INSERT INTO Assigned_To(Cat_Code, ISBN) '
                . 'VALUES('.$currentCatCode .',"'.$ISBN.'")';
        mysqli_query($conn, $sql);
    }//if book category exists, connect new book to category
    else{
        $sql = mysqli_query($conn, 'SELECT Cat_Code from Book_Categories ORDER BY Cat_Code DESC LIMIT 1');
        $row = mysqli_fetch_assoc($sql);
        $newCatCode = $row["Cat_Code"] + 1;
        
        $sql = 'INSERT INTO Book_Categories(Cat_Desc)'
                . 'VALUES("'.$Cat_Desc.'")';
        mysqli_query($conn, $sql);
         $sql = 'INSERT INTO Assigned_To(Cat_Code, ISBN) '
                . 'VALUES('.$newCatCode .',"'.$ISBN.'")';
        mysqli_query($conn, $sql);

    }//else, create new book category, connect new book to category
    
        //search for existing category to see if match exists for new book
    $sql = mysqli_query($conn, 'SELECT Sname from Supplier WHERE Sname="'.$Sname.'"');
    $row = mysqli_fetch_assoc($sql);
    $suppAttempt = $row["Sname"];
    if(!is_null($suppAttempt)){
        //supplier is present in DB
        
        $sql = 'INSERT INTO Books(ISBN, Price, Title, User_Reviews, Publication_Date, Sname)'
                . 'VALUES("'.$ISBN .'","'.$Price .'","'.$Title .'","'.$User_Reviews .'","' .$Publication_Date .'","' .$Sname .'")';
        mysqli_query($conn, $sql);

        //selects the author ID that matches name, attaches it to book through Written_By
        $sql = mysqli_query($conn, 'SELECT Author_ID from Author WHERE AFname="'.$AFname. '" '
                . 'AND ALname="'.$ALname.'"');
        $row = mysqli_fetch_assoc($sql);
        $lastAID = $row["Author_ID"];

        $sql = 'INSERT INTO Written_By(Author_ID, ISBN)'
                . 'VALUES('.$lastAID .',"'.$ISBN.'")';
        mysqli_query($conn, $sql);
    }
    else{
        //supplier name doesnt exist. insert new supplier
        $sql = 'INSERT INTO Supplier(Sname) VALUES ("'.$Sname.'")';
        mysqli_query($conn, $sql);

        $sql = 'INSERT INTO Books(ISBN, Price, Title, User_Reviews, Publication_Date, Sname)'
                . 'VALUES("'.$ISBN .'","'.$Price .'","'.$Title .'","'.$User_Reviews .'","' .$Publication_Date .'","' .$Sname .'")';
        mysqli_query($conn, $sql);

        //selects the author ID that matches name, attaches it to book through Written_By
        $sql = mysqli_query($conn, 'SELECT Author_ID from Author WHERE AFname="'.$AFname. '" '
                . 'AND ALname="'.$ALname.'"');
        $row = mysqli_fetch_assoc($sql);
        $lastAID = $row["Author_ID"];

        $sql = 'INSERT INTO Written_By(Author_ID, ISBN)'
                . 'VALUES('.$lastAID .',"'.$ISBN.'")';
        mysqli_query($conn, $sql);
        
    }
     echo '<div class="alertSuccess">
        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Data successfully added.
            </div>'; 
}

function authorBookRL(){
   $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
	
    $Adob = $_POST["Adob"];
    $Agender = $_POST["Agender"];
    $AFname = $_POST["AFname"];
    $ALname = $_POST["ALname"];
    $Contact_Phone = $_POST["Contact_Phone"];
    $Contact_Email = $_POST["Contact_Email"];
    $Contact_Address = $_POST["Contact_Address"];
    $ISBN = $_POST["ISBN"];
    $Price = $_POST["Price"];
    $Title = $_POST["Title"];
    $User_Reviews =$_POST["User_Reviews"];
    $Publication_Date = $_POST["Publication_Date"];
    $Sname = $_POST["Sname"];
    $Cat_Desc = $_POST["Cat_Desc"];
  
    //If user inputs duplicate author name, displays error message at top of window
    $sql = mysqli_query($conn, 'SELECT AFname, ALname from Author '
            . 'WHERE AFname="'.$AFname .'" AND ALname="'.$ALname .'"');
    $row = mysqli_fetch_assoc($sql);
    $AFnameAttempt = $row["AFname"];
    $ALnameAttempt = $row["ALname"];
    
    if(!is_null($AFnameAttempt) && !is_null($ALnameAttempt)){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Author name already present in Author table. Try adding a book to existing Author.
            </div>';
        exit();
    }
    if(strlen($ISBN) > 18){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            ISBN is too large. Enter a proper ISBN
            </div>';
        exit();
    }
    if(!preg_match("~^[\d.]+$~", $Price)){
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
    if(strlen($Agender) > 1){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Enter a proper Gender. Limited to 1 character
            </div>';
        exit();
    }
    //if user tries to add book with a pre-existing title
     $sql = mysqli_query($conn, 'SELECT Title from Books '
            . 'WHERE Title="'.$Title .'"');
    $row = mysqli_fetch_assoc($sql);
    $TitleAttempt = $row["Title"];
    
    if(!is_null($TitleAttempt)){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Title already present in Book table. Edit title to avoid confusion.
            </div>';
        exit();
    }
     //If user inputs duplicate ISBN, displays error message at top of window
    $sql = mysqli_query($conn, 'SELECT ISBN from Books'
            . ' WHERE ISBN="'.$ISBN.'"');
    $row = mysqli_fetch_assoc($sql);
    $ISBNAttempt = $row["ISBN"];
    
    if(!is_null($ISBNAttempt)){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            ISBN already present in Book table. 
            </div>';
        exit();
    }
    
    //check for duplicate email or phone number entered
    //exists if found
    checkDupeEmail($Contact_Email);
    checkDupePhone($Contact_Phone);
    
    //selects the last contact_ID that exists, increments it by one for the new Author.
    $sql = mysqli_query($conn, 'SELECT Contact_ID from Contact_Details ORDER BY Contact_ID DESC LIMIT 1');
    $row = mysqli_fetch_assoc($sql);
    $newContID = $row["Contact_ID"] + 1;
    
    $sql = 'INSERT INTO Author(Adob, Agender, AFname, ALname, Contact_ID)'
            . 'VALUES("'.$Adob .'","'.$Agender .'","'.$AFname .'","'.$ALname .'","' .$newContID .'")';
    mysqli_query($conn, $sql);
    
    //search for existing category to see if match exists for new book
    $sql = mysqli_query($conn, 'SELECT Cat_Code from Book_Categories WHERE Cat_Desc="'.$Cat_Desc .'"');
    $row = mysqli_fetch_assoc($sql);
    $currentCatCode = $row["Cat_Code"];
    
    if (!is_null($currentCatCode)){
        
        $sql = 'INSERT INTO Assigned_To(Cat_Code, ISBN) '
                . 'VALUES('.$currentCatCode .',"'.$ISBN.'")';
        mysqli_query($conn, $sql);
    }//if book category exists, connect new book to category
    else{
        $sql = mysqli_query($conn, 'SELECT Cat_Code from Book_Categories ORDER BY Cat_Code DESC LIMIT 1');
        $row = mysqli_fetch_assoc($sql);
        $newCatCode = $row["Cat_Code"] + 1;
        
        $sql = 'INSERT INTO Book_Categories(Cat_Desc)'
                . 'VALUES("'.$Cat_Desc.'")';
        mysqli_query($conn, $sql);
         $sql = 'INSERT INTO Assigned_To(Cat_Code, ISBN) '
                . 'VALUES('.$newCatCode .',"'.$ISBN.'")';
        mysqli_query($conn, $sql);
    }//else, create new book category, connect new book to category

    //search for existing supplier to see if match exists for new book
    $sql = mysqli_query($conn, 'SELECT Sname from Supplier WHERE Sname="'.$Sname.'"');
    $row = mysqli_fetch_assoc($sql);
    $suppAttempt = $row["Sname"];
    if(!is_null($suppAttempt)){
        //supplier is present in DB
        
        $sql = 'INSERT INTO Books(ISBN, Price, Title, User_Reviews, Publication_Date, Sname)'
                . 'VALUES("'.$ISBN .'","'.$Price .'","'.$Title .'","'.$User_Reviews .'","' .$Publication_Date .'","' .$Sname .'")';
        mysqli_query($conn, $sql);

        //selects the author ID that matches name, attaches it to book through Written_By
        $sql = mysqli_query($conn, 'SELECT Author_ID from Author WHERE AFname="'.$AFname. '" '
                . 'AND ALname="'.$ALname.'"');
        $row = mysqli_fetch_assoc($sql);
        $lastAID = $row["Author_ID"];

        $sql = 'INSERT INTO Written_By(Author_ID, ISBN)'
                . 'VALUES('.$lastAID .',"'.$ISBN.'")';
        mysqli_query($conn, $sql);
    }
    else{
        //supplier name doesnt exist. insert new supplier
        $sql = 'INSERT INTO Supplier(Sname) VALUES ("'.$Sname.'")';
        mysqli_query($conn, $sql);

        $sql = 'INSERT INTO Books(ISBN, Price, Title, User_Reviews, Publication_Date, Sname)'
                . 'VALUES("'.$ISBN .'","'.$Price .'","'.$Title .'","'.$User_Reviews .'","' .$Publication_Date .'","' .$Sname .'")';
        mysqli_query($conn, $sql);

        //selects the last author_ID used, attaches it to book through Written_By
        $sql = mysqli_query($conn, 'SELECT Author_ID from Author WHERE AFname="'.$AFname. '" '
                . 'AND ALname="'.$ALname.'"');
        $row = mysqli_fetch_assoc($sql);
        $lastAID = $row["Author_ID"];

        $sql = 'INSERT INTO Written_By(Author_ID, ISBN)'
                . 'VALUES('.$lastAID .',"'.$ISBN.'")';
        mysqli_query($conn, $sql);
        
    }//handles supplier names, inserts book info based on it

    $sql = 'INSERT INTO Contact_Details(Contact_ID)'
            . 'VALUES("'.$newContID.'")';
    mysqli_query($conn, $sql);
    
     $sql = 'INSERT INTO Email(Contact_Email, Contact_ID)'
            . 'VALUES("'.$Contact_Email .'","' .$newContID.'")';
    mysqli_query($conn, $sql);
    
    $sql = 'INSERT INTO Address(Contact_Address, Contact_ID)'
            . 'VALUES("'.$Contact_Address .'","' .$newContID.'")';
    mysqli_query($conn, $sql);
    
    $sql = 'INSERT INTO Phone(Contact_Phone, Contact_ID)'
            . 'VALUES("'.$Contact_Phone .'","' .$newContID.'")';
    mysqli_query($conn, $sql);
    
echo '<div class="alertSuccess">
<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
   Data successfully added.
   </div>'; 
}

function newAuthor(){
    $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
    
    $Adob = $_POST["Adob"];
    $Agender = $_POST["Agender"];
    $AFname = $_POST["AFname"];
    $ALname = $_POST["ALname"];
    $Contact_Phone = $_POST["Contact_Phone"];
    $Contact_Email = $_POST["Contact_Email"];
    $Contact_Address = $_POST["Contact_Address"];
    
    //If user inputs duplicate author name
    $sql = mysqli_query($conn, 'SELECT AFname, ALname from Author '
            . 'WHERE AFname="'.$AFname .'" AND ALname="'.$ALname .'"');
    $row = mysqli_fetch_assoc($sql);
    $AFnameAttempt = $row["AFname"];
    $ALnameAttempt = $row["ALname"];
    
    if(!is_null($AFnameAttempt) && !is_null($ALnameAttempt)){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Author name already present in Author table. Try adding a book to existing Author.
            </div>';
        exit();
    }
    if(strlen($Agender) > 1){
        echo '<div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
            Enter a proper Gender. Limited to 1 character
            </div>';
        exit();
    }
    
    checkDupeEmail($Contact_Email);
    checkDupePhone($Contact_Phone);
    
    //selects the last contact_ID that exists, increments it by one for the new Author.
    $sql = mysqli_query($conn, 'SELECT Contact_ID from Contact_Details ORDER BY Contact_ID DESC LIMIT 1');
    $row = mysqli_fetch_assoc($sql);
    $newContID = $row["Contact_ID"] + 1;
    
    $sql = 'INSERT INTO Author(Adob, Agender, AFname, ALname, Contact_ID)'
            . 'VALUES("'.$Adob .'","'.$Agender .'","'.$AFname .'","'.$ALname .'","' .$newContID .'")';
    mysqli_query($conn, $sql);
    
    $sql = 'INSERT INTO Contact_Details(Contact_ID)'
            . 'VALUES("'.$newContID.'")';
    mysqli_query($conn, $sql);
    
     $sql = 'INSERT INTO Email(Contact_Email, Contact_ID)'
            . 'VALUES("'.$Contact_Email .'","' .$newContID.'")';
    mysqli_query($conn, $sql);
    
    $sql = 'INSERT INTO Address(Contact_Address, Contact_ID)'
            . 'VALUES("'.$Contact_Address .'","' .$newContID.'")';
    mysqli_query($conn, $sql);
    
    $sql = 'INSERT INTO Phone(Contact_Phone, Contact_ID)'
            . 'VALUES("'.$Contact_Phone .'","' .$newContID.'")';
    mysqli_query($conn, $sql);
    
    echo '<div class="alertSuccess">
<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
   Data successfully added.
   </div>'; 
    
}

function checkDupeEmail($Contact_Email){
     $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);

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
}//checks for dupe emails in author contacts

function checkDupePhone($Contact_Phone){
   $dbhost = 'localhost';
    $dbuser = 'id1766566_pipesbj';
	$pw = 'sampledb111';
    $dbname = 'id1766566_bookstore';
    $conn = mysqli_connect($dbhost, $dbuser, $pw, $dbname);
    $sql = 'use id1766566_bookstore';
    mysqli_query($conn, $sql);
   
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
          Phone exists withing author contacts. Enter unique phone
            </div>';
        exit();
         }
         $rowPhoneDupe = mysqli_fetch_assoc($resultPhoneDupe); //fetch new tuple, new phone for specific customer
         }//while cycling through phone #s for specific customer
        $rowCont = mysqli_fetch_assoc($resultCont); //fetch new tuple, new customer contact    
        }//while cycling through all customer contact ID's    
}//checks for dupe phone numbers in author contacts
?>
