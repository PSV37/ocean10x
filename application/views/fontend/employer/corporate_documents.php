<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>
<style type="text/css">
  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bold;
}
</style>
<style>
.multiselect {
  width: 100%;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
 
}

#checkboxes label {
  display: block;
}

</style>
<!-- Page Title start -->

<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Add corporate Documents</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Add corporate Documents</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/employer_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount empdash">
          <div class="formpanel"> <?php echo $this->session->flashdata('msg'); ?>
           
    		<form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>employer/savedocumets" method="post">

            	<div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="box-body">
					<div class="container-fluid">
                        <div class="col-md-6">
                            <div class="form-group">                                       
							   <label for="exampleInputEmail1"  >Document Type<span class="required">*</span></label>
                               <select name="document_type" class="form-control">
                               	<option value="Incorporation">Attach Certificate of Incorporation</option>
                               	<option value="PAN">PAN</option>
                               	<option value="GSTIN">GSTIN</option>
                               	<option value="Add_proof">Office Address Proof</option>
                               </select>
								
							</div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">                                       
							   <label for="exampleInputEmail1">Attach Document<span class="required">*</span></label>
                                <input type="file" name="corporate_doc" class="form-control">
								
								</div>
                        </div>

                    </div>
				  </div>
				</div>
			</div>
			 <button type="submit" id="submitdocs" class="btn bg-navy" type="submit">submit</button>
			
                </form>
                 <div class="col-md-12 col-sm-12 col-xs-12">
                 </div>
                <table class="table table-bordered table-striped" id="dataTables-example" style="margin-top: 15x">
              <thead>
                <tr>
                  <th class="active">Sr No</th>
                  <th class="active">Document Type</th>
                  <th class="active">Document</th>
                 
                  <th class="active col-sm-2">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $key = 1; if (!empty($documents)): foreach ($documents as $row) : ?>
                    <tr>
                      <td><?php echo $key ?></td>
                      <td><?php if( $row['document_type']=='Incorporation') {
                      	echo "Certificate of Incorporation";
                      }elseif ($row['document_type']=='Add_proof') {
                      	echo "Office Address Proof ";
                      	# code...
                      } echo $row['document_type']; ?></td>
                      
                      <td><div class="formrow">
                                            <a target="_blank" download="<?php if( $row['document_type']=='Incorporation') {
                      	echo "Certificate of Incorporation";
                      }elseif ($row['document_type']=='Add_proof') {
                      	echo "Office Address Proof ";
                      	# code...
                      } echo $row['document_type']; ?>" style="text-decoration: none;" href="<?php echo base_url(); ?>upload/corporate_documents/<?php 
                                                 if(!empty($row['document'])){
                                                    echo $row['document'];
                                                 } 
                                            ?>">  <?php if ($row['document_type']=='Incorporation') {
                      	echo "Certificate of Incorporation";
                      }elseif ($row['document_type']=='Add_proof') {
                      	echo "Office Address Proof ";
                      	# code...
                      } echo $row['document_type']; ?></div></td>
                                            
                      
                      <td>
                          
                          <?php echo btn_delete('employer/delete_document/' . $row['document_id']); ?>
                      </td>
                  </tr>
                  <?php
                      $key++;
                      endforeach;
                  ?>
                  <?php else : ?> 
                      <td colspan="3">
                          <strong>There is no record for display</strong>
                      </td>
                  <?php
                    endif; ?>
              </tbody>
          </table>


          </div>
        </div>
        
        <!-- end post-padding --> 
      </div>
      

	
      
           
            



    


      <!-- end col --> 
    </div>

    <!-- end row --> 
  </div>
  <!-- end container --> 
</div>

<!-- end section --> 

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/tinymce/tinymce.min.js"></script> 
<script type="text/javascript">
document.getElementsByClassName('form-control').innerHTML+="<br />";
</script>
<?php $this->load->view("fontend/layout/footer.php"); ?>


