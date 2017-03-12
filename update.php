<?php 
$page_name="Update Page";
include("includes/header.php");
include("includes/menu.php");
?>

<?php
require 'includes/queries.php';


$id = null;
if ( !empty($_GET['id'])) {
  $id = $_REQUEST['id'];
}

$query = selectQuery($id);
$query->bind_result($item,$qtyleft,$qtysold,$price,$sales);
$query->fetch();

if ( null==$id ) {
  header("Location: view1.php");
}

if ( !empty($_POST)) {
        // validation errors
  $itemError = null;
  $qtyleftError = null;
  $qtysoldError = null;
  $priceError = null;
  $salesError = null;
  
        // post values
  $item = $_POST['item'];
  $qtyleft = $_POST['qtyleft'];
  $qtysold = $_POST['qtysold'];
  $price = $_POST['price'];
  $sales = $_POST['sales'];
  
        // validate input
  $valid = true;
  if (empty($item)) {
    $itemError = 'Please enter the Item Name';
    $valid = false;
  }
  
  if (empty($qtyleft)) {
    $qtyleftError = 'Please enter the quantity left';
    $valid = false;
  } 
  
  if (empty($qtysold)) {
    $qtysoldError = 'Please enter tha quantity sold';
    $valid = false;
  }
  if (empty($price)) {
    $priceError = 'Please enter the price of the item';
    $valid = false;
  }
  if (empty($sales)) {
    $salesError = 'Please enter value in sales';
    $valid = false;
  }

        // update data
  if ($valid) {
    
    $result = updateQuery($item,$qtyleft,$qtysold,$price,$sales,$id);
    
    if($result === true)
    {
      echo 'Success';
      
    }
    else
    {
      echo $result;
    }
    $Message = urlencode("Successfully updated the record");
    header("Location: view2.php?Message=".$Message);
    die;
  }
} 
?>

<div class="container">

  <div class="span10 offset1">
    <div class="row">
      <h3>Update an item in the inventory</h3>
    </div>

    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">

      <div class="form-group <?php echo !empty($itemError)?'error':'';?>">
        <label class="control-label">Item Name</label>
        <input class="form-control" name="item" type="text"  value="<?php echo !empty($item)?$item:'';?>">
        <?php if (!empty($itemError)): ?>
          <span class="help-inline"><?php echo $itemError;?></span>
        <?php endif; ?>
      </div>
      <div class="form-group <?php echo !empty($qtyleftError)?'error':'';?>">
        <label class="control-label">Quantity Left</label>

        <input class="form-control" name="qtyleft" type="text"  value="<?php echo !empty($qtyleft)?$qtyleft:'';?>">
        <?php if (!empty($qtyleftError)): ?>
          <span class="help-inline"><?php echo $qtyleftError;?></span>
        <?php endif;?>

      </div>
      <div class="form-group <?php echo !empty($qtysoldError)?'error':'';?>">
        <label class="control-label">Quantity Sold</label>

        <input class="form-control" name="qtysold" type="text"  value="<?php echo !empty($qtysold)?$qtysold:'';?>">
        <?php if (!empty($qtysoldError)): ?>
          <span class="help-inline"><?php echo $qtysoldError;?></span>
        <?php endif;?>

      </div>
      <div class="form-group <?php echo !empty($priceError)?'error':'';?>">
        <label class="control-label">Price</label>

        <input class="form-control" name="price" type="text"   value="<?php echo !empty($price)?$price:'';?>">
        <?php if (!empty($priceError)): ?>
          <span class="help-inline"><?php echo $priceError;?></span>
        <?php endif;?>

      </div>
      <div class="form-group <?php echo !empty($salesError)?'error':'';?>">
        <label class="control-label">Sales</label>

        <input class="form-control" name="sales" type="text"   value="<?php echo !empty($sales)?$sales:'';?>">
        <?php if (!empty($salesError)): ?>
          <span class="help-inline"><?php echo $salesError;?></span>
        <?php endif;?>

      </div>
    </br>
    <div class="form-actions">
      <button type="submit" class="btn btn-success">Update</button>
      <a class="btn btn-default" href="view2.php">Back</a>
    </div>
  </form>
</div>

</div> <!-- /container -->

<?php 
include("includes/footer.php");
?>
