<?php
/**
 * Tabletize JSON Feed Template for displaying JSON Posts feed.
 *
 */
$callback = trim(esc_html(get_query_var('callback')));
$charset  = get_option('charset');

if ( have_posts() ) {
	global $wp_query;
	$query_array = $wp_query->query;

	// Make sure query args are always in the same order
	ksort( $query_array );

	$json = array();

	while ( have_posts() ) {
		the_post();
		$id = (int) $post->ID;

		$single = array(
			'id'        => $id,
			'title'     => strip_tags(get_the_title()),
            'description'   => strip_tags(get_the_content()),
            'subdescription'   => strip_tags(get_the_excerpt()),
			'document'	=> get_permalink()
            //'date'      => get_the_date('Y-m-d H:i:s','','',false)
		);

		// thumbnail
		if (function_exists('has_post_thumbnail') && has_post_thumbnail($id)) {
			$single["iconUrl"] = preg_replace("/^.*['\"](https?:\/\/[^'\"]*)['\"].*/i","$1",get_the_post_thumbnail($id));
		}

		$json[] = $single;
	}

	$json = json_encode($json);

	nocache_headers();
	if (!empty($callback)) {
		header("Content-Type: application/x-javascript; charset={$charset}");
		echo "{$callback}({$json});";
	} else {
		header("Content-Type: application/json; charset={$charset}");
		echo $json;
	}

} else {
	status_header('404');
	wp_die("404 Not Found");
}
