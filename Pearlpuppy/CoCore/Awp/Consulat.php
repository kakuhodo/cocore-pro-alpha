<?php
namespace Pearlpuppy\CoCore\Awp;

use Pearlpuppy\CoCore\Myt;
use Pearlpuppy\CoCore\Myt\Lime;

/**
 *  @file    Consulat
 *
 */

/**
 *
 */
class Consulat extends Myt\Abs_IteratorCitron
{

    // Mixins

    use Myt\Tr_Citrine;

    // Constructor

    /**
     *
     */
    public function __construct(array|object $array = [], int $flags = 0)
    {
        $this->verify('dl');
        $this->classify('consulat');
        parent::__construct($array, $flags);
    }

    /**
     *
     */
    public function impose()
    {
        $this->trans();
        return parent::impose();
    }

    /**
     *
     */
    public function trans(): void
    {
#        $this->content = $this->transform();
        foreach ($this as $row) {
            $div = new Lime('div.row');
            $dt = new Lime('dt', $row[0]);
            $dd = new Lime('dd');
            $pre = new Lime('pre');
            $code = new Lime('code', print_r($row[1], true));
            $div->gratify([$dt, $dd]);
            $dd->gratify($pre);
            $pre->gratify($code);
            $this->content[] = $div;
        }
    }

    /**
     *  !!![PND] Iterator is better than Generator
     *
    private function transform(): \Generator
    {
        foreach ($this as $row) {
            $div = new Lime('div.row');
            $dt = new Lime('dt', $row[0]);
            $dd = new Lime('dd');
            $pre = new Lime('pre');
            $code = new Lime('code', print_r($row[1], true));
            $div->gratify([$dt, $dd]);
            $dd->gratify($pre);
            $pre->gratify($code);
            yield $div;
        }
    }

    /**
     *
     */

    /**
     *
     */

    /**
     *
     */

//[EOAC]*/
}
