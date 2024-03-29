<?php
include "db_conn.php";

if(isset($_POST['submit'])){
    $NIC = $_POST['NIC'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $phonenumber = $_POST['phonenumber'];
    $Password = md5($_POST['Password']);

    $stmt = $conn -> prepare("select * from users where NIC = ?");
	$stmt -> bind_param("s", $NIC);
	$stmt -> execute();
	$stmt_result = $stmt -> get_result();

    if($stmt_result -> num_rows > 0){
        $data = $stmt_result -> fetch_assoc();
        echo "<p>user exist.</p>";
        
    }else{
        $sql = "INSERT INTO `users`(`NIC`, `FirstName`, `LastName`, `phonenumber`,`Password`) 
        VALUES ('$NIC','$FirstName','$LastName','$phonenumber','$Password')";
        $result = mysqli_query($conn, $sql);
        header("Location: index.php");        
    
}}
?>


<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset ="UTF-8">
        <meta http-equiv="X-UA-Compatible" content ="IE=edge">
        <meta name="viewpoint" content = "width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
         
        <!--Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <title> bank details</title>

    </head>
    <body>
        <nav class= "navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">  
            registration
        </nav>

        <div class="container">
            <div class ="text-center mb-4">
                <h3>Register here</h3>
                <p class="text-muted"> Complete the form</p>
            </div>

            <div class="container d-flex justify-content-center">
                <form action="" method="post" style="width:50vw; min-width:300px;">

                        <div class="col mb-3" >
                            <label class="form-label">NIC: </label>
                            <input type="text" class="form-control" name="NIC" placeholder="provide nic number" required/>
                        </div>

                        <div class="col mb-3">
                            <label class="form-label">First Name: </label>
                            <input type="text" class="form-control" name="FirstName" placeholder="provide first name" required/>
                        </div>

                        <div class="col mb-3">
                            <label class="form-label">Last Name: </label>
                            <input type="text" class="form-control" name="LastName" placeholder="provide last name" required/>
                        </div>

                        <div class="col mb-3">
                            <label class="form-label">Phone  Number: </label>
                            <input type="text" class="form-control" name="phonenumber" placeholder="provie phone number" required/>
                        </div>

                        <div class="col mb-3">
                            <label class="form-label">Password: </label>
                            <input type="password" class="form-control" name="Password" placeholder="provide password" required/>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-success" name="submit">Submit</button>
                            <a href="login.php" class="btn btn-danger">Login</a>

                        </div>


                    
                
                
                </form>
            </div>
        </div>     

    <!--BOotstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
    </body>
</html>