<?php

use SophieCalixto\DoctrineORM\Entity\Client;
use SophieCalixto\DoctrineORM\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::createEntityManager();
$repository = $entityManager->getRepository(Client::class);
/** @var Client[] $clients */
$clients = $repository->findAll();

echo "CPF            | NOME" . PHP_EOL;
array_map(function($client) {
    echo $client->getCpf() . ' | ' . $client->getName() . PHP_EOL;
}, $clients);