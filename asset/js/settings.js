
window.onload=function(){
    $.getJSON(baseUrl+'admin/settings/get_logo_by_id/', function(data) {        
                if (data.filename == null || data.filename=='' || data.filename==0){
                    //  $("#featured-no-images").fadeIn();
                      $("#logo_apend").fadeOut();
                }else{
                    $("#logo_apend").fadeIn();
                    var img = '<div class="featured-images-main" id="logo_img_'+data.id+'"><img style="width:150px" src="'+baseUrl+'files/'+data.filename+'"></div>';
                $('#logo_apend').html('');                
                $('#logo_apend').append(img);
                    
                }
                $('#email').val(data.email);
                $('#address').val(data.address);
                $('#phone').val(data.phone);
                $('#meta_title').val(data.meta_title);
                $('#meta_keywords').val(data.meta_keywords);
                $('#meta_description').val(data.meta_description);
                
        });
    
}
//window.onload=function(){
//    $.getJSON(baseUrl+'admin/settings/get_email_by_id/', function(data) {
////        console.log(data);
//           $('#email').val(data.email);
//        });
//    
//}

