<?php

namespace Armadillo;

class Event implements \SplSubject
{
    private $observers = null;
    private $name = null;
    private $data = null;

    public function __construct($name)
    {
        $this->name = $name;
        $this->observers = new \SplObjectStorage;
    }

    public function getListeners()
    {
        return $this->observers;
    }

    public function attach(\SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}
