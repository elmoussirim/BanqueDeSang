<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190420045932 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE malade ADD n_dossier VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE demande_sang ADD type_demande VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE test_de_compatibilite DROP FOREIGN KEY FK_6F9C47D0656289E');
        $this->addSql('DROP INDEX IDX_6F9C47D0656289E ON test_de_compatibilite');
        $this->addSql('ALTER TABLE test_de_compatibilite ADD p_deliverees VARCHAR(255) DEFAULT NULL, ADD reserve VARCHAR(255) NOT NULL, CHANGE poche_id demande_id INT NOT NULL, CHANGE resultat p_testees VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE test_de_compatibilite ADD CONSTRAINT FK_6F9C47D080E95E18 FOREIGN KEY (demande_id) REFERENCES demande_sang (id)');
        $this->addSql('CREATE INDEX IDX_6F9C47D080E95E18 ON test_de_compatibilite (demande_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE demande_sang DROP type_demande');
        $this->addSql('ALTER TABLE malade DROP n_dossier');
        $this->addSql('ALTER TABLE test_de_compatibilite DROP FOREIGN KEY FK_6F9C47D080E95E18');
        $this->addSql('DROP INDEX IDX_6F9C47D080E95E18 ON test_de_compatibilite');
        $this->addSql('ALTER TABLE test_de_compatibilite ADD resultat VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP p_deliverees, DROP p_testees, DROP reserve, CHANGE demande_id poche_id INT NOT NULL');
        $this->addSql('ALTER TABLE test_de_compatibilite ADD CONSTRAINT FK_6F9C47D0656289E FOREIGN KEY (poche_id) REFERENCES poche (id)');
        $this->addSql('CREATE INDEX IDX_6F9C47D0656289E ON test_de_compatibilite (poche_id)');
    }
}
