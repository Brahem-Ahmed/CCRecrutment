<?php

namespace App\Enums;

enum UserRole: string
{
    case CANDIDAT = 'CANDIDAT';
    case ENTREPRISE = 'ENTREPRISE';
    case ADMIN = 'ADMIN';
}