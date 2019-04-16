<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190409204229 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY FK_D2294458656289E');
        $this->addSql('DROP INDEX IDX_D2294458656289E ON feedback');
        $this->addSql('ALTER TABLE feedback CHANGE poche_id demande_id INT NOT NULL');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT FK_D229445880E95E18 FOREIGN KEY (demande_id) REFERENCES demande_sang (id)');
        $this->addSql('CREATE INDEX IDX_D229445880E95E18 ON feedback (demande_id)');
        $this->addSql('ALTER TABLE malade CHANGE numero_cin numero_cin INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY FK_D229445880E95E18');
        $this->addSql('DROP INDEX IDX_D229445880E95E18 ON feedback');
        $this->addSql('ALTER TABLE feedback CHANGE demande_id poche_id INT NOT NULL');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT FK_D2294458656289E FOREIGN KEY (poche_id) REFERENCES poche (id)');
        $this->addSql('CREATE INDEX IDX_D2294458656289E ON feedback (poche_id)');
        $this->addSql('ALTER TABLE malade CHANGE numero_cin numero_cin VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
