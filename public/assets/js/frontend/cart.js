$("#zoom_09").elevateZoom(); 
            
  //initiate the plugin and pass the id of the div containing gallery images
$("#zoom_09").elevateZoom({gallery:'gal1', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true}); 

//pass the images to Fancybox
$("#zoom_09").bind("click", function(e) {  
  var ez =   $('#zoom_09').data('elevateZoom'); 
  return false;
});

 // rating js
 $('#rating').rating();