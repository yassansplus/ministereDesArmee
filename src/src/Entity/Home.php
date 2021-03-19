<?php

namespace App\Entity;

use App\Repository\HomeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HomeRepository::class)
 */
class Home
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mainTitle;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $actu;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $actuLeft;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $actuRight;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titleLeft;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titleRight;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $BlueBlockTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picto;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subTitleBlueBlock;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondBlueTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subContent;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thirdTitleBlock;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $thirdTextBlock;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastBlueTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastPicto;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastSubTitle;

    /**
     * @ORM\Column(type="boolean")
     */
    private $useThisVersion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMainTitle(): ?string
    {
        return $this->mainTitle;
    }

    public function setMainTitle(?string $mainTitle): self
    {
        $this->mainTitle = $mainTitle;

        return $this;
    }

    public function getActu(): ?string
    {
        return $this->actu;
    }

    public function setActu(?string $actu): self
    {
        $this->actu = $actu;

        return $this;
    }

    public function getActuLeft(): ?string
    {
        return $this->actuLeft;
    }

    public function setActuLeft(?string $actuLeft): self
    {
        $this->actuLeft = $actuLeft;

        return $this;
    }

    public function getActuRight(): ?string
    {
        return $this->actuRight;
    }

    public function setActuRight(?string $actuRight): self
    {
        $this->actuRight = $actuRight;

        return $this;
    }

    public function getTitleLeft(): ?string
    {
        return $this->titleLeft;
    }

    public function setTitleLeft(?string $titleLeft): self
    {
        $this->titleLeft = $titleLeft;

        return $this;
    }

    public function getTitleRight(): ?string
    {
        return $this->titleRight;
    }

    public function setTitleRight(?string $titleRight): self
    {
        $this->titleRight = $titleRight;

        return $this;
    }

    public function getBlueBlockTitle(): ?string
    {
        return $this->BlueBlockTitle;
    }

    public function setBlueBlockTitle(?string $BlueBlockTitle): self
    {
        $this->BlueBlockTitle = $BlueBlockTitle;

        return $this;
    }

    public function getPicto(): ?string
    {
        return $this->picto;
    }

    public function setPicto(?string $picto): self
    {
        $this->picto = $picto;

        return $this;
    }

    public function getSubTitleBlueBlock(): ?string
    {
        return $this->subTitleBlueBlock;
    }

    public function setSubTitleBlueBlock(?string $subTitleBlueBlock): self
    {
        $this->subTitleBlueBlock = $subTitleBlueBlock;

        return $this;
    }

    public function getSecondBlueTitle(): ?string
    {
        return $this->secondBlueTitle;
    }

    public function setSecondBlueTitle(?string $secondBlueTitle): self
    {
        $this->secondBlueTitle = $secondBlueTitle;

        return $this;
    }

    public function getSubContent(): ?string
    {
        return $this->subContent;
    }

    public function setSubContent(?string $subContent): self
    {
        $this->subContent = $subContent;

        return $this;
    }

    public function getThirdTitleBlock(): ?string
    {
        return $this->thirdTitleBlock;
    }

    public function setThirdTitleBlock(?string $thirdTitleBlock): self
    {
        $this->thirdTitleBlock = $thirdTitleBlock;

        return $this;
    }

    public function getThirdTextBlock(): ?string
    {
        return $this->thirdTextBlock;
    }

    public function setThirdTextBlock(?string $thirdTextBlock): self
    {
        $this->thirdTextBlock = $thirdTextBlock;

        return $this;
    }

    public function getLastBlueTitle(): ?string
    {
        return $this->lastBlueTitle;
    }

    public function setLastBlueTitle(?string $lastBlueTitle): self
    {
        $this->lastBlueTitle = $lastBlueTitle;

        return $this;
    }

    public function getLastPicto(): ?string
    {
        return $this->lastPicto;
    }

    public function setLastPicto(?string $lastPicto): self
    {
        $this->lastPicto = $lastPicto;

        return $this;
    }

    public function getLastSubTitle(): ?string
    {
        return $this->lastSubTitle;
    }

    public function setLastSubTitle(?string $lastSubTitle): self
    {
        $this->lastSubTitle = $lastSubTitle;

        return $this;
    }

    public function getUseThisVersion(): ?bool
    {
        return $this->useThisVersion;
    }

    public function setUseThisVersion(bool $useThisVersion): self
    {
        $this->useThisVersion = $useThisVersion;

        return $this;
    }
}
