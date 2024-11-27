<?php
class Categorie{
  private $id;
  private $nom;
  private $description;
 
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

  public function __toString()
  {
    $txt = '<h2>'. $this->getNom() .'</h2>';
    if(!empty($this->getDescription())){
      $txt .= '<p>'. $this->getDescription() .'</p>';
    }
    return $txt;
  }
}