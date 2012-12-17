/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.contentsCss = '/medias/css/fonts.css';
    config.font_names = 'HelveticaNeueBold; HelveticaNeue; HelveticaNeueLight;'+ config.font_names;
    config.fontSize_sizes = '15/15px;' + '25/25px;' + config.fontSize_sizes  ;
    
};
