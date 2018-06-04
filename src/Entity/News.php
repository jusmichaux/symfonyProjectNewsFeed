<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository")
 */
class News
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1500)
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $author;

    /**
     * @ORM\Column(type="string")
     */
    private $date;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $time;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $followers;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isVisible;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Nrating;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Users", mappedBy="articlesWritten")
     */
    private $handlersUser;

    public function __construct()
    {
        $this->handlersUser = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
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

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getFollowers(): ?string
    {
        return $this->followers;
    }

    public function setFollowers(?string $followers): self
    {
        $this->followers = $followers;

        return $this;
    }

    public function getIsVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function __toString() {
        return $this->id.'';
    }

    public function setIsVisible(?bool $isVisible): self
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    public function getNrating(): ?int
    {
        return $this->Nrating;
    }

    public function setNrating(?int $Nrating): self
    {
        $this->rating = $Nrating;

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getHandlersUser(): Collection
    {
        return $this->handlersUser;
    }

    public function addHandlersUser(Users $handlersUser): self
    {
        if (!$this->handlersUser->contains($handlersUser)) {
            $this->handlersUser[] = $handlersUser;
            $handlersUser->setArticlesWritten($this);
        }

        return $this;
    }

    public function removeHandlersUser(Users $handlersUser): self
    {
        if ($this->handlersUser->contains($handlersUser)) {
            $this->handlersUser->removeElement($handlersUser);
            // set the owning side to null (unless already changed)
            if ($handlersUser->getArticlesWritten() === $this) {
                $handlersUser->setArticlesWritten(null);
            }
        }

        return $this;
    }
}
