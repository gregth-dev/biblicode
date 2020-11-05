<?php

declare(strict_types=1);

namespace App\Entity;

trait ResourceId
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"user_read","user_details_read","code_details_read","code_read"})
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
