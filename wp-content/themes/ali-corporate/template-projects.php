<?php
/* Template Name: Projects */

$brands = isset($_GET['brand']); # Check to see if brands are set

$location_obj = get_page_by_title( $_GET['location'], OBJECT, 'location');
$location_ID = @$location_obj->ID;

//////////////////////////
//                      //
// Meta query filters!  //
//                      //
//////////////////////////

if($_GET['property_type'] != null){
  $property_type_filter = array(
    'key' => 'project_type',
    'value' => @$_GET['property_type'],
    'compare' => 'LIKE' # Minor BUG: Equal doesn't work. So we use like since this is checkbox :/
    );
}else{
  $property_type_filter = [];
}

if($_GET['location'] != null){
  $location_filter = array(
    'key' => 'location',
    'value' => $location_ID, # should be the ID of locaton
    'compare' => 'LIKE'
    );
}else{
  $location_filter = [];
}

if($_GET['brand'] != null){
  $brand_filter = array(
    'key' => 'brand',
    'value' => @$_GET['brand'],
    'compare' => 'LIKE'
    );
}else{
  $brand_filter = [];
}

if($_GET['price_range'] != null){
  $price_range = explode('-', $_GET['price_range']);
  $lower = $price_range[0];
  $higher = $price_range[1];

  $price_range_filter_min = array(
    'key' => 'min_price',
    'value' => array($lower, $higher),
    'compare' => 'BETWEEN',
    'type' => 'NUMERIC'
    );

  $price_range_filter_max = array(
    'key' => 'max_price',
    'value' => array($lower, $higher),
    'compare' => 'BETWEEN',
    'type' => 'NUMERIC'
    );

  if($higher == 'ABOVE'){
    $price_range_filter_max = array(
      'key' => 'max_price',
      'value' => 30000001, # HACK: Harharhar 
      'compare' => '>=',
      'type' => 'NUMERIC'
      );
  }

  $price_range_filter = array(
    'relation' => 'OR',
    $price_range_filter_min,
    $price_range_filter_max,
    );

}else{
  $price_range_filter = [];
}

////////////////////////////
//                        //
// End meta query filters //
//                        //
////////////////////////////

get_header();
while(have_posts()): the_post();

include_once('function-pagination.php');
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

?>

<section class="projects">
  <article class="properties">
    <?php if($brands): ?>
      <aside>
        <ul>
          <li class="<?php echo ($_GET['brand'] == 'alp') ? 'active' : '' ;?>"><a href="<?php echo get_permalink(47) . "?brand=alp" ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/alp.jpg"></a></li>
          <li class="<?php echo ($_GET['brand'] == 'alveo') ? 'active' : '' ;?>"><a href="<?php echo get_permalink(47) . "?brand=alveo" ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/alveo.jpg"></a></li>
          <li class="<?php echo ($_GET['brand'] == 'avida') ? 'active' : '' ;?>"><a href="<?php echo get_permalink(47) . "?brand=avida" ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/avida.jpg"></a></li>
          <li class="<?php echo ($_GET['brand'] == 'amaia') ? 'active' : '' ;?>"><a href="<?php echo get_permalink(47) . "?brand=amaia" ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/amaia.jpg"></a></li>
          <li class="<?php echo ($_GET['brand'] == 'bellavita') ? 'active' : '' ;?>"><a href="<?php echo get_permalink(47) . "?brand=bellavita" ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/bellavita.jpg"></a></li>
        </ul>
      </aside>
    <?php endif; ?>
    <div>
      <ul>

        <?php
        $args = array('post_type' => 'project', 'posts_per_page' => 12, 'paged' => $paged);
        $args['meta_query'] = array( 'relation' => 'AND' );
        if($brand_filter !== []){
          $args['meta_query'][] = $brand_filter;
        }
        if($location_filter !== []){
          $args['meta_query'][] = $location_filter;
        }
        if($property_type_filter !== []){
          $args['meta_query'][] = $property_type_filter;
        }
        if($price_range_filter !== []){
          $args['meta_query'][] = $price_range_filter;
        }

        $the_query = new WP_Query($args);
        if ( $the_query->have_posts() ) {  while ( $the_query->have_posts() ): $the_query->the_post(); ?>

        <li>
          <a href=".projdesc<?php echo get_the_ID(); ?>" class="desc">
            <figure>
              <img src="<?php the_post_thumbnail_url(); ?>">
            </figure>
            <figcaption>
              <h4><?php the_title();?></h4>
              <span class="price">
                <h6>Starting at</h6>
                <h5><?php echo formatPrice(get_field('min_price')); ?></h5>
              </span>
              <span class="type-location">
                <p><?php echo implode(", ", get_field('project_type')); ?></p>
                <p><?php echo get_field('location')->post_title; ?></p>
              </span>
            </figcaption>
          </a>
        </li>

        <!-- Project Details -->
        <div id="projdesc" class="white-popup mfp-hide projdesc<?php echo get_the_ID(); ?>">
          <h3><?php the_title();?></h3>
          <div>
            <figure>
              <img src="<?php the_field('details_photo'); ?>">
            </figure>
            <article>
              <ul>
                <li>
                  <h6>Price:</h6>
                  <p><?php echo formatPrice(get_field('min_price')); ?> -
                    <?php echo formatPrice(get_field('max_price')); ?></p>
                  </li>
                  <li>
                    <h6>Location:</h6>
                    <p><?php echo get_field('location')->post_title; ?></p>
                  </li>
                  <li>
                    <h6>Type:</h6>
                    <p><?php echo implode(", ", get_field('project_type')); ?></p>
                  </li>
                  <li>
                    <h6>Size:</h6>
                    <p><?php the_field('size'); ?></p>
                  </li>
                  <li><a href="<?php the_field('external_link'); ?>">View Project</a></li>
                </ul>

              </article>
              <aside>
                <ul>
                  <li><a href="inquire-now.html">Inquire Now</a></li>
                  <li><a href="#">Refer Now</a></li>
                  <li><a href="#">Download Forms</a></li>
                </ul>
              </aside>
            </div>
          </div>
          <!-- Project Details -->
        <?php endwhile; wp_reset_postdata(); } else { ?>

        <li>
          <div style="height:400px; width: 300px; color:#000;">
            No results found :( <br>
            Perhaps try some different search parameters?
          </div>
        </li>

        <?php } ?>
      </ul>
    </div>
    <section>
      <ul>
        <?php
        if (function_exists(custom_pagination)) {
          custom_pagination($the_query->max_num_pages,"",$paged);
        }
        ?>
      </ul>
    </section>
  </article>

  <div class="other-links">
    <ul>
      <li><a href="inquire-now.html"><span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/inquire.png"></span><label>INQUIRE NOW</label></a></li>
      <li><a href="#purchase"><span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/purchase.png"></span><label>PROPERTY PURCHASE GUIDE</label></a></li>
      <li><a href="#homestarter"><span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/bond.png"></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/homestarterbond.png" class="bonds"></a></li>
      <li><a href="#rewards"><span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arc.png"></span><label>AYALA REWARDS CIRCLE</label></a></li>

    </ul>
  </div>
</section>

<?php
endwhile;
get_footer();
