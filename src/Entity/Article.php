<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @ApiResource(
 *      collectionOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"article_read"}}
 *          },
 *          "post"
 *      },
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"article_details_read"}}
 *          },
 *          "put",
 *          "patch",
 *          "delete"
 *     }
 *  )
 */
class Article
{
    use RessourceId;
    use Timestampable;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ({"article_read","user_details_read", "article_details_read"})
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Groups ({"article_read","user_details_read","article_details_read"})
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     * @Groups ({"article_details_read"})
     */
    private $author;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }
}
