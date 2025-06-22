<?php

namespace App\Enums;

enum UserRole: string
{
    case CANDIDAT = 'ROLE_CANDIDAT';
    case ENTREPRISE = 'ROLE_ENTREPRISE';
    case ADMIN = 'ROLE_ADMIN';
}