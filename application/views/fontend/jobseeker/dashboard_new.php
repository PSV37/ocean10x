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
     
.lb{background-color:#fff;border: solid 2px #d9d7d7}
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



.layout-sm-navbar-fixed.text-sm .wrapper .main-sidebar{margin-top:calc(calc(2.93725rem + 1px)/ -1)}body:not(.layout-fixed).layout-sm-navbar-fixed.text-sm .wrapper .main-sidebar .sidebar{margin-top:calc(2.93725rem + 1px)}.layout-sm-navbar-not-fixed .wrapper .brand-link{position:static}.layout-sm-navbar-not-fixed .wrapper .content-wrapper,.layout-sm-navbar-not-fixed .wrapper .sidebar{margin-top:0}.layout-sm-navbar-not-fixed.layout-fixed .wrapper .sidebar{margin-top:0}}@media (min-width:768px){.layout-md-navbar-fixed.layout-fixed .wrapper .sidebar{margin-top:calc(3.5rem + 1px)}.layout-md-navbar-fixed.layout-fixed .wrapper .brand-link.text-sm~.sidebar,.text-sm .layout-md-navbar-fixed.layout-fixed .wrapper .brand-link~.sidebar{margin-top:calc(2.93725rem + 1px)}.layout-md-navbar-fixed.layout-fixed.text-sm .wrapper .sidebar{margin-top:calc(2.93725rem + 1px)}.layout-md-navbar-fixed .wrapper a.anchor{display:block;position:relative;top:calc((3.5rem + 1px + (.5rem * 2))/ -1)}.layout-md-navbar-fixed .wrapper.sidebar-collapse .brand-link{height:calc(3.5rem + 1px);transition:width .3s ease-in-out;width:4.6rem}.layout-md-navbar-fixed .wrapper.sidebar-collapse .brand-link.text-sm,.text-sm .layout-md-navbar-fixed .wrapper.sidebar-collapse .brand-link{height:calc(2.93725rem + 1px)}.layout-md-navbar-fixed .wrapper.sidebar-collapse .main-sidebar:hover .brand-link{transition:width .3s ease-in-out;width:250px}.layout-md-navbar-fixed .wrapper .brand-link{overflow:hidden;position:fixed;top:0;transition:width .3s ease-in-out;width:250px;z-index:1035}.layout-md-navbar-fixed .wrapper .sidebar-dark-primary .brand-link:not([class*=navbar]){background-color:#343a40}.layout-md-navbar-fixed .wrapper .sidebar-light-primary .brand-link:not([class*=navbar]){background-color:#fff}.layout-md-navbar-fixed .wrapper .sidebar-dark-secondary .brand-link:not([class*=navbar]){background-color:#343a40}.layout-md-navbar-fixed .wrapper .sidebar-light-secondary .brand-link:not([class*=navbar]){background-color:#fff}.layout-md-navbar-fixed .wrapper .sidebar-dark-success .brand-link:not([class*=navbar]){background-color:#343a40}.layout-md-navbar-fixed .wrapper .sidebar-light-success .brand-link:not([class*=navbar]){background-color:#fff}.layout-md-navbar-fixed .wrapper .sidebar-dark-info .brand-link:not([class*=navbar]){background-color:#343a40}.layout-md-navbar-fixed .wrapper .sidebar-light-info .brand-link:not([class*=navbar]){background-color:#fff}.layout-md-navbar-fixed .wrapper .sidebar-dark-warning .brand-link:not([class*=navbar]){background-color:#343a40}.layout-md-navbar-fixed .wrapper .sidebar-light-warning .brand-link:not([class*=navbar]){background-color:#fff}.layout-md-navbar-fixed .wrapper .sidebar-dark-danger .brand-link:not([class*=navbar]){background-color:#343a40}.layout-md-navbar-fixed .wrapper .sidebar-light-danger .brand-link:not([class*=navbar]){background-color:#fff}.layout-md-navbar-fixed .wrapper .sidebar-dark-light .brand-link:not([class*=navbar]){background-color:#343a40}.layout-md-navbar-fixed .wrapper .sidebar-light-light .brand-link:not([class*=navbar]){background-color:#fff}.layout-md-navbar-fixed .wrapper .sidebar-dark-dark .brand-link:not([class*=navbar]){background-color:#343a40}.layout-md-navbar-fixed .wrapper .sidebar-light-dark .brand-link:not([class*=navbar]){background-color:#fff}body:not(.layout-fixed).layout-md-navbar-fixed.text-sm .wrapper .main-sidebar{margin-top:calc(calc(2.93725rem + 1px)/ -1)}body:not(.layout-fixed).layout-md-navbar-fixed.text-sm .wrapper .main-sidebar .sidebar{margin-top:calc(2.93725rem + 1px)}.layout-md-navbar-not-fixed .wrapper .brand-link{position:static}.layout-md-navbar-not-fixed .wrapper .content-wrapper,.layout-md-navbar-not-fixed .wrapper .sidebar{margin-top:0}.layout-md-navbar-not-fixed.layout-fixed .wrapper .sidebar{margin-top:0}}@media (min-width:992px){.layout-lg-navbar-fixed.layout-fixed .wrapper .sidebar{margin-top:calc(3.5rem + 1px)}.layout-lg-navbar-fixed.layout-fixed .wrapper .brand-link.text-sm~.sidebar,.text-sm .layout-lg-navbar-fixed.layout-fixed .wrapper .brand-link~.sidebar{margin-top:calc(2.93725rem + 1px)}.layout-lg-navbar-fixed.layout-fixed.text-sm .wrapper .sidebar{margin-top:calc(2.93725rem + 1px)}.layout-lg-navbar-fixed .wrapper a.anchor{display:block;position:relative;top:calc((3.5rem + 1px + (.5rem * 2))/ -1)}.layout-lg-navbar-fixed .wrapper.sidebar-collapse .brand-link{height:calc(3.5rem + 1px);transition:width .3s ease-in-out;width:4.6rem}.layout-lg-navbar-fixed .wrapper.sidebar-collapse .brand-link.text-sm,.text-sm .layout-lg-navbar-fixed .wrapper.sidebar-collapse .brand-link{height:calc(2.93725rem + 1px)}.layout-lg-navbar-fixed .wrapper.sidebar-collapse .main-sidebar:hover .brand-link{transition:width .3s ease-in-out;width:250px}.layout-lg-navbar-fixed .wrapper .content-wrapper{margin-top:calc(3.5rem + 1px)}.layout-lg-navbar-fixed.text-sm .wrapper .content-wrapper{margin-top:calc(2.93725rem + 1px)}body:not(.layout-fixed).layout-lg-navbar-fixed.text-sm .wrapper .main-sidebar{margin-top:calc(calc(2.93725rem + 1px)/ -1)}body:not(.layout-fixed).layout-lg-navbar-fixed.text-sm .wrapper .main-sidebar .sidebar{margin-top:calc(2.93725rem + 1px)}.layout-lg-navbar-not-fixed .wrapper .brand-link{position:static}.layout-lg-navbar-not-fixed .wrapper .content-wrapper,.layout-lg-navbar-not-fixed .wrapper .sidebar{margin-top:0}.layout-lg-navbar-not-fixed.layout-fixed .wrapper .sidebar{margin-top:0}}@media (min-width:1200px){.layout-xl-navbar-fixed.layout-fixed .wrapper .sidebar{margin-top:calc(3.5rem + 1px)}.layout-xl-navbar-fixed.layout-fixed .wrapper .brand-link.text-sm~.sidebar,.text-sm .layout-xl-navbar-fixed.layout-fixed .wrapper .brand-link~.sidebar{margin-top:calc(2.93725rem + 1px)}.layout-xl-navbar-fixed.layout-fixed.text-sm .wrapper .sidebar{margin-top:calc(2.93725rem + 1px)}.layout-xl-navbar-fixed .wrapper a.anchor{display:block;position:relative;top:calc((3.5rem + 1px + (.5rem * 2))/ -1)}.layout-xl-navbar-fixed .wrapper.sidebar-collapse .brand-link{height:calc(3.5rem + 1px);transition:width .3s ease-in-out;width:4.6rem}.layout-xl-navbar-fixed .wrapper.sidebar-collapse .brand-link.text-sm,.text-sm .layout-xl-navbar-fixed .wrapper.sidebar-collapse .brand-link{height:calc(2.93725rem + 1px)}.layout-xl-navbar-fixed .wrapper.sidebar-collapse .main-sidebar:hover .brand-link{transition:width .3s ease-in-out;width:250px}.layout-xl-navbar-fixed .wrapper .brand-link{overflow:hidden;position:fixed;top:0;transition:width .3s ease-in-out;width:250px;z-index:1035}body:not(.layout-fixed).layout-xl-navbar-fixed.text-sm .wrapper .main-sidebar{margin-top:calc(calc(2.93725rem + 1px)/ -1)}body:not(.layout-fixed).layout-xl-navbar-fixed.text-sm .wrapper .main-sidebar .sidebar{margin-top:calc(2.93725rem + 1px)}.layout-xl-navbar-not-fixed .wrapper .brand-link{position:static}.layout-xl-navbar-not-fixed .wrapper .content-wrapper,.layout-xl-navbar-not-fixed .wrapper .sidebar{margin-top:0}.layout-xl-navbar-not-fixed .wrapper .main-header{position:static}.layout-xl-navbar-not-fixed.layout-fixed .wrapper .sidebar{margin-top:0}}.layout-footer-fixed .wrapper .main-footer{bottom:0;left:0;position:fixed;right:0;z-index:1032}.layout-footer-not-fixed .wrapper .main-footer{position:static}@media (min-width:1200px){.layout-xl-footer-fixed .wrapper .control-sidebar{bottom:0}.layout-xl-footer-fixed .wrapper .main-footer{bottom:0;left:0;position:fixed;right:0;z-index:1032}.layout-xl-footer-not-fixed .wrapper .main-footer{position:static}}.layout-top-nav .wrapper{margin-left:0}.layout-top-nav .wrapper .main-header .brand-image{margin-top:-.5rem;margin-right:.2rem;height:33px}.layout-top-nav .wrapper .main-sidebar{bottom:inherit;height:inherit}.layout-top-nav .wrapper .content-wrapper,.layout-top-nav .wrapper .main-footer,.layout-top-nav .wrapper .main-header{margin-left:0}body.sidebar-collapse:not(.sidebar-mini-md):not(.sidebar-mini) .content-wrapper,body.sidebar-collapse:not(.sidebar-mini-md):not(.sidebar-mini) .content-wrapper::before,body.sidebar-collapse:not(.sidebar-mini-md):not(.sidebar-mini) .main-footer,body.sidebar-collapse:not(.sidebar-mini-md):not(.sidebar-mini) .main-footer::before,body.sidebar-collapse:not(.sidebar-mini-md):not(.sidebar-mini) .main-header,body.sidebar-collapse:not(.sidebar-mini-md):not(.sidebar-mini) .main-header::before{margin-left:0}@media (min-width:768px){body:not(.sidebar-mini-md) .content-wrapper,body:not(.sidebar-mini-md) .main-footer,body:not(.sidebar-mini-md) .main-header{transition:margin-left .3s ease-in-out;margin-left:250px}}@media (min-width:768px) and (prefers-reduced-motion:reduce){body:not(.sidebar-mini-md) .content-wrapper,body:not(.sidebar-mini-md) .main-footer,body:not(.sidebar-mini-md) .main-header{transition:none}}@media (min-width:768px){.sidebar-collapse body:not(.sidebar-mini-md) .content-wrapper,.sidebar-collapse body:not(.sidebar-mini-md) .main-footer,.sidebar-collapse body:not(.sidebar-mini-md) .main-header{margin-left:0}}@media (max-width:991.98px){body:not(.sidebar-mini-md) .content-wrapper,body:not(.sidebar-mini-md) .content-wrapper::before,body:not(.sidebar-mini-md) .main-footer,body:not(.sidebar-mini-md) .main-footer::before,body:not(.sidebar-mini-md) .main-header,body:not(.sidebar-mini-md) .main-header::before{margin-left:0}}@media (min-width:768px){.sidebar-mini-md .content-wrapper,.sidebar-mini-md .main-footer,.sidebar-mini-md .main-header{transition:margin-left .3s ease-in-out;margin-left:250px}}@media (min-width:768px) and (prefers-reduced-motion:reduce){.sidebar-mini-md .content-wrapper,.sidebar-mini-md .main-footer,.sidebar-mini-md .main-header{transition:none}}@media (min-width:768px){.sidebar-collapse .sidebar-mini-md .content-wrapper,.sidebar-collapse .sidebar-mini-md .main-footer,.sidebar-collapse .sidebar-mini-md .main-header{margin-left:4.6rem}}@media (max-width:991.98px){.sidebar-mini-md .content-wrapper,.sidebar-mini-md .content-wrapper::before,.sidebar-mini-md .main-footer,.sidebar-mini-md .main-footer::before,.sidebar-mini-md .main-header,.sidebar-mini-md .main-header::before{margin-left:4.6rem}}.content-wrapper>.content{padding:0 .5rem}.main-sidebar,.main-sidebar::before{transition:margin-left .3s ease-in-out,width .3s ease-in-out;width:250px}@media (prefers-reduced-motion:reduce){.main-sidebar,.main-sidebar::before{transition:none}}.sidebar-collapse:not(.sidebar-mini):not(.sidebar-mini-md) .main-sidebar,.sidebar-collapse:not(.sidebar-mini):not(.sidebar-mini-md) .main-sidebar::before{box-shadow:none!important}.sidebar-collapse .main-sidebar,.sidebar-collapse .main-sidebar::before{margin-left:-250px}.sidebar-collapse .main-sidebar .nav-sidebar.nav-child-indent .nav-treeview{padding:0}@media (max-width:767.98px){.main-sidebar,.main-sidebar::before{box-shadow:none!important;margin-left:-250px}.sidebar-open .main-sidebar,.sidebar-open .main-sidebar::before{margin-left:0}}:not(.layout-fixed) .main-sidebar{min-height:100%;position:absolute;top:-50}.layout-fixed .brand-link{width:250px}.layout-fixed .main-sidebar{bottom:0;float:none;height:100vh;left:0;position:fixed;top:0}.layout-fixed .control-sidebar{bottom:0;float:none;height:100vh;position:fixed;top:0}.layout-fixed .control-sidebar .control-sidebar-content{height:calc(100vh - calc(3.5rem + 1px))}@supports (-webkit-touch-callout:none){.layout-fixed .main-sidebar{height:inherit}}.main-footer{background:#fff;border-top:1px solid #dee2e6;color:#869099;padding:1rem}.main-footer.text-sm,.text-sm .main-footer{padding:.812rem}.content-header{padding:15px .5rem}.text-sm .content-header{padding:10px .5rem}.content-header h1{font-size:1.8rem;margin:0}.text-sm .content-header h1{font-size:1.5rem}.content-header .breadcrumb{background:0 0;line-height:1.8rem;margin-bottom:0;padding:0}.text-sm .content-header .breadcrumb{line-height:1.5rem}.hold-transition .content-wrapper,.hold-transition .control-sidebar,.hold-transition .control-sidebar *,.hold-transition .main-footer,.hold-transition .main-header,.hold-transition .main-sidebar,.hold-transition .main-sidebar *{transition:none!important;-webkit-animation-duration:0s!important;animation-duration:0s!important}.main-header{border-bottom:1px solid #dee2e6;z-index:1034}.main-header .nav-link{height:2.5rem;position:relative}.main-header.text-sm .nav-link,.text-sm .main-header .nav-link{height:1.93725rem;padding:.35rem 1rem}.main-header.text-sm .nav-link>.fa,.main-header.text-sm .nav-link>.fab,.main-header.text-sm .nav-link>.far,.main-header.text-sm .nav-link>.fas,.main-header.text-sm .nav-link>.glyphicon,.main-header.text-sm .nav-link>.ion,.text-sm .main-header .nav-link>.fa,.text-sm .main-header .nav-link>.fab,.text-sm .main-header .nav-link>.far,.text-sm .main-header .nav-link>.fas,.text-sm .main-header .nav-link>.glyphicon,.text-sm .main-header .nav-link>.ion{font-size:.875rem}.main-header .navbar-nav .nav-item{margin:0}.main-header .navbar-nav[class*='-right'] .dropdown-menu{left:auto;margin-top:-3px;right:0}@media (max-width:575.98px){.main-header .navbar-nav[class*='-right'] .dropdown-menu{left:0;right:auto}}.navbar-img{height:calc(3.5rem + 1px)/2;width:auto}.navbar-badge{font-size:.6rem;font-weight:300;padding:2px 4px;position:absolute;right:5px;top:9px}.btn-navbar{background-color:transparent;border-left-width:0}.form-control-navbar{border-right-width:0}.form-control-navbar+.input-group-append{margin-left:0}.btn-navbar,.form-control-navbar{transition:none}.navbar-dark .btn-navbar,.navbar-dark .form-control-navbar{background-color:rgba(255,255,255,.2);border:0}.navbar-dark .form-control-navbar::-webkit-input-placeholder{color:rgba(255,255,255,.6)}.navbar-dark .form-control-navbar::-moz-placeholder{color:rgba(255,255,255,.6)}.navbar-dark .form-control-navbar:-ms-input-placeholder{color:rgba(255,255,255,.6)}.navbar-dark .form-control-navbar::-ms-input-placeholder{color:rgba(255,255,255,.6)}.navbar-dark .form-control-navbar::placeholder{color:rgba(255,255,255,.6)}.navbar-dark .form-control-navbar+.input-group-append>.btn-navbar{color:rgba(255,255,255,.6)}.navbar-dark .form-control-navbar:focus,.navbar-dark .form-control-navbar:focus+.input-group-append .btn-navbar{background-color:rgba(255,255,255,.6);border:0!important;color:#343a40}.navbar-light .btn-navbar,.navbar-light .form-control-navbar{background-color:#f2f4f6;border:0}.navbar-light .form-control-navbar::-webkit-input-placeholder{color:rgba(0,0,0,.6)}.navbar-light .form-control-navbar::-moz-placeholder{color:rgba(0,0,0,.6)}.navbar-light .form-control-navbar:-ms-input-placeholder{color:rgba(0,0,0,.6)}.navbar-light .form-control-navbar::-ms-input-placeholder{color:rgba(0,0,0,.6)}.navbar-light .form-control-navbar::placeholder{color:rgba(0,0,0,.6)}.navbar-light .form-control-navbar+.input-group-append>.btn-navbar{color:rgba(0,0,0,.6)}.navbar-light .form-control-navbar:focus,.navbar-light .form-control-navbar:focus+.input-group-append .btn-navbar{background-color:#e9ecef;border:0!important;color:#343a40}.brand-link{display:block;font-size:1.25rem;line-height:1.5;padding:.8125rem .5rem;transition:width .3s ease-in-out;white-space:nowrap}.brand-link:hover{color:#fff;text-decoration:none}.text-sm .brand-link{font-size:inherit}[class*=sidebar-dark] .brand-link{border-bottom:1px solid #4b545c;color:rgba(255,255,255,.8)}[class*=sidebar-light] .brand-link{border-bottom:1px solid #dee2e6;color:rgba(0,0,0,.8)}.brand-link .brand-image{float:left;line-height:.8;margin-left:.8rem;margin-right:.5rem;margin-top:-3px;max-height:33px;width:auto}.brand-link .brand-image-xs{float:left;line-height:.8;margin-top:-.1rem;max-height:33px;width:auto}.brand-link .brand-image-xl{line-height:.8;max-height:40px;width:auto}.brand-link .brand-image-xl.single{margin-top:-.3rem}.brand-link.text-sm .brand-image,.text-sm .brand-link .brand-image{height:29px;margin-bottom:-.25rem;margin-left:.95rem;margin-top:-.25rem}.brand-link.text-sm .brand-image-xs,.text-sm .brand-link .brand-image-xs{margin-top:-.2rem;max-height:29px}.brand-link.text-sm .brand-image-xl,.text-sm .brand-link .brand-image-xl{margin-top:-.225rem;max-height:38px}.main-sidebar{height:100vh;overflow-y:hidden;z-index:1038}.main-sidebar a:-moz-focusring{border:0;outline:0}.sidebar{height:calc(100% - (3.5rem + 1px));overflow-y:auto;padding-bottom:0;padding-left:.5rem;padding-right:.5rem;padding-top:20px;}.user-panel{position:relative}[class*=sidebar-dark] .user-panel{border-bottom:1px solid #4f5962}[class*=sidebar-light] .user-panel{border-bottom:1px solid #dee2e6}.user-panel,.user-panel .info{overflow:hidden;white-space:nowrap}.user-panel .image{display:inline-block;padding-left:.8rem}.user-panel img{height:auto;width:2.1rem}.user-panel .info{display:inline-block;padding:5px 5px 5px 10px}.user-panel .dropdown-menu,.user-panel .status{font-size:.875rem}.nav-sidebar .nav-item>.nav-link{margin-bottom:.2rem}.nav-sidebar .nav-item>.nav-link .right{transition:-webkit-transform ease-in-out .3s;transition:transform ease-in-out .3s;transition:transform ease-in-out .3s,-webkit-transform ease-in-out .3s}@media (prefers-reduced-motion:reduce){.nav-sidebar .nav-item>.nav-link .right{transition:none}}.nav-sidebar .nav-link>.right,.nav-sidebar .nav-link>p>.right{position:absolute;right:1rem;top:.7rem}.nav-sidebar .nav-link>.right i,.nav-sidebar .nav-link>.right span,.nav-sidebar .nav-link>p>.right i,.nav-sidebar .nav-link>p>.right span{margin-left:.5rem}.nav-sidebar .nav-link>.right:nth-child(2),.nav-sidebar .nav-link>p>.right:nth-child(2){right:2.2rem}.nav-sidebar .menu-open>.nav-treeview{display:block}.nav-sidebar .menu-open>.nav-link i.right{-webkit-transform:rotate(-90deg);transform:rotate(-90deg)}.nav-sidebar>.nav-item{margin-bottom:0}.nav-sidebar>.nav-item .nav-icon{margin-left:.05rem;font-size:1.2rem;margin-right:.2rem;text-align:center;width:1.6rem}.nav-sidebar>.nav-item .nav-icon.fa,.nav-sidebar>.nav-item .nav-icon.fab,.nav-sidebar>.nav-item .nav-icon.far,.nav-sidebar>.nav-item .nav-icon.fas,.nav-sidebar>.nav-item .nav-icon.glyphicon,.nav-sidebar>.nav-item .nav-icon.ion{font-size:1.1rem}.nav-sidebar>.nav-item .float-right{margin-top:3px}.nav-sidebar .nav-treeview{display:none;list-style:none;padding:0}.nav-sidebar .nav-treeview>.nav-item>.nav-link>.nav-icon{width:1.6rem}.nav-sidebar.nav-child-indent .nav-treeview{transition:padding .3s ease-in-out;padding-left:1rem}.text-sm .nav-sidebar.nav-child-indent .nav-treeview{padding-left:.5rem}.nav-sidebar.nav-child-indent.nav-legacy .nav-treeview .nav-treeview{padding-left:2rem;margin-left:-1rem}.text-sm .nav-sidebar.nav-child-indent.nav-legacy .nav-treeview .nav-treeview{padding-left:1rem;margin-left:-.5rem}.nav-sidebar .nav-header{font-size:.9rem;padding:1.7rem 1rem .5rem;}.nav-sidebar .nav-header:not(:first-of-type){padding:1.7rem 1rem .5rem}.nav-sidebar .nav-link p{display:inline-block;-webkit-animation-name:fadeIn;animation-name:fadeIn;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both;margin:0}#sidebar-overlay{background-color:rgba(0,0,0,.1);bottom:0;display:none;left:0;position:fixed;right:0;top:0;z-index:1037}@media (max-width:991.98px){.sidebar-open #sidebar-overlay{display:block}}[class*=sidebar-light-]{background-color:#fff}[class*=sidebar-light-] .user-panel a:hover{color:#212529}[class*=sidebar-light-] .user-panel .status{background:rgba(0,0,0,.1);color:#343a40}[class*=sidebar-light-] .user-panel .status:active,[class*=sidebar-light-] .user-panel .status:focus,[class*=sidebar-light-] .user-panel .status:hover{background:rgba(0,0,0,.1);color:#212529}[class*=sidebar-light-] .user-panel .dropdown-menu{box-shadow:0 2px 4px rgba(0,0,0,.4);border-color:rgba(0,0,0,.1)}[class*=sidebar-light-] .user-panel .dropdown-item{color:#212529}[class*=sidebar-light-] .nav-sidebar>.nav-item>.nav-link:active,[class*=sidebar-light-] .nav-sidebar>.nav-item>.nav-link:focus{color:#343a40}[class*=sidebar-light-] .nav-sidebar>.nav-item.menu-open>.nav-link,[class*=sidebar-light-] .nav-sidebar>.nav-item:hover>.nav-link{background-color:rgba(0,0,0,.1);color:#212529}[class*=sidebar-light-] .nav-sidebar>.nav-item>.nav-link.active{color:#000;box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)}[class*=sidebar-light-] .nav-sidebar>.nav-item>.nav-treeview{background:0 0}[class*=sidebar-light-] .nav-header{background:inherit;color:#292d32}[class*=sidebar-light-] .sidebar a{color:#343a40}[class*=sidebar-light-] .sidebar a:hover{text-decoration:none}[class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link{color:#777}[class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link.active,[class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link.active:hover{background-color:rgba(0,0,0,.1);color:#212529}[class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link:hover{background-color:rgba(0,0,0,.1)}[class*=sidebar-light-] .nav-flat .nav-item .nav-treeview .nav-treeview{border-color:rgba(0,0,0,.1)}[class*=sidebar-light-] .nav-flat .nav-item .nav-treeview>.nav-item>.nav-link,[class*=sidebar-light-] .nav-flat .nav-item .nav-treeview>.nav-item>.nav-link.active{border-color:rgba(0,0,0,.1)}[class*=sidebar-dark-]{background-color:#343a40}[class*=sidebar-dark-] .user-panel a:hover{color:#fff}[class*=sidebar-dark-] .user-panel .status{background:rgba(255,255,255,.1);color:#c2c7d0}[class*=sidebar-dark-] .user-panel .status:active,[class*=sidebar-dark-] .user-panel .status:focus,[class*=sidebar-dark-] .user-panel .status:hover{background:rgba(247,247,247,.1);color:#fff}[class*=sidebar-dark-] .user-panel .dropdown-menu{box-shadow:0 2px 4px rgba(0,0,0,.4);border-color:rgba(242,242,242,.1)}[class*=sidebar-dark-] .user-panel .dropdown-item{color:#212529}[class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-link:active{color:#c2c7d0}[class*=sidebar-dark-] .nav-sidebar>.nav-item.menu-open>.nav-link,[class*=sidebar-dark-] .nav-sidebar>.nav-item:hover>.nav-link,[class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-link:focus{background-color:rgba(255,255,255,.1);color:#fff}[class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-link.active{color:#fff;box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)}[class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-treeview{background:0 0}[class*=sidebar-dark-] .nav-header{background:inherit;color:#525252;font-weight:600;}[class*=sidebar-dark-] .sidebar a{color:#c2c7d0}[class*=sidebar-dark-] .sidebar a:focus,[class*=sidebar-dark-] .sidebar a:hover{text-decoration:none}[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link{color:#525252;}[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link:focus,[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link:hover{background-color:rgba(255,255,255,.1);color:#000;}[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active,[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus,[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover{background-color:rgba(255,255,255,.9);color:#343a40}[class*=sidebar-dark-] .nav-flat .nav-item .nav-treeview .nav-treeview{border-color:rgba(255,255,255,.9)}[class*=sidebar-dark-] .nav-flat .nav-item .nav-treeview>.nav-item>.nav-link,[class*=sidebar-dark-] .nav-flat .nav-item .nav-treeview>.nav-item>.nav-link.active{border-color:rgba(255,255,255,.9)}.sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active{background-color:#007bff;color:#fff}.sidebar-dark-primary .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-primary .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#007bff}.sidebar-dark-secondary .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-secondary .nav-sidebar>.nav-item>.nav-link.active{background-color:#6c757d;color:#fff}.sidebar-dark-secondary .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-secondary .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#6c757d}.sidebar-dark-success .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-success .nav-sidebar>.nav-item>.nav-link.active{background-color:#28a745;color:#fff}.sidebar-dark-success .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-success .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#28a745}.sidebar-dark-info .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-info .nav-sidebar>.nav-item>.nav-link.active{background-color:#17a2b8;color:#fff}.sidebar-dark-info .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-info .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#17a2b8}.sidebar-dark-warning .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-warning .nav-sidebar>.nav-item>.nav-link.active{background-color:#ffc107;color:#1f2d3d}.sidebar-dark-warning .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-dark-danger .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-danger .nav-sidebar>.nav-item>.nav-link.active{background-color:#dc3545;color:#fff}.sidebar-dark-danger .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-danger .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#dc3545}.sidebar-dark-light .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-light .nav-sidebar>.nav-item>.nav-link.active{background-color:#f8f9fa;color:#1f2d3d}.sidebar-dark-light .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-light .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#f8f9fa}.sidebar-dark-dark .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-dark .nav-sidebar>.nav-item>.nav-link.active{background-color:#343a40;color:#fff}.sidebar-dark-dark .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-dark .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#343a40}.sidebar-dark-lightblue .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-lightblue .nav-sidebar>.nav-item>.nav-link.active{background-color:#3c8dbc;color:#fff}.sidebar-dark-lightblue .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-lightblue .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#3c8dbc}.sidebar-dark-navy .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-navy .nav-sidebar>.nav-item>.nav-link.active{background-color:#001f3f;color:#fff}.sidebar-dark-navy .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-navy .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#001f3f}.sidebar-dark-olive .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-olive .nav-sidebar>.nav-item>.nav-link.active{background-color:#3d9970;color:#fff}.sidebar-dark-olive .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-olive .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#3d9970}.sidebar-dark-lime .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-lime .nav-sidebar>.nav-item>.nav-link.active{background-color:#01ff70;color:#1f2d3d}.sidebar-dark-lime .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-lime .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#01ff70}.sidebar-dark-fuchsia .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-fuchsia .nav-sidebar>.nav-item>.nav-link.active{background-color:#f012be;color:#fff}.sidebar-dark-fuchsia .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-fuchsia .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#f012be}.sidebar-dark-maroon .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-maroon .nav-sidebar>.nav-item>.nav-link.active{background-color:#d81b60;color:#fff}.sidebar-dark-maroon .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-maroon .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#d81b60}.sidebar-dark-blue .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-blue .nav-sidebar>.nav-item>.nav-link.active{background-color:#007bff;color:#fff}.sidebar-dark-blue .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-blue .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#007bff}.sidebar-dark-indigo .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-indigo .nav-sidebar>.nav-item>.nav-link.active{background-color:#6610f2;color:#fff}.sidebar-dark-indigo .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-indigo .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#6610f2}.sidebar-dark-purple .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-purple .nav-sidebar>.nav-item>.nav-link.active{background-color:#6f42c1;color:#fff}.sidebar-dark-purple .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-purple .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#6f42c1}.sidebar-dark-pink .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-pink .nav-sidebar>.nav-item>.nav-link.active{background-color:#e83e8c;color:#fff}.sidebar-dark-pink .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-pink .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#e83e8c}.sidebar-dark-red .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-red .nav-sidebar>.nav-item>.nav-link.active{background-color:#dc3545;color:#fff}.sidebar-dark-red .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-red .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#dc3545}.sidebar-dark-orange .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-orange .nav-sidebar>.nav-item>.nav-link.active{background-color:#fd7e14;color:#1f2d3d}.sidebar-dark-orange .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-orange .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#fd7e14}.sidebar-dark-yellow .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-yellow .nav-sidebar>.nav-item>.nav-link.active{background-color:#ffc107;color:#1f2d3d}.sidebar-dark-yellow .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-yellow .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#ffc107}.sidebar-dark-green .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-green .nav-sidebar>.nav-item>.nav-link.active{background-color:#28a745;color:#fff}.sidebar-dark-green .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-green .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#28a745}.sidebar-dark-teal .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-teal .nav-sidebar>.nav-item>.nav-link.active{background-color:#20c997;color:#fff}.sidebar-dark-teal .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-teal .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#20c997}.sidebar-dark-cyan .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-cyan .nav-sidebar>.nav-item>.nav-link.active{background-color:#17a2b8;color:#fff}.sidebar-dark-cyan .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-cyan .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#17a2b8}.sidebar-dark-white .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-white .nav-sidebar>.nav-item>.nav-link.active{background-color:#fff;color:#1f2d3d}.sidebar-dark-white .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-white .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#fff}.sidebar-dark-gray .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-gray .nav-sidebar>.nav-item>.nav-link.active{background-color:#6c757d;color:#fff}.sidebar-dark-gray .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-gray .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#6c757d}.sidebar-dark-gray-dark .nav-sidebar>.nav-item>.nav-link.active,.sidebar-light-gray-dark .nav-sidebar>.nav-item>.nav-link.active{background-color:#343a40;color:#fff}.sidebar-dark-gray-dark .nav-sidebar.nav-legacy>.nav-item>.nav-link.active,.sidebar-light-gray-dark .nav-sidebar.nav-legacy>.nav-item>.nav-link.active{border-color:#343a40}.sidebar-mini .main-sidebar.sidebar-focused .nav-compact.nav-sidebar.nav-child-indent:not(.nav-flat) .nav-treeview,.sidebar-mini .main-sidebar:not(.sidebar-no-expand) .nav-compact.nav-sidebar.nav-child-indent:not(.nav-flat) .nav-treeview,.sidebar-mini .main-sidebar:not(.sidebar-no-expand):hover .nav-compact.nav-sidebar.nav-child-indent:not(.nav-flat) .nav-treeview,.sidebar-mini-md .main-sidebar.sidebar-focused .nav-compact.nav-sidebar.nav-child-indent:not(.nav-flat) .nav-treeview,.sidebar-mini-md .main-sidebar:not(.sidebar-no-expand) .nav-compact.nav-sidebar.nav-child-indent:not(.nav-flat) .nav-treeview,.sidebar-mini-md .main-sidebar:not(.sidebar-no-expand):hover .nav-compact.nav-sidebar.nav-child-indent:not(.nav-flat) .nav-treeview{padding-left:1rem;margin-left:-.5rem}.nav-flat{margin:-.25rem -.5rem 0}.nav-flat .nav-item>.nav-link{border-radius:0;margin-bottom:0}.nav-flat .nav-item>.nav-link>.nav-icon{margin-left:.55rem}.nav-flat:not(.nav-child-indent) .nav-treeview .nav-item>.nav-link>.nav-icon{margin-left:.4rem}.nav-flat.nav-child-indent .nav-treeview{padding-left:0}.nav-flat.nav-child-indent .nav-treeview .nav-icon{margin-left:.85rem}.nav-flat.nav-child-indent .nav-treeview .nav-treeview{border-left:.2rem solid}.nav-flat.nav-child-indent .nav-treeview .nav-treeview .nav-icon{margin-left:1.15rem}.nav-flat.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-icon{margin-left:1.45rem}.nav-flat.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-icon{margin-left:1.75rem}.nav-flat.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-icon{margin-left:2.05rem}.sidebar-collapse .nav-flat.nav-child-indent .nav-treeview .nav-icon{margin-left:.55rem}.sidebar-collapse .nav-flat.nav-child-indent .nav-treeview .nav-link{padding-left:calc(1rem - .2rem)}.sidebar-collapse .nav-flat.nav-child-indent .nav-treeview .nav-treeview .nav-icon{margin-left:.35rem}.sidebar-collapse .nav-flat.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-icon{margin-left:.15rem}.sidebar-collapse .nav-flat.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-icon{margin-left:-.15rem}.sidebar-collapse .nav-flat.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-icon{margin-left:-.35rem}.sidebar-mini .main-sidebar.sidebar-focused .nav-flat.nav-compact.nav-sidebar .nav-treeview .nav-icon,.sidebar-mini .main-sidebar:not(.sidebar-no-expand):hover .nav-flat.nav-compact.nav-sidebar .nav-treeview .nav-icon,.sidebar-mini-md .main-sidebar.sidebar-focused .nav-flat.nav-compact.nav-sidebar .nav-treeview .nav-icon,.sidebar-mini-md .main-sidebar:not(.sidebar-no-expand):hover .nav-flat.nav-compact.nav-sidebar .nav-treeview .nav-icon{margin-left:.4rem}.sidebar-mini .main-sidebar.sidebar-focused .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-icon,.sidebar-mini .main-sidebar:not(.sidebar-no-expand):hover .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-icon,.sidebar-mini-md .main-sidebar.sidebar-focused .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-icon,.sidebar-mini-md .main-sidebar:not(.sidebar-no-expand):hover .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-icon{margin-left:.85rem}.sidebar-mini .main-sidebar.sidebar-focused .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-treeview .nav-icon,.sidebar-mini .main-sidebar:not(.sidebar-no-expand):hover .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-treeview .nav-icon,.sidebar-mini-md .main-sidebar.sidebar-focused .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-treeview .nav-icon,.sidebar-mini-md .main-sidebar:not(.sidebar-no-expand):hover .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-treeview .nav-icon{margin-left:1.15rem}.sidebar-mini .main-sidebar.sidebar-focused .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-icon,.sidebar-mini .main-sidebar:not(.sidebar-no-expand):hover .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-icon,.sidebar-mini-md .main-sidebar.sidebar-focused .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-icon,.sidebar-mini-md .main-sidebar:not(.sidebar-no-expand):hover .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-icon{margin-left:1.45rem}.sidebar-mini .main-sidebar.sidebar-focused .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-icon,.sidebar-mini .main-sidebar:not(.sidebar-no-expand):hover .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-icon,.sidebar-mini-md .main-sidebar.sidebar-focused .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-icon,.sidebar-mini-md .main-sidebar:not(.sidebar-no-expand):hover .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-icon{margin-left:1.75rem}.sidebar-mini .main-sidebar.sidebar-focused .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-icon,.sidebar-mini .main-sidebar:not(.sidebar-no-expand):hover .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-icon,.sidebar-mini-md .main-sidebar.sidebar-focused .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-icon,.sidebar-mini-md .main-sidebar:not(.sidebar-no-expand):hover .nav-flat.nav-sidebar.nav-child-indent .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-treeview .nav-icon{margin-left:2.05rem}.nav-flat .nav-icon{transition:margin-left ease-in-out .3s}@media (prefers-reduced-motion:reduce){.nav-flat .nav-icon{transition:none}}.nav-flat .nav-treeview .nav-icon{margin-left:-.2rem}.nav-flat.nav-sidebar>.nav-item .nav-treeview,.nav-flat.nav-sidebar>.nav-item>.nav-treeview{background:rgba(255,255,255,.05)}.nav-flat.nav-sidebar>.nav-item .nav-treeview .nav-item>.nav-link,.nav-flat.nav-sidebar>.nav-item>.nav-treeview .nav-item>.nav-link{border-left:.2rem solid}.nav-legacy{margin:-.25rem -.5rem 0}.nav-legacy.nav-sidebar .nav-item>.nav-link{border-radius:0;margin-bottom:0}.nav-legacy.nav-sidebar .nav-item>.nav-link>.nav-icon{margin-left:.55rem}.text-sm .nav-legacy.nav-sidebar .nav-item>.nav-link>.nav-icon{margin-left:.75rem}.nav-legacy.nav-sidebar>.nav-item>.nav-link.active{background:inherit;border-left:3px solid transparent;box-shadow:none}.nav-legacy.nav-sidebar>.nav-item>.nav-link.active>.nav-icon{margin-left:calc(.55rem - 3px)}.text-sm .nav-legacy.nav-sidebar>.nav-item>.nav-link.active>.nav-icon{margin-left:calc(.75rem - 3px)}.text-sm .nav-legacy.nav-sidebar.nav-flat .nav-treeview .nav-item>.nav-link>.nav-icon{margin-left:calc(.75rem - 3px)}.sidebar-mini .nav-legacy>.nav-item .nav-link .nav-icon,.sidebar-mini-md .nav-legacy>.nav-item .nav-link .nav-icon{transition:margin-left ease-in-out .3s;margin-left:.75rem}@media (prefers-reduced-motion:reduce){.sidebar-mini .nav-legacy>.nav-item .nav-link .nav-icon,.sidebar-mini-md .nav-legacy>.nav-item .nav-link .nav-icon{transition:none}}.sidebar-mini-md.sidebar-collapse .main-sidebar.sidebar-focused .nav-legacy.nav-child-indent .nav-treeview,.sidebar-mini-md.sidebar-collapse .main-sidebar:hover .nav-legacy.nav-child-indent .nav-treeview,.sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused .nav-legacy.nav-child-indent .nav-treeview,.sidebar-mini.sidebar-collapse .main-sidebar:hover .nav-legacy.nav-child-indent .nav-treeview{padding-left:1rem}.sidebar-mini-md.sidebar-collapse .main-sidebar.sidebar-focused .nav-legacy.nav-child-indent .nav-treeview .nav-treeview,.sidebar-mini-md.sidebar-collapse .main-sidebar:hover .nav-legacy.nav-child-indent .nav-treeview .nav-treeview,.sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused .nav-legacy.nav-child-indent .nav-treeview .nav-treeview,.sidebar-mini.sidebar-collapse .main-sidebar:hover .nav-legacy.nav-child-indent .nav-treeview .nav-treeview{padding-left:2rem;margin-left:-1rem}.sidebar-mini-md.sidebar-collapse.text-sm .main-sidebar.sidebar-focused .nav-legacy.nav-child-indent .nav-treeview,.sidebar-mini-md.sidebar-collapse.text-sm .main-sidebar:hover .nav-legacy.nav-child-indent .nav-treeview,.sidebar-mini.sidebar-collapse.text-sm .main-sidebar.sidebar-focused .nav-legacy.nav-child-indent .nav-treeview,.sidebar-mini.sidebar-collapse.text-sm .main-sidebar:hover .nav-legacy.nav-child-indent .nav-treeview{padding-left:.5rem}.sidebar-mini-md.sidebar-collapse.text-sm .main-sidebar.sidebar-focused .nav-legacy.nav-child-indent .nav-treeview .nav-treeview,.sidebar-mini-md.sidebar-collapse.text-sm .main-sidebar:hover .nav-legacy.nav-child-indent .nav-treeview .nav-treeview,.sidebar-mini.sidebar-collapse.text-sm .main-sidebar.sidebar-focused .nav-legacy.nav-child-indent .nav-treeview .nav-treeview,.sidebar-mini.sidebar-collapse.text-sm .main-sidebar:hover .nav-legacy.nav-child-indent .nav-treeview .nav-treeview{padding-left:1rem;margin-left:-.5rem}.sidebar-mini-md.sidebar-collapse .nav-legacy>.nav-item>.nav-link .nav-icon,.sidebar-mini.sidebar-collapse .nav-legacy>.nav-item>.nav-link .nav-icon{margin-left:.55rem}.sidebar-mini-md.sidebar-collapse .nav-legacy>.nav-item>.nav-link.active>.nav-icon,.sidebar-mini.sidebar-collapse .nav-legacy>.nav-item>.nav-link.active>.nav-icon{margin-left:.36rem}.sidebar-mini-md.sidebar-collapse .nav-legacy.nav-child-indent .nav-treeview .nav-treeview,.sidebar-mini.sidebar-collapse .nav-legacy.nav-child-indent .nav-treeview .nav-treeview{padding-left:0;margin-left:0}.sidebar-mini-md.sidebar-collapse.text-sm .nav-legacy>.nav-item>.nav-link .nav-icon,.sidebar-mini.sidebar-collapse.text-sm .nav-legacy>.nav-item>.nav-link .nav-icon{margin-left:.75rem}.sidebar-mini-md.sidebar-collapse.text-sm .nav-legacy>.nav-item>.nav-link.active>.nav-icon,.sidebar-mini.sidebar-collapse.text-sm .nav-legacy>.nav-item>.nav-link.active>.nav-icon{margin-left:calc(.75rem - 3px)}[class*=sidebar-dark] .nav-legacy.nav-sidebar>.nav-item .nav-treeview,[class*=sidebar-dark] .nav-legacy.nav-sidebar>.nav-item>.nav-treeview{background:rgba(255,255,255,.05)}[class*=sidebar-dark] .nav-legacy.nav-sidebar>.nav-item>.nav-link.active{color:#fff}[class*=sidebar-dark] .nav-legacy .nav-treeview>.nav-item>.nav-link.active,[class*=sidebar-dark] .nav-legacy .nav-treeview>.nav-item>.nav-link:focus,[class*=sidebar-dark] .nav-legacy .nav-treeview>.nav-item>.nav-link:hover{background:0 0;color:#fff}[class*=sidebar-light] .nav-legacy.nav-sidebar>.nav-item .nav-treeview,[class*=sidebar-light] .nav-legacy.nav-sidebar>.nav-item>.nav-treeview{background:rgba(0,0,0,.05)}[class*=sidebar-light] .nav-legacy.nav-sidebar>.nav-item>.nav-link.active{color:#000}[class*=sidebar-light] .nav-legacy .nav-treeview>.nav-item>.nav-link.active,[class*=sidebar-light] .nav-legacy .nav-treeview>.nav-item>.nav-link:focus,[class*=sidebar-light] .nav-legacy .nav-treeview>.nav-item>.nav-link:hover{background:0 0;color:#000}.nav-collapse-hide-child .menu-open>.nav-treeview{max-height:-webkit-min-content;max-height:-moz-min-content;max-height:min-content;-webkit-animation-name:fadeIn;animation-name:fadeIn;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both}.sidebar-collapse .nav-collapse-hide-child .menu-open>.nav-treeview{max-height:0;-webkit-animation-name:fadeOut;animation-name:fadeOut;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both}.sidebar-mini-md.sidebar-collapse .main-sidebar.sidebar-focused .nav-collapse-hide-child .menu-open>.nav-treeview,.sidebar-mini-md.sidebar-collapse .main-sidebar:hover .nav-collapse-hide-child .menu-open>.nav-treeview,.sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused .nav-collapse-hide-child .menu-open>.nav-treeview,.sidebar-mini.sidebar-collapse .main-sidebar:hover .nav-collapse-hide-child .menu-open>.nav-treeview{max-height:-webkit-min-content;max-height:-moz-min-content;max-height:min-content;-webkit-animation-name:fadeIn;animation-name:fadeIn;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both}.nav-compact .nav-header,.nav-compact .nav-link{padding-top:.25rem;padding-bottom:.25rem}.nav-compact .nav-header:not(:first-of-type){padding-top:.75rem;padding-bottom:.25rem}.nav-compact .nav-link>.right,.nav-compact .nav-link>p>.right{top:.465rem}.text-sm .nav-compact .nav-link>.right,.text-sm .nav-compact .nav-link>p>.right{top:.7rem}[class*=sidebar-dark] .btn-sidebar,[class*=sidebar-dark] .form-control-sidebar{background:#3f474e;border:1px solid #56606a;color:#fff}[class*=sidebar-dark] .btn-sidebar:focus,[class*=sidebar-dark] .form-control-sidebar:focus{border:1px solid #7a8793}[class*=sidebar-dark] .btn-sidebar:hover{background:#454d55}[class*=sidebar-dark] .btn-sidebar:focus{background:#4b545c}[class*=sidebar-light] .btn-sidebar,[class*=sidebar-light] .form-control-sidebar{background:#f2f2f2;border:1px solid #d9d9d9;color:#1f2d3d}[class*=sidebar-light] .btn-sidebar:focus,[class*=sidebar-light] .form-control-sidebar:focus{border:1px solid #b3b3b3}[class*=sidebar-light] .btn-sidebar:hover{background:#ececec}[class*=sidebar-light] .btn-sidebar:focus{background:#e6e6e6}.sidebar .form-inline .input-group{width:100%}.sidebar nav .form-inline{margin-bottom:.2rem}.layout-boxed.sidebar-collapse .main-sidebar{margin-left:0}.layout-boxed .content-wrapper,.layout-boxed .main-footer,.layout-boxed .main-header{z-index:9999;position:relative}.logo-xl,.logo-xs{opacity:1;position:absolute;visibility:visible}.logo-xl.brand-image-xs,.logo-xs.brand-image-xs{left:18px;top:12px}.logo-xl.brand-image-xl,.logo-xs.brand-image-xl{left:12px;top:6px}.logo-xs{opacity:0;visibility:hidden}.logo-xs.brand-image-xl{left:16px;top:8px}.brand-link.logo-switch::before{content:'\00a0'}@media (min-width:992px){.sidebar-mini .nav-sidebar,.sidebar-mini .nav-sidebar .nav-link,.sidebar-mini .nav-sidebar>.nav-header{white-space:nowrap;overflow:hidden}.sidebar-mini.sidebar-collapse .d-hidden-mini{display:none}.sidebar-mini.sidebar-collapse .content-wrapper,.sidebar-mini.sidebar-collapse .main-footer,.sidebar-mini.sidebar-collapse .main-header{margin-left:4.6rem!important}.sidebar-mini.sidebar-collapse .nav-sidebar .nav-header{display:none}.sidebar-mini.sidebar-collapse .nav-sidebar .nav-link p{width:0}.sidebar-mini.sidebar-collapse .brand-text,.sidebar-mini.sidebar-collapse .nav-sidebar .nav-link p,.sidebar-mini.sidebar-collapse .sidebar .user-panel>.info{margin-left:-10px;-webkit-animation-name:fadeOut;animation-name:fadeOut;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both;visibility:hidden}.sidebar-mini.sidebar-collapse .logo-xl{-webkit-animation-name:fadeOut;animation-name:fadeOut;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both;visibility:hidden}.sidebar-mini.sidebar-collapse .logo-xs{display:inline-block;-webkit-animation-name:fadeIn;animation-name:fadeIn;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both;visibility:visible}.sidebar-mini.sidebar-collapse .main-sidebar{overflow-x:hidden}.sidebar-mini.sidebar-collapse .main-sidebar,.sidebar-mini.sidebar-collapse .main-sidebar::before{margin-left:0;width:4.6rem}.sidebar-mini.sidebar-collapse .main-sidebar .user-panel .image{float:none}.sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused,.sidebar-mini.sidebar-collapse .main-sidebar:hover{width:250px}.sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused .brand-link,.sidebar-mini.sidebar-collapse .main-sidebar:hover .brand-link{width:250px}.sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused .user-panel,.sidebar-mini.sidebar-collapse .main-sidebar:hover .user-panel{text-align:left}.sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused .user-panel .image,.sidebar-mini.sidebar-collapse .main-sidebar:hover .user-panel .image{float:left}.sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused .brand-text,.sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused .logo-xl,.sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused .nav-sidebar .nav-link p,.sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused .user-panel>.info,.sidebar-mini.sidebar-collapse .main-sidebar:hover .brand-text,.sidebar-mini.sidebar-collapse .main-sidebar:hover .logo-xl,.sidebar-mini.sidebar-collapse .main-sidebar:hover .nav-sidebar .nav-link p,.sidebar-mini.sidebar-collapse .main-sidebar:hover .user-panel>.info{display:inline-block;margin-left:0;-webkit-animation-name:fadeIn;animation-name:fadeIn;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both;visibility:visible}.sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused .logo-xs,.sidebar-mini.sidebar-collapse .main-sidebar:hover .logo-xs{-webkit-animation-name:fadeOut;animation-name:fadeOut;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both;visibility:hidden}.sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused .brand-image,.sidebar-mini.sidebar-collapse .main-sidebar:hover .brand-image{margin-right:.5rem}.sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused .sidebar-form,.sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused .user-panel>.info,.sidebar-mini.sidebar-collapse .main-sidebar:hover .sidebar-form,.sidebar-mini.sidebar-collapse .main-sidebar:hover .user-panel>.info{display:block!important;-webkit-transform:translateZ(0)}.sidebar-mini.sidebar-collapse .main-sidebar.sidebar-focused .nav-sidebar>.nav-item>.nav-link>span,.sidebar-mini.sidebar-collapse .main-sidebar:hover .nav-sidebar>.nav-item>.nav-link>span{display:inline-block!important}.sidebar-mini.sidebar-collapse .visible-sidebar-mini{display:block!important}.sidebar-mini.sidebar-collapse.layout-fixed .main-sidebar:hover .brand-link{width:250px}.sidebar-mini.sidebar-collapse.layout-fixed .brand-link{width:4.6rem}}@media (max-width:991.98px){.sidebar-mini.sidebar-collapse .main-sidebar{box-shadow:none!important}}@media (min-width:768px){.sidebar-mini-md .nav-sidebar,.sidebar-mini-md .nav-sidebar .nav-link,.sidebar-mini-md .nav-sidebar>.nav-header{white-space:nowrap;overflow:hidden}.sidebar-mini-md.sidebar-collapse .d-hidden-mini{display:none}.sidebar-mini-md.sidebar-collapse .content-wrapper,.sidebar-mini-md.sidebar-collapse .main-footer,.sidebar-mini-md.sidebar-collapse .main-header{margin-left:4.6rem!important}.sidebar-mini-md.sidebar-collapse .nav-sidebar .nav-header{display:none}.sidebar-mini-md.sidebar-collapse .nav-sidebar .nav-link p{width:0}.sidebar-mini-md.sidebar-collapse .brand-text,.sidebar-mini-md.sidebar-collapse .nav-sidebar .nav-link p,.sidebar-mini-md.sidebar-collapse .sidebar .user-panel>.info{margin-left:-10px;-webkit-animation-name:fadeOut;animation-name:fadeOut;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both;visibility:hidden}.sidebar-mini-md.sidebar-collapse .logo-xl{-webkit-animation-name:fadeOut;animation-name:fadeOut;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both;visibility:hidden}.sidebar-mini-md.sidebar-collapse .logo-xs{display:inline-block;-webkit-animation-name:fadeIn;animation-name:fadeIn;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both;visibility:visible}.sidebar-mini-md.sidebar-collapse .main-sidebar{overflow-x:hidden}.sidebar-mini-md.sidebar-collapse .main-sidebar,.sidebar-mini-md.sidebar-collapse .main-sidebar::before{margin-left:0;width:4.6rem}.sidebar-mini-md.sidebar-collapse .main-sidebar .user-panel .image{float:none}.sidebar-mini-md.sidebar-collapse .main-sidebar.sidebar-focused,.sidebar-mini-md.sidebar-collapse .main-sidebar:hover{width:250px}.sidebar-mini-md.sidebar-collapse .main-sidebar.sidebar-focused .brand-link,.sidebar-mini-md.sidebar-collapse .main-sidebar:hover .brand-link{width:250px}.sidebar-mini-md.sidebar-collapse .main-sidebar.sidebar-focused .user-panel,.sidebar-mini-md.sidebar-collapse .main-sidebar:hover .user-panel{text-align:left}.sidebar-mini-md.sidebar-collapse .main-sidebar.sidebar-focused .user-panel .image,.sidebar-mini-md.sidebar-collapse .main-sidebar:hover .user-panel .image{float:left}.sidebar-mini-md.sidebar-collapse .main-sidebar.sidebar-focused .brand-text,.sidebar-mini-md.sidebar-collapse .main-sidebar.sidebar-focused .logo-xl,.sidebar-mini-md.sidebar-collapse .main-sidebar.sidebar-focused .nav-sidebar .nav-link p,.sidebar-mini-md.sidebar-collapse .main-sidebar.sidebar-focused .user-panel>.info,.sidebar-mini-md.sidebar-collapse .main-sidebar:hover .brand-text,.sidebar-mini-md.sidebar-collapse .main-sidebar:hover .logo-xl,.sidebar-mini-md.sidebar-collapse .main-sidebar:hover .nav-sidebar .nav-link p,.sidebar-mini-md.sidebar-collapse .main-sidebar:hover .user-panel>.info{display:inline-block;margin-left:0;-webkit-animation-name:fadeIn;animation-name:fadeIn;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both;visibility:visible}.sidebar-mini-md.sidebar-collapse .main-sidebar.sidebar-focused .logo-xs,.sidebar-mini-md.sidebar-collapse .main-sidebar:hover .logo-xs{-webkit-animation-name:fadeOut;animation-name:fadeOut;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both;visibility:hidden}.sidebar-mini-md.sidebar-collapse .main-sidebar.sidebar-focused .brand-image,.sidebar-mini-md.sidebar-collapse .main-sidebar:hover .brand-image{margin-right:.5rem}.sidebar-mini-md.sidebar-collapse .main-sidebar.sidebar-focused .sidebar-form,.sidebar-mini-md.sidebar-collapse .main-sidebar.sidebar-focused .user-panel>.info,.sidebar-mini-md.sidebar-collapse .main-sidebar:hover .sidebar-form,.sidebar-mini-md.sidebar-collapse .main-sidebar:hover .user-panel>.info{display:block!important;-webkit-transform:translateZ(0)}.sidebar-mini-md.sidebar-collapse .main-sidebar.sidebar-focused .nav-sidebar>.nav-item>.nav-link>span,.sidebar-mini-md.sidebar-collapse .main-sidebar:hover .nav-sidebar>.nav-item>.nav-link>span{display:inline-block!important}.sidebar-mini-md.sidebar-collapse .visible-sidebar-mini{display:block!important}.sidebar-mini-md.sidebar-collapse.layout-fixed .main-sidebar:hover .brand-link{width:250px}.sidebar-mini-md.sidebar-collapse.layout-fixed .brand-link{width:4.6rem}}@media (max-width:767.98px){.sidebar-mini-md.sidebar-collapse .main-sidebar{box-shadow:none!important}}@-webkit-keyframes fadeIn{from{opacity:0}to{opacity:1}}@keyframes fadeIn{from{opacity:0}to{opacity:1}}@-webkit-keyframes fadeOut{from{opacity:1}to{opacity:0}}@keyframes fadeOut{from{opacity:1}to{opacity:0}}.sidebar-collapse .main-sidebar.sidebar-focused .nav-header,.sidebar-collapse .main-sidebar:hover .nav-header{display:inline-block}.sidebar-collapse .sidebar-no-expand.main-sidebar.sidebar-focused,.sidebar-collapse .sidebar-no-expand.main-sidebar:hover{width:4.6rem}.sidebar-collapse .sidebar-no-expand.main-sidebar.sidebar-focused .nav-header,.sidebar-collapse .sidebar-no-expand.main-sidebar:hover .nav-header{display:none}.sidebar-collapse .sidebar-no-expand.main-sidebar.sidebar-focused .brand-link,.sidebar-collapse .sidebar-no-expand.main-sidebar:hover .brand-link{width:4.6rem!important}.sidebar-collapse .sidebar-no-expand.main-sidebar.sidebar-focused .user-panel .image,.sidebar-collapse .sidebar-no-expand.main-sidebar:hover .user-panel .image{float:none!important}.sidebar-collapse .sidebar-no-expand.main-sidebar.sidebar-focused .logo-xs,.sidebar-collapse .sidebar-no-expand.main-sidebar:hover .logo-xs{-webkit-animation-name:fadeIn;animation-name:fadeIn;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both;visibility:visible}.sidebar-collapse .sidebar-no-expand.main-sidebar.sidebar-focused .logo-xl,.sidebar-collapse .sidebar-no-expand.main-sidebar:hover .logo-xl{-webkit-animation-name:fadeOut;animation-name:fadeOut;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both;visibility:hidden}.sidebar-collapse .sidebar-no-expand.main-sidebar.sidebar-focused .nav-sidebar.nav-child-indent .nav-treeview,.sidebar-collapse .sidebar-no-expand.main-sidebar:hover .nav-sidebar.nav-child-indent .nav-treeview{padding-left:0}.sidebar-collapse .sidebar-no-expand.main-sidebar.sidebar-focused .brand-text,.sidebar-collapse .sidebar-no-expand.main-sidebar.sidebar-focused .nav-sidebar .nav-link p,.sidebar-collapse .sidebar-no-expand.main-sidebar.sidebar-focused .user-panel>.info,.sidebar-collapse .sidebar-no-expand.main-sidebar:hover .brand-text,.sidebar-collapse .sidebar-no-expand.main-sidebar:hover .nav-sidebar .nav-link p,.sidebar-collapse .sidebar-no-expand.main-sidebar:hover .user-panel>.info{margin-left:-10px;-webkit-animation-name:fadeOut;animation-name:fadeOut;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:both;animation-fill-mode:both;visibility:hidden;width:0}.sidebar-collapse .sidebar-no-expand.main-sidebar.sidebar-focused .nav-sidebar>.nav-item .nav-icon,.sidebar-collapse .sidebar-no-expand.main-sidebar:hover .nav-sidebar>.nav-item .nav-icon{margin-right:0}.nav-sidebar{position:relative}.nav-sidebar:hover{overflow:visible}.nav-sidebar>.nav-header,.sidebar-form{overflow:hidden;text-overflow:clip}.nav-sidebar .nav-item>.nav-link{position:relative}.nav-sidebar .nav-item>.nav-link>.float-right{margin-top:-7px;position:absolute;right:10px;top:50%}.main-sidebar .brand-text,.main-sidebar .logo-xl,.main-sidebar .logo-xs,.sidebar .nav-link p,.sidebar .user-panel .info{transition:margin-left .3s linear,opacity .3s ease,visibility .3s ease}@media (prefers-reduced-motion:reduce){.main-sidebar .brand-text,.main-sidebar .logo-xl,.main-sidebar .logo-xs,.sidebar .nav-link p,.sidebar .user-panel .info{transition:none}}html.control-sidebar-animate{overflow-x:hidden}.control-sidebar{bottom:calc(3.5rem + 1px);position:absolute;top:calc(3.5rem + 1px);z-index:1031}.control-sidebar,.control-sidebar::before{bottom:calc(3.5rem + 1px);display:none;right:-250px;width:250px;transition:right .3s ease-in-out,display .3s ease-in-out}@media (prefers-reduced-motion:reduce){.control-sidebar,.control-sidebar::before{transition:none}}.control-sidebar::before{content:'';display:block;position:fixed;top:0;z-index:-1}body.text-sm .control-sidebar{bottom:calc(2.9365rem + 1px);top:calc(2.93725rem + 1px)}.main-header.text-sm~.control-sidebar{top:calc(2.93725rem + 1px)}.main-footer.text-sm~.control-sidebar{bottom:calc(2.9365rem + 1px)}.control-sidebar-push-slide .content-wrapper,.control-sidebar-push-slide .main-footer{transition:margin-right .3s ease-in-out}@media (prefers-reduced-motion:reduce){.control-sidebar-push-slide .content-wrapper,.control-sidebar-push-slide .main-footer{transition:none}}.control-sidebar-open .control-sidebar{display:block}.control-sidebar-open .control-sidebar,.control-sidebar-open .control-sidebar::before{right:0}.control-sidebar-open.control-sidebar-push .content-wrapper,.control-sidebar-open.control-sidebar-push .main-footer,.control-sidebar-open.control-sidebar-push-slide .content-wrapper,.control-sidebar-open.control-sidebar-push-slide .main-footer{margin-right:250px}.control-sidebar-slide-open .control-sidebar{display:block}   
.sidebar {
    background: #fff !important;
}    
.wrapper {
    margin-top: -50px;
}
[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link:hover {
    background-color: rgba(255,255,255,.1);
    color: #8BC34A;
}
[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link:focus .fa-briefcase:before{background-color:#000 !important;animation:toLeftFromRight 0.3s forwards;} 
.fa-briefcase:before{        
	  animation:toLeftFromRight 0.3s forwards;       
    padding: 7px;            
    border-radius: 16px;}        
.nav-item .nav-link i{color: #8bc742;}
[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link:focus.nav-item .nav-link i{background-color: #8bc742;}		  

#left-panel .inner-left-pannel .inner-tabs .menu-tab .menu-principal ul li {
    font-family: "Open Sans",sans-serif;
    color: #a9a9a9;
    list-style: none;
}
#left-panel .inner-left-pannel .inner-tabs .menu-tab .menu-principal ul a {
    color: inherit;
    text-decoration: none;
    padding: 8px 0;
}
#left-panel .inner-left-pannel .inner-tabs .menu-tab .menu-principal ul li span.icon-container i {
    transition: all .3s ease;
    height: 30px;
    width: 30px;
    text-align: center;
    border-radius: 50%;
    background-color: #95c619;
    border-color: #fff;
    color: #fff;
    position: relative;
    left: -100%;
}
#left-panel .inner-left-pannel .inner-tabs .menu-tab .menu-principal ul li span.icon-container i:before {
    line-height: 200%;
    font-size: 100%;
}
#left-panel .inner-left-pannel .inner-tabs .menu-tab .menu-principal ul li span.icon-container i:before {
    line-height: 200%;
    font-size: 100%;
}

/*dashboard box*/
@media (min-width: 768px){
.circle-tile {
    margin-bottom: 30px;
}
}

.circle-tile {
    margin-bottom: 15px;
    text-align: center;   
	width:100%;
}   

.circle-tile-heading {
    position: relative;
    width: 80px;
    height: 80px;
    margin: 0 auto -40px;
    border: 3px solid rgba(255,255,255,0.3);
    border-radius: 100%;   
    color: #fff;
    transition: all ease-in-out .3s;
	background-color:#248c33 !important
}

/* -- Background Helper Classes */

/* Use these to cuztomize the background color of a div. These are used along with tiles, or any other div you want to customize. */

 .dark-blue {
    background-color:#94d742;
}

/* -- Text Color Helper Classes */

 .text-dark-blue {
    color: #34495e;
}
.circle-tile-heading .fa {
    line-height: 73px;
	font-size:30px;
}

.circle-tile-content {   
    padding-top:50px;     
	border-radius: 3px;      
}
.circle-tile-description {
    text-transform: uppercase;
}

.text-faded {
    color: rgba(255, 255, 255, 0.85);
    font-size: 13px;
    font-weight: 500;
}

.circle-tile-number {
    padding: 5px 0 15px;
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
}

.circle-tile-footer {
    display: block;
    padding: 5px;
    color: rgba(255,255,255,0.5);
    background-color: rgba(0,0,0,0.1);
    transition: all ease-in-out .3s;
}

.circle-tile-footer:hover {
    text-decoration: none;
    color: rgba(255,255,255,0.5);
    background-color: rgba(0,0,0,0.2);
}


   
.time-widget {
    margin-top: 5px;
    overflow: hidden;
    text-align: center;
    font-size: 1.75em;
}

.time-widget-heading {
    text-transform: uppercase;
    font-size: .5em;
    font-weight: 400;
    color: #fff;
}
#datetime{color:#fff;}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0,0,0,0.9);
}

.tile {
    margin-bottom: 15px;
    padding: 15px;
    overflow: hidden;
    color: #fff;
}
.circle-tile:hover .circle-tile-heading{border:solid #fff;box-shadow: 0px -1px 7px 0px #fff;
}    
.gradient_strip{
	height: 39px;
    width: 100%;
    background-image: linear-gradient(to right, #ace41e , #2196F3);
	}     
.dark-blue img{margin:20px;}
.dark-blue svg{margin:20px;}	 
</style>     
      
   
<div class="gradient_strip"></div>    
    
<div class="section lb">
  <div class="container-fluid">                                
                           
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
 
           
         
               
               
               
          <li class="nav-header">MY DASHBOARD</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-briefcase" aria-hidden="true"></i>
              <p>Documentation</p>
            </a>    
          </li>
          
          
          
          <li class="nav-header">MY PROFILE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
               <i class="fa fa-briefcase" aria-hidden="true"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">MY TRAININGS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-briefcase" aria-hidden="true"></i>
              <p>Level 1</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-briefcase" aria-hidden="true"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-header">OCEAN SERVICES</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
               <i class="fa fa-briefcase" aria-hidden="true"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
               <i class="fa fa-briefcase" aria-hidden="true"></i>
              <p>Warning</p>
            </a>
          </li>    
          <li class="nav-item">
            <a href="#" class="nav-link">
               <i class="fa fa-briefcase" aria-hidden="true"></i>
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
                		<div class="container">
							<div class="row">
                                <div class="col-md-12">
                                     <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading dark-blue">
                                                   <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="30" height="30"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M27.52,13.76c-5.848,0 -10.32,4.472 -10.32,10.32v123.84c0,5.848 4.472,10.32 10.32,10.32h123.84c5.848,0 10.32,-4.472 10.32,-10.32v-102.51469c0,-1.032 -0.34669,-1.71731 -1.03469,-2.40531l-28.20531,-28.20531c-0.688,-0.688 -1.37331,-1.03469 -2.40531,-1.03469zM44.72,20.64h82.56v41.28c0,3.784 -3.096,6.88 -6.88,6.88h-68.8c-3.784,0 -6.88,-3.096 -6.88,-6.88zM99.76,30.96v27.52h13.76v-27.52zM51.6,92.88h75.68c3.784,0 6.88,3.096 6.88,6.88v51.6h-89.44v-51.6c0,-3.784 3.096,-6.88 6.88,-6.88zM27.52,141.04h6.88v6.88h-6.88zM144.48,141.04h6.88v6.88h-6.88z"></path></g></g></svg>
                                                </div>
                                            </a>
                                                <div class="circle-tile-content dark-blue">
                                                 <div class="circle-tile-description text-faded">
                                                 Saved Jobs
                                                </div>
                                                <div class="circle-tile-number text-faded">
                                                    265
                                                    <span id="sparklineA"></span>
                                                </div>
                                                
                                    </div>
                                </div>  
                            </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading dark-blue">
                                                 <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="24" height="24"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M0,0v14.33333h14.33333v47.03125c-4.25521,-2.49153 -9.07031,-4.03125 -14.33333,-4.03125v57.33333c5.26302,0 10.07813,-1.53972 14.33333,-4.03125v47.03125h-14.33333v14.33333h28.66667v-172zM142.66146,2.6875l-11.42187,8.95833c16.34896,21.10808 26.42708,46.72331 26.42708,74.35417c0,27.63086 -10.10612,53.27409 -27.09896,74.35417l11.19792,8.95833c18.84049,-23.34765 30.23438,-52.18229 30.23438,-83.3125c0,-31.13021 -11.2819,-59.99284 -29.33854,-83.3125zM118.69792,20.38021l-10.97396,9.40625c13.24153,15.22917 21.27604,35.07747 21.27604,56.21354c0,21.13607 -8.03451,40.98438 -21.27604,56.21354l10.97396,9.40625c15.42513,-17.74869 24.63542,-40.90039 24.63542,-65.61979c0,-24.7194 -9.21028,-47.87109 -24.63542,-65.61979zM95.63021,38.07292l-10.52604,9.85417c9.60222,10.2181 15.22917,23.45964 15.22917,38.07292c0,14.61328 -5.62695,27.85482 -15.22917,38.07292l10.52604,9.85417c11.89778,-12.70963 19.03646,-29.5625 19.03646,-47.92708c0,-18.36458 -7.13867,-35.21744 -19.03646,-47.92708zM72.78646,57.78125l-9.40625,10.75c4.98308,4.42318 8.28646,11.25391 8.28646,17.46875c0,6.21485 -3.30338,13.04558 -8.28646,17.46875l9.40625,10.75c7.92253,-7.05469 13.21354,-17.2168 13.21354,-28.21875c0,-11.00195 -5.29101,-21.16406 -13.21354,-28.21875z"></path></g></g></svg>
                                                </div>     
                                            </a>
                                                <div class="circle-tile-content dark-blue">
                                                 <div class="circle-tile-description text-faded">
                                                 Job Alert
                                                </div>    
                                                <div class="circle-tile-number text-faded">
                                                    265
                                                    <span id="sparklineA"></span>
                                                </div>
                                                
                                    </div>
                                </div>  
                            </div>   	
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading dark-blue">
                                                   <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="24" height="24"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M57.33333,7.16667c-11.86979,0 -21.5,9.63021 -21.5,21.5c0,11.86979 9.63021,21.5 21.5,21.5c11.86979,0 21.5,-9.63021 21.5,-21.5c0,-11.86979 -9.63021,-21.5 -21.5,-21.5zM114.66667,7.16667c-11.86979,0 -21.5,9.63021 -21.5,21.5c0,11.86979 9.63021,21.5 21.5,21.5c11.86979,0 21.5,-9.63021 21.5,-21.5c0,-11.86979 -9.63021,-21.5 -21.5,-21.5zM28.66667,50.16667c-11.86979,0 -21.5,9.63021 -21.5,21.5c0,11.86979 9.63021,21.5 21.5,21.5c11.86979,0 21.5,-9.63021 21.5,-21.5c0,-11.86979 -9.63021,-21.5 -21.5,-21.5zM143.33333,50.16667c-11.86979,0 -21.5,9.63021 -21.5,21.5c0,11.86979 9.63021,21.5 21.5,21.5c11.86979,0 21.5,-9.63021 21.5,-21.5c0,-11.86979 -9.63021,-21.5 -21.5,-21.5zM86,86c-11.86979,0 -21.5,9.63021 -21.5,21.5c0,11.86979 9.63021,21.5 21.5,21.5c11.86979,0 21.5,-9.63021 21.5,-21.5c0,-11.86979 -9.63021,-21.5 -21.5,-21.5zM15.00521,96.75c-8.5944,5.01107 -15.00521,14.33333 -15.00521,25.08333v8.51042c0,0 7.16667,5.82292 28.66667,5.82292c21.5,0 28.66667,-5.82292 28.66667,-5.82292v-8.51042c0,-10.75 -6.41081,-20.07226 -15.00521,-25.08333c-4.31119,2.1556 -8.65039,3.58333 -13.66146,3.58333c-5.01107,0 -9.35026,-1.42774 -13.66146,-3.58333zM129.67188,96.75c-8.5944,5.01107 -15.00521,14.33333 -15.00521,25.08333v8.51042c0,0 7.16667,5.82292 28.66667,5.82292c21.5,0 28.66667,-5.82292 28.66667,-5.82292v-8.51042c0,-10.75 -6.41081,-20.07226 -15.00521,-25.08333c-4.31119,2.1556 -8.65039,3.58333 -13.66146,3.58333c-5.01107,0 -9.35026,-1.42774 -13.66146,-3.58333zM72.33854,132.58333c-8.5944,5.01107 -15.00521,14.33333 -15.00521,25.08333v8.51042c0,0 7.16667,5.82292 28.66667,5.82292c21.5,0 28.66667,-5.82292 28.66667,-5.82292v-8.51042c0,-10.75 -6.41081,-20.07226 -15.00521,-25.08333c-4.31119,2.1556 -8.65039,3.58333 -13.66146,3.58333c-5.01107,0 -9.35026,-1.42774 -13.66146,-3.58333z"></path></g></g></svg>
                                                </div>
                                            </a>
                                                <div class="circle-tile-content dark-blue">
                                                 <div class="circle-tile-description text-faded">
                                                 Profile Views
                                                </div>
                                                <div class="circle-tile-number text-faded">
                                                    265
                                                    <span id="sparklineA"></span>
                                                </div>
                                                
                                    </div>
                                </div>  
                            </div>   
                                      
                                </div>
                                <div class="col-md-12">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading dark-blue">
                                                   <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="24" height="24"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M10.32,13.76c-5.68406,0 -10.32,4.63594 -10.32,10.32v89.7625c5.03906,-26.82125 10.68281,-56.90781 10.965,-58.3725c1.74688,-8.90906 8.46563,-14.19 18.06,-14.19h132.655v-3.44c0,-5.68406 -4.63594,-10.32 -10.32,-10.32h-89.3325c-0.95406,-0.34937 -2.91594,-3.46687 -3.9775,-5.16c-2.64719,-4.21937 -5.36156,-8.6 -9.89,-8.6zM29.025,48.16c-4.4075,0 -9.89,1.54531 -11.2875,8.7075c-0.44344,2.23063 -13.84062,73.54344 -17.7375,94.2775v0.215c0,5.68406 4.63594,10.32 10.32,10.32h134.16c5.57656,0 10.13188,-4.46125 10.32,-9.9975l17.0925,-92.5575l0.1075,-0.645c0,-5.68406 -4.63594,-10.32 -10.32,-10.32z"></path></g></g></svg>
                                                </div>
                                            </a>
                                                <div class="circle-tile-content dark-blue">
                                                 <div class="circle-tile-description text-faded">
                                                 Courses Completed
                                                </div>
                                                <div class="circle-tile-number text-faded">
                                                    265
                                                    <span id="sparklineA"></span>
                                                </div>
                                                
                                    </div>
                                </div>  
                            </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading dark-blue">
                                                   <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="24" height="24"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M100.33781,6.88h-76.25781v158.24h123.84v-112.02844zM92.51719,136.6325c1.96188,-0.30906 15.31875,-24.68469 -3.25187,-41.13219c5.21375,18.03312 -2.28438,30.05969 -9.7825,15.81594c-8.14313,14.24375 1.30344,23.09906 3.26531,25.31625c-13.03438,0 -19.565,-10.11844 -19.565,-23.42156c0,-17.71062 17.60312,-22.77656 19.565,-42.71781c22.48094,15.18437 29.32062,31.01375 29.32062,43.04031c0,11.0725 -6.83969,23.09906 -19.55156,23.09906zM99.76,55.04v-41.28l41.28,41.28z"></path></g></g></svg>
                                                </div>
                                            </a>
                                                <div class="circle-tile-content dark-blue">
                                                 <div class="circle-tile-description text-faded">
                                                 Article Views
                                                </div>
                                                <div class="circle-tile-number text-faded">
                                                    265
                                                    <span id="sparklineA"></span>
                                                </div>
                                                
                                    </div>  
                                </div>  
                            </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading dark-blue">
                                                   <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="24" height="24"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M0,0v14.33333c24.15951,0 43,18.84049 43,43v50.16667h-21.5l28.66667,40.08854l28.66667,-40.08854h-21.5v-50.16667c0,-31.74609 -25.58724,-57.33333 -57.33333,-57.33333zM172,0c-31.74609,0 -57.33333,25.58724 -57.33333,57.33333v50.16667h-21.5l28.66667,40.08854l28.66667,-40.08854h-21.5v-50.16667c0,-24.15951 18.84049,-43 43,-43zM0,71.66667v100.33333h172v-100.33333h-28.66667v14.33333h14.33333v71.66667h-143.33333v-71.66667h14.33333v-14.33333z"></path></g></g></svg>  
                                                </div>
                                            </a>
                                                <div class="circle-tile-content dark-blue">
                                                 <div class="circle-tile-description text-faded">
                                                 News Feed
                                                </div>   
                                                <div class="circle-tile-number text-faded">
                                                    265
                                                    <span id="sparklineA"></span>
                                                </div>
                                                
                                    </div>
                                </div>  
                            </div>
                                </div>
							</div>
					 	</div> 
               		 </div>
         		 </div>
        </div>
      </div>
           
           
    
        <div class="userccount">
          <div id="vsphoto" class="tab-pane fade in">
            <h5>My Dashboard</h5>   
            
            	<div class="row">
              		<div class="col-md-12">
                		<div class="container">
							<div class="row">
                                <div class="col-md-12">
                                     <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading dark-blue">
                                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                                </div>
                                            </a>
                                                <div class="circle-tile-content dark-blue">
                                                 <div class="circle-tile-description text-faded">
                                                 <a href="<?php echo base_url(); ?>seeker/my-saved-jobs">">Saved Jobs</a> 
                                                </div>
                                                <div class="circle-tile-number text-faded">
                                                    265
                                                    <span id="sparklineA"></span>
                                                </div>
                                                
                                    </div>
                                </div>  
                            </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading dark-blue">
                                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                                </div>     
                                            </a>
                                                <div class="circle-tile-content dark-blue">
                                                 <div class="circle-tile-description text-faded">
                                                 Job Alert
                                                </div>    
                                                <div class="circle-tile-number text-faded">
                                                    265
                                                    <span id="sparklineA"></span>
                                                </div>
                                                
                                    </div>
                                </div>  
                            </div>   	
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading dark-blue">
                                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                                </div>
                                            </a>
                                                <div class="circle-tile-content dark-blue">
                                                 <div class="circle-tile-description text-faded">
                                                 Profile Views
                                                </div>
                                                <div class="circle-tile-number text-faded">
                                                    265
                                                    <span id="sparklineA"></span>
                                                </div>
                                                
                                    </div>
                                </div>  
                            </div>   
                                      
                                </div>
                               
							</div>
					 	</div> 
               	 </div>
          </div>
        </div>
      </div>
         
           
           
     
        <div class="userccount">
          <div id="vsphoto" class="tab-pane fade in">
            <h5>My Dashboard</h5>   
            
            	<div class="row">
              		<div class="col-md-12">
                		<div class="container">
							<div class="row">
                                <div class="col-md-12">
                                     <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading dark-blue">
                                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                                </div>
                                            </a>
                                                <div class="circle-tile-content dark-blue">
                                                 <div class="circle-tile-description text-faded">
                                                 Saved Jobs
                                                </div>
                                                <div class="circle-tile-number text-faded">
                                                    265
                                                    <span id="sparklineA"></span>
                                                </div>
                                                
                                    </div>
                                </div>  
                            </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading dark-blue">
                                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                                </div>     
                                            </a>
                                                <div class="circle-tile-content dark-blue">
                                                 <div class="circle-tile-description text-faded">
                                                 Job Alert
                                                </div>    
                                                <div class="circle-tile-number text-faded">
                                                    265
                                                    <span id="sparklineA"></span>
                                                </div>
                                                
                                    </div>
                                </div>  
                            </div>   	
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading dark-blue">
                                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                                </div>
                                            </a>
                                                <div class="circle-tile-content dark-blue">
                                                 <div class="circle-tile-description text-faded">
                                                 Profile Views
                                                </div>
                                                <div class="circle-tile-number text-faded">
                                                    265
                                                    <span id="sparklineA"></span>
                                                </div>
                                                
                                    </div>
                                </div>  
                            </div>   
                                      
                                </div>
                                <div class="col-md-12">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="circle-tile">
                                            <a href="#">
                                                <div class="circle-tile-heading dark-blue">
                                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                                </div>
                                            </a>
                                                <div class="circle-tile-content dark-blue">
                                                 <div class="circle-tile-description text-faded">
                                                 Courses Completed
                                                </div>
                                                <div class="circle-tile-number text-faded">
                                                    265
                                                    <span id="sparklineA"></span>
                                                </div>
                                                
                                    </div>
                                </div>  
                            </div>
                                    
                                    
                                </div>
							</div>
					 </div> 
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




<a href="https://icons8.com/icon/59875/save">/a>
<?php $this->load->view("fontend/layout/footer.php"); ?>
 