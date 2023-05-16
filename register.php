<!DOCTYPE html>
<?php include 'connector.php';?>
<html>


<style>
    .box {
        height: 800px;
        margin: auto;
        border: 4px solid #333;
        text-align: center;
        width: 500px;
        padding: 10px;
        border-radius: 16px;
        margin-bottom: 50px;
    }

    header {
        margin-bottom: 30px;
    }

    h2 {
        color: #333;
        margin: 20px;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
    }
    
    input {
        width: 90%;
        padding: 12px 20px;
        margin: 20px 0;
        border: none;
        background: transparent;
        border-bottom: 2px solid #333;
        box-sizing: border-box;
        transition: none;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        outline-offset: 0px;
        outline: none;
    }

    .register {
        background-color: #333;
        color: white;
        padding: 14px 20px;
        margin: 25px 0;
        border: none;
        cursor: pointer;
        width: 80%;
        transition: transform .2s;
        border-radius: 16px;
    }

    .register:hover {
        -ms-transform: scale(1.05);
        /* IE 9 */
        -webkit-transform: scale(1.05);
        /* Safari 3-8 */
        transform: scale(1.05);
    }
    
    .ihaveac{
        
        border-color: #333;
     
         border-bottom: 2px solid #333;
        box-sizing: border-box;
        transition: none;
        cursor: pointer;
        transition: transform .2s;
        border-radius: 16px;
    }

    .ihaveac:hover {
        -ms-transform: scale(1.05);
        /* IE 9 */
        -webkit-transform: scale(1.05);
        /* Safari 3-8 */
        transform: scale(1.05);
    }

</style>

<head>


    <?php include 'navbar.php';?>

</head>

<body>

    <div class="box">
        
         <?php 
                if(!isset($_POST['submit'])){
            ?>
            <form style="text-align:center;" method="post" action="<?php $_SERVER['PHP_SELF'];?>" >
                
                <h2>Register</h2>

        <label for="name"><b>Name</b><br></label>
        <input type="text" placeholder="Enter Name" name="name" required>

        <label for="surname"><b>Surname</b></label>
        <input type="text" placeholder="Enter Surname" name="surname" required><br>
                
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required><br>

        <label for="email"><b>Email</b></label><br>
        <input type="email" placeholder="Enter Email" name="email" required>
                
        <label for="phone"><b>Phone Number</b></label>
        <input type="tel" placeholder="Enter Phone Number" name="phone" required>
                
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

                <button class="register" type="submit" name="submit"> Register</button><br>
                         
            </form> 
        
        <a href="/login.php"><button class="ihaveac"> I already have an account</button></a>
        
        <?php
            } else {  
                    
                $phone = $_POST['phone'];
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                
                   
                $hash = md5($name.date('YmdMS'));
                
                $sql = "select count(*) as pocet from user where email = '". $email ."' or phone = '".$phone ."' or username = '".$username ."' ";
                    
                $result = $conn->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $row = $result->fetch();
                                       
                if ($row['pocet'] <= 0){  
                    
                    $sql = "insert into user (name,surname,username,email,phone,password,credit)
                            values ('".$name."','".$surname."','".$username."','".$email."','".$phone."','".$password."','1000')";
                              
                    $conn->query($sql);
                    
                    echo "<script>alert('Registration completed');</script>";
                    echo "<script>window.location = '/index.php'</script>";
                    session_start();
                    
                    $_SESSION["username"] = $username;
                    $_SESSION["loged"] = "1";
                    
                                        
                } else {               
                    echo "<script>alert('Email, Phone or Username is allready in database!');</script>"; 
                    echo "<script>window.location = '/register.php'</script>"; 
                }                                
                  }   ?>

    </div>
    
     <?php include 'footer.php';?>
    
</body>
</html>


