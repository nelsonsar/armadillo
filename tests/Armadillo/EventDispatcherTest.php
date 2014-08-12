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
}
