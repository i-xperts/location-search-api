<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210330150816 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE wp_42DFD72C_subscription_locations (id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL, state_id INT NOT NULL, zipcode SMALLINT UNSIGNED NOT NULL, location VARCHAR(32) NOT NULL, INDEX IDX_A0D4F0645D83CC1 (state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wp_42DFD72C_subscription_political_functions (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wp_42DFD72C_subscription_political_parties (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, short VARCHAR(12) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wp_42DFD72C_subscription_states (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(32) NOT NULL, short VARCHAR(2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wp_42DFD72C_subscriptions (id INT NOT NULL, list INT NOT NULL, location_id SMALLINT UNSIGNED NOT NULL, state_id INT NOT NULL, party_id INT DEFAULT NULL, function_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, fistname VARCHAR(64) NOT NULL, lastname VARCHAR(64) NOT NULL, INDEX IDX_30555C1364D218E (location_id), INDEX IDX_30555C135D83CC1 (state_id), INDEX IDX_30555C13213C1059 (party_id), INDEX IDX_30555C1367048801 (function_id), PRIMARY KEY(id, list)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wp_42DFD72C_subscription_locations ADD CONSTRAINT FK_A0D4F0645D83CC1 FOREIGN KEY (state_id) REFERENCES wp_42DFD72C_subscription_states (id)');
        $this->addSql('ALTER TABLE wp_42DFD72C_subscriptions ADD CONSTRAINT FK_30555C1364D218E FOREIGN KEY (location_id) REFERENCES wp_42DFD72C_subscription_locations (id)');
        $this->addSql('ALTER TABLE wp_42DFD72C_subscriptions ADD CONSTRAINT FK_30555C135D83CC1 FOREIGN KEY (state_id) REFERENCES wp_42DFD72C_subscription_states (id)');
        $this->addSql('ALTER TABLE wp_42DFD72C_subscriptions ADD CONSTRAINT FK_30555C13213C1059 FOREIGN KEY (party_id) REFERENCES wp_42DFD72C_subscription_political_parties (id)');
        $this->addSql('ALTER TABLE wp_42DFD72C_subscriptions ADD CONSTRAINT FK_30555C1367048801 FOREIGN KEY (function_id) REFERENCES wp_42DFD72C_subscription_political_functions (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wp_42DFD72C_subscriptions DROP FOREIGN KEY FK_30555C1364D218E');
        $this->addSql('ALTER TABLE wp_42DFD72C_subscriptions DROP FOREIGN KEY FK_30555C1367048801');
        $this->addSql('ALTER TABLE wp_42DFD72C_subscriptions DROP FOREIGN KEY FK_30555C13213C1059');
        $this->addSql('ALTER TABLE wp_42DFD72C_subscription_locations DROP FOREIGN KEY FK_A0D4F0645D83CC1');
        $this->addSql('ALTER TABLE wp_42DFD72C_subscriptions DROP FOREIGN KEY FK_30555C135D83CC1');
        $this->addSql('DROP TABLE wp_42DFD72C_subscription_locations');
        $this->addSql('DROP TABLE wp_42DFD72C_subscription_political_functions');
        $this->addSql('DROP TABLE wp_42DFD72C_subscription_political_parties');
        $this->addSql('DROP TABLE wp_42DFD72C_subscription_states');
        $this->addSql('DROP TABLE wp_42DFD72C_subscriptions');
    }
}
