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
  $DSMIV=$_POST['DSMIV'];
  $ICD10=$_POST['ICD10'];
  $Provisional=$_POST['Provisional'];
  $Spec_Name=$_POST['Spec_Name'];
  $Consultant=$_POST['Consultant'];
  $ref_code=$_POST['referral_doctor'];
  $Branch=$_POST['Branch'];
 
  if(!empty($DSMIV))
  {
    $query="select Code from dsmiv_master where Description='".$DSMIV."'";
  $result = mysqli_query($conn, $query) or die("Error in Selecting " . mysqli_error($conn));
    while ($row = $result->fetch_row()) {
     $DSMCODE = $row[0];
    }
  }
  if(!empty($ICD10))
  {
    $query="select Code from icd10_2011master where Particulars='".$ICD10."'";
  $result = mysqli_query($conn, $query) or die("Error in Selecting " . mysqli_error($conn));
    while ($row = $result->fetch_row()) {
     $ICD10_CODE = $row[0];
    }
  }
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
  // fetches details of patient in patients table from patientinfo table where regno starts with O
  $sql= "select MAX(p.DATE) as lastvisit,DATEDIFF(NOW(), Max(p.Date)) AS DateDiff,p.CONNAME,pit.patientregno as PaTientID,CONCAT(fnameprefix,fathername) as fname,CONCAT(pit.salutation,' ',pit.name) as name,pit.age,pit.sex,pit.case_type,count(p.PATIENTID) as no_of_visit,pit.address,pit.address2,pit.address3,pit.district,pit.pincode,pit.phone,pit.phone2,pit.ts,p.date,p.REFNAME from patientinfo as pit";
  $sql.=" INNER JOIN patients as p on p.PATIENTID=pit.patientregno";
  // if drug name is not null then drug table inner joins with patients table
  if((!empty($ICD10_CODE))||(!empty($DSMIV))||(!empty($Provisional)))
  {
    $sql.=" INNER JOIN opconsdet on opconsdet.PatientID=p.PATIENTID AND opconsdet.Date=p.DATE";
  }
  
  if(!empty($ICD10_CODE))
  {
    $sql.=" AND opconsdet.HeaderName='ICD 10' AND opconsdet.HeaderCode='".$ICD10_CODE."'";
  }
  
  if(!empty($Provisional))
  {
    $sql.=" AND opconsdet.HeaderName='Provisional' AND opconsdet.Particulars='".$Provisional."'";
  }
  if(!empty($DSMCODE))
  {
    $sql.=" AND opconsdet.HeaderName='DSM IV' AND opconsdet.HeaderCode='".$DSMCODE."'";
  }
  $sql.=" WHERE p.REGNO LIKE 'O%'";
  if(!empty($Branch))
  {
    $sql.=" AND p.Branch='".$Branch."'";
  }
   if(!empty($from_date)&&(!empty($to_date))&&($from_date!='1970-01-01')&&($to_date!='1970-01-01'))
  {
    $sql.=" AND pit.ts between '$from_date' AND '$to_date'";
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
    $sql.=" AND pit.case_type = '$Spec_Name'";
  }
  if(!empty($area))
  {
    $sql.=" AND pit.cityid = '$area'";
  }
  if(!empty($Consultant))
  {
    $sql.=" AND p.CONCODE = '$Consultant'";
  }
  $sql.='group by p.PATIENTID';
 echo $sql;
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
    $count=1;
    //prints result in table format
    while($row =mysqli_fetch_assoc($result))
    {
      #checks if timestamp is 000
     $row_id=$row['PaTientID'];
     if($row["ts"]!='0000-00-00 00:00:00')
     {
      $date = date('d-m-Y',strtotime($row["ts"]));
     }
     else
     {
      $date='';
     }
     $lastvisit = date('d-m-Y',strtotime($row['lastvisit']));
     
     echo "<tr>";
     echo "<td>".$count."</td>";
     echo "<td>".$row['PaTientID']."</td>";
     echo "<td>".$row['name']."</td>";
     echo "<td>".$row['age']."</td>";
     echo "<td>".$row['sex']."</td>";
     echo "<td>".$row['case_type']."</td>";
     echo "<td>".$date."</td>"; 
     echo "<td>".$row['no_of_visit']."</td>";
     echo "<td>".$lastvisit."</td>";
     echo "<td>".$row['DateDiff']."</td>";
     echo "<td>";
     if(!empty($row['fname']))
     {
       echo $row['fname']."<br>";
     }
     if(!empty($row['address']))
     {
       echo $row['address']."<br>";
     }
     if(!empty($row['address2']))
     {
       echo $row['address2']."<br>";
     }
     if(!empty($row['address3']))
     {
       echo $row['address3']."<br>";
     }
     if(!empty($row['district']))
     {
       echo $row['district']."<br>";
     }
     if(!(empty($row['pincode']))&&$row['pincode']!=0)
     {
       echo $row['pincode'];
     }
     echo "</td>";
     echo "<td>".$row['phone']."<br>".$row['phone2']."</td>";
     echo "<td>".$row['CONNAME']."</td>";
     echo "<td>".$row['REFNAME']."</td>";
     echo "</tr>"; 
       $count+=1;
   // echo print_r($row); 
    }
  
 }
 
?>
<!-- SELECT *,DATEDIFF(NOW(), op.Date) AS DateDiff from oppriscription as op -->