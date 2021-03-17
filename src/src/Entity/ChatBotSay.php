<?php

namespace App\Entity;

use App\Repository\ChatBotSayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChatBotSayRepository::class)
 */
class ChatBotSay
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\ManyToMany(targetEntity=UserSay::class, inversedBy="chatBotSays")
     */
    private $answersOfUser;

    /**
     * @ORM\OneToMany(targetEntity=UserSay::class, mappedBy="parentQuestion")
     */
    private $userSays;


    public function __construct()
    {
        $this->answersOfUser = new ArrayCollection();
        $this->userSays = new ArrayCollection();
    }

    public function getId(): ?int
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

    /**
     * @return Collection|UserSay[]
     */
    public function getAnswersOfUser(): Collection
    {
        return $this->answersOfUser;
    }

    public function addAnswersOfUser(UserSay $answersOfUser): self
    {
        if (!$this->answersOfUser->contains($answersOfUser)) {
            $this->answersOfUser[] = $answersOfUser;
        }

        return $this;
    }

    public function removeAnswersOfUser(UserSay $answersOfUser): self
    {
        $this->answersOfUser->removeElement($answersOfUser);

        return $this;
    }

    /**
     * @return Collection|UserSay[]
     */
    public function getUserSays(): Collection
    {
        return $this->userSays;
    }

    public function addUserSay(UserSay $userSay): self
    {
        if (!$this->userSays->contains($userSay)) {
            $this->userSays[] = $userSay;
            $userSay->setParentQuestion($this);
        }

        return $this;
    }

    public function removeUserSay(UserSay $userSay): self
    {
        if ($this->userSays->removeElement($userSay)) {
            // set the owning side to null (unless already changed)
            if ($userSay->getParentQuestion() === $this) {
                $userSay->setParentQuestion(null);
            }
        }

        return $this;
    }

}
