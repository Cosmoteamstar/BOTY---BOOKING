<?php
include('connector.php');
$SQL = "SELECT * FROM menu";
$rsty = doSelect($SQL);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Restaurant</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <link href="css/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="css/heading.css">
        <link rel="stylesheet" href="css/body.css">
    </head>
    <body id="page-top">
        <?php include('nav.php') ?>
        <header class="masthead text-white text-center" style="background-image:url('assets/img/homepage.jpg'); width: 100; height:1000px;">
            <div class="container d-flex align-items-center flex-column">
                <img class="masthead-avatar mb-5" src="assets/img/boty2022.gif" alt="">
                <h1 class="masthead-heading mb-0">WELCOME TO BOTY</h1>
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <p class="pre-wrap masthead-subheading font-weight-light mb-0">24-hour room service and food ordering food</p>
            </div>
        </header>
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="page-section-heading text-secondary mb-0 d-inline-block">CHOOSE YOUR MENU</h2>
                </div>
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="row justify-content-center">
                    <?php
		                while($row = mysqli_fetch_assoc($rsty)){
	                ?>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a href="orderfood.php?food=<?=$row['idfood']?>"><div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100"><p class="text-white mb-0"><?=$row["namefood"]?><br><?=$row["price"]?> Baht</p> 
                            </div><img class="img-fluid" src="<?=$row['pic1']?>" alt="rooms"/></a>
                        </div>
                    </div>
                   <?php } ?>
                </div>
            </div>
        </section>
        <section class="page-section" id="contact">
        </section>
        <?php include('footer.php') ?>
    </body>
</html>