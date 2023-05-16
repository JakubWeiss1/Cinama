<!DOCTYPE html>
<html>

<?php include 'connector.php';?>

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

    <?php include 'navbar.php';?>

    <style>
        * {
            box-sizing: border-box;
        }

        .column {
            float: left;
            width: 50%;
            padding: 10px;
        }

        @media screen and (max-width: 1100px) {
            .column .days {

                display: block;
            }
        }


        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        div.gallerybox {
            margin: auto;
            max-width: 1000px;
        }


        div.gallery {
            transition: transform .2s;
            float: left;
            margin: 5px;

        }

        div.gallery img:hover {
            -ms-transform: scale(1.05);
            /* IE 9 */
            -webkit-transform: scale(1.05);
            /* Safari 3-8 */
            transform: scale(1.05);
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


        div.desc {
            padding: 15px;
            text-align: center;
        }

        .days {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            padding: 2px;
            color: white;
            text-decoration: none
        }

        .day {
            color: black;
        }

        .today {
            border: 2px solid blue;
            border-radius: 8px;
            padding: 5px 0px 5px 0px;
            width: 50px;
            text-align: center;
        }


        a {
            color: black
        }

        div.filmtype {
            font-style: inherit;
        }

        div.filmtime {
            border: 2px solid blue;
            border-radius: 8px;
            padding: 5px 0px 5px 0px;
            width: 50px;
            text-align: center;
        }

        a.filmtime {
            color: black;
            text-decoration: none;
            text-align: center;
        }

        .today {
            border: 2px solid blue;
            border-radius: 8px;
            padding: 5px;
            width: 50px;
            color: black;
        }

        #headerPopup {
            width: 75%;
            margin: 0 auto;
        }

        #headerPopup iframe {
            width: 100%;
            margin: 0 auto;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }


        h2 {
            text-align: center;
            margin: 25px;
        }

        h1 {
            text-align: center;
            margin-top: 100px;
        }

        .comingsoon {
            font-size: 100px;
        }

        .center {
            margin: auto;
            width: 90%;
            padding: 20px;
        }

        hr {
            border-width: 3px;
            color: gray;
        }
    </style>

    <title>My Movie Theater</title>
    <link rel="stylesheet" href="style.css">

    <?php
$film = $_GET['film'];
    $day = $_GET['day'];
    
    $sql = "select film.trailer as trailer, film.comingsoon as comingsoon, film.genre as genre from film where film.name = '$film' ; ";        
        $result= $conn->query($sql); 
   $row= $result->fetch();
 
    $trailer=($row['trailer']);
  $comingsoon=($row['comingsoon']);
      $genre=($row['genre']);
    
    $dayOfWeekNum = date('N');
        if ($dayOfWeekNum == 1) {
                    $dayOfWeek = 'Monday';
} elseif ($dayOfWeekNum == 2) {
                    $dayOfWeek = 'Tuesday';
} elseif ($dayOfWeekNum == 3) {
                    $dayOfWeekNum = 'Wednesday';
} elseif ($dayOfWeekNum == 4) {
                    $dayOfWeek = 'Thursday';
} elseif ($dayOfWeekNum == 5) {
                    $dayOfWeek = 'Friday';
} elseif ($dayOfWeekNum == 6) {
                    $dayOfWeek = 'Saturday';
} elseif ($dayOfWeekNum == 7) {
                    $dayOfWeek = 'Sunday';
} 
    
    $currentUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    
   if (empty($day)){ 
    $day = $dayOfWeek;
     
        echo "<script>window.location = '$currentUrl&day=$day'</script>"; }
?>

</head>
<body>    

    <div class='row'>
        <div class='column'>

            <div class='gallery center'>

                <a target='_blank' href='#headerPopup' id='headerVideoLink' target='_blank'>

                    <?php     echo "<img src='/image/$film.jpg'  alt='$film' width='600' height='400'>"; ?>

                </a>

                <?php  echo"<div class='desc'>$genre </div>" ?>
            </div>
        </div>

        <div id="headerPopup" class="mfp-hide embed-responsive embed-responsive-21by9">
            <?php echo "<iframe class='embed-responsive-item' src='$trailer' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe> "?>
        </div>
        <div class='column'>
            <?php     echo"   <h2>$film</h2>";

            if (empty($genre)){
                echo "<h1> Not found</h1>";
            }         
                
    else if($comingsoon==0){
          
  echo"     
            <ul class='days'>
              
                <li> <a class=' " . ($day=='Monday' ?   'today': 'day' ) ."' href='$currentUrl&day=Monday'>Monday</a></li>                
                <li><a class=' " . ($day=='Tuesday' ?   'today': 'day' ) ."' href='$currentUrl&day=Tuesday'>Tuesday</a></li>
                <li><a class=' " . ($day=='Wednesday' ? 'today': 'day' ) ."' href='$currentUrl&day=Wednesday'>Wednesday</a></li>
                <li><a class=' " . ($day=='Thursday' ?  'today': 'day' ) ."' href='$currentUrl&day=Thursday'>Thursday</a></li>
                <li><a class=' " . ($day=='Friday' ?    'today': 'day' ) ."' href='$currentUrl&day=Friday'>Friday</a></li>
                <li><a class=' " . ($day=='Saturday' ?  'today': 'day' ) ."' href='$currentUrl&day=Saturday'>Saturday</a></li>
                <li><a class=' " . ($day=='Sunday' ?    'today': 'day' ) ."' href='$currentUrl&day=Sunday'>Sunday</a></li>
            </ul>  
            <hr>
            <div>

                <div class='filmtype'>3D</div>

                <div class='filmtime'> 
                    
                   <a class='filmtime' href='/rezervace.php/?film=$film&time=11:30&day=$day'>11:30</a> 
    </div>
    
                <div>EN(CZ-SUB)</div>
                <hr>
            </div>

            <div>
                <div class='filmtype'>2D</div>

                <div class='filmtime'> 
                    <a class='filmtime' href='/rezervace.php/?film=$film&time=13:00&day=$day'>13:00</a>
                </div>

                <div>CZ(CZ-DAB)</div>
                <hr>
            </div>

            <div>
                <div class='filmtype'>4DX</div>

                <div class='filmtime'>
                   <a class='filmtime' href='/rezervace.php/?film=$film&time=15:30&day=$day'>15:30</a> 
                </div>
                <div>EN(CZ-SUB)</div>
                <hr>
            </div>

            <div>
                <div class='filmtype'>2D Dolby Atmos</div>

                <div class='filmtime'>
                      <a class='filmtime' href='/rezervace.php/?film=$film&time=17:00&day=$day'>17:00</a> 
                </div>
                <div>CZ(CZ-DAB)</div>
                <hr>
            </div>
";}
                             
    else if ($comingsoon==1)  {echo"
        <h1 class='comingsoon'> Coming Soon</h1>";
    }         
            ?>
        </div>
    </div>

    <?php
     include 'footer.php';?>
</body>

</html>
