<?php
  include('dbconnect.php');
  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = "SELECT ITCODE,DESCRIPTION from stock where DESCRIPTION is not null and DESCRIPTION like '$inpText%' ORDER BY DESCRIPTION DESC LIMIT 10";
    $records=mysqli_query($conn,$sql);
    $row_count=mysqli_num_rows($records);
    if($row_count>0)
    {  
        while($row =mysqli_fetch_assoc($records))
        {
            echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['DESCRIPTION'] . '</a>';
  
        }
    }
    else {
        echo '<p class="list-group-item border-1">No Record</p>';
      }
    
  }
?>