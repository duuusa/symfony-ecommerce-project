<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220315224237 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE store ADD town_id INT NOT NULL');
        $this->addSql('ALTER TABLE store ADD CONSTRAINT FK_FF57587775E23604 FOREIGN KEY (town_id) REFERENCES town (id)');
        $this->addSql('CREATE INDEX IDX_FF57587775E23604 ON store (town_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE store DROP FOREIGN KEY FK_FF57587775E23604');
        $this->addSql('DROP INDEX IDX_FF57587775E23604 ON store');
        $this->addSql('ALTER TABLE store DROP town_id');
    }
}
