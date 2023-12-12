<?php

namespace SophieCalixto\DoctrineORM\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
class Client
{
    #[Column]
    private string $name;
    #[OneToMany(mappedBy: 'client_cpf', targetEntity: Phone::class, cascade: ['persist', 'remove'])]
    private Collection $phones;

    public function __construct(
        #[Column, Id]
        private string $cpf
    )
    {
        $this->phones = new ArrayCollection();
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

    public function addPhone(Phone $phone): void
    {
        $this->phones->add($phone);
        $phone->setClient($this);
    }

    public function getPhones(): Collection
    {
        return $this->phones;
    }
}