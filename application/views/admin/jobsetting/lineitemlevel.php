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
            </section>

            <br/>
            <div class="container-fluid">
               <section class="content">
    <div class="row">
        <div class="col-md-12">
            
             <?php /* print_r($subtopic); */ ?> 

            <div class="box box-primary">
                <div class="box-header box-header-background with-border">
                    <div class="col-md-offset-3">
                        <h3 class="box-title ">Line Item Master</h3>
                    </div>
                </div>
               
            <div class="row">
					<div class="col-md-10"></div>
					<div class="col-md-2">
				
					<br/><?php echo btn_add('admin/lineitem/save_lineitemlevel/'. $line_item_id); ?>
					
					</div>
					</div>
					
               <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                <table class="table table-bordered table-striped" id="dataTables-example">
                    <thead>
                    <tr>
                        <th class="active">SL</th>
                        <th class="active">Subject</th>
                        <th class="active">Topic</th>
                        <th class="active">Subtopic</th>
						<th class="active">Line Item(Level 1)</th>
						<th class="active">Line Item(Level 2)</th>
                        <th class="active col-sm-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1 ;?>
                    <?php if (!empty($lineitemlevel)): foreach ($lineitemlevel as $ct_row) : ?>
                        <tr>
                            <td><?php echo $key ?></td>
                            <td><?php echo $ct_row['skill_name'] ?></td>
                            <td><?php echo $ct_row['topic_name'] ?></td>
                            <td><?php echo $ct_row['subtopic_name'] ?></td>
							<td><?php echo $ct_row['title'] ?></td>
							<td><?php echo $ct_row['titles'] ?></td>
							
                            <td>
                                <?php echo btn_edit('admin/lineitem/edit_lineitemlevel/' . $ct_row['lineitemlevel_id']); ?>
                                <?php echo btn_delete('admin/lineitem/delete_lineitemlevel/' . $ct_row['lineitemlevel_id']); ?>
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
            </div>
            <!-- /.box -->
        </div>
        <!--/.col end -->
    </div>
    <!-- /.row -->
</section>
</div>

<br />


</div><!-- /.right-side -->
<br/><br/><br/><br/>
       
<?php $this->load->view('admin/components/footer'); ?>

<script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>
<script>
$("#subject").select2( {
	placeholder: "Select Subject",
	allowClear: true
	} );
</script>