<!DOCTYPE html>
<?php include 'connector.php';?>
<html>

<style>
    .box {
        height: 750px;
        margin: auto;
        border: 4px solid #333;
        text-align: center;
        width: 500px;
        padding: 10px;
        border-radius: 16px;
        margin-bottom: 50px;
    }

    header {
        margin-bottom: 50px;
    }

    h2 {
        color: #333;
        margin-top: 40px;
        margin-bottom: 60px;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
    }
    
    input {
        width: 90%;
        padding: 12px 20px;
        margin: 30px 0;
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
                
                <h2>Login</h2>
     

        <label for="login"><b>Email or Phone number</b></label><br>
        <input type="text" placeholder="Enter Email or Phone number" name="login" required>
                
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

                <button class="register" type="submit" name="submit"> Login</button><br>
                                         
            </form> 
        
        <a href="/register.php"><button class="ihaveac"> I do not have an account</button></a>
     	
        <?php
            } else {  
                    
                $login = $_POST['login'];
               
                $password = $_POST['password'];
              
                $sql = "select count(*) as pocet from user where (email = '". $login ."' or phone = '".$login ."') and password = '".$password ."' ";
                $result = $conn->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $row = $result->fetch();
          
                if($row['pocet'] == 1) {echo "<script>alert('Logged in');</script>"; 
                              session_start();
                               
                                $sql = "select username as username from user where email = '". $login ."'; ";            
                               
                $result = $conn->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $row = $result->fetch();
                               
                    $_SESSION["username"] = $row['username'];
                    $_SESSION["loged"] = "1";
                              echo "<script>window.location = '/index.php'</script>";
                             }
          
       else {
            echo "<script>alert('Your Login Name or Password is invalid');</script>";
            echo "<script>window.location = '/login.php'</script>"; 
      }                                                      
     }
 ?>
    </div>
    
     <?php include 'footer.php';?>
    
</body>

</html>


