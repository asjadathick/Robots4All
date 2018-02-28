<?php
/*
Asjad Athick

*/
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
?>
<?php require_once("models/top-nav.php"); ?>
<!-- PHP GOES HERE -->
<?php
//Prevent the user visiting the logged in page if he is not logged in
if(!isUserLoggedIn()) { header("Location: login.php"); die(); }

if(!empty($_POST))
{

    //delete handler
    if (isset($_POST['delete'])){
        deleteTaskData($_POST['delete'], $loggedInUser->email);
        echo "<div class=\"alert alert-info\">
  <strong>Deleted!</strong> Timesheet entry removed from your account.
</div>";
    }

    if (isset($_POST['add'])){
        addTaskData($loggedInUser->email, $_POST['atask']);
        echo "<div class=\"alert alert-success\">
  <strong>Success!</strong> Timesheet entry added on your account.
</div>";
    }
}
?>

<div class="container-fluid" style="">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>




    <div class="row row-offcanvas row-offcanvas-left">

        <div class="col-sm-6 col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
            <p class="visible-xs">
                <button class="btn btn-primary btn-xs" type="button" data-toggle="offcanvas"><i class="fa fa-fw fa-caret-square-o-left"></i></button>
            </p>

            <?php require_once("models/left-nav.php"); ?>

        </div><!--/span-->

        <div class="col-sm-6 col-md-9 col-lg-10 main">



            <!--toggle sidebar button-->
            <p class="visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="fa fa-fw fa-caret-square-o-left"></i></button>
            </p>

            <?php
            //Links for permission level 3
            if ($loggedInUser->checkPermission(array(3))){
                ?>

            <?php } ?>
            <?php
            //Links for permission level 4
            if ($loggedInUser->checkPermission(array(4))){
                ?>

            <?php } ?>
            <?php
            //Links for permission level 2 (default admin)
            if ($loggedInUser->checkPermission(array(1))){
                ?>

                <h1>Summary</h1>

                <div class="row ">
                    <div class="col-lg-12">

                        <?php
                        echo resultBlock($errors,$successes);
                        ?>
                        <p>Showing the number of hours spent on tasks:</p>
                        <table>
                            <tr>
                                <th>Task Name</th>
                                <th style="col-md-7">Task start date</th>
                                <th style="col-md-7">Timesheet Entries</th>
                                <th style="col-md-7">Hours</th>

                            </tr>
                            <?php
                            $results = fetchSummaryData($loggedInUser->email);
                            foreach ($results as $result){
                                echo "<tr><td>{$result['task']}</td><td>{$result['startdate']}</td><td>{$result['count']}</td><td>{$result['hours']}</td></tr>";

                            }
                            ?>
                        </table>

                        <p>Proportion of time spent</p>

                        <canvas id="myChart" width="400" height="400"></canvas>



                    </div> <!-- /col -->
                    <script>
                        var ctx = document.getElementById("myChart");
                        var myChart = new Chart(ctx, {
                            responsive: false,
                            width:400,
                            height:400,
                            scaleShowGridLines: false,
                            showScale: false,
                            maintainAspectRatio: this.maintainAspectRatio,
                            type: 'pie',
                            data: {
                                labels: [<?php

                                    $results = getPieData($loggedInUser->email);
                                    $len = count($results);
                                    foreach ($results as $index => $result){
                                        echo "'" . $result['task'] . "'" . ($index == $len - 1 ? "" : ",");
                                    }

                                    ?>],
                                datasets: [{
                                    data: [<?php

                                        $results = getPieData($loggedInUser->email);
                                        $len = count($results);
                                        foreach ($results as $index => $result){
                                            echo "'" . $result['hours'] . "'" . ($index == $len - 1 ? "" : ",");
                                        }

                                        ?>],
                                    borderWidth: 1
                                }]
                            }

                        });
                    </script>

                </div> <!-- /row -->
            <?php } ?>




            <!-- footers -->
            <?php require_once("models/page_footer.php"); // the final html footer copyright row + the external js calls ?>

        </div><!--/main-split-row-->
    </div>
</div><!--/.container-->
<!-- Place any per-page javascript here -->

<?php require_once("models/html_footer.php"); // currently just the closing /body and /html ?>
