<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WordPress
* @subpackage Twenty_Seventeen
* @since 1.0
* @version 1.0
*/

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ayala Land Residential Business Group</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/responsive.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/themes.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/flickity.css">

	<!--[if lt IE 9]>
	<script src="js/html5.js"></script>
	<![endif]-->
	<!-- css3-mediaqueries.js for IE less than 9 -->
	<!--[if lt IE 9]>
	<script src="js/css3-mediaqueries.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body>
	<header class="inside">
		<a href="index.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ayalaland-logo.jpg" width="240" height="80" alt="Ayala Land logo"></a>
		<aside>
			<h1>Bank/Institutional Offers</h1>
		</aside>
	</header>
	<section class="property-finder">

		<label>Property Finder</label>
		<ul>
			<li>
				<select>
					<option>Project Type</option>
					<option>Lot</option>
					<option>Condominium</option>
					<option>House &amp; Lot</option>
					<option>Townhome</option>
					<option>Leisure Club Share</option>
					<option>Offices</option>
					<option>Estates</option>
					<option>Shophouse Development</option>
					<option>Commercial Lots</option>
					<option>Leisure</option>
				</select>
			</li>
			<li>
				<select>
					<option>Price Range</option>
					<option>500K - 1M</option>
					<option>1M - 2M</option>
					<option>2M - 3M</option>
					<option>3M - 4M</option>
					<option>4M - 5M</option>
					<option>5M - 6M</option>
					<option>6M - 7M</option>
					<option>7M - 8M</option>
					<option>8M - 9M</option>
					<option>9M - 10M</option>
					<option>10M - 12M</option>
					<option>12M - 14M</option>
					<option>14M - 16M</option>
					<option>16M - 18M</option>
					<option>18M - 20M</option>
					<option>20M - 25M</option>
					<option>25M - 30M</option>
					<option>30M - ABOVE</option>
				</select>
			</li>
			<li>
				<select>
					<option>Location</option>
					<option>Alabang</option>
					<option>Bacolod</option>
					<option>Bataan</option>
					<option>Batangas</option>
					<option>Bonifacio Global City</option>
					<option>Bulacan</option>
					<option>Cagayan de Oro</option>
					<option>Caloocan City</option>
					<option>Camarines Sur</option>
					<option>Cavite</option>
					<option>Cebu</option>
					<option>Cebu City</option>
					<option>Davao</option>
					<option>Iloilo</option>
					<option>Laguna</option>
					<option>Makati City</option>
					<option>Mandaluyong City</option>
					<option>Mandaue City</option>
					<option>Manila</option>
					<option>Muntinlupa City</option>
					<option>Negros Occidental</option>
					<option>Nueva Ecija</option>
					<option>Nuvali</option>
					<option>Pampanga</option>
					<option>Pangasinan</option>
					<option>Paranaque City</option>
					<option>Pasay City</option>
					<option>Pasig City</option>
					<option>Pulilan, Bulacan</option>
					<option>Quezon</option>
					<option>Quezon City</option>
					<option>Tagaytay</option>
					<option>Taguig</option>
					<option>Taguig City</option>
					<option>Tarlac</option>
				</select>
			</li>
			<li>
				<input type="submit" name="searchbtn" value="SEARCH" >
			</li>
		</ul>

	</section>
