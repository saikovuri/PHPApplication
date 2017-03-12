<!DOCTYPE html>
<html lang="en">
<head>
	<title>PHP Application</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/layout.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
	<script src="//code.jquery.com/jquery-2.2.3.js" type="text/javascript"></script>
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		} );
	</script>
	<script>
		function myFunction(i) {
			var decision = confirm("Are you sure you want to delete the item?");
			if (decision) {
				window.location = "remove.php?id="+i;
			}
		}
		function updateFunction(i,j,k,l,m,n) {

			window.location = "edit.php?id="+i+"&item="+j.value+"&qtyleft="+k.value+"&qtysold="+l.value+"&price="+m.value+"&sales="+n.value;

		}


	</script>
</head>
<body>

	<h3 id="h3"> You are in <?php echo $page_name; ?> </h3>
