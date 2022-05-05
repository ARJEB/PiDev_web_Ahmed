<?php

namespace App\Entity;
use App\Entity\Offre;
use App\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation", indexes={@ORM\Index(name="offreareclamer", columns={"offreareclamer"}), @ORM\Index(name="cinreclameur", columns={"cinreclameur"})})
 * @ORM\Entity(repositoryClass="App\Repository\ReclamationRepository")
 */
class Reclamation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idreclamation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreclamation;

    /**
     * @var string
     * @Assert\NotNull(message="Il faut remplire ce chemp")
     * @ORM\Column(name="typereclamation", type="string", length=255, nullable=false)
     */
    private $typereclamation;

    /**
     * @var \DateTime
     * @ORM\Column(name="datereclamation", type="date", nullable=false)
     */
    private $datereclamation;

    /**
     * @var string
     * @Assert\NotNull(message="Il faut remplire ce chemp")
     * @ORM\Column(name="descriptionrecla", type="text", length=65535, nullable=false)
     */
    private $descriptionrecla;

    /**
     * @var string
     * @Assert\NotNull(message="Il faut remplire ce chemp")
     * @ORM\Column(name="comuniquer", type="text", length=65535, nullable=false)
     */
    private $comuniquer;

    /**
     * @var string
     * @Assert\Choice({"En cours", "Traiter", "Non Traiter"},
     *   message="Il faut remplire ce chemp"  )
     * @ORM\Column(name="etat", type="string", length=255, nullable=false)
     */
    private $etat;

    /**
     * @var \Offre
     *
     * @ORM\ManyToOne(targetEntity="Offre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="offreareclamer", referencedColumnName="idoffre")
     * })
     */
    private $offreareclamer;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cinreclameur", referencedColumnName="cin")
     * })
     */
    private $cinreclameur;

    public function getIdreclamation(): ?int
    {
        return $this->idreclamation;
    }

    public function getTypereclamation(): ?string
    {
        return $this->typereclamation;
    }

    public function setTypereclamation(string $typereclamation): self
    {
        $this->typereclamation = $typereclamation;

        return $this;
    }

    public function getDatereclamation(): ?\DateTimeInterface
    {
        return $this->datereclamation;
    }

    public function setDatereclamation(\DateTimeInterface $datereclamation): self
    {
        $this->datereclamation = $datereclamation;

        return $this;
    }

    public function getDescriptionrecla(): ?string
    {
        return $this->descriptionrecla;
    }

    public function setDescriptionrecla(string $descriptionrecla): self
    {
        $this->descriptionrecla = $descriptionrecla;

        return $this;
    }

    public function getComuniquer(): ?string
    {
        return $this->comuniquer;
    }

    public function setComuniquer(string $comuniquer): self
    {
        $this->comuniquer = $comuniquer;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getOffreareclamer(): ?Offre
    {
        return $this->offreareclamer;
    }

    public function setOffreareclamer(?Offre $offreareclamer): self
    {
        $this->offreareclamer = $offreareclamer;

        return $this;
    }

    public function getCinreclameur(): ?User
    {
        return $this->cinreclameur;
    }

    public function setCinreclameur(?User $cinreclameur): self
    {
        $this->cinreclameur = $cinreclameur;

        return $this;
    }


}
