<?php  
 include("includes/db.php");  
 ?> 
<?php include("layout/header.php"); ?>

<div class="content-wrapper">
    <div class="container-fluid">
	        <div class="row">
            <div class="col-lg-12">
                <!-- Example Bar Chart Card-->
                <div class="card mb-3 mt-3">
                    <div class="card-header">
                        Transaction Report </div>
                    <div class="card-body">
                       
                            <div class="form-group">
                   <div class="table-responsive">
    <br />
                                <div class="form-row mt-3">
                                    <div class="col-md-2 text-center">
                                        <label for="exampleInputName">From Date
                                           
                                        </label>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="start_date" id="start_date">

                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <label for="exampleInputName">To Date

                                        </label>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="end_date" id="end_date">

                                        </div>
                                    </div>
                                </div>
								
								
						

                                <div class="form-row mt-3">
                                    <div class="col-md-12 text-center">
                                        <button type="button" name="search" id="search" value="Search" class="btn btn-success trans_search_btn">Search</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
								  <br />  <br />
								
								 <table id="order_data" style="display:none;" class="table table-bordered table-striped">
                                  <thead style="background-color:#17a2b8; color:white">
                                      <tr>
                                        <th style="color:white"><input type='checkbox' id="employee_data"></th>
                                        <th style="color:white">Customer Name</th>
                                        <th style="color:white">Mobile No.</th>
                                        <th style="color:white">Service Provider</th>
                                        <th style="color:white">Collection Address</th>
										<th style="color:white">Assigned Date</th>
                                        <th style="color:white">Completed Date</th>
                                        <th style="color:white">Task Status</th>
                                        <th style="color:white" colspan='2'>Action</th>
                                      </tr>
                                  </thead>
                                 </table>
               </div>
                            </div>
                     
                        <hr />
						
						
                       
                    </div>

                </div>
            </div>
        </div>
   
        </div>
    </div>
 
    <?php
    include("layout/footer.php");
    ?>
  
	
<script>
 
 $('#start_date').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });
  $('#end_date').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });
 
</script>

    <script>  
 
$(document).ready(function(){
 fetch_data('no');

 function fetch_data(is_date_search, start_date='', end_date='')
 {
  var dataTable = $('#order_data').DataTable({
   "processing" : true,
   "serverSide" : true,
   "order" : [],
   "ajax" : {
    url:"ajax/client_area_data.php",
    type:"POST",
    data:{
     is_date_search:is_date_search, start_date:start_date, end_date:end_date
    }
   }
  });
 }

 $('#search').click(function(){
	  $('#order_data').show();
  var start_date = $('#start_date').val();
  var end_date = $('#end_date').val();
  if(start_date != '' && end_date !='')
  {
   $('#order_data').DataTable().destroy();
   fetch_data('yes', start_date, end_date);
  }
  else
  {
   alert("Both Date is Required");
  }
 }); 
 
});



 
 </script> 