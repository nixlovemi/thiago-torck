<?php
function sendMail($to, $subject, $body){
  $headers   = [];
  $headers[] = 'Content-Type: text/html; charset=UTF-8';
  $headers[] = 'From: Torck do Brasil <contato@torckdobrasil.com.br>';
  $headers[] = 'Content-Type: text/html; charset=UTF-8';
  return wp_mail( $to, $subject, $body, $headers );
}

function getAllFamilia(){
  $query = new WP_Query(array(
    'post_type' => 'produto_det',
    'post_status' => 'publish',
    'posts_per_page' => -1,
  ));

  $arrFamilia = [];
  while ($query->have_posts()) {
    $query->the_post();
    $post_id    = get_the_ID();
    $post_title = get_the_title();
    $familia    = simple_fields_value("familia_descricao", $post_id);

    if(!array_key_exists($familia, $arrFamilia)){
      $arrFamilia[$familia]          = [];
      $arrFamilia[$familia]["itens"] = [];
    }

    $arrFamilia[$familia]["itens"][] = array(
      "id"      => $post_id,
      "produto" => $post_title,
      "link"    => get_the_permalink($post_id),
    );
  }

  wp_reset_postdata();
  return $arrFamilia;
}
