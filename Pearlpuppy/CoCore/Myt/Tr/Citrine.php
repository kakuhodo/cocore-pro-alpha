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

    /**
     *
     */
    use Tr_CitrineArtery;
    use Tr_CitrineOrgan;
    use Tr_CitrineVein;

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

    // Protected Methods

    // Private Methods

    /**
     *
     */

//[EOT]*/
}
