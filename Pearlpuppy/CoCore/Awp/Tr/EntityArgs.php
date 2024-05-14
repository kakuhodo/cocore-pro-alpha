<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt\Tribune;

/**
 *  @since  ver. 0.10.6 (edit. Pierre)
 */
trait Tr_EntityArgs {

    // Mixins

    /**
     *
     */

    // Constants

    /**
     *
     */

    // Properties

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     *
    public static $default_psot_type_labels = array(
        'name' => 'Posts',
        'singular_name' => 'Post',
        'add_new' => 'Add New Post',
        'add_new_item' => 'Add New Post',
        'edit_item' => 'Edit Post',
        'new_item' => 'New Post',
        'view_item' => 'View Post',
        'view_items' => 'View Posts',
        'search_items' => 'Search Posts',
        'not_found' => 'No posts found',
        'not_found_in_trash' => 'No posts found in Trash',
        ##'parent_item_colon' => 'Parent Page:',
        'all_items' => 'All Posts',
        'archives' => 'Post Archives',
        'attributes' => 'Post Attributes',
        'insert_into_item' => 'Insert into post',
        'uploaded_to_this_item' => 'Uploaded to this post',
        #'featured_image' => 'Featured image',
        #'set_featured_image' => 'Set featured image',
        #'remove_featured_image' => 'Remove featured image',
        #'use_featured_image' => 'Use as featured image',
        #'menu_name' => (same as 'name'),
        'filter_items_list' => 'Filter posts list',
        #'filter_by_date' => 'Filter by date',
        'items_list_navigation' => 'Posts list navigation',
        'items_list' => 'Posts list',
        'item_published' => 'Post published.',
        'item_published_privately' => 'Post published privately.',
        'item_reverted_to_draft' => 'Post reverted to draft.',
        'item_trashed' => 'Post trashed.',
        'item_scheduled' => 'Post scheduled.',
        'item_updated' => 'Post updated.',
        'item_link' => 'Post Link',
        'item_link_description' => 'A link to a post.',
    );

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     *
    public static $default_tax_labels = array(
        'name' => 'Tags',
        'singular_name' => 'Tag',
        'search_items' => 'Search Tags',
        'popular_items' => 'Popular Tags',
        'all_items' => 'All Tags',
        'parent_item' => 'Parent Category',
        #'parent_item_colon' => '',    // string The same as parent_item, but with colon : in the end.
        #'name_field_description' => '',    // string Description for the Name field on Edit Tags screen.Default ‘The name is how it appears on your site’.
        'slug_field_description' => 'The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens',
        'parent_field_description' => 'Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band',
        'desc_field_description' => 'The description is not prominent by default; however, some themes may show it',
        'edit_item' => 'Edit Tag',
        'view_item' => 'View Tag',
        'update_item' => 'Update Tag',
        'add_new_item' => 'Add New Tag',
        'new_item_name' => 'New Tag Name',
        'separate_items_with_commas' => 'Separate tags with commas',
        'add_or_remove_items' => 'Add or remove tags',
        'choose_from_most_used' => 'Choose from the most used tags',
        'not_found' => 'No tags found',
        'no_terms' => 'No tags',
        'filter_by_item' => 'Filter by category',
        #'items_list_navigation' => '',    // string Label for the table pagination hidden heading.
        #'items_list' => '',    // string Label for the table hidden heading.
        'most_used' => 'Most Used',
        #'back_to_items' => '',    // string Label displayed after a term has been updated.
        'item_link' => 'Tag Link',
        'item_link_description' => 'A link to a tag',
    );

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     *
    public static $format_tax_labels = array(
        'name' => '%P',
        'singular_name' => '%S',
        'search_items' => 'Search %P',
        'popular_items' => 'Popular %P',
        'all_items' => 'All %P',
        'parent_item' => 'Parent %S',
        #'parent_item_colon' => '',    // string The same as parent_item, but with colon : in the end.
        #'name_field_description' => '',    // string Description for the Name field on Edit %P screen.Default ‘The name is how it appears on your site’.
        #'slug_field_description' => 'The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens',
        #'parent_field_description' => 'Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band',
        #'desc_field_description' => 'The description is not prominent by default; however, some themes may show it',
        'edit_item' => 'Edit %S',
        'view_item' => 'View %S',
        'update_item' => 'Update %S',
        'add_new_item' => 'Add New %S',
        'new_item_name' => 'New %S Name',
        'separate_items_with_commas' => 'Separate %p with commas',
        'add_or_remove_items' => 'Add or remove %p',
        'choose_from_most_used' => 'Choose from the most used %p',
        'not_found' => 'No %p found',
        'no_terms' => 'No %p',
        'filter_by_item' => 'Filter by %s',
        #'items_list_navigation' => '',    // string Label for the table pagination hidden heading.
        #'items_list' => '',    // string Label for the table hidden heading.
        #'most_used' => 'Most Used',
        #'back_to_items' => '',    // string Label displayed after a term has been updated.
        'item_link' => '%S Link',
        'item_link_description' => 'A link to a %s',
    );

    /**
     *  @since  ver. 0.11.1 (edit. Pierre)
     */
    public static $mutual_args = array(
        # 'labels' => ['array'],
        'description' => ['string'],
        'public' => ['boolean'],
        'hierarchical' => ['boolean'],
        # 'publicly_queryable' => ['bool'],
        'show_ui' => ['boolean'],
        # 'show_in_menu' => ['bool'],
        # 'show_in_nav_menus' => ['bool'],
        # 'show_in_rest' => ['bool'],
        # 'rest_base' => ['string'],
        # 'rest_controller_class' => ['string'],
        # 'capabilities' => ['array'],
        # 'rewrite' => ['bool|array'],
        # 'query_var' => ['string|bool'],
        # '_builtin' => ['bool'],
    );

    /**
     *  @since  ver. 0.11.1 (edit. Pierre)
     */
    public static $post_type_args = array(
        # 'label' => ['string'],
        # 'exclude_from_search' => ['bool'],
        # 'show_in_admin_bar' => ['bool'],
        'menu_position' => ['integer'],
        # 'menu_icon' => ['string'],
        # 'capability_type' => ['string'],
        # 'map_meta_cap' => ['bool'],
        'supports' => ['array'],
        # 'register_meta_box_cb' => ['callable'],
        # 'taxonomies' => ['array'],
        # 'has_archive' => ['bool|string'],
        # 'can_export' => ['bool'],
        # 'delete_with_user' => ['bool'],
        # '_edit_link' => ['string'],
    );

    /**
     *  hierarchical(1), non-hierarchic(2), capital(4), plural(8)
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public static $mutual_labels = array(
        'name' => ['%s', 15],
        'singular_name' => ['%s', 7],
        'add_new_item' => ['Add New %s', 7],
        'edit_item' => ['Edit %s', 7],
        'view_item' => ['View %s', 7],
        'search_items' => ['Search %s', 15],
        'not_found' => ['No %s found', 11],
        'parent_item_colon' => ['Parent %s:', 5],
        'all_items' => ['All %s', 15],
        'items_list_navigation' => ['%s list navigation', 15],
        'items_list' => ['%s list', 15],
        'item_link' => ['%s Link', 7],
        'item_link_description' => ['A link to a %s.', 3],
    );

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public static $post_type_labels = array(
        'new_item' => ['New %s', 7],
        'view_items' => ['View %s', 15],
        'not_found_in_trash' => ['No %s found in Trash', 11],
        'archives' => ['%s Archives', 7],
        'attributes' => ['%s Attributes', 7],
        'insert_into_item' => ['Insert into %s', 3],
        'uploaded_to_this_item' => ['Uploaded to this %s', 3],
        'menu_name' => ['%s', 15],
        'filter_items_list' => ['Filter %s list', 11],
        'item_published' => ['%s published.', 7],
        'item_published_privately' => ['%s published privately.', 7],
        'item_reverted_to_draft' => ['%s reverted to draft.', 7],
        'item_scheduled' => ['%s scheduled.', 7],
        'item_updated' => ['%s updated.', 7],
    );

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public static $taxonomy_labels = array(
        'popular_items' => ['Popular %s', 14],
        'parent_item' => ['Parent %s', 5],
        'update_item' => ['Update %s', 7],
        'new_item_name' => ['New %s Name', 7],
        'separate_items_with_commas' => ['Separate %s with commas', 10],
        'add_or_remove_items' => ['Add or remove %s', 10],
        'choose_from_most_used' => ['Chose from the most used %s', 10],
        'no_terms' => ['No %s', 11],
        'back_to_items' => ['Back to %s', 15],
        'filter_by_item' => ['Filter by %s', 1],
    );

    // Methods

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     *  @update ver. 0.11.1 (edit. Pierre)
     */
    public static function ptLabels(string $singular_name, array $ovwrites = [], bool $hierarchical = false, ?string $name = null): array
    {
        return self::labels('post_type', $hierarchical, $singular_name, $name, $ovwrites);
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     *  @update ver. 0.11.1 (edit. Pierre)
     */
    public static function taxLabels(string $singular_name, array $ovwrites = [], bool $hierarchical = false, ?string $name = null): array
    {
        return self::labels('taxonomy', $hierarchical, $singular_name, $name, $ovwrites);
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public static function labels(string $entity_type, bool $hierarchical, string $singular_name, ?string $name = null, array $ovwrites = []): array
    {
        $labels = [];
        $l_prop = $entity_type . '_labels';
        $_labels = array_merge(self::$mutual_labels, self::${$l_prop});
        $h = ((int) !$hierarchical) + 1;
        $name = $name ?? Tribune::plur($singular_name);
        foreach ($_labels as $key => $data) {
            if (!Tribune::hasP2sum($h, $data[1])) {
                continue;
            }
            if (Tribune::hasP2sum(8, $data[1])) {
                $str = $name;
            } else {
                $str = $singular_name;
            }
            if (!Tribune::hasP2sum(4, $data[1])) {
                $str = strtolower($str);
            }
            $labels[$key] = sprintf($data[0], $str);
        }
        return array_replace($labels, $ovwrites);
    }

    /**
     *
     */

    /**
     *
     */

//[EOT]*/
}