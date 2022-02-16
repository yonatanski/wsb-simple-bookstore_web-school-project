<?php
require_once("db.php");
require_once("component.php");

$con= Createdb();


// Create button 
if(isset($_POST['create'])){
    // echo "Create button clicked";
    createData();
}
//  button function for updating 
if(isset($_POST['update'])){
    // echo "Create button clicked";
    UpdateData();
}
//  button function for deleting
if(isset($_POST['delete'])){
    // echo "Create button clicked";
    deleteRecord();
}
if(isset($_POST['delete_all'])){
    // echo "Create button clicked";
    deleteAllRecord();
}





//  creating data function to make the post to the db 
 function createData(){
    //  $bookname = $_POST['bookname'];
    $bookname =textboxValue(value:"book_name");
    $bookpublisher =textboxValue(value:"book_publisher");
    $bookprice =textboxValue(value:"book_price");
   
    if($bookname&&$bookpublisher&&$bookprice){
       $sql =" INSERT INTO books(book_name,book_publisher,book_price) 

       VALUES('$bookname','$bookpublisher',$bookprice)";
    //    netsed if for notfing message 
    if(mysqli_query($GLOBALS['con'],$sql)){
        // echo "record aded";
        TextNode(classname:"sucess text-center",msg:"RECORD ADDED SUCESSFULLY");
    } else{
        echo "Record not Adedd to db";
    }
     //    netsed if for notfing message ------->

// this else is for form validation 
    }else{
    //  echo "Provide data Please"  ;
    TextNode(classname:"error text-center",msg:"Please Provide data in the form");
    }

 }

//  form validation 
function textboxValue($value){
    $textbox =mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
    if(empty($textbox)){
        return false;

    }else{
        return $textbox;
    }
}



// function for message 
function TextNode($classname,$msg) {
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;

}




//-------------------------- Getting data from the database --------------------------------
function getData (){
    $sql="SELECT * FROM books";
    $result =mysqli_query($GLOBALS['con'],$sql);


    if(mysqli_num_rows($result)>0){
        return $result;
}
}
// updating data 
function UpdateData(){
    $bookid=textboxValue(value:"book_id");
    $bookname=textboxValue(value:"book_name");
    $bookpublisher=textboxValue(value:"book_publisher");
    $bookprice=textboxValue(value:"book_price");
    if($bookname && $bookpublisher && $bookprice){
        $sql= "
          UPDATE books SET book_name='$bookname', book_publisher='$bookpublisher', book_price= '$bookprice' WHERE id='$bookid'
        ";

        if(mysqli_query($GLOBALS['con'],$sql)){
            TextNode(classname:"sucess text-center",msg:"Data Updated");
        }else{
            TextNode(classname:"error text-center",msg:"Data NOT Updated");
          }
    }else{
        TextNode(classname:"error text-center",msg:"Select which data do you want to edit ");
    }
}



// delting selected  data   
function deleteRecord(){
    $bookid=(int)textboxValue(value:"book_id");
    $sql=" DELETE FROM books WHERE id=$bookid";

    if(mysqli_query($GLOBALS['con'],$sql)){
        
  TextNode(classname:"sucess text-center",msg:"DATA DELETED SUCESSFULLY");

}else{
    TextNode(classname:"error text-center",msg:"UNABLE TO DELETED THE DATA");
}
}
 // delting all selected  data  
 function deleteAllRecord(){  
  
    $sql=" DROP TABLE books ";

    if(mysqli_query($GLOBALS['con'],$sql)){

        echo  "<script>alert('Warning!! Do You Want to delete All data? if you clik Ok you will lose all data stored in database');</script>";
  TextNode(classname:"sucess text-center",msg:"All DATA DELETED SUCESSFULLY");
  Createdb();
}else{
    TextNode(classname:"error text-center",msg:"UNABLE TO DELETED THE DATA");
}
}