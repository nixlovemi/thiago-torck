<?php
/* Template Name: Torck - Contato */
get_header();
$templateDIR = get_bloginfo('template_directory');

// simple fields
$bannerPagina = simple_fields_value("banner_da_pagina_url");
$bannerPagina = ($bannerPagina != "") ? $bannerPagina: "$templateDIR/images/banner-contato.jpg";

$emailContato = simple_fields_value("informacoes_contato_email");
$emailContato = ($emailContato != "") ? $emailContato: "leandro.parra.85@gmail.com";

$enderecoMapa = simple_fields_value("informacoes_contato_endereco_mapa");

// form contato
$vNome     = "";
$vTelefone = "";
$vEmail    = "";
$vMensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $hddnAcao = $_POST["hddnAcao"];
  if($hddnAcao == "postContato"){
    $vNome     = $_POST["nome"];
    $vTelefone = $_POST["telefone"];
    $vEmail    = $_POST["email"];
    $vMensagem = $_POST["mensagem"];

    $msgErro = "";
    if(strlen($vNome) < 3){
      $msgErro .= "* Informe o nome<br />";
    }
    if(strlen($vTelefone) < 8){
      $msgErro .= "* Informe o telefone<br />";
    }
    if(!filter_var($vEmail, FILTER_VALIDATE_EMAIL)){
      $msgErro .= "* Informe um email válido<br />";
    }
    if(strlen($vMensagem) < 3){
      $msgErro .= "* Informe a mensagem<br />";
    }

    if($msgErro != ""){
      $msgErro = "Verifique os campos antes de enviar o contato:<br /><br />$msgErro";
      ?>
      <script>
      jQuery( document ).ready(function() {
          jQuery.alert('<?php echo $msgErro; ?>', 'Erro ao enviar contato!');
      });
      </script>
      <?php
    } else {
      $html  = "Contato do site, com os dados:<br /><br />";
      $html .= "--Nome: $vNome<br />";
      $html .= "--Telefone: $vTelefone<br />";
      $html .= "--Email: $vEmail<br />";
      $html .= "--Mensagem:<br /><i>".nl2br($vMensagem)."</i>";

      $ret = sendMail($emailContato, "CONTATO SITE - TORCK", $html);
      $msg = ($ret === true) ? "Contato enviado com sucesso": "Erro ao enviar contato. Tente novamente mais tarde.";
      ?>
      <script>
      jQuery( document ).ready(function() {
          jQuery.alert('<?php echo $msg; ?>', 'Contato!');
      });
      </script>
      <?php

      $vNome     = "";
      $vTelefone = "";
      $vEmail    = "";
      $vMensagem = "";
    }
  }
}
?>

<div id="banner_header" class="clearfix mb-45">
  <img alt="Banner - Torck" src="<?php echo $bannerPagina; ?>" />
</div>

<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    ?>
    <div class="clearfix mb-45 inner-wrap">
      <div class="row">
        <div class="col-12">
          <?php
          the_content();
          ?>
        </div>
      </div>
    </div>
    <div class="clearfix mb-45 inner-wrap">
      <div class="row contact-form">
        <div class="col-6">
          <form id="form_contato" method="post" action="./">
            <input type="hidden" name="hddnAcao" value="postContato" />
            <div class="mb-15">
              <label>Nome**</label>
              <br />
              <input type="text" class="inpt-contato" name="nome" value="<?php echo $vNome; ?>" />
            </div>
            <div class="mb-15">
              <label>Telefone*</label>
              <br />
              <input type="text" class="inpt-contato" name="telefone" value="<?php echo $vTelefone; ?>" />
            </div>
            <div class="mb-15">
              <label>Email*</label>
              <br />
              <input type="text" class="inpt-contato" name="email" value="<?php echo $vEmail; ?>" />
            </div>
            <div class="mb-15">
              <label>Mensagem*</label>
              <br />
              <textarea class="inpt-contato" style="" name="mensagem"><?php echo trim($vMensagem); ?></textarea>
            </div>
            <div style="text-align: right;">
              <a href="javascript:;" onClick="document.getElementById('form_contato').submit();">ENVIAR</a>
            </div>
          </form>
        </div>
        <div class="col-6">
          <div class="map-responsive">
            <?php
            $strMapa = urlencode($enderecoMapa);
            ?>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7359.901877314657!2d-47.30751796901989!3d-22.730064852201256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c89a101413a78d%3A0x5119880e02a4c59a!2s<?php echo $strMapa; ?>%2C+13473-000!5e0!3m2!1spt-BR!2sbr!4v1544540169633" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix mb-45 inner-wrap">
      <div class="row contact-footer-info">
        <div class="col-12 contact-footer-bar">
        </div>
        <div class="col-3">
          <img class="contact-footer-img" src="<?php bloginfo('template_directory'); ?>/images/contato-img1.png" alt="Contato - Torck" />
          <h3 class="contact-footer-title">FALE CONOSCO</h3>
          Telefone: 19 3621 7677
          <br />
          E-mail: torck@torck.com.br
        </div>
        <div class="col-3">
          <img class="contact-footer-img" src="<?php bloginfo('template_directory'); ?>/images/contato-img2.png" alt="Contato - Torck" />
          <h3 class="contact-footer-title">HORÁRIO DE ATENDIMENTO</h3>
          De segunda à sexta-feira,
          <br />
          das 08h00 às 18h00
        </div>
        <div class="col-3">
          <img class="contact-footer-img" src="<?php bloginfo('template_directory'); ?>/images/contato-img3.png" alt="Contato - Torck" />
          <h3 class="contact-footer-title">MATRIZ</h3>
          Rua São Gabriel, 1.555
          <br />
          Sala 404 e 405, 4º andar
          <br />
          CEP: 13473-000 Vila Belvedere
          <br />
          Ed. Americana Office Tower
          <br />
          Americana – SP
        </div>
        <div class="col-3">
          <h3 class="contact-footer-title">FILIAL SUL</h3>
          Rodovia Antônio Heil, 1001,
          <br />
          km 01 Galpão 06 Módulo 1-A
          <br />
          CEP: 83.316-001
          <br />
          Bairro Itaipava
          <br />
          Itajaí - SC
        </div>
      </div>
    </div>
    <?php
  }
}

get_footer();
?>
