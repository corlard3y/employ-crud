<?php
require_once('DB.php');

if(isset($_POST["Submit"])){
    if(!empty($_POST["ename"])&&!empty($_POST["ssn"])){
        $ename = $_POST["ename"]; 
        $ssn = $_POST["ssn"]; 
        $dept = $_POST["dept"]; 
        $salary = $_POST["salary"]; 
        $homeaddress = $_POST["homeaddress"]; 
        global $connectDB;

        //to prevent sql injection
        $sql = "INSERT INTO emp_record (ename,ssn,dept,salary,homeaddress) VALUES (:enamE,:ssN,:depT,:salarY,:homeaddresS)";

        $stmt = $connectDB->prepare($sql);
        $stmt->bindValue(':enamE',$ename);
        $stmt->bindValue(':ssN',$ssn);
        $stmt->bindValue(':depT',$dept);
        $stmt->bindValue(':salarY',$salary);
        $stmt->bindValue(':homeaddresS',$homeaddress);

        $Execute = $stmt->execute();
        if($Execute){
            echo '<div class="success">Your data has been submitted successfully</div>';
        }

    }
    else{
        echo '<div class="alert">Please,fill all requirements!!!</div>';
    }
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
<form action="create.php" method="post">
        <div>
            <label>Employee Name:</label>
            <input type='text' placeholder='Name' name='ename'/>
        </div>
        <div>
            <label>Social Security Number:</label>
            <input type='text' placeholder='Social Security Number' name='ssn'/>
        </div>
        <div>
            <label>Department:</label>
            <input type='text' placeholder='Department' name='dept'/>
        </div>
        <div class='web'>
            <label>Salary:</label>
            <input type='text' placeholder='Salary' name='salary'/>
        </div>
        <div>
            <label>Home Address</label>
            <textarea placeholder='Comment here' name='homeaddress'></textarea>
        </div>
        <div class='centered'>
            <input type='submit' name='Submit' value="Submit your record"/>
        </div>
        
    </form>
</body>
</html>