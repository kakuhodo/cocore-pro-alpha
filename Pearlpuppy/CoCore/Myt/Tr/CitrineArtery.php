<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 * @file
 */

/**
 *  Members to be used on generating self instance mainly.
 */
trait Tr_CitrineArtery {

    // Mixins

    // Properties

    // Methods

    /**
     *    Makes a list for ul|ol|dl|?select
     *
     *        For now, only usable for ul|ol. 181113 v0.2.4
     *
     *  @memo   (240219) This concept might be overridden by AC/DC concept.
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

    // Protected Methods

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
     *  @since  ver. 0.10.1 (edit. Pierre)
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
        $classes = array_unique(preg_grep(self::PAT_ALPHA, $classes));
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
