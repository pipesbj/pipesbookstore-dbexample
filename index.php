<!-- 
Author:         Benjamin Pipes
Class:          CSC 425
Professor:      Ivancic
Files needed:   index.php, adminDashboard.php,
                customerDashboard.php
Using:          Wamp64 for MySQL & PHP server, NetBeans IDE

.................period of work.................Hours
Time worked:    (5:00 - 6:00) 10/26/2016        1
                (7:00 - 8:00) 11/1/2016         1
                (5:00 - 7:30) 11/4/2016         2.5
                (9:00 - 11:30) 11/10/2016       2.5
                (3:30am - 5:00am) 11/12/2016    1.5
                (5:30 - 8:00)   11/12/2016      2.5
                (9:00 - 11:00)  11/16/2016     2
                (7:00 - 12:00)  11/17/2016     5
                (7:30 - 10:30)  11/24/2016      3
                (7:30 - 10:30)  11/25/2016      3
                (9:00 - 12:00)  12/2/2016       3
                (4:00 - 11:00)  12/3/2016       7
                (10:30 - 11:30) 12/4/2016       13
Total Time:.....................................47 hrs

    The purpose of this assignment is to implement the database relational
schema that has been designed throughout the semester (CSC 425). We are to do 
this creating a simple GUI, which simulates an online book store. 
    There is an admin view, which creates the DB, creates the tables, loads
dummy tuples into the DB, etc,
    There is a customer view, where the DB operations are completely abstracted
from them.

-Author(Author_ID, Adob, Agender, AFname, ALname, Contact_ID)
    Contact_ID FK → Contact_Details(Contact_ID)
-Books(ISBN, Price, Title, User_Reviews, Publication_Date, Sname)
    Sname FK → Supplier(Sname)
-Contact_Details(Contact_ID)
-Book_Categories(Cat_Code, Cat_Desc)
-Supplier(Sname)
-Customers(Customer_ID, CFname, CLname, Contact_ID)
    Contact_ID FK → Contact_Details(Contact_ID)
-Orders(Order_ID, Order_Value, Order_Date, Customer_ID)
    Customer_ID FK → Customers(Customer_ID)
-Order_Items(Item_Number, Item_Price, Order_ID, ISBN)
    Order_ID FK → Orders(Order_ID)
    ISBN FK → Books(ISBN)
-Supplier_Rep(SRFname, SRLname, ID, Work_Num, Cell_num, Email, Sname)
    Sname FK→ Supplier(Sname)
-Written_By(Author_ID, ISBN)
    Author_ID FK →Author(Author_ID)
    ISBN FK → Books(ISBN)
-Assigned_To(Cat_Code, ISBN)
    Cat_Code FK → Book_Categories(Cat_Code)
    ISBN FK → Books(ISBN)
-Email(Contact_Email, Contact_ID)
    Contact_ID FK → Contact_Details(Contact_ID)
-Address(Contact _Address, Contact_ID)
    Contact_ID FK → Contact_Details(Contact_ID)
-Phone(Contact _Phone, Contact_ID)
    Contact_ID FK → Contact_Details(Contact_ID)
-->

<?php session_start();
            $_SESSION["CFname"] = null;
            $_SESSION["CLname"] = null;
            ?>  
<html>
    <head>
        <style>
            body{
                line-height: 1.6;
                font-size: 18px;
                color: #444;
                background-color: whitesmoke;
            }
            .specOperator{
            font-size: 30px; background: aliceblue; border-color: activeborder; border-width:3px; width:350px; height:75px; text-align:center; 
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
        </style>
    </head>
    <body>
<div class="staticBoxSignature">
           Created By Benjamin Pipes
</div>        
<form style="text-align:center" action = "adminDashboard.php" method = "post">
   
    <input type = "submit"  class="specOperator"
            value = "Admin Dashboard" name = "gotoAdminDashboard"><br>
     
</form>
        
<form style="text-align:center" action = "customerDashboard.php" method = "post">
     <input type = "submit" class="specOperator"
            value = "Customer Dashboard" name = "gotoCustomerDashboard"><br>
</form> 
        

</body>
</html>