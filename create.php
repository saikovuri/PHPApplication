<?php 
$page_name="Create Page";
include("includes/header.php");
include("includes/menu.php");
?>

<?php
     
    require 'includes/queries.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $itemError = null;
        $qtyleftError = null;
        $qtysoldError = null;
        $priceError = null;
        $salesError = null;
         
        // keep track post values
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
         
        // insert data
        if ($valid) {
            
            $result = createQuery($item,$qtyleft,$qtysold,$price,$sales);
 
			if($result === true)
			{
				echo 'Success';
	
			}
			else
			{
				echo $result;
			}

			$Message = urlencode("Successfully added a new record");
      		header("Location: view1.php?Message=".$Message);
      		die;
            
        }
    }
?>


<div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Add a new record into Inventory</h3>
                    </div>
             		<form class="form-horizontal" action="create.php" method="post">
                    
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
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn btn-default" href="view1.php">Back</a>
                      </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->

<?php 
include("includes/footer.php");
?>
