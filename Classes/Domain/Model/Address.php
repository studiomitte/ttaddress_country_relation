<?php

namespace StudioMitte\TtaddressCountryRelation\Domain\Model;

class Address extends \FriendsOfTYPO3\TtAddress\Domain\Model\Address
{

    /**
     * @var \SJBR\StaticInfoTables\Domain\Model\Country
     */
    protected $countryRelation = null;

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

}
