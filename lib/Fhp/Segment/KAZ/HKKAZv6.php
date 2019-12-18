<?php /** @noinspection PhpUnused */

namespace Fhp\Segment\KAZ;

use Fhp\Segment\BaseSegment;

/**
 * Segment: Kontoumsätze anfordern/Zeitraum (Version 7)
 *
 * @link https://www.hbci-zka.de/dokumente/spezifikation_deutsch/fintsv3/FinTS_3.0_Messages_Geschaeftsvorfaelle_2015-08-07_final_version.pdf
 * Section: C.2.1.1.1.1 a)
 */
class HKKAZv6 extends BaseSegment
{
    /** @var \Fhp\Segment\Common\KtvV3 */
    public $kontoverbindungAuftraggeber;
    /** @var bool Only allowed if HIKAZS $alleKontenErlaubt says so. */
    public $alleKonten;
    /** @var string|null JJJJMMTT gemäß ISO 8601 */
    public $vonDatum;
    /** @var string|null JJJJMMTT gemäß ISO 8601 */
    public $bisDatum;
    /** @var int|null Only allowed if HIKAZS $eingabeAnzahlEintraegeErlaubt says so. */
    public $maximaleAnzahlEintraege;
    /** @var string|null Max length: 35 */
    public $aufsetzpunkt;

    /**
     * @param \Fhp\Segment\Common\KtvV3 $ktv
     * @param bool $alleKonten
     * @param \DateTime|null $vonDatum
     * @param \DateTime|null $bisDatum
     * @param string|null $aufsetzpunkt
     * @return HKKAZv6
     */
    public static function create($ktv, $alleKonten, $vonDatum, $bisDatum, $aufsetzpunkt = null)
    {
        $result = HKKAZv6::createEmpty();
        $result->kontoverbindungAuftraggeber = $ktv;
        $result->alleKonten = $alleKonten;
        $result->vonDatum = $vonDatum === null ? null : $vonDatum->format('Ymd');
        $result->bisDatum = $bisDatum === null ? null : $bisDatum->format('Ymd');
        $result->aufsetzpunkt = $aufsetzpunkt;
        return $result;
    }
}
