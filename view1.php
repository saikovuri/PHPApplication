<?php
$page_name="Inline edit and delete";
include("includes/header.php");
include("includes/menu.php");
include("includes/queries.php");
include("includes/pagination.php");
?>

<br/><br/>
<div class="container">
	<div class="row">
		<?php
		if(isset($_GET['Message'])){ ?>

		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>

			<?php
			echo $_GET['Message']
			?>

		</div>

		<?php } ?>


		    <h3 class="heading">PHP CRUD</h3>
	</div>
	<div class="row">
		<p class="but">
			<a href="create.php" class="btn btn-success">Create</a>
		</p>

		<?php if($rows > 0)
		{ ?>

		<table class="table table-striped table-bordered table-hover table-condensed table-responsive">
			<tr>

				<th > Item Name</th>
				<th> Quantity Left</th>
				<th> Quantity Sold</th>
				<th> Price</th>
				<th> Sales</th>
				<th> Actions</th>
			</tr>

			<?php

			$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
			$sql = "SELECT id,item,qtyleft,qtysold,price,sales from inventory ORDER BY id DESC $limit";
			$query = displayQuery($sql);


			while($row = mysqli_fetch_assoc($query)){

				echo "<tr>";

				echo "<td> <input name=\"item_".$row['id']."\" id=\"item_".$row['id']."\" type=\"text\" value=\"".$row['item']."\" size=\"20\"></td>";
				echo "<td> <input name=\"qtyleft_".$row['id']."\" id=\"qtyleft_".$row['id']."\" type=\"text\" value=\"" . $row['qtyleft']. "\"size=\"5\"></td>";
				echo "<td> <input name=\"qtysold_".$row['id']."\" id=\"qtysold_".$row['id']."\" type=\"text\" value=\"" . $row['qtysold']. "\"size=\"5\"></td>";
				echo "<td> <input name=\"price_".$row['id']."\" id=\"price_".$row['id']."\" type=\"text\" value=\"" . $row['price']. "\"size=\"5\"></td>";
				echo "<td> <input name=\"sales_".$row['id']."\" id=\"sales_".$row['id']."\" type=\"text\" value=\"" . $row['sales']. "\"size=\"5\"></td>";
				echo '<td width=200>';
 				echo '<a class="btn btn-success" onclick="updateFunction('.$row['id'].',document.getElementById(\'item_'.$row['id'].'\'),document.getElementById(\'qtyleft_'.$row['id'].'\'),document.getElementById(\'qtysold_'.$row['id'].'\'),document.getElementById(\'price_'.$row['id'] .'\'),document.getElementById(\'sales_'.$row['id'] .'\'))">Update</a>';
				echo ' &nbsp ';
				echo '<a class="btn btn-danger" onclick="myFunction('.$row['id'].')">Delete</a>';
				echo '</td>';
				echo "</tr>";


			} ?>


		</table>
		<?php }

		else
			{?>
		<br>
		<div class="alert alert-info alert-dismissible" role="alert" style="text-align: center">

			<?php
			echo "NO DATA AVAILABLE IN THE TABLE"
			?>
		</div>
		<?php }?>

		<div class="page">
		<div id="pagination_controls"  style="margin-bottom: 25px"><?php echo $paginationCtrls; ?></div>
		</div>


	</div>
</div>

<?php
 include("includes/foot.php");
 ?>
