<?php

declare(strict_types=1);

require_once __DIR__ . "/CompteBancaire.php";
class CompteCourant extends CompteBancaire
{
    private float $decouvertAutorise;

    public function __construct(
        string $numero,
        string $titulaire,
        float $soldeInitial,
        float $decouvertAutorise = 0.0
    ) {
        parent::__construct($numero, $titulaire, $soldeInitial);
        if ($decouvertAutorise < 0) {
            throw new InvalidArgumentException("Decouvert invalide");
        }
        $this->decouvertAutorise = $decouvertAutorise;
    }
    protected function soldeDisponible(): float
    {
        return $this->solde + $this->decouvertAutorise;
    }
    public function getType(): string
    {
        return "Courant";
    }
    public function estEnDecouvert(): bool
    {
        return $this->solde < 0;
    }
    public function __toString(): string
    {
        return parent::__toString() .
            " (découvert autorisé " .
            number_format($this->decouvertAutorise, 2) .
            " MAD)";
    }
}