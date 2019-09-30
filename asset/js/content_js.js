

function delete_post(id){
	var myurl = baseUrl+'admin/manage_content/delete_post/'+id;
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



function div_show() {
document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}
function div_hide_edit(){
document.getElementById('edit_abc').style.display = "none";
}
function load_content_edit_form(id){
//        var my_editor_id = 'edit_content_ck';
//        console.log(CKEDITOR.instances);
//        CKEDITOR.instances.my_editor_id.setData("");
//        CKEDITOR.instances.my_editor_id.focus();
	$.getJSON(baseUrl+'admin/manage_content/get_post_by_id/'+id, function(data) {
                $('#edit_heading').val(data.heading);
                $('#edit_slug').val(data.slug);
                $('#edit_meta_title_cms').val(data.meta_title);
                $('#edit_meta_keywords_cms').val(data.meta_keywords);
                $('#edit_meta_description_cms').val(data.meta_description);
               // $('#edit_content_ck').val(data.description);
 
                CKEDITOR.instances['edit_content_ck'].setData(data.description);
              
                $('#cms_id').val(data.ID);
               document.getElementById('edit_abc').style.display = "block";
        });	
}


//=======end blog post Module=======


