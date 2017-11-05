@extends('template/main')

@section('title','Inicio')

@include('template.partials.navwebsite')

<div class="container-fluid">

  <section class="slider" id="home">
		<div class="container-fluid">
			<div class="row">
			    <div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">
					<div class="header-backup"></div>
			        <!-- Wrapper for slides -->
			        <div class="carousel-inner" role="listbox">
			            <div class="item active">
			            	<img src="{{ asset('images/website/slide-one.jpg') }}" alt="">
			                <div class="carousel-caption">
		               			<h1>PONTE EN LINEA</h1>
		               			<p>Servicio desde la comodidad de tu casa</p>
			                </div>
			            </div>
			            <div class="item">
			            	<img src="{{ asset('images/website/slide-two.jpg') }}" alt="">
			                <div class="carousel-caption">
                        <h1 >PONTE EN LINEA</h1>
		               			<p>Servicio desde la comodidad de tu casa</p>
			                </div>
			            </div>
			        </div>
			        <!-- Controls -->
			        <a class="left carousel-control" href="#carouselHacked" role="button" data-slide="prev">
			            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			            <span class="sr-only">Previous</span>
			        </a>
			        <a class="right carousel-control" href="#carouselHacked" role="button" data-slide="next">
			            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			            <span class="sr-only">Next</span>
			        </a>
			    </div>
			</div>
		</div>
	</section><!-- end of slider section -->

	<!-- service section starts here -->
	<section class="service text-center" id="service">
		<div class="container">
			<div class="row">
				<div class="col-md-4 ">
					<div class="single-service">
						<div class="single-service-img">
							<div class="service-img">
								<img class="heart img-responsive" src="{{ asset('images/website/service1.png') }}" alt="">
							</div>
						</div>
						<h3>Ritmo cardiaco</br>
            Observa como late...</h3>
					</div>
				</div>
				<div class="col-md-4 ">
					<div class="single-service">
						<div class="single-service-img">
							<div class="service-img">
								<img class="brain img-responsive" src="{{ asset('images/website/service2.png') }}" alt="">
							</div>
						</div>
						<h3>Temperatura corporal</br>
            Mide y envía...</h3>
					</div>
				</div>
				<div class="col-md-4 ">
					<div class="single-service">
						<div class="single-service-img">
							<div class="service-img">
								<img class="knee img-responsive" src="{{ asset('images/website/service3.png') }}" alt="">
							</div>
						</div>
						<h3>IOT </br>
            Al otro lado del mundo...</h3>
					</div>
				</div>
			</div>
		</div>
	</section><!-- end of service section -->

	<!-- footer starts here -->
	<footer class="footer clearfix">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 footer-para">
					<p>&copy;Gabriela Saldaña | Melina Cuadra</p>
				</div>
				<div class="col-xs-6 text-right">
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-twitter"></i></a>
					<a href=""><i class="fa fa-skype"></i></a>
				</div>
			</div>
		</div>
	</footer>

</div>
