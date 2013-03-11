function upload_image(){
    $("#dialog").css("display", "block");
    $('#dialog #thumbnail').imgAreaSelect({show: true,
                                            x1: varX1, 
                                            y1: varY1,
                                            x2: varX2,
                                            y2: varY2,
                                            onSelectChange: showPreview});

    return false;
}

function removeSelectArea(){
	$('#thumbnail').imgAreaSelect({remove: true});
}