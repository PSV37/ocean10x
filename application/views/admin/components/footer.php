<footer class="main-footer">
      
        <strong>Copyright &copy; <?php echo date("Y") ?> ConsultnHire.</strong> All rights reserved.
      </footer>
      
 </div><!-- ./wrapper -->



<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js" type="text/javascript"></script>
<!--<script src="--><?php //echo base_url(); ?><!--asset/js/menu.js" type="text/javascript"></script>-->
<!--<script src="--><?php //echo base_url(); ?><!--asset/js/custom-validation.js" type="text/javascript"></script>-->
<script src="<?php echo base_url(); ?>asset/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/js/app.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/js/form-validation.js" type="text/javascript"></script>
<!-- Jasny Bootstrap for NIce Image Change -->
<script src="<?php echo base_url() ?>asset/js/jasny-bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>asset/js/timepicker.js" ></script>
<!-- Data Table -->
<!--<script src="--><?php //echo base_url(); ?><!--asset/js/plugins/metisMenu/metisMenu.min.js" type="text/javascript"></script>-->
<script src="<?php echo base_url(); ?>asset/js/plugins/dataTables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/js/plugins/dataTables/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/js/chartjs/Chart.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/js/chartjs/dashboard.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>asset/js/jquery-ui.js"></script>


  <script>
    $(document).ready(function() {
        //$('#dataTables-example').dataTable();

        $('#dataTables-example').dataTable({
   "bPaginate" : $('#dataTables-example tbody tr').length>10,
   "iDisplayLength": 10,
   "bAutoWidth": false,
   "aoColumnDefs": [
       {"bSortable": true, "aTargets": [0,2]}
   ]
});

    });


    </script>
    <script>
    // Validating Empty Field


</script> 
<script>
var baseUrl = '<?php echo base_url();?>';
     CKEDITOR.replace('content_ck');
     CKEDITOR.replace('edit_content_ck');

                     </script>
                     
                     
                     <script>
function string_to_slug(titleId, slugId) {

    var str = $("#"+titleId).val();

    var eventSlug = $("#"+slugId).val();

    if(eventSlug.length == ""){

        str = str.replace(/^\s+|\s+$/g, ''); // trim

        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc

        var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";

        var to   = "aaaaeeeeiiiioooouuuunc------";

        for (var i=0, l=from.length ; i<l ; i++) {

            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));

        }



        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars

            .replace(/\s+/g, '-') // collapse whitespace and replace by -

            .replace(/-+/g, '-'); // collapse dashes

        //return str;

        $("#"+slugId).val(str);

    }

}
 </script>
                      <script type="text/javascript">
                            $(document).ready(function(e) {
                                $("#heading").change(function() { 
                                    string_to_slug('heading', 'slug');
                                });
                            }); //  $(function() {//   var editor = CKEDITOR.replace( 'editor1', {//    enterMode : CKEDITOR.ENTER_BR,//    toolbar: [//     { name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },//     [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],//     '/',//     { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }//    ]//   });//   var edit_editor = CKEDITOR.replace( 'edit_editor1', {//    enterMode : CKEDITOR.ENTER_BR,//    toolbar: [//     { name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },//     [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],//     '/',//     { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }//    ]//   });//  });
                        </script>
                        
                        <script src="<?php echo base_url() ;?>asset/js/content_js.js"></script>
                        <script src="<?php echo base_url(); ?>asset/js/settings.js"></script>
                        <script src="<?php echo base_url(); ?>asset/js/social_js.js"></script>
</body>
</html>
