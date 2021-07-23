<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
</head>
<style>
    #mydatatable_filter .form-control {
    background: url(../images/xxx.svg);    
    background-repeat: no-repeat;
    background-position: 0px 3px !important;
}
   .th_heading
   {
    background: #3498db;
    color:white;
    background: -webkit-linear-gradient(top, top, #3498db, #2980b9 100%);
    background: -moz-linear-gradient(top, top, #3498db, #2980b9 100%);
    background: -ms-linear-gradient(top, top, #3498db, #2980b9 100%);
    background: -o-linear-gradient(top, top, #3498db, #2980b9 100%);
    background: linear-gradient(to bottom, top, #3498db, #2980b9 100%);
   }
   table tr th{
    color:white;
    text-align:center;
   }
   table tr th .sorting{
    color:white;
   }
    button.dt-button, div.dt-button, a.dt-button, input.dt-button,.Submit{
    position: relative;
    display: inline-block;
    border:none;
    box-sizing: border-box;
    margin-right: .333em;
    margin-bottom: .333em;
    padding: .5em 1em;
    font-family: Arial;
    color: #ffffff;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1rem;
  
    box-shadow: 2px 2px 3px #666666;
    line-height: 1.6em;
    white-space: nowrap;
    overflow: hidden;
    background: #3498db;
    background: -webkit-linear-gradient(top, top, #3498db, #2980b9 100%);
    background: -moz-linear-gradient(top, top, #3498db, #2980b9 100%);
    background: -ms-linear-gradient(top, top, #3498db, #2980b9 100%);
    background: -o-linear-gradient(top, top, #3498db, #2980b9 100%);
    background: linear-gradient(to bottom, top, #3498db, #2980b9 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr=" #3498db", EndColorStr="#2980b9");
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    text-decoration: none;
    outline: none;
    text-overflow: ellipsis;
}
button.dt-button:active:not(.disabled),.Submit:active, button.dt-button.active:not(.disabled), div.dt-button:active:not(.disabled), div.dt-button.active:not(.disabled), a.dt-button:active:not(.disabled), a.dt-button.active:not(.disabled), input.dt-button:active:not(.disabled), input.dt-button.active:not(.disabled) {
    background: -webkit-linear-gradient(top, #3cb0fd, #3498db 100%);
    background: -moz-linear-gradient(top, #3cb0fd, #3498db 100%);
    background: -ms-linear-gradient(top, #3cb0fd, #3498db 100%);
    background: -o-linear-gradient(top, #3cb0fd, #3498db 100%);
    background: linear-gradient(to bottom, top, #3cb0fd, #3498db 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr=" #3cb0fd", EndColorStr="#3498db");
    box-shadow: 0 0px #666;
  transform: translateY(4px);
}
.Submit:focus
{
    border:none;
    outline:none;
}
button.dt-button:hover:not(.disabled),.Submit:hover, div.dt-button:hover:not(.disabled), a.dt-button:hover:not(.disabled), input.dt-button:hover:not(.disabled)   {
    background: #3cb0fd;
    color:white;
    border:none;
    background: -webkit-linear-gradient(top, #3cb0fd, #3498db 100%);
    background: -moz-linear-gradient(top, #3cb0fd, #3498db 100%);
    background: -ms-linear-gradient(top, #3cb0fd, #3498db 100%);
    background: -o-linear-gradient(top, #3cb0fd, #3498db 100%);
    background: linear-gradient(to bottom, top, #3cb0fd, #3498db 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr=" #3cb0fd", EndColorStr="#3498db");
    }
    /* button.dt-button, div.dt-button, a.dt-button, input.dt-button {
        background: #3498db;

  -webkit-border-radius: 9;
  -moz-border-radius: 9;
  border-radius: 4px;
  font-family: Arial;
  color: #ffffff;
  font-size: 16px;
  text-align:center;
  text-decoration: none;
}
button.dt-button, div.dt-button, a.dt-button, input.dt-button:hover{
    background: #3cb0fd;
 
  text-decoration: none
} */
    </style>

<body>
<div class="container-fluid">
    <div class="form_container">
          <form id="filter_data" method="POST" style="width:80%; padding-top:2%; margin-left:10%;">
            <div class="row">
                    <div class="col-sm-2">
                        <label for="from_date">From Date</label>
                        <input class="form-control" type="date" value="<?php echo isset($_POST['from_date']) ? $_POST['from_date']:'' ?>" id="from_date" name="from_date">
                    </div>
                    <div class="col-sm-2">
                        <label for="to_date">To Date</label>
                        <input class="form-control" type="date" value="<?php echo isset($_POST['to_date']) ? $_POST['to_date']:'' ?>" id="to_date" name="to_date">
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
                        <input class="form-control" value="<?php echo isset($_POST['from_age']) ? $_POST['from_age']:'' ?>" type="number" min="1" id="from_age" name="from_age">
                    </div>
                    <div class="col-sm-2">
                        <label for="to_age">To Age</label>
                        <input  class="form-control" value="<?php echo isset($_POST['to_age']) ? $_POST['to_age']:'' ?>" type="number" min="1" id="to_age" name="to_age">
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
        
                           
                           
                               
                                
        
           
                    <div class="Drug_class">
                           <label for="Area" style="text-align:center;">Drug</label>
                    
                            <div style="width:100%;">
                                <input type="text" value="<?php echo isset($_POST['Drug']) ? $_POST['Drug']:'' ?>" name="Drug" id="search" class="form-control" style="width:100%;" autocomplete="off">
                            </div>
                          
                   
                            <div class="show_drop">
                                <div class="list-group" id="show-list">
                                    <!-- Here autocomplete list will be display -->
                                </div>
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
                        
                            <th colspan="11" style="text-align:center;">OUTPATIENT FOLLOWUP RECORDS</th>
                        
                        </tr>
                        <tr>
                                        <th>SI No</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Sex</th>
                                        <th>Specification</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Visited Date</th>
                                        <th>Registered Date</th>
                                        <th>Ref Doctor Name</th>
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
                       
   
        
    

 
<script>
   
   var table =  $('#mydatatable').DataTable({
        //searching:false,
        // ordering:false,
        scrollX:true,
        scrollY:500,
        dom: 'lBfrtip',
        responsive: true,
        text:'OutPatientDetails',
        filename:'OutPatientDetails',
        buttons: [
            { extend: "copy"},
            { extend: "csv",title: 'Out Patient Details'},
            { extend: "excel",title: 'Out Patient Details'},
            { extend: "pdf",title: 'Out Patient Details'},
            { extend: "print",title: 'Out Patient Details', title: function(){
            var printTitle = 'OutPatient Details';
            return printTitle}}
        ],
         lengthMenu:[[5,10,25,50,-1],[5,10,25,50,"All"]],
         order:[[3,'desc']],
         pagingType:'full_numbers'
    });
    table.buttons().container().appendTo($('#test'));
    // $('.mydatatable thead th').each(function(){
    //     var title = $(this).text();
    //     $(this).html('<input type="text" placeholder="Search '+title+'" />');
    // });
    // table.columns().every(function(){
    //     var that =this;
    //     $('input',this.header()).on('keyup change',function(){
    //         if(that.search()!==this.value)
    //         {
    //               that.search(this.value).draw();
    //         }
    //     });
    // });
</script>

</body>
</html>