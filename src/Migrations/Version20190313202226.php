<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190313202226 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE serologie CHANGE id_tech_1 id_user1 INT NOT NULL, CHANGE id_tech_2 id_user2 INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fiche_de_donneur_de_sang CHANGE id_medecin id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE poche_en_attente CHANGE id_preleveur id_user INT NOT NULL');
        $this->addSql('ALTER TABLE donneur CHANGE id_agent id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE poche_entree CHANGE id_tech id_user INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE donneur CHANGE id_user id_agent INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fiche_de_donneur_de_sang CHANGE id_user id_medecin INT DEFAULT NULL');
        $this->addSql('ALTER TABLE poche_en_attente CHANGE id_user id_preleveur INT NOT NULL');
        $this->addSql('ALTER TABLE poche_entree CHANGE id_user id_tech INT NOT NULL');
        $this->addSql('ALTER TABLE serologie CHANGE id_user1 id_tech_1 INT NOT NULL, CHANGE id_user2 id_tech_2 INT DEFAULT NULL');
    }
}
