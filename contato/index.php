<?
  $currentPage = "contato";
  $navHeader = "navbar-static-top";
  
  include("../includes/connection.php");

  include("../includes/header.php");
  include("../includes/top-default.php");
?>

  <!---->
  <section class="section-padding wow fadeInUp delay-05s" id="contact">
    <div class="container">
      <div class="row white">
        <div class="col-md-8 col-sm-12">
          <div class="section-title">
            <h2 class="head-title black">Fale Conosco</h2>
            <hr class="botm-line">
            <p class="sec-para black">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
          </div>
        </div>
        <div class="col-md-12 col-sm-12">
          <div class="col-md-6 col-sm-6" style="padding-left:0px;">
            <h3 class="cont-title">Contato</h3>
            <div id="sendmessage">Sua mensagem foi enviado. Obrigado!</div>
            <div id="errormessage"></div>
            <div class="contact-info">
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" data-rule="minlen:4" data-msg="Por favor, informe ao menos 4 caracteres." />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Por favor, informe um email válido." />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="assunto" id="assunto" placeholder="Assunto" data-rule="minlen:4" data-msg="Por favor, informe ao menos 4 caracteres" />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <textarea class="form-control" name="mensagem" id="mensagem" rows="5" data-rule="required" data-msg="Por favor, escreva algo para nós" placeholder="Mensagem"></textarea>
                  <div class="validation"></div>
                </div>
                <button type="submit" class="btn btn-action">Enviar</button>
              </form>
            </div>

          </div>
          <div class="col-md-5 col-sm-6">
            <h3 class="cont-title">Informações de Contato</h3>
            <div class="location-info">
              <p class="white"><span aria-hidden="true" class="fa fa-map-marker"></span>Rua xxxxx xxxxx 999, RS, Brasil</p>
              <p class="white"><span aria-hidden="true" class="fa fa-phone"></span>Telefone: (051) 99999-9999</p>
              <p class="white"><span aria-hidden="true" class="fa fa-envelope"></span>Email: <a href="" class="link-dec">augusto@mesquitakalil.com.br</a></p>
            </div>
          </div>
          <div class="col-md-1">
            <div class="contact-icon-container hidden-md hidden-sm hidden-xs">
              <span aria-hidden="true" class="fa fa-envelope-o"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!---->


<?
  include("../includes/footer.php");
?>