<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />



<!-- Bootstrap Css -->

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <!-- Bootstrap Css -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <!-- To make RESULT table to pdf,exel,svc,printable format -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
 <script src="script.js"></script>
 <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-fluid">
    <div class="form_container">
          <form id="filter_data" method="POST" style="width:80%; padding-top:2%; margin-left:10%;">
            <div class="row">
                    <div class="col-sm-2">
                        <label for="from_date">From Date</label>
            
                        <input class="form-control" type="date" value="<?php echo isset($_POST['from_date']) ? $_POST['from_date']: date('Y-m-d');?>" id="from_date" name="from_date">
                    </div>
                    <div class="col-sm-2">
                        <label for="to_date">To Date</label>
                        <input class="form-control" type="date" value="<?php echo isset($_POST['to_date']) ? $_POST['to_date']: date('Y-m-d'); ?>" id="to_date" name="to_date">
                    </div>
                    <div class="col-sm-2">
                        <label for="sex">Sex</label>
                        <select class="form-control" name="sex" id="sex">
                            <option value="All" <?php echo (isset($_POST['sex']) && $_POST['sex'] === 'All') ? 'selected' : ''; ?>>All</option>
                            <option value="M" <?php echo (isset($_POST['sex']) && $_POST['sex'] === 'M') ? 'selected' : ''; ?>>Male</option>
                            <option value="F" <?php echo (isset($_POST['sex']) && $_POST['sex'] === 'F') ? 'selected' : ''; ?>>Female</option>
                            <option value="O" <?php echo (isset($_POST['sex']) && $_POST['sex'] === 'O') ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="specification">Specification</label>
                        <select class="form-control" name="Spec_Name" id="Spec_Names">
                            <option value="All" <?php echo (isset($_POST['Spec_Name']) && $_POST['Spec_Name'] === 'All') ? 'selected' : ''; ?>>All</option>
                            <option value="GENERAL" <?php echo (isset($_POST['Spec_Name']) && $_POST['Spec_Name'] === 'GENERAL') ? 'selected' : ''; ?>>General</option>
                            <option value="SV" <?php echo (isset($_POST['Spec_Name']) && $_POST['Spec_Name'] === 'SV') ? 'selected' : ''; ?>>SV</option>
                            <option value="DAC" <?php echo (isset($_POST['Spec_Name']) && $_POST['Spec_Name'] === 'DAC') ? 'selected' : ''; ?>>DAC</option>
                            <option value="ACE" <?php echo (isset($_POST['Spec_Name']) && $_POST['Spec_Name'] === 'ACE') ? 'selected' : ''; ?>>ACE</option>
                        </select>
                    
                    </div>
                    <div class="col-sm-4">
                        <label for="referral_doctor">Referral Doctor</label>
                        <select class="form-control" name="referral_doctor" id="referral_doctor">
                            <option value="All" <?php echo (isset($_POST['referral_doctor']) && $_POST['referral_doctor'] === 'All') ? 'selected' : ''; ?>>All</option>
                            <?php
                                include('dbconnect.php');
                                $records=mysqli_query($conn,"SELECT CODE,NAME FROM refdoctor where CODE!='' AND NAME!=''");
                                $selectedLocation = ''; 
                                    if (isset($_POST['referral_doctor'])) {
                                        $selectedLocation = $_POST['referral_doctor']; 
                                        //to retain data that submited 
                                    }
                                while($row=mysqli_fetch_array($records))
                                {
                                    $selected = ''; //default to empty string - not selected
                                    if ($selectedLocation == $row['CODE']) {
                                        $selected = 'selected';   
                                    }
                                    echo '<option value="' . htmlspecialchars($row['CODE']) . '" '.$selected.'>' 
                                   . htmlspecialchars($row['NAME']) 
                                   . '</option>';
                                }
                            ?>
                        </select>
                     </div>
                
            </div>
            <div class="row">
                    <div class="col-sm-2">
                        <label for="from_age">From Age</label>
                        <input class="form-control" value="<?php echo isset($_POST['from_age']) ? $_POST['from_age']:'' ?>" type="number" min="1" max="120" id="from_age" name="from_age">
                    </div>
                    <div class="col-sm-2">
                        <label for="to_age">To Age</label>
                        <input  class="form-control" value="<?php echo isset($_POST['to_age']) ? $_POST['to_age']:'' ?>" type="number" min="1" max="120" id="to_age" name="to_age">
                    </div>
                
 
                    <div class="col-sm-2">
                        <label for="Area">Area</label>
                        <select class="form-control" name="Area" id="Area">
                        <option value="All" <?php echo (isset($_POST['Area']) && $_POST['Area'] === 'All') ? 'selected' : ''; ?>>All</option>
                            <?php
                                include('dbconnect.php');
                                  $records=mysqli_query($conn,"SELECT * FROM area WHERE AreaID!='' AND AreaName!=''");
                                
                                   $selectedLocation = ''; 
                                    if(isset($_POST['Area']))
                                    {
                                        $selectedLocation = $_POST['Area'];   
                                    }
                                while($row=mysqli_fetch_array($records))
                                {
                                    $selected = ''; //default to empty string - not selected
                                    if ($selectedLocation == $row['AreaID']) {
                                        $selected = 'selected';   
                                    }
                                    echo '<option value="' . htmlspecialchars($row['AreaID']) . '" '.$selected.'>' 
                                   . htmlspecialchars($row['AreaName']) 
                                   . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                
                    <div class="col-sm-2">
                        <label for="Branch">Branch</label>
                        <select class="form-control" name="Branch" id="Branch">
                            <option value="All" <?php echo (isset($_POST['Branch']) && $_POST['Branch'] === 'All') ? 'selected' : ''; ?>>All</option>
                            <option value="Trichy" <?php echo (isset($_POST['Branch']) && $_POST['Branch'] === 'Trichy') ? 'selected' : ''; ?>>Trichy</option>
                            <option value="Chennai" <?php echo (isset($_POST['Branch']) && $_POST['Branch'] === 'Chennai') ? 'selected' : ''; ?>>Chennai</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="Consultant">Consultant</label>
                        <select class="form-control" name="Consultant" id="Consultant">
                            <option value="All" <?php echo (isset($_POST['Consultant']) && $_POST['Consultant'] === 'All') ? 'selected' : ''; ?>>All</option>>All</option>
                            <?php
                                include('dbconnect.php');
                                $records=mysqli_query($conn,"select code,name from consultant where code!='' AND name!=''");
                                $selectedLocation = ''; 
                                    if (isset($_POST['Consultant'])) {
                                        $selectedLocation = $_POST['Consultant']; 
                                    }
                                while($row=mysqli_fetch_array($records))
                                {
                                    $selected = ''; //default to empty string - not selected
                                    if ($selectedLocation == $row['code']) {
                                        $selected = 'selected';   
                                    }
                                    echo '<option value="' . htmlspecialchars($row['code']) . '" '.$selected.'>' 
                                   . htmlspecialchars($row['name']) 
                                   . '</option>';
                                }
                            
                            ?>
                        </select>
                    </div>
            </div>
        
            <div class="row">
                    <div class="col-sm-4">
                        <label for="DSMIV">DSMIV</label>
                        <input type="text" name="DSMIV" value="<?php echo isset($_POST['DSMIV']) ? $_POST['DSMIV']:'' ?>" id="DSMIV_search" width="100%" class="form-control">
                    </div>
                    <div class="col-sm-4">
                    <label for="ICD10">ICD10</label>
                        <input type="text" name="ICD10" value="<?php echo isset($_POST['ICD10']) ? $_POST['ICD10']:'' ?>" id="ICD10_search" width="100%" class="form-control">
                    </div>
                    <div class="col-sm-4">
                    <label for="pros">DSMIV</label>
                        <input type="text" name="Provisional" value="<?php echo isset($_POST['Provisional']) ? $_POST['Provisional']:'' ?>" id="Provisional" width="100%" class="form-control">
                    </div>
            </div>
                           
                               
                                
        
            
                   
                             
                   
                               <div id="test" style="float:right;margin-top:2%;">
                               <button type="submit" class="Submit" id="submit" name="submit">Show</button>
                          
                               </div>      
            
            
        </form>
        </div>
    </div>
    
    <div class="container-fluid">   
        <!-- div to print result table   -->
        <div class="row" style="width:100%">
            
            <div class="table-responsive">
            <table id="mydatatable" class="table table-striped table-bordered" style="width:100%">
                    <thead class="th_heading">
                        <tr>
                        
                            <th colspan="14" style="text-align:center;">Provisional</th>
                        
                        </tr>
                        <tr>
                                        <th>SI No</th>
                                        <th>Patient Id</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Sex</th>
                                        <th>Specification</th>
                                        <th>Reg. Date</th>
                                        <th>No Of Visit</th>
                                        <th>last Visit</th>
                                        <th>Days in Last Visit</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Consultant Name</th>
                                        <th>Ref Doctor</th>
                                       
                    </tr>
                    </thead>
                    <tbody>
                                <?php
                                    // including php file to fetch data from database
                                    include('tabledata.php');
                            
                                ?>
                    </tbody>
                </table>
                </div>
            
        </div>
    </div>
                       
   
        
    <script type="text/javascript">
  $(function() {
     $( "#DSMIV_search" ).autocomplete({
       source: 'action2.php',
     });
  });
  $(function() {
     $( "#ICD10_search" ).autocomplete({
       source: 'action3.php',
     });
  });
  $(function() {
     $( "#Provisional" ).autocomplete({
       source: 'provisional.php',
     });
  });
</script>

 
<script>
  
 

   var table =  $('#mydatatable').DataTable({
        //searching:false,
        // ordering:false,
        scrollX:true,
        scrollY:1000,
        dom: 'lBfrtip',
        responsive: true,
        text:'OutPatientDetails',
        filename:'OutPatientDetails',
        buttons: [
            { extend: "excel",title: 'Out Patient Details'},
            { extend: "pdf",title: 'Out Patient Details'},
            { extend: "print",title: 'Out Patient Details', title: function(){
            var printTitle = 'OutPatient Details';
            return printTitle}}
        ],
         lengthMenu:[[10,50,100,500,-1],[10,50,100,500,"All"]],
         order:[[3,'desc']],
         pagingType:'full_numbers'
    });
    table.buttons().container().appendTo($('#test'));
    $('#container').css( 'display', 'block' );
 table.columns.adjust().draw();
</script>

</body>
</html>