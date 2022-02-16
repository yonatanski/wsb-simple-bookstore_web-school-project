<?php
 require_once("../crud/php/component.php");
 require_once("../crud/php/opreation.php");
//  require_once("../crud/php/db.php");
//   i moved this imports to opretion php 1 and 2
//  Createdb();
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d814bf806d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- stylesheet  -->
    <link rel="stylesheet" href="style.css"/>
        <!-- stylesheet  -->
    <title>Books</title>
  </head>
  <body>
    <main class="border-rounded container">
        <div class="container  rounded mt-3 ">
            <div class="row">
              
            <div class="col-sm-12">
            <div class="py-4 pr-5 bg-dark mt-3 text-light justify-content-between d-flex sticky-top  banner">
            <h3 class="py-4 pr-5 ml-5 mt-3 text-light "><i class="bi bi-book"></i>Book Store</h1>
            <div class=" ">
            <i class="bi bi-facebook"></i>
            <i class="bi bi-instagram"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-youtube"></i>
            </div>
            
            </div>
            <div class="row">
            <a href="./php/login/index.html" class="ml-auto mt-3"><button class="btn btn-primary mr-auto" type="button"> Log Out</button></a>
            </div>
            <h3 class="text-white mt-3" id="greeting"><!--dynamically gretting display here  --><h3>
              
            <input  class=" text-white mr-auto mt-3 btn btn-primary p-1" type="text" id="currentDateTime"> <!--dynamically Time and Date display here  --><

            <a href="dynamic.html">Click to Market Place</a>
           
            
            <div class="d-flex row justify-content-center mt-3">
                <form action="" method="post"class="w-50" >
                    <div class="col-sm-12">
                    <div class="pt-2">

                 
                </div>
                   
                    <!--  -->
                    <div class="pt-2">
                       <!--************************************** input boxes ************************************** -->
                  <?php inputElement(icon:"<i class='bi bi-list-ol text-white'></i>",placeholder:"ID", name:"book_id",value:"");?>
                    <?php inputElement(icon:"<i class='bi bi-book-half text-white'></i>",placeholder:"Book Name", name:"book_name",value:"");?>

                    </div>
                    <div class="row pt-2">
                        <div class="col-sm-12 col-md-6">
                        <?php inputElement(icon:"<i class='bi bi-paperclip text-white'></i>",placeholder:"Publisher", name:"book_publisher",value:"");?>
                        </div>
                        <div class="col-sm-12 col-md-6">
                        <?php inputElement(icon:"<i class='bi bi-currency-dollar text-white'></i>",placeholder:"Price", name:"book_price",value:"");?>
                        </div>
                        </div>
                    </div>
                      <!--************************************** End input boxes ************************************** -->
                    <div class="d-flex row justify-content-center">
                       
                    <!--************************************** Buttons ************************************** -->
                       <?php buttonElement(btnid:"btn-create", styleclass:"btn btn-success",text:"<i class='bi bi-plus-square-fill'> <span>ADD</span></i>", name:"create",attr:"data-toggle='tooltip'data-placement='bottom' title='Create'");?>
                       <?php buttonElement(btnid:"btn-read", styleclass:"btn btn-primary",text:"<i class='bi bi-arrow-repeat'><span>REFRESH</span></i>", name:"read",attr:"data-toggle='tooltip'data-placement='bottom' title='Refresh'");?>
                       <?php buttonElement(btnid:"btn-update", styleclass:"btn btn-light border",text:"<i class='bi bi-pen-fill'><span>UPDATE</span></i></i>", name:"update",attr:"data-toggle='tooltip'data-placement='bottom' title='Update'");?>
                       <?php buttonElement(btnid:"btn-delete", styleclass:"btn btn-danger",text:"<i class='bi bi-trash-fill btn-danger'><span>DELETE</span></i></i>", name:"delete",attr:"data-toggle='tooltip'data-placement='bottom' title='Delete'");?>
                       <?php buttonElement(btnid:"btn-delete", styleclass:"btn btn-danger",text:"<i class='bi bi-trash-fill btn-danger'><span>DELETE All</span></i></i>", name:"delete_all",attr:"data-toggle='tooltip'data-placement='bottom' title='Delete'");?> 
                       </div>  
                    
                       <!--************************************** end************************************** -->
                    </div>
                  

                </form>
                </div>
                </div>
        </div>
        <!-- ************************************** table will be here ************************************** -->
    <a href="indexx.php"><button class="btn btn-primary" type="button"> Change to Card View </button></a>
        <div class="d-flex container justify-content-center table-data">
                   <table class="table table-striped table-dark">
                       <thead class="thead-dark">
                           <tr>
                               <th>ID</th>
                               <th>Book Name</th>
                               <th>Publisher</th>
                               <th>Book Price</th>
                               <th>Edit</th>
                               
                           </tr>
                       </thead>
                       <tbody class="tbody-dark" id="tbody">
                           <!-- <tr>
                               <td>1</td>
                               <td>Davinci code</td>
                               <td>Daily</td>
                               <td>50</td>
                               <td><i class='fas fa-edit btnedit'></i></td>
                           </tr> -->
                           <?php
                            if(isset($_POST['read'])){
                               $result= getData();
                               if($result){
                                   while($row=mysqli_fetch_assoc($result)){ ?>

                                    <tr>
                                        <td data-id="<?php echo $row['id'];?>"><?php echo $row['id'] ;?></td>
                                        <td data-id="<?php echo $row['id'];?>"><?php echo $row['book_name'] ;?></td>
                                        <td data-id="<?php echo $row['id'];?>"><?php echo $row['book_publisher'] ;?></td>
                                        <td data-id="<?php echo $row['id'];?>"><?php echo '$'.$row['book_price'] ;?></td>
                                        <td><i class='bi bi-pencil-square btnedit'data-id="<?php echo $row['id'];?>"></i></td>
                                    </tr> 
                                  


                                   <?php

                                   }
                               }
                            }
                           
                           ?>
                       </tbody>
                   </table>
               </div>



            </div>
    </main>
    <!-- footer  -->
    <!-- Footer -->
    <div class="container footer sticky-bottom mb-0 mt-5">
   <!-- Footer -->
<footer class="page-footer font-small teal pt-4 sticky-bottom banner_bottom">

<!-- Footer Text -->
<div class="container-fluid text-center text-md-left">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-6 mt-md-0 mt-3">

      <!-- Content -->
      <h5 class="text-uppercase font-weight-bold">Developers</h5>
      <img src="./php/img/Yoo.jpg" width="80px" class="ml-4"  alt="">
      <h5>Yonatan Gosaye</h5>
      <img src="./php/img/sam.jpg" width="80px" class="ml-4"  alt="">
      <h5>Samuel Mamo </h5>

    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none pb-3">

    <!-- Grid column -->
    <div class="col-md-6 mb-md-0 mb-3">

      <!-- Content -->
      <h5 class="text-uppercase font-weight-bold">CRUD WEB SITE</h5>
      <p>CRUD stand For CREATE READ UPDATE DELETE opreation. this Simple book store website built with CRUD function</p>
      <h5 class="text-uppercase font-weight-bold">This Website Built With the following Technologies</h5>
      <img src="./php/img/php.png" width="90px" alt="">
      <img src="./php/img/html.png" width="90px" alt="">
      <img src="./php/img/css-3.png" width="90px" alt="">
      <img src="./php/img/bootstrap.png" width="90px" alt="">
      <img src="./php/img/mysql.png" width="90px" alt="">

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>
<!-- Footer Text -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2021 Copyright:
  <a > Developed By Yonatan and Samuel  for Web Programing Project</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
</div>
</div>
<!-- Footer -->


<script>
  var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date+' '+time;
  document.getElementById("currentDateTime").value = dateTime;
</script>



<script>
    var myDate = new Date();
    var currentHour = myDate.getHours();

    var msg;

    if (currentHour < 12)
        msg = 'Good Morning';
    else if(currentHour == 12)
	msg = 'Good Noon';
    else if (currentHour >= 12 && currentHour <= 17)
        msg = 'Good Afternoon';
    else if (currentHour >= 17 && currentHour <= 24)
        msg = 'Good Evening';

    document.getElementById('greeting').innerHTML =
        '<b>' + msg + '</b>';
</script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="../crud/php/main.js"></script>
    
<!--     
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script> -->
   
  </body>
</html>