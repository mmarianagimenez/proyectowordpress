/***JS INITIALIZATION***/
jQuery(document).ready(function($){
   /***GRAYSCALING***/
   $('.carzine_latest_post:first').find('img').removeClass('grayscale');
   $('.carzine_latest_post').mouseover(function(){
     $(this).find("img").removeClass('grayscale');
     $(this).find("img").addClass('grayscale_disabled');
   }).mouseout(function(){
     $(this).find("img").addClass('grayscale');
     $(this).find("img").removeClass('grayscale_disabled');
   });
   
   /**Responsive Menu initialization**/
   $('#main-menu').slicknav({
    label:init_vars.label
 });
});