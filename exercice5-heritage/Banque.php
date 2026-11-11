<?php
declare(strict_types=1);

abstract class CompteBancaire
{
    private string $numero;
    private string $titulaire;
    protected float $solde;

    private static int $nombreComptes = 0;

    public const DEVISE = "MAD";
    public const PLAFOND_RETRAIT = 5000.0;

    public function __construct(
        string $numero,
        string $titulaire,
        float $soldeInitial = 0.0
    ) {
        if (!self::estNumeroValide($numero)) {
            throw new InvalidArgumentException("Numero invalide");
        }
        if ($soldeInitial < 0) {
            throw new InvalidArgumentException("Solde invalide");
        }
        $this->numero = $numero;
        $this->titulaire = $titulaire;
        $this->solde = $soldeInitial;
        self::$nombreComptes++;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }
    public function getTitulaire(): string
    {
        return $this->titulaire;
    }
    public function getSolde(): float
    {
        return $this->solde;
    }

    public function setTitulaire(string $titulaire): void
    {
        $this->titulaire = $titulaire;
    }
    public function deposer(float $montant): void
    {
        if ($montant <= 0) {
            throw new InvalidArgumentException("Montant invalide");
        }
        $this->solde += $montant;
    }

    public function retirer(float $montant): void
    {
        if ($montant <= 0) {
            throw new InvalidArgumentException("Montant invalide");
        }
        if ($montant > self::PLAFOND_RETRAIT) {
            throw new InvalidArgumentException("Plafond de retrait depasse");
        }
        if ($montant > $this->soldeDisponible()) {
            throw new InvalidArgumentException("Solde insuffisant");
        }
        $this->solde -= $montant;
    }

    public function virerVers(CompteBancaire $compte, float $montant): void
    {
        $this->retirer($montant);
        $compte->deposer($montant);
    }
    protected function soldeDisponible(): float
    {
        return $this->solde;
    }
    abstract public function getType(): string;

    public function __toString(): string
    {
        return "[" . $this->getType() . "] " .
            $this->numero . " - " .
            $this->titulaire . " : " .
            number_format($this->solde, 2) . " " . self::DEVISE;
    }
    public static function getNombreComptes(): int
    {
        return self::$nombreComptes;
    }
    public static function estNumeroValide(string $numero): bool
    {
        return preg_match('/^CB\d{6}$/', $numero) === 1;
    }
}