<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AccountRepository")
 */
class Account
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Firma;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $UstID;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Vorname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nachname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Strasse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PLZ;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Ort;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Land;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Telefon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Fax;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Passwort;
    
    /** @ORM\Column(type="boolean")
     */
    private $Anrede;

    public function getId()
    {
        return $this->id;
    }

    public function getFirma(): ?string
    {
        return $this->Firma;
    }

    public function setFirma(?string $Firma): self
    {
        $this->Firma = $Firma;

        return $this;
    }

    public function getUstID(): ?string
    {
        return $this->UstID;
    }

    public function setUstID(?string $UstID): self
    {
        $this->UstID = $UstID;

        return $this;
    }

    public function getVorname(): ?string
    {
        return $this->Vorname;
    }

    public function setVorname(string $Vorname): self
    {
        $this->Vorname = $Vorname;

        return $this;
    }

    public function getNachname(): ?string
    {
        return $this->Nachname;
    }

    public function setNachname(string $Nachname): self
    {
        $this->Nachname = $Nachname;

        return $this;
    }

    public function getStrasse(): ?string
    {
        return $this->Strasse;
    }

    public function setStrasse(string $Strasse): self
    {
        $this->Strasse = $Strasse;

        return $this;
    }

    public function getPLZ(): ?string
    {
        return $this->PLZ;
    }

    public function setPLZ(string $PLZ): self
    {
        $this->PLZ = $PLZ;

        return $this;
    }

    public function getOrt(): ?string
    {
        return $this->Ort;
    }

    public function setOrt(string $Ort): self
    {
        $this->Ort = $Ort;

        return $this;
    }

    public function getLand(): ?string
    {
        return $this->Land;
    }

    public function setLand(string $Land): self
    {
        $this->Land = $Land;

        return $this;
    }

    public function getTelefon(): ?string
    {
        return $this->Telefon;
    }

    public function setTelefon(string $Telefon): self
    {
        $this->Telefon = $Telefon;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->Fax;
    }

    public function setFax(?string $Fax): self
    {
        $this->Fax = $Fax;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPasswort(): ?string
    {
        return $this->Passwort;
    }

    public function setPasswort(string $Passwort): self
    {
        $this->Passwort = $Passwort;

        return $this;
    }

    public function getAnrede(): ?bool
    {
        return $this->Anrede;
    }

    public function setAnrede(bool $Anrede): self
    {
        $this->Anrede = $Anrede;

        return $this;
    }
    
}
