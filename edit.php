<?php
include("includes/queries.php");
if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$item = $_GET['item'];
	$qtyleft = $_GET['qtyleft'];
	$qtysold = $_GET['qtysold'];
	$price = $_GET['price'];
	$sales = $_GET['sales'];

	if ($item == '' || $qtyleft == ''|| $qtysold == ''||$price == '' || $sales == '')
	{
		$Message = urlencode("ERROR: Please fill in all fields!");
		header("Location: view1.php?Message=".$Message);
	}
	else
	{
		updateInline($item,$qtyleft,$qtysold,$price,$sales,$id);
		$Message =urlencode("Successfully Updated!");
		header("Location: view1.php?Message=".$Message); }

	}

	?>
