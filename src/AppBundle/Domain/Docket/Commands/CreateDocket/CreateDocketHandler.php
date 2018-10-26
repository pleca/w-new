<?php

namespace AppBundle\Domain\Note\Commands\CreateDocket;


class CreateDocketHandler
{
    private $collection;
    
    /**
     * PostNewNoteHandler constructor.
     *
     * @param $collection
     */
    public function __construct(NoteCollection $collection) { $this->collection = $collection; }
    
    
    public function __invoke(CreateDocket $command): void
    {
        Assert::that($command->getText()->getText())->minLength(1, "Sorry, unable to add empty note");
        
        $note = Note::make($command->getId(), $command->getText(), $command->getOwnerId());
        $this->collection->save($note);
        
        // Fire domain events
        array_map([event_bus(), 'dispatch'], $note->pullDomainEvents());
    }
    
}
