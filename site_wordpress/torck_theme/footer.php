      <div class="clearfix mb-45 inner-wrap">
        <div class="row">
          <div id="social-home" class="col-12">
            <center>
              <?php
              $idPageHome      = 7;
              $urlInstagram    = simple_fields_value("contato_social_url_instagram", $idPageHome);
              $urlWhatsapp     = simple_fields_value("contato_social_url_whatsapp", $idPageHome);

              $arrFooterInfo = [];
              for($i=1; $i<=6; $i++){
                $footerInfo = simple_fields_value("informacao_footer_coluna_$i", $idPageHome);
                if($footerInfo != ""){
                  $arrFooterInfo[] = $footerInfo;
                }
              }

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
                  global $deixaSoWhats;
                  $deixaSoWhats = isset($deixaSoWhats) ? $deixaSoWhats: false;

                  if($urlInstagram != "" && $deixaSoWhats == false){
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

                  if($deixaSoWhats == false){
                    ?>
                    <td>
                      <div style="position:relative; top:14px;">
                        <form id="frm-newsletter" method="post" action="./">
                          <input type="hidden" name="hddnAcao" value="post-newsletter" />
                          <input type="text" class="inpt-newsletter-home" name="email-newsletter" />
                          <a href="javascript:;" onclick="document.getElementById('frm-newsletter').submit();">OK</a>
                          <br />
                          <small>CADASTRE-SE E FIQUE POR DENTRO DAS NOVIDADES</small>
                        </form>
                      </div>
                    </td>
                    <?php
                  }
                  ?>
                </tr>
              </table>
            </center>
          </div>
        </div>
      </div>
      <footer class="clearfix">
        <div class="inner-wrap clearfix">
          <div class="row">
            <?php
            $i = 1;
            foreach($arrFooterInfo as $info){
              $classCol = "col-2";
              if($i == 1 || $i == 2){
                $classCol = "col-3";
              } elseif($i == 4 || $i == 5){
                $classCol = "col-1";
              }
              ?>
              <div class="<?php echo $classCol; ?> text-footer footer-<?php echo $i; ?>">
                <?php
                echo $info;
                ?>
              </div>
              <?php
              $i++;
            }
            ?>
          </div>
        </div>
      </footer>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>
