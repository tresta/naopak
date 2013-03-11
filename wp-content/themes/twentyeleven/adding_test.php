<?php
/**
 * @package asd
 *
 * @author: Wery
 * @url: http://www.customweb.com

 Template Name: User Account - add test
 */
 
 error_reporting (E_ALL ^ E_NOTICE);

 ?>


<?

define("BASE_URL", "http://naopak.com.pl");

	
function add_scripts()
{
echo '<style>

	
</style>';

echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/jquery-1.3.2.js"></script>
	
<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/functions.js"></script>
	
<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/upload/jquery.imgareaselect.js">
	</script><!-- for jQuery cropping-->
	
<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/upload/purejstemplate_jquery.js">
	</script> <!-- for loading display-->
	
<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/upload/swfupload.js">
	</script><!-- for SWF upload-->
	
<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/upload/swfupload.handlers.js">
	</script><!-- for SWF upload-->
	
<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_url').'/css/main.css" />
	
<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_url').'/css/upload/imgareaselect-default.css" />
	<!-- for jQuery cropping-->
	
<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_url').'/css/upload/swfupload.css" /><!-- for SWF upload-->';

	
		echo '
	<script language="javascript">
	
	    var baseURL = "'.get_bloginfo('template_url').'";
 
        var jsThumbWidth = "100"; 	//this is the thumb width after 
				//cropping the original image using jQuery
        var jsThumbHeight= "100"; 	//this is the thumb height after 
				//cropping the original image using jQuery
        var jsCurrentLargeImageWidth;
        var jsCurrentLargeImageHeight;
 
        var varX1= 0;
        var varY1= 0;
        var varX2= 0;
        var varY2= 0;
        var varW = 0;
        var varH = 0;
		
	var swfu;
        window.onload = function() {
            var settings = {
                flash_url : baseURL + "/media/swfupload.swf",
                upload_url: baseURL + "/functionsimg.php?upload_user_image",
                //post_params: {},
                file_size_limit : "1 MB",
                //debug: true,
                prevent_swf_caching: true,
                file_types : "*.jpg; *.jpeg; *.gif; *.png",
                file_types_description: "Multimedia files",
                //file_upload_limit : 1,
                //file_queue_limit : 1,
                file_post_name : \'uploaded_image\',
                custom_settings : {
                    messageTargetId : "message",
                    cancelButtonId : "btnCancel",
                    fileTemplateId : "tplFileQueue",
                    //Good
                    queueContainer : "uploadQueueContainer",
                    queue : {},
                        uploadSessionError : false
                },
                // Button settings
                button_width: "61",
                button_height: "22",
                button_placeholder_id: "spanButtonPlaceHolder",
                button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
                button_cursor: SWFUpload.CURSOR.HAND,
                // The event handler functions are defined in handlers.js
                swfupload_loaded_handler : swfUploadLoaded,
                file_queued_handler : fileQueued,
                file_queue_error_handler : fileQueueError,
                file_dialog_complete_handler : fileDialogComplete,
                upload_start_handler : uploadStart,
                upload_progress_handler : uploadProgress,
                upload_error_handler : uploadError,
                upload_success_handler : uploadSuccess,
                upload_complete_handler : uploadComplete
                //queue_complete_handler : queueComplete	// Queue plugin event
            };
            swfu = new SWFUpload(settings);
        };
		
		
	jQuery(document).ready(function(){

	});
	</script>
	';
}
add_action('wp_head', 'add_scripts');
?>

<? get_header();

 ?>
    <h2>SWF image upload & crop for php using jQuery</h2>
    <a id="open_dialog" onclick="upload_image(); return false;" href="javascript:;" title="Upload image">Upload image</a>
    <div id="dialog" style="display:none;" title="Upload image">
        <div id="tplFileQueue" style="display:none;">
            <li id="#?=data.id?#" class="uploadOpen fileQueueItem">
                <div class="items">
                    <strong>#?=data.name?#</strong>
                    <b>#?=data.size?#</b>
                    <b>#?=data.type?#</b>
                    <em id="message">#?=data.message?#</em>
                    <span class="status" >#?=data.status?#</span>
                </div>
            </li>
        </div>
        <div class="pageUpload" id="content">
            <form action="#" id="uploadForm">
                <div class="boxGray">
                    <div class="boxGrayMargin">
                        <div id="spanButtonPlaceHolder"></div>
                        <input id="btnUpload" type="button" value="Browse..." style="width: 61px; height: 22px; font-size: 8pt;"/>
                        <p>Allowed image size: 1 MB. </p>
                        <p>Allowed extensions: *.jpg; *.jpeg; *.gif; *.png.</p>		
                    </div>
                </div>
                <div id="divLoadingContent"  style="background-color: #FFFF66; border-top: solid 4px #FF9966; border-bottom: solid 4px #FF9966; margin: 10px 25px; padding: 10px 15px; display: none;">SWFUpload is loading. Please wait...</div>
                <div id="divLongLoading"  style="background-color: #FFFF66; border-top: solid 4px #FF9966; border-bottom: solid 4px #FF9966; margin: 10px 25px; padding: 10px 15px; display: none;">SWFUpload loading failed. Please check to see if you have Flash activated and a valid version of Flash Player.</div>
                <div id="divAlternateContent" style="background-color: #FFFF66; border-top: solid 4px #FF9966; border-bottom: solid 4px #FF9966; margin: 10px 25px; padding: 10px 15px; display: none;">
                    Sorry. SWFUpload loading failed.  You must install or upgrade your Flash Player.
                    Please visit <a href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash">Adobe website</a> to download Flash Player.
                </div>
                <ul id="uploadQueueContainer" class="upload"></ul>
                <div class="boxGraySimple" id="footerStatus"><div class="boxGraySimpleTop"><div>&nbsp;</div></div><div class="boxGraySimpleMargin">
                    <div class="message"></div>
                    <div class="submit">
                        <p><span class="btn"><a href="javascript:;" onclick="save_upload();return false;" id="add_file">SAVE</a></span></p>
                    </div>
                </div><div class="boxGraySimpleBottom"><div>&nbsp;</div></div></div>
            </form>
            <div id="thumbnails"></div>
        </div>
    </div>

<?php  get_footer(); ?>