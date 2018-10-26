<?php

namespace AppBundle\Domain\Foundation;


use AppBundle\Domain\Foundation\Event\DomainEvent;
use AppBundle\Domain\Foundation\VO\Identity;

abstract class AggregateRoot
{
    /** @var Identity */
    protected $id;
    
    /**
     * @var array<DomainEvent>
     */
    private $events = [];
    
    final public function getId(): Identity
    {
        return $this->id;
    }
    
    protected function apply(DomainEvent $event)
    {
        $this->events[] = $event;
    }
    
    public function pullDomainEvents(): array
    {
        $events       = $this->events;
        $this->events = [];
        
        return $events;
    }
}