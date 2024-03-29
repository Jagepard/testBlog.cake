<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Users extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $this->table('users')
        ->addColumn('email', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ])->addColumn('password', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ])->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ])->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ])->create();
    }
}
