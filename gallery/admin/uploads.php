<?php include("includes/header.php"); ?>
        
<?php 

if(!$session->is_signed_in()) {

	redirect("login.php");
}

?>
        
<?php 

$message = "";

if(isset($_FILES['file'])) {

	try{
		
		$photo = new Photo();
		$photo->title = $_POST['title'];
		$photo->set_file($_FILES['file']);
		
		
		if($photo->save()) {
			
			$message = "Photo uploaded successfully";
		}
	}
	
	catch(Photo_exception $e) {
		
		$message .= "<br>" . $e->errorMessage();
//		$message  = join("<br>" , $photo->errors);
	}
		
}

?>


        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            
            <!-- Top Menu Items -->
            <?php include("includes/top_nav.php"); ?>

            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include("includes/side_nav.php"); ?>
            
            
            <!-- /.navbar-collapse -->
        </nav>
        
        

        <div id="page-wrapper">
            
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Uploads Page
<!--                            <small>Subheading</small>-->
                        </h1>
                        
                  <div class="row">
                     
                      <div class="col-md-6">
                      
                      <h4><?php echo $message; ?></h4>
                      
                       <form action="uploads.php" method="post" enctype="multipart/form-data">
                       	
                       	<div class="form-group">
                       		
                       		<input type="text" name="title" class="form-control">
                       		
                       	</div>
                       	
                       	
                       	<div class="form-group">
                       		
                       		<input type="file" name="file">
                       		
                       	</div>
                       	
                       	
                       	<input type="submit" name="submit">
                       	
                       	
                       </form>
                       
                      </div>
                      
                     </div><!-- End of row -->
                        
                     <div class="row">
                     	
                     	<div class="col-lg-12">
                     		
                     		<form action="uploads.php" class="dropzone" style="border: 6px dashed #0087F7; border-radius: 5px; background: white; margin-top: 30px;"></form>
                     	</div>
                     </div>
                        
<!--
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
-->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>