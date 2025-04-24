<?php
/**
 * Template for displaying all SRF Team Category taxonomies
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SRF
 */

namespace SRF;

$container_classes = srf_container_classes();
$term = get_queried_object();
$term_slug = $term->slug;

// Get term meta if it exists
$intro_text = get_field('team_intro_text', $term);
$after_content = get_field('team_after_content', $term);
$team_logo = get_field('team_category_logo', $term);

/**
 * Get the title for the team category
 *
 * @param string $slug The term slug
 * @return string The formatted title
 */
function get_team_category_title($slug) {
    $titles = [
        'board-members' => 'Board of Trustees',
        'dei' => 'Diversity, Equity, and Inclusion Board',
        'srf-au' => 'SRF Australia',
        'srf-eu' => 'SRF Europe',
        'srf-uk' => 'SRF United Kingdom',
        'volunteers' => 'Our Volunteers',
        'state-advocates' => 'State Advocates',
        'state-ambassadors' => 'State Ambassadors',
        'international-ambassadors' => 'International Ambassadors',
        'fondo-de-investigacion-syngap' => 'Fondo de Investigación SynGAP'
    ];

    return isset($titles[$slug]) ? $titles[$slug] : get_queried_object()->name;
}

get_header();
?>

<?php if ( have_posts() ) : ?>
    <div class="<?php echo esc_attr( $container_classes ); ?> text-center">
        <header class="entry-header max-w-3xl mx-auto mb-16">
            <h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold">
                <?php echo esc_html(get_team_category_title($term_slug)); ?>
            </h1>
            <div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
        </header>

        <?php if (!empty($intro_text)) : ?>
            <div class="prose lg:prose-xl mx-auto mb-10 max-w-screen-md 2xl:max-w-screen-lg px-6 lg:px-0">
                <?php echo wp_kses_post($intro_text); ?>
            </div>
        <?php endif; ?>

        <div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', 'grid-items');
            endwhile;
            ?>
        </div>

        <?php if (!empty($after_content)) : ?>
            <div class="entry-content mx-auto mt-14 prose lg:prose-xl max-w-screen-md 2xl:max-w-screen-lg">
                <?php echo wp_kses_post($after_content); ?>
            </div>
        <?php endif; ?>

        <?php if ($team_logo) : ?>
            <div class="prose lg:prose-xl mx-auto mb-16">
                <img class="w-1/2 mx-auto"
                     src="<?php echo esc_url($team_logo['url']); ?>"
                     alt="<?php echo esc_attr($team_logo['alt']); ?>" />
            </div>
        <?php endif; ?>

        <div class="max-w-6xl mx-auto mt-14 pt-10 text-center border-t-2 border-gray-200">
            <?php
            the_posts_navigation(array('prev_text' => 'Next Page', 'next_text' => 'Previous Page'));
            ?>
        </div>
    </div>
<?php else :
    get_template_part('template-parts/content', 'none');
endif;

get_footer();
