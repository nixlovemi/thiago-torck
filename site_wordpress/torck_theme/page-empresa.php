<?php
/* Template Name: Torck - Empresa */
get_header();
$templateDIR = get_bloginfo('template_directory');

// simple fields
$urlBannerPagina      = simple_fields_value("banner_da_pagina");
$missaoTexto          = simple_fields_value("mar_missao_texto");
$missaoUrlImagem      = simple_fields_value("mar_missao_url_imagem");
$areaAtuacaoTexto     = simple_fields_value("mar_area_atuacao_texto");
$areaAtuacaoUrlImagem = simple_fields_value("mar_area_atuacao_url_imagem");
$referencialTexto     = simple_fields_value("mar_busca_referencial_texto");
$referencialUrlImagem = simple_fields_value("mar_busca_referencial_url_imagem");

// padroes
$urlBannerPagina      = ($urlBannerPagina != "") ? $urlBannerPagina: "$templateDIR/images/banner-empresa.jpg";
$missaoUrlImagem      = ($missaoUrlImagem != "") ? $missaoUrlImagem: "$templateDIR/images/empresa-img-1.jpg";
$areaAtuacaoUrlImagem = ($areaAtuacaoUrlImagem != "") ? $areaAtuacaoUrlImagem: "$templateDIR/images/empresa-img-2.jpg";
$referencialUrlImagem = ($referencialUrlImagem != "") ? $referencialUrlImagem: "$templateDIR/images/empresa-img-3.jpg";
?>

<div id="banner_header" class="clearfix mb-45">
  <img alt="Banner - Torck" src="<?php echo $urlBannerPagina; ?>" />
</div>
<div class="clearfix mb-45 inner-wrap">
  <div class="row">
    <div class="col-12">
      <?php
      if ( have_posts() ) {
      	while ( have_posts() ) {
      		the_post();
          the_content();
      	} // end while
      } // end if
      ?>
    </div>
  </div>
</div>
<div class="clearfix mb-45 inner-wrap">
  <div class="row empresa-missao">
    <div class="col-4">
      <span class="title_line">&nbsp;</span>
      <h2 class="title">Missão</h2>
      <?php
      echo nl2br($missaoTexto);
      ?>
    </div>
    <div class="col-4">
      <span class="title_line">&nbsp;</span>
      <h2 class="title">Área de Atuação</h2>
      <?php
      echo nl2br($areaAtuacaoTexto);
      ?>
    </div>
    <div class="col-4">
      <span class="title_line">&nbsp;</span>
      <h2 class="title">Em Busca de Referencial</h2>
      <?php
      echo nl2br($referencialTexto);
      ?>
    </div>
  </div>
</div>
<div class="clearfix mb-45 inner-wrap">
  <div class="row">
    <div class="col-4">
      <img src="<?php echo $missaoUrlImagem; ?>" alt="Empresa - Torck" />
    </div>
    <div class="col-4">
      <img src="<?php echo $areaAtuacaoUrlImagem; ?>" alt="Empresa - Torck" />
    </div>
    <div class="col-4">
      <img src="<?php echo $referencialUrlImagem; ?>" alt="Empresa - Torck" />
    </div>
  </div>
</div>

<?php
get_footer();
?>
