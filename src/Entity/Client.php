<?php

namespace SophieCalixto\DoctrineORM\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Client
{
    #[Id, GeneratedValue, Column]
    private int $id;
    #[Column]
    private string $name;

    public function __construct(
        #[Column]
        private readonly string $cpf
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }
}