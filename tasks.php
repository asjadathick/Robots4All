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

                <h1>Add a new task</h1>

                <div class="row ">
                    <div class="col-lg-12">

                        <?php
                        echo resultBlock($errors,$successes);
                        ?>
                        <p>Create new tasks on your account</p>
                        <table>
                            <tr>
                                <th>#</th>
                                <th style="col-md-7">Task</th>
                                <th style="col-md-7">Options</th>
                            </tr>
                            <?php
                            $results = fetchTaskData($loggedInUser->email);
                            foreach ($results as $result){
                                echo "<tr><td>{$result['id']}</td><td>{$result['task']}</td><td><form method='post'><input type='hidden' name='delete' value='" . $result['id'] ."'><input type='submit' value='Delete'></form></td></tr>";

                            }
                            ?>
                            <tr>
                                <td colspan="7">Create a new task:</td>
                            </tr>
                            <tr>
                                <form method="post">
                                    <input type="hidden" name="add">
                                    <td>Task name:</td>
                                    <td><input name="atask" type="text"></td>
                                    <td><input type="submit" value="Add Entry"></td>
                                </form>
                            </tr>
                        </table>


                    </div> <!-- /col -->

                </div> <!-- /row -->
            <?php } ?>




            <!-- footers -->
            <?php require_once("models/page_footer.php"); // the final html footer copyright row + the external js calls ?>

        </div><!--/main-split-row-->
    </div>
</div><!--/.container-->
<!-- Place any per-page javascript here -->

<?php require_once("models/html_footer.php"); // currently just the closing /body and /html ?>
