<?php
namespace Pearlpuppy\CoCore\SuperCal;

use Pearlpuppy\CoCore\Myt;
use Pearlpuppy\CoCore\Myt\Tribune;

/**
 *  @file   Integrator
 */

/**
 *
 */
class Integrator
{

	// Mixins

    /**
     *
     */
    use Myt\Tr_Inconstructible;

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
     *
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public static function penetrate(Crystal $crystal)
    {
        self::penetYear($crystal);
        self::penetMonth($crystal);
        self::penetDay($crystal);
    }

    /**
     *
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public static function penetYear(Crystal $crystal)
    {
        $year = array(
            'yy' => abs($crystal->y) % 2,
            'sxg' => self::sexagen($crystal->y),
        );
        $year['elem'] = floor(($year['sxg'] % 10) / 2);
        $year['branch'] = $year['sxg'] % 12;
        $crystal->offsetSet('year', $year);
    }

    /**
     *
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static function penetMonth(Crystal $crystal)
    {
        $month = array(
            'terms' => self::annualTermDays($crystal->m, $crystal->y),
        );
        $crystal->offsetSet('month', $month);
    }

    /**
     *
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static function penetDay(Crystal $crystal)
    {
        $month = $crystal->m;
        if ($crystal->d < $crystal['month']['terms'][1]) {
            --$month;
        }
        $day = array(
            'sign' => self::monthGetSign($month),
        );
        $crystal->offsetSet('day', $day);
    }

    /**
     *
     *  @since  ver. 0.10.4 (edit. Pierre)
     */
    public static function sexagen(int $year): int
    {
        $n = ($year - 4) % 60;
        if ($n < 0) {
            $n += 60;
        }
        return $n;
    }

    /**
     *  @param  int index number of Solar term [0-23], Lichun: 0
     *  @return int number of the Month [1-12]
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static function stGetMonth(int $index): int
    {
        return (int) floor(($index + 2) % 24 / 2) + 1;
    }

    /**
     *  @param  int index number of Solar term [0-23], Lichun: 0
     *  @return int degree (°) number of the Ecliptic Longitude (λ) [0-{++15}-345]
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static function stGetLambda(int $index): int
    {
        return ($index + 21) % 24 * 15;
    }

    /**
     *  @param  int index number of Solar term [0-23], Lichun: 0
     *  @return int index number of Astrological sign [0-11]
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static function stGetSign(int $index): int
    {
        return (int) floor(($index + 21) % 24 / 2);
    }

    /**
     *  @param  int number of the month [1-12]
     *  @return int index number of Astrological sign [0-11]
     *      which starting day included in $month
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static function monthGetSign(int $month): int
    {
        return ($month + 9) % 12;
    }

    /**
     *  Provides annual dates (day number of the month) of Solar term
     *
     *  @param  $month int number of the month [1-12]
     *  @param  $year int number of the year (max 4 digit +/-)
     *  @return array 2 days number of the month each minor[0]/major[1] terms.
     *  @since  ver. 0.10.5 (edit. Pierre)
     *
    public static function monthGetAnnTermDays(int $month, int $year): array
    {
    }

    /**
     *
     *  @param  $month int number of the month [1-12]
     *  @since  ver. 0.10.5 (edit. Pierre)
     *
    public static function monthGetTermIds(int $month): array
    {
    }

    /**
     *
     *  @param  $month int number of the month [1-12]
     *  @return int minor index number of Solar term [0,2,4...22]
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static function monthGetMinorId(int $month): int
    {
        return ($month + 10) % 12 * 2;
    }

    /**
     *
     *  @param  $month int number of the month [1-12]
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static function monthGetMajorId(int $month): int
    {
        return self::monthGetMinorId($month) + 1;
    }

    /**
     *
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static function annualTermDays(int $month, int $year): array
    {
        $id = self::monthGetMinorId($month);
        $days = array(
            self::solarTermDay($id, $year),
            self::solarTermDay(++$id, $year),
        );
        return $days;
    }

    /**
     *
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static function annualTermDay(int $month, int $year, bool $major = true): int
    {
        $mm = 'Major';
        if (!$major) {
            $mm = 'Minor';
        }
        $method = "monthGet{$mm}Id";
        $id = self::$method($month);
        return self::solarTermDay($id, $year);
    }

    /**
     *
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    public static function solarTermDay(int $index, int $year): int
    {
        if ($index <= 1 || $index >= 22) {
            --$year;
        }
        return self::figureTermDay($year, Tribune::$solterm_operands[$index]);
        // $st_ops = new \ArrayIterator(Tribune::$solterm_operands);
        // $ops = $st_ops->offsetGet($index);
        // return self::figureTermDay($year, $ops);
    }

    /**
     *
     *  @since  ver. 0.10.5 (edit. Pierre)
     */
    private static function figureTermDay(int $year, iterable $operands): int
    {
        return (int) floor($operands[0] + ($operands[1] * ($year - 1900)) - floor(($year - 1900) / 4));
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

    /**
     *
     */

//[EOC]*/
}
