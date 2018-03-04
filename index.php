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
                    <h2>Who we are</h2>
                    <p>Robogals is made possible by our amazing volunteers from universities and young professionals of all genders.</p>

                    <p>We come from a wide range expertise from engineering to law to commerce and are all united under the cause of gender equity in engineering and technology.</p>

                    <h2>What we do</h2>

                    <p>Chapters run engineering and technology workshops free-of-charge in their local communities, focusing on encouraging girls from primary to secondary school to explore an interest, as well as cultivate self-confidence, in these areas.

                        Introducing female engineering students to girls at a young age also provides visibility to female role models, of which there is a significant deficit in the STEM field. The lack of relatable role models has been identified as a cause of low uptake for minorities in all professional and academic fields12.

                        Regional initiatives such as The Robogals Challenge (EMEA) and Pathways Into Engineering (APAC) provide engagement outside of our workshops. These programs encourage self-learning and foster a long-term exposure to the engineering community at large.</p>

                    <h2>Why we do what we do</h2>
                    <p>There is a gender disparity in the STEM workforce as well as at higher education across the globe:

                        Australia: Women make up 28% of the STEM workforce in Australia1, with only 14% in engineering
                        UK: Women make up 14.4% of the STEM workforce in the UK2, with only 8.2% in engineering
                        USA: Women make up 24% of the STEM workforce in the USA3, with only 14% in engineering
                        Canada: Women make up less than 22% of the STEM workforce in the Canada4
                        Saudi Arabia: Women make up 1% of the STEM researchers in Saudi Arabia5, with 34% enrolled in science masters courses
                        Philippines: Women make up an impressive 46% of the STEM workforce in the Philippines6, but only 11.2% in engineering!

                        <b>Why does this matter?</b>

                        Decreasing the gender disparity in STEM fields provides more opportunity for women to generate fair income, as well as encourages professional environments that are safer and more productive for women.

                        Not only this, the engineering industry can tangibly benefit from an increase in gender and racial diversity because a workforce made up of varying genders and minorities creates team dynamics conducive for better problem solving7,8, produces better overall business management9,10,11, and reflects today’s increasingly differentiated customer base9, all of which lead to improved business performance.</p>


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
