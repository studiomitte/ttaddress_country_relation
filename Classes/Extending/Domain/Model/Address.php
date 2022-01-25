<?php

declare(strict_types=1);

namespace StudioMitte\TtaddressCountryRelation\Extending\Domain\Model;

class Address extends \FriendsOfTYPO3\TtAddress\Domain\Model\Address
{

    /**
     * @var \SJBR\StaticInfoTables\Domain\Model\Country
     */
    protected $countryRelation;

    /**
     * @var \SJBR\StaticInfoTables\Domain\Model\CountryZone
     */
    protected $regionRelation;

    /**
     * @return \SJBR\StaticInfoTables\Domain\Model\Country
     */
    public function getCountryRelation(): ?\SJBR\StaticInfoTables\Domain\Model\Country
    {
        return $this->countryRelation;
    }

    /**
     * @param \SJBR\StaticInfoTables\Domain\Model\Country $countryRelation
     */
    public function setCountryRelation(\SJBR\StaticInfoTables\Domain\Model\Country $countryRelation): void
    {
        $this->countryRelation = $countryRelation;
    }

    /**
     * @return \SJBR\StaticInfoTables\Domain\Model\CountryZone
     */
    public function getRegionRelation(): ?\SJBR\StaticInfoTables\Domain\Model\CountryZone
    {
        return $this->regionRelation;
    }

    /**
     * @param \SJBR\StaticInfoTables\Domain\Model\CountryZone $regionRelation
     */
    public function setRegionRelation(\SJBR\StaticInfoTables\Domain\Model\CountryZone $regionRelation): void
    {
        $this->regionRelation = $regionRelation;
    }
}
