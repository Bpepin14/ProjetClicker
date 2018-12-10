<?php
session_start();
try
{
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
}

catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

include 'connect.php';


?>

<!doctype html>
<html class="no-js" lang="en-US">
<head>

	<!-- meta -->
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1">

	<!-- Uncomment the meta tags you are going to use! Be relevant and don't spam! -->

	<meta name="keywords" content="premium html template, unique premium template, multipurpose template" />
	<meta name="description" content="Kallyas is an ultra-premium, responsive theme built for todays websites. Create your website, fast.">

	<!-- Title -->
	<title>Le blog d'Alex</title>

	<!-- Url of your website (without extra pages) 
    <link rel="canonical" href="http://www.hogash-demos.com/kallyas_html/" />
    -->

    <!-- Restrict google from scanning info from Dmoz or YahooDir
    More here: http://www.seoboy.com/what-are-the-meta-tags-noodp-and-noydir-used-for-in-seo/
    Also more on robots here https://yoast.com/articles/robots-meta-tags/ 
    <meta name="robots" content="noodp,noydir"/>
    -->

    <!--
    Social media tags and more >>>>> http://moz.com/blog/meta-data-templates-123 <<<<<
    Debugging tools:
    - https://dev.twitter.com/docs/cards/validation/validator
    - https://developers.facebook.com/tools/debug
    - http://www.google.com/webmasters/tools/richsnippets
    - http://developers.pinterest.com/rich_pins/validator/
    -->

    <!-- Google Authorship and Publisher Markup. You can also simply add your name.
    Author = Owner, Publisher = who built the website. Add profile url in href="".
    Profile url example: https://plus.google.com/1130658794498306186 or replace [Google+_Profile] below with your profile # 
    <link rel="author" href="https://plus.google.com/[Google+_Profile]/posts"/>
    <link rel="publisher" href="https://plus.google.com/[Google+_Page_Profile]"/>
    -->

    <!-- Schema.org markup for Google+ 
    <meta itemprop="name" content="Kallyas Premium Template">
    <meta itemprop="description" content="This is the page description">
    <meta itemprop="image" content="">
    -->

    <!-- Open Graph Protocol meta tags.
    Used mostly for Facebook, more here http://ogp.me/ 
    <meta property="og:locale" content="en"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Kallyas Premium Template"/>
    <meta property="og:description" content="Kallyas is an ultra-premium, responsive theme built for todays websites."/>
    <meta property="og:site_name" content="Kallyas Premium Template"/>
    -->

    <!-- Url of your website 
    <meta property="og:url" content=""/>
    -->

    <!-- Representative image 
    <meta property="og:image" content=""/>
    -->

    <!-- Twitter Cards
    Will generate a card based on the info below.
    More here: http://davidwalsh.name/twitter-cards or https://dev.twitter.com/docs/cards 
    <meta name="twitter:card" content="summary">
    -->

    <!-- Representative image 
    <meta name="twitter:image" content="">
    <meta name="twitter:domain" content="hogash.com">
    <meta name="twitter:site" content="@hogash">
    <meta name="twitter:creator" content="@hogash">
    -->

    <!-- Url of your website 
    <meta name="twitter:url" content="">
    <meta name="twitter:title" content="How to Create a Twitter Card">
    <meta name="twitter:description" content="Twitter's new Twitter Cards API allows developers to add META tags to their website, and Twitter will build card content from links to a given site.">
    -->

    <!-- GeoLocation Meta Tags / Geotagging. Used for custom results in Google.
    Generator here http://mygeoposition.com/ 
    <meta name="geo.placename" content="Chicago, IL, USA" />
    <meta name="geo.position" content="41.8781140;-87.6297980" />
    <meta name="geo.region" content="US-Illinois" />
    <meta name="ICBM" content="41.8781140, -87.6297980" />
    -->

    <!-- Dublin Core Metadata Element Set
    Using DC metadata is advantageous from an SEO perspective because search engines might interpret the extra code as an effort to make page content as descriptive and relevant as possible.
    
    <link rel="schema.DC" href="http://purl.org/DC/elements/1.0/" />
    <meta name="DC.Title" content="Kallyas Premium Template, Kallyas Responsive Template" />
    <meta name="DC.Creator" content="hogash" />
    <meta name="DC.Type" content="software" />
    <meta name="DC.Date" content="2015-10-01" />
    <meta name="DC.Format" content="text/html" />
    <meta name="DC.Language" content="en" />
    -->

    <!-- end descriptive meta tags -->

    <!-- Retina Images -->
    <!-- Simply uncomment to use this script !! More here http://retina-images.complexcompulsions.com/
    <script>(function(w){var dpr=((w.devicePixelRatio===undefined)?1:w.devicePixelRatio);if(!!w.navigator.standalone){var r=new XMLHttpRequest();r.open('GET','/retinaimages.php?devicePixelRatio='+dpr,false);r.send()}else{document.cookie='devicePixelRatio='+dpr+'; path=/'}})(window)</script>
    <noscript><style id="devicePixelRatio" media="only screen and (-moz-min-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min-device-pixel-ratio: 2)">html{background-image:url("php-helpers/_retinaimages.php?devicePixelRatio=2")}</style></noscript>-->
    <!-- End Retina Images -->

    <!-- iDevices & Retina Favicons 
    <link rel="apple-touch-icon" href="images/favicons/apple-touch-icon-144-precomposed.png" sizes="144x144">
    <link rel="apple-touch-icon" href="images/favicons/apple-touch-icon-114-precomposed.png" sizes="114x114">
    <link rel="apple-touch-icon" href="images/favicons/apple-touch-icon-72-precomposed.png" sizes="72x72">
    <link rel="apple-touch-icon" href="apple-touch-icon-57-precomposed.png" sizes="57x57">-->

	<!--  Desktop Favicons  -->
	<link rel="icon" type="image/png" href="images/favicons/favicon-16x16.png" sizes="16x16">
	<!-- <link rel="icon" type="image/png" href="images/favicons/favicon-32x32.png" sizes="32x32"> -->
	<!-- <link rel="icon" type="image/png" href="images/favicons/favicon-96x96.png" sizes="96x96"> -->

	<!-- Google Fonts CSS Stylesheet // More here http://www.google.com/fonts#UsePlace:use/Collection:Open+Sans -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,600italic,700,800,800italic" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	<!-- ***** Boostrap Custom / Addons Stylesheets ***** -->
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">

	<!-- ***** Main + Responsive & Base sizing CSS Stylesheet ***** -->
	<link rel="stylesheet" href="css/template.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/base-sizing.css" type="text/css" media="all">

	<!-- Custom CSS Stylesheet (where you should add your own css rules) -->
	<link rel="stylesheet" href="css/custom.css" type="text/css" />

	<!-- Modernizr Library -->
	<script type="text/javascript" src="js/modernizr.min.js"></script>

	<!-- jQuery Library -->
	<script type="text/javascript" src="js/jquery.js"></script>

</head>

<body class="">
	

	


	<!-- Page Wrapper -->
	<div id="page_wrapper">
		<!-- Header style 1 -->
		<header id="header" class="site-header style1 cta_button">
			<!-- header bg -->
			<div class="kl-header-bg"></div>
			<!--/ header bg -->

			<!-- siteheader-container -->
			<div class="container siteheader-container">
				<!-- top-header -->
				<div class="kl-top-header clearfix">
					<!-- HEADER ACTION -->
					<div class="header-links-container ">
						<ul class="topnav navRight topnav">
							<!-- Login trigger -->
							<li>
								<a href="index.php">
									<i class="glyphicon glyphicon-log-in visible-xs xs-icon"></i>
									<span class="hidden-xs">Connexion</span>
								</a>
							</li>
							<!--/ Login trigger -->			
						</ul>


						<!-- header search -->
						<div id="search" class="header-search">
							<a href="#" class="searchBtn "><span class="glyphicon glyphicon-search icon-white"></span></a>
							<div class="search-container">
								<form id="searchform" class="header-searchform" action="https://www.google.ro/search" method="get" target="_blank">
								<input type="hidden" id="q" name="q"/>
									<input name="s" maxlength="20" class="inputbox" type="text" size="20" value="SEARCH ..." onblur="if (this.value=='') this.value='SEARCH ...';" onfocus="if (this.value=='SEARCH ...') this.value='';">
									<button type="submit" id="searchsubmit" class="searchsubmit glyphicon glyphicon-search icon-white"></button>
								</form>
							</div>
						</div>
						<!--/ header search -->
					</div>
					<!--/ HEADER ACTION -->

					<!-- HEADER ACTION left -->
					<div class="header-leftside-container ">
						<!-- Header Social links -->
						<ul class="social-icons sc--clean topnav navRight">
							<li><a href="#" target="_self" class="icon-facebook" title="Facebook"></a></li>
							<li><a href="#" target="_self" class="icon-twitter" title="Twitter"></a></li>	
						</ul>
						<!--/ Header Social links -->

						<div class="clearfix visible-xxs">
						</div>

						
					</div>
					<!--/ HEADER ACTION left -->
				</div>
				<!--/ top-header -->
				
			

				<!-- left side -->
				<!-- logo container-->
				<div class="logo-container  logosize--yes">
					<!-- Logo -->
					<h1 class="site-logo logo" id="logo">
						<a href="index.html" title="">
							<img src="assets/logo.png" class="logo-img" alt="Le blog d'Alex" title="Le blog d'Alex" />
						</a>
					</h1>
					<!--/ Logo -->

				

				</div>
				<!--/ logo container-->

			

				<!-- responsive menu trigger -->
				<div id="zn-res-menuwrapper">
					<a href="#" class="zn-res-trigger zn-header-icon"></a>
				</div>
				<!--/ responsive menu trigger -->

				<!-- main menu -->
				<div id="main-menu" class="main-nav zn_mega_wrapper ">
					<ul id="menu-main-menu" class="main-menu zn_mega_menu">
						<li class="menu-item-has-children menu-item-mega-parent"><a href="index.php">Accueil</a>
							
						</li>
						<li class="menu-item-has-children"><a href="#">Marketing Digital</a>
							<ul class="sub-menu clearfix">
									<li><a href="shop-landing-page-default.html">SEO</a></li>
									<li><a href="shop-landing-page-alternative.html">SEA</a></li>
									<li><a href="shop-landing-page-classic.html">AFFILIATION</a></li>
									<li><a href="product-category.html">EMAILING</a></li>
									<li><a href="product-page.html">VIDEOS</a></li>
									<li><a href="product-page-no-sidebar.html">ANALYSER SON AUDIENCE</a></li>
								</ul>
								
						</li>
						<li class="menu-item-has-children"><a href="#">Côté obscur</a>
							<ul class="sub-menu clearfix">
									<li><a href="shop-landing-page-default.html">SITES INTERNET</a></li>
									<li><a href="shop-landing-page-alternative.html">APPLICATIONS</a></li>
									<li><a href="shop-landing-page-classic.html">EMAILS</a></li>
								</ul>
						</li>
						<li class="menu-item-has-children"><a href="#">Resources</a>
							<ul class="sub-menu clearfix">
									<li><a href="shop-landing-page-default.html">NOMS DE DOMAINE ET HEBERGEMENT</a></li>
									<li><a href="shop-landing-page-alternative.html">EMAILINGS</a></li>
									<li><a href="shop-landing-page-classic.html">MONETISER SON SITE WEB</a></li>
									<li><a href="product-category.html">CONCEPTION WEB</a></li>
									<li><a href="product-category.html">CONCEPTION GRAPHIQUE ET VIDEO</a></li>
								</ul>
						</li>
						
				</div>
				<!--/ main menu -->

				
				<!-- separator -->
				<div class="separator"></div>
				<!--/ separator -->

			</div>
			<!--/ siteheader-container -->
		</header>
		<!-- / Header style 1 -->


		<!-- Page sub-header -->
		<div id="page_header" class="page-subheader">
			<div class="bgback"></div>

			<!-- Animated Sparkles -->
			<div class="th-sparkles"></div>
			<!--/ Animated Sparkles -->

			<!-- Sub-Header content wrapper -->
			<div class="ph-content-wrap">
				<div class="ph-content-v-center">
					<div class="container">
						<div class="row">
							<div class="col-sm-6">
								<!-- Breadcrumbs -->
								<ul class="breadcrumbs fixclear">
									<li><a href="index.php">Accueil</a></li>
									<li><a href="connexion.php">Connexion</a></li>
									<
								</ul>
								<!--/ Breadcrumbs -->

								
								<div class="clearfix"></div>
							</div>
							<!--/ col-sm-6 -->

							<div class="col-sm-6">
								<!-- Sub-header titles -->
								<div class="subheader-titles">
									<h2 class="subheader-maintitle">Connexion</h2>
								</div>
								<!--/ Sub-header titles -->
							</div>
							<!--/ col-sm-6 -->
						</div>
						<!--/ row -->
					</div>
					<!--/ container -->
				</div>
				<!--/ .ph-content-v-center -->
			</div>
			<!--/ Sub-Header content wrapper -->
		</div>
        <!--/ Page sub-header -->

<header class="bg">
            <div align="center"></div>
         <h2 style="text-align:center;">Connexion</h2>
   </header>
           </div>
         <br /><br />

         <br /><br />
         <div align="center">
         <form method="POST" action="">
                 <table>
				 <tr>
                  <td align="right">
                     <label for="mail">Adresse mail:</label>
                  </td>
                  <td>
                     <input type="email" class="form-control" id="mailconnect" name="mailconnect" placeholder="Votre mail"  />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="password">Mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" class="form-control" id="mdpconnect" name="mdpconnect" placeholder="Votre mot de passe"  />
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <button type="submit" class="btn btn-success" name="formconnexion">Connexion !</button> <br/>
                  </td>
               </tr>
            </table>
		 </form>
		 <br/>
         <div class="bouton" align="center">
         <button type="submit" class="btn btn-info" name="editbutton"><a href="inscription.php" style="color:white">Pas encore inscrit?</a></button> <br/>
         <br/>
         <button type="submit" class="btn btn-info" name="editbutton"><a href="index.php" style="color:white">Accueil</a></button>
         </div>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
       </div>

      <!-- Footer - Default Style -->
		<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div>
							<h4 class="title m_title">ACCES RAPIDE</h4>
							<div class="sbs">
								<ul class="menu">
									<li><a href="#">Marketing Digital</a></li>
									<li><a href="#">Côté Obscur</a></li>
									<li><a href="#">Resources</a></li>
									<li><a href="#">Contact</a></li>
									<li><a href="#">Mentions légales</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!--/ col-sm-5 -->

					<div class="col-sm-4">
						<div class="newsletter-signup">
							<h3 class="title m_title">NEWSLETTER</h3>
							<p>Reçois les dernières news et mises à jour du site.

								</p>
							<form action="http://YOUR_USERNAME.DATASERVER.list-manage.com/subscribe/post-json?u=YOUR_API_KEY&amp;id=LIST_ID&c=?" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
								<input type="email" value="" name="EMAIL" class="nl-email form-control" id="mce-EMAIL" placeholder="votre.adresse@email.com" required>
		                        <input type="submit" name="subscribe" class="nl-submit" id="mc-embedded-subscribe" value="S'inscrire">
		                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
		                        <div style="position: absolute; left: -5000px;">
		                            <input type="text" name="b_xxxxxxxxxxxxxxxxxxxCUSTOMxxxxxxxxx" value="">
		                        </div>
							</form>	
							<div id="notification_container"></div>
							<p>Pas de partage de données et pas de spam ;) <br>
									Un lien de désinscription est présent dans l'ensemble des messages.</p>
						</div><!-- end newsletter-signup -->
					</div>
					<!-- col-sm-4 -->

					<div class="col-sm-3">
						<div>
							<h3 class="title m_title">MARKETING WARS</h3>
							<div class="contact-details"> <p>Rue de Loucelles<br>
								14250 Ducy-Ste-Marguerite <br/>
								Email: <a href="#">contact@marketing-wars.com</a></p>
								
								</p>
							</div>
						</div>
					</div>
					<!--/ col-sm-3 -->
				</div>
				<!--/ row -->

			
				

				<div class="row">
					<div class="col-sm-12">
						<div class="bottom clearfix"></div>
							<!-- social-icons -->
							<ul class="social-icons sc--clean clearfix">
								<li class="title">Réseaux Sociaux</li>
								<li><a href="#" target="_self" class="icon-facebook" title="Facebook"></a></li>
								<li><a href="#" target="_self" class="icon-twitter" title="Twitter"></a></li>	
							</ul>
							<!--/ social-icons -->

							<!-- copyright -->
							<div class="copyright">
								
								<p>© 2018 - Marketing Wars- Tous droits réservés</p>
							</div>
							<!--/ copyright -->
							<center><a href="KallyasFinal/index.html" title="Le blog d'Alex">
								<img src="assets/logo.png" alt="Logo Marketing Wars">
							</a></center>
						</div>
						<!--/ bottom -->
					</div>
					<!--/ col-sm-12 -->
				</div>
				<!--/ row -->
			</div>
			<!--/ container -->
		</footer>
		<!--/ Footer - Default Style -->
	</div>
	<!--/ Page Wrapper -->
   </body>