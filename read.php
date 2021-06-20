<?php
require_once('DB.php');

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


<span class='success'><?php echo @$_GET['id'] ; ?></span>

<div class='flex'>
    <div class='search'>
            <form class='' action='read.php' method='GET'>
                <input type='text' name='search' placeholder='Search by Name or SSN' value=''/>
                <input type='submit' name='searchbutton' value='Search Record'/>
            </form>
    </div>
    <?php 
    

    if (isset($_GET["searchbutton"])) {
        global $connectDB;
        $search = $_GET["search"];

        $sql = "SELECT * FROM emp_record WHERE ename=:searcH OR ssn=:searcH";
        $street = $connectDB->prepare($sql);
        $street->bindValue(':searcH',$search);
        $street->execute();
        while($dataRow=$street->fetch()){
            $id = $dataRow['id'];
            $ename = $dataRow['ename'];
            $ssn = $dataRow['ssn'];
            $dept = $dataRow['dept'];
            $homeaddress = $dataRow['homeaddress'];
            $salary = $dataRow['salary'];
        ?>

        <div>
        <table class='styled-table'>
        <thead>
        <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Social Security</th>
           <th>Department</th>
           <th>Salary</th>
           <th>Home Address</th>
           <th>Search</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $ename; ?></td>
            <td><?php echo $ssn; ?></td>
            <td><?php echo $dept; ?></td>
            <td><?php echo $homeaddress; ?></td>
            <td><?php echo $salary; ?></td>
            <td><a href='read.php' class='clue'>Search Again</a></td>
            </tr>
        </tbody>
        </table>
        </div>
        <?php 

         }
    }
    ?>


    <div>
    <table class='styled-table'>
        <thead>
        <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Social Security</th>
           <th>Department</th>
           <th>Salary</th>
           <th>Home Address</th>
           <th>Update</th>
           <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        global $connectDB;
        $sql = "SELECT * FROM emp_record";
        $stmt = $connectDB->query($sql);
        while($dataRow=$stmt->fetch()){
            $id = $dataRow['id'];
            $ename = $dataRow['ename'];
            $ssn = $dataRow['ssn'];
            $dept = $dataRow['dept'];
            $homeaddress = $dataRow['homeaddress'];
            $salary = $dataRow['salary'];
        
        ?>
            <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $ename; ?></td>
            <td><?php echo $ssn; ?></td>
            <td><?php echo $dept; ?></td>
            <td><?php echo $homeaddress; ?></td>
            <td><?php echo $salary; ?></td>
            <td><a href='update.php?id=<?php echo $id; ?>' class='clue'>Update</a></td>
            <td><a href='delete.php?id=<?php echo $id; ?>' class='clue'>Delete</a></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    </div>
        </div>
</body>
</html>