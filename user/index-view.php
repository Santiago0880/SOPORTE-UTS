<!--************ Imagen que reemplaza el carousel para dispositivos moviles ********-->
<div id="img-linux-tux" class="container hidden-lg hidden-md hidden-sm">
    <center><img src="img/slide-header.jpg" class="img-responsive img-rounded" alt="Image"></center>
</div>

<!--************************************Carousel******************************-->
<div class="container hidden-xs">
    <div class="col-xs-12">
<div id="carousel-example-generic" class="carousel slide">

  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>
    <div class="carousel-inner">
       <div class="item active">
           <img src="img/slider1.png" alt="">
          <div class="carousel-caption">
              UNIDADES TECNOLOGICAS DE SANTANDER
          </div>
       </div>
       <div class="item">
          <img src="img/slider2.png" alt="">
          <div class="carousel-caption">
          UNIDADES TECNOLOGICAS DE SANTANDER 
          </div>
       </div>
       <div class="item ">
          <img src="img/slider3.png" alt="">
          <div class="carousel-caption">
          UNIDADES TECNOLOGICAS DE SANTANDER
          </div>
        </div>
        <div class="item ">
          <img src="img/slider4.png" alt="">
          <div class="carousel-caption">
          UNIDADES TECNOLOGICAS DE SANTANDER
          </div>
        </div>
   </div>
   <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
       <span class="icon-prev"></span>
   </a>
   <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
     <span class="icon-next"></span>
   </a>
</div>
        </div>
     <div class="col-sm-2">&nbsp;</div>
</div>
<!--************************************ Fin Carousel******************************-->

 <hr class="hidden-xs">

<div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="text-center text-info">Programas que se utilizan en Soporte</h1>
    </div>
  </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6 thumbnail">
            <h3 class="text-center">Windows</h3>
            <img  src="img/logowin.png" class="img-responsive logos_GnuLinux" alt="Image">
             <p>
             Es el nombre de una familia de distribuciones de software y sistemas operativos para PC, 
             servidores, sistemas empotrados y antiguamente teléfonos inteligentes desarrollados y vendidos 
             por Microsoft desde 1985 y disponibles para múltiples arquitecturas, tales como x86, x86-64 y ARM. <br>
                 
             </p>
             <p class="text-center">
                <a href="#" class="btn btn-primary btn-sm" role="button">Leer más</a>
             </p>
        </div>
        <div class="col-xs-12 col-md-6 thumbnail">
          <h3 class="text-center">CloneZilla</h3>
            <img src="img/clonezilla.png" class="img-responsive logos_GnuLinux" alt="Image">
            <p>
            Es un software libre de recuperación de una imagen creada de un sistema operativo,
            tiene diversas funcionalidades como crear una imagen del sistema o eliminarla o por ejemplo eliminar 
            una partición. Clonezilla está diseñado por Steven Shiau y desarrollado por el NCHC Labs en Taiwán.<br>
             
            </p>
            <center><a href="#" class="btn btn-primary btn-sm" role="button">Leer más</a></center>
        </div>
        <div class="col-xs-12 col-md-6 thumbnail">
            <h3 class="text-center">Ubuntu</h3>
            <img src="img/logoUbuntu.png" class="img-responsive logos_GnuLinux" alt="Image">
            <p>
             Ubuntu es un sistema operativo basado en Linux y que se distribuye como software libre, 
             el cual incluye su propio entorno de escritorio denominado Unity. Su nombre proviene de 
             la ética homónima, en la que se habla de la existencia de uno mismo como cooperación de 
             los demás.<br>
             
            </p>
            <center><a href="#" class="btn btn-primary btn-sm" role="button">Leer más</a></center>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#carousel-example-generic").carousel({
            interval: 4000,
        });
    });
</script>