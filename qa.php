<?php  
 include("includes/db.php");  
 //sinclude("mannsafe_report_modal.php");
 ?> 
<?php include("layout/header.php"); ?>



<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <div class="row">
            <div class="col-lg-12">
                <!-- Example Bar Chart Card-->
                <div class="card mb-3 mt-3">
                    <div class="card-header">
                        Transaction Report </div>
                    <div class="card-body">
                        <div class="table-responsive  table-bordered table-hover table-responsive table-striped">
                            <table class="table table-bordered" id="trans_table" cellspacing="0">
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
										<th style="color:white"> QA Status</th>
                                        <th style="color:white" colspan='2'>Action</th>
                                        <!-- <th style="color:white">Unassign</th> -->
                                    </tr>
                                </thead>
       <?php
			$qury="SELECT * FROM tbl_task";
			$run = mysqli_query($conn,$qury);
			$count = 1;
			if(mysqli_num_rows($run)>0){
				while($rows=mysqli_fetch_assoc($run))
				{
		?>
                <tr>                  
                <td style="color:white"><input type='checkbox' id="employee_data"></td>
				<td class="text-primary text-center"><?php echo $rows['customer_name']; ?></td>                
                <td class="text-primary text-center"><?php echo $rows['customer_mob']; ?></td>
                <td class="text-primary text-center"><?php echo $rows['service_provider']; ?></td>
                <td class="text-primary text-center"><?php echo $rows['collection_address']; ?></td>
				<td class="text-primary text-center"><?php echo $rows['task_creation_date']; ?></td>  
                <td class="text-primary text-center"><?php echo $rows['field_officer_collection_date']; ?></td>
               				
                
                
          <?php 
		 
		  $stat=$rows['task_status']; 
		  $qury="SELECT * FROM tbl_status WHERE status_id=$stat";
			$run1 = mysqli_query($conn,$qury);
				$row=mysqli_fetch_assoc($run1);
					$status=$row['staus_name'];
					
                  ?>
		        <td class="text-primary text-center"><?php echo $status; ?></td> 
			    <td class="text-primary text-center"><?php echo $rows['qa_status'];?></td>
				<td class="text-warning text-center" >
				<a href="" data-toggle="modal" data-target="#task_detail_modal">
				<i class="fa fa-check" aria-hidden="true"></i>
			 <a href="mannsafe_report_modal.php?id=100">
             <i class="fa fa-file" aria-hidden="true"></i>
                 </a>
             
				</td>
                </tr>
                            
                            
        <?php
				}
            }
			mysqli_close($conn);
		?>
		
                                <tbody>
                                </tbody>
                            </table>
							
                        </div>
						
                    </div>

                </div>
            </div>
        </div>
		
		
		
		
<div id="task_detail_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Task Detail</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			                              </tr>
                                </thead>
           <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <form>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-2 text-center">
                                                <label for="exampleInputName">Search :</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" id="txtOfficerName" type="text" aria-describedby="nameHelp" placeholder="Filter Text">
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <label for="lblStatus">Items Per Page:</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" id="txtOfficerName" type="text" aria-describedby="nameHelp">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" width="100%" cellspacing="0">
                        <thead style="background-color:#17a2b8; color:white">
                            <tr>
                                <th>Update On</th>
                                <th>Amount(INR)</th>
                                <th>Field Officer</th>
                                <th>Field Officer Allocation Date</th>
                                <th>Field Officer Collection Date</th>
                                <th>Task Stage</th>
                                <th>Task Status</th>
                                <!--<th>Event Nows</th>
                                <th>Receipt Number</th>
                                <th>Receipt Image</th>
                                <th>Evidence Image</th>
                                <th>Evidence Audio</th>
                                <th>Evidence Video</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>June 12,2018 09:30:00 AM</td>
                                <td>0.00</td>
                                <td>Hema</td>
                                <td>2/2/2018</td>
                                <td></td>
                                <td>Not Visited</td>
                                <td>UNASSIGNED</td>
                                <!--<td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>-->
                            </tr>
                            <tr>
                                <td>June 12,2018 09:30:00 AM</td>
                                <td>0.00</td>
                                <td>Nilesh</td>
                                <td>2/2/2018</td>
                                <td></td>
                                <td>Not Visited</td>
                                <td>UNASSIGNED</td>
                                <!--<td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>-->
                            </tr>
                        </tbody>
                    </table>
                </div>
	
                                <tbody>
         
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>






    <script>  
 


var table=$('#trans_table').dataTable({
"processing" : true,
"serverSide" : true,
"searching" : true,
"order" : [],

  

}
})


 
 </script>  
 <script>

fetch_data('no');
function fetch_data(is_date_search,start_date='',end_date='',search_date='', task_stage='',task_status='',franchisee_status='')
{
var table=$('#task_details').dataTable({
"processing" : true,
"serverSide" : true,
"searching" : false,
"order" : [],
"ajax"  :{
  url:"ajax/task_detail_fetch_search.php", //remove fetch.php no need.
  type:"POST",
  data:{
    is_date_search:is_date_search, start_date:start_date,end_date:end_date,search_date:search_date,task_stage:task_stage,task_status:task_status,franchisee_status:franchisee_status
}

}
})
}
</script>
 
    <?php
    include("layout/footer.php");
    ?>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">My Profile</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img src="img/client.png" class="img-responsive" width="40%" alt="">
                            <h4>Jone Duo</h4>
                        </div>
                        <div class="col-md-12 text-center">
                            <h5>Email:&nbsp;&nbsp;
                                <a href="">abc@gmail.com</a>
                            </h5>
                            <h5>Mobile: &nbsp; &nbsp;9415514451</h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" href="#">Edit</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>

                </div>
            </div>
        </div>
    </div>
	
