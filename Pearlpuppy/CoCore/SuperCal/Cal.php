<?php
namespace Pearlpuppy\CoCore\SuperCal;

/**
 *  @file   Cal
 */

/**
 *
 *  @since  ver. 0.10.4 (edit. Pierre)
    - 曜日
    - 十干十二支（干支）
    - 12星座
    - 月齢
    - 六曜
    - 九星
    - 二十四節気
    - 四柱推命
    - 六星占術
 */
class Cal extends \DateTimeImmutable
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
     *
    public int $y;

    /**
     *
     */
    public Crystal $data;

    // Constructor

    /**
     *
     */
    public function __construct(string $datetime = "now", ?\DateTimeZone $timezone = null)
    {
        parent::__construct($datetime, $timezone);
        $this->integrate();
        // $this->calDayOfWeek();
        // $this->calSexagenary();
    }

    // Methods

    /**
     *
     */
    private function integrate()
    {
        $this->data = new Crystal;
        $this->data->y = (int) $this->format('Y');
        $this->data->m = (int) $this->format('n');
        $this->data->d = (int) $this->format('j');
    }

    /**
     *
     */

    /**
     *
     */
    private function calSexagenary()
    {
        $i = ($this->y - 4) % 60;
        if ($i < 0) {
            $i += 60;
        }
        $this->data['sexage'] = $i;
    }

    /**
     *
     */
    private function calDayOfWeek()
    {
        $this->data['dow'] = (int) $this->format('w');
    }

    /**
     *
     */
    public function test()
    {
        // return $this->y;
    }

    /**
     *
     */

    /**
     *
     */

//[EOC]*/
}
