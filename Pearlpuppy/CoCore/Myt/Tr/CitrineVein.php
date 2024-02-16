<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 * @file
 */

/**
 *  Members mostly used on generating HTML markups.
 */
trait Tr_CitrineVein {

    // Mixins

    // Properties

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
        if ($this->content instanceof Int_PQueue) {
            $inner = $this->content->impose();
        } elseif (is_iterable($this->content)) {
            $inner = '';
            foreach ($this->content as $content) {
                $inner .= $content instanceof Int_PQueue ? $content->impose() : $content;
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
     *
     */

//[EOT]*/
}
