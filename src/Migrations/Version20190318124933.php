<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190318124933 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE poche_reservee (id INT AUTO_INCREMENT NOT NULL, test_de_compatibilite_id INT NOT NULL, demande_id INT NOT NULL, user_id INT NOT NULL, n_ordre INT NOT NULL, INDEX IDX_622E49C2AD49F6C2 (test_de_compatibilite_id), INDEX IDX_622E49C280E95E18 (demande_id), INDEX IDX_622E49C2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test_de_compatibilite (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE poche_reservee ADD CONSTRAINT FK_622E49C2AD49F6C2 FOREIGN KEY (test_de_compatibilite_id) REFERENCES test_de_compatibilite (id)');
        $this->addSql('ALTER TABLE poche_reservee ADD CONSTRAINT FK_622E49C280E95E18 FOREIGN KEY (demande_id) REFERENCES demande_sang (id)');
        $this->addSql('ALTER TABLE poche_reservee ADD CONSTRAINT FK_622E49C2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE poche_reservee DROP FOREIGN KEY FK_622E49C2AD49F6C2');
        $this->addSql('DROP TABLE poche_reservee');
        $this->addSql('DROP TABLE test_de_compatibilite');
    }
}
