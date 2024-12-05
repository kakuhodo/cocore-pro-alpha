<?php
namespace Pearlpuppy\CoCore\Awp;

/**
 *  @file   Passer
 */

/**
 *
 */
trait Tr_Passer
{

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
     *
     */

    // Constructor

    /**
     *
     */

    // Methods

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     */
    public function productPath(): string
    {
        return $this->productDir();
    }

    /**
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public function productUri(): string
    {
        return $this->productDir(true);
    }

    /**
     *  @since  ver. 0.10.1 (edit. Pierre)
     *  @update ver. 0.10.4 (edit. Pierre)
     */
    public function productIncPath(string $file = null): string
    {
        return $this->productDir(false, 'inc', $file);
    }

    /**
     *  @since  ver. 0.10.6 (edit. Pierre)
     */
    public function productImgPath(string $file = null): string
    {
        return $this->productDir(false, 'img', $file);
    }

    /**
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public function productAssetUri(string $file = null): string
    {
        return $this->productDir(true, 'asset', $file);
    }

    /**
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public function productStyleUri(string $file = null): string
    {
        return $this->productDir(true, 'css', $file);
    }

    /**
     *
     */

//[EOC]*/
}
