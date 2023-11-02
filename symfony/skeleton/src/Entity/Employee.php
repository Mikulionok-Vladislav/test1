<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Json;


/**
 * EmployeeResponse
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 *
 */
class Employee implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="employee_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=50, nullable=false)
     *
     * @Assert\NotBlank(message="Name cannot be blank")
     * @Assert\Length(max=50, maxMessage="Name is too long")
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50, nullable=false)
     *
     * @Assert\NotBlank(message="Name cannot be blank")
     * @Assert\Length(max=50, maxMessage="Name is too long")
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="middlename", type="string", length=50, nullable=false)
     *
     * @Assert\NotBlank(message="Name cannot be blank")
     * @Assert\Length(max=50, maxMessage="Name is too long")
     */
    private $middlename;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     *
     * @Assert\NotBlank(message="Passworn cannot be blank")
     * @Assert\Length(max=255, maxMessage="Password is too long")
     */
    private $password;

    /**
     *
     * @ORM\OneToMany(targetEntity= "Email", mappedBy="employee")
     */
    private Collection $email;
    /**
     *
     * @ORM\OneToMany(targetEntity= "Phone", mappedBy="employee")
     */
    private Collection $phone;
    /**
*@ORM\Column(name="roles", type="json", length=50, nullable=false)
*/
    private $roles = [];


    public function __construct()
    {
        $this->email = new ArrayCollection();
        $this->phone = new ArrayCollection();
    }

    public function getRoles(): array
    {
        $roles = $this->roles;

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getEmail()
    {
        return $this->email->toArray();
    }


    public function getPhone()
    {
        return $this->phone->toArray();
    }




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getMiddlename(): ?string
    {
        return $this->middlename;
    }

    public function setMiddlename(string $middlename): static
    {
        $this->middlename = $middlename;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist
     */

    public function setCreatedAt(): static
    {
        $this->createdAt = new \DateTime();

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PreUpdate
     */

    public function setUpdatedAt(): static
    {
        $this->updatedAt = new \DateTime();

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        return $this->firstname;
    }
}
