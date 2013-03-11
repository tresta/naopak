var baseURL = 'http://naopak.com.pl/wp-content/themes/twentyeleven';
var fileContor = 0;
var swfu;
queue		= new Array();
loadedFiles = new Array();

function swfUploadLoaded(){
     swfu = this;
     this.debug(swfu);
}

function fileQueued(file){
	try {
		if (fileContor == 0) {
			//Append the item to the html queue list
			$.fn.pureJSTemplate.setDelimiters("#?", "?#");
			$("#"+swfu.customSettings.queueContainer).pureJSTemplate({	id:swfu.customSettings.fileTemplateId, 
																		data:{	id:file.id,
																				name : file.name, 
																				type : file.type, 
																				size : Math.round(file.size/1024)+'kb', 
																				message:'',
																				cache:false,
																				status:'<a href="javascript:;" onClick="fileQueueCancel(\''+file.id+'\');">remove</a>'
																				}
																		});
			//Put the file in the customSettings.queue container
			swfu.customSettings.queue[file.id] = file;//{name:file.name,size:file.size,type:file.type};
			//fileContor++;
		}
		else{
			alert("Too many files! Limit is 1.");
			swfu.cancelUpload(file.id);
		}
	}
	catch (ex){
		this.debug(ex);
	}
}

function fileQueueError(file, errorCode, message){
	try{
		//if(errorCode === SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED || fileContor >= 1){
		if(fileContor >= 1){
			alert("Too many files. The limit is " + swfu.settings.file_queue_limit + ".");
			return;
		}
		switch (errorCode) {
		case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
			alert("The file " + file.name + " having size "+Math.round(file.size/1024/1024)+" MB is greater than " + swfu.settings.file_size_limit);
			break;
		case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
			this.debug("Error Code: Zero byte file, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			break;
		case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
			//progress.setStatus("Invalid File Type.");
			this.debug("Error Code: Invalid File Type, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			break;
		default:
			alert("Error Code: " + errorCode + ", File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			break;
		}
	} catch (ex) {
        this.debug(ex);
    }
}
//Cancel one file from the queue
function fileQueueCancel(fileid){
	$("#"+fileid).remove();
	$("#thumbnails").empty();
	
	//pt remove la chenar- ul de select
	//removeSelectArea();
	$(".imgareaselect-outer").remove();
	$(".imgareaselect-selection").remove();
	for(var i=1; i<=4; i++)
		$(".imgareaselect-border" + i).remove();
	$(".imgareaselect-handle").remove();
	
	fileContor--;
	
	swfu.cancelUpload(fileid);
	delete swfu.customSettings.queue[fileid];
}

//File browse finished. settings applied to the entire queue
function fileDialogComplete(numFilesSelected, numFilesQueued) {
	try {
		//if (numFilesQueued > 0) {
		if (fileContor == 0) {
			this.startUpload();
		}
	} catch (ex)  {
        this.debug(ex);
	}
}
//Starting upload for a file
function uploadStart(file) {
	try {
		if(fileContor == 0){
			$(":input","#"+file.id+" > .details").each(function(){
	        	if (this.name){
	        		swfu.addFileParam(file.id, this.name, this.value);
	        	}
	      	});
	      	$("#"+file.id).addClass("uploadLoading");
	      	$("#"+file.id+" > .items > #message").html("<img id='progress_"+file.id+"' width='0%' alt='0%' src='images/upload/pix.gif'/>");
	    }
	}
	catch (ex) {
		this.debug(ex);
	}
	return true;
}

function uploadProgress(file, bytesLoaded, bytesTotal) {
	try {
		var percent = Math.ceil((bytesLoaded / bytesTotal) * 100);
		var strPercent = percent+'%';
		$("#progress_"+file.id).css('width',strPercent);
		$("#progress_"+file.id).attr('alt',strPercent);
	} catch (ex) {
		this.debug(ex);
	}
}

var fileName;

function uploadSuccess(file, serverData) {
    try {
		if(fileContor == 0){
			this.debug('serverData:'+serverData);
			serverDataJSON = JSON.parse(serverData);
			
			if(typeof(serverDataJSON.message) != 'undefined' && typeof(serverDataJSON.message_info) != 'undefined'  && serverDataJSON.message_type == 'error'){
				//erori
				$("#"+file.id+" > .items > #message").html(serverDataJSON.message);
				$("#"+file.id).removeClass('uploadLoading');
				$("#"+file.id+" > .items > .status ").html('eroare');
				$("#"+file.id+" > .items > .status ").removeClass('wait');
				$("#"+file.id+" > .items > .status ").addClass('error');
				swfu.customSettings.uploadSessionError = true;
			}
			else{
				//pt preview
				jsLargeImageName = serverDataJSON.file_name;
				addImage(baseURL + "/upload_images/" + serverDataJSON.file_name);
				alert(baseURL);
				fileName = serverDataJSON.file_name;
				//pt CROP
				jsCurrentLargeImageWidth = serverDataJSON.file_width;
				jsCurrentLargeImageHeight= serverDataJSON.file_height;
			}
		}
	}
	catch (ex) {
		$("#"+file.id+" > .items > #message").html('Error while trying yo comunicate with the server!');
		$("#"+file.id).removeClass('uploadLoading');
		$("#"+file.id+" > .items > .status ").html('eroare');
		$("#"+file.id+" > .items > .status ").removeClass('wait');
		$("#"+file.id+" > .items > .status ").addClass('error');
		swfu.customSettings.uploadSessionError = true;
		this.debug(ex);
		if (this.getStats().files_queued > 0) 
         {
           this.startUpload();
         }
	}
}

function uploadError(file, errorCode, message) {
	try {
		switch (errorCode) {
		case SWFUpload.UPLOAD_ERROR.HTTP_ERROR:
			//this.debug("Error Code: HTTP Error, File name: " + file.name + ", Message: " + message);
			$("#"+file.id+" > .items > #message").html("Error - server down. Try again later. Message:"+message);
			break;
		case SWFUpload.UPLOAD_ERROR.UPLOAD_FAILED:
			$("#"+file.id+"> .items > #message").html("Error Code: Upload Failed, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			break;
		case SWFUpload.UPLOAD_ERROR.IO_ERROR:
			//this.debug("Error Code: IO Error, File name: " + file.name + ", Message: " + message);
			$("#"+file.id+"> .items > #message").html("Error code: IO error, message: "+message);
			break;
		case SWFUpload.UPLOAD_ERROR.SECURITY_ERROR:
			//this.debug("Error Code: Security Error, File name: " + file.name + ", Message: " + message);
			$("#"+file.id+"> .items > #message").html("Error code: Security error, message: "+message);
			break;
		case SWFUpload.UPLOAD_ERROR.UPLOAD_LIMIT_EXCEEDED:
			//this.debug("Error Code: Upload Limit Exceeded, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			$("#"+file.id+"> .items > #message").html("Upload limit exceded");
			break;
		case SWFUpload.UPLOAD_ERROR.FILE_VALIDATION_FAILED:
			//this.debug("Error Code: File Validation Failed, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			$("#"+file.id+"> .items > #message").html("Error code: File validation failed");
			break;
		case SWFUpload.UPLOAD_ERROR.FILE_CANCELLED:
			if (this.getStats().files_queued === 0) {
				$("#"+file.id+"> .items > #status").html();
			}
			break;
		case SWFUpload.UPLOAD_ERROR.UPLOAD_STOPPED:
			break;
		default:
			this.debug("Error Code: " + errorCode + ", File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			break;
		}
		if (errorCode!=SWFUpload.UPLOAD_ERROR.FILE_CANCELLED){
			$("#"+file.id).removeClass('uploadLoading');
			$("#"+file.id+" > .items > .status ").html('eroare');
			$("#"+file.id+" > .items > .status ").removeClass('wait');
			$("#"+file.id+" > .items > .status ").addClass('error');
			swfu.customSettings.uploadSessionError = true;
		}
	} catch (ex) {
        this.debug(ex);
    }
}

function uploadComplete(file){
	try {
		//if (this.getStats().files_queued > 0) {
		if (fileContor == 0) {
			this.startUpload();
			fileContor = 1;
		}
	} catch (ex) {
		this.debug(ex);
	}
}

function save_upload(){
	var uploadError = 0;
	stats 			= swfu.getStats();
	
	var cropDataString = '';
	cropDataString += '&x1=' + $('#x1').val();
	cropDataString += '&y1=' + $('#y1').val();
	cropDataString += '&x2=' + $('#x2').val();
	cropDataString += '&y2=' + $('#y2').val();
	cropDataString += '&w=' + $('#w').val();
	cropDataString += '&h=' + $('#h').val();
	
	if(fileContor == 1){
		$.ajax({
            type: "post",
			url: baseURL + "/functionsimg.php?save_upload",
			data: "file_name=" + fileName + cropDataString,
			cache: false,
			success: function(msg){
				msgJSON = JSON.parse(msg);
				if(msgJSON && typeof(msgJSON.response) != 'undefined' && msgJSON.response != 'ok'){
					if(msgJSON.response == 'error'){
						alert("The file type is not within the allowed ones!");
					}
					else if(msgJSON.response == 'error_save'){
						alert("Image could not be saved!");
					}
					else if(msgJSON.response == 'error_dates'){
						alert("2 - No file added!");
					}
					
					if(stats.files_queued==0 && fileContor == 0){
						uploadError=3;
					}
					
					if(uploadError==3){
						alert('3 - No file added!');
					}
				}
				else if(msgJSON && typeof(msgJSON.response) != 'undefined' && msgJSON.response == 'ok'){
                    //here comes your code
					location.href = baseURL + "/upload_images/" + msgJSON.file_name;
				}
				fileContor--;
			}
		});
	}
	else{
		alert("1 - No file added!");
	}
}

var jsUploadPath 	= baseURL + '/upload_images/';
var jsLargeImageName= fileName;

function showPreview(img, selection){
	if (!selection.width || !selection.height)
        return;
    
	var scaleX = jsThumbWidth/selection.width; 
	var scaleY = jsThumbHeight/selection.height; 
	//alert(jsCurrentLargeImageWidth + ' - ' + scaleY);
	$('#thumbnail + div > img').css({ 
		width: Math.round(scaleX * jsCurrentLargeImageWidth) + 'px', 
		height: Math.round(scaleY * jsCurrentLargeImageHeight) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	
	varX1= selection.x1;
	varY1= selection.y1;
	varX2= selection.x2;
	varY2= selection.y2;
	varW = selection.width;
	varH = selection.height;
	
	$('#x1').val(varX1);
	$('#y1').val(varY1);
	$('#x2').val(varX2);
	$('#y2').val(varY2);
	$('#w').val(varW);
	$('#h').val(varH);
}

function addImage(src) {
	var newImg = document.createElement("img");
	
	newImg.style.margin = "5px";
	newImg.id 			= "thumbnail";

	document.getElementById("thumbnails").appendChild(newImg);
	if (newImg.filters) {
		try {
			newImg.filters.item("DXImageTransform.Microsoft.Alpha").opacity = 0;
		} catch (e) {
			// If it is not set initially, the browser will throw an error.  This will set it if it is not set yet.
			newImg.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(opacity=' + 0 + ')';
		}
	} else {
		newImg.style.opacity = 0;
	}

	newImg.onload = function () {
		fadeIn(newImg, 0);
	};
	newImg.src = src;
	
	//pt CROP
	$('#dialog #thumbnail', parent.document).imgAreaSelect({aspectRatio: '1:1', 
															handles: true,
		        											fadeSpeed: '200',
															onSelectChange: showPreview});
	var htmlForCrop = '';
	htmlForCrop += '<div style="float:left; margin: 5px; position:relative; overflow:hidden; width: ' + jsThumbWidth + 'px; height: ' + jsThumbHeight + 'px;">';
	htmlForCrop += '<img src="' + jsUploadPath + jsLargeImageName + '" style="position: relative;" alt="Avatar preview" />';
	htmlForCrop += '</div>';
	htmlForCrop += '<br style="clear:both;"/>';
	htmlForCrop += '<form name="thumbnail" action="' + baseURL + '" method="post">';
	htmlForCrop += '<input type="hidden" name="x1" value="" id="x1" />';
	htmlForCrop += '<input type="hidden" name="y1" value="" id="y1" />';
	htmlForCrop += '<input type="hidden" name="x2" value="" id="x2" />';
	htmlForCrop += '<input type="hidden" name="y2" value="" id="y2" />';
	htmlForCrop += '<input type="hidden" name="w" value="" id="w" />';
	htmlForCrop += '<input type="hidden" name="h" value="" id="h" />';
	htmlForCrop += '</form>';
	//alert(htmlForCrop);
	$("#thumbnails").append(htmlForCrop);
	
	$("#uploadQueueContainer .items .status").addClass('error');
	$("#"+swfu.customSettings.queueContainer+" li").removeClass('last');
	$("#"+swfu.customSettings.queueContainer+" li:last").addClass('last');
}

function fadeIn(element, opacity) {
	var reduceOpacityBy = 5;
	var rate = 30;	// 15 fps


	if (opacity < 100) {
		opacity += reduceOpacityBy;
		if (opacity > 100) {
			opacity = 100;
		}

		if (element.filters) {
			try {
				element.filters.item("DXImageTransform.Microsoft.Alpha").opacity = opacity;
			} catch (e) {
				// If it is not set initially, the browser will throw an error.  This will set it if it is not set yet.
				element.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(opacity=' + opacity + ')';
			}
		} else {
			element.style.opacity = opacity / 100;
		}
	}

	if (opacity < 100) {
		setTimeout(function () {
			fadeIn(element, opacity);
		}, rate);
	}
}