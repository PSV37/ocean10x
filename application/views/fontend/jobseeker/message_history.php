<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
            
<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
        <h5>Instant Messages</h5>
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Sr.No</th>
              <th>Name</th>
              <th>Message</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php print_r($message_data); ?>
            <tr>
              <td></td>
              <td>
              </td>
              <td>
              </td>
            
              <td>
              </td>
              
             
            </tr>
            
          </tbody>
        </table>
      </div>
    </div> <!--end row -->
  </div><!-- end container -->
</div><!-- end section -->


  
 <?php $this->load->view("fontend/layout/footer.php"); ?>