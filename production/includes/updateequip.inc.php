<?php
include('dbh.inc.php');
include('access.php');
if(isset($_POST['update-trail']))
{
    $id = $_GET['id'];
    $status = $_POST['status']; 
    $remarks = $_POST['remark'];
    $filename='productionlog_'.date('m-d-Y').'.txt';
    $filepath="../../logs/production/$filename";
    $myfile=fopen($filepath,'a');
    $query0 = "SELECT * FROM trailrent where idUsers='$id'";
    $query_run0 = mysqli_query($conn, $query0);
    $row = mysqli_fetch_assoc($query_run0);
    $mtype = $row['MachType'];
    $load=$row['ton'];
    
    if (empty($status)){
        $query= "UPDATE trailrent SET remarks=? WHERE mID='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query))
            {
                printf("Error: %s\n", mysqli_error($conn));
            }
        else
            {
                mysqli_stmt_bind_param($query_run, "s" ,$remarks);
                mysqli_stmt_execute($query_run);
                $log= $_SESSION['username'].' updated rental trailer client at '.date("h:i:s").PHP_EOL.
                'Machine type: '.$mtype.' Load Capacity: '.$load.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] = "Remarks and Client is Updated";
                header('location: ../rental.php');
                exit();
            }
    }

    elseif (empty($remarks)){
        $query= "UPDATE trailrent SET status=? WHERE mID='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query))
            {
                printf("Error: %s\n", mysqli_error($conn));
            }
        else
            {
                mysqli_stmt_bind_param($query_run, "s" ,$status);
                mysqli_stmt_execute($query_run);
                $log= $_SESSION['username'].' updated rental trailer status and client at '.date("h:i:s").PHP_EOL.
                'Machine type: '.$mtype.' Load Capacity: '.$load.' Status: '.$status.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] = "status and Client is Updated";
                header('location: ../rental.php');
                exit();
            }
    }
    else{
        $query= "UPDATE trailrent SET remarks=?,status=? WHERE mID='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query))
            {
                printf("Error: %s\n", mysqli_error($conn));
            }
        else
            {
                mysqli_stmt_bind_param($query_run, "sss" ,$remarks,$status);
                mysqli_stmt_execute($query_run);
                $log= $_SESSION['username'].' updated rental trailer info at '.date("h:i:s").PHP_EOL.
                'Machine type: '.$mtype.' Load Capacity: '.$load.' Remarks: '.$remarks.' Status: '.$status.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] = "Info Updated";
                header('location: ../rental.php');
                exit();
            }
    }
}
elseif(isset($_POST['update-winch']))
{
    $id = $_GET['id'];
    $status = $_POST['status'];
    
    $remarks = $_POST['remark'];
    $filename='productionlog_'.date('m-d-Y').'.txt';
    $filepath="../../logs/production/$filename";
    $myfile=fopen($filepath,'a');
    $query0 = "SELECT * FROM winchrent where idUsers='$id'";
    $query_run0 = mysqli_query($conn, $query0);
    $row = mysqli_fetch_assoc($query_run0);
    $mtype = $row['MachType'];
    $load=$row['ton'];
    
    if (empty($status)){
        $query= "UPDATE winchrent SET remarks=? WHERE mID='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query))
            {
                printf("Error: %s\n", mysqli_error($conn));
            }
        else
            {
                mysqli_stmt_bind_param($query_run, "s" ,$remarks);
                mysqli_stmt_execute($query_run);
                $log= $_SESSION['username'].' updated rental winch client at '.date("h:i:s").PHP_EOL.
                'Machine type: '.$mtype.' Load Capacity: '.$load.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] = "Remarks and Client is Updated";
                header('location: ../rental.php');
                exit();
            }
    }
    elseif (empty($remarks)){
        $query= "UPDATE winchrent SET status=? WHERE mID='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query))
            {
                printf("Error: %s\n", mysqli_error($conn));
            }
        else
            {
                mysqli_stmt_bind_param($query_run, "s" ,$status);
                mysqli_stmt_execute($query_run);
                $log= $_SESSION['username'].' updated rental winch status and client at '.date("h:i:s").PHP_EOL.
                'Machine type: '.$mtype.' Load Capacity: '.$load.' Status: '.$status.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] = "status and Client is Updated";
                header('location: ../rental.php');
                exit();
            }
    }
    elseif (empty($client)){
        $query= "UPDATE winchrent SET remarks=? WHERE mID='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query))
            {
                printf("Error: %s\n", mysqli_error($conn));
            }
        else
            {
                mysqli_stmt_bind_param($query_run, "ss" ,$remarks);
                mysqli_stmt_execute($query_run);
                $log= $_SESSION['username'].' updated rental winch status and remarks at '.date("h:i:s").PHP_EOL.
                'Machine type: '.$mtype.' Load Capacity: '.$load.' Remarks: '.$remarks.' Status: '.$status.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] = "status and Client is Updated";
                header('location: ../rental.php');
                exit();
            }
    }
    else{
        $query= "UPDATE winchrent SET remarks=?,status=? WHERE mID='$id'";
        $query_run = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_run,$query))
            {
                printf("Error: %s\n", mysqli_error($conn));
            }
        else
            {
                mysqli_stmt_bind_param($query_run, "ss" ,$remarks,$status);
                mysqli_stmt_execute($query_run);
                $log= $_SESSION['username'].' updated rental winch info at '.date("h:i:s").PHP_EOL.
                'Machine type: '.$mtype.' Load Capacity: '.$load.' Remarks: '.$remarks.' Status: '.$status.PHP_EOL.
                '-----------------------------------------------------------------------'.PHP_EOL;
                fwrite($myfile, $log);
                $_SESSION['success'] = "Info Updated";
                header('location: ../rental.php');
                exit();
            }
    }
}
else {
    $_SESSION['status'] = "Info is NOT updated";
    printf("Error: %s\n", mysqli_error($conn));
    header('location: ../rental.php');
    exit();
}
?>