<?php

namespace App\Config\Core;

abstract class AbstractEntity
{


    //methode static car le resultat est un objet
    abstract public static function toObject(array $tableau): static;

    //methode d'instance applique sur un objet 
    abstract public function toArray(Object $object): array;

    //methode d'instance applique sur un objet
    public function toJson(Object $object): string
    {
        return json_encode($this->toArray($object));
    }
}
