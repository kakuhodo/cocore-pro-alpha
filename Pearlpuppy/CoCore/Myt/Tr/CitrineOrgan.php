<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 * @file
 */

/**
 *  Members mostly used on editing self instance.
 */
trait Tr_CitrineOrgan {

    // Mixins

    // Properties

    // Methods

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
                if (preg_match(self::PAT_ALPHA, $id)) {
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
    public function specify(array $attrs = [])
    {
        $this->attr($attrs);
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

    // Private Methods

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

//[EOT]*/
}
