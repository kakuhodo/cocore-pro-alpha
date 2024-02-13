<?php
namespace Pearlpuppy\CoCore\Myt;

/**
 *    @file
 *    Methods library built statically.
 */

final class Tribune
{

    // Mixins

    /**
     *
     */
    use Tr_Hypre;        // HTMLs
    use Tr_Violon;        // Strings and regular expressions
    use Tr_Numeron;        // Integers, floats, and any other numbers
    use Tr_Marshal;        // Iterators
    use Tr_Bough;        // File system and Namespaces
    use Tr_Loca;        // Time and locale
#    use Tr_WPXtra;        // extended WordPress
    use Tr_Kilter;        // Sanitizers and cleansers
    use Tr_Survayor;    // Debugs and Errors

    /**
     *
     */
    use Tr_Static;

    // Constants

    /**
     *
     *
    const WHO = __NAMESPACE__;
    const WHERE = __DIR__;

    // Properties

    /**
     *
     */

    // Constructor

    /**
     *
     */

    // Methods

    /**
     *
     */
    public static function greet()
    {
        echo 'Hi! This is ' . __CLASS__;
    }

    /**
     *
     */

    /**
     *
     */

//[EOFC]*/
}