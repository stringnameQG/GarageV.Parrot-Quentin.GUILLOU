<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230707132105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, commentaire VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, note INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formulaire_contacte (id INT AUTO_INCREMENT NOT NULL, e_mail VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, numero INT NOT NULL, sujet VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaire_ouverture (id INT AUTO_INCREMENT NOT NULL, lundi VARCHAR(255) DEFAULT NULL, mardi VARCHAR(255) DEFAULT NULL, mercredi VARCHAR(255) DEFAULT NULL, jeudi VARCHAR(255) DEFAULT NULL, vendredi VARCHAR(255) DEFAULT NULL, samedi VARCHAR(255) DEFAULT NULL, dimanche VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, contenue VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture (id INT AUTO_INCREMENT NOT NULL, autre_info VARCHAR(255) DEFAULT NULL, boite_vitesse VARCHAR(255) DEFAULT NULL, carburant VARCHAR(255) DEFAULT NULL, couleur VARCHAR(255) DEFAULT NULL, kilometrage INT NOT NULL, marque VARCHAR(255) DEFAULT NULL, mise_en_circulation VARCHAR(255) NOT NULL, modele VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, nombre_porte INT DEFAULT NULL, prix INT NOT NULL, puissance_din INT DEFAULT NULL, puissance_fiscale INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE formulaire_contacte');
        $this->addSql('DROP TABLE horaire_ouverture');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE voiture');
    }
}
