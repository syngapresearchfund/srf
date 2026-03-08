<?php
/**
 * Front page template.
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

use WP_Query;

get_header();
?>
<!-- ========================= -->
<!-- hero section -->
<!-- ========================= -->
<section class="relative bg-gradient-to-br from-srf-purple-500 via-srf-blue-500 to-srf-green-500 overflow-y-hidden">
	<img class="absolute block w-full h-full object-cover opacity-10"
		src="<?php echo esc_url( get_theme_file_uri( 'assets/images/home-hero-bg-image.png' ) ); ?>"
		alt="CURE SYNGAP1 Warrior Grid" />
	<div class=" relative container mx-auto px-6 lg:px-0 py-24 lg:py-36 text-center text-white z-10">
		<h1 class="mb-6 text-4xl lg:text-5xl font-extrabold">
			Collaboration. Transparency. Urgency.
		</h1>
		<p class="lg:w-1/2 lg:mx-auto mb-8 text-lg">CURE SYNGAP1 is a global group of families
			committed
			to accelerating the science to cure SYNGAP1 & to supporting each other.</p>
		<a href="<?php echo esc_url( home_url( '/what-is-syngap1/' ) ); ?>"
			class="font-sans inline-block py-3 px-12 rounded  hover:bg-white text-white hover:text-srf-blue-500 border-2 border-white font-bold text-lg tracking-wide transition duration-500">Learn
			more about SYNGAP1</a>
	</div>
</section>

<!-- ========================= -->
<!-- Announcement bar -->
<!-- ========================= -->
<?php esc_html( srf_homepage_announcement_banner() ); ?>

<!-- ========================= -->
<!-- Events section -->
<!-- ========================= -->
<section class="relative py-32 bg-white">
	<div class="container mx-auto px-10 text-center">
		<h2 class="mb-10 mx-auto font-extrabold text-center text-3xl lg:text-4xl text-gray-600">Upcoming Events &
			Webinars</h2>
		<?php
		/**
		 * TODO: Move grid container here, below H2. Then move query logic into template tags,
		 * separating one for featured event and another for the rest of the events + webinars.
		 * Also be sure to order by the date field in DECS order.
		 */
		?>
		<div class="max-w-6xl xl:grid grid-cols-6 gap-5 space-y-8 xl:space-y-0 mx-auto mb-10 text-gray-600 text-left">
			<?php
			// Featured upcoming events.
			$featured_upcoming_args = array(
				'posts_per_page' => 1,
				'order'          => 'ASC',
				'orderby'        => 'event_date',
				'start_date'     => 'now',
				'featured'       => true,
				'tax_query'      => array(
					array(
						'taxonomy' => 'tribe_events_cat',
						'field'    => 'slug',
						'terms'    => array( 'meeting' ),
						'operator' => 'NOT IN',
					),
				),
			);
			$featured_upcoming      = tribe_get_events( $featured_upcoming_args );

			// Featured ongoing events (started before now, end after now).
			$featured_ongoing_args = array(
				'posts_per_page' => 1,
				'featured'       => true,
				'tax_query'      => array(
					array(
						'taxonomy' => 'tribe_events_cat',
						'field'    => 'slug',
						'terms'    => array( 'meeting' ),
						'operator' => 'NOT IN',
					),
				),
				'meta_query'     => array(
					'relation' => 'AND',
					array(
						'key'     => '_EventStartDate',
						'value'   => current_time( 'mysql' ),
						'compare' => '<=',
						'type'    => 'DATETIME',
					),
					array(
						'key'     => '_EventEndDate',
						'value'   => current_time( 'mysql' ),
						'compare' => '>',
						'type'    => 'DATETIME',
					),
				),
			);
			$featured_ongoing      = tribe_get_events( $featured_ongoing_args );

			// Merge, deduplicate by ID, sort by start date, and take the first featured event.
			$merged_featured   = array_merge( $featured_ongoing, $featured_upcoming );
			$unique_featured   = array();
			$seen_featured_ids = array();
			foreach ( $merged_featured as $event ) {
				if ( ! in_array( $event->ID, $seen_featured_ids, true ) ) {
					$unique_featured[]   = $event;
					$seen_featured_ids[] = $event->ID;
				}
			}
			usort( $unique_featured, function ( $a, $b ) {
				$date_a = get_post_meta( $a->ID, '_EventStartDate', true );
				$date_b = get_post_meta( $b->ID, '_EventStartDate', true );
				return strtotime( $date_a ) - strtotime( $date_b );
			} );
			$featured_events_query = array_slice( $unique_featured, 0, 1 );

			if ( ! empty( $featured_events_query ) ) :
				/* Start the Loop */
				foreach ( $featured_events_query as $event ) :
					$GLOBALS['post'] = $event;
					setup_postdata( $event );

					/**
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'events-featured' );
				endforeach;
			endif;
			/* Restore original Post Data */
			wp_reset_postdata();

			// Exclude the featured event from the grid to avoid duplication.
			$excluded_ids = ! empty( $featured_events_query ) ? array( $featured_events_query[0]->ID ) : array();

			// Upcoming events (all categories, excluding the featured slot).
			$events_upcoming_args = array(
				'posts_per_page' => 6,
				'order'          => 'ASC',
				'orderby'        => 'event_date',
				'start_date'     => 'now',
				'post__not_in'   => $excluded_ids,
				'tax_query'      => array(
					array(
						'taxonomy' => 'tribe_events_cat',
						'field'    => 'slug',
						'terms'    => array( 'meeting' ),
						'operator' => 'NOT IN',
					),
				),
			);
			$events_upcoming      = tribe_get_events( $events_upcoming_args );

			// Ongoing events (started before now, end after now, excluding the featured slot).
			$events_ongoing_args = array(
				'posts_per_page' => 6,
				'post__not_in'   => $excluded_ids,
				'tax_query'      => array(
					array(
						'taxonomy' => 'tribe_events_cat',
						'field'    => 'slug',
						'terms'    => array( 'meeting' ),
						'operator' => 'NOT IN',
					),
				),
				'meta_query'     => array(
					'relation' => 'AND',
					array(
						'key'     => '_EventStartDate',
						'value'   => current_time( 'mysql' ),
						'compare' => '<=',
						'type'    => 'DATETIME',
					),
					array(
						'key'     => '_EventEndDate',
						'value'   => current_time( 'mysql' ),
						'compare' => '>',
						'type'    => 'DATETIME',
					),
				),
			);
			$events_ongoing      = tribe_get_events( $events_ongoing_args );

			// Merge, deduplicate by ID, sort by start date, and take the first 6 events.
			$merged_events  = array_merge( $events_ongoing, $events_upcoming );
			$unique_events  = array();
			$seen_event_ids = array();
			foreach ( $merged_events as $event ) {
				if ( ! in_array( $event->ID, $seen_event_ids, true ) ) {
					$unique_events[]  = $event;
					$seen_event_ids[] = $event->ID;
				}
			}
			usort( $unique_events, function ( $a, $b ) {
				$date_a = get_post_meta( $a->ID, '_EventStartDate', true );
				$date_b = get_post_meta( $b->ID, '_EventStartDate', true );
				return strtotime( $date_a ) - strtotime( $date_b );
			} );
			$events_query = array_slice( $unique_events, 0, 6 );

			if ( ! empty( $events_query ) ) :
				/* Start the Loop */
				foreach ( $events_query as $event ) :
					$GLOBALS['post'] = $event;
					setup_postdata( $event );

					/**
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'events-grid' );
				endforeach;
			endif;
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
		</div>

		<!-- big button / cta -->
		<a href="<?php echo esc_url( home_url( '/calendar/list/' ) ); ?>"
			class="font-sans inline-flex bg-srf-purple-500 hover:bg-srf-purple-800 rounded py-3 px-8 text-white transition duration-500 font-bold">View
			all events
			<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24"
				stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
			</svg>
		</a>
		<!-- big button / cta -->
		<a href="<?php echo esc_url( home_url( '/calendar/list/?tribe_eventcategory%5B0%5D=114' ) ); ?>"
			class="mt-8 sm:mt-0 sm:ml-8 font-sans inline-flex bg-srf-blue-500 hover:bg-srf-blue-800 rounded py-3 px-8 text-white transition duration-500 font-bold">View
			all webinars
			<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24"
				stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
			</svg>
		</a>
	</div>
</section>

<!-- ========================= -->
<!-- News section -->
<!-- ========================= -->
<section class="bg-gray-100">
	<div class="container mx-auto px-6 lg:px-0 py-24 text-center">
		<h2 class="mb-10 text-3xl lg:text-4xl font-extrabold text-gray-600">Latest News & Updates</h2>

		<?php
		$args       = array( 'posts_per_page' => 6 ); // phpcs:ignore -- pagination limit ok.
		$news_query = new WP_Query( $args );

		if ( $news_query->have_posts() ) :
			?>
			<!-- <div class="max-w-6xl mx-auto grid grid-cols-2 lg:grid-cols-4 gap-8 mb-10"> -->
			<div class="max-w-6xl mx-auto lg:grid grid-cols-6 gap-8 space-y-8 lg:space-y-0 mb-10 text-left">
				<?php
				/* Start the Loop */
				while ( $news_query->have_posts() ) :
					$news_query->the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;
				?>
			</div>

			<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		/* Restore original Post Data */
		wp_reset_postdata();
		?>

		<!-- big button / cta -->
		<a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"
			class="font-sans inline-flex border-2 border-gray-700 hover:border-transparent hover:bg-srf-blue-500 rounded py-3 px-8 text-gray-700 hover:text-white transition duration-500 font-bold">View
			all blog posts
			<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24"
				stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
			</svg>
		</a>
	</div>
</section>        <!-- header + hero bg wrapper -->

<!-- ========================= -->
<!-- Warriors section -->
<!-- ========================= -->
<section class="bg-white">
	<div class="px-6 lg:px-0 py-24 text-center">
		<h2 class="mb-10 text-3xl lg:text-4xl text-gray-700 font-extrabold">Our Warriors</h2>

		<?php
		$args       = array(
			'posts_per_page' => 10,
			'post_type'      => 'srf-warriors',
		);
		$news_query = new WP_Query( $args );


		if ( $news_query->have_posts() ) :
			?>
			<div class="max-w-screen-2xl mx-auto grid sm:grid-cols-2 lg:grid-cols-5 gap-4 lg:gap-1 mb-10">
				<?php
				/* Start the Loop */
				while ( $news_query->have_posts() ) :
					$news_query->the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'grid-items' );

				endwhile;
				?>
			</div>

			<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		/* Restore original Post Data */
		wp_reset_postdata();
		?>

		<!-- big button / cta -->
		<a href="<?php echo esc_url( home_url( '/syngap-warriors/' ) ); ?>"
			class="font-sans inline-flex bg-srf-blue-500 hover:bg-srf-blue-800 rounded py-3 px-8 text-white transition duration-500 font-bold">View
			all warriors
			<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24"
				stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
			</svg>
		</a>
	</div>
</section>        <!-- header + hero bg wrapper -->

<!-- ========================= -->
<!-- Newly Diagnosed section -->
<!-- ========================= -->
<section id="newly-diagnosed" class="bg-gray-100">
	<div class="container mx-auto px-6 lg:px-0 py-24 text-center">
		<h2 class="mb-10 text-3xl lg:text-4xl font-extrabold text-gray-600">Newly Diagnosed?</h2>
		<div class="max-w-6xl mx-auto lg:grid grid-cols-3 gap-16 space-y-16 lg:space-y-0 mb-10 text-center">
			<div class="flex flex-col items-center space-y-6">
				<h3 class="text-gray-600 text-2xl font-bold text-center underline">Join our registry</h3>
				<p class="flex-auto">Register with Citizen Health to collect as much de-identified group data for
					researchers
					to use. We need as many to register to improve the chances for successful clinical trials.</p>
				<a href="<?php echo esc_url( home_url( '/join-the-citizen-registry/' ) ); ?>"
					class="font-sans inline-block py-3 px-12 rounded hover:bg-srf-purple-500 border-2 border-srf-purple-500 text-srf-purple-500 hover:text-white font-bold text-lg tracking-wide transition duration-500">Register</a>
			</div>
			<div class="flex flex-col items-center space-y-6">
				<h3 class="text-gray-600 text-2xl font-bold text-center underline">Get involved</h3>
				<p class="flex-auto">The best way to help someone with SYNGAP1 is to help spread awareness and stay
					informed. Start by connecting with CURE SYNGAP1, holding a fundraiser, and becoming a volunteer.</p>
				<a href="<?php echo esc_url( home_url( '/get-involved/' ) ); ?>"
					class="font-sans inline-block py-3 px-12 rounded hover:bg-srf-blue-500 border-2 border-srf-blue-500 text-srf-blue-500 hover:text-white font-bold text-lg tracking-wide transition duration-500">Connect</a>
			</div>
			<div class="flex flex-col items-center space-y-6">
				<h3 class="text-gray-600 text-2xl font-bold text-center underline">New families</h3>
				<p class="flex-auto">If you're newly diagnosed or looking for the SYNGAP1 community, we have developed a Resource Guide with basic
					information as well as important tools for you and your doctor.</p>
				<a href="<?php echo esc_url( home_url( '/syngap1-resources-for-newly-diagnosed-families/' ) ); ?>"
					class="font-sans inline-block py-3 px-12 rounded hover:bg-srf-green-500 border-2 border-srf-green-500 text-srf-green-500 hover:text-white font-bold text-lg tracking-wide transition duration-500">Learn
					more</a>
			</div>
		</div>
	</div>
</section>

<!-- ========================= -->
<!-- Stats section -->
<!-- ========================= -->
<section class="bg-white">
	<div class="container mx-auto px-6 lg:px-0 py-24 text-center">
		<div class="max-w-6xl mx-auto lg:grid grid-cols-3 gap-16 space-y-16 lg:space-y-0 mb-10 text-center">
			<div>
				<h2 class="text-5xl font-bold"><a
						class="text-srf-blue-500 hover:text-srf-purple-500 transition duration-500"
						href="<?php echo esc_url( home_url( '/resources/grants/' ) ); ?>"><?php echo esc_html( get_field( 'funds_committed' ) ); ?></a>
				</h2>
				<h3 class="text-lg text-gray-600 font-normal">Funds committed</h3>
			</div>
			<div>
				<h2 class="text-5xl font-bold"><a
						class="text-srf-blue-500 hover:text-srf-green-500 transition duration-500"
						href="<?php echo esc_url( home_url( '/blog/tag/census/' ) ); ?>"><?php echo esc_html( get_field( 'patients_counted' ) ); ?></a>
				</h2>
				<h3 class="text-lg text-gray-600 font-normal">Patients counted</h3>
			</div>
			<div>
				<h2 class="text-5xl font-bold"><a
						class="text-srf-blue-500 hover:text-srf-purple-500 transition duration-500"
						href="<?php echo esc_url( home_url( '/team/volunteers/' ) ); ?>"><?php echo esc_html( get_field( 'volunteers' ) ); ?></a>
				</h2>
				<h3 class="text-lg text-gray-600 font-normal">Volunteers</h3>
			</div>
			<div>
				<h2 class="text-5xl font-bold"><a
						class="text-srf-blue-500 hover:text-srf-green-500 transition duration-500"
						href="https://www.citizen.health/partners/srf"><?php echo esc_html( get_field( 'citizen_nhs' ) ); ?></a>
				</h2>
				<h3 class="text-lg text-gray-600 font-normal">US Families in Citizen Health NHS</h3>
			</div>
			<div>
				<h2 class="text-5xl font-bold"><a
						class="text-srf-blue-500 hover:text-srf-purple-500 transition duration-500"
						href="<?php echo esc_url( home_url( '/resources/grants/' ) ); ?>"><?php echo esc_html( get_field( 'companies_institutes' ) ); ?></a>
				</h2>
				<h3 class="text-lg text-gray-600 font-normal">Partners and Sponsors</h3>
			</div>
			<div>
				<h2 class="text-5xl font-bold"><a
						class="text-srf-blue-500 hover:text-srf-green-500 transition duration-500"
						href="<?php echo esc_url( home_url( '/syngap-warriors/' ) ); ?>"><?php echo esc_html( get_field( 'patients_profiled' ) ); ?></a>
				</h2>
				<h3 class="text-lg text-gray-600 font-normal">Patients profiled</h3>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
