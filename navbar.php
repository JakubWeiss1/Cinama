<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .clearfix:after {
    content: "";
    display: table;
    clear: both;
}

/* width */
::-webkit-scrollbar {
  width: 12px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #555; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #3d3d3d; 
}
        
        header {
            background-color: #333;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 30px;
            text-decoration: none;

        }

        header a {

            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        header a:hover {
            color: #555;
            text-decoration: none;
        }


        header nav ul li a:hover {
            color: #555;
        }

        header h1 {

            margin: 0;
        }

        header nav {
            display: flex;
        }

        header nav ul {
            list-style
        }

        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        header nav ul li {
            margin: 0 10px;
        }

        header nav ul li a {
            color: #fff;
            text-decoration: none;
        }

    </style>

</head>

<body>
    <header>
        <h1><a href="/">My Movie Theater</a></h1>
        <nav>
            <ul>
                <li><a href="/index.php">Now Showing</a></li>
                <li><a href="/index.php#coming-soon">Coming Soon</a></li>
                <li><a href="/aboutus.php">About Us</a></li>
                
                <?php
                 error_reporting(0);
                session_start();
                if($_SESSION["loged"]==1){
                    
                    echo "<li><a href='/account.php'>" . $_SESSION['username'] . " </a></li>";
                }
                
                else{
                    echo "<li><a href='/register.php'>Register</a></li>";
                }
                error_reporting(1);
                ?>
                
            </ul>
        </nav>
    </header>

</html>
