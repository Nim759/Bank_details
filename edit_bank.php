<?php
include "db_conn.php";
$AccountNumber = $_GET['AccountNumber'];

if(isset($_POST['submit'])){
    $BankName = $_POST['BankName'];
    $Branch = $_POST['Branch'];
    $BranchCode = $_POST['BranchCode'];
    $AccountNumber = $_POST['AccountNumber'];

    $sql = "UPDATE bank_details SET BankName='$BankName',Branch='$Branch',BranchCode='$BranchCode',AccountNumber='$AccountNumber' WHERE AccountNumber='$AccountNumber'";
    
    $result = mysqli_query($conn, $sql);
    // echo ($result)

    if($result){
        header("Location: index.php?msg= data updated succefully");
    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }
}
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
            BANK DETAILS
        </nav>

        <div class="container">
            <div class ="text-center mb-4">
                <h3>Edit Bank account Details</h3>
                <p class="text-muted">Click update button after the changes</p>
            </div>

            <?php
            $sql = "SELECT * FROM bank_details WHERE AccountNumber = '$AccountNumber' LIMIT 1";
            $result = mysqli_query($conn, $sql);
            if($result === false){
                echo "Failed: " . mysqli_error($conn);
            } else {
                $row = mysqli_fetch_assoc($result);
            }
            ?>

            <div class="container d-flex justify-content-center">
                <form action="" method="post" style="width:50vw; min-width:300px;">
                    
                        <div class="col mb-3" >
                            <label class="form-label">Bank Name: </label>
                            <input type="text" class="form-control" name="BankName" required value="<?php echo  $row['BankName']?>">
                        </div>

                        <div class="col mb-3">
                            <label class="form-label">Branch: </label>
                            <input type="text" class="form-control" name="Branch" required value="<?php echo  $row['Branch']?>">
                        </div>

                        <div class="col mb-3">
                            <label class="form-label">Branch Code: </label>
                            <input type="text" class="form-control" name="BranchCode" required value="<?php echo  $row['BranchCode']?>">
                        </div>

                        <div class="col mb-3">
                            <label class="form-label">Account Number: </label>
                            <input type="text" class="form-control" name="AccountNumber"required value="<?php echo  $row['AccountNumber']?>">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-success" name="submit">Update</button>
                            <a href="index.php" class="btn btn-danger">Cansel</a>

                        </div>


                    
                
                
                </form>
            </div>
        </div>     

    <!--BOotstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
    </body>
</html>