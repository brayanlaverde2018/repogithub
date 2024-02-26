<?php

namespace Negotiation;

require_once "/var/www/html/src/Negotiation/BaseAccept.php";
require_once "/var/www/html/src/Negotiation/AcceptHeader.php";
require_once "/var/www/html/src/Negotiation/Exception/InvalidMediaType.php";

use Negotiation\Exception\InvalidMediaType;

final class Accept extends BaseAccept implements AcceptHeader
{
    private $basePart;

    private $subPart;

    public function __construct($value)
    {
        parent::__construct($value);

        if ($this->type === '*') {
            $this->type = '*/*';
        }

        $parts = explode('/', $this->type);

        if (count($parts) !== 2 || !$parts[0] || !$parts[1]) {
            throw new InvalidMediaType();
        }

        $this->basePart = $parts[0];
        $this->subPart  = $parts[1];
    }

    /**
     * @return string
     */
    public function getSubPart()
    {
        return $this->subPart;
    }

    /**
     * @return string
     */
    public function getBasePart()
    {
        return $this->basePart;
    }
}
