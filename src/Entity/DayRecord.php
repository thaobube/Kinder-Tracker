<?php

namespace App\Entity;

use App\Repository\DayRecordRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DayRecordRepository::class)
 */
class DayRecord
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isAtHome;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reasonAtHome;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $homeDescription;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $morningSnackFood;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lunchFood;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $afternoonSnackFood;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $peeCount;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pooCount;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $napDuration;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $otherInfo;

    /**
     * @ORM\ManyToOne(targetEntity=Child::class, inversedBy="dayRecords")
     */
    private $Child;

    /**
     * @ORM\OneToOne(targetEntity=Mood::class, cascade={"persist", "remove"})
     */
    private $homeMood;

    /**
     * @ORM\OneToOne(targetEntity=Mood::class, cascade={"persist", "remove"})
     */
    private $daycareMood;

    /**
     * @ORM\OneToOne(targetEntity=Level::class, cascade={"persist", "remove"})
     */
    private $morningSnackQty;

    /**
     * @ORM\OneToOne(targetEntity=Level::class, cascade={"persist", "remove"})
     */
    private $lunchQty;

    /**
     * @ORM\OneToOne(targetEntity=Level::class, cascade={"persist", "remove"})
     */
    private $afternoonSnackQty;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsAtHome(): ?bool
    {
        return $this->isAtHome;
    }

    public function setIsAtHome(?bool $isAtHome): self
    {
        $this->isAtHome = $isAtHome;

        return $this;
    }

    public function getReasonAtHome(): ?string
    {
        return $this->reasonAtHome;
    }

    public function setReasonAtHome(?string $reasonAtHome): self
    {
        $this->reasonAtHome = $reasonAtHome;

        return $this;
    }

    public function getHomeDescription(): ?string
    {
        return $this->homeDescription;
    }

    public function setHomeDescription(?string $homeDescription): self
    {
        $this->homeDescription = $homeDescription;

        return $this;
    }

    public function getMorningSnackFood(): ?string
    {
        return $this->morningSnackFood;
    }

    public function setMorningSnackFood(?string $morningSnackFood): self
    {
        $this->morningSnackFood = $morningSnackFood;

        return $this;
    }

    public function getLunchFood(): ?string
    {
        return $this->lunchFood;
    }

    public function setLunchFood(?string $lunchFood): self
    {
        $this->lunchFood = $lunchFood;

        return $this;
    }

    public function getAfternoonSnackFood(): ?string
    {
        return $this->afternoonSnackFood;
    }

    public function setAfternoonSnackFood(?string $afternoonSnackFood): self
    {
        $this->afternoonSnackFood = $afternoonSnackFood;

        return $this;
    }

    public function getPeeCount(): ?int
    {
        return $this->peeCount;
    }

    public function setPeeCount(?int $peeCount): self
    {
        $this->peeCount = $peeCount;

        return $this;
    }

    public function getPooCount(): ?int
    {
        return $this->pooCount;
    }

    public function setPooCount(?int $pooCount): self
    {
        $this->pooCount = $pooCount;

        return $this;
    }

    public function getNapDuration(): ?string
    {
        return $this->napDuration;
    }

    public function setNapDuration(?string $napDuration): self
    {
        $this->napDuration = $napDuration;

        return $this;
    }

    public function getOtherInfo(): ?string
    {
        return $this->otherInfo;
    }

    public function setOtherInfo(?string $otherInfo): self
    {
        $this->otherInfo = $otherInfo;

        return $this;
    }

    public function getChild(): ?Child
    {
        return $this->Child;
    }

    public function setChild(?Child $Child): self
    {
        $this->Child = $Child;

        return $this;
    }

    public function getHomeMood(): ?Mood
    {
        return $this->homeMood;
    }

    public function setHomeMood(?Mood $homeMood): self
    {
        $this->homeMood = $homeMood;

        return $this;
    }

    public function getDaycareMood(): ?Mood
    {
        return $this->daycareMood;
    }

    public function setDaycareMood(?Mood $daycareMood): self
    {
        $this->daycareMood = $daycareMood;

        return $this;
    }

    public function getMorningSnackQty(): ?Level
    {
        return $this->morningSnackQty;
    }

    public function setMorningSnackQty(?Level $morningSnackQty): self
    {
        $this->morningSnackQty = $morningSnackQty;

        return $this;
    }

    public function getLunchQty(): ?Level
    {
        return $this->lunchQty;
    }

    public function setLunchQty(?Level $lunchQty): self
    {
        $this->lunchQty = $lunchQty;

        return $this;
    }

    public function getAfternoonSnackQty(): ?Level
    {
        return $this->afternoonSnackQty;
    }

    public function setAfternoonSnackQty(?Level $afternoonSnackQty): self
    {
        $this->afternoonSnackQty = $afternoonSnackQty;

        return $this;
    }
}
