<!DOCTYPE html>
<?php include 'connector.php';
    session_start();

  
    
    $film = $_GET['film'];
  $time = $_GET['time'];
 $day = $_GET['day'];



 $sql = "select film.idfilm as idfilm,film.trailer as trailer ,film.genre as genre  from film where film.name = '$film' ; ";        
        $result= $conn->query($sql); 
   $row= $result->fetch();
  $idfilm=($row['idfilm']);
  $trailer=($row['trailer']);
  $genre=($row['genre']);

function seat($conn, $seat,$idfilm,$time,$day) {
  $sql = "select count(*) as pocet FROM rezervace WHERE sedadlo = '$seat' and film_idfilm = '$idfilm' and time = '$time' and day = '$day' ";
    $result = $conn->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $row = $result->fetch();
  $class = "";
  if ($row['pocet'] > 0) {
    $class = "red";
  }
  $checkbox = '<td><input type="checkbox" name="sedadlo[]" value="' . $seat . '" class="' . $class . '"></td>';
  return $checkbox;
    
    // Funkce pro vytvoření sedadla a kontrolu zda je obsazené
}


;?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#headerVideoLink').magnificPopup({
                type: 'inline',
            });
        });

    </script>

    <?php include 'navbar.php';
    
    ?>
    <style>
        * {
            box-sizing: border-box;
        }

        .column {
            float: left;
            width: 55%;
            padding: 10px;
        }

        .column1 {
            float: left;
            width: 45%;
            padding: 10px;

        }


        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        @media screen and (max-width: 1160px) {
            .column1 {
                display: none !important;
            }

            .column {
                margin-left: 100px;
                width: 100%;
            }
        }

        div.gallerybox {
            margin: auto;
            max-width: 900px;
        }

        div.gallery {

            transition: transform .2s;
            float: left;
            margin: 5px;

        }

        div.gallery img {
            width: 100%;
            margin: auto;
            max-width: 400px;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 16px;
            transition: transform .2s;
        }

        div.gallery img:hover {
            -ms-transform: scale(1.05);
            /* IE 9 */
            -webkit-transform: scale(1.05);
            /* Safari 3-8 */
            transform: scale(1.05);
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }
         }

        #headerPopup {
            width: 75%;
            margin: 0 auto;
        }

        #headerPopup iframe {
            width: 100%;
            margin: 0 auto;
        }

        .seat-map {
            display: flex;
            flex-direction: column;
            width: 500px;
            justify-content: center;
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        }

        .screen {

            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: gray;
            margin: 30px 0px 15px 5px;
            width: 300px;
            height: 10px;
            text-align: center;
        }

        body {
            font-family: sans-serif;

            justify-content: center;
        }

        h1 {
            text-align: left;
            margin-bottom: 40px;
            margin-top: 30px;
            margin-left: 160px;
        }

        #reserve-button {
            width: 300px;
            height: 40px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: transform .2s;
        }

        #reserve-button:hover {
            -ms-transform: scale(1.05);
            /* IE 9 */
            -webkit-transform: scale(1.05);
            /* Safari 3-8 */
            transform: scale(1.05);
        }

        .center {
            margin: auto;
            width: 90%;
            padding: 20px;
            text-align: center;

        }

        input[type="checkbox"] {
            -webkit-appearance: none;
            appearance: none;
            margin: 2px;
            font: inherit;
            width: 2.15em;
            height: 2.15em;
            border: 0.1em solid currentColor;
            border-radius: 0.15em;
            transform: translateY(-0.075em);
            display: grid;
            place-content: center;
            cursor: pointer;

        }

        input[type="checkbox"]:hover {
            -ms-transform: scale(1.1);
            /* IE 9 */
            -webkit-transform: scale(1.1);
            /* Safari 3-8 */
            transform: scale(1.1);
            background-color: lightgray;
        }

        input[type="checkbox"]::before {
            content: "";
            width: 2em;
            height: 2em;
            transform: scale(0);
            border: 0.1em solid currentColor;
            border-radius: 0.15em;
            transition: 120ms;
            box-shadow: inset 1em 1em var(--form-control-color);
        }

        input[type="checkbox"]:checked::before {
            transform: scale(1);
            background-color: lightskyblue;
        }

        .red {
            cursor: not-allowed;
            pointer-events: none;
            background-color: indianred;
        }

        button {
            background-color: #333;
            color: white;
            border: 2px solid black;
            border-radius: 5px;
            height: 50px;
            width: 140px;
            margin-right: 405px;
            margin-top: 20px;
            cursor: pointer;
            transition: transform .2s;
        }

        button:hover {
            -ms-transform: scale(1.05);
            /* IE 9 */
            -webkit-transform: scale(1.05);
            /* Safari 3-8 */
            transform: scale(1.05);
        }

    </style>
</head>

<body>

    <div class="row">
        <div class="column1">
            <div class="gallery center">
                <a target="_blank" href="#headerPopup" id="headerVideoLink" target="_blank">
                    <?php     echo "<img src='/image/$film.jpg'  alt='$film' width='600' height='400'>"; ?>
                </a>
                <?php  echo"<div class='desc'>$genre </div>" ?>
            </div>
        </div>
        <div id="headerPopup" class="mfp-hide embed-responsive embed-responsive-21by9">
            <?php echo "<iframe class='embed-responsive-item' src='$trailer' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe> "?>
        </div>

        <div class="column">
            <div id="seat-map">
                <div class="screen">
                    <?php 
                if(!isset($_POST['submit'])){
            ?>
                    <form style="text-align:center;" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
                        <h1>Choose your seats</h1>
                        <table>
                            <tr>
                                <td></td>

                                <?php  
                   for ($i = 1; $i <= 15; $i++) {   // čísla sedadel
                       echo "<td>" .$i. "</td>"; 
                       }?>

                            </tr>
                            <tr>

                                <?php
                   for ($i = 1; $i <= 10; $i++) {
                       
                        $row = chr(64 + $i); // Převedení čísla na písmeno 
                       echo 	"<tr><td>" .$row. "</td>";

                       
                       for ($j = 1; $j <= 15; $j++) { // sedadla
                           $seat = $row . $j;
                        
                           echo seat($conn,$seat,$idfilm,$time,$day);
                       }
                   }?>

                        </table>

                        <button class="register" type="submit" name="submit"> Reserve</button><br>
                    </form>

                    <?php
 } else {

$film = $_POST["film"];
$cas = $_POST["cas"];
$sedadla = $_POST["sedadlo"];
                    
                    
$username = $_SESSION['username'] ;                    
     
  $sql = "select iduser as iduser from user where username = '". $username ."'   ";
                    
                $result = $conn->query($sql);  
        $result->setFetchMode(PDO::FETCH_ASSOC);
                    $row = $result->fetch(); 
                    

    if($_SESSION["loged"]==1){

foreach ($sedadla as $sedadlo) { 
    
   
  $sql = "INSERT INTO rezervace (film_idfilm, sedadlo,user_iduser,time,day) VALUES ('".$idfilm."', '".$sedadlo."','".$row['iduser']."', '".$time."', '".$day."')";
  
    $conn->query($sql);
    
}
          
if ((  true)  ){
    
         echo "<script>alert('Reservation completed for: '  +'$time'+' on '+ '$day');</script>";
         echo "<script>window.location = '/index.php'</script>"; 
    }
                   
 else {
echo "Chyba: " . $sql . "<br>" . $conn->error;
     
}}
                    
  else{        
         echo "<script>alert('Please login or register');</script>";
         echo "<script>window.location = '/register.php'</script>"; }

}
?>

                </div>
            </div>
        </div>
    </div>
</body>
<?php include 'footer.php';?>

</html>
