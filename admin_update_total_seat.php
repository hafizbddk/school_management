<?php include("connection.php"); ?>
<?php
    $csc_total_seat_sql="SELECT total_seat FROM seat WHERE department='CSC'";
    $csc_total_seat_query=mysqli_query($connection,$csc_total_seat_sql);
    $csc_total_seat_data_array=mysqli_fetch_assoc($csc_total_seat_query);
    $csc_total_seat=$csc_total_seat_data_array['total_seat'];
   // echo $csc_total_seat;

    $bba_total_seat_sql="SELECT total_seat FROM seat WHERE department='bba'";
    $bba_total_seat_query=mysqli_query($connection,$bba_total_seat_sql);
    $bba_total_seat_data_array=mysqli_fetch_assoc($bba_total_seat_query);
    $bba_total_seat=$bba_total_seat_data_array['total_seat'];
   // echo $bba_total_seat;

    $eee_total_seat_sql="SELECT total_seat FROM seat WHERE department='eee'";
    $eee_total_seat_query=mysqli_query($connection,$eee_total_seat_sql);
    $eee_total_seat_data_array=mysqli_fetch_assoc($eee_total_seat_query);
    $eee_total_seat=$bba_total_seat_data_array['total_seat'];
   // echo $eee_total_seat;

   if(isset($_POST['update'])){
    $update_total_csc_seat=$_POST['update_csc_seat'];
    $update_total_bba_seat=$_POST['update_bba_seat'];
    $update_total_eee_seat=$_POST['update_eee_seat'];

    $csc_seat_update_sql="UPDATE seat SET total_seat='$update_total_csc_seat' WHERE department='csc'";
    $update_data1=mysqli_query($connection,$csc_seat_update_sql);

    $bba_seat_update_sql="UPDATE seat SET total_seat='$update_total_bba_seat' WHERE department='bba'";
    $update_data2=mysqli_query($connection,$bba_seat_update_sql);

    $eee_seat_update_sql="UPDATE seat SET total_seat='$update_total_eee_seat' WHERE department='eee'";
    $update_data3=mysqli_query($connection,$eee_seat_update_sql);
   }

?>


<!DOCTYPE html>
    <head>
        <title>Update  Total seat no.</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        
    </head>
    <body>
        <div class="container">
            <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="title">
                    <h1>Update Your Total Seat</h1>
                </div>
                <table border='1'>
                    <tr>
                        <th>Department</th>
                        <th>Total Seat</th>
                    </tr>
                    <tr>
                        <td>CSC</td>
                        <td><input type="number" class="input" name="update_csc_seat" value="<?php echo"$csc_total_seat"; ?>"></td>
                    </tr>
                    <tr>
                        <td>BBA</td>
                        <td><input type="number" class="input" name="update_bba_seat" value="<?php echo"$bba_total_seat";?>"></td>
                    </tr>
                    <tr>
                        <td>EEE</td>
                        <td><input type="number" class="input" name="update_eee_seat" value="<?php echo"$eee_total_seat";?>"></td>
                    </tr>
                </table>
                <input type="submit" value="Update" class="update_btn" name="update">
            </form>
        </div>
    </body>
</html>
