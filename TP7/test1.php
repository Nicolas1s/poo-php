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
}
class Admin extends User
{
    // ...
    public function printStatus()
    {
        // vous pouvez accéder au statut comme si la propriété appartenait à Admin

        echo $this->status;
    }
}
$admin = new Admin('Lily');
$admin->printStatus();