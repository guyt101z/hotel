/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
    // Define changes to default configuration here. For example:
    config.language = 'en';
    //config.startupMode = 'source'; 
    // config.uiColor = '#AADC6E';
    //config.contentsCss = '/medias/css/fonts.css';
    //config.font_names = 'HelveticaNeueBold; HelveticaNeue; HelveticaNeueLight;'+ config.font_names;
    //config.fontSize_sizes = '15/15px;' + '25/25px;' + config.fontSize_sizes  ;
    
    //config.toolbar = 'Full';   config.toolbar_Full = [ { name: 'document', items : ['Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] }, {name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] }, { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] }, { name: 'forms', items : [ 'Form', 'Checkbox', 'Radio','TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] }, '/', {name: 'basicstyles', items : ['Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv', '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl'] }, { name: 'links', items : [ 'Link','Unlink','Anchor' ] }, { name: 'insert', items: ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ]}, '/', { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] }, { name:'colors', items : [ 'TextColor','BGColor' ] }, { name: 'tools', items : [ 'Maximize','ShowBlocks','-','About' ] } ];   config.toolbar_Basic = [ ['Bold', 'Italic', '-','NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','About'] ];

    config.toolbar = 'MyToolbar';  
    config.toolbar_MyToolbar = [ 
        { name: 'document', items : ['Source','NewPage','Preview' ] }, 
        { name: 'basicstyles', items : ['Bold','Italic','Strike','-','RemoveFormat' ] }, 
        { name: 'clipboard', items : ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] }, 
        { name:'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] }, 
        '/', 
        { name:'styles', items : [ 'Styles','Format' ] }, 
        { name: 'paragraph', items : ['NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] }, 
        { name:'insert', items :['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak' ,'Iframe'] }, 
        { name: 'links', items : [ 'Link','Unlink','Anchor' ] }, 
        { name: 'tools', items :[ 'Maximize','-','About' ] } ];
};


