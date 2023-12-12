<?php

use SophieCalixto\DoctrineORM\Entity\Client;
use SophieCalixto\DoctrineORM\Entity\Phone;
use SophieCalixto\DoctrineORM\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::createEntityManager();
$client = $entityManager->find(Client::class, $argv[1]);
$client->setName($argv[2]);
$entityManager->persist($client);
if(isset($argv[3])) {
    for($i = 3; $i < count($argv); $i++) {
        $client->addPhone(new Phone($argv[$i]));
    }
}

$entityManager->flush();

echo "Cliente atualizado com sucesso!";