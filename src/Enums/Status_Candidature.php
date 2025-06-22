<?php

namespace App\Enums;

enum Status_Candidature : string
{
    case EN_ATTENTE = 'EN_ATTENTE';
    case ACCEPTEE = 'ACCEPTEE';
    case REFUSEE = 'REFUSEE';
}
