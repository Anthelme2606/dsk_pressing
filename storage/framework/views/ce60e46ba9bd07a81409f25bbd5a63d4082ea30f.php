<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
    <meta name="description" content="Laundryes - Laundry Business Html Template. It is built using bootstrap 3.3.2 framework, works totally responsive, easy to customise, well commented codes and seo friendly.">
    <meta name="keywords" content="laundry, multipage, business, clean, bootstrap">
    <meta name="author" content="rudhisasmito.com">

	<!-- ==============================================
	Favicons
	=============================================== -->
	<link rel="shortcut icon" href="<?php echo e(asset('public/website/images/lgElegance3.jpg')); ?>">
	<link rel="apple-touch-icon" href="<?php echo e(asset('public/website/images/apple-touch-icon.png')); ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('public/website/images/apple-touch-icon-72x72.png')); ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('public/website/images/apple-touch-icon-114x114.png')); ?>">

	<!-- ==============================================
	CSS
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/website/css/bootstrap.css')); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/website/css/font-awesome.min.css')); ?>">



	<!-- ==============================================
	Google Fonts
	=============================================== -->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,700,900' rel='stylesheet' type='text/css'>


	<!-- Custom Stylesheet -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/website/css/style.css')); ?>" />


    <script type="text/javascript" src="<?php echo e(asset('public/website/js/modernizr.min.js')); ?>"></script>



</head>

<body>

	<!-- Load page -->
	<div class="animationload">
		<div class="loader"></div>
	</div>


	<!-- NAVBAR SECTION -->
	<div class="navbar navbar-main navbar-fixed-top">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
						<div class="info">
							<div class="info-item">
								<span class="fa fa-phone"></span> +225 01 4188 8989
							</div>
							<div class="info-item">
								<span class="fa fa-envelope-o"></span> <a href="mailto:info@laundryes.com" title="">contact@pressingelegance.com</a>
							</div>

						</div>
					</div>
					<!-- <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<div class="top-sosmed pull-right">
							<a href="#" title=""><span class="fa fa-facebook"></span></a>
							<a href="#" title=""><span class="fa fa-twitter"></span></a>
							<a href="#" title=""><span class="fa fa-instagram"></span></a>
							<a href="#" title=""><span class="fa fa-pinterest"></span></a>
						</div>
					</div> -->

				</div>
			</div>
		</div>
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo e(asset('#')); ?>"><span style="font-family:monospace; font-style:italic; font-size: 20px;"><img src="<?php echo e(asset('public/website/images/z.png')); ?>" style="height: 65px; width:150px;" alt="" /></a>

			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
					  <a href="<?php echo e(asset('#')); ?>" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ACCUEIL <span class="cart"></span></a>
					  <!-- <ul class="dropdown-menu">
						<li><a href="index.html">Homepage Default</a></li>
						<li><a href="index2.html">Homepage Sliders</a></li>
					  </ul> -->
					</li>
					<!-- <li><a href="about.html">ABOUT</a></li> -->
					<li><a href="<?php echo e(asset('#services')); ?>">SERVICES</a></li>
					<li><a href="<?php echo e(route('client.login')); ?>">ESPACE CLIENT</a></li>
					<!-- <li><a href="pricing.html">PRICING</a></li>
					<li><a href="faq.html">FAQ</a></li>
					<li><a href="blog.html">BLOG</a></li>
					<li><a href="contact.html">CONTACT</a></li> -->
				</ul>
			</div>
		</div>
    </div>


	<!-- BANNER -->
	<div class="section banner" >
		<div class="container pos-relative">
			<div class="caption">
				<div class="title-box">
					<h2>BIENVENUE À ÉLÉGANCE PRESSING !<br>VOTRE MEILLEUR SERVICE DE PRESSING TOUJOURS À PORTÉE DE MAIN</h2>
				</div>
				<br><p class="yess" style="font-style: italic; font-size: 17px;">Vous souhaitez retrouver l'éclat de vos vêtements, avoir le "bling bling", vous garantir une belle prestance et le tout en un temps record, faites donc appel à
					<br><br><span style="font-size: 18px; font-family:Brush Script MT, Brush Script Std, cursive; font-size: 40px;"><em><i style="color: rgb(211, 211, 134);"> Elégance Pressing, Textile expert</i></em></span>
						
					<!-- rgb(241, 183, 23); -->

				<!-- <a href="#" title="" class="btn btn-default">EXPLORER</a> -->
			</div>
		</div>
		<!-- <div class="imgbg" style="background-color: rgb(40, 96, 78);"> -->
		<div class="imgbg" style="background:url('public/website/images/bg.jpg') no-repeat center center;   -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover">

			<!-- <img src="images/homeslide.jpg" alt=""> -->
		</div>
		<div class="work-info">
			<div class="container">
				<div class="work-info-item">
					<div class="work-info-icon">
						<span class="fa fa-phone"></span>
					</div>
					<div class="work-info-body">
						<b style="font-weight: 700;">Contactez-nous au :</b>
						<div class="work-info-lead">+225 01 0200 2200</div>
					</div>
				</div>
				<div class="work-info-item">
					<div class="work-info-icon">
						<span class="fa fa-calendar"></span>
					</div>
					<div class="work-info-body">
						<b style="font-weight: 700;">Nos horaires :</b>
						<div class="work-info-lead">Lundi - Vendredi, 08:00 - 17:00</div>
					</div>
				</div>
				<div class="work-info-item">
					<div class="work-info-icon">
						<span class="fa fa-envelope"></span>
					</div>
					<div class="work-info-body">
						<b style="font-weight: 700;">Pour plus d'informations, nous écrire :</b>
						<div class="work-info-lead"><a href="mailto:contact@pressingelegance.com" title="" style="color: white;">contact@pressingelegance.com</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- ABOUT SECTION -->
	<div class="section about" style="margin-bottom: 25px;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="page-title">
						<h2 class="lead">Pourquoi choisir ÉLÉGANCE PRESSING ?</h2>
						<p class="sublead">Bien de raisons font d'Elégance Pressing, le pressing</p>
					</div>
				</div>
			</div>

			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="why-item">
						<div class="icon">
							<div class="fa fa-check-square-o"></div>
						</div>
						<div class="ket">
							<h4>EFFICACITE</h4>
							<p style="text-align:justify;">Elégance Pressing dispose d'un personnel dynamique et très qualifié. Retrouvez l'éclat de vos vêtements, de vos habits; et repartez entièrement satisfait(e) avec vos linges, tout propres et traités avec soin.</p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="why-item">
						<div class="icon">
							<div class="fa fa-money"></div>
						</div>
						<div class="ket">
							<h4>DES PRIX ABORDABLES</h4>
							<p style="text-align:justify;">Vous vous souciez de combien débourser pour une chemise, une robe, bref vos linges au pressing; Nos tarifs à Elégance Pressing tiennent compte de chacun d'entre vous et sont accessible à tous. </p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="why-item">
						<div class="icon">
							<div class="fa fa-flash"></div>
						</div>
						<div class="ket">
							<h4>SERVICE EXPRESS</h4>
							<p style="text-align:justify;">Vous êtes pressez mais avez toutefois besoin d'un service rapide ? Aucun soucis pour vous ! À ÉLÉGANCE PRESSING, faites vous servir et livrer tout en propre, le tout en juste quelques heures</p>
						</div>
					</div>
				</div>
				<!-- <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="why-item">
						<div class="icon">
							<div class="fa fa-truck"></div>
						</div>
						<div class="ket">
							<h4>SERVICE DE LIVRAISON</h4>
							<p style="text-align:justify;">Vous avez vos linges ou autres à Elégance Pressing, vous êtes debordés et vous vous inquiétez de comment les retirer dans les temps ? Aucun soucis ! Notre service de livraison est à votre entière disposition</p>
						</div>
					</div>
				</div> -->
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="why-item">
						<div class="icon">
							<div class="fa fa-life-bouy"></div>
						</div>
						<div class="ket">
							<h4>UNE GARANTIE</h4>
							<p style="text-align:justify;"> Nous traitons votre linge avec les meilleurs soins. Nos garanties sont notre savoir faire et le goût de l'excellence.</p>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>




	<!-- SERVICES SECTION -->
	<div id="services" class="section services" style="background-color: beige;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="page-title">
						<h2 class="lead">Nos services</h2>
						<p class="sublead">ELEGANCE PRESSING met à votre disposition plusieurs services, tous sous une équipe <br>dotée d'une maîtrise incroyable en la matière</p>
					</div>
				</div>
			</div>

			<div class="row">

				<div class="col-sm-6 col-md-5 col-md-offset-0">
					<div class="services-item left">
						<div class="icon">
							<img src="<?php echo e(asset('website/images/lavage.jpg')); ?>" style="width: 105%;" alt="" class="img-circle" />
						</div>
						<div class="ket">
							<h4>LAVAGE</h4>
							<p>Lavez vos vêtements, vos habits et vos linges à Elégance Pressing à moindre coûts</p>
						</div>
					</div>
					<div class="services-item left">
						<div class="icon">
							<img src="<?php echo e(asset('website/images/pexels-pixabay-325876.jpg')); ?>" style="width: 105%;" alt="" class="img-circle" />
						</div>
						<div class="ket">
							<h4>RETOUCHERIE</h4>
							<p>Des soucis de retouches ou autres, contactez Elégence Pressing ! A votre entière disposition</p>
						</div>
					</div>
					<!-- <div class="services-item left">
						<div class="icon">
							<img src="public/website/images/home-service-img-3.jpg" alt="" class="img-circle" />
						</div>
						<div class="ket">
							<h4>BUSINESS LAUNDRY</h4>
							<p>Create and publish dynamic public/websites for dekstop and mobile devices.</p>
						</div>
					</div> -->

				</div>

				<div class="col-sm-6 col-md-5 col-md-offset-2">
					<div class="services-item right">
						<div class="icon">
							<img src="<?php echo e(asset('website/images/3.jpg')); ?>" style="width: 105%;" alt="" class="img-circle" />
						</div>
						<div class="ket">
							<h4>REPASSAGE</h4>
							<p>Le repassage c'est tout un métier à Elégance Pressing ; Toujours à votre service</p>
						</div>
					</div>
					<div class="services-item right">
						<div class="icon">
							<img src="<?php echo e(asset('website/images/OIP (1).jpg')); ?>" style="width: 105%;" alt="" class="img-circle" />
						</div>
						<div class="ket">
							<h4>EXPRESS</h4>
							<p>Pressez, mais besoin d'un service rapide ? Faites vous servir et livrer, le tout en quelques heures</p>
						</div>
					</div>
					<!-- <div class="services-item right">
						<div class="icon">
							<img src="public/website/images/OIP.jpg" style="width: 105%;" alt="" class="img-circle" />
						</div>
						<div class="ket">
							<h4>LIVRAISON</h4>
							<p>Soucis de déplacement ou un empêchement? Elégance Pressing vous assure la livraison</p>
						</div>
					</div> -->
					<!-- <div class="services-item right">
						<div class="icon">
							<img src="public/website/images/home-service-img-6.jpg" alt="" class="img-circle" />
						</div>
						<div class="ket">
							<h4>BUSINESS LAUNDRY</h4>
							<p>Create and publish dynamic public/websites for dekstop and mobile devices.</p>
						</div>
					</div> -->

				</div>

				<!-- <div class="col-sm-12 col-md-4 col-md-offset-4">
					<div class="services-item-image">
						<img src="public/website/images/R (1).jpg" alt="" />
					</div>
				</div> -->

			</div>

		</div>
	</div>


	<div class="section stat-client p-main" style="background:url('website/images/nveau.jpg'); background-size:cover; background-repeat:no-repeat; height:1000px; margin-bottom:3%;">
		<div class="container">
			<div class="row">

			</div>
		</div>
	</div>


	<div class="footer">

		<div class="f-desc">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-lg-offset-1">
						<div class="footer-item">
							<div class="footer-logo">
								<img src="<?php echo e(asset('website/images/elegance.jpeg')); ?>" style="height:60%; width:100%;" alt="" />
							</div>

						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-lg-offset-1">
						<div class="footer-item">
							<div class="footer-title">
								<h4>LIENS UTILES</h4>
							</div>
							<div class="footer-blog-item">
								<div class="footer-blog-lead">
									<a href="<?php echo e(asset('#')); ?>" title="">Accueil</a>
								</div>
								<!-- <div class="footer-blog-date">
									May 29, 2015
								</div> -->
							</div>
							<div class="footer-blog-item">
								<div class="footer-blog-lead">
									<a href="<?php echo e(asset('#services')); ?>" title="">Services</a>
								</div>
								<!-- <div class="footer-blog-date">
									May 29, 2015
								</div> -->
							</div>

							<div class="footer-blog-item">
								<div class="footer-blog-lead">
									<a href="<?php echo e(route('client.login')); ?>" title="">Espace client</a>
								</div>
								<!-- <div class="footer-blog-date">
									May 29, 2015
								</div> -->
							</div>

						</div>
					</div>
					<!-- <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<div class="footer-item">
							<div class="footer-title">
								<h4>NEWSLETTER</h4>
							</div>
							<div class="footer-form">
								<form action="#">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Votre nom">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Email">
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-default">ENVOYER</button>
									</div>

								</form>
							</div>

						</div>
					</div> -->
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<div class="footer-item">
							<div class="footer-title">
								<h4>CONTACTS</h4>
							</div>
							<div class="footer-getintouch">
								<div class="footer-getintouch-item">
									<div class="icon">
										<b class="fa fa-phone"></b>
									</div>
									<div class="desc" style="color: white;">
										<div class="desc-1"></div>
										<div class="desc-2"></div>
										<div class="desc-3"> +225 01 4188 8989 </div>
									</div>
								</div>
								<div class="footer-getintouch-item">
									<div class="icon">
										<b class="fa fa-envelope "></b>
									</div>
									<div class="desc" style="color: white;">
										<div class="desc-1"></div>
										<div class="desc-2"></div>
										<div class="desc-2"><a href="mailto:support@laundryes.com" title="" style="color: white;">contact@pressingelegance.com</a></div>
									</div>
								</div>
								<div class="footer-getintouch-item">
									<div class="icon">
										<b class="fa fa-globe"></b>
									</div>
									<div class="desc" style="color: white;">
										<div class="desc-1"></div>
										<div class="desc-2"></div>
										<div class="desc-2"> www.elegancepressing.com</div>
									</div>
								</div>
								<div class="footer-getintouch-item">
									<div class="icon">
										<b class="fa fa-map-marker"></b>
									</div>
									<div class="desc" style="color: white;">
										<div class="desc-1"></div>
										<div class="desc-2"></div>
										<div class="desc-4" style="line-height: 25px;">Route de Bingerville,<br>À 100 mètres sur la gauche,<br>Après le carrefour FEH KESSE,<br> Côte d'ivoire</div><br>
									</div>
								</div>

							</div>
						</div>

					</div>

				</div>
			</div>

		</div>

		<div class="fcopy">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="ftex">&copy; 2022 Elégance Pressing by Global SPARK LLC - Tous les droits sont réservés</p>
					</div>
				</div>
			</div>
		</div>

	</div>




	<script type="text/javascript" src="<?php echo e(asset('public/website/js/jquery.min.js')); ?>"></script>
	<script type='text/javascript' src='https://maps.google.com/maps/api/js?sensor=false&#038;ver=4.1.5'></script>
	<script type='text/javascript' src="<?php echo e(asset('public/website/js/jqBootstrapValidation.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('public/website/js/bootstrap.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('public/website/js/bootstrap-hover-dropdown.min.js')); ?>"></script>

	<script type="text/javascript" src="<?php echo e(asset('public/website/js/script.js')); ?>"></script>

</body>
</html>
<?php /**PATH C:\Users\kpoda\Desktop\templates\pressing\resources\views/welcome.blade.php ENDPATH**/ ?>