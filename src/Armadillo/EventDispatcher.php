<?php

namespace Armadillo;

class EventDispatcher
{
    private $events = array();

    public function registerEvent($eventName)
    {
        $this->events[$eventName] = new Event($eventName);
    }

    public function getRegisteredEvents()
    {
        return $this->events;
    }

    public function addListenerToEvent($eventName, \SplObserver $listener)
    {
        $this->events[$eventName]->attach($listener);
    }

    public function removeListenerFromEvent($eventName, \SplObserver $listener)
    {
        $this->events[$eventName]->detach($listener);
    }

    public function dispatchEvent($eventName, $data = null)
    {
        $this->events[$eventName]->setData($data);

        $this->events[$eventName]->notify();
    }
}
