<?php

declare(strict_types=1);

namespace App\Entity;

use DateTimeInterface;
use Symfony\Component\Serializer\Annotation\Groups;

trait Timestampable
{

    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetime")
     * @Groups({"code_details_read","code_read"})
     */
    private \DateTimeInterface $createdAt;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"code_details_read","code_read"})
     */
    private ?\DateTimeInterface $updatedAt;



    /**
     * Get the value of createdAt
     *
     * @return  \DateTimeInterface
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Get the value of updatedAt
     *
     * @return  \DateTimeInterface|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @param  \DateTimeInterface  $updatedAt
     *
     * @return  self
     */
    public function setUpdatedAt(?\DateTimeInterface $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
