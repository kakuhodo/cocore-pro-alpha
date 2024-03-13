<?php
namespace Pearlpuppy\CoCore\Awp;

/**
 *  @file   Enq
 */

/**
 *
 */
trait Tr_Enq
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
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function enqueueVia(string $caller)
    {
        $suffix = '-';
        $screen = $this->screen($caller);
        if ($this->isCross($screen)) {
            $suffix .= $screen;
        } else {
            $suffix = '';
        }
        foreach ($this->phases as $phase => $handle) {
            $handle .= $suffix;
            if ($phase == 'brand') {
                $asc = null;
            } else {
                $asc = $this->phases['brand'];
            }
            $this->enqueueAssets($handle, $asc);
        }
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function enqueueAssets(string $handle, ?string $asc = null)
    {
        foreach (Whip::$enqueues as $asset) {
            $callback = "wp_enqueue_$asset";
            $args = $this->enqArgue($asset, $handle, $asc);
            if (!$args) {
                continue;
            }
            call_user_func_array($callback, $args);
        }
    }

    /**
     *  @return file path if alive, else false
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function assetFileAlive(string $asset, string $handle, ?string $asc = null)
    {
        $xt = $this->assetXtens($asset);
        $file = "$handle.$xt";
        if ($asc && $this->isScheme('theme') && $this->substream) {
            $file_path = $this->subProductDir(false, $xt, $file);
        } else {
            $file_path = $this->productDir(false, $xt, $file);
        }
        return file_exists($file_path) ? $file_path : false;
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function enqArgue(string $asset, string $handle, ?string $asc = null)
    {
        $file = $this->assetFileAlive($asset, $handle, $asc);
        if (!$file) {
            return false;
        }
        $src = Whip::wpx_path2uri($file);
        $deps = $this->assetDepsArgue($asset, $asc);
        $ver = $this->info->get('Version');
        $_plus = $this->assetPlusArgue($asset);
        $_args = compact(Whip::$enqueue_arg_keys);
        $re_plus = array_pop($_args);
        $args = array_values($_args);
        $args[] = $re_plus;
        return $args;
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function assetPlusArgue(string $asset)
    {
        switch ($asset) {
            case 'style':
                $p = 'all';
                break;
            case 'script':
                $p = array(
                    'strategy' => 'defer',
                    'in_footer' => true,
                );
                break;
            default:
                $p = false;
                break;
        }
        return $p;
    }

    /**
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    protected function assetDepsArgue(string $asset, ?string $asc)
    {
        $chk_funk = "wp_{$asset}_is";
        if ($asc && $chk_funk($asc)) {
            $deps = [$asc];
        } else {
            $deps = [];
        }
        return $deps;
    }

    /**
     *
     */

//[EOC]*/
}
