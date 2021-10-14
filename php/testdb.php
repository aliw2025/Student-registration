
<?php
include "./mysql.php";

$mysqlHandle = new MysqlHandler('localhost','root','','Test');

$rows = $mysqlHandle->fetchAllFromTable("cities");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<select Name="State" onchange="validateCity(this.name)">
             <option value="-1" selected>select..</option>
            <?php 
            foreach($rows as $row){
                $selected="ac";
                $selection = $row->City;
                echo '<option '.$selected.' value="'.$selection.'">'.$selection.'</option>';
            }
            ?>
          </select>
</body>
</html>