//main navigation in header


jQuery(document).ready(function () {
  jQuery(document).on('click', '.menu-bat', function(){
    var nav = jQuery('.welcome-list')
    jQuery('.menu-bat').toggleClass('active')
    if(nav.is(':visible')) {
      nav.slideUp()
    }else{
      nav.slideDown()
    }
  } )

  // search

  jQuery(document).on('click', '.fa-search', function(){
    var nav = jQuery('.search-block')
    jQuery('.fa-search').toggleClass('active')
    if(nav.is(':visible')) {
      nav.slideUp()
    }else{
      nav.slideDown()
    }
  } )


})