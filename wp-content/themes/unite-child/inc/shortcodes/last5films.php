<?php
/**
 * The template to show Last 5 Films shortcode - [last5films]
 *
 */
$atts = Films::app_get_prop( 'shortcode_last5films_atts' );
$args = array( 
   'post_type' => 'film',
   'orderby' => 'date',
   'order'	=> 'desc',
);
wp_reset_query();
$query = new WP_Query( $args );
wp_reset_query();
$atts["data"] = $query->posts;

// print_r($atts["data"]);
foreach($atts["data"] as $dt): 
	?>
	<div class="row">
		<?php
		$post_id = $dt->ID;
		$post = get_post( $post_id );
		$link = get_permalink( $post_id );
		$dt_genres = wp_get_post_terms( $post_id, 'film-genre' );
		$dt_countries = wp_get_post_terms( $post_id, 'film-country' );
		?>
		<div class="col-md-4">
			<a href="<?php echo $link; ?>" target="_blank">
			<?php
			if ( has_post_thumbnail( $post->ID ) ) {
	            $img = get_the_post_thumbnail_url( $post_id, 'full' );
	            if( $img == "" ){
	                echo "";
	            }else{
	                echo "<img style='height:110px' alt='".$dt->post_title."' class='img-responsive' src='".$img."' alt='".$dt->post_title."' />";
	                
	            }
	        }
			?>
			</a>
		</div>
		<div class="col-md-8">
			<h4><a href="<?php echo $link; ?>" target="_blank"><?php echo $dt->post_title; ?></a></h4>
			<?php 
			foreach( $dt_genres as $dt_genre ) {
		    	echo '<label class="label label-info">'.$dt_genre->name .'</label> ';
			}
			foreach( $dt_countries as $dt_country ) {
		    	echo '<label class="label label-warning">'.$dt_country->name .'</label> ';
			}

			$release_date_value = get_post_meta( $post_id , 'release_date', true ); 
			if ( ! empty( $release_date_value ) ) { 
			    echo "<p>Release date: ". substr($release_date_value, 6 , 2) ."-". substr($release_date_value, 4 , 2) ."-".substr($release_date_value, 0 , 4) ."</p>";
			}
			$price_value = get_post_meta( $post_id , 'ticket_price', true ); 
			if ( ! empty( $price_value ) ) { 
			    echo "<p>Ticket Price: $". $price_value ."</p>";
			}
		?>
		</div>
	</div>
	<?php
endforeach;
