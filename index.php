<?php
include('connector.php');
$SQL = "SELECT * FROM types";
$rsty = doSelect($SQL);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>BOTY.HOME</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet">
        <!-- Fonts CSS-->
        <link rel="stylesheet" href="css/heading.css">
        <link rel="stylesheet" href="css/body.css">
    </head>
    <body id="page-top">
        <?php include('nav.php') ?>
        <header class="masthead text-white text-center" style="background-image:url('assets/img/ag.jpg'); width: 100; height:700px;">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image--><img class="masthead-avatar mb-5" src="assets/img/iconic.png" alt="">
                <!-- Masthead Heading-->
                <h1 class="masthead-heading mb-0">WELCOME TO BOTY</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="pre-wrap masthead-subheading font-weight-light mb-0">24-hour room service and food ordering food</p>
            </div>
        </header>
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <div class="text-center">
                    <h2 class="page-section-heading text-secondary mb-0 d-inline-block">CHOOSE YOUR STYLES</h2>
                </div>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!-- Portfolio Items-->
                    <?php
                    #echo $SQL;
		                while($row = mysqli_fetch_assoc($rsty)){
	                ?>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a href="room.php?type=<?=$row['idType']?>"><div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100"><p class="text-white mb-0"><?=$row["typeName"]?></p> 
                            </div><img class="img-fluid" src="<?=$row['tpic1']?>" alt="rooms"/></a>
                        </div>
                    </div>
                   <?php } ?>
                </div>
            </div>
        </section>
        <div class="card-header bg-muted">
        <!-- Portfolio Modal-->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <div class="text-center">
                    <h2 class="page-section-heading text-secondary d-inline-block mb-0">CONTACT US</h2>
                </div>
                <!-- Contact Section Content-->
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="d-flex flex-column align-items-center">
                            <div class="icon-contact mb-3"><i class="fas fa-mobile-alt"></i></div>
                            <div class="text-muted">Phone</div>
                            <div class="lead font-weight-bold">091 879 3941, 02-315-123(1)</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex flex-column align-items-center">
                            <div class="icon-contact mb-3"><i class="far fa-envelope"></i></div>
                            <div class="text-muted">Email</div><a class="lead font-weight-bold" href="mailto:Cosmoteamstar@hotmail.com">Cosmoteamstar@hotmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <?php include('footer.php') ?>
    </body>
</html>