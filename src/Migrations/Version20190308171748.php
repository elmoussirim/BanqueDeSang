<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190308171748 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE serologie ADD id_tech_1 INT DEFAULT NULL, ADD id_tech_2 VARCHAR(255) DEFAULT NULL, DROP fait_par_1, DROP fait_par_2, CHANGE groupe_sanguins groupe_sanguins INT NOT NULL');
        $this->addSql('ALTER TABLE tubes DROP nom_preleveur, CHANGE cin_preleveur id_preleveur INT NOT NULL');
        $this->addSql('ALTER TABLE poche_en_attente DROP preleveur, CHANGE cin_preleveur id_preleveur INT NOT NULL');
        $this->addSql('ALTER TABLE poche_entree ADD nom_donneur VARCHAR(255) NOT NULL, ADD prenom_donneur VARCHAR(255) NOT NULL, DROP user_name_donneur, DROP username_tech, CHANGE cin_tech id_tech INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE poche_en_attente ADD preleveur VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE id_preleveur cin_preleveur INT NOT NULL');
        $this->addSql('ALTER TABLE poche_entree ADD user_name_donneur VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD username_tech VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP nom_donneur, DROP prenom_donneur, CHANGE id_tech cin_tech INT NOT NULL');
        $this->addSql('ALTER TABLE serologie ADD fait_par_2 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP id_tech_1, CHANGE groupe_sanguins groupe_sanguins VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE id_tech_2 fait_par_1 VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE tubes ADD nom_preleveur VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE id_preleveur cin_preleveur INT NOT NULL');
    }
}
