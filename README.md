# Izzle Simple HealthCheck Wrapper

## Installation

> Using composer:
 ```shell
 $ composer require izzle/healthcheck
 ```

## Usage

```php
use Izzle\HealthCheck\Manager;
use Izzle\HealthCheck\Checks\NullCheck;

$manager = new Manager([
    new NullCheck()
]);

$results = $manager->run();

$result = [
    'global' => true,
    'components' => []
];

foreach ($results as $component => $response) {
    if ($response->getStatus() === false) {
        $result['global'] = false;
    }
    
    $result['components'][$component] = $response->getStatus();
}

echo json_encode($result);
```

## License

Copyright (c) 2020-present JTL-Software

[MIT License](http://en.wikipedia.org/wiki/MIT_License)
