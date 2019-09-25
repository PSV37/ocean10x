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

<div class="box">
    <div class="box-header box-header-background with-border">
        <h3 class="box-title">Order Invoice</h3>
        <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <div class="box-tools">
                <div class="btn-group" role="group" >
                    <a onclick="print_invoice('printableArea')" class="btn btn-default ">Print</a>
                    <a href="#" class="btn btn-default ">PDF</a>
                    <a href=#" class="btn btn-default " >Email to Customer</a>
                </div>
            </div>

        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">


        <div id="printableArea">
            <link href="http://easy-inventory.codeslab.net/asset/css/invoice.css" rel="stylesheet" type="text/css" />



            <div class="row ">


            <div class="col-md-10 col-md-offset-1">

                <header class="clearfix">
                    <div id="logo">
  <img src="<?php echo base_url() ?>fontend/images/order_logo.png">
                     </div>
                    <div id="invoice">
                        <h3 style="color: #00a7d0">INVOICE <?php echo $invoice->invoice_no; ?></h3>
                        <div class="date">Invoice Date: <?php echo $invoice->invoice_date; ?></div>
                        <div class="date">Payment Method: Cash</div>
                        


                    </div>

                </header>
                <hr/>
                <main>
                    <div id="details" class="clearfix">
                        <div id="client" style="margin-right: 100px">
                            <div class="to"><strong>CUSTOMER BILLING INFO:</strong></div>
                            <h2 class="name">Charles W Johnson</h2>
                            <div class="address">mirpur,Dhaka, <br />
    Houese nomber , , 26851<br />
    Bangladesh.</div>
                            <div class="address">01733869659</div>
                            <div class="email">romeshshil99@email.com</div>
                        </div>
                                          

                    </div>


                    
                     <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                        <tr>
                            <th class="no text-right">#</th>
                            <th class="desc">Package Name</th>
                            <th class="qty text-right">CV Search</th>
                            <th class="unit text-right">Category Job</th>
                            <th class="qty text-right">Hot Job</th>
                            <th class="unit text-right">Duration</th>
                            <th class="qty text-right">PRICE</th>
                            <th class="total text-right ">TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                                                                        <tr>
                            <td class="no">1</td>
                            <td class="desc"><h3><?php $package_info=$this->job_package_model->get($invoice->job_package_service_id); echo $package_info->job_package_service_name; ?></h3></td>
                            <td class="qty"><?php echo $package_info->package_cv_search ?></td>
                            <td class="unit"><?php echo $package_info->package_category_job ?></td>
                            <td class="qty"><?php echo $package_info->package_hotjobs ?></td>
                            <td class="unit"><?php echo $package_info->package_duration/30; ?> Months</td>
                            <td class="qty"><?php echo $package_info->package_price ?></td>
                            <td class="total"><?php echo $package_info->package_price ?></td>
                        </tr>
                                                                            </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td><?php echo $package_info->package_price; ?></td>
                        </tr>

                        <tr>
                            <td colspan="5"></td>
                            <td colspan="2">Tax</td>
                            <td>free</td>
                        </tr>

                        
                        <tr>
                            <td colspan="5"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>TK. <?php echo $package_info->package_price ?></td>
                        </tr>
                        </tfoot>
                    </table>

                    <br/>
                    <br/>
                    <br/>

                        <div class="date pull-left"><strong>Sales Person:</strong> Norman Campbell</div>


                    <br/>

                </main>
                <hr/>
                <footer class="text-center">
                    <strong>Carnelian</strong>&nbsp;&nbsp;&nbsp;3875 Cane Bay Ln, Perris, CA 92571, USA                </footer>


            </div>
        </div>
            </div>


    </div><!-- /.box-body -->
</div><!-- /.box -->

               
            </div>
            <!-- /.box -->
        </div>
        <!--/.col end -->
    <!-- /.row -->
</section>
            </div>

            <br />
            

        </div><!-- /.right-side -->

        <?php ///$this->load->view('admin/_layout_modal'); ?>
        <?php //$this->load->view('admin/_layout_modal_small'); ?>
        <?php $this->load->view('admin/components/footer'); ?>
