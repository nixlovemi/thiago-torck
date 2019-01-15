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
        <form role="search" method="post" class="search-form" action="./">
          BUSCA: <input name="searchTerm" type="text" class="inpt-busca" />
        </form>
      </div>
    </div>
  </div>
</div>
<div class="clearfix mb-45 produtos-inner">
  <div class="inner-wrap">
    <div class="row">
      <?php
      if( isset($_POST["searchTerm"]) && $_POST["searchTerm"] != "" ){
        global $wpdb;

        $searchTerm = $_POST["searchTerm"];
        $mypostids  = $wpdb->get_col("SELECT ID FROM wp_posts WHERE ((post_content LIKE '%$searchTerm%') OR (post_title LIKE '%$searchTerm%')) AND post_type = 'produto_det'");

        $query = new WP_Query(array(
          'post_type' => 'produto_det',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'post__in'=> $mypostids,
          #'s' => $searchTerm,
        ));

        if($query->have_posts()){
          ?>
          <div class="clearfix mb-45 inner-wrap">
            <div class="row">
              <div class="col-12">
                <h2 class="page_title">Resultado da pesquisa "<?php echo $searchTerm; ?>"</h2>
                <ul class="produtos-itens" style="margin-left: 30px;">
                <?php
                while ($query->have_posts()) {
                  $query->the_post();
                  $ID    = get_the_ID();
                  $title = get_the_title();
                  $link  = get_the_permalink($ID);

                  echo "<li style='list-style: circle;'>";
                  echo "  <a href='$link'>$title<a>";
                  echo "</li>";

                  #echo get_the_title() . "<br />";
                }
                ?>
                </ul>
              </div>
            </div>
          </div>
          <?php
        } else {
          echo "Nenhum resultado encontrado";
        }
      } else {
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
                $arrLoop      = (isset($arrFamilia[$familiaProd]["itens"])) ? $arrFamilia[$familiaProd]["itens"]: array();
                $arrLoopOrder = array();
                foreach($arrLoop as $item){
                  $link = $item["link"];
                  $nome = $item["produto"];

                  $arrLoopOrder[$nome.$link] = array(
                    "link"    => $link,
                    "produto" => $nome,
                  );
                }

                ksort($arrLoopOrder);
                foreach($arrLoopOrder as $key => $item){
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
                           <img data-codigo-produto="<?php echo $produtoImg["codigo"]; ?>" src="<?php echo $produtoImg["urlImagem"]; ?>" alt="" />
                         </a>
                      </li>
                      <?php
                      $i++;
                    }
                    ?>
                  </ul>
                  <p id="linha-codigo-produto">Código 001 - Areia</p>
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
                          <img data-codigo-produto="<?php echo $produtoImg["codigo"]; ?>" src="<?php echo $produtoImg["urlImagem"]; ?>" alt="" />
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
      }
      ?>
    </div>
  </div>
</div>

<?php
global $deixaSoWhats;
$deixaSoWhats = true;
get_footer();
?>
