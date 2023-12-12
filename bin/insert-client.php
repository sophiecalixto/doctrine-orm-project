<?php

use SophieCalixto\DoctrineORM\Entity\Client;
use SophieCalixto\DoctrineORM\Entity\Phone;
use SophieCalixto\DoctrineORM\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerFactory::createEntityManager();

$client = new Client($argv[1]);
$client->setName($argv[2]);
if(isset($argv[3])) {
    for($i = 3; $i < count($argv); $i++) {
        $client->addPhone(new Phone($argv[$i]));
    }
}


try {
    $entityManager->persist($client);
    $entityManager->flush();
    echo "Cliente adicionado com sucesso!" . PHP_EOL;
} catch (\Doctrine\ORM\Exception\ORMException $e) {
    echo "Erro ao adicionar cliente!" . PHP_EOL;
    echo $e;
}