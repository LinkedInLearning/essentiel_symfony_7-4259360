<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240828193959 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE authors ADD article_id INT NOT NULL');
        $this->addSql('ALTER TABLE authors ADD CONSTRAINT FK_8E0C2A517294869C FOREIGN KEY (article_id) REFERENCES articles (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8E0C2A517294869C ON authors (article_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE authors DROP FOREIGN KEY FK_8E0C2A517294869C');
        $this->addSql('DROP INDEX UNIQ_8E0C2A517294869C ON authors');
        $this->addSql('ALTER TABLE authors DROP article_id');
    }
}
