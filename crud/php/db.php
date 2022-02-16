<?php
function Createdb(){
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="bookstore";

 //create connection
    $con=mysqli_connect($servername,$username,$password);
    // check connection  
    if(!$con){
        die("Connection Failed:" .mysqli_connect_error());
    }
    // create Datbase 
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if(mysqli_query($con,$sql)){
        // echo "Database Created";
        $con=mysqli_connect($servername,$username,$password,$dbname);
        //  creating table   
        $sql ="  CREATE TABLE IF NOT EXISTS books(
                  id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                  book_name varchar(30)  NOT NULL,
                  book_publisher varchar(30) ,
                  book_price float

        );
        
        
        ";
        if(mysqli_query($con,$sql)){
            // echo "Table Created";
            return $con;
        }else{
            echo "Table Not Created";
        }
        


    } else{
        echo "Database Not Created".mysqli_error($con);
    }
}
?>