<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *    @file    Citron
 *    @since    2016-12-01
 *    @version    0.3.0
 *    @update    2024-02-13
 */
abstract class Abs_Citron implements Int_PQueue
{

    // Mixins

    use Tr_Citrine;

    // Constants

    // Properties (Dynamics)

    /**
     *    Master members.
     */
    public string $tag = 'span';
    public iterable $attributes = array();
    public mixed $content = null;

    // Properties

    /**
     *
     */
    private static $pat_alpha;

    /**
     *
     */

    // Constructor

    /**
     *    @param    $contents    (mixed)    
     *    @param    $classes    (mixed)    
     *    @param    $attrs    (array)    Must keyed.
     */
    public function __construct(mixed $contents = null, string $tag = 'span', mixed $classes = array(), iterable $attrs = array())
    {
        $this->initStats();
        $this->tag = $this->clean_tag($tag);
        $this->attributes = $this->clean_attrs($classes, $attrs);
        $this->content = $this->cleanContent($contents);
    }

    // Methods (Publics)

    /**
     *
     */
    public function impose()
    {
        $this->universal_injection();
        $nl = self::$line_breaker;
        if ($this->is_empty_element()) {
            $format = self::$emp_format;
        } else {
            $format = self::$ht_format;
        }
        if (!($this->is_inline_element() && is_string($this->content))) {
            $format = $nl . $format . $nl;
        }
        $args = array(
            $this->tag,
            $this->tribal(),
        );
        if (!$this->is_empty_element()) {
            $args[2] = $this->inner_impose();
        }
        $markup = vsprintf($format, $args);
        return str_replace("\n\n", "\n", $markup);
    }

    /**
     *
     */
    public function expose()
    {
        echo $this->impose();
    }

    /**
     *
     */
    public function disable()
    {
        $this->set_bool_attr('disabled');
    }

    /**
     *
     */
    public function enable()
    {
        unset($this->attributes['disabled']);
    }

    /**
     *
     */
    public function verify($tag)
    {
        return $this->grind($this->tag, $tag, true);
    }

    /**
     *
     */
    public function gratify($contents = null, $overwrite = false)
    {
        return $this->grind($this->content, $contents, $overwrite);
    }

    /**
     *    Provides or assigns 'id' attribute.
     */
    public function identify($id = null)
    {
        if (!$id) {
            if (isset($this->attributes['id'])) {
                return $this->attributes['id'];
            } else {
                return $id;
            }
        } else {
            if (is_string($id)) {
                if (preg_match(self::$pat_alpha, $id)) {
                    $this->attributes['id'] = $id;
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    /**
     *
     */
    public function classify($classes = null, $overwrite = false)
    {
        return $this->grind($this->attributes['classes'], $classes, $overwrite, true);
    }

    /**
     *
     */
    public function declassify($value)
    {
        while (($index = array_search($value, $this->attributes['classes'], true)) !== false) {
            unset($this->attributes['classes'][$index]);
        }
    }

    /**
     *
     */
    public function specify($attrs = [])
    {
        $this->attr($attrs);
    }

    // Methods (Privates)

    /**
     *
     */
    private function universal_injection()
    {
        if (tribune::is_formal($this->tag) && !isset($this->attributes['tabindex'])) {
            if (isset($this->attributes['type']) && $this->attributes['type'] == 'hidden') {
                return;
            }
            $this->attributes['tabindex'] = 1;
        }
    }

    /**
     *    !!! [PND]    should write the case the content is an instance of Citron but not tagged intent.
     */
    private function deep_impose($content, $index)
    {
        switch ($this->tag) {
            case 'dl':
                $_content = new static();
                $_content->gratify($content);
                if ($index === 0) {
                    $_content->tag = 'dt';
                } else {
                    $_content->tag = 'dd';
                }
                $content = $_content->impose();
                break;
            default:
                break;
        }
        return $content;
    }

    /**
     *
     */
    private function inner_impose()
    {
        if ($this->content instanceof self) {
            $inner = $this->content->impose();
        } elseif (is_array($this->content)) {
            $inner = '';
            foreach ($this->content as $index => $content) {
                $inner .= $content instanceof self ? $content->impose() : $content;
            }
        } else {
            $inner = $this->content;
        }
        return $inner;
    }

    /**
     *
     */
    private function final_plastic()
    {
        $this->listen();
    }

    /**
     *
     */
    private function is_empty_element()
    {
        return in_array($this->tag, self::$empties);
    }

    /**
     *
     */
    private function is_inline_element()
    {
        return in_array($this->tag, self::$inlines);
    }

    /**
     *
     */
    private function tribal()
    {
        return self::tribe($this->attributes);
    }

    /**
     *    Inserts a boolean attribute, like 'selected' or something.
     */
    private function set_bool_attr($attr)
    {
        $this->attributes[$attr] = $attr;
    }

    /**
     *        !!! PND        preg logic
     */
    private function grind(&$property = null, $insert = null, $overwrite = false, $preg = false)
    {
        if (!$insert && !$overwrite) {
            return $property;
        } elseif (!$insert && $overwrite) {
            $property = null;
            return;
        }
        if ($overwrite) {
            $property = $insert;
            return;
        }

        $exists = [];
        if ($property) {
            if (!is_array($property)) {
                $exists = [$property];
            } else {
                $exists = $property;
            }
        }
        if (!is_array($insert)) {
            $insert = [$insert];
        }
        $property = array_merge($exists, $insert);
        return;
    }

    /**
     *
     */
    private function clean_tag($tag)
    {
        if (!$tag) {
            $tag = 'span';
        }
        return $tag;
    }

    /**
     *
     */
    private function clean_attrs($classes, $attrs)
    {
        if (!is_array($attrs)) {
            $attrs = [];
        }
        if (!isset($attrs['classes']) || !is_array($attrs['classes'])) {
            $attrs['classes'] = [];
        }
        if (!is_array($classes)) {
            $classes = [$classes];
        }
        if (array_key_exists('class', $attrs)) {
            if (!empty($attrs['class'])) {
                if (is_array($attrs['class'])) {
                    $classes = array_merge($classes, $attrs['class']);
                } else {
                    $classes[] = $attrs['class'];
                }
            }
            unset($attrs['class']);
        }
        $classes = array_merge($classes, $attrs['classes']);
        $classes = array_unique(preg_grep(self::$pat_alpha, $classes));
        if (!empty($classes)) {
            $attrs['classes'] = $classes;
        }
        return $attrs;
    }

    /**
     *
     */

//[EOAC]*/
}
