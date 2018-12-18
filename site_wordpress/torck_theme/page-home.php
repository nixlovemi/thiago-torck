<?php
/* Template Name: Torck - Home */
get_header();
$templateDIR = get_bloginfo('template_directory');

// simple fields
$urlBannerRotativo = simple_fields_values("banner_rotativo_url_imagem");
$arrBannerRotativo = [];
for($i=0; $i<count($urlBannerRotativo); $i++){
  $arrBannerRotativo[] = $urlBannerRotativo[$i];
}
#$urlBannerPagina = ($urlBannerPagina != "") ? $urlBannerPagina: "$templateDIR/images/banner-header.jpg";

// prod dest peq
$pdp_nome_produto  = simple_fields_values("produtos_destaque_peq_nome_produto");
$pdp_texto_produto = simple_fields_values("produtos_destaque_peq_texto_produto");
$pdp_link_produto  = simple_fields_values("produtos_destaque_peq_link_produto");
$pdp_url_imagem    = simple_fields_values("produtos_destaque_peq_url_imagem");

$arrProdDestPeq = [];
for($i=0; $i<count($pdp_nome_produto); $i++){
  $vNomeProduto  = ($pdp_nome_produto[$i] != "") ? $pdp_nome_produto[$i]: "Produto";
  $vTextoProduto = ($pdp_texto_produto[$i] != "") ? $pdp_texto_produto[$i]: "Texto";
  $vLinkProduto  = ($pdp_link_produto[$i] != "") ? $pdp_link_produto[$i]: "javascript:;";
  $vUrlImagem    = ($pdp_url_imagem[$i] != "") ? $pdp_url_imagem[$i]: "";

  $arrProdDestPeq[] = array(
    "nome"   => $vNomeProduto,
    "texto"  => $vTextoProduto,
    "link"   => $vLinkProduto,
    "urlImg" => $vUrlImagem,
  );
}
// =============

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

<?php
if(count($arrBannerRotativo) > 0){
  ?>
  <div id="banner_header" class="clearfix mb-45">
    <ul class="banner-rotativo">
      <?php
      $i = 1;
      foreach($arrBannerRotativo as $urlBanner){
        ?>
        <li>
          <a href="#slide<?php echo $i; ?>">
            <img src="<?php echo $urlBanner; ?>" alt="Banner Torck <?php echo $i; ?>" />
          </a>
        </li>
        <?php
        $i++;
      }
      ?>
    </ul>
  </div>
  <?php
}
?>
<div class="clearfix mb-45 inner-wrap">
  <?php
  if(count($arrProdDestPeq) > 0){
    ?>
    <div class="row product-mini-home">
      <?php
      $i = 1;
      foreach($arrProdDestPeq as $itemPDP){
        $vNome   = $itemPDP["nome"];
        $vTexto  = $itemPDP["texto"];
        $vLink   = $itemPDP["link"];
        $vUrlImg = ($itemPDP["urlImg"] != "") ? $itemPDP["urlImg"]: "$templateDIR/images/prod-dest-1.jpg";

        ?>
        <div class="col-4">
          <img src="<?php echo $vUrlImg; ?>" alt="<?php echo $vNome; ?> - Torck" />
          <h3 class="title"><?php echo $vNome; ?></h3>
          <?php echo nl2br($vTexto) ?>
          <p><a href="<?php echo $vLink; ?>">CONHEÇA</a></p>
        </div>
        <?php
      }
      ?>
    </div>
    <?php
  }
  ?>
</div>
<div class="clearfix mb-45 inner-wrap">
  <?php
  if(count($arrProdDestGde) > 0){
    ?>
    <div class="row product-full-home">
      <?php
      $i = 1;
      foreach($arrProdDestGde as $itemPDP){
        $vNome   = $itemPDP["nome"];
        $vTexto  = $itemPDP["texto"];
        $vLink   = $itemPDP["link"];
        $vUrlImg = ($itemPDP["urlImg"] != "") ? $itemPDP["urlImg"]: "$templateDIR/images/prod-dest-full-1.jpg";
        ?>
        <div class="col-12">
          <img src="<?php echo $vUrlImg; ?>" alt="<?php echo $vNome; ?> - Torck" />
          <h3 class="title"><?php echo $vNome; ?></h3>
          <?php echo $vTexto; ?>
          <p><a href="<?php echo $vLink; ?>">CONHEÇA</a></p>
        </div>
        <?php
      }
      ?>
    </div>
    <?php
  }
  ?>
</div>
<?php
get_footer();
?>
