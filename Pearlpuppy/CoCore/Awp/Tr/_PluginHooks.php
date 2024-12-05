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
     *  @since  ver. 0.11.0 (edit. Pierre)
     */
    protected static $scheme_actions = array(
        'wp_dashboard_setup' => [
            'sandyWidget',
        ],
        'admin_menu' => [
            'mainMenu',
        ],
        'init' => [
            'registerCoreType',
            'registerCoreTax',
            'registerCoreTypeMeta',
            'boostTypes',
        ],
        'widgets_init' => [
        ],
    );

    /**
     *  @since  ver. 0.11.0 (edit. Pierre)
     */
    protected static $scheme_filters = array(
        'admin_body_class' => [
            'adminScreenCssClass',
        ],
    );

    /**
     *  ---------------------------
     *  Hooks
     *  ---------------------------
     */

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public function hookActionAdminMenu()
    {
        $this->mainMenu();
        $this->entitiesMenu();
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public function hookActionInit()
    {
        $this->registerCoCoreEntities();
#        $this->registerCoCoreTax();
    }

    // Methods

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     *  @update ver. 0.10.5 (edit. Pierre)
     */
    public function sandyWidget()
    {
        $args = array(
            'widget_id' => $this->gaze() . '-sandy',
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
     *  @ref    https://developer.wordpress.org/reference/functions/register_taxonomy/
     */
    public function registerCoreTax()
    {
        $args = [];
        $taxonomy = $this->gaze() . '_tax';
        $object_type = $this->gaze() . '_type';
        $singular_name = 'Tax';
        $menu_name = $this->gaze(false) . " Taxes";
        $args['labels'] = Whip::taxLabels($singular_name, ['name' => $menu_name]);
        $args['show_ui'] = true;
        $args['show_in_rest'] = true;
#        $args['show_in_menu'] = $this->gaze();
#        $args['public'] = true;
        register_taxonomy($taxonomy, $object_type, $args);
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     *  @update ver. 0.11.1 (edit. Pierre)
     *  @ref    https://developer.wordpress.org/reference/functions/register_post_type/
     */
    public function registerCoreType()
    {
        $args = [];
        $post_type = $this->gaze() . '_type';
        $singular_name = 'Type';
        $menu_name = $this->gaze(false) . " Types";
        $args['labels'] = Whip::ptLabels($singular_name, ['name' => $menu_name]);
        $args['show_ui'] = true;
        $args['show_in_rest'] = true;
        $args['supports'] = [
            'title',
            #'editor',
            #'comments',
            'revisions',
            #'trackbacks',
            'author',
            'excerpt',
            #'page-attributes',
            #'thumbnail',
            'custom-fields',
            #'post-formats',
        ];
        register_post_type($post_type, $args);
    }

    /**
     *  @update ver. 0.11.1 (edit. Pierre)
     */
    public function registerCoreTypeMeta()
    {
        $object_type = $this->gaze() . '_type';
        $labels_keys = array(
            'name',
            'singular_name',
        );
        $a = array(
            'type' => 'string',
            'single' => true,
            'show_in_rest' => true,
        );
        register_meta($object_type, 'cty:post_type', $a);
        foreach ($labels_keys as $k) {
            register_meta($object_type, "cty:labels:$k", $a);
        }
        foreach (Whip::$mutual_args as $key => $data) {
            $args = [];
            $meta_key = 'cty:args:' . $key;
            $args['type'] = $data[0];
            $args['single'] = $data[0] == 'array' ? false : true;
            $args['show_in_rest'] = true;
            register_meta($object_type, $meta_key, $args);
        }
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     *  @ref    https://developer.wordpress.org/reference/functions/add_menu_page/
     */
    public function mainMenu()
    {
        $menu_slug = $this->gaze();
        $svgb64 = $this->svgB64Code('icon-cocore.svg');
        add_menu_page('CoCore Settings', 'CoCore', 'manage_options', $menu_slug, [$this, 'wcbMainPage'], $svgb64);
    }

    /**
     *
     */
    public function wcbMainPage()
    {
        
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
     *  @since  ver. 0.10.1 (edit. Pierre)
     *  @update ver. 0.11.1 (edit. Pierre)
     */
    public function adminScreenCssClass($classes)
    {
        $classes .= ' ' . $this->gaze();
        return $classes;
    }

    /**
     *  @since  ver. 0.11.1 (edit. Pierre)
     *  @ref    https://developer.wordpress.org/reference/functions/register_post_type/
     */
    public function registerEntities()
    {
        
    }

    /**
     *  @update ver. 0.11.1 (edit. Pierre)
     */
    public function boostTypes()
    {
        $_post_type = $this->gaze() . '_type';
        $_args['post_type'] = $_post_type;
        $ctypes = get_posts($_args);
        if (empty($ctypes)) {
            return;
        }
        $meta_keys = get_registered_meta_keys($_post_type);
        foreach ($ctypes as $ctype) {
            $args = ['labels' => ['singular_name' => $ctype->post_title]];
            $_meta = get_metadata('post', $ctype->ID);
            $meta = array_filter($_meta, function($k){
                return strpos($k, 'cty:') === 0;
            }, ARRAY_FILTER_USE_KEY);
            foreach ($meta as $key => $data) {
                $keys = explode(':', $key);
                array_shift($keys);
                if (count($keys) == 1) {
                    $pa = array_combine($keys, $data);
                    extract($pa);
                } else {
                    $val = $data[0];
                    switch ($meta_keys[$key]['type']) {
                        case 'boolean':
                            $val = (bool) $val;
                            break;
                        case 'integer':
                            $val = (int) $val;
                            break;
                    }
                    if ($keys[0] == 'args') {
                        $args[$keys[1]] = $val;
                    } elseif ($keys[0] == 'labels') {
                        $args['labels'][$keys[1]] = $val;
                    }
                }
            }
            register_post_type($post_type, $args);
        }
    }

    /**
     *
     */

//[EOT]*/
}