<?php

class Archer extends Character {
    public $weakness = false;
    public $arrow = 100;

    public function __construct($pseudo) {
        $this->pseudo = $pseudo;
    }

    //Combinaison des attaques
    public function shoot($target){
        $rand = rand(1, 100);
        if ($rand >= 1 && $rand <= 80) {
            return $this->arrow($target);
        } elseif ($rand > 80 && $rand <= 100) {
            return $this->weakness($target);
        }elseif ($this->arrow==0) {
            return $this->dagger($target);
        }elseif ($this->weakness==true) {
            return $this->arrowPlus($target);          
        }
    }

    //fonction de tirer une flêche avec dégâts aléatoires mais néanmoins plus importants qu'avec la dague
    public function arrow($target) {
        $rand = rand(10, 20);
        $damage = $this->atk + $rand;
        $target->setHP($damage);
        $target->isAlive();
        $status = "$this->pseudo tire sur $target->pseudo !!!";
        return $status;
    }
    
    //fonction de viser un point faible, sans attaque
    public function weakness($target){
        $this->weakness=true;
        $status="$this->pseudo patiente et trouve le point faible...";
        return $status;
    }

    //fonction de tirer une flèche avec dégâts plus importants
    public function arrowPlus($target){
        $rand = rand(1, 10);
        $shootPower = rand(1.5,3);
        $damage = $this->atk + $rand * $shootPower;
        $target->setHP($damage);
        $target->isAlive();
        $status = "$this->pseudo tire plus fort et $target->pseudo prend cher !!!";
        return $status;
    }

    //attaque avec une dague, utile lorsque le carquois est vide 
    public function dagger($target){
        $rand = rand(1, 10);
        $damage = $this->atk + $rand;
        $target->setHP($damage);
        $target->isAlive();
        $status = "$this->pseudo attaque $target->pseudo à l'aide d'une dague.";
        return $status;
    }

    //décompte des dégâts et points de vie de la classe
    public function setHP($damage) {
        $this->lifePoint -= $damage;
        return;
    }
}