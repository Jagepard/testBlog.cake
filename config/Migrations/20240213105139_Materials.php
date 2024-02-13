<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Materials extends AbstractMigration
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
        $this->table('materials')
        ->addColumn('title', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ])->addColumn('slug', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ])->addColumn('text', 'text', [
            'null' => true,
        ])->addColumn('image', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ])->addColumn('status', 'integer', [
            'default' => 1,
            'null' => false,
        ])->addColumn('created_at', 'datetime', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
        ])->addColumn('updated_at', 'datetime', [
            'default' => 'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'null' => false,
        ])->create();
    }
}
