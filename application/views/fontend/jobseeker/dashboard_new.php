<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>    
<style>
li.list-group-item:hover{color:#8ac640;}
.panel-default>.panel-heading{cursor:pointer;background-color:#fff;}

	.panel-default>.panel-heading:hover {
    border-left:solid 3px #89c740;
    border-radius: 0px;
	background-color:#fff;    
	color:#89c740;  
}
.panel-group .panel{margin-bottom:0px;}
   
.list-group-item{cursor:pointer;}      
.panel-title>a{font-size:12px;font-weight:600;}
.panel-title>a:hover{text-decoration:none;}   
.summary {
    background-color: #f4f9fd;
    padding: 20px 32px;
    margin-right: 65px;
    box-shadow: 2px 2px 3px 0px #ece9e9;
	margin-bottom:20px;
}
.summary h6{font-size:25px;}
   
.lb{background-color:#f5f5f585;}
.panel-default {   
    border-color: #dddddd8a;
	
}      
.panel-group .panel+.panel {
   margin-top: 0px;   
}
li.list-group-item {
    background-color: #edeff1;
	font-size: 13px;
}
.summary i{
    float: left;
    margin-right: 25px;
    font-size: 25px;
}  
.userccount p{margin-top:5px;}
.userccount{margin-bottom:20px;}  



.layout-navbar-fixed .wrapper .main-header.text-sm~.content-wrapper,.text-sm .layout-navbar-fixed .wrapper .main-header~.content-wrapper{margin-top:calc(2.93725rem + 1px)}.layout-navbar-fixed .wrapper .main-header{left:0;position:fixed;right:0;top:0;z-index:1037}.layout-navbar-fixed.text-sm .wrapper .content-wrapper{margin-top:calc(2.93725rem + 1px)}body:not(.layout-fixed).layout-navbar-fixed.text-sm .wrapper .main-sidebar{margin-top:calc(calc(2.93725rem + 1px)/ -1)}body:not(.layout-fixed).layout-navbar-fixed.text-sm .wrapper .main-sidebar .sidebar{margin-top:calc(2.93725rem + 1px)}.layout-navbar-not-fixed .wrapper .brand-link{position:static}.layout-navbar-not-fixed .wrapper .content-wrapper,.layout-navbar-not-fixed .wrapper .sidebar{margin-top:0}.layout-navbar-not-fixed .wrapper .main-header{position:static}.layout-navbar-not-fixed.layout-fixed .wrapper .sidebar{margin-top:0}@media (min-width:576px){.layout-sm-navbar-fixed.layout-fixed .wrapper .control-sidebar{top:calc(3.5rem + 1px)}.layout-sm-navbar-fixed.layout-fixed .wrapper .main-header.text-sm~.control-sidebar,.text-sm .layout-sm-navbar-fixed.layout-fixed .wrapper .main-header~.control-sidebar{top:calc(2.93725rem + 1px)}.layout-sm-navbar-fixed.layout-fixed .wrapper .sidebar{margin-top:calc(3.5rem + 1px)}.layout-sm-navbar-fixed.layout-fixed .wrapper .brand-link.text-sm~.sidebar,.text-sm .layout-sm-navbar-fixed.layout-fixed .wrapper .brand-link~.sidebar{margin-top:calc(2.93725rem + 1px)}.layout-sm-navbar-fixed.layout-fixed.text-sm .wrapper .control-sidebar{top:calc(2.93725rem + 1px)}.layout-sm-navbar-fixed.layout-fixed.text-sm .wrapper .sidebar{margin-top:calc(2.93725rem + 1px)}.layout-sm-navbar-fixed .wrapper .control-sidebar{top:0}.layout-sm-navbar-fixed .wrapper a.anchor{display:block;position:relative;top:calc((3.5rem + 1px + (.5rem * 2))/ -1)}.layout-sm-navbar-fixed .wrapper.sidebar-collapse .brand-link{height:calc(3.5rem + 1px);transition:width .3s ease-in-out;width:4.6rem}.layout-sm-navbar-fixed .wrapper.sidebar-collapse .brand-link.text-sm,.text-sm .layout-sm-navbar-fixed .wrapper.sidebar-collapse .brand-link{height:calc(2.93725rem + 1px)}.layout-sm-navbar-fixed .wrapper.sidebar-collapse .main-sidebar:hover .brand-link{transition:width .3s ease-in-out;width:250px}.layout-sm-navbar-fixed .wrapper .brand-link{overflow:hidden;position:fixed;top:0;transition:width .3s ease-in-out;width:250px;z-index:1035}.layout-sm-navbar-fixed .wrapper .sidebar-dark-primary .brand-link:not([class*=navbar]){background-color:#343a40}.layout-sm-navbar-fixed .wrapper .sidebar-light-primary .brand-link:not([class*=navbar]){background-color:#fff}.layout-sm-navbar-fixed .wrapper .sidebar-dark-secondary .brand-link:not([class*=navbar]){background-color:#343a40}.layout-sm-navbar-fixed .wrapper .sidebar-light-secondary .brand-link:not([class*=navbar]){background-color:#fff}.layout-sm-navbar-fixed .wrapper .sidebar-dark-success .brand-link:not([class*=navbar]){background-color:#343a40}.layout-sm-navbar-fixed .wrapper .sidebar-light-success .brand-link:not([class*=navbar]){background-color:#fff}.layout-sm-navbar-fixed .wrapper .sidebar-dark-info .brand-link:not([class*=navbar]){background-color:#343a40}.layout-sm-navbar-fixed .wrapper .sidebar-light-info .brand-link:not([class*=navbar]){background-color:#fff}.layout-sm-navbar-fixed .wrapper .sidebar-dark-warning .brand-link:not([class*=navbar]){background-color:#343a40}.layout-sm-navbar-fixed .wrapper .sidebar-light-warning .brand-link:not([class*=navbar]){background-color:#fff}.layout-sm-navbar-fixed .wrapper .sidebar-dark-danger .brand-link:not([class*=navbar]){background-color:#343a40}.layout-sm-navbar-fixed .wrapper .sidebar-light-danger .brand-link:not([class*=navbar]){background-color:#fff}.layout-sm-navbar-fixed .wrapper .sidebar-dark-light .brand-link:not([class*=navbar]){background-color:#343a40}.layout-sm-navbar-fixed .wrapper .sidebar-light-light .brand-link:not([class*=navbar]){background-color:#fff}.layout-sm-navbar-fixed .wrapper .sidebar-dark-dark .brand-link:not([class*=navbar]){background-color:#343a40}.layout-sm-navbar-fixed .wrapper .sidebar-light-dark .brand-link:not([class*=navbar]){background-color:#fff}.layout-sm-navbar-fixed .wrapper .content-wrapper{margin-top:calc(3.5rem + 1px)}.layout-sm-navbar-fixed .wrapper .main-header.text-sm~.content-wrapper,.text-sm .layout-sm-navbar-fixed .wrapper .main-header~.content-wrapper{margin-top:calc(2.93725rem + 1px)}.layout-sm-navbar-fixed .wrapper .main-header{left:0;position:fixed;right:0;top:0;z-index:1037}.layout-sm-navbar-fixed.text-sm .wrapper .content-wrapper{margin-top:calc(2.93725rem + 1px)}body:not(.layout-fixed).layout-sm-navbar-fixed.text-sm .wrapper .main-sidebar{margin-top:calc(calc(2.93725rem + 1px)/ -1)}body:not(.layout-fixed).layout-sm-navbar-fixed.text-sm .wrapper .main-sidebar .sidebar{margin-top:calc(2.93725rem + 1px)}.layout-sm-navbar-not-fixed .wrapper .brand-link{position:static}.layout-sm-navbar-not-fixed .wrapper .content-wrapper,.layout-sm-navbar-not-fixed .wrapper .sidebar{margin-top:0}.layout-sm-navbar-not-fixed .wrapper .main-header{position:static}.layout-sm-navbar-not-fixed.layout-fixed .wrapper .sidebar{margin-top:0}}@media (min-width:768px){.layout-md-navbar-fixed.layout-fixed .wrapper .control-sidebar{top:calc(3.5rem + 1px)}.layout-md-navbar-fixed.layout-fixed .wrapper .main-header.text-sm~.control-sidebar,.text-sm .layout-md-navbar-fixed.layout-fixed .wrapper .main-header~.control-sidebar{top:calc(2.93725rem + 1px)}.layout-md-navbar-fixed.layout-fixed .wrapper .sidebar{margin-top:calc(3.5rem + 1px)}.layout-md-navbar-fixed.layout-fixed .wrapper .brand-link.text-sm~.sidebar,.text-sm .layout-md-navbar-fixed.layout-fixed .wrapper .brand-link~.sidebar{margin-top:calc(2.93725rem + 1px)}.layout-md-navbar-fixed.layout-fixed.text-sm .wrapper .control-sidebar{top:calc(2.93725rem + 1px)}.layout-md-navbar-fixed.layout-fixed.text-sm .wrapper .sidebar{margin-top:calc(2.93725rem + 1px)}.layout-md-navbar-fixed .wrapper .control-sidebar{top:0}.layout-md-navbar-fixed .wrapper a.anchor{display:block;position:relative;top:calc((3.5rem + 1px + (.5rem * 2))/ -1)}.layout-md-navbar-fixed .wrapper.sidebar-collapse .brand-link{height:calc(3.5rem + 1px);transition:width .3s ease-in-out;width:4.6rem}.layout-md-navbar-fixed .wrapper.sidebar-collapse .brand-link.text-sm,.text-sm .layout-md-navbar-fixed .wrapper.sidebar-collapse .brand-link{height:calc(2.93725rem + 1px)}.layout-md-navbar-fixed .wrapper.sidebar-collapse .main-sidebar:hover .brand-link{transition:width .3s ease-in-out;width:250px}.layout-md-navbar-fixed .wrapper .brand-link{overflow:hidden;position:fixed;top:0;transition:width .3s ease-in-out;width:250px;z-index:1035}.layout-md-navbar-fixed .wrapper .sidebar-dark-primary .brand-link:not([class*=navbar]){background-color:#343a40}.layout-md-navbar-fixed .wrapper .sidebar-light-primary .brand-link:not([class*=navbar]){background-color:#fff}.layout-md-navbar-fixed .wrapper .sidebar-dark-secondary .brand-link:not([class*=navbar]){background-color:#343a40}.layout-md-navbar-fixed .wrapper .sidebar-light-secondary .brand-link:not([class*=navbar]){background-color:#fff}.layout-md-navbar-fixed .wrapper .sidebar-dark-success .brand-link:not([class*=navbar]){background-color:#343a40}.layout-md-navbar-fixed .wrapper .sidebar-light-success .brand-link:not([class*=navbar]){background-color:#fff}.layout-md-navbar-fixed .wrapper .sidebar-dark-info .brand-link:not([class*=navbar]){background-color:#343a40}.layout-md-navbar-fixed .wrapper .sidebar-light-info .brand-link:not([class*=navbar]){background-color:#fff}.layout-md-navbar-fixed .wrapper .sidebar-dark-warning .brand-link:not([class*=navbar]){background-color:#343a40}.layout-md-navbar-fixed .wrapper .sidebar-light-warning .brand-link:not([class*=navbar]){background-color:#fff}.layout-md-navbar-fixed .wrapper .sidebar-dark-danger .brand-link:not([class*=navbar]){background-color:#343a40}.layout-md-navbar-fixed .wrapper .sidebar-light-danger .brand-link:not([class*=navbar]){background-color:#fff}.layout-md-navbar-fixed .wrapper .sidebar-dark-light .brand-link:not([class*=navbar]){background-color:#343a40}.layout-md-navbar-fixed .wrapper .sidebar-light-light .brand-link:not([class*=navbar]){background-color:#fff}.layout-md-navbar-fixed .wrapper .sidebar-dark-dark .brand-link:not([class*=navbar]){background-color:#343a40}.layout-md-navbar-fixed .wrapper .sidebar-light-dark .brand-link:not([class*=navbar]){background-color:#fff}.layout-md-navbar-fixed .wrapper .content-wrapper{margin-top:calc(3.5rem + 1px)}.layout-md-navbar-fixed .wrapper .main-header.text-sm~.content-wrapper,.text-sm .layout-md-navbar-fixed .wrapper .main-header~.content-wrapper{margin-top:calc(2.93725rem + 1px)}.layout-md-navbar-fixed .wrapper .main-header{left:0;position:fixed;right:0;top:0;z-index:1037}.layout-md-navbar-fixed.text-sm .wrapper .content-wrapper{margin-top:calc(2.93725rem + 1px)}body:not(.layout-fixed).layout-md-navbar-fixed.text-sm .wrapper .main-sidebar{margin-top:calc(calc(2.93725rem + 1px)/ -1)}body:not(.layout-fixed).layout-md-navbar-fixed.text-sm .wrapper .main-sidebar .sidebar{margin-top:calc(2.93725rem + 1px)}.layout-md-navbar-not-fixed .wrapper .brand-link{position:static}.layout-md-navbar-not-fixed .wrapper .content-wrapper,.layout-md-navbar-not-fixed .wrapper .sidebar{margin-top:0}.layout-md-navbar-not-fixed .wrapper .main-header{position:static}.layout-md-navbar-not-fixed.layout-fixed .wrapper .sidebar{margin-top:0}}@media (min-width:992px){.layout-lg-navbar-fixed.layout-fixed .wrapper .control-sidebar{top:calc(3.5rem + 1px)}.layout-lg-navbar-fixed.layout-fixed .wrapper .main-header.text-sm~.control-sidebar,.text-sm .layout-lg-navbar-fixed.layout-fixed .wrapper .main-header~.control-sidebar{top:calc(2.93725rem + 1px)}.layout-lg-navbar-fixed.layout-fixed .wrapper .sidebar{margin-top:calc(3.5rem + 1px)}.layout-lg-navbar-fixed.layout-fixed .wrapper .brand-link.text-sm~.sidebar,.text-sm .layout-lg-navbar-fixed.layout-fixed .wrapper .brand-link~.sidebar{margin-top:calc(2.93725rem + 1px)}.layout-lg-navbar-fixed.layout-fixed.text-sm .wrapper .control-sidebar{top:calc(2.93725rem + 1px)}.layout-lg-navbar-fixed.layout-fixed.text-sm .wrapper .sidebar{margin-top:calc(2.93725rem + 1px)}.layout-lg-navbar-fixed .wrapper .control-sidebar{top:0}.layout-lg-navbar-fixed .wrapper a.anchor{display:block;position:relative;top:calc((3.5rem + 1px + (.5rem * 2))/ -1)}.layout-lg-navbar-fixed .wrapper.sidebar-collapse .brand-link{height:calc(3.5rem + 1px);transition:width .3s ease-in-out;width:4.6rem}.layout-lg-navbar-fixed .wrapper.sidebar-collapse .brand-link.text-sm,.text-sm .layout-lg-navbar-fixed .wrapper.sidebar-collapse .brand-link{height:calc(2.93725rem + 1px)}.layout-lg-navbar-fixed .wrapper.sidebar-collapse .main-sidebar:hover .brand-link{transition:width .3s ease-in-out;width:250px}.layout-lg-navbar-fixed .wrapper .content-wrapper{margin-top:calc(3.5rem + 1px)}.layout-lg-navbar-fixed .wrapper .main-header.text-sm~.content-wrapper,.text-sm .layout-lg-navbar-fixed .wrapper .main-header~.content-wrapper{margin-top:calc(2.93725rem + 1px)}.layout-lg-navbar-fixed .wrapper .main-header{left:0;position:fixed;right:0;top:0;z-index:1037}.layout-lg-navbar-fixed.text-sm .wrapper .content-wrapper{margin-top:calc(2.93725rem + 1px)}body:not(.layout-fixed).layout-lg-navbar-fixed.text-sm .wrapper .main-sidebar{margin-top:calc(calc(2.93725rem + 1px)/ -1)}body:not(.layout-fixed).layout-lg-navbar-fixed.text-sm .wrapper .main-sidebar .sidebar{margin-top:calc(2.93725rem + 1px)}.layout-lg-navbar-not-fixed .wrapper .brand-link{position:static}.layout-lg-navbar-not-fixed .wrapper .content-wrapper,.layout-lg-navbar-not-fixed .wrapper .sidebar{margin-top:0}.layout-lg-navbar-not-fixed .wrapper .main-header{position:static}.layout-lg-navbar-not-fixed.layout-fixed .wrapper .sidebar{margin-top:0}}@media (min-width:1200px){.layout-xl-navbar-fixed.layout-fixed .wrapper .control-sidebar{top:calc(3.5rem + 1px)}.layout-xl-navbar-fixed.layout-fixed .wrapper .main-header.text-sm~.control-sidebar,.text-sm .layout-xl-navbar-fixed.layout-fixed .wrapper .main-header~.control-sidebar{top:calc(2.93725rem + 1px)}.layout-xl-navbar-fixed.layout-fixed .wrapper .sidebar{margin-top:calc(3.5rem + 1px)}.layout-xl-navbar-fixed.layout-fixed .wrapper .brand-link.text-sm~.sidebar,.text-sm .layout-xl-navbar-fixed.layout-fixed .wrapper .brand-link~.sidebar{margin-top:calc(2.93725rem + 1px)}.layout-xl-navbar-fixed.layout-fixed.text-sm .wrapper .control-sidebar{top:calc(2.93725rem + 1px)}.layout-xl-navbar-fixed.layout-fixed.text-sm .wrapper .sidebar{margin-top:calc(2.93725rem + 1px)}.layout-xl-navbar-fixed .wrapper .control-sidebar{top:0}.layout-xl-navbar-fixed .wrapper a.anchor{display:block;position:relative;top:calc((3.5rem + 1px + (.5rem * 2))/ -1)}.layout-xl-navbar-fixed .wrapper.sidebar-collapse .brand-link{height:calc(3.5rem + 1px);transition:width .3s ease-in-out;width:4.6rem}.layout-xl-navbar-fixed .wrapper.sidebar-collapse .brand-link.text-sm,.text-sm .layout-xl-navbar-fixed .wrapper.sidebar-collapse .brand-link{height:calc(2.93725rem + 1px)}.layout-xl-navbar-fixed .wrapper.sidebar-collapse .main-sidebar:hover .brand-link{transition:width .3s ease-in-out;width:250px}.layout-xl-navbar-fixed .wrapper .brand-link{overflow:hidden;position:fixed;top:0;transition:width .3s ease-in-out;width:250px;z-index:1035}.layout-xl-navbar-fixed .wrapper .content-wrapper{margin-top:calc(3.5rem + 1px)}.layout-xl-navbar-fixed .wrapper .main-header.text-sm~.content-wrapper,.text-sm .layout-xl-navbar-fixed .wrapper .main-header~.content-wrapper{margin-top:calc(2.93725rem + 1px)}.layout-xl-navbar-fixed .wrapper .main-header{left:0;position:fixed;right:0;top:0;z-index:1037}.layout-xl-navbar-fixed.text-sm .wrapper .content-wrapper{margin-top:calc(2.93725rem + 1px)}body:not(.layout-fixed).layout-xl-navbar-fixed.text-sm .wrapper .main-sidebar{margin-top:calc(calc(2.93725rem + 1px)/ -1)}body:not(.layout-fixed).layout-xl-navbar-fixed.text-sm .wrapper .main-sidebar .sidebar{margin-top:calc(2.93725rem + 1px)}.layout-xl-navbar-not-fixed .wrapper .brand-link{position:static}.layout-xl-navbar-not-fixed .wrapper .content-wrapper,.layout-xl-navbar-not-fixed .wrapper .sidebar{margin-top:0}.layout-xl-navbar-not-fixed .wrapper .main-header{position:static}.layout-xl-navbar-not-fixed.layout-fixed .wrapper .sidebar{margin-top:0}}
</style>
   

    

<div class="section lb">
  <div class="container">                                
                         
    <div class="row">
     <div class="content col-md-3">
  
  
  
<div class="wrapper">

  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">    
    <!-- Brand Logo -->
   
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
      
      
      
      
      
      
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            
            <ul class="nav nav-treeview">
             
              
             
         
         
          
         
           
           
         
          
          <li class="nav-header">EXAMPLES</li>
         
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/e-commerce.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/projects.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-add.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-detail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contacts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/login.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/register.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/forgot-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forgot Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/recover-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recover Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</div>
</div>
  <!-- Content Wrapper. Contains page content -->
  
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  
  
  
  
         
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
     
     
     
      <div class="content col-md-9">
        <div class="userccount">

          <div id="vsphoto" class="tab-pane fade in">
            <h5>My Dashboard</h5>   
                
            <div class="row">
              <div class="col-md-12">
                <div class="containe1r">
					<div class="row">
		                <div class="col-md-12">
		            	 	<div class="col-md-3 summary">
		            	  	<i class="fa fa-briefcase" aria-hidden="true"></i><h6>45</h6>
		            	  		<p>Saved Jobs</p>   
		            	  	</div>
		            	  	<div class="col-md-3 summary">
		            	  		<i class="fa fa-bell"></i><h6>10</h6>
		            	  		<p>Job Alerts</p>
		            	  	</div>
			            	<div class="col-md-3 summary">
			            	  	<i class="fad fa-eye"></i><h6>100</h6>
		            	  		<p>Profile Views</p>
			           	 	</div>   
			           	 	  
		             	</div>
                        <div class="col-md-12">
		            	 	<div class="col-md-3 summary">
		            	  	<i class="fa fa-briefcase" aria-hidden="true"></i><h6>45</h6>
		            	  		<p>Courses Completed</p>   
		            	  	</div>
		            	  	<div class="col-md-3 summary">
		            	  		<i class="fa fa-bell"></i><h6>10</h6>
		            	  		<p>Article Views</p>
		            	  	</div>
			            	<div class="col-md-3 summary">
			            	  	<i class="fa fa-rss"></i><h6>100</h6>
		            	  		<p>News Feed</p>
			           	 	</div>   
			           	 	
		             	</div>
					</div>
					

					

		                  
                </div> <!-- container end -->
                                          
              </div>
              
            </div>
           </div>
           </div>
           
           <div class="userccount">

          <div id="vsphoto" class="tab-pane fade in">

            <h5>My Profile</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="containe1r">
					<div class="row">
		                <div class="col-md-12">
		            	 	<div class="col-md-3 summary">
		            	  	<i class="fa fa-briefcase" aria-hidden="true"></i><h6>45</h6>
		            	  		<p>Ocean Profile</p>   
		            	  	</div>
		            	  	<div class="col-md-3 summary">
		            	  		<i class="fa fa-bell"></i><h6>10</h6>
		            	  		<p>Job Setting</p>
		            	  	</div>
			            	<div class="col-md-3 summary">
			            	  	<i class="fa fa-envelope"></i><h6>100</h6>
		            	  		<p>Cover Letter</p>
			           	 	</div>   
			           	 	  
		             	</div> 
                        
					</div>
					

					

		                  
                </div> <!-- container end -->
                                          
              </div>
              
            </div>
            </div>
            </div>
            
            <div class="userccount">

          <div id="vsphoto" class="tab-pane fade in">
            <h5>My Trainings</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="containe1r">
					<div class="row">
		                <div class="col-md-12">
		            	 	<div class="col-md-3 summary">
		            	  	<i class="fa fa-briefcase" aria-hidden="true"></i><h6>45</h6>
		            	  		<p>Ocean Courses</p>   
		            	  	</div>
		            	  	<div class="col-md-3 summary">
		            	  		<i class="fa fa-bell"></i><h6>10</h6>
		            	  		<p>Skill Upgrade</p>
		            	  	</div>
			            	<div class="col-md-3 summary">
			            	  	<i class="fa fa-trophy"></i><h6>100</h6>
		            	  		<p>Ocean Champ</p>
			           	 	</div>   
			           	 	  
		             	</div>
                        
					</div>
					

					

		                  
                </div> <!-- container end -->
                                          
              </div>
              
            </div>
            </div>
            </div> 
            
            
             <div class="userccount">
             <div id="vsphoto" class="tab-pane fade in">
            <h5>Ocean Services</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="containe1r">
					<div class="row">
		                <div class="col-md-12">
		            	 	<div class="col-md-3 summary">
		            	  	<i class="fa fa-briefcase" aria-hidden="true"></i><h6>45</h6>
		            	  		<p>Resume Writer</p>   
		            	  	</div>
		            	  	<div class="col-md-3 summary">
		            	  		<i class="fa fa-bell"></i><h6>10</h6>
		            	  		<p>Career Advice</p>
		            	  	</div>
			            	<div class="col-md-3 summary">
			            	  	<i class="fad fa-eye"></i><h6>100</h6>
		            	  		<p>PMS</p>
			           	 	</div>   
			           	 	  
		             	</div>
                        
                        
                          <div class="col-md-12">
                          <div class="col-md-3 summary">
		            	  	<i class="fa fa-briefcase" aria-hidden="true"></i><h6>45</h6>
		            	  		<p>On Bording</p>   
		            	  	</div>
                            </div>
					</div>
					

					

		                  
                </div> <!-- container end -->
                                          
              </div>
              
            </div>
            </div>
            </div> 
            
            
            
            
             
          </div>
                             
        </div><!-- end col -->
      </div><!-- end row --> 
      
       
    </div><!-- end container -->
  </div><!-- end section -->
</div>





<?php $this->load->view("fontend/layout/footer.php"); ?>
 