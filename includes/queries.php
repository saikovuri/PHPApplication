<?php

function displayQuery($sql)
{
   $conn = mysqli_connect('localhost:3306', 'root', '','phpapplication');
   $result = $conn->query($sql);
   if($result)
   {
       if($result->num_rows > 0)
       {
           return $result;
       }
       else
       {
           return "No Data Available";
       }
   }
   else
   {
       return $result->error;
   }
}

function createQuery($item,$qtyleft,$qtysold,$price,$sales)
{
   $conn = mysqli_connect('localhost:3306', 'root', '','phpapplication');
   $query = $conn->prepare("INSERT INTO Inventory(item,qtyleft,qtysold,price,sales) VALUES (?,?,?,?,?)");
   $query->bind_param("sssss", $item,$qtyleft,$qtysold,$price,$sales);
   if($query->execute())
   {
      $query->close();
      $conn->close();
      return true;
  }
  else
  {
   return $conn->error;
}
}

function updateQuery($item,$qtyleft,$qtysold,$price,$sales,$id)
{
   $conn = mysqli_connect('localhost:3306', 'root', '','phpapplication');
   $query = $conn->prepare("UPDATE Inventory SET item =?,qtyleft =?,qtysold=?,price=?,sales=? WHERE id = ?");
   $query->bind_param("ssssss",$item,$qtyleft,$qtysold,$price,$sales,$id);
   if($query->execute())
   {
       $query->close();
       $conn->close();
       return true;
   }
   else
   {
       return $conn->error;
   }
}

function selectQuery($id)
{
   $conn = mysqli_connect('localhost:3306', 'root', '','phpapplication');
   $query = $conn->prepare("SELECT item,qtyleft,qtysold,price,sales from inventory WHERE id = ?");
   $query->bind_param("i",$id);

   $query->execute();

   $query->store_result();


   $num_of_rows = $query->num_rows;

   if($num_of_rows > 0)
   {
       return $query;
   }
   else
   {
       return $conn->error;
   }

}

function updateInline($item,$qtyleft,$qtysold,$price,$sales,$id)
{
   $conn = mysqli_connect('localhost:3306', 'root', '','phpapplication');
   $sql = 'UPDATE inventory SET item = "'.$item.' ", qtyleft ='.$qtyleft.',qtysold='.$qtysold.',price='.$price.',sales='.$sales.' WHERE id='.$id.' ';
   $result = $conn->query($sql);
}

function removeInline($id)
{

   $conn = mysqli_connect('localhost:3306', 'root', '','phpapplication');

   if ($stmt = $conn->prepare("DELETE FROM Inventory WHERE id = ? LIMIT 1"))
   {
       $stmt->bind_param("i",$id);
       $stmt->execute();
       $stmt->close();
   }
   else
   {
       echo "ERROR: could not prepare SQL statement.";
   }
   $conn->close();
}

?>
