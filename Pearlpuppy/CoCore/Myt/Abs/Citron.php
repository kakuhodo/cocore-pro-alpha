<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *    @file    Citron
 *    @since    2016-12-01
 *    @update    2024-02-13
 */
abstract class Abs_Citron implements Int_PQueue
{

    // Mixins

    /**
     *
     */
    use Tr_Citrine;

    // Constants

    /**
     *
     */
    const PAT_ALPHA = "/^[a-zA-Z]/";

    // Constructor

    /**
     *    @param    $contents    (mixed)    
     *    @param    $classes    (mixed)    
     *    @param    $attrs    (array)    Must keyed.
     */
    public function __construct(mixed $contents = null, string $tag = 'span', mixed $classes = array(), iterable $attrs = array())
    {
        $this->tag = $this->clean_tag($tag);
        $this->attributes = $this->clean_attrs($classes, $attrs);
        $this->content = $this->cleanContent($contents);
    }

    /**
     *
     */

//[EOAC]*/
}
