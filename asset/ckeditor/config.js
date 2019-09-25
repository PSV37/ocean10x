/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
        
        config.toolbar = 'MyToolbar';

        config.toolbar_MyToolbar =
        [
            ['Source','Templates','Maximize'],
            ['Cut','Copy','Paste','SpellChecker','-','Scayt'],
            ['Undo','Redo','-','Find','Replace'],
            ['Image','Table','HorizontalRule','SpecialChar','PageBreak'],
            '/',
            ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],      
            ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','SelectAll','RemoveFormat'],
            ['Link','Unlink','Anchor'],
            ['Styles','Format','Font','FontSize'],
            ['TextColor','BGColor']
        ];
        
        config.filebrowserBrowseUrl = base_url+'asset/ckfinder/filebrowser.php';
        config.filebrowserImageBrowseUrl = base_url+'asset/ckfinder/filebrowser.php?type=Images';
        config.filebrowserFlashBrowseUrl = 'asset/ckfinder/filebrowser.php?type=Flash';
        config.filebrowserUploadUrl = base_url+'asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
        config.filebrowserImageUploadUrl = base_url+'asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
        config.filebrowserFlashUploadUrl = base_url+'asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
        
};
