<!doctype html>
<html lang="en">
  <head>
  <title>Wellcome</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d814bf806d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<style>
     body{
         background-color:black;
         color:white;
     }
    .btn-success {
      font-family: Raleway-SemiBold;
      font-size: 13px;
      color: rgba(103, 192, 103, 0.75);
      letter-spacing: 1px;
      line-height: 15px;
      border: 2px solid rgba(103, 192, 103, 0.75);
      border-radius: 40px;
      background: transparent;
      transition: all 0.3s ease 0s;
      width:200 !important;
    }

    .btn-success:hover {
      color: #fff;
      background:red;
      border: 2px solid rgb(103, 192, 103, 0.75);
    }
</style>

<body>

<!-- <div class="container">
    <div class="row mt-5  d-flex justify-content-center justify-align-content">
        
        <a href='../../index.php'><button class='btn btn-success' type='button'> Continue </button></a>
        
    </div>
</div> -->
<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from login where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
      
              echo "  <div class='container'>
           
              <div class='row mt-5  d-flex justify-content-center justify-align-content'>
              <div class ='col-12'>
              <h3 class='text-center'> Wellcome <small>$username</small> </h3>
              </div>  
          
                <a href='../../index.php'><button class='btn btn-success' type='button'> Continue </button></a>
               
              </div>
          </div>"; 
        }  
        else{  
            echo "
            <div class='container'>
            <div class='mt-5'>
            <h1 class='text-danger'> Login failed. Invalid username or password.</h1>
            <h3 class='text-danger'> Go Back </h3>
            </div>
               
              </div>";  
        }     
?>  
</body>
</html>