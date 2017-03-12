<?php 
$page_name="Delete Page";
include("includes/header.php");
include("includes/menu.php");
?>

<?php

$id = 0;

if ( !empty($_GET['id'])) {
  $id = $_REQUEST['id'];
}

if ( !empty($_POST)) {

  $id = $_POST['id'];
  $conn = mysqli_connect('localhost:3306', 'root', '','phpapplication');
  $query = $conn->prepare("DELETE FROM Inventory WHERE id = ? LIMIT 1");
  $query->bind_param("s", $id);
  if($query->execute())
  {
   $query->close();
   $conn->close();
   $Message = urlencode("Successfully deleted the record");
   header("Location: view2.php?Message=".$Message);
   die;
 }
 else
 {
  return $conn->error;
}

}

?>
<div class="container">

  <div class="span10 offset1">
    <div class="row">
      <h3>Delete this item from inventory</h3>
    </div>

    <form class="form-horizontal" action="delete.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id;?>"/>
      <p class="alert alert-error">Are you sure to delete ?</p>
      <div class="form-actions">
        <button type="submit" class="btn btn-danger">Yes</button>
        <a class="btn btn-default" href="view2.php">No</a>
      </div>
    </form>
  </div>
  
</div>
</body>
</html>