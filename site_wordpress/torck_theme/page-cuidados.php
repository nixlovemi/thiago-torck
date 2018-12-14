<?php
/* Template Name: Torck - Cuidados */
get_header();
$templateDIR = get_bloginfo('template_directory');

// simple fields
$bannerPagina   = simple_fields_value("banner_da_pagina_url");
$simbolosTecido = simple_fields_values("simbolos_tecido_url_imagem");
$cpcTitulo      = simple_fields_values("conteudo_pagina_cuidados_titulo");
$cpcDescricao   = simple_fields_values("conteudo_pagina_cuidados_descricao");
$cpcUrlImagem   = simple_fields_values("conteudo_pagina_cuidados_url_imagem");

// default
$bannerPagina = ($bannerPagina != "") ? $bannerPagina: "$templateDIR/images/banner-cuidados.jpg";

// cuidado produto textos
$arrTextosCuidados = [];
for($i=0; $i<count($cpcTitulo); $i++){
  $titulo    = $cpcTitulo[$i];
  $descricao = $cpcDescricao[$i];
  $urlImagem = $cpcUrlImagem[$i];

  $arrTextosCuidados[] = array(
    "titulo"    => $titulo,
    "descricao" => $descricao,
    "urlImagem" => $urlImagem,
  );
}
?>

<div id="banner_header" class="clearfix mb-45">
  <img alt="Banner - Torck" src="<?php echo $bannerPagina; ?>" />
</div>

<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    // the_content();
    ?>
    <div class="clearfix mb-45 inner-wrap">
      <div class="row cuidados-produto">
        <div class="col-12 mb-45">
          <?php
          the_content();

          if(count($simbolosTecido > 0)){
            ?>
            <ul id="cuidados-icons">
              <?php
              for($i=0; $i<count($simbolosTecido); $i++){
                $urlImagem = $simbolosTecido[$i];
                ?>
                <li>
                  <img src="<?php echo $urlImagem; ?>" alt="Cuidados com seu produto - Torck" />
                </li>
                <?php
              }
              ?>
            </ul>
            <?php
          }
          ?>
        </div>
        <br /><br />
        <?php
        foreach($arrTextosCuidados as $texto){
          $temImagem = $texto["urlImagem"] != "";
          $classDiv  = ($temImagem) ? "col-8": "col-12";
          ?>
          <div class="clearfix mb-45">
            <div class="<?php echo $classDiv; ?>">
              <h2 class="title"><?php echo $texto["titulo"]; ?></h2>
              <?php echo $texto["descricao"]; ?>
            </div>
            <?php
            if($temImagem){
              ?>
              <div class="col-4">
                <img src="<?php echo $texto["urlImagem"]; ?>" alt="Cuidados para seu produto - Torck" />
              </div>
              <?php
            }
          ?>
          </div>
          <br /><br />
          <?php
        }
        ?>
      </div>
    </div>
    <?php
  } // end while
} // end if

get_footer();
?>
