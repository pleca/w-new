<?php

namespace AppBundle\Domain\Note\Commands\CreateDocket;


class CreateDocketAuthorizer extends Authorizer
{
    public function denied(Identity $user_id=null, $command): bool
    {
        return false;
    }
    
    
}
