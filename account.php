<!DOCTYPE html>
<?php include 'connector.php';?>
<html>


<style>
    .box {
        
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
            <form style="text-align:center;" action="destroysession.php" method="post"  >
                
                <h2>Your account</h2>
                
                 <?php 
                    
                    $username = $_SESSION['username'] ;
                    
        $sql = "select user.name as name,user.surname as surname,user.username as username,user.email as email,user.phone as phone
 from user  where user.username = '$username' ; ";         
        $result = $conn->query($sql);   
        $result->setFetchMode(PDO::FETCH_ASSOC);
         
      while ($row = $result->fetch()): ?>             
        <label for="name"><b>Name</b><br></label>
        <input type="text" placeholder="<?php echo ($row['name']) ?>" name="name" disabled>

        <label for="surname"><b>Surname</b></label>
        <input type="text" placeholder="<?php echo ($row['surname']) ?>" name="surname" disabled><br>
                
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="<?php echo ($row['username']) ?>" name="username" disabled><br>

        <label for="email"><b>Email</b></label><br>
        <input type="email" placeholder="<?php echo ($row['email']) ?>" name="email" disabled>
                
        <label for="phone"><b>Phone Number</b></label>
        <input type="tel" placeholder="<?php echo ($row['phone']) ?>" name="phone" disabled><br>
          
                
      <label for="ticket" ><b>Your tickets</b></label><br><br>
<?php endwhile; 
            
    $sql = "select film.name as film, rezervace.sedadlo as rezervace , time as time, day as day         
            from user 
            join rezervace on rezervace.user_iduser = user.iduser 
            join film on film.idfilm = rezervace.film_idfilm
            where user.username = '$username' ; ";         
                    
        $result = $conn->query($sql);   
        $result->setFetchMode(PDO::FETCH_ASSOC);
      
      while ($row = $result->fetch()): ?>     
         <tr><td><?php 
                    echo ($row['film']) ?> - <td>
          
         <td><?php echo ($row['rezervace']." - ") ?><td>
              <td><?php echo ($row['time']." - ") ?><td>
              <td><?php echo ($row['day']."<br>") ?><td>
    
         </tr>        
        <?php endwhile; ?> 
      <br>
                
                <button class="register" type="submit" name="submit"> Log out</button><br>
                
      </div>  
    </div>
    
     <?php } 
             include 'footer.php';?>
    
</body>

</html>


