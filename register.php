<?php
ob_start();
session_start();
require_once "connection.php";
?>

<?php
//cara install phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
?>


<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
    <style>
    .iti__flag {background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/img/flags.png");}

    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .iti__flag {background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/img/flags@2x.png");}
}
    
    </style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beetriv - Sign Up</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Sign Up to Beetriv</h1>
                            </div>
                            <form class="user" method="POST">
                            <div class="form-group">
                                <!-- Email -->
                                    <input type="email" class="form-control form-control-user" id="email" name="email"
                                        placeholder="Email Address" required/>
                                </div>
                                <div class="form-group">
                                <!-- Username -->
                                    <input type="text" class="form-control form-control-user" id="username" name="username" pattern="[a-zA-Z]{1,}" title="Username must contain only letters"
                                        placeholder="Username" required/>
                                </div>
                                <!-- IC Number -->
                                <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="ic" name="ic"  
                                        placeholder="IC Number" required/> 
                                        
                                
                                </div>
                                <!-- IC Colour -->
                                <div class="col-sm-6 " >
                                        <input type="text" class="form-control form-control-user" name="ic2" list="ic2"
                                             placeholder="IC Colour" required/>
                                            <datalist id="ic2">
                                                <option value = "Yellow">
                                                <option value = "Purple">
                                                <option value = "Green">
                                            </datalist>
                                    </div>
                                    </div>
                                <!-- Phone number -->
                                <div class="form-group">
                                    <input type="tel" class="form-control" id="phone" name="phone" 
                                    placeholder= "xxx xxxx" required/>

                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
                                    <script>
                                    //format and mask phone number
                                    var input = document.querySelector("#phone");
                                    window.intlTelInput(input, {
                                        onlyCountries: ["bn"],
                                        utilsScript : 'js/utils'
                                    });

                                    $(document).ready(function(){
                                    $('#phone').inputmask('999 9999');
                                    });
                                    
                                    </script>
                                    <?php 
                                    if(isset($_POST["submit"])){                   
                                        if(empty($_POST["phone"])){                
                                        $message = '<span style="color:#FF0000;"><font color="red">*Required</font></span>';
                                        echo $message;  
                                        }
                                        } ?>
                                        

                                </div>
                                <!-- Create Password -->
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" pattern=".{8,25}" title="Required atleast 8 to 25 characters"
                                    placeholder= "Create Password" required/>
                                </div>
                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="rpassword" name="rpassword" 
                                    placeholder= "Confirm Password" required/>
                                </div>
                                <div class="form-group">
                                <!-- checkbox -->
                                <input id="checkbox" type="checkbox" style="float: left; margin-top: 5px;>" required/>
                                <div style="margin-left: 25px; margin-top: 15px; margin-bottom: 15px;">
                                I agree to Beetriv Terms and Conditions
                                </div>
                                <!-- Register Account -->
                                <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Register Account">
                                   
                                
                                <!-- <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->
                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <?php
        //select from which database table
        $select = "SELECT * FROM USERS WHERE 1";

        //variable to be insert into database
        if(isset($_POST['submit'])){
            $email           = ($_POST['email']);
            $username        = ($_POST['username']);
            $ic              = ($_POST['ic']);
            $ic2             = ($_POST['ic2']);
            $phone           = ($_POST['phone']);
            $password        = ($_POST['password']);
            $rpassword       = ($_POST['rpassword']);


            //Mail Set up
            $mail= new PHPMailer(true);

            try {
                
                //Enable debug output
                $mail->SMTPDebug = 0;

                //Send using SMTP
                $mail->isSMTP();

                //Set the SMTP server 
                $mail->Host = 'smtp.gmail.com';

                //Enable SMTP authentication
                $mail->SMTPAuth = true;

                //SMTP username
                $mail->Username = 'ayamketupat02@gmail.com';

                //SMTP password
                $mail->Password = 'k4k5dpkk';

                //SMTP username
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                //SMTP PORT
                $mail->Port = 587;

                //Recipients
                $mail->setFrom('haziqzulhazmi@gmail.com','beetriv.com');

                //add recipient
                $mail->addAddress($email,$username);

                //Set email format to HTML
                $mail->isHTML(true);

                //converting text to html
                // $mail .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                //generating random 4 digit code
                $vcode=substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 4);

                $mail->Subject = 'Email Authentication Code';
                $mail->Body    = '<p>Verification code is: </p>' . $vcode;
                //<a href="http://localhost/Email%20Authentication/registration.php">Reset your password</a> 

                $mail->send();

                $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

                $sql = $conn->query ("INSERT INTO users (Email, Username, Ic_no, Ic_color, Phone_Number, Password, vcode, verified) VALUES ('$email','$username','$ic','$ic2','$phone'
                ,'$password','$vcode','$verified')");
                //mysql_query($conn, $sql);
                // $result = $stmtinsert->execute([$username,$password,$email,$vcode]);

                // if($result){
                //     echo 'Success';
                // }else{
                //     echo 'Error';
                // }

                //password match validation
            if ($password == $rpassword){
                header("location: emailverification.php");
            exit;
            }else{
                echo '<script>alert("Password does not match")</script>';
            }
            }catch (Exception $e){
                echo "Message cannot send, Error Mail: {$mail->ErrorInfo}";

            

            }



            
    }
    
?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>