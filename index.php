<!DOCTYPE html>

<?php
session_start(); 
?> 

<html>

<head>
    <title>My Movie Theater</title>
    <link rel="stylesheet" href="style.css">

    <?php include 'navbar.php';
       
    ?>
</head>

<body>
    <h2 id="now-showing">Now showing</h2>

    <div class="gallerybox">

        <div class="gallerybox">
            <div class="responsive">
                <div class="gallery">
                    <a target="_self" href=film.php/?film=Avatar>
                        <img src="/image/avatar.jpg" alt="Avatar" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>

            <div class="responsive">
                <div class="gallery" >
                    <a target="_self" href=film.php/?film=PussInBoots  >
                        <img src="/image/pussinboots.jpg" alt="pussinboots" width="600" height="400" >
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>

            <div class="responsive">
                <div class="gallery">
                    <a target="_self" href=film.php/?film=Antman>
                        <img src="image/antman.jpg" alt="antman" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>

            <div class="responsive">
                <div class="gallery">
                     <a target="_self" href=film.php/?film=GuardiansOfTheGalaxy>
                    <img src="image/guardiansofthegalaxy.jpg" alt="guardiansofthegalaxy" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>

            <div class="responsive">
                <div class="gallery">
                    <a target="_self" href=film.php/?film=TheWhale>
                        <img src="image/thewhale.jpg" alt="thewhale" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <h2 id="coming-soon">Coming soon</h2>

    <div class="gallerybox">
        <div class="responsive">
            <div class="gallery">
                <a target="_self" href=film.php/?film=Elemental>
                    <img src="image/Elemental.jpg" alt="Elemental" width="600" height="400">
                </a>
                <div class="desc">Add a description of the image here</div>
            </div>
        </div>


        <div class="responsive">
            <div class="gallery">
                <a target="_self" href=film.php/?film=IndianaJones>
                    <img src="image/indianajones.jpg" alt="indianajones" width="600" height="400">
                </a>
                <div class="desc">Add a description of the image here</div>
            </div>
        </div>

        <div class="responsive">
            <div class="gallery">
                <a target="_self" href=film.php/?film=Deadpool>
                    <img src="image/deadpool.jpg" alt="deadpool" width="600" height="400">
                </a>
                <div class="desc">Add a description of the image here</div>
            </div>
        </div>

        <div class="responsive">
            <div class="gallery">
                <a target="_self" href=film.php/?film=Shrek>
                    <img src="image/shrek.jpg" alt="shrek" width="600" height="400">
                </a>
                <div class="desc">Add a description of the image here</div>
            </div>
        </div>

        <div class="responsive">
            <div class="gallery">
                <a target="_self" href=film.php/?film=FastX>
                    <img src="image/fastx.jpg" alt="fastx" width="600" height="400">
                </a>
                <div class="desc">Add a description of the image here</div>
            </div>
        </div>

    </div>

    <div class="clearfix"></div>

    <?php include 'footer.php';?>


</body>

</html>
