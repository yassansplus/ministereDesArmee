<?php

namespace App\Entity;

use App\Repository\UserSayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserSayRepository::class)
 */
class UserSay
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
     * @ORM\ManyToMany(targetEntity=ChatBotSay::class, mappedBy="answersOfUser")
     */
    private $chatBotSays;

    /**
     * @ORM\ManyToOne(targetEntity=ChatBotSay::class, inversedBy="userSays")
     */
    private $parentQuestion;


    public function __construct()
    {
        $this->chatBotSays = new ArrayCollection();
        $this->questionParent = new ArrayCollection();
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
     * @return Collection|ChatBotSay[]
     */
    public function getChatBotSays(): Collection
    {
        return $this->chatBotSays;
    }

    public function addChatBotSay(ChatBotSay $chatBotSay): self
    {
        if (!$this->chatBotSays->contains($chatBotSay)) {
            $this->chatBotSays[] = $chatBotSay;
            $chatBotSay->addAnswersOfUser($this);
        }

        return $this;
    }

    public function removeChatBotSay(ChatBotSay $chatBotSay): self
    {
        if ($this->chatBotSays->removeElement($chatBotSay)) {
            $chatBotSay->removeAnswersOfUser($this);
        }

        return $this;
    }

    public function getParentQuestion(): ?ChatBotSay
    {
        return $this->parentQuestion;
    }

    public function setParentQuestion(?ChatBotSay $parentQuestion): self
    {
        $this->parentQuestion = $parentQuestion;

        return $this;
    }


}
