<?php
include("includes/queries.php");
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
	$id = $_GET['id'];
	removeInline($id);
	$Message = urlencode("Successfully deleted the record");
	header("Location: view1.php?Message=".$Message);
}
else
{
	$Message = urlencode("Error deleting");
	header("Location: view1.php?Message=".$Message);
}
?>
