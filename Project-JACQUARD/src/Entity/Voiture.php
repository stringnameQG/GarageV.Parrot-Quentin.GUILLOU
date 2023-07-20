<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $autre_info = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $boite_vitesse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $carburant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $couleur = null;

    #[ORM\Column]
    private ?int $kilometrage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $marque = null;

    #[ORM\Column(length: 255)]
    private ?string $mise_en_circulation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $modele = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $nombre_porte = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column(nullable: true)]
    private ?int $puissance_din = null;

    #[ORM\Column(nullable: true)]
    private ?int $puissance_fiscale = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAutreInfo(): ?string
    {
        return $this->autre_info;
    }

    public function setAutreInfo(?string $autre_info): static
    {
        $this->autre_info = $autre_info;

        return $this;
    }

    public function getBoiteVitesse(): ?string
    {
        return $this->boite_vitesse;
    }

    public function setBoiteVitesse(?string $boite_vitesse): static
    {
        $this->boite_vitesse = $boite_vitesse;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(?string $carburant): static
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): static
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(?string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getMiseEnCirculation(): ?string
    {
        return $this->mise_en_circulation;
    }

    public function setMiseEnCirculation(string $mise_en_circulation): static
    {
        $this->mise_en_circulation = $mise_en_circulation;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(?string $modele): static
    {
        $this->modele = $modele;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getNombrePorte(): ?int
    {
        return $this->nombre_porte;
    }

    public function setNombrePorte(?int $nombre_porte): static
    {
        $this->nombre_porte = $nombre_porte;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPuissanceDin(): ?int
    {
        return $this->puissance_din;
    }

    public function setPuissanceDin(?int $puissance_din): static
    {
        $this->puissance_din = $puissance_din;

        return $this;
    }

    public function getPuissanceFiscale(): ?int
    {
        return $this->puissance_fiscale;
    }

    public function setPuissanceFiscale(?int $puissance_fiscale): static
    {
        $this->puissance_fiscale = $puissance_fiscale;

        return $this;
    }
}
