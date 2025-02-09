<?php include("connection.php"); ?>

<?php
    error_reporting(0);
    if(isset($_POST['submit'])){
        $reg_no=$_POST['reg_no'];
        $name=$_POST['name'];
        $department=$_POST['department']; 

        $query="INSERT INTO student_list(reg_no,name,department) VALUES('$reg_no','$name','$department')";
        $data=mysqli_query($connection,$query);

        if($data){
            echo "data inserted";
        }else{
            echo "data is not inserted";
        }
        header('location:registration.php');
    }
?>



<!DOCTYPE html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style>
           
        </style>
    </head>
    <body>
        <div class="container">
            
            <div class="available_department">
                <?php
                   //-------starting of finding total seat of each department total number of regigistered students of each department
                    $total_csc_seat_sql="SELECT total_seat FROM seat WHERE department='csc'";
                    $total_csc_seat_query=mysqli_query($connection,$total_csc_seat_sql);
                    $total_csc_seat_array=mysqli_fetch_assoc($total_csc_seat_query);
                    $total_csc_seat=$total_csc_seat_array['total_seat'];
                    //echo $total_csc_seat;

                    $csc_sql="SELECT * FROM student_list WHERE department='CSC'";
                    $csc_query=mysqli_query($connection,$csc_sql);
                    $csc_counter=mysqli_num_rows($csc_query);
                    //echo  $csc_counter;



                    $total_bba_seat_sql="SELECT total_seat FROM seat WHERE department='bba'";
                    $total_bba_seat_query=mysqli_query($connection,$total_bba_seat_sql);
                    $total_bba_seat=mysqli_fetch_assoc($total_bba_seat_query);
                    $total_bba_seat= $total_bba_seat['total_seat'];
                    //echo $total_bba_seat;

                    $bba_sql="SELECT * FROM student_list WHERE department='bba'";
                    $bba_query=mysqli_query($connection,$bba_sql);
                    $bba_counter=mysqli_num_rows($bba_query);
                    //echo  $bba_counter;



                    $total_eee_seat_sql="SELECT total_seat FROM seat WHERE department='eee'";
                    $total_eee_seat_query=mysqli_query($connection,$total_eee_seat_sql);
                    $total_eee_seat=mysqli_fetch_assoc($total_eee_seat_query);
                    $total_eee_seat=$total_eee_seat['total_seat'];
                    //echo $total_eee_seat;

                    $eee_sql="SELECT * FROM student_list WHERE department='eee'";
                    $eee_query=mysqli_query($connection,$eee_sql);
                    $eee_counter=mysqli_num_rows($eee_query);
                    //echo  $eee_counter;
                    //-------end of finding total seat of each department total number of regigistered students of each department
                    
                    
                    $seat_sql="SELECT * FROM seat";
                    $seat_query=mysqli_query($connection,$seat_sql);
                    echo "<table border='3'>
                            <tr>
                                <th>Department</th>
                                <th>Total seat</th>
                                <th>Available seat</th>
                            </tr>
                        ";
                        while($data=mysqli_fetch_assoc($seat_query))
                    {
                        $department=$data['department'];
                        $total_seat=$data['total_seat'];
                        $available_seat=$data['available_seat'];

                        echo "<tr>
                                    <td>$department</td>
                                    <td>$total_seat</td>
                                    <td>$available_seat</td>
                             </tr>";
                    }

                    $available_csc_seat=$total_csc_seat-$csc_counter;
                    //echo  $available_csc_seat;
                    $available_csc_seat_query="UPDATE seat SET available_seat='$available_csc_seat' WHERE department='csc'";
                    $data1=mysqli_query($connection,$available_csc_seat_query);

                    $available_bba_seat=$total_bba_seat-$bba_counter;
                    //echo  $available_bba_seat;
                    $available_bba_seat_query="UPDATE seat SET available_seat='$available_bba_seat' WHERE department='bba'";
                    $data2=mysqli_query($connection,$available_bba_seat_query);

                    $available_eee_seat=$total_eee_seat-$eee_counter;
                    //echo  $available_bba_seat;
                    $available_eee_seat_query="UPDATE seat SET available_seat='$available_eee_seat' WHERE department='eee'";
                    $data3=mysqli_query($connection,$available_eee_seat_query);
                    
                ?>

            </div>
            <form actiion="" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="title">
                    <h1>Registration form</h1>
                </div>
                <div class="form">
                    <div class="input_field ">
                        <lable>Registration no</lable>
                        <input type="number" class="input" name="reg_no" required>
                    </div>

                    <div class="input_field">
                        <lable>enter Name</lable>
                        <input type="text" class="input" name="name" required>
                    </div>

                    <div class="input_field ">
                        <lable>Department</lable>
                        <select name="department" required>
                            <option value="">select</option>
                            <option value="CSC" <?php if($available_csc_seat<1){echo"disabled";}?>>CSC</option>
                            <option value="BBA" <?php if($available_bba_seat<1){echo"disabled";}?>>BBA</option>
                            <option value="EEE" <?php if($available_eee_seat<1){echo"disabled";}?>>EEE</option>
                        </select>
                    </div>

                    <div class="input_field">
                        <input type="submit" value="Register" class="btn" name="submit">
                    </div>
                    
                </div>
            </form>
        </div>
    </body>
</html>