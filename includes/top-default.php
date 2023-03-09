<!--header-->
  <?
    $classHeader = "-header";
    if($currentPage == "home"){
      $classHeader = "main".$classHeader;
    }else{
      $classHeader = $currentPage.$classHeader;
    }
  ?>
  <header class="<?=$classHeader?>" id="header">
    <div class="bg-color">
      <!--nav-->
      <nav class="nav navbar-default <?=$navHeader?>">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynavbar" aria-expanded="false" aria-controls="navbar">
                <span class="fa fa-bars"></span>
              </button>
              <a href="/" class="navbar-brand"> <img src="../img/logo/logo-branco-2.png" class="img-logo"/></a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="mynavbar">
              <ul class="nav navbar-nav">
                <li <?=($currentPage=='home'?'class="active"':'')?>><a href="/">Home</a></li>
                <li <?=($currentPage=='quem-somos'?'class="active"':'')?>><a href="/quem-somos/">Quem Somos</a></li>
                <li <?=($currentPage=='conheca-jacques'?'class="active"':'')?>><a href="/conheca-jacques/">Conheça Dr. Jacques</a></li>
                <li <?=($currentPage=='contato'?'class="active"':'')?>><a href="/contato/">Contato</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!--/ nav-->
      
      <?
      if($currentPage=='home'){
      ?>
        <div class="container text-center">
          <div class="wrapper wow fadeInUp delay-05s">
            <h2 class="top-title">Advogado Virtual</h2>
            <h3 class="title">DR. JACQUES</h3>
            <h4 class="sub-title"></h4>
            <a href="conheca-jacques/index.html" class="btn btn-submit">CONHEÇA</a>
          </div>
        </div>
      <?
      }else if($currentPage=='quem-somos'){
      ?>
        <div class="container text-center">
          <div class="wrapper wow fadeInUp delay-05s">
            <h2 class="top-title">Escritório Virtual</h2>
            <hr class="botm-line">
            <h4 class="sub-title">Simplicidade e agilidade para seus direitos</h4>
          </div>
        </div>
      <?
      }else if($currentPage=='conheca-jacques'){
      ?>
        <div class="container text-center">
          <div class="wrapper wow fadeInUp delay-05s">
            <h2 class="top-title">Conheça o Advogado Virtual</h2>
            <hr class="botm-line">
            <h4 class="title">Dr. Jacques</h4>
          </div>
        </div>
      <?
      }else if($currentPage=='contato'){
      ?>
      <?
      }

      ?>
    </div>
  </header>
  <!--/ header-->