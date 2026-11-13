<?php
declare(strict_types=1);

require_once __DIR__ . "/CompteBancaire.php";
require_once __DIR__ . "/CompteEpargne.php";
require_once __DIR__ . "/CompteCourant.php";

class Banque
{
    private array $comptes = [];
    private string $nom;

    public function __construct(string $nom)
    {
        $this->nom = $nom;
    }

    public function ajouterCompte(CompteBancaire $compte): void
    {
        $numero = $compte->getNumero();

        if (isset($this->comptes[$numero])) {
            throw new InvalidArgumentException("Compte deja existant");
        }

        $this->comptes[$numero] = $compte;
    }

    public function trouverCompte(string $numero): ?CompteBancaire
    {
        return $this->comptes[$numero] ?? null;
    }

    public function totalDepots(): float
    {
        $total = 0;

        foreach ($this->comptes as $compte) {
            $total += $compte->getSolde();
        }

        return $total;
    }

    public function crediterInterets(): int
    {
        $nombre = 0;

        foreach ($this->comptes as $compte) {
            if ($compte instanceof CompteEpargne) {
                $compte->ajouterInterets();
                $nombre++;
            }
        }

        return $nombre;
    }

    public function afficherComptes(): void
    {
        foreach ($this->comptes as $compte) {
            echo $compte . "<br>";
        }
    }

    public function comptesParType(): array
    {
        $resultat = [];

        foreach ($this->comptes as $compte) {
            $type = $compte->getType();

            if (!isset($resultat[$type])) {
                $resultat[$type] = 0;
            }

            $resultat[$type]++;
        }
        return $resultat;
    }
}