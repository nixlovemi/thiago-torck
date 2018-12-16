<?php
/* Template Name: Torck - Produtos */
get_header();
$templateDIR = get_bloginfo('template_directory');

// simple fields
$urlBannerPagina = simple_fields_value("banner_da_pagina_url");
$urlBannerPagina = ($urlBannerPagina != "") ? $urlBannerPagina: "$templateDIR/images/banner-produtos.jpg";

// prod dest gde
$pdg_nome_produto  = simple_fields_values("produtos_destaque_gde_nome_produto");
$pdg_texto_produto = simple_fields_values("produtos_destaque_gde_texto_produto");
$pdg_link_produto  = simple_fields_values("produtos_destaque_gde_link_produto");
$pdg_url_imagem    = simple_fields_values("produtos_destaque_gde_url_imagem");

$arrProdDestGde = [];
for($i=0; $i<count($pdg_nome_produto); $i++){
  $vNomeProduto  = ($pdg_nome_produto[$i] != "") ? $pdg_nome_produto[$i]: "Produto";
  $vTextoProduto = ($pdg_texto_produto[$i] != "") ? $pdg_texto_produto[$i]: "Texto";
  $vLinkProduto  = ($pdg_link_produto[$i] != "") ? $pdg_link_produto[$i]: "javascript:;";
  $vUrlImagem    = ($pdg_url_imagem[$i] != "") ? $pdg_url_imagem[$i]: "";

  $arrProdDestGde[] = array(
    "nome"   => $vNomeProduto,
    "texto"  => $vTextoProduto,
    "link"   => $vLinkProduto,
    "urlImg" => $vUrlImagem,
  );
}
// =============
?>

<div id="banner_header" class="clearfix mb-15">
  <img alt="Banner - Torck" src="<?php echo $urlBannerPagina; ?>" />
</div>

<?php
$i = 1;
foreach($arrProdDestGde as $itemPDP){
  $vNome   = $itemPDP["nome"];
  $vTexto  = $itemPDP["texto"];
  $vLink   = $itemPDP["link"];
  $vUrlImg = ($itemPDP["urlImg"] != "") ? $itemPDP["urlImg"]: "$templateDIR/images/produtos-page-1.jpg";

  $ehPar = $i % 2 == 0;
  if(!$ehPar){
    ?>
    <div class="clearfix row produtos-lines">
      <div class="col-6 produtos-lines-<?php echo $i; ?>">
        <div class="inner-text">
          <h2 class="title"><?php echo $vNome; ?></h2>
          <?php echo nl2br($vTexto); ?>
          <a href="<?php echo $vLink; ?>">VER LINHA</a>
        </div>
      </div>
      <div class="col-6">
        <img src="<?php echo $vUrlImg; ?>" alt="<?php echo $vNome; ?> - Torck" />
      </div>
    </div>
    <?php
  } else {
    ?>
    <div class="clearfix row produtos-lines">
      <div class="col-6">
        <img src="<?php echo $vUrlImg; ?>" alt="<?php echo $vNome; ?> - Torck" />
      </div>
      <div class="col-6 produtos-lines-<?php echo $i; ?>">
        <div class="inner-text inner-text-linha-2">
          <h2 class="title"><?php echo $vNome; ?></h2>
          <?php echo nl2br($vTexto); ?>
          <a href="<?php echo $vLink; ?>">VER LINHA</a>
        </div>
      </div>
    </div>
    <?php
  }

  $i++;
  if($i > 3){
    $i = 1;
  }
}

get_footer();
?>
