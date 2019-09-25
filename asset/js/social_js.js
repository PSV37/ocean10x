

function delete_social(id){
	var myurl = baseUrl+'admin/social_media/delete_social/'+id;
	var is_confirm = confirm("Are you sure you want to delete this post?");
	if(is_confirm){
            $.get(myurl, function (sts) {
                if(sts=='done')
                    $("#row_"+id).fadeOut();
		 else
                    alert('OOps! Something went wrong.');
            });
	}
}



function social_show() {
document.getElementById('social').style.display = "block";
}
//Function to Hide Popup
function social_hide(){
document.getElementById('socail').style.display = "none";
}
function social_hide_edit(){
document.getElementById('edit_social').style.display = "none";
}
function load_social_edit_form(id){
        
	$.getJSON(baseUrl+'admin/social_media/get_social_by_id/'+id, function(data) {
                $('#edit_title').val(data.title);
                $('#edit_class').val(data.class);
                $('#edit_link').val(data.link);
               
              
                $('#social_id').val(data.ID);
               document.getElementById('edit_social').style.display = "block";
        });	
}


//=======end blog post Module=======


