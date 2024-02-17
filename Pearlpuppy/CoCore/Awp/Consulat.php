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
        $this->content = $this->geneCon();
        return parent::impose();
    }

    /**
     *  $this (ArrayIterator) の要素が随時変更可能である前提だと、↓では NG
     *  ならば、$this->content は、やはり Generator とし、impose() の度に生成、
     *  expose() で破棄するのが順当と考えられる。
     *
    public function _trans(): void
    {
        $raw_c = $this->count();
        $done_c = $this->content->count();
        $chk = $raw_c <=> $done_c;
        switch ($chk) {
            case 0:
                break;
            case 1:
                $this->addContents($done_c);
                break;
            case -1:
                $this->reduceContents();
                break;
        }
    }

    /**
     *
     */
    public function trans(): void
    {
        $this->content = $this->geneCon();
    }

    /**
     *
     */
    public function geneCon(): \Generator
    {
        $this->rewind();
        while ($this->valid()) {
            yield new ConsPair($this->key(), $this->current());
            $this->next();
        }
    }

    /**
     *
     *
    private function addContents(int $offset)
    {
        $this->rewind();
        if ($offset) {
            $this->seek($offset);
        }
        while ($this->valid()) {
#            $this->content->append(new Myt\DlPair($this->key(), $this->current()));
            $this->content[$this->key()] = new Myt\DlPair($this->key(), $this->current());
            $this->next();
        }
    }

    /**
     *
     *
    private function reduceContents()
    {
        $this->content = new \ArrayIterator();
        $this->addContents(0);
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
