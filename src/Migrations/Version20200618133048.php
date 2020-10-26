<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200618133048 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aad (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, content LONGTEXT NOT NULL, filename VARCHAR(255) NOT NULL, room INT NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aad_utilisateur (aad_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_CBFA5459FB7C5FD7 (aad_id), INDEX IDX_CBFA5459FB88E14F (utilisateur_id), PRIMARY KEY(aad_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, image_ad_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), UNIQUE INDEX UNIQ_1D1C63B35871513F (image_ad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aad_utilisateur ADD CONSTRAINT FK_CBFA5459FB7C5FD7 FOREIGN KEY (aad_id) REFERENCES aad (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE aad_utilisateur ADD CONSTRAINT FK_CBFA5459FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B35871513F FOREIGN KEY (image_ad_id) REFERENCES aad (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aad_utilisateur DROP FOREIGN KEY FK_CBFA5459FB7C5FD7');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B35871513F');
        $this->addSql('ALTER TABLE aad_utilisateur DROP FOREIGN KEY FK_CBFA5459FB88E14F');
        $this->addSql('DROP TABLE aad');
        $this->addSql('DROP TABLE aad_utilisateur');
        $this->addSql('DROP TABLE form');
        $this->addSql('DROP TABLE utilisateur');
    }
}
