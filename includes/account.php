<?php include("account_data.php")?> 
<div class="col-md-10">
	<div class="check-out">
        <div class="bs-example4" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table-heading simpleCart_shelfItem">
                    <?php 
                    if(isset($_POST['edit'])){
                        echo "$information_edit"; 
                    }elseif(isset($_POST['update'])){
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $phone_number = $_POST['phone_number'];
                        $mail = $_POST['mail'];
                        $password = $_POST['password'];
                        $address = $_POST['address'];
                        echo "<script>console.log('data input received')</script>";
                        $update = "UPDATE `user` SET `name`='$name', `phone_number`='$phone_number', 
                        `mail`='$mail', `password`='$password', `address`='$address' WHERE id=$id " ;
                        $check = mysqli_query($con,$update);
                        if ($check) {
                            echo "<script>window.location.replace('profile.php?section=account','_self')</script>";
                            echo "<script>console.log('Profile has been Updated.')</script>";
                        }
                        else{
                            echo "<script>alert('Update failed')</script>";
                        }
                    }
                    else{
                         echo "$person_information";   
    
                    }       
                    ?>

                </table>
            </div>
	    </div>
    </div>
</div>
</div>