<?php

namespace AppBundle\Domain\Note\Commands\CreateDocket;

use AppBundle\Domain\Foundation\Command\Command;


class CreateDocket implements Command
{
    
    /** @var  NoteText */
    private $text;
    /** @var  Identity */
    private $id;
    /** @var  Identity */
    private $owner_id;
    
    /**
     * PostNewNote constructor.
     *
     * @param NoteText   $text
     * @param Identity $id
     * @param Identity $owner_id
     */
    public function __construct(NoteText $text, Identity $id, Identity $owner_id)
    {
        $this->text     = $text;
        $this->id       = $id;
        $this->owner_id = $owner_id;
    }
    
    /**
     * @return NoteText
     */
    public function getText(): NoteText
    {
        return $this->text;
    }
    
    /**
     * @return Identity
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @return Identity
     */
    public function getOwnerId(): Identity
    {
        return $this->owner_id;
    }
    
    
}
