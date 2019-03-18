<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190308204110 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE serologie CHANGE groupe_sanguins groupe_sanguins VARCHAR(255) NOT NULL, CHANGE id_tech_1 id_tech_1 INT NOT NULL, CHANGE id_tech_2 id_tech_2 INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE serologie CHANGE groupe_sanguins groupe_sanguins INT NOT NULL, CHANGE id_tech_1 id_tech_1 INT DEFAULT NULL, CHANGE id_tech_2 id_tech_2 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
