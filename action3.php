
<?php
 include('dbconnect.php');
if (isset($_GET['term'])) {
    
   $query = "SELECT * FROM icd10_2011master WHERE Particulars LIKE '{$_GET['term']}%' LIMIT 10";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
     while ($user = mysqli_fetch_array($result)) {
      $res[] = $user['Particulars'];
     }
    } else {
      $res = array();
    }
    //return json res
    echo json_encode($res);
}
?>