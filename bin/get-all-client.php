<?php

use SophieCalixto\DoctrineORM\Entity\Client;
use SophieCalixto\DoctrineORM\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::createEntityManager();
$repository = $entityManager->getRepository(Client::class);
/** @var Client[] $clients */
$clients = $repository->findAll();

echo PHP_EOL;
echo "CPF            | NOME" . PHP_EOL;
array_map(function($client) {
    echo $client->getCpf() . ' | ' . $client->getName() . PHP_EOL;
    echo PHP_EOL;
    if(count($client->getPhones()) === 0) {
        echo "Este cliente não possui telefones cadastrados!" . PHP_EOL;
        return;
    }
    echo "TELEFONES" . PHP_EOL;
    array_map(function($phone) {
        echo $phone->getNumber() . PHP_EOL;
    }, $client->getPhones()->toArray());
    echo PHP_EOL;
}, $clients);