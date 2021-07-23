<?php 
  include('dbconnect.php');
  $start_time = microtime(true);
  if(isset($_POST['submit']))
  {
 
  $from_date=date('Y-m-d',strtotime($_POST['from_date']));
  $to_date=date('Y-m-d',strtotime($_POST['to_date']));
  $from_age=$_POST['from_age'];
  $to_age=$_POST['to_age']; 
  $area=$_POST['Area'];
  $sex=$_POST['sex'];
  $Spec_Name=$_POST['Spec_Name'];
  $Consultant=$_POST['Consultant'];
  $ref_code=$_POST['referral_doctor'];
  $Drug=$_POST['Drug'];
  $Branch=$_POST['Branch'];
  if($sex==='All')
  {
    $sex='';
  }
  if($Branch==='All')
  {
    $Branch='';
  }
  if($area==='All')
  {
    $area='';
  }
  if($Consultant==='All')
  {
    $Consultant='';
  }
  if($Spec_Name==='All')
  {
     $Spec_Name='';
  }
  if($ref_code==='All')
  {
     $ref_code='';
  }
  $sql= "select pit.patientregno as PaTientID,pit.name,pit.age,pit.sex,p.SpecName,CONCAT(pit.address,', ',pit.address2,', ',pit.address3,', ',pit.district,', ',pit.pincode) AS Address,pit.phone,pit.phone2,pit.ts,p.date,p.REFNAME from patientinfo as pit";
  $sql.=" INNER JOIN patients as p on p.PATIENTID=pit.patientregno AND p.REGNO LIKE 'O%'";
  if(!empty($Drug))
  {
    $sql.=" INNER JOIN oppriscription on oppriscription.PatientID = p.PATIENTID AND oppriscription.Description='".$Drug."' AND oppriscription.Date=p.DATE";
  }
  if(!empty($Branch))
  {
    $sql.=" AND p.Branch='".$Branch."'";
  }
   if(!empty($from_date)&&(!empty($to_date))&&($from_date!='1970-01-01')&&($to_date!='1970-01-01'))
  {
    $sql.=" AND p.date between '$from_date' AND '$to_date'";
  }
  if(!empty($from_age)&&(!empty($to_age)))
  {
    $sql.=" AND pit.age between '$from_age' AND '$to_age'";
  }
  if(!empty($sex))
  {
    $sql.=" AND pit.sex = '$sex'";
  }
 
  if(!empty($ref_code))
  {
    $sql.=" AND p.REFCODE = '$ref_code'";
  }
  if(!empty($Spec_Name))
  {
    $sql.=" AND p.SpecName = '$Spec_Name'";
  }
  if(!empty($area))
  {
    $sql.=" AND pit.cityid = '$area'";
  }
  if(!empty($Consultant))
  {
    $sql.=" AND p.CONCODE = '$Consultant'";
  }
 //echo $sql;
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
    $count=1;

    while($row =mysqli_fetch_assoc($result))
    {
     $row_id=$row['PaTientID'];
     $date = date('Y-m-d',strtotime($row["ts"]));
     echo "<tr>";
     echo "<td>".$count."</td>";
     echo "<td>".$row['PaTientID']."</td>";
     echo "<td>".$row['name']."</td>";
     echo "<td>".$row['age']."</td>";
     echo "<td>".$row['sex']."</td>";
     echo "<td>".$row['SpecName']."</td>";
     echo "<td>".$row['Address']."</td>";
     echo "<td>".$row['phone']."<br>".$row['phone2']."</td>";
     echo "<td>".$row['date']."</td>";
     echo "<td>".$date."</td>"; 
     echo "<td>".$row['REFNAME']."</td>";
     echo "</tr>"; 
       $count+=1;
   // echo print_r($row); 
    }
  
 }
 $end_time = microtime(true); 
 // Calculate the script execution time 
//$execution_time = ($end_time - $start_time);  
//echo " It takes ".$execution_time." seconds to execute the script"; 
?>
