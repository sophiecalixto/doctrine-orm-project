<?php

namespace SophieCalixto\DoctrineORM\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Phone
{
    #[Id, GeneratedValue, Column]
    private int $id;

    #[ManyToOne(targetEntity: Client::class, inversedBy: 'phones')]
    #[JoinColumn(name: 'client_cpf', referencedColumnName: 'cpf')]
    private Client $client_cpf;

    public function __construct(
        #[Column]
        private readonly string $number
    ){
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setClient(Client $client): void
    {
        $this->client_cpf = $client;
    }
}