$(document).ready(function () {

  // Pricing page - updates prices based on selection.
  var priceUrl = 'http://marketplace.commerceguys.com/platform/buy-now?environment=PLATFORM-ENVIRONMENT-';

  $("#current-selection").click(function(){
    $("#price-options").slideToggle();
  });

  $("#price-options a").click(function(event){
    event.preventDefault(); //prevent synchronous loading
    var linkName = $(this).attr('name');
    $("#current-selection").html($(this).html());
    $("#submit").attr('href',priceUrl + linkName);
    $('#price').html($(this).attr('rel'));
    $("#price-options").slideToggle();
  });

  // Contact page - toggles display of contact form.
  if(!window.location.hash) {
    $("#contact-form").hide();
  }
  $("#contact-toggle").click(function(){
    $("#contact-form").slideToggle();
  })
  
  // Contact page - toggles display of contact form.
  if(!window.location.hash) {
    $("#contact-form").hide();
  }
  $("#invite").click(function(){
    $("#contact-form").slideToggle();
  })

});
