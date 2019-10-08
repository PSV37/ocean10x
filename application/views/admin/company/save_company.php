<?php $this->load->view('admin/components/header'); ?>

<body class="skin-blue" data-baseurl="<?php echo base_url(); ?>">
    <div class="wrapper">
        
    <?php $this->load->view('admin/components/user_profile'); ?>
       
        <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
        <?php $this->load->view('admin/components/navigation'); ?>
        
                  </section>
        <!-- /.sidebar -->
      </aside>

        <div class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">

                <ol class="breadcrumb">
                   <?php echo $user_id=$this->session->userdata('name');?>;
                </ol>
            </section>

            <br/>
            <div class="container-fluid">
           <section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header box-header-background with-border">
                  <h3 class="box-title ">Add New Company</h3>
                </div>
                <div class="box-body">
                <?php echo $this->session->flashdata('msg'); ?>
                  <form action="" id="add_company" method="POST" enctype="multipart/form-data">
                        
                    <div class="row">

                      <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                          <label class="control-label">Company Type: <span class="required">*</span></label>
                          <select name="company_type" id="company_type"  class="form-control">
                            <option value="">Select Type</option> 
                            <option value="Company">Company</option> 
                            <option value="HR Consultant">HR Consultant</option> 
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                         <label class="control-label">Company Name <span class="required">*</span></label>
                          <input type="text" name="company_name" id="company_name"  class="form-control">
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                           <label class="control-label">Company Email: <span class="required">*</span></label>
                          <input type="email" name="company_email" id="company_email"  class="form-control" >
                          </div>
                      </div>
                      
                    </div><!-- end row -->
                    
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                         <label class="control-label">Company Phone Number: <span class="required">*</span></label>
                          <input type="text" name="company_phone" id="company_phone" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-4">
                       <div class="form-group">
                             <label class="control-label">Company Website: <span class="required">*</span></label>
                            <input type="text" name="company_url" id="company_url"  class="form-control" >
                        </div>
                      </div>

                      <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                          <label class="control-label">Company Industry: <span class="required">*</span></label>
                          <select id="company_category" name="company_category"  class="form-control" id="category">
                            <option value="">Select One</option>
                           <?php 
                             echo $this->job_category_model->selected(); ?>
                          </select>
                        </div>
                      </div>

                    </div><!-- end row -->

                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                         <label class="control-label">Contact Person: <span class="required">*</span></label>
                          <input type="text" name="contact_person" id="contact_person" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-4">
                       <div class="form-group">
                             <label class="control-label">Contact Person Email: <span class="required">*</span></label>
                            <input type="text" name="cont_person_email" id="cont_person_email"  class="form-control" >
                        </div>
                      </div>

                       <div class="col-md-4 col-sm-4">
                       <div class="form-group">
                             <label class="control-label">Contact Person Mobile: <span class="required">*</span></label>
                            <input type="text" name="cont_person_mobile" id="cont_person_mobile"  class="form-control" >
                        </div>
                      </div>

                    </div><!-- end row -->

                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                         <label class="control-label">Password: <span class="required">*</span></label>
                          <input type="password" name="comp_password" id="comp_password" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-4">
                       <div class="form-group">
                             <label class="control-label">GSTN No:</label>
                            <input type="text" name="comp_gst_no" id="comp_gst_no"  class="form-control" >
                        </div>
                      </div>

                       <div class="col-md-4 col-sm-4">
                       <div class="form-group">
                             <label class="control-label">PAN No:</label>
                            <input type="text" name="comp_pan_no" id="comp_pan_no"  class="form-control" >
                        </div>
                      </div>

                    </div><!-- end row -->

                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                          <label>Job Country <span class="required">*</span></label>
                          <select  name="country_id" id="country_id" class="form-control" onchange="getStates(this.value)">
                            <option value="">Select Country</option>
                            <?php foreach($country as $key){?>
                            <option value="<?php echo $key['country_id']; ?>"<?php if($job_info->job_location==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    
                      <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                          <label>Job State <span class="required">*</span></label>
                          <select name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
                           <option value="">Select State</option>
                           <?php echo $job_info->state_id;?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                          <label>Job City <span class="required">*</span></label>
                          <select  name="city_id" id="city_id" class="form-control">
                            <option value="">Select City</option>
                          </select>
                        </div>
                      </div>

                    </div>

                    <div class="row">

                      <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                          <label class="control-label">Company Status: <span class="required">*</span></label>
                          <select name="company_status" id="company_status"  class="form-control" id="sel1">
                            <option value="">Select One</option> 
                            <option value="1">Active</option> 
                            <option value="0">Deactive</option> 
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                          <label class="control-label">Company Career Link: <span class="required">*</span></label>
                          <input type="text" name="company_career_link"  id="company_career_link" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                          <label class="control-label">Company Logo:<small>Upload logo 300*300 pixel</small></label> <br>
                          <input type="file" name="company_logo" id="company_logo" />
                          <div id="imgContainer"> </div>
                        </div>
                      </div>

                    </div><!-- end row -->

                    <div class="row">
                       <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                          <label class="control-label">Head Office Address:</label>
                          <textarea  name="company_address"  id="company_address" class="form-control ckeditor" rows="8" id="comment"></textarea>
                        </div>
                      </div>
                      <div class="panel-body"></div>
                      <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                          <label class="control-label">Attractive Offers:</label>
                          <textarea  name="company_service" id="company_service" class="form-control ckeditor" rows="8" id="comment"></textarea>
                        </div>
                      </div>
                      <div class="panel-body"></div>
                      <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                          <label class="control-label">Special Features:</label>
                          <textarea  name="company_aboutus"  id="company_aboutus" class="form-control ckeditor" rows="8"></textarea>
                        </div>
                      </div>
                      
                      
                    </div><!-- end row -->

                    <button type="submit" id="submitCompany" class="btn bg-navy" type="submit">Save Company</button>
                </form>

                </div><!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col end -->
    </div>
  </div>

<!-- <form class="some_form" enctype="multipart/form-data" method="post" action="">
  <div class="form-group">
  <input type="file" name="photo" id="photoInput" />
  </div>
  <input type="submit">
</form> -->


    <!-- /.row -->
</section>


            </div>

<script type="text/javascript">
$(document).ready(function(){

$.validator.addMethod('maxImageWidth', function(value, element, maxWidth) {
  var res = $(element).data('imageWidth')
  if(res!= undefined)
  return ($(element).data('imageWidth') || 0) <= maxWidth;
}, function(maxWidth, element) {

  var imageWidth = 0;
  if($(element).data('imageWidth') > 0)
        imageWidth = $(element).data('imageWidth');
 
  return (imageWidth)
      ? ("Your image's width must be less than " + maxWidth + "px")
      : "Selected file is not an image.";
});

//return $(element).data('width') >= 500;


var $submitBtn = $('#add_company').find('input:submit'),
  $photoInput = $('#company_logo'),
  $imgContainer = $('#imgContainer');

$('#company_logo').change(function() {
  $photoInput.removeData('imageWidth');
  $imgContainer.hide().empty();

  var file = this.files[0];

  if (file.type.match(/image\/.*/)) {
    $submitBtn.attr('disabled', true);

    var reader = new FileReader();

    reader.onload = function() {
      var $img = $('<img />').attr({ src: reader.result });

      $img.on('load', function() {
        $imgContainer.append($img).show();
        var imageWidth = $img.width();
        $photoInput.data('imageWidth', imageWidth);
        if (imageWidth > 300) {
          $imgContainer.hide();
        } else {
          $img.css({ width: '100px', height: '100px' });
        }
        $submitBtn.attr('disabled', false);

        validator.element($photoInput);
      });
    }

    reader.readAsDataURL(file);
  } else {

    validator.element($photoInput);
  }
});


    var validator = $('#add_company').validate({
      rules: {
         company_name: {
                    required: true
                },
                company_email: {
                    required: true,
                    email:true
                },


                  company_status: {
                    required: true,
                },

                   company_category: {
                    required: true,
                },



             company_logo: {
                required: true,
                maxImageWidth: 500,
            },

                hot_jobs: {
                    required: true,
                },
      },
      messages: {
        company_logo: {
          required: "You must insert an image",
        },
      },
      highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },

            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function(error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }

        });
});


 function getStates(id){
    if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>admin/company/getstate',
                data:{id:id},
                success:function(res){
                  $('#state_id').html(res);
                }
        
            }); 
        }
    }
     
  function getCitys(id){
    if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>admin/company/getcity',
                data:{id:id},
                success:function(res){
                    $('#city_id').html(res);
                }
        
            }); 
          }
   
    }

</script>
 
        <?php $this->load->view('admin/components/footer'); ?>
