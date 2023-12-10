<?php

use SophieCalixto\DoctrineORM\Entity\Client;
use SophieCalixto\DoctrineORM\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::createEntityManager();
$client = $entityManager->find(Client::class, $argv[1]);
$entityManager->remove($client);
$entityManager->flush();

echo "Cliente removido com sucesso!";