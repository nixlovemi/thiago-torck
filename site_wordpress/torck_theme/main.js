$(function(){
  $(".tooltipster-item").tooltipster({
  	contentAsHTML: true,
  	interactive: true
  });

  var thumbs = jQuery('#thumbnails').slippry({
    // general elements & wrapper
    slippryWrapper: '<div class="slippry_box thumbnails" />',
    // options
    transition: 'horizontal',
    pager: false,
    auto: false,
    onSlideBefore: function (el, index_old, index_new) {
      jQuery('.thumbs a img').removeClass('active');
      jQuery('img', jQuery('.thumbs a')[index_new]).addClass('active');
      var txtCodigo = el.find('img').data('codigo-produto');
      $("#linha-codigo-produto").html('Código: ' + txtCodigo);
    },
    onSliderLoad: function(index){
      var txtCodigo = $('#thumbnails li.sy-active').find('img').data('codigo-produto');
      $("#linha-codigo-produto").html('Código: ' + txtCodigo);
    }
  });

  jQuery('.thumbs a').click(function () {
    thumbs.goToSlide($(this).data('slide'));
    var txtCodigo = $(this).find("img").data("codigo-produto");
    $("#linha-codigo-produto").html('Código: ' + txtCodigo);
    return false;
  });
});
