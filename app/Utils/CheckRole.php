<?php
namespace App\Utils;

class CheckRole{
    public static function CheckIfSuperAdmin():bool {
        $loginUser = auth()->user();

        if($loginUser->hasAnyRole(["Super Admin"])){
            return true;
        }

        return false;
    }
}
