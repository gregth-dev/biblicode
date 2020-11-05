<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use DateTimeZone;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CodeRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CodeRepository::class)
 * @ApiResource(
 *      collectionOperations={
 *              "get"={
 *                  "normalization_context"={"groups"={"code_read"}}
 *          },
 *          "post"
 *      },
 *      itemOperations={
 *              "get"={
 *                  "normalization_context"={"groups"={"code_details_read"}}
 *      },
 *      "put",
 *      "patch",
 *      "delete"
 *      }
 * )
 */
class Code
{
    use ResourceId;
    use Timestampable;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user_details_read", "code_details_read", "code_read"})
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     * @Groups({"user_details_read", "code_details_read", "code_read"})
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"user_details_read", "code_details_read", "code_read"})
     */
    private $link;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="codes")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"code_details_read", "code_read"})
     */
    private $author;

    /**
     * @ORM\Column(type="json", nullable=true)
     * @Groups({"user_details_read", "code_details_read", "code_read"})
     */
    private $tags = [];

    public function __construct()
    {
        $this->createdAt = new DateTime('now', new DateTimeZone('Europe/Paris'));
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(?array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }
}
