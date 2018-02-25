<?php
/*
UserSpice 3.2.0
by Dan Hoover at http://UserSpice.com
Major code contributions by Astropos

a modern version of
UserCake Version: 2.0.2


UserCake created by: Adam Davis
UserCake V2.0 designed by: Jonathan Cassels




*/
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
?>
<?php require_once("models/top-nav.php"); ?>

<div class="container-fluid" style="">

   <div class="row row-offcanvas row-offcanvas-left">
    <div class="col-sm-6 col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
			<p class="visible-xs"><button class="btn btn-primary btn-xs" type="button" data-toggle="offcanvas"><i class="fa fa-caret-square-o-left"></i></button></p>

			<?php require_once("models/left-nav.php"); ?>
	</div><!--/span-->

    <div class="col-sm-6 col-md-9 col-lg-10 main">
        <!--toggle sidebar button-->
          <p class="visible-xs"><button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="fa fa-caret-square-o-left"></i></button></p>

		<?php echo resultBlock($errors,$successes); ?>

		  <!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">

				    <h1 class="page-header">Welcome to Robots4All</h1>
			  <!-- CONTENT GOES HERE -->
			        <p>Test content</p>

				</div>
			</div>
			<!-- /content .row -->

<!-- footers -->
<?php require_once("models/page_footer.php"); // the final html footer copyright row + the external js calls ?>

        </div><!--/main-split-row-->
	</div>
</div><!--/.container-->
<!-- Place any per-page javascript here -->

<?php require_once("models/html_footer.php"); // currently just the closing /body and /html ?>
