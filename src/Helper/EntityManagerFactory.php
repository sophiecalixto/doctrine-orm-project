<?php

namespace SophieCalixto\DoctrineORM\Helper;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\ORMSetup;

/** @class This class create a Entity Manager */
class EntityManagerFactory
{
    /**
     * @throws MissingMappingDriverImplementation
     * @throws Exception
     */
    public static function createEntityManager() : EntityManager
    {
        $envContent = file_get_contents(__DIR__ . '/../../.env');
        $envArray = parse_ini_string($envContent, false, INI_SCANNER_RAW);

        if($envArray){
            $driver = $envArray['DB_DRIVER'];
            $host = $envArray['DB_HOST'];
            $port = $envArray['DB_PORT'];
            $database = $envArray['DB_NAME'];
            $user = $envArray['DB_USER'];
            $password = $envArray['DB_PASSWORD'];
        } else {
            echo "Erro ao processar .env";
            exit();
        }


        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__ . '/..'],
            isDevMode: true
        );

        $connection = DriverManager::getConnection(
            [
                'driver' => $driver,
                'host' => $host,
                'port' => $port,
                'dbname' => $database,
                'user' => $user,
                'password' => $password
            ]
        );

        return new EntityManager($connection, $config);

    }
}