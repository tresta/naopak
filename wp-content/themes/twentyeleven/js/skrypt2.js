$(document).ready(function(){	

var triggers = $(".modalInput").overlay({
	mask: {
		color: '#ebecff',
		loadSpeed: 200,
		opacity: 0.9
	},
	closeOnClick: false	
});

$("#dodaj_nowy_img_btn").live('click', function(){//click(function(e) {
	var img_nr = $("#img_list li").size();
	if(img_nr < 7)
	{
		$(".croping_tool").hide();
		$(".uploading_form").show();
		$(".error_img_msg").hide();		
	}
	else
	{
		$(".error_img_msg").show();
		$("#close_overlay_btn").show();
		$(".error_img_msg h3").replaceWith('<h3 style="color:red;">Dodales maksymalna liczbe zdjec. Zeby dodac inne zdjecie musisz najpierw usunac jedno ze zdjec.</h3>');
		
		$(".croping_tool").hide();
		$(".uploading_form").hide();
	}
});

$('#save_thumb').click(function(){
$('#thumbnail').imgAreaSelect({ remove: true });
});

$('.btn_up').live('click', function(){
	var nr = $(this).attr('id');
	
	if(nr!=0)
	{
	var alt_prev = 0;//$(this).next().attr("id");
	var alt_current = parseInt($(this).attr("id"));
	var prod_id = $('#prod_id').val();
	alt_prev = alt_current - 1;
	
	//alert("alt_next= "+alt_prev+"  alt_current= "+alt_current+"  id= "+prod_id);
	
	element1 = $("ul#img_list li:eq("+alt_current+")");
	element2 = element1.prev();
	element2.insertAfter(element1);
	
	element1.attr({ alt: alt_prev });
	element2.attr({ alt: alt_current });
	
	element1.find(".btn_up").attr("id",alt_prev);
	element2.find(".btn_up").attr("id",alt_current);
	
	element1.find(".btn_delete").attr("id",alt_prev);
	element2.find(".btn_delete").attr("id",alt_current);
	
	element1.find(".btn_down").attr("id",alt_prev);
	element2.find(".btn_down").attr("id",alt_current);
	
	
		  $("#loading")
         .ajaxStart(function(){
             $(this).show();
         })
         .ajaxComplete(function(){
             $(this).hide();			
         });
          
          $.ajax({
              type: 'POST',	
              secureuri:false,
              url:'http://naopak.com.pl/wp-content/themes/twentyeleven/rename.php',
              data: { 
			  			id: prod_id, 
						z: alt_current, 
						na: alt_prev, 
					},
              cache: false,
              success: function(data)
              { 	
					
              },
			  error: function(xhr, thrownError)
			  {
				
				alert(xhr.statusText);
				alert('error: ' +  thrownError);	
			  }
         });
	}
});



$('.btn_delete').live('click', function(){
	
	var nr = $(this).attr('id');
	var prod_id = $('#prod_id').val();
	//var folder ="../../../img/products/"+prod_id+"/";
 
	$.ajax({
    	type: 'POST',
        url: 'http://naopak.com.pl/wp-content/themes/twentyeleven/delete_file.php',
		data: { 
				file_number: nr, 
				//path: folder,
				file_id: prod_id 
			  },
        cache: false,
        success: function(data)
        { 		
			$('ul#img_list li:eq('+nr+')').remove();				

			var img_src = 'http://naopak.com.pl/img/products/'+prod_id;
			var last_li_alt = parseInt($('ul#img_list li:last').attr('alt'));
			var cachekiller = Math.floor(Math.random()*1001);
			
			var i=parseInt(nr);
			var x=0;
			for(i; i<last_li_alt ;i++)	
			{		
				x=i+1;
				$('ul#img_list li[alt="'+x+'"]').attr({ alt: i });	
				//$('ul#img_list li[alt="'+x+'"]').find('img').attr({ src: '' });	
				$('ul#img_list li[alt="'+x+'"]').find('img').attr({ src: img_src+'/id_prod_small_'+i+'_'+prod_id+'.jpg?'+cachekiller });	
							
				jQuery("ul#img_list li[alt=\""+i+"\"] input:button").attr("id",i);
				
				 //console.log("zamieniono= "+x+'  na= '+i);
			}				
			/*
			if($('#dodaj_nowy_img_btn').length == 0) // jak nie ma przycisku
			{
				var img_nr = $("#img_list li").size();
				if(img_nr < 7)
				{
					$('#img_list').before('<button id="dodaj_nowy_img_btn" class="modalInput" rel="#add_img">Dodaj</button>');
				}
				else
				{
					$('#dodaj_nowy_img_btn').remove();
				}
			}	*/			
		},
		error: function (data, status, e)
		{
		}
	});
});


//************************************************************************************************
$('.btn_down').live('click', function(){
	var nr = $(this).attr('id');
	var last_nr = $("ul#img_list li:last").attr("alt");
	var prod_id = $('#prod_id').val();
	//alert("nr= "+nr + "  last nr= " + last_nr);
	
	if(nr!=last_nr){
	
	var alt_next = 0;//$(this).next().attr("id");
	var alt_current = parseInt($(this).attr("id"));
	var prod_id = $('#prod_id').val();
	alt_next = alt_current + 1;
	
	//alert("alt_next= "+alt_next+"  alt_current= "+alt_current+"   prod id= "+prod_id);
	
	element1 = $("ul#img_list li:eq("+alt_current+")");
	element2 = element1.next();
	element2.insertBefore(element1);

	element1.attr({ alt: alt_next });
	element2.attr({ alt: alt_current });
	
	element1.find(".btn_up").attr("id",alt_next);
	element2.find(".btn_up").attr("id",alt_current);
	
	element1.find(".btn_delete").attr("id",alt_next);
	element2.find(".btn_delete").attr("id",alt_current);
	
	element1.find(".btn_down").attr("id",alt_next);
	element2.find(".btn_down").attr("id",alt_current);
	
	
	   $("#loading")
	   .ajaxStart(function(){
		   $(this).show();
	   })
	   .ajaxComplete(function(){
		   $(this).hide();			
	   });
		
		$.ajax({
			type: 'POST',	
			secureuri:false,
			url:'http://naopak.com.pl/wp-content/themes/twentyeleven/rename.php',
			data: { 
					  id: prod_id, 
					  z: alt_current, 
					  na: alt_next
				  },
			cache: false,
			success: function(data)
			{ 						
			},
			error: function(xhr, thrownError)
			{
			  
			  alert(xhr.statusText);
			  alert('error: ' +  thrownError);	
			}
	   });				 
	}	
});
//***********************************************************************************************

	$('a#single_image').fancybox(); 

    $('a#single_image').live('mouseover', function(){ 
							$(this).fancybox() 							
							});

	$(".image").click(function() {
		var image_L = $(this).attr("rel2");
		var image_T = $(this).attr("rel");
		
		$('#image').hide();
		$('#image').fadeIn('slow');
		$('#image').html('<a id="single_image" href="' + image_L + '"><img src="' + image_T + '"/></a>');
    });		

	//ACCORDION BUTTON ACTION (ON CLICK DO THE FOLLOWING)
		
	$('.accordionButton').click(function() {

		//REMOVE THE ON CLASS FROM ALL BUTTONS
		$('.accordionButton').removeClass('on');
		  
		//NO MATTER WHAT WE CLOSE ALL OPEN SLIDES
	 	$('.accordionContent').slideUp('normal');
   
		//IF THE NEXT SLIDE WASN'T OPEN THEN OPEN IT
		if($(this).next().is(':hidden') == true) {
			
			//ADD THE ON CLASS TO THE BUTTON
			$(this).addClass('on');
			  
			//OPEN THE SLIDE
			$(this).next().slideDown('normal');
		 } 
		  
	 });
	  
	
	/*** REMOVE IF MOUSEOVER IS NOT REQUIRED ***/
	
	//ADDS THE .OVER CLASS FROM THE STYLESHEET ON MOUSEOVER 
	$('.accordionButton').mouseover(function() {
		$(this).addClass('over');
		
	//ON MOUSEOUT REMOVE THE OVER CLASS
	}).mouseout(function() {
		$(this).removeClass('over');										
	});
	
	/*** END REMOVE IF MOUSEOVER IS NOT REQUIRED ***/
	
	
	/********************************************************************************************************************
	CLOSES ALL S ON PAGE LOAD
	********************************************************************************************************************/	
	$('.accordionContent').hide();
	$('.submenu_active').parent().show();	
	$('.submenu_active').parent().prev('.accordionButton').addClass('on');

}); // ******************************** END OF $(document).ready


	
function sortuj(element)
{
var mylist = element;
var listitems = mylist.children('li').get();
listitems.sort(function(a, b) {
   var compA = $(a).text().toUpperCase();
   var compB = $(b).text().toUpperCase();
   return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
})
$.each(listitems, function(idx, itm) { mylist.append(itm); });	
}

function preview(img, selection) {   	
	var width = img.clientWidth;
	var height = img.clientHeight;

	var scaleX = 150 / selection.width; 
	var scaleY = 150 / selection.height; 

	$('#thumbnail_preview').css({ 
		width: Math.round(scaleX * width) + 'px', 
		height: Math.round(scaleY * height) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	
	$('#x1').val(selection.x1);
	$('#y1').val(selection.y1);
	$('#x2').val(selection.x2);
	$('#y2').val(selection.y2);
	$('#w').val(selection.width);
	$('#h').val(selection.height);
} 

function ajaxFileUpload()
{		 
    //alert("ajaxFileUpload");
		 var img_nr = $("#img_list li").size();
         var id = $('#prod_id').val();                  
		 
		 if(img_nr>0)
		 {
			var index = 0;
			for(index;index<7;index++)
			{	
				var alt_nr = $('#img_list li[alt='+index+']').length;
				if(alt_nr == 0)
				{
					img_nr=index;
					break;
				}
			}
		 }

//alert('id= '+id+'  img_nr= '+img_nr);

         $("#loading")
         .ajaxStart(function(){
             $(this).show();
         })
         .ajaxComplete(function(){
             $(this).hide();			
         });

			alert('img_nr= '+img_nr+'  id='+id);
		
         $.ajaxFileUpload({
                 url:'http://naopak.com.pl/wp-content/themes/twentyeleven/doajaxfileupload.php', 
                 secureuri:false,
				 //type: 'POST',
                 fileElementId:'fileToUpload',
				 dataType: 'json',
				 data: { file_nr: img_nr, id_count:id },                
				 cache: false,
                 success: function (data, textStatus, XMLHttpRequest)
                 {/*
					 //alert(data.filesize);	
					 if(data.error == '')
						{
							$(".croping_tool").show();
							$(".uploading_form").hide();
							$(".error_img_msg").hide();
							
							
							//alert('FOLDER= '+data.folder+'   filename= '+data.filename);
							var cachekiller = Math.floor(Math.random()*1001);
							var currentimg = "http://naopak.com.pl/img/products/"+data.folder+"/"+data.filename+"?"+cachekiller;
							
							//alert(currentimg);
							$("#thumbnail").attr("src",currentimg);
							$("#thumbnail_preview").attr("src",currentimg);

							$('#thumbnail').imgAreaSelect({ 
								show: true,
								handles: true, 
								zIndex: 99995,
								parent: '#croping_tool',
								aspectRatio: '1:1', 
								onSelectChange: preview,
								onInit: preview,
								x1: 90, y1: 90, x2: 200, y2: 200,
								minWidth: 100,
								minHeight: 100,
								persistent:true,
								enable:true
							});	
							
							 //alert(data.error);	
						}
						else{ 
							 $(".error_img_msg").show();
							 $("#close_overlay_btn").hide();
							 
							 $(".error_img_msg h3").replaceWith('<h3 style="color:red;">Rozmiar pliku jest za duzy! Dozwolone rozmiar pliku to 1MB !  </h3>');
							}*/
							
							alert("SUCCES");
                 },
                 error: function (data, status, e)
                 {
					 $(".error_img_msg").show();
					 $("#close_overlay_btn").hide();
					 console.log(data.error);
 					 console.log(data.folder);
					 console.log(data.filename);
					 console.log(status);
					 console.log(e);
					
					

					 
					 
					 $(".error_img_msg h3").replaceWith('<h3 style="color:red;">Dozwolony typ pliku to .jpg !</h3>');					 
                 }
             });    

		     
         return false;
     } 

var tmp = 0;

function check_value()
{
	var x1 = $('#x1').val();
	var y1 = $('#y1').val();
	var ws = $('#w').val();
	var hs = $('#h').val();

	    if(x1=="" || y1=="" || ws=="" || hs=="")
		{  
			alert("You must make a selection first");  
			$('#thumbnail').imgAreaSelect( {hide: true} );
	    }
		else
		{
			$('#thumbnail').imgAreaSelect({ show: true });
			ajaxThumbnail();
						
		}
}


  function ajaxThumbnail()
  {
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var ws = $('#w').val();
		var hs = $('#h').val();

		 var prod_id = $('#prod_id').val();
		 var img_nr = $("#img_list li").size();

	//	alert('id= '+prod_id+' img nr= '+img_nr);

		 if(img_nr>0)
		 {
			var index = 0;
			for(index;index<7;index++)
			{	
				var alt_nr = $('#img_list li[alt='+index+']').length;
				if(alt_nr == 0)
				{
					img_nr=index;
					break;
				}
			}
		 }

		 var img = 'id_prod_normal_'+img_nr+'_'+prod_id+'.jpg';
		 var folder ="img/products/"+prod_id+"/";	
		 	
		 var image = $('#thumbnail'); 
		 var width = image.width();
		 var height = image.height();

       $("#loading")
         .ajaxStart(function(){
             $(this).show();
         })
         .ajaxComplete(function(){
             $(this).hide();			
         });
          
		 // alert('2 - id= '+prod_id+' img nr= '+img_nr);
          $.ajax({
              type: 'POST',
              url: 'http://naopak.com.pl/wp-content/themes/twentyeleven/ajaxthumbnail.php',
              dataType: 'json',
			  data: { 
			  			img_nr: img_nr,
			  			img_name: img, 
						img_folder: folder, 
						x1: x1, 
						y1: y1, 
						w: width, 
						h: height, 
						ws: ws, 
						hs: hs, 
						thumb_W:150,
						thumb_H:150
					},
              cache: false,
              success: function(data)
              { 	
			  //alert('success - id= '+prod_id+' img nr= '+img_nr);
			  //alert('success - filename= '+data.filename+' img nr= '+data.img_nr);
			  $('ul#img_list').append("<li alt=\""+data.img_nr+"\"><table class=\"li_img\"><tr><td><img src=\"http://naopak.com.pl/img/products/"+prod_id+"/"+data.filename+"\" /></td><td><input type=\"button\" class=\"btn_up\" value=\"up\" id=\""+data.img_nr+"\" /><br><input type=\"button\" class=\"btn_delete\" value=\"delete\" id=\""+data.img_nr+"\" /><br><input type=\"button\" class=\"btn_down\" value=\"down\" id=\""+data.img_nr+"\" /></td></tr></table></li>");			  

				$('#thumbnail').imgAreaSelect( {hide: true} );	
				sortuj($("#img_list"));

				//var img_nr = $("#img_list li").size();
				//if(img_nr == 7)
				//{
				//	$('#dodaj_nowy_img_btn').remove();
				//}
              },
			  error: function(xhr, thrownError)
			  {
				
				alert(xhr.statusText);
				alert('error: ' +  thrownError);	
			  }
         });
		 
         return false;
  }