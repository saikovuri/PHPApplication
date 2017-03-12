<?php
$page_name="View 3";
include("includes/header.php");
include("includes/menu.php");
include("includes/queries.php");
include("includes/pagination.php");

function displayresult(){
	$conn = mysqli_connect('localhost:3306', 'root', '','phpapplication');
	$sql='SELECT item,qtyleft,qtysold,price,sales from inventory';
	$result = $conn->query($sql);
	$num = $result->num_rows;

	if($num > 0){  

		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}

}
return $data;
}
echo '<pre>'; print_r(displayresult()); echo '</pre>'; 
?>



<div class="viewfoot">
        <p class="viewpara"> Copyright &copy; Sai Kumar</p>
    </div>