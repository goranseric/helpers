!function($,e){$("img[usemap]").rwdImageMaps()}(jQuery),function($,e){var a=[];$("area").on("click",function(e){e.preventDefault();var t=$(this).data("number");$("#zone"+t).length&&($("#zone"+t)[0].classList.toggle("act"),$("#zone"+t)[0].classList.contains("act")?a["zone"+t]=t:delete a["zone"+t],Object.keys(a).length>0?$(".svg-holder").addClass("act"):$(".svg-holder").removeClass("act"))})}(jQuery);