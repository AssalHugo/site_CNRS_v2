<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313145623 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE batiments (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(40) NOT NULL)');
        $this->addSql('CREATE TABLE localisations (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, batiment_id INTEGER NOT NULL, bureau VARCHAR(64) NOT NULL, CONSTRAINT FK_66B68274D6F6891B FOREIGN KEY (batiment_id) REFERENCES batiments (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_66B68274D6F6891B ON localisations (batiment_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE batiments');
        $this->addSql('DROP TABLE localisations');
    }
}
