<?php
$conn = mysqli_connect('localhost','root','','boty');
include('connector.php');
checkLoginA();
$SQL = "SELECT * FROM menu";
$rsbook = doSelect($SQL);
if(isset($_POST['Dele'])){
    $dele = 'DELETE FROM menu WHERE idfood="'.$_POST['Dele'].'"';
    if(mysqli_query($conn,$dele)){
        echo '<script>alert("ลบข้อมูลอาหารเรียบร้อย")</script>';
        echo '<script>location.replace("menuAdmin.php")</script>';
    }else{
        echo '<script>alert("เกิดข้อผิดพลาดไม่สามารถลบข้อมูลได้")</script>';
        echo '<script>location.replace("menuAdmin.php")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<form method="POST">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Menu Management</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet">
        <!-- Fonts CSS-->
        <link rel="stylesheet" href="css/heading.css">
        <link rel="stylesheet" href="css/body.css">
        <style>
 
        /* Set display to none for image*/
        #image {
            display: none;
        }
    </style>
    </head>
    <body id="page-top">
    <?php include('navAdmin1.php') ?>
        <header class="masthead  text-white text-center">
        <div class="container">
				
					<div class="row">
						<table class="table">
                            <thead class="thead-dark">
                            <tr class="table-borderless">
                                <td collspan="4"></td>
                                <td></td>
                            </tr>
                                <tr>
                                    <th>NO.</th>
                                    <th>IDFOOD</th>
                                    <th>FOOD NAME</th>
                                    <th>DETAIL</th>
                                    <th>QUANTITY</th>
                                    <th>PRICE</th>
                                    <th>MENU</th>
                                    <th><a href="insertMenu.php" class="btn btn-success text-white">INSERT MENU</a></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            while($row = mysqli_fetch_assoc($rsbook)){
                                $i++
                            
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row["idfood"] ?></td>
                                    <td><?php echo $row["namefood"] ?></td>
                                    <td><?php echo $row["details"] ?></td>
                                    <td><?php echo $row["quantity"] ?></td>
                                    <td><?php echo $row["price"] ?> Baht</td>
                                    <td><a href="editMenu.php?food=<?=$row["idfood"]?>" class="btn btn-warning text-white">EDIT</a></td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modelIdDele<?=$row['idfood']?>">
                                          Delete
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="modelIdDele<?=$row['idfood']?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                                <h5 class="modal-title">Modal title</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            Menu : <?=$row["namefood"]?><br>
                                                            Amount : <?=$row["quantity"]?><br>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger w-100" name="Dele" value="<?=$row['idfood']?>">Save</button>
                                                        <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <script>
                                            $('#exampleModal').on('show.bs.modal', event => {
                                                var button = $(event.relatedTarget);
                                                var modal = $(this);
                                                // Use above variables to manipulate the DOM
                                                
                                            });
                                        </script>
                                    </td>
                                </tr>
                                <?php 
                            }
                             ?>   
                            </tbody>
                        </table>
					</div>
                    
				
		</div>
        </header>
    <input type="hidden" name="del_id" id="del_id">
	<input type="hidden" name="event" id="event">
	<script type="text/javascript">
		function del(idBook) {
		if(confirm("ต้องการลบข้อมูล?")){
		document.forms[0]["del_id"].value=idBook;
		document.forms[0]["event"].value="delete";
		document.forms[0].action="";
		document.forms[0].submit();
		}
		}
        function show() {
            document.getElementById('image')
                    .style.display = "block";
            document.getElementById('btnID')
                    .style.display = "none";
        }
    </script>
    <?php include('footer.php') ?>
    </body>
</form>
</html>