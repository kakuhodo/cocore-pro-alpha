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
     */
    public array $data = [];

    // Constructor

    /**
     *
     */
    public function __construct(string $datetime = "now", ?\DateTimeZone $timezone = null)
    {
        parent::__construct($datetime, $timezone);
        $this->calDayOfWeek();
    }

    // Methods

    /**
     *
     */
    protected function calDayOfWeek()
    {
        $this->data['dow'] = (int) $this->format('w');
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

//[EOC]*/
}
