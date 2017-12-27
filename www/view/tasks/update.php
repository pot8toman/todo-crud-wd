<?php
    include ("../../controller/updateTaskController.php");
    include ("../../controller/readTaskController.php");
    include("../../model/crudTaskModel.php");

    if ($_POST){
        $ctc = new UpdateTaskController();
        $ctc->Update($_POST);
    }

    if (isset($_GET['task_id'])) {

        $rtc = new ReadTaskController();
        $task = $rtc->ReadOne($_GET['task_id']);
        $key = key($task);

    } else {

        echo "poropor";
        exit;

    }

?>
<!doctype html>
<html lang="en">
    <?php include("../../view/partials/header.php"); ?>
    <body>
        <div class="container">
            <div class="row">
                <?php include("../../view/partials/topbanner.php"); ?>
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>View Task</h4>
                        </div>
                        <div class="col-md-6 right col-sm-6 col-xs-6">
                            <a class="btn btn-default" href="/view/tasks/delete.php?task_id=<?php echo $key ?>">Delete</a>
                            <a class="btn btn-default" href="/view/tasks/">Back to List</a>
                        </div>
                    </div>
                    <div class="well">
                        <form class="form-inline" action="" method="POST">
                            <input type="hidden" name="task_id" value="<?php echo $key ?>" />
                            <div class="form-group">
                                <label for="exampleInputName2">Task Name</label>
                                <input type="text" class="form-control" name="task_name" value="<?php echo $task->$key?>">
                            </div>
                            <input type="submit" class="btn btn-default" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php include("../../view/partials/bottom.php"); ?>
    </body>
</html>