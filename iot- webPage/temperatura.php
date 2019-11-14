<!DOCTYPE HTML>

<html>

<head>
    <title>Temperatura</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <script src="jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900);

        $color1: #C8DAE6;
        $color2: white;
        $color3: #B8B8B8;
        $color4: #FFCD41;
        $color5: #2092A9;

        body {
            background-color: lighten($color1, 10%);
        }

        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        .weather-wrapper {
            margin-top: 20px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
        }

        .weather-card {

            margin: 20px 5px;
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            width: 270px;
            height: 270px;
            background-color: $color2;
            box-shadow: 0px 0px 25px 1px rgba(50, 50, 50, 0.1);
            animation: appear 500ms ease-out forwards;
        }
            h1{
                position: absolute;
                font-family: 'Lato', sans-serif;
                font-weight: 300;
                font-size: 80px;
                color: $color3;
                bottom: 0;
                left: 35px;
                opacity: 0;
                transform: translateX(150px);
                animation: title-appear 2000ms ease-out 2000ms forwards;
            }

            p {
                position: absolute;
                font-family: 'Lato', sans-serif;
                font-weight: 300;
                font-size: 28px;
                color: lighten($color3, 10%);
                bottom: 0;
                left: 35px;
                animation: title-appear 1s ease-out 500ms forwards;
            }
        }

        .weather-icon {
            position: relative;
            width: 50px;
            height: 50px;
            top: 0;
            float: right;
            margin: 40px 40px 0 0;
            animation: weather-icon-move 5s ease-in-out infinite;
        }

        .sun {
            background: $color4;
            border-radius: 50%;
            box-shadow: rgba(255, 255, 0, 0.1) 0 0 0 4px;
            animation: light 800ms ease-in-out infinite alternate, weather-icon-move 5s ease-in-out infinite;
        }

        @keyframes light {
            from {
                box-shadow: rgba(255, 255, 0, 0.2) 0 0 0 10px;
            }

            to {
                box-shadow: rgba(255, 255, 0, 0.2) 0 0 0 17px;
            }
        }

        .cloud {
            margin-right: 60px;
            background: darken($color1, 5%);
            border-radius: 20px;
            width: 25px;
            height: 25px;
            box-shadow:
                darken($color1, 5%) 24px -6px 0 2px,
                darken($color1, 5%) 10px 5px 0 5px,
                darken($color1, 5%) 30px 5px 0 2px,
                darken($color1, 5%) 11px -8px 0 -3px,
                darken($color1, 5%) 25px 11px 0 -1px;


            &:after {
                content: "";
                position: absolute;
                border-radius: 10px;
                background-color: transparent;
                width: 4px;
                height: 12px;
                left: 0;
                top: 31px;
                transform: rotate(30deg);

                animation: rain 800ms ease-in-out infinite alternate;
            }
        }

        @keyframes rain {
            from {
                box-shadow:
                    $color5 8px 0px,
                    $color5 32px -6px,
                    $color5 20px 0px;
            }

            to {
                box-shadow:
                    $color5 8px 6px,
                    $color5 32px 0px,
                    $color5 20px 6px;
            }
        }

        @keyframes weather-icon-move {
            50% {
                transform: translateY(-8px);
            }
        }

        .inspiration {
            margin-top: 80px;
            color: darken($color1, 25%);
            font-family: 'Lato', sans-serif;
            font-weight: 300;
            font-size: 24px;
            text-align: center;
        }

            a {
                color: #FF8F8F;
                font-weight: 400;
                animation: all 300ms ease-in-out;
            }
        }

        @keyframes appear {
            0% {
                transform: scale(0);
            }

            50% {
                transform: scale(1.05)
            }

            75% {
                transform: scale(0.95)
            }

            100% {
                transform: scale(1)
            }
        }

        @keyframes title-appear {
            from {
                opacity: 0;
                transform: translateX(150px);
            }

            to {
                opacity: 1;
                transform: translateX(0px);
            }
        }

    </style>
    
</head>

<body>
    <div class="page-wrap">

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="index.php"><span class="icon fa-home"></span></a></li>
                <li><a href="alarma.php"><span class="icon fa-bullhorn"></span></a></li>
                <li><a href="temperatura.php" class="active"><span class="icon fa-umbrella"></span></a></li>
            </ul>
        </nav>

        <!-- Main -->
        <section id="main">

            <!-- Header -->
            <header id="header">
                <div>Temperatura</div>
            </header>

            <!-- Section -->
            <section>

                <div class="weather-wrapper">
                    <div class="weather-card madrid">
                        <div class="weather-icon sun"></div>
                        <h1 id="recarga"></h1>
                        <p>Temperatura</p>
                    </div>
                    <div class="weather-card london">
                        <div class="weather-icon cloud"></div>
                        <h1 id="recarga2"></h1>
                        <p>Humedad</p>
                    </div>
                </div>

            

            </section>
            <br><br>    
            <a href="temperatura.php?b=on">Ver registros</a>
            <?php
            if($_GET['b']){ ?>
            <h2 style="text-align:center;">Registro de temperaturas</h2>
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Temperatura</th>
                            <th scope="col">Humedad</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <?php 
                        $file = fopen("../RegistroTemperatura.txt","r");
                        $count=0;                    
                        while(!feof($file)){
                            
                        ?>
                        
                        
                            <?php
                            
                             if($count==0){ echo '<tr>'; ?>
                            <th><?php echo $r=fgets($file); $count++;}else if($count==1){  ?></th>
                            <th><?php echo $r=fgets($file); $count++;}else if($count==2){  ?></th>
                            <th><?php echo $r=fgets($file); $count++;}else if($count==3){  ?></th>
                            <th><?php echo $r=fgets($file); $count=0; echo '</tr>';}  ?></th>
                        
                        
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>

            <!-- Footer -->
            <footer id="footer">
                <div class="copyright">
                    Developed By Moisy
                </div>
            </footer>
        </section>
    </div>

    <!-- Scripts -->
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(
                function() {
                    $('#recarga').load('file-temp.php');
                }, 1000
            );
        });
        $(document).ready(function() {
            setInterval(
                function() {
                    $('#recarga2').load('file-hum.php');
                }, 1000
            );
        });

    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.poptrox.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>