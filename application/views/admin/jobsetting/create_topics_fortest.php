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

            <div class="box box-primary">
                <div class="box-header box-header-background with-border">
                  <!--   <div class="col-md-offset-3"> -->
                        <h3 class="box-title ">Topic's For Test</h3>
                    <!-- </div> -->
                </div>
                <!-- /.box-header -->
                <div class="row">
                    <?php print_r($test_topic_master); ?>
                    <div class="col-md-10 col-md-offset-1">
                    <form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/job_posting/topics_for_test/<?php  if (!empty($test_job_id)) { echo $test_job_id;
                      }
                     ?>" method="post">
                        <table class="table table-bordered table-striped" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="active">#</th>
                                    <th class="active">Topic Name</th>
                                    <th class="active">No of Questions</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                            <?php if (!empty($topic_master)): foreach ($topic_master as $st_row) : ?>
                                <tr>
                                    <td><input type="checkbox" name="topic_chk[]" id="topic_chk" value="<?php echo $st_row['topic_id']; ?>"></td>
                                    <td><?php echo $st_row['topic_name']; ?></td>
                                    <td>
                                        <input type="number" name="no_questions[]" id="no_questions">
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
                            <?php endif; ?>
                            </tbody>
                        </table>

                        <button type="submit" class="btn bg-navy pull-right" name="submit">Submit</button>
                        <div class="panel-body"></div>                               
                    </form>

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

       
<?php $this->load->view('admin/components/footer'); ?>
