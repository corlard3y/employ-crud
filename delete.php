<?php
require_once('DB.php');

global $connectDB;
$SearchQueryParameter = $_GET['id'];
if(isset($_POST["Submit"])){
        $ename = $_POST["ename"]; 
        $ssn = $_POST["ssn"]; 
        $dept = $_POST["dept"]; 
        $salary = $_POST["salary"]; 
        $homeaddress = $_POST["homeaddress"]; 

        global $connectDB;

        $sql = "DELETE FROM emp_record WHERE id = '$SearchQueryParameter'";

        $Execute = $connectDB->query($sql);
       
        if($Execute){
            echo '<script>window.open("read.php?id=Record Deleted Successfully","_self")</script>';
        }
    }


$execute = $connectDB->query($sql);

if($execute){
    echo '<script>window.open("read.php?id=Record Deleted Successfully","_self")</script>';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='style.css?ver2.0'/>
    <title>Document</title>
</head>
<body>
<?php

global $connectDB;

$sql = "SELECT * FROM emp_record where id = '$SearchQueryParameter'";
$stmt = $connectDB->query($sql);
while($dataRow=$stmt->fetch()){
    $id = $dataRow['id'];
    $ename = $dataRow['ename'];
    $ssn = $dataRow['ssn'];
    $dept = $dataRow['dept'];
    $homeaddress = $dataRow['homeaddress'];
    $salary = $dataRow['salary'];
}

?>
<form action="delete.php?id=<?php echo $SearchQueryParameter; ?>" method="post">
        <div>
            <label>Employee Name:</label>
            <input type='text' placeholder='Name' value="<?php echo $ename; ?>" name='ename'/>
        </div>
        <div>
            <label>Social Security Number:</label>
            <input type='text' placeholder='Social Security Number'  value="<?php echo $ssn; ?>" name='ssn'/>
        </div>
        <div>
            <label>Department:</label>
            <input type='text' placeholder='Department'  value="<?php echo $dept; ?>" name='dept'/>
        </div>
        <div class='web'>
            <label>Salary:</label>
            <input type='text' placeholder='Salary' value="<?php echo $salary; ?>" name='salary'/>
        </div>
        <div>
            <label>Home Address</label>
            <textarea placeholder='Comment here' name='homeaddress'><?php echo $homeaddress; ?></textarea>
        </div>
        <div class='centered'>
            <input type='submit' name='Submit' value="Delete your record"/>
        </div>
        
    </form>
</body>
</html>