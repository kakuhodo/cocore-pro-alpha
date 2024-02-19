<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *  @file   PQueue
 */

/**
 *  Grand design of 'Lemon' object
 */
interface Int_PQueue {

    // Methods

    /**
     *  -------------------------------
     *  Output
     *  -------------------------------
     */

    /**
     *  Creates outputting HTML markup
     */
    public function impose(): string;

    /**
     *  Outputs HTML markup
     */
    public function expose(): void;

    /**
     *  -------------------------------
     *  Edit
     *  -------------------------------
     */

    public function verify($tag);
    public function gratify($contents, $overwrite);
    public function specify(array $attrs);
    public function identify($id);
    public function classify($classes, $overwrite);
    public function declassify($value);

    /**
     *  -------------------------------
     *  Inspired by jQuery
     *  -------------------------------
     */

    /**
     *
     */
    public function addClass();
    public function attr($name_or_map, $value);
    public function hasClass();
    public function prop();
    public function removeAttr();
    public function removeClass();
    public function removeProp();
    public function toggleClass();
    public function val();

    /**
     *
     */

    /**
     *  -------------------------------
     *
     *  -------------------------------
     */

    /**
     *  -------------------------------
     *  -------------------------------
     */

    /**
     *
     */

//[EOI]*/
}