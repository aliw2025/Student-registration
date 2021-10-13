
<?php
include "./mysql.php";

$mysqlHandler = new Mysql();
$mysqlHandler->dbconnect();
$result = $mysqlHandler->selectAll("stocks");
if ($result) {
    
    $rowcount=mysqli_num_rows($result);
    printf("Result set has %d rows.<br>",$rowcount);
    $i=0;
    while($row = mysqli_fetch_row($result)){
       $i=$i+1;
        echo "row ".$i.": ". $row[0]." ". $row[1]." ".$row[2]."<br>";
    }

}else{
    
    echo "empty result";
}



?>