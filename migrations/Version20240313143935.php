<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313143935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__contrats AS SELECT id, status_id, employe_id, date_debut, date_fin, remarque, quotite FROM contrats');
        $this->addSql('DROP TABLE contrats');
        $this->addSql('CREATE TABLE contrats (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, status_id INTEGER DEFAULT NULL, employe_id INTEGER DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE DEFAULT NULL, remarque VARCHAR(128) DEFAULT NULL, quotite INTEGER DEFAULT NULL, CONSTRAINT FK_7268396C6BF700BD FOREIGN KEY (status_id) REFERENCES status (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_7268396C1B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO contrats (id, status_id, employe_id, date_debut, date_fin, remarque, quotite) SELECT id, status_id, employe_id, date_debut, date_fin, remarque, quotite FROM __temp__contrats');
        $this->addSql('DROP TABLE __temp__contrats');
        $this->addSql('CREATE INDEX IDX_7268396C1B65292 ON contrats (employe_id)');
        $this->addSql('CREATE INDEX IDX_7268396C6BF700BD ON contrats (status_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__contrats AS SELECT id, status_id, employe_id, date_debut, date_fin, remarque, quotite FROM contrats');
        $this->addSql('DROP TABLE contrats');
        $this->addSql('CREATE TABLE contrats (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, status_id INTEGER DEFAULT NULL, employe_id INTEGER DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE DEFAULT NULL, remarque VARCHAR(128) DEFAULT NULL, quotite INTEGER DEFAULT NULL, CONSTRAINT FK_7268396C6BF700BD FOREIGN KEY (status_id) REFERENCES status (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_7268396C1B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO contrats (id, status_id, employe_id, date_debut, date_fin, remarque, quotite) SELECT id, status_id, employe_id, date_debut, date_fin, remarque, quotite FROM __temp__contrats');
        $this->addSql('DROP TABLE __temp__contrats');
        $this->addSql('CREATE INDEX IDX_7268396C1B65292 ON contrats (employe_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7268396C6BF700BD ON contrats (status_id)');
    }
}
