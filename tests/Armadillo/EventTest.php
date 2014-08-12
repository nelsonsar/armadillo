<?php

namespace Armadillo;

class EventTest extends \PHPUnit_Framework_TestCase
{
    public function testSetData()
    {
        $event = new Event('test');

        $data = array('a' => 'b');

        $event->setData($data);

        $this->assertSame($data, $event->getData());
    }

    public function testAttach()
    {
        $event = new Event('test');
        $listener = $this->getMock('\SplObserver');

        $event->attach($listener);

        $this->assertCount(1, $event->getListeners());
    }

    public function testDetach()
    {
        $event = new Event('test');
        $listener = $this->getMock('\SplObserver');

        $event->attach($listener);
        $event->detach($listener);

        $this->assertCount(0, $event->getListeners());
    }

    public function testNotify()
    {
        $event = new Event('test');
        $listener = $this->getMock('\SplObserver');
        $listener->expects($this->once())
            ->method('update')
            ->with($event);

        $event->attach($listener);

        $event->notify();
    }
}
