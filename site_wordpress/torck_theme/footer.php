      <div class="clearfix mb-45 inner-wrap">
        <div class="row">
          <div id="social-home" class="col-12">
            <center>
              <?php
              $idPageHome      = 7;
              $urlInstagram    = simple_fields_value("contato_social_url_instagram", $idPageHome);
              $urlWhatsapp     = simple_fields_value("contato_social_url_whatsapp", $idPageHome);

              $emailNovidades  = simple_fields_value("contato_social_email_novidades", $idPageHome);
              $emailNovidades  = ($emailNovidades != "") ? $emailNovidades: "leandro.parra.85@gmail.com";

              // form newsletter
              $vEmail = "";
              // ===============

              if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $hddnAcao = $_POST["hddnAcao"];
                if($hddnAcao == "post-newsletter"){
                  $vEmail = $_POST["email-newsletter"];

                  $msgErro = "";
                  if(!filter_var($vEmail, FILTER_VALIDATE_EMAIL)){
                    $msgErro .= "* Informe um email válido<br />";
                  }

                  if($msgErro != ""){
                    $msgErro = "Verifique os campos antes de cadastrar na newsletter:<br /><br />$msgErro";
                    ?>
                    <script>
                    jQuery( document ).ready(function() {
                        jQuery.alert('<?php echo $msgErro; ?>', 'Erro ao enviar newsletter!');
                    });
                    </script>
                    <?php
                  } else {
                    $html  = "Cadastro de newsletter, com os dados:<br /><br />";
                    $html .= "--Email: $vEmail<br />";;

                    $ret = sendMail($emailNovidades, "CADASTRO NEWSLETTER - TORCK", $html);
                    $msg = ($ret === true) ? "Cadastro enviado com sucesso": "Erro ao enviar cadastro. Tente novamente mais tarde.";
                    ?>
                    <script>
                    jQuery( document ).ready(function() {
                        jQuery.alert('<?php echo $msg; ?>', 'Contato!');
                    });
                    </script>
                    <?php
                    $vEmail    = "";
                  }
                }
              }
              ?>
              <table border="0" align="center">
                <tr>
                  <?php
                  if($urlInstagram != ""){
                    ?>
                    <td>
                      <a href="<?php echo $urlInstagram; ?>">
                        <img src="<?php bloginfo('template_directory'); ?>/images/instag-home.png" alt="Instagram - Torck" />
                      </a>
                    </td>
                    <?php
                  }

                  if($urlWhatsapp != ""){
                    ?>
                    <td>
                      <a href="<?php echo $urlWhatsapp; ?>">
                        <img src="<?php bloginfo('template_directory'); ?>/images/whats-home.png" alt="Instagram - Torck" />
                      </a>
                    </td>
                    <?php
                  }
                  ?>
                  <td>
                    <div style="position:relative; top:14px;">
                      <form method="post" action="./">
                        <input type="hidden" name="hddnAcao" value="post-newsletter" />
                        <input type="text" class="inpt-newsletter-home" name="email-newsletter" />
                        <br />
                        <small>CADASTRE-SE E FIQUE POR DENTRO DAS NOVIDADES</small>
                      </form>
                    </div>
                  </td>
                </tr>
              </table>
            </center>
          </div>
        </div>
      </div>
      <footer class="clearfix">
        <div class="inner-wrap clearfix">
          <div class="row">
            <div class="col-2">
              <img class="logo" src="<?php bloginfo('template_directory'); ?>/images/logo-footer.png" alt="Logotipo Torck" />
            </div>
            <div class="col-2 text-footer">
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
            <div class="col-2 text-footer">
              +55 19  3621 7677
              <br />
              torck@torck.com.br
            </div>
            <div class="col-2 text-footer">
              Institucional
              <br /><br />
              <a href="javascript:;">Sobre nós</a>
              <br />
              <a href="javascript:;">Estoque</a>
              <br />
              <a href="javascript:;">Contato</a>
            </div>
            <div class="col-2 text-footer">
              Produtos
              <br /><br />
              <a href="javascript:;">Linho</a>
              <br />
              <a href="javascript:;">Veludos</a>
              <br />
              <a href="javascript:;">Veludos Estampados</a>
              <br />
              <a href="javascript:;">Sarja</a>
              <br />
              <a href="javascript:;">Torckouro</a>
            </div>
            <div class="col-2 text-footer">
              © All rights reserved to Torck do Brasil
            </div>
          </div>
        </div>
      </footer>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>
