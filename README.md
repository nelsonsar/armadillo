Armadillo
=========

Armadillo is a *REALLY* simple event manager that uses ```SplSubject``` and ```SplObserver``` to watch event dispatches.

## How to use it

```php
<?php

$dispatcher = new Armadillo\EventDispatcher;
$dispatcher->registerEvent('request');
$dispatcher->addListenerToEvent('request', $yourListener);

$dispatcher->dispatchEvent('event', 'Hello World');
```
