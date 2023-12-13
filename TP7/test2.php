<?php
declare(strict_types=1);
class User
{
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';
    public static $nombreUtilisateursInitialisés = 0;
    public function __construct(
        public string $username,
        public string $status = self::STATUS_ACTIVE
    ) {
    }
}

class Admin extends User
{
    public static $nombreAdminInitialisés = 0;
    // MàJ des valeurs des propriétés statiques de la classe courante avec `self`,
// et de la classe parente avec `parent`
    public static function nouvelleInitialisation()
    {
        self::$nombreAdminInitialisés++; // classe Admin
        parent::$nombreUtilisateursInitialisés++; // classe User
    }
}
Admin::nouvelleInitialisation();
var_dump(
    Admin::$nombreAdminInitialisés,
    Admin::$nombreUtilisateursInitialisés,
    User::$nombreUtilisateursInitialisés
);
var_dump(User::$nombreAdminInitialisés); // ceci ne marche pas.