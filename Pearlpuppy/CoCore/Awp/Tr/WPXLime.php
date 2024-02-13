<?php
namespace Pearlpuppy\CoCore\Awp;

/**
 * @file
 */

/**
 *
 */
trait Tr_WPXLime {

	// Properties

	/**
	 *	WP_Post members (named 'post_'+) whom every single object has.
	 *	@see	https://codex.wordpress.org/Class_Reference/WP_Post
	 */
	public static $wppd_starters = array(
		'content',
		'date',
		'modified',
	);

	/**
	 *	WP_Post members (named 'post_'+) and ALSO featured by post_type_supports().
	 *	@see	https://codex.wordpress.org/Function_Reference/post_type_supports
	 */
	public static $wppd_reservers = array(
		'title',
		'editor',		// (content)
		'author',
		'thumbnail',		// (featured image) (current theme must also support Post Thumbnails)
		'excerpt',
	);

	/**
	 *	Features of post_type_supports() but NOT (direct) members of WP_Post.
	 */
	public static $wppd_supporters = array(
		'trackbacks',
		'custom-fields',		// (see Custom_Fields, aka meta-data)
		'comments',		// (also will see comment count balloon on edit screen)
		'revisions',		// (will store revisions)
		'page-attributes', 		// (template and menu order) (hierarchical must be true)
		'post-formats',		// (see Post_Formats)
	);

	/**
	 *	Taxonomies but behaving extraordinary way.
	 */
	public static $eccentric_taxes = array(
		'post_format',
	);

	// Methods

	/**
	 *
	 */
	public static function wpx_is_taxonomy($taxonomy, $handle) {
		$tax = get_taxonomy($taxonomy);
		if (!$tax) {
			return $tax;
		}
		return $tax->$handle;
	}

	/**
	 *
	 */
	public static function wpx_is_taxonomy_public($taxonomy) {
		return self::wpx_is_taxonomy($taxonomy, 'public');
	}

	/**
	 *
	 */

//[EOT]*/
}
