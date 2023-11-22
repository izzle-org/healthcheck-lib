# Izzle Simple HealthCheck Wrapper

## Installation

> Using composer:
 ```shell
 $ composer require izzle/healthcheck
 ```

## Usage

#### ExampleCheck.php
```php
<?php

namespace App\HealthChecks;

use Izzle\HealthCheck\CheckInterface;
use Izzle\HealthCheck\Response;
use Exception;

/**
 * Class FolderPermissionCheck
 * @package App\HealthChecks
 */
class FolderPermissionCheck implements CheckInterface
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'folder-permission';
    }

    /**
     * @param array|null $params
     * @return Response
     */
    public function run(?array $params = []): Response
    {
        try {
            if (!is_writable('/some/folder')) {
                throw new Exception('Folder /some/folder is not writeable!');
            }
        } catch (Exception $e) {
            return new Response(false, $e->getMessage());
        }

        return new Response(true);
    }
}

 ```

#### Health.php
```php
<?php

namespace App;

use Izzle\HealthCheck\Manager;
use Izzle\HealthCheck\Checks\NullCheck;
use App\HealthChecks\FolderPermissionCheck;

$manager = new Manager([
    new NullCheck(),
    new FolderPermissionCheck()
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

Copyright (c) 2020-present Izzle

[MIT License](http://en.wikipedia.org/wiki/MIT_License)
