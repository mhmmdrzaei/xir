<?php



/** Tell WordPress to run theme_setup() when the 'after_setup_theme' hook is run. */

if (!function_exists('theme_setup')):

	function theme_setup()
	{

		/* This theme uses post thumbnails (aka "featured images")
		 *  all images will be cropped to thumbnail size (below), as well as
		 *  a square size (also below). You can add more of your own crop
		 *  sizes with add_image_size. */
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(120, 90, true);
		add_image_size('square', 150, 150, true);


		// Add default posts and comments RSS feed links to head
		add_theme_support('automatic-feed-links');

		/* This theme uses wp_nav_menu() in one location.
		 * You can allow clients to create multiple menus by
		 * adding additional menus to the array. */
		register_nav_menus(
			array(
				'primary' => 'Primary Navigation'
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);

	}
endif;

add_action('after_setup_theme', 'theme_setup');

/* Add all our CSS files here.
We'll let WordPress add them to our templates automatically instead
of writing our own link tags in the header. */

function project_styles()
{
	wp_enqueue_style('style', get_stylesheet_uri());

	wp_enqueue_style('fontawesome', '//use.fontawesome.com/releases/v5.0.7/css/all.css');
}

add_action('wp_enqueue_scripts', 'project_styles');
/* Add all our JavaScript files here.
We'll let WordPress add them to our templates automatically instead
of writing our own script tags in the header and footer. */

function project_scripts()
{

	//Don't use WordPress' local copy of jquery, load our own version from a CDN instead
	wp_deregister_script('jquery');
	wp_enqueue_script(
		'jquery',
		"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js",
		false,
		//dependencies
		null,
		//version number
		true //load in footer
	);



	wp_enqueue_script(
		'plugins', //handle
		get_template_directory_uri() . '/js/plugins.js',
		//source
		false,
		//dependencies
		null,
		// version number
		true //load in footer
	);

	wp_deregister_script('bxsliderjs');
	wp_enqueue_script(
		'bxslidejs',
		"https" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js",
		false,
		//dependencies
		null,
		//version number
		true //load in footer
	);

	wp_deregister_script('lettering');
	wp_enqueue_script(
		'lettering',
		"https" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/lettering.js/0.6.1/jquery.lettering.min.js",
		false,
		//dependencies
		null,
		//version number
		true //load in footer
	);
	wp_deregister_script('modernizr');
	wp_enqueue_script(
		'modernizr',
		"https" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js",
		false,
		//dependencies
		null,
		//version number
		true //load in footer
	);



	wp_enqueue_script(
		'scripts', //handle
		get_template_directory_uri() . '/dist/main.min.js',
		//source
		array('jquery', 'plugins'),
		//dependencies
		null,
		// version number
		true //load in footer
	);
}

add_action('wp_enqueue_scripts', 'project_scripts');


/* Custom Title Tags */

function project_wp_title($title, $sep)
{
	global $paged, $page;

	if (is_feed()) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo('name', 'display');

	// Add the site description for the home/front page.
	$site_description = get_bloginfo('description', 'display');
	if ($site_description && (is_home() || is_front_page())) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if (($paged >= 2 || $page >= 2) && !is_404()) {
		$title = "$title $sep " . sprintf(__('Page %s', 'Project'), max($paged, $page));
	}

	return $title;
}
add_filter('wp_title', 'project_wp_title', 10, 2);

/*
Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
*/
function project_page_menu_args($args)
{
	$args['show_home'] = true;
	return $args;
}
add_filter('wp_page_menu_args', 'project_page_menu_args');


/*
 * Sets the post excerpt length to 40 characters.
 */
function project_excerpt_length($length)
{
	return 40;
}
add_filter('excerpt_length', 'project_excerpt_length');

/*
 * Returns a "Continue Reading" link for excerpts
 */
function project_continue_reading_link()
{
	return ' <a href="' . get_permalink() . '">Continue reading <span class="meta-nav">&rarr;</span></a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and project_continue_reading_link().
 */
function project_auto_excerpt_more($more)
{
	return ' &hellip;' . project_continue_reading_link();
}
add_filter('excerpt_more', 'project_auto_excerpt_more');

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function project_custom_excerpt_more($output)
{
	if (has_excerpt() && !is_attachment()) {
		$output .= project_continue_reading_link();
	}
	return $output;
}
add_filter('get_the_excerpt', 'project_custom_excerpt_more');


/*
 * Register a single widget area.
 * You can register additional widget areas by using register_sidebar again
 * within project_widgets_init.
 * Display in your template with dynamic_sidebar()
 */
function project_widgets_init()
{
	// Area 1, located at the top of the sidebar.
	register_sidebar(
		array(
			'name' => 'Primary Widget Area',
			'id' => 'primary-widget-area',
			'description' => 'The primary widget area',
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

}

add_action('widgets_init', 'project_widgets_init');

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 */
function project_remove_recent_comments_style()
{
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'project_remove_recent_comments_style');


if (!function_exists('project_posted_on')):
	/**
	 * Prints HTML with meta information for the current post—date/time and author.
	 */
	function project_posted_on()
	{
		printf(
			'<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s',
			'meta-prep meta-prep-author',
			sprintf(
				'<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
				get_permalink(),
				esc_attr(get_the_time()),
				get_the_date()
			),
			sprintf(
				'<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				get_author_posts_url(get_the_author_meta('ID')),
				sprintf(esc_attr('View all posts by %s'), get_the_author()),
				get_the_author()
			)
		);
	}
endif;

if (!function_exists('project_posted_in')):
	/**
	 * Prints HTML with meta information for the current post (category, tags and permalink).
	 */
	function project_posted_in()
	{
		// Retrieves tag list of current post, separated by commas.
		$tag_list = get_the_tag_list('', ', ');
		if ($tag_list) {
			$posted_in = 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
		} elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
			$posted_in = 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
		} else {
			$posted_in = 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
		}
		// Prints the string, replacing the placeholders.
		printf(
			$posted_in,
			get_the_category_list(', '),
			$tag_list,
			get_permalink(),
			the_title_attribute('echo=0')
		);
	}
endif;

/* Get rid of junk! - Gets rid of all the crap in the header that you dont need */

function clean_stuff_up()
{
	// windows live
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	// wordpress gen tag
	remove_action('wp_head', 'wp_generator');
	// comments RSS
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'feed_links', 3);
}

add_action('init', 'clean_stuff_up');

require_once(get_template_directory() . '/dompdf/autoload.inc.php');

function generate_pdf_file($post_id)
{

	// Load the entry post
	$post = get_post($post_id);

	// Create a new Dompdf instance
	$dompdf = new Dompdf\Dompdf();

	// Generate the PDF content
	$pdf_content = '<html><body>';
	$pdf_content .= '<h1>' . get_the_title($post_id) . '</h1>';

	// Add fields to PDF content
	$pdf_content .= '<p><strong>Artist Name/Pronouns:</strong> ' . get_field('artist_name_pronouns', $post_id) . '</p>';
	$pdf_content .= '<p><strong>Email Address:</strong> ' . get_field('email_address', $post_id) . '</p>';
	$pdf_content .= '<p><strong>Artist Location:</strong> ' . get_field('artist_location', $post_id) . '</p>';
	$pdf_content .= '<p><strong>Artist Bio:</strong> ' . get_field('artist_bio', $post_id) . '</p>';
	$pdf_content .= '<p><strong>Artist Art Practice:</strong> ' . get_field('artist_art_practice', $post_id) . '</p>';
	$pdf_content .= '<p><strong>Artist Residency Use:</strong> ' . get_field('artist_residency_use', $post_id) . '</p>';
	$pdf_content .= '<p><strong>Artist Accessibility:</strong> ' . get_field('artist_accessibility', $post_id) . '</p>';
	$pdf_content .= '<p><strong>Artist Website:</strong> ' . get_field('artist_website', $post_id) . '</p>';
	$pdf_content .= '<p><strong>Artist Timeline:</strong> ' . get_field('artist_semester', $post_id) . '</p>';

	// Add artwork file to PDF content
	$file = get_field('artist_artwork', $post_id);
	if ($file) {
		$pdf_content .= '<p><strong>Artist Artwork:</strong> <a href="' . $file['url'] . '">' . $file['filename'] . '</a></p>';
	}

	$pdf_content .= '</body></html>';

	// Load the PDF content into Dompdf
	$dompdf->loadHtml($pdf_content);

	// Set the paper size and orientation
	$dompdf->setPaper('A4', 'portrait');

	// Render the PDF
	$dompdf->render();

	// Output the PDF file
	$dompdf->stream('submission-' . $post_id . '.pdf');

}

// Add PDF download endpoint
function add_pdf_download_endpoint()
{
	add_rewrite_endpoint('pdf-download', EP_PERMALINK);
}
add_action('init', 'add_pdf_download_endpoint');

// Handle PDF download request
function handle_pdf_download_request()
{
	if (isset($_GET['post_id'])) {
		$post_id = intval($_GET['post_id']);
		generate_pdf_file($post_id);
		exit;
	}
}
add_action('template_redirect', 'handle_pdf_download_request');



?>