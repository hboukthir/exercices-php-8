<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . '/bootstrap.php';

$entityManager = require_once __DIR__ . '/bootstrap.php';

return ConsoleRunner::createHelperSet($entityManager);
