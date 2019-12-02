<!--Footer-->

<div class="footerWrap">
  <div class="ftlinkswrap">
    <div class="container">
      <div class="row"> 
        <div class="col-md-3 col-sm-3">
        	
        	<h5>About ConsultnHire</h5>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
        </div>
        <!--Quick Links-->
        <div class="col-md-6 col-sm-6">
          <div class="ftint">
            <h5>Quick Links</h5>
            <!--Quick Links menu Start-->
            <ul class="quicklinks row">
              <li class="col-md-6 col-sm-6"><a href="<?php echo base_url() ?>">Home</a></li>
              <li class="col-md-6 col-sm-6"><a href="<?php echo base_url(); ?>cms/cms_page/about-us">About Company</a></li>
              <li class="col-md-6 col-sm-6"><a href="<?php echo base_url() ?>job">Search Jobs</a></li>
              <li class="col-md-6 col-sm-6"><a href="<?php echo base_url() ?>register">My Account</a></li>
              <li class="col-md-6 col-sm-6"><a href="<?php echo base_url() ?>job">View All Jobs</a></li>
              <li class="col-md-6 col-sm-6"><a href="<?php echo base_url(); ?>cms/cms_page/help">Help</a></li>
              <li class="col-md-6 col-sm-6"><a href="<?php echo base_url() ?>contact">Contact Us</a></li>
              <li class="col-md-6 col-sm-6"><a href="<?php echo base_url(); ?>cms/cms_page/term-conditions">Terms of Use</a></li>
              <li class="col-md-6 col-sm-6"><a href="<?php echo base_url() ?>contact">Report a Bug/Abuse</a></li>
              <li class="col-md-6 col-sm-6"><a href="<?php echo base_url(); ?>cms/cms_page/privacy-policy">Privacy Commitment</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-3">
          <h5>Contact Info</h5>
          <div class="contactinfo"> <?php echo social_media();?>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Footer end--> 

<!--Copyright-->

<div class="copyright">
  <div class="bttxt">Copyright <span>&copy;</span> <?php echo date("Y"); ?> ConsultnHire. All rights reserved.</div>
</div>

<!--<div class="dmtop "><i class="fa fa-angle-up "></i></div>-->

<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <button type="button" class="close closebtn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <div class="modal-body">
        <div class="widget clearfix">
          <div class="post-padding item-price">
            <div class="content-title">
              <h4><i class="fa fa-lock"></i> Public Demand</h4>
            </div>
            <!-- end widget-title -->
            
            <form id="submit" action="<?php echo base_url(); ?>home/save_publicdemand" method="post" class="submit-form">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <input type="text" name="public_name" required class="form-control" placeholder="Full Name ">
                  <input type="email" name="public_email"  required class="form-control" placeholder="your email">
                  <textarea name="public_comment" class="form-control" required placeholder="Your Comment"></textarea>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
              <!-- end row -->
              
            </form>
            
            <!-- end row --> 
            
          </div>
          <!-- end newsletter --> 
          
        </div>
        <!-- end post-padding --> 
        
      </div>
    </div>
    <!-- /.modal-content --> 
    
  </div>
  <!-- /.modal-dialog --> 
  
</div>
<!-- /.modal --> 

<script src="<?php echo base_url() ?>asset/jc/js/jquery.min.js"></script> 
<script type="text/javascript">
var jQuery = $.noConflict(true);
</script> 
<script src="<?php echo base_url() ?>fontend/js/jquery.js "></script> 
<script src="<?php echo base_url() ?>asset/jc/js/jquery.Jcrop.js"></script> 
<script type="text/javascript">


  function updateCoords(c)
  {
    jQuery('#x').val(c.x);
    jQuery('#y').val(c.y);
    jQuery('#w').val(c.w);
    jQuery('#h').val(c.h);
	//readURL2();
  };

  function checkCoords()
  {
    if (parseInt(jQuery('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

</script> 
<script type="text/javascript">
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
		
		
		var file = input.files[0];
		var fileType = file["type"];
		var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
		if ($.inArray(fileType, ValidImageTypes) < 0){
			$('#cropbox').css('display','none');
			return false;
		}
        reader.onload = function (e) {
			$('#cropbox').css('display','block');
            $('#cropbox').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}


function readURL2(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
		
		
		var file = input.files[0];
		var fileType = file["type"];
		var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
		if ($.inArray(fileType, ValidImageTypes) < 0){
			$('#preview').css('display','none');
			return false;
		}
        reader.onload = function (e) {
			$('#preview').css('display','block');
            $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}




</script> 
<script src="<?php echo base_url() ?>fontend/js/bootstrap.min.js "></script> 

<script type="text/javascript" src="<?php echo base_url() ?>asset/js/bootstrap-multiselect.js"></script>

<!-- token input js -->
<script src="<?php echo base_url(); ?>asset/src/jquery.tokeninput.js"></script>

<script src="<?php echo base_url() ?>fontend/js/owl.carousel.min.js "></script> 
<script src="<?php echo base_url() ?>fontend/js/all.js "></script> 
<script src="<?php echo base_url() ?>fontend/js/custom.js "></script> 
<script src="<?php echo base_url() ?>fontend/js/jquery.validate.js "></script> 
<script src="<?php echo base_url() ?>fontend/js/map-upload.js "></script> 
<script src="<?php echo base_url(); ?>asset/js/plugins/dataTables/jquery.dataTables.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>asset/js/plugins/dataTables/dataTables.bootstrap.js" type="text/javascript"></script> 
<script src="<?php echo base_url() ?>asset/js/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>asset/tokenjs/bootstrap-tokenfield.js"></script> 
<script src="<?php echo base_url() ?>asset/tokenjs/typeahead.bundle.min.js"></script> 
<script src="<?php echo base_url() ?>asset/js/search.js""></script>

<script>

$(document).ready(function() {

    $(".datepicker").datepicker({

      changeMonth: true,

      changeYear: true,

      dateFormat: 'dd-mm-yy',

      yearRange: '2019:2020',

  });


    $('#example').dataTable({

      "bPaginate" : $('#example tbody tr').length>10,

      "iDisplayLength": 10,

      "bAutoWidth": false,

      "aoColumnDefs": [

        {"bSortable": true, "aTargets": [0,2]}

       ]

    });
  });

</script> 
<script type="text/javascript">
 function load_data(func_name,hrf){
    jQuery.get("<?php echo base_url('job_seeker/');?>" + func_name, function(data, status){
		jQuery('.tabdata').html(data);
		$('.nav-tabs a[href="#'+hrf+'"]').tab('show')
		return true;
    });
 }
 
$( document ).ready(function() {
    load_data('update_personalinfo','vspinfo');
});
 </script>
 <script type="text/javascript">

  $(function() {

      $("#search_text").autocomplete({
        source: "<?php echo base_url('job_seeker/search_user'); ?>",
      
        select: function(event,ui) {
          
          var url = ui.item.id;
          if(url != '') {
            window.location.href = '<?php echo base_url(); ?>seeker/seeker-profile?seeker_id='+ btoa(url);
          }
          
        },
        html: true, 
        open: function(ui) {
          $(".ui-autocomplete").css("z-index", 1000);

        }
      })
        .autocomplete( "instance" )._renderItem = function( ul, item ) {
          if(item.img != '')
          {
            return $( "<li><div><img  alt='' style='border-radius: 35px; border: 5px; width:30px;' src='<?php echo base_url(); ?>upload/"+item.img+"'><strong>"+item.value+"</strong></div></li>" ).appendTo( ul );
          }else{
            return $( "<li><div><img src='<?php echo base_url(); ?>fontend/images/no-image.jpg' alt='' style='border-radius: 35px; border: 5px; width:30px;'><strong>"+item.value+"</strong></div></li>").appendTo( ul );
          }
     
      };

  });          

</script>
</body></html>