<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use SophieCalixto\DoctrineORM\Helper\EntityManagerFactory;

// Adjust this path to your actual bootstrap.php
require __DIR__ . '/../vendor/autoload.php';

ConsoleRunner::run(
    new SingleManagerProvider(EntityManagerFactory::createEntityManager())
);