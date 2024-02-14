<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 * @file
 */

/**
 *    Universal members for Citrons.
 */
trait Tr_Citrine {

    // Mixins

    /**
     *
     */
    use Tr_HypreLime;

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

    // Public Methods

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

    /**
     *    Makes a list for ul|ol|dl|?select
     *
     *        For now, only usable for ul|ol. 181113 v0.2.4
     */
    public function listen() {
        if (!array_key_exists($this->tag, static::$lists)) {
            return false;
        }
        $row = self::$lists[$this->tag];
        if (is_array($row)) {
            if ($this->tag == 'dl') {
                $this->dListener();
                return;
            }
        }
        if ($this->content instanceof self && $this->content->tag == $row) {
            return;
        } elseif (is_array($this->content)) {
            $contents = array();
            foreach ($this->content as $key => $content) {
                $obj = new static();
                $obj->verify($row);
                $obj->gratify($content);
                $contents[$key] = $obj;
            }
            $this->content = $contents;
        } else {
            $obj = new static();
            $obj->verify($row);
            $obj->gratify($this->content);
            $this->content = $obj;
        }
    }

    // Methods inspired by jQuery

    /**
     *
     */
    public function addClass() {
    }

    /**
     *
     */
    public function attr($name_or_map, $value = null) {
        // for map
        if (is_array($name_or_map)) {
            foreach ($name_or_map as $name => $value) {
                if (is_null($value)) {
                    $value = '';
                }
                $this->attr($name, $value);
            }
            return;
        }
        // define, refine
        $name = $name_or_map;
        if ($name == 'class') {
            $name = 'classes';
        }
        // retrieve
        if (is_null($value)) {
            if (isset($this->attributes[$name])) {
                return $this->attributes[$name];
            } else {
                return false;
            }
        }
        // validate
        $valid = preg_match("/^[a-z]+[\w|-]*$/", $name);
        if (!$valid) {
            return false;
        }
        // assign
        $this->attributes[$name] = $value;
        return;
    }

    /**
     *
     */
    public function hasClass() {
    }

    /**
     *
     */
    public function prop() {
    }

    /**
     *
     */
    public function removeAttr() {
    }

    /**
     *
     */
    public function removeClass() {
    }

    /**
     *
     */
    public function removeProp() {
    }

    /**
     *
     */
    public function toggleClass() {
    }

    /**
     *
     */
    public function val() {
    }

    // Protected Methods

    /**
     *
     */
    protected function initStats() {
        self::$pat_alpha = tribune::pat('alphacap');
    }

    /**
     *
     */
    protected function cracker($selector) {
        $original = $selector;
        $this->crackAttr($selector);        // !!! define screwAttr() to extract attributes from a selector.
        $this->crackClass($selector);
        $this->crackId($selector);
        $this->crackTag($selector);
    }

    /**
     *  Attribution selector shouldn't have double-quote `"`.
     *      e.g.)
     *          tag[attr=val] -> OK, tag[attr="val"] -> NG
     */
    protected function crackAttr(&$selector) {
        // check
        $matched = preg_match_all("/\[(.*)\]/", $selector, $matches);
        // exclude
        if (!$matched) {
            return;
        }
        // prep
        $attrs = array();
        $glue = '=';
        // sweep
        $selector = str_replace($matches[0], '', $selector);
        // store
        foreach ($matches[1] as $match) {
            $eqs = substr_count($match, $glue);
            $pos = strpos($match, $glue);
            if ($eqs > 1 || !$match || $pos === 0) {
                continue;
            } elseif ($pos === false) {
                $pos = strlen($match);
            }
            $key = substr($match, 0, $pos);
            $value = substr($match, $pos + 1);
            $attrs[$key] = $value;
        }
        $this->specify($attrs);
    }

    /**
     *    Compiles HTML classes from a selector.
     */
    protected function crackClass(&$selector) {
        // check
        $matched = preg_match_all("/\.([a-zA-Z]+[\w|-]*)/", $selector, $matches);
        // exclude
        if (!$matched) {
            return;
        }
        // store
        $this->classify($matches[1]);
        // sweep
        $selector = str_replace($matches[0], '', $selector);
    }

    /**
     *
     */
    protected function crackId(&$selector) {
        // check
        $matched = preg_match("/#([a-zA-Z]+[\w|-]*)/", $selector, $matches);
        // exclude
        if (!$matched) {
            return;
        }
        // store
        $this->identify($matches[1]);
        // sweep
        $selector = str_replace($matches[0], '', $selector);
    }

    /**
     *
     */
    protected function crackTag(&$selector) {
        // check
        $matched = preg_match("/^(h[1-6]|[a-z]+)/", $selector, $matches);
        // exclude
        if (!$matched) {
            return;
        }
        // store
        $this->verify($matches[1]);
        // sweep
        $selector = str_replace($matches[0], '', $selector);
    }

    /**
     *
     */
    protected function cleanContent($contents) {
        ### [PND] make some cleaner
        return $contents;
    }

    /**
     *
     */
    protected function validate() {
    }

    /**
     *  @since ver. 0.10.1 (edit. Pierre)
     */
    protected function dListener()
    {
        if (!is_array($this->content)) {
            return;
        }
        $contents = array();
        foreach ($this->content as $dt => $dd) {
            $row = new Lime('div');
            $row->gratify(new Lime('dt', $dt));
            $row->gratify(new Lime('dd', $dd));
            $contents[] = $row;
        }
        $this->content = $contents;
    }

    // Private Methods

    /**
     *
     */
    private function universal_injection()
    {
        if (Tribune::is_formal($this->tag) && !isset($this->attributes['tabindex'])) {
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

//[EOT]*/
}
