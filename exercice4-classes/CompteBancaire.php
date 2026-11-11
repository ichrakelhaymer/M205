```php
<?php
declare(strict_types=1);

class comptebancaire
{
    public const devise = "mad";
    public const plafond_retrait = 5000.0;

    private static int $nombrecomptes = 0;

    private string $numero;
    private string $titulaire;
    private float $solde;

    public function __construct(
        string $numero,
        string $titulaire,
        float $soldeinitial = 0.0
    ) {
        if (!self::estnumerovalide($numero)) {
            throw new InvalidArgumentException("numéro invalide");
        }

        if ($soldeinitial < 0) {
            throw new InvalidArgumentException("solde invalide");
        }

        $this->numero = $numero;
        $this->titulaire = $titulaire;
        $this->solde = $soldeinitial;

        self::$nombrecomptes++;
    }

    public function getnumero(): string
    {
        return $this->numero;
    }

    public function gettitulaire(): string
    {
        return $this->titulaire;
    }

    public function getsolde(): float
    {
        return $this->solde;
    }

    public function settitulaire(string $titulaire): void
    {
        $this->titulaire = $titulaire;
    }

    public function deposer(float $montant): void
    {
        if ($montant <= 0) {
            throw new InvalidArgumentException("montant invalide");
        }

        $this->solde += $montant;
    }

    public function retirer(float $montant): void
    {
        if ($montant <= 0 || $montant > self::plafond_retrait) {
            throw new InvalidArgumentException("montant invalide");
        }

        if ($montant > $this->solde) {
            throw new RuntimeException("solde insuffisant");
        }

        $this->solde -= $montant;
    }

    public function virervers(comptebancaire $compte, float $montant): void
    {
        if ($compte === $this) {
            throw new InvalidArgumentException("virement impossible vers le même compte");
        }

        $this->retirer($montant);
        $compte->deposer($montant);
    }

    public function __tostring(): string
    {
        return "compte : {$this->numero} | titulaire : {$this->titulaire} | solde : {$this->solde} " . self::devise;
    }

    public static function getnombrecomptes(): int
    {
        return self::$nombrecomptes;
    }

    public static function estnumerovalide(string $numero): bool
    {
        return preg_match('/^[A-Z0-9]{5,15}$/', $numero) === 1;
    }
}
