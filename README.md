[![Build Status](https://travis-ci.org/nelsonsar/armadillo.svg?branch=master)](https://travis-ci.org/nelsonsar/armadillo)
[![Code Coverage](https://scrutinizer-ci.com/g/nelsonsar/armadillo/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/nelsonsar/armadillo/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nelsonsar/armadillo/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nelsonsar/armadillo/?branch=master)
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
