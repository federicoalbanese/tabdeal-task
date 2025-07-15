<?php

namespace MauticPlugin\TabdealTaskBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

class Version20250715000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates tabdeal_task table';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('tabdeal_task');

        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('field_one', 'string', ['length' => 255]);
        $table->addColumn('field_two', 'string', ['length' => 255]);
        $table->addColumn('is_checked', 'boolean');

        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('tabdeal_task');
    }
}