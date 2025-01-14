<?php

namespace Models;

use Entity\Personne;

class PersonneModel
{
    function getPersonnes(){
        return [
            new Personne('n1,p1,a1,s1'),
            new Personne('n2,p2,a2,s2'),
            new Personne('n3,p3,a3,s3'),
        ];
    }
}