<nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
            <div class="container"><a class="navbar-brand js-scroll-trigger" href="indexadmin.php">BOTY<small class="text-white">Admin</small></a>
                <button class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="roomtable.php"><i class="fa fa-bed" aria-hidden="true"></i> ROOMS</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="type.php">TYPE</a>
                        </li>
                        <?php if($_SESSION["Admingroup"]=='superadmin'){?>                   
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="userDetail.php"><i class="fa fa-user-plus" aria-hidden="true"></i> USERS</a>
                        <?php } ?>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="menuAdmin.php">MENU</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="orderuser.php">ORDERS</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="bookingUser.php">BOOKINGS</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="infoadmin.php"><?php echo $_SESSION["userNameA"]?></a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="btn btn-secondary nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="logout.php"><B>LOGOUT</B></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>