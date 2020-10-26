<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AadRepository")
 * 
 * @Vich\Uploadable
 */
class Aad
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @var string|null
     * @ORM\Column(type="string",length=255)
     */
    private $filename;
    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     *@var File|null
     * @Vich\UploadableField(mapping="ad_image", fileNameProperty="filename")
     * @Assert\Image(
     * mimeTypes="image/jpeg"
     * )
     */
    private $imageFile;

    /**
     * @ORM\Column(type="integer")
     */
    private $room;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTimeInterface|null
     */
    private $updated_at;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Utilisateur", mappedBy="imageAd", cascade={"persist", "remove"})
     */
    private $utilisateur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", inversedBy="aads")
     */
    private $image_id;

    public function __construct()
    {
        $this->image_id = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
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
     * @return null|File
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * Permet de stocker le ficher uploadé et on passe la variable 
     * qiui est passé paramètre à null
     * @param null|$filename
     * @return Aad
     */
    public function setImageFile(File $imageFile): Aad
    {
        $this->imageFile = $imageFile;
        if ($this->imageFile instanceof UploadedFile) {
            $this->updated_at = new DateTime('now');
        }

        return $this;
    } 



    public function getRoom(): ?int
    {
        return $this->room;
    }

    public function setRoom(int $room): self
    {
        $this->room = $room;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param string|null $filename
     */
    public function setFilename(?string $filename): void
    {
        $this->filename = $filename;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        // set the owning side of the relation if necessary
        if ($utilisateur->getImageAd() !== $this) {
            $utilisateur->setImageAd($this);
        }

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getImageId(): Collection
    {
        return $this->image_id;
    }

    public function addImageId(Utilisateur $imageId): self
    {
        if (!$this->image_id->contains($imageId)) {
            $this->image_id[] = $imageId;
        }

        return $this;
    }

    public function removeImageId(Utilisateur $imageId): self
    {
        if ($this->image_id->contains($imageId)) {
            $this->image_id->removeElement($imageId);
        }

        return $this;
    }
    public function __toString()
    {
        return strval($this->id);
    }

}
