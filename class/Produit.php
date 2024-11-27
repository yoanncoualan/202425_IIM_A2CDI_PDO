<?php
class Produit{
  private $id;
  private $nom;
  private $description;
  private $categorie;
 
  public function getId(): int
  {
    return $this->id;
  }
 
  public function setNom(string $value): self
  {
    $this->nom = $value;
    return $this;
  }
  public function getNom(): string
  {
    return $this->nom;
  }
 
  public function setDescription(?string $value): self
  {
    $this->description = $value;
    return $this;
  }
  public function getDescription(): ?string
  {
    return $this->description;
  }
 
  public function setCategorie(Categorie $value): self
  {
    $this->categorie = $value;
    return $this;
  }
  public function getCategorie(): Categorie
  {
    return $this->categorie;
  }
}