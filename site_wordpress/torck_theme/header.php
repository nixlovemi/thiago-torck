<!DOCTYPE html>
<html lang="pt-BR" prefix="og: http://ogp.me/ns#">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--<title><?php wp_title(' | '); ?></title>-->
    <title><?php
        if ( is_single() ) { single_post_title(); echo " | "; bloginfo('name'); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); echo ' | '; bloginfo('description'); }
        elseif ( is_page() ) { single_post_title(''); echo " | "; bloginfo('name'); }
        elseif ( is_search() ) { bloginfo('name'); echo ' | Resultados para ' . wp_specialchars($s); }
        elseif ( is_404() ) { bloginfo('name'); echo ' | Não encontrado'; }
        else { bloginfo('name'); wp_title('|'); }
    ?></title>

    <?php if (is_singular()): ?>
      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php endif; ?>

    <link rel="shortcut icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/jquery.js"></script>
    <script type="text/javascript" defer src="<?php bloginfo('template_url'); ?>/jquery/tooltipster/dist/js/tooltipster.bundle.min.js"></script>
    <script type="text/javascript" defer src="<?php bloginfo('template_url'); ?>/jquery/slippry/dist/slippry.min.js"></script>
    <script type="text/javascript" defer src="<?php bloginfo('template_url'); ?>/jquery/jquery-confirm/dist/jquery-confirm.min.js"></script>
    <script type="text/javascript" defer src="<?php bloginfo('template_url'); ?>/jquery/fancybox/dist/jquery.fancybox.min.js"></script>
    <script type="text/javascript" defer src="<?php bloginfo('template_url'); ?>/main.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Encode+Sans" rel="stylesheet">
    <link type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/reset.css" rel="stylesheet" />
    <link type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/simple-grid.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/jquery/tooltipster/dist/css/tooltipster.bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/jquery/slippry/dist/slippry.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/jquery/jquery-confirm/dist/jquery-confirm.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/jquery/fancybox/dist/jquery.fancybox.min.css" />
    <link type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet" />
    <?php wp_head(); ?>
  </head>
  <body>
    <div id="page">
      <header class="clearfix">
        <div class="inner-wrap clearfix">
          <a id="logo-header" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="logo" src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Logotipo Torck" /></a>

          <ul id="menu_header">
            <li>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="selected">home</a>
            </li>
            <li>
              <a href="javascript:;" class="tooltipster-item" data-tooltip-content="#tooltip_sobrenos">sobre nós</a>
              <div class="tooltip_templates">
                  <span id="tooltip_sobrenos">
                      <a href="<?php echo esc_url( home_url( '' ) ); ?>/empresa">empresa</a>
                      <br />
                      <a href="<?php echo esc_url( home_url( '' ) ); ?>/estoque">estoque</a>
                  </span>
              </div>
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '' ) ); ?>/produtos" class="tooltipster-item" data-tooltip-content="#tooltip_produtos">produtos</a>
              <div class="tooltip_templates">
                <span id="tooltip_produtos">
                  <?php
                  $arrFamilia  = getAllFamilia();
                  foreach($arrFamilia as $familia => $itens){
                    echo "<strong>$familia</strong><br />";
                    foreach($itens["itens"] as $item){
                      echo "&nbsp;&nbsp;&nbsp;<a href='".$item["link"]."'>".$item["produto"]."</a><br />";
                    }
                    echo "<br /><br />";
                  }
                  ?>
                </span>
              </div>
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '' ) ); ?>/cuidados-com-seu-produto/">cuidados com seu produto</a>
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '' ) ); ?>/contato">contato</a>
            </li>
            <li>
              <a href="http://torck.homelinux.com:75/">área restrita</a>
            </li>
          </ul>
        </div>
      </header>
