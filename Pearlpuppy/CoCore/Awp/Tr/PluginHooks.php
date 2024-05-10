<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt\Tribune;
use Pearlpuppy\CoCore\Myt\Lime;

/**
 *  @since  ver. 0.10.6 (edit. Pierre)
 */
trait Tr_PluginHooks {

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
     *
     */

    // Methods

    /**
     *  ---------------------------
     *  Hooks
     *  ---------------------------
     */

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     *
    public function hookActionWpEnqueueScripts($hook_suffix = null)
    {
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function hookActionWpDashboardSetup()
    {
        $this->sandyWidget();
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public function hookActionAdminMenu()
    {
        $this->mainMenu();
        $this->entitiesMenu();
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function hookActionAdminNotices()
    {
        echo '<div class="notice notice-sccess is-dismissible"><p>via <code>' . __FUNCTION__ . '</code> of <code>' . __CLASS__ . '</code></p></div>';
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function hookFilterAdminBodyClass($classes)
    {
        $classes .= ' ' . $this->nice('brand');
        $this->styleAdminScreen($classes);
        return $classes;
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public function hookActionInit()
    {
        $this->registerCoCoreEntities();
#        $this->registerCoCoreTax();
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     *  @update ver. 0.10.5 (edit. Pierre)
     */
    protected function sandyWidget()
    {
        $args = array(
            'widget_id' => $this->nice('brand') . '-sandy',
            'widget_name' => 'Sandy',
            'callback' => [$this, 'wcbSandy'],
            'control_callback' => [$this, 'wcbSandyControl'],
            'callback_args' => null,
            'context' => 'normal',
            'priority' => 'high'
        );
        extract($args);
        wp_add_dashboard_widget($widget_id, $widget_name, $callback, $control_callback, $callback_args, $context, $priority);
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     *  @update ver. 0.10.2 (edit. Pierre)
     */
    public function wcbSandy()
    {
        $file = $this->productIncPath('sandy.php');
        if (!file_exists($file)) {
            $no_file = new Lime('p', __("There's no sandy.php file.", $this->info['TextDomain']));
            $no_file->expose();
            return;
        }
        include_once($file);
        $console = new Lime('section#cocore-consulat', new Lime('h3', 'Consulat'));
        $console->gratify($this->console);
        $console->expose();
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function wcbSandyControl()
    {
        
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     *  @ref    https://developer.wordpress.org/reference/functions/register_taxonomy/
     */
    protected function registerCoCoreTax()
    {
        register_post_type('cocore_dummy', ['show_ui' => true]);
        $args = array(
            'labels' => Whip::taxLabels('Type'),
            'public' => false,
            'hierarchical' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => false,
            '_builtin' => true,
        );
        register_taxonomy('cocore_type', 'cocore_dummy', $args);
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     *  @ref    https://developer.wordpress.org/reference/functions/register_post_type/
     */
    protected function registerCoCoreEntities()
    {
        $args = array(
            'labels' => [
                'name' => 'CoCore Types',
                'singular_name' => 'Type',
                'add_new' => 'Add New Type',
                'add_new_item' => 'Add New Type',
                'edit_item' => 'Edit Type',
                'new_item' => 'New Type',
                'view_item' => 'View Type',
                'view_items' => 'View Types',
                'search_items' => 'Search Types',
                'not_found' => 'No types found',
                'not_found_in_trash' => 'No types found in Trash',
                #'parent_item_colon' => 'Parent Page:',
                'all_items' => 'All Types',
                'archives' => 'Type Archives',
                'attributes' => 'Type Attributes',
                'insert_into_item' => 'Insert into type',
                'uploaded_to_this_item' => 'Uploaded to this type',
                #'featured_image' => 'Featured image',
                #'set_featured_image' => 'Set featured image',
                #'remove_featured_image' => 'Remove featured image',
                #'use_featured_image' => 'Use as featured image',
                #'menu_name' => (same as 'name'),
                'filter_items_list' => 'Filter types list',
                #'filter_by_date' => 'Filter by date',
                'items_list_navigation' => 'Types list navigation',
                'items_list' => 'Types list',
                'item_published' => 'Type published.',
                'item_published_privately' => 'Type published privately.',
                'item_reverted_to_draft' => 'Type reverted to draft.',
                'item_trashed' => 'Type trashed.',
                'item_scheduled' => 'Type scheduled.',
                'item_updated' => 'Type updated.',
                'item_link' => 'Type Link',
                'item_link_description' => 'A link to a type.',
            ],
            'public' => true,
        );
        register_post_type('cocore_type', $args);
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     *  @ref    https://developer.wordpress.org/reference/functions/add_menu_page/
     */
    protected function mainMenu()
    {
        $menu_slug = 'cocore';
        $svg = file_get_contents($this->productImgPath('icon-cocore.svg'));
        $b64 = base64_encode($svg);
        add_menu_page('CoCore Settings', 'CoCore', 'manage_options', $menu_slug, [$this, 'wcbMainPage'], 'data:image/svg+xml;base64,' . $b64);
    }

    /**
     *  CoCore Entities: custom post type and custom taxonomy
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    protected function entitiesMenu()
    {
        $menu_slug = 'edit-tags.php?taxonomy=cocore_type&post_type=cocore_dummy';
        add_submenu_page('cocore', 'CoCore Types', 'CoCore Type', 'manage_options', $menu_slug);
    }

    /**
     *
     */
    public function wcbMainPage()
    {
        
    }

    /**
     *
     */
    protected function styleAdminScreen(&$classes)
    {
#        print_r($classes);
    }

    /**
     *
     */

    /**
     *
     */

//[EOT]*/
}