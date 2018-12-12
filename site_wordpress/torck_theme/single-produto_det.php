<?php
get_header();
?>

<div id="banner_header" class="clearfix">
  <img alt="Banner - Torck" src="<?php bloginfo('template_directory'); ?>/images/banner-produtos-single.jpg" />
</div>
<div class="clearfix mb-45 busca-single">
  <div class="inner-wrap">
    <div class="row">
      <div class="col-12">
        BUSCA: <input type="text" class="inpt-busca" />
      </div>
    </div>
  </div>
</div>
<div class="clearfix mb-45 produtos-inner">
  <div class="inner-wrap">
    <div class="row">
      <?php
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post();

          $postId      = get_the_ID();
          $nomeProduto = get_the_title();
          $familiaProd = simple_fields_value("familia_descricao", $postId);
          $arrFamilia  = getAllFamilia();
          ?>

          <div class="col-4">
            <h2 class="title mb-45"><?php echo $familiaProd; ?></h2>
            <ul class="produtos-itens">
              <?php
              $arrLoop = (isset($arrFamilia[$familiaProd]["itens"])) ? $arrFamilia[$familiaProd]["itens"]: array();
              foreach($arrLoop as $item){
                $link = $item["link"];
                $nome = $item["produto"];
                ?>
                <li>
                  <a href="<?php echo $link; ?>"><?php echo $nome; ?></a>
                </li>
                <?php
              }
              ?>
            </ul>
          </div>

          <div class="col-8">
            <ul class="produtos-categorias mb-45">
              <?php
              foreach($arrFamilia as $familia => $item){
                $url = $item["itens"][0]["link"];
                ?>
                <li>
                  <a href="<?php echo $url; ?>"><?php echo $familia; ?></a>
                </li>
                <?php
              }
              ?>
            </ul>

            <?php
            // imagens dos produtos
            $produtoImagens = simple_fields_values("galeria_produto_url_imagem", $postId);
            $produtoCodigo  = simple_fields_values("galeria_produto_codigo_produto", $postId);

            $arrProdutos = [];
            for($i=0; $i<count($produtoImagens); $i++){
              $imgProduto = $produtoImagens[$i];
              $codProduto = $produtoCodigo[$i];

              if($imgProduto != ""){
                $arrProdutos[] = array(
                  "urlImagem" => $imgProduto,
                  "codigo"    => $codProduto,
                );
              }
            }
            // ====================
            ?>
            <h2 class="mb-45"><?php echo $nomeProduto; ?></h2>

            <div class="produto-slider-inner">
              <?php
              if(count($arrProdutos) > 0){
                ?>
                <ul id="thumbnails">
                  <?php
                  $i = 1;
                  foreach($arrProdutos as $produtoImg){
                    ?>
                    <li>
                       <a href="#slide<?php echo $i; ?>">
                         <img data-codigo-produto="<?php echo $produtoImg["codigo"]; ?>" src="<?php echo $produtoImg["urlImagem"]; ?>" alt="C&oacute;digo: <?php echo $produtoImg["codigo"]; ?>" />
                       </a>
                    </li>
                    <?php
                    $i++;
                  }
                  ?>
                </ul>
                <?php
              }
              ?>
              <div class="thumb-box">
                <ul class="thumbs">
                  <?php
                  $i = 1;
                  foreach($arrProdutos as $produtoImg){
                    ?>
                    <li>
                      <a href="#<?php echo $i; ?>" data-slide="<?php echo $i; ?>">
                        <img data-codigo-produto="<?php echo $produtoImg["codigo"]; ?>" src="<?php echo $produtoImg["urlImagem"]; ?>" alt="C&oacute;digo: <?php echo $produtoImg["codigo"]; ?>" />
                      </a>
                    </li>
                    <?php
                    $i++;
                  }
                  ?>
                </ul>
              </div>
            </div>

            <h3 class="mb-15">Especificações</h3>
            <?php
            the_content();
            ?>
          </div>
          <?php
        }
      }
      ?>
    </div>
  </div>
</div>

<?php
get_footer();
?>
