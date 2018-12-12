<?php
/* Template Name: Torck - Estoque */
get_header();
$templateDIR = get_bloginfo('template_directory');

// simple fields
$urlBannerPagina = simple_fields_value("banner_da_pagina_url");
$urlBannerPagina = ($urlBannerPagina != "") ? $urlBannerPagina: "$templateDIR/images/banner-estoque.jpg";
$tituloPag       = simple_fields_value("conteudo_pagina_titulo");
$textoPag        = simple_fields_value("conteudo_pagina_texto");

// imagens
$imagensEstoque  = simple_fields_values("fotos_estoque_url_imagem");
?>

<div id="banner_header" class="clearfix mb-45">
  <img alt="Banner - Torck" src="<?php echo $urlBannerPagina; ?>" />
</div>
<div class="clearfix mb-45 inner-wrap">
  <div class="row">
    <div class="col-12">
      <h2 class="page_title"><?php echo $tituloPag; ?></h2>
      <?php echo nl2br($textoPag); ?>
    </div>
  </div>
</div>
<?php
if(count($imagensEstoque) > 0){
  ?>
  <div class="clearfix mb-45 inner-wrap">
    <div class="row">
      <?php
      for($i=0; $i<count($imagensEstoque); $i++){
        $urlImg = ($imagensEstoque[$i] != "") ? $imagensEstoque[$i]: "$templateDIR/images/estoque-img-1.jpg";
        ?>
        <div class="col-6">
          <img src="<?php echo $urlImg; ?>" alt="Estoque <?php echo $i; ?> - Torck" />
        </div>
        <?php
      }
      ?>
    </div>
  </div>
  <?php
}

get_footer();
?>
