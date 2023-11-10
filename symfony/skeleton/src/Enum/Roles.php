<?php
namespace App\Enum;
enum Roles: string {
    case Admin = 'ROLE_ADMIN';
    case User = 'ROLE_USER';
}