<?php

namespace Armadillo;

class EventDispatcherTest extends \PHPUnit_Framework_TestCase
{
    public function testRegisterEvent()
    {
        $eventName = 'test';

        $dispatcher = new EventDispatcher;

        $dispatcher->registerEvent($eventName);

        $this->assertCount(1, $dispatcher->getRegisteredEvents());
    }

    public function testAddingListenerToEvent()
    {
        $eventName = 'foo';
        $listener = $this->getMock('\SplObserver');

        $dispatcher = new EventDispatcher();
        $dispatcher->registerEvent($eventName);
        $dispatcher->addListenerToEvent($eventName, $listener);
        $events = $dispatcher->getRegisteredEvents();
        /** @var Event $event */
        $event = $events[$eventName];

        $this->assertTrue($event->getListeners()->contains($listener));
    }

    public function testRemovingListenerFromEvent()
    {
        $eventName = 'foo';
        $listener = $this->getMock('\SplObserver');

        $dispatcher = new EventDispatcher();
        $dispatcher->registerEvent($eventName);
        $dispatcher->addListenerToEvent($eventName, $listener);

        $events = $dispatcher->getRegisteredEvents();
        /** @var Event $event */
        $event = $events[$eventName];
        $listeners = $event->getListeners();

        $this->assertTrue($listeners->contains($listener));

        $dispatcher->removeListenerFromEvent($eventName, $listener);

        $this->assertFalse($listeners->contains($listener));
    }

    public function testEventCanBeDispatched()
    {
        $eventName = 'foo';
        $dispatcher = new EventDispatcher();
        $dispatcher->registerEvent($eventName);
        $data = ['foo', 'bar'];
        $dispatcher->dispatchEvent($eventName, $data);
    }
}
