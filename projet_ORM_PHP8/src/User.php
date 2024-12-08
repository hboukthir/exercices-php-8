<?php
// src/User.php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User
{
    /** @var int */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int|null $id = null;

    #[ORM\Column(type: 'string')]
    private string $name;

    /** @var Collection<int, Bug> An ArrayCollection of Bug objects. */
    #[ORM\OneToMany(targetEntity: Bug::class, mappedBy: 'reporter')]
    private Collection $reportedBugs;

    /** @var Collection<int,Bug> An ArrayCollection of Bug objects. */
    #[ORM\OneToMany(targetEntity: Bug::class, mappedBy: 'engineer')]
    private $assignedBugs;

    /** @var string */

    public function getId(): int|null
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
    /** @var Collection<int, Bug> */

    public function __construct()
    {
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
    }


    public function addReportedBug(Bug $bug): void
    {
        $this->reportedBugs[] = $bug;
    }

    public function assignedToBug(Bug $bug): void
    {
        $this->assignedBugs[] = $bug;
    }
}