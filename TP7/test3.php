<?php
declare(strict_types=1);
class User
{
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';
    public function __construct(
        public string $username,
        public string $status = self::STATUS_ACTIVE
    ) {
    }
    public function printStatus()
    {
        echo $this->status;
    }
}
class Admin extends User
{
    // ...
    public function printCustomStatus()
    {
        echo "L'administrateur {$this->username} a pour statut : ";
        $this->printStatus(); // appelle printStatus du parent depuis l'enfant
    }
}
$admin = new Admin('Lily');
// Affiche "L'administrateur Lily a pour statut : active"
$admin->printCustomStatus();
// printStatus n'existe pas dans la classe Admin,
// donc printStatus de la classe User sera appelée grâce à l'héritage
$admin->printStatus();