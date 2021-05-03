<?php

namespace App\Entity;

use App\Repository\ChildRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChildRepository::class)
 */
class Child
{
    public function __construct(array $init)
    {
        $this->hydrate ($init);
        $this->dayRecords = new ArrayCollection();
    }
    
    public function hydrate(array $init)
    {
        foreach ($init as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parentEmail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fatherPhone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $motherPhone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $class;

    /**
     * @ORM\OneToMany(targetEntity=DayRecord::class, mappedBy="Child")
     */
    private $dayRecords;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="child", cascade={"persist", "remove"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getParentEmail(): ?string
    {
        return $this->parentEmail;
    }

    public function setParentEmail(?string $parentEmail): self
    {
        $this->parentEmail = $parentEmail;

        return $this;
    }

    public function getFatherPhone(): ?string
    {
        return $this->fatherPhone;
    }

    public function setFatherPhone(?string $fatherPhone): self
    {
        $this->fatherPhone = $fatherPhone;

        return $this;
    }

    public function getMotherPhone(): ?string
    {
        return $this->motherPhone;
    }

    public function setMotherPhone(?string $motherPhone): self
    {
        $this->motherPhone = $motherPhone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(?string $class): self
    {
        $this->class = $class;

        return $this;
    }

    /**
     * @return Collection|DayRecord[]
     */
    public function getDayRecords(): Collection
    {
        return $this->dayRecords;
    }

    public function addDayRecord(DayRecord $dayRecord): self
    {
        if (!$this->dayRecords->contains($dayRecord)) {
            $this->dayRecords[] = $dayRecord;
            $dayRecord->setChild($this);
        }

        return $this;
    }

    public function removeDayRecord(DayRecord $dayRecord): self
    {
        if ($this->dayRecords->removeElement($dayRecord)) {
            // set the owning side to null (unless already changed)
            if ($dayRecord->getChild() === $this) {
                $dayRecord->setChild(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
