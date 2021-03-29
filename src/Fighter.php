<?php

class Fighter
{
    // MAX_LIFE = 100 : les combattants ont 100 points de vie max
    public const MAX_LIFE = 100;

    /*
    les propriétés

    name : le nom du combattant.
    strength : la force du combattant (permettra de calculer les points de dégâts lors d’une attaque)
    dexterity : la dextérité du combattant (permettra de calculer les points de défense qui viendront limiter les dégâts reçus)
    life : les points de vie du combattant (initialisé à MAX_LIFE, ainsi ils débutent tous avec 100 point de vie.)
    */
    private string $name;
    private string $strength;
    private string $dexterity;
    private string $life;

    /*
     * 💡HINT : un constructeur va être nécessaire dans ta classe pour initialiser ces propriétés avec des valeurs différentes pour Héraclès et le Lion.

💡HINT: n’oublie pas de faire un require de ton fichier Fighter.php si tu veux pouvoir l’utiliser depuis ton fichier index.php.
     */
    public function __construct(string $name, int $strength, int $dexterity)
    {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
        $this->life = self::MAX_LIFE;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @param int|string $strength
     */
    public function setStrength($strength): void
    {
        $this->strength = $strength;
    }

    /**
     * @return int
     */
    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    /**
     * @param int|string $dexterity
     */
    public function setDexterity($dexterity): void
    {
        $this->dexterity = $dexterity;
    }

    /**
     * @return int
     */
    public function getLife(): int
    {
        return $this->life;
    }

    /**
     * @param int $life
     */
    public function setLife(int $life)
    {
        $this->life = $life;
    }

    /**
     * @return int
     */
    private function attack(): int
    {
        return rand(1,$this->getStrength());
    }

    /**
     * @param int $attack
     * @return int
     */
    private function defense(int $attack): int
    {
        return ($attack - $this->getDexterity() > 0)? ($attack - $this->getDexterity()):0;
    }

    public function fight(Fighter $enemy)
    {
        // - Le combattant va taper plus ou moins fort à chaque fois, le nombre de point de dégâts que fait l'**attaquant** sera donc un nombre aléatoire compris entre 1 et la force du combattant (utilise la fonction `rand()` ([Documentation](https://www.php.net/manual/fr/function.rand.php))
        $attack = $this->attack();
        // - Mais l'attaqué peut se défendre et esquiver ! Tu vas donc atténuer les dégâts en soustrayant aux dommages, la dextérité de l'**attaqué** (sans **jamais aller en dessous de zéro**)
       $defense = $enemy->defense($attack);
        // - Une fois les dégats calculés, diminue le nombre de points de vie de l'**attaqué** par la valeur ainsi obtenue. Attention, la vie d’un combattant **ne peut pas tomber en dessous de zéro**, pense également à vérifier cela;
        $enemy->setLife(($enemy->getLife() - $defense > 0)?($enemy->getLife()-$defense):0);

    }
}
