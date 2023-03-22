
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
            <?php
            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                '.$msg.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            ?>


            <a href = "add_bank.php" class="btn btn-dark mb-3">Add New </a> 
            
            <table class="table table-hover tect-center ">
                <thead class="table-dark">
                    <tr>

                 
                    <th scope="col">Bank Name</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Branch Code</th>
                    <th scope="col">Account Number</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "db_conn.php";

                        $sql = "SELECT * FROM `bank_details`";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)){
                          ?>
                            
                            <tr>
                                
                                <td ><?php echo $row['BankName']?></td>
                                <td ><?php echo $row['Branch']?></td>
                                <td ><?php echo $row['BranchCode']?></td>
                                <td ><?php echo $row['AccountNumber']?></td>

                                
                                <td>
                                    <a href="edit_bank.php?AccountNumber=<?php echo $row['AccountNumber'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                    <a href="delete_bank.php?AccountNumber=<?php echo $row['AccountNumber'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5 "></i></a>
                                </td>
                                </td>
                            
                                </tr>





                          <?php      
                        }

                    ?>    


                    
                   
                </tbody>
                </table>
        </div>

    <!--BOotstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
    </body>
</html>