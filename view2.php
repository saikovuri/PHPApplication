<?php 
$page_name="View 2";
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
		<p class="create">
			<a href="create.php" class="btn btn-success">Create</a>
		</p>
		

		<?php if($rows > 0)
		{ ?>

		<table id="example" class="display" cellspacing="0" width="1200">
		<thead>
			<tr>

				<th > Item Name</th>
				<th> Quantity Left</th>
				<th> Quantity Sold</th>
				<th> Price</th>
				<th> Sales</th>
				<th> Actions</th>
			</tr>
			</thead>
			<tbody>
			<?php 

			$sql = "SELECT id,item,qtyleft,qtysold,price,sales from inventory";
			$query = displayQuery($sql);
			
			
			while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){

				echo "<tr>";
				echo "<td>" . $row['item']. "</td>"; 
				echo "<td>" . $row['qtyleft']. "</td>"; 
				echo "<td>" . $row['qtysold']. "</td>"; 
				echo "<td>" . $row['price']. "</td>"; 
				echo "<td>" . $row['sales']. "</td>"; 
				echo '<td width=200>';
				echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
				echo ' &nbsp ';
				echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
				echo '</td>';
				echo "</tr>";
			} ?>

		</tbody>
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

	

	</div>
</div>

<div class="viewfoot">
        <p class="viewpara"> Copyright &copy; Sai Kumar</p>
    </div>

</body>
</html>
