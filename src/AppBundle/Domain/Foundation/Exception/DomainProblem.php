<?php

namespace AppBundle\Domain\Foundation\Exception;

class DomainProblem extends \DomainException
{
    use KnownProblem;
}
