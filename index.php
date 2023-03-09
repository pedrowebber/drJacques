<?
  $currentPage = "home";
  $navHeader = "navbar-fixed-top";
  
  include("includes/connection.php");

  include("includes/header.php");
  include("includes/top-default.php");
?>
  <!---->
  <section id="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3 wow fadeInLeft delay-05s">
          <div class="section-title">
            <h2 class="head-title">Áreas de Atuação</h2>
            <hr class="botm-line">
            <p class="sec-para">Escolha ao lado uma área de atuação em que posso lhe ajudar.</p>
          </div>
        </div>
        <div class="col-md-9 separate-column">
          <div class="row display-flex">
            <div class="col-md-6 wow fadeInRight delay-02s">
              <div class="icon">
                <i class="fa fa-globe"></i>
              </div>
              <div class="icon-text">
                <h3 class="txt-tl">Problemas com compras na Internet</h3>
                <p class="txt-para">Você teve algum problema em uma compra pela internet? Produto com defeito, não recebimento da mercadoria, cobraça indevida, etc. </p>
                <button class="btn btn-action"><i class="fa fa-legal"></i> INICIAR</button>
              </div>
            </div>
            <div class="col-md-6 wow fadeInRight delay-02s">
              <div class="icon">
                <i class="fa fa-bolt"></i>
              </div>
              <div class="icon-text">
                <h3 class="txt-tl">Corte Energia</h3>
                <p class="txt-para">Problema com corte de energia? Corte sem aviso, recuperação de consumo, etc. </p>
                <button class="btn btn-action"><i class="fa fa-legal"></i> INICIAR</button>
              </div>
            </div>
            <div class="col-md-6 wow fadeInRight delay-04s">
              <div class="icon">
                <i class="fa fa-bullhorn"></i>
              </div>
              <div class="icon-text">
                <h3 class="txt-tl">SPC</h3>
                <p class="txt-para">Teve o nome inscrito indevidamente no SPC? Jacques auxilia no processo ...... </p>
                <button class="btn btn-action"><i class="fa fa-legal"></i> INICIAR</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!---->

<?
  include("includes/footer.php");
?>