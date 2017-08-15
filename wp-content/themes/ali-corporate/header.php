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

/**
* Returns the price rounded up with English shortcut
* such as K, M, B
* @param  int     $n    unformatted price
* @return string        [description]
*/
function formatPrice($n)
{
	if ($n < 1000000) {
		// Anything less than a million
		$f = round(number_format($n / 1000, 3), 2);
		$f .= 'K';
	} else if ($n < 1000000000) {
		// Anything less than a billion
		$f = round(number_format($n / 1000000, 3), 2);
		$f .= 'M';
	} else {
		// At least a billion
		$f = round(number_format($n / 1000000000, 3), 2);
		$f .= 'B';
	}
	return 'P' . $f;
}
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
		<a href="<?php echo site_url() ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ayalaland-logo.jpg" width="240" height="80" alt="Ayala Land logo"></a>
		<aside>
			<h1>Bank/Institutional Offers</h1>
		</aside>
	</header>
	<section class="property-finder">
		<form action="<?php echo get_permalink(47) ?>" method="get">
			<label>Property Finder</label>
			<ul>
				<li>
					<select name="property_type">
						<option value="">Property Type</option>
						<?php
						$field_key = "field_59914624f4ae2";
						$field = get_field_object($field_key);
						if($field){
							foreach( $field['choices'] as $choice ) {  ?>
								<option <?php echo (@$_GET['property_type'] == $choice) ? 'selected' : '' ;?> ><?php echo $choice; ?></option>
							<?php  }
						}
						?>
					</select>
				</li>
				<li>
					<select name="price_range">
						<option value="">Price Range</option>
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
					<select name="location">
						<option value="">Location</option>
						<?php
						$args = array('post_type' => 'location', 'posts_per_page' => -1, 'order' => 'ASC');
						$the_query = new WP_Query($args);
						if ( $the_query->have_posts() ) {  while ( $the_query->have_posts() ): $the_query->the_post(); ?>
							<option <?php echo (@$_GET['location'] == get_the_title()) ? 'selected' : '' ;?> ><?php the_title(); ?></option>
						<?php endwhile; wp_reset_postdata(); } else { /** no posts found **/ } ?>
					</select>
				</li>
				<li>
					<input type="submit" >
				</li>
			</ul>
		</form>
	</section>
