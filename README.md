<div align="center">

<img src="https://readme-typing-svg.demolab.com?font=Fira+Code&size=32&duration=3000&pause=1000&center=true&vCenter=true&width=750&lines=PHP+Backend+-+M205;Exercices+pratiques+en+PHP" alt="Animation PHP Backend M205" />

**php-backend-M205 — Cahier d'exercices pratiques en PHP**

[Voir le dépôt GitHub](https://github.com/ichrakelhaymer/php-backend-M205)

</div>

---

## Présentation du projet

**php-backend-M205** est un projet pédagogique réalisé dans le cadre du **Module 205 : Développement Backend**.

Il regroupe cinq activités et exercices pratiques permettant de découvrir et de maîtriser les fondamentaux de PHP, depuis les fonctions et la manipulation des tableaux jusqu'à la programmation orientée objet, l'héritage et le polymorphisme.

L'objectif est de développer une base solide en programmation backend et de préparer l'utilisation de frameworks PHP comme Laravel.

## Objectifs pédagogiques

- Développer des fonctions avec des paramètres et des types de retour.
- Manipuler les tableaux indexés et associatifs.
- Utiliser les fonctions natives de PHP.
- Trier, filtrer et transformer des données.
- Comprendre l'encapsulation et la programmation orientée objet.
- Créer des classes, des objets, des constructeurs et des méthodes.
- Appliquer l'héritage et le polymorphisme.
- Utiliser les classes abstraites et la composition.
- Gérer les erreurs avec les exceptions.

## Contenu du projet

### 1. Activité 1 — Développer des fonctions de calcul

Cette activité porte sur la création et l'utilisation de fonctions en PHP.

**Notions abordées :**

- Opérations mathématiques : addition, soustraction, multiplication et division.
- Fonctions logiques : nombre pair, nombre positif et nombre premier.
- Calculs commerciaux : TVA, remise et facture.
- Statistiques : calcul de moyenne.
- Géométrie : aire et périmètre.
- Conversions : températures et devises.
- Algorithmes : factorielle, Fibonacci, PGCD et puissance.
- Récursivité.
- Gestion des exceptions.

**Fichiers :**
- `fonctions.php` : définition des fonctions.
- `test.php` : exécution et vérification des fonctions.

### 2. Exercice 2 — Manipuler les tableaux indexés

Cet exercice permet de découvrir la création et la manipulation des tableaux indexés.

**Notions abordées :**

- Création et parcours des tableaux avec `for` et `foreach`.
- Ajout et suppression d'éléments.
- Insertion et modification des valeurs.
- Recherche dans un tableau.
- Calcul de somme, moyenne, minimum et maximum.
- Tri croissant et décroissant.
- Utilisation de `array_map()`, `array_filter()` et `array_reduce()`.
- Manipulation des chaînes avec `implode()` et `explode()`.
- Fusion et comparaison de tableaux.

**Fichier :**
- `tableaux.php`

### 3. Exercice 3 — Manipuler les tableaux associatifs

Cet exercice porte sur la gestion de données structurées sous forme de tableaux associatifs et multidimensionnels.

**Notions abordées :**

- Création de tableaux associatifs avec des clés et des valeurs.
- Ajout, modification et suppression de données.
- Vérification de l'existence d'une clé avec `isset()` et `array_key_exists()`.
- Utilisation de l'opérateur `??`.
- Parcours des tableaux avec `foreach`.
- Tri par clé et par valeur.
- Manipulation des tableaux multidimensionnels.
- Extraction de données avec `array_column()`.
- Classement personnalisé avec `usort()`.
- Calcul de statistiques et regroupement de données.

**Fichier :**
- `associatifs.php`

### 4. Exercice 4 — Implémenter des classes simples : gestion d'un compte bancaire

Cet exercice introduit les concepts fondamentaux de la programmation orientée objet à travers un système de gestion de comptes bancaires.

**Notions abordées :**

- Création de classes et instanciation d'objets.
- Attributs et méthodes.
- Constructeur `__construct()`.
- Encapsulation et niveaux de visibilité : `private`, `protected` et `public`.
- Getters et setters.
- Méthodes d'instance.
- Membres statiques avec `static`.
- Constantes de classe avec `const`.
- Dépôt, retrait et transfert d'argent.
- Validation des données et gestion des exceptions.
- Méthode magique `__toString()`.

**Fichiers :**
- `CompteBancaire.php` : définition de la classe.
- `test.php` : création et manipulation des comptes.

### 5. Exercice 5 — Héritage et polymorphisme

Cet exercice approfondit la programmation orientée objet en développant un système bancaire basé sur plusieurs types de comptes.

**Notions abordées :**

- Héritage avec `extends`.
- Réutilisation du constructeur parent avec `parent::__construct()`.
- Classes abstraites avec `abstract`.
- Redéfinition des méthodes.
- Polymorphisme.
- Utilisation de `instanceof`.
- Composition entre classes.
- Gestion de plusieurs types de comptes.
- Calcul et ajout des intérêts.
- Gestion du découvert autorisé.
- Organisation des objets dans une classe `Banque`.

**Fichiers :**
- `CompteBancaire.php` : classe mère abstraite.
- `CompteEpargne.php` : gestion des comptes épargne.
- `CompteCourant.php` : gestion des comptes courants.
- `Banque.php` : gestion et organisation des comptes.
- `index.php` : tests et démonstration du polymorphisme.

## Technologies utilisées

<div align="center">

<img src="https://skillicons.dev/icons?i=php,git,github,vscode" alt="Technologies utilisées" />

</div>

| Technologie | Utilisation |
|---|---|
| PHP | Développement des exercices et algorithmes |
| Git | Gestion des versions |
| GitHub | Hébergement et partage du code |
| VS Code | Édition et développement |

## Structure du projet

```text
php-backend-M205/
│
├── activite1-fonctions/
│   ├── fonctions.php
│   └── test.php
│
├── exercice2-tableaux-indexes/
│   └── tableaux.php
│
├── exercice3-tableaux-associatifs/
│   └── associatifs.php
│
├── exercice4-classes/
│   ├── CompteBancaire.php
│   └── test.php
│
├── exercice5-heritage/
│   ├── CompteBancaire.php
│   ├── CompteEpargne.php
│   ├── CompteCourant.php
│   ├── Banque.php
│   └── index.php
│
└── README.md
```

## Installation et exécution

### Prérequis

- PHP installé sur la machine.
- Visual Studio Code ou un autre éditeur de code.
- Git (facultatif).

### 1. Cloner le dépôt

```bash
git clone https://github.com/ichrakelhaymer/php-backend-M205.git
```

### 2. Accéder au projet

```bash
cd php-backend-M205
```

### 3. Exécuter les exercices

**Activité 1 — Fonctions**

```bash
php activite1-fonctions/test.php
```

**Exercice 2 — Tableaux indexés**

```bash
php exercice2-tableaux-indexes/tableaux.php
```

**Exercice 3 — Tableaux associatifs**

```bash
php exercice3-tableaux-associatifs/associatifs.php
```

**Exercice 4 — Classes**

```bash
php exercice4-classes/test.php
```

**Exercice 5 — Héritage et polymorphisme**

```bash
php exercice5-heritage/index.php
```

### Vérifier la syntaxe PHP

```bash
php -l nom_du_fichier.php
```

## Concepts PHP illustrés

| Concept | Exemples utilisés |
|---|---|
| Fonctions | `function`, `return` |
| Typage | `int`, `float`, `string`, `bool`, `void` |
| Conditions | `if`, `elseif`, `else` |
| Boucles | `for`, `foreach`, `while` |
| Tableaux | `array_push()`, `array_pop()` |
| Recherche | `isset()`, `array_search()` |
| Transformation | `array_map()`, `array_filter()`, `array_reduce()` |
| Tri | `sort()`, `asort()`, `usort()` |
| Programmation orientée objet | `class`, `new`, `$this` |
| Encapsulation | `private`, `protected`, `public` |
| Héritage | `extends`, `parent::` |
| Polymorphisme | `abstract`, `instanceof` |
| Gestion des erreurs | `try`, `catch`, `throw` |

## Auteur

**Ichrak El Haymer**

[GitHub](https://github.com/ichrakelhaymer)

---

<div align="center">

**php-backend-M205 — Apprendre, pratiquer et maîtriser les fondamentaux du développement backend avec PHP.**

</div>
