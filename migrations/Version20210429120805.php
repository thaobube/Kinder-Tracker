<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210429120805 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE child (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, birth_date DATE DEFAULT NULL, parent_email VARCHAR(255) DEFAULT NULL, father_phone VARCHAR(255) DEFAULT NULL, mother_phone VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, class VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE day_record (id INT AUTO_INCREMENT NOT NULL, child_id INT DEFAULT NULL, home_mood_id INT DEFAULT NULL, daycare_mood_id INT DEFAULT NULL, morning_snack_qty_id INT DEFAULT NULL, lunch_qty_id INT DEFAULT NULL, afternoon_snack_qty_id INT DEFAULT NULL, is_at_home TINYINT(1) DEFAULT NULL, reason_at_home VARCHAR(255) DEFAULT NULL, home_description VARCHAR(255) DEFAULT NULL, morning_snack_food VARCHAR(255) DEFAULT NULL, lunch_food VARCHAR(255) DEFAULT NULL, afternoon_snack_food VARCHAR(255) DEFAULT NULL, pee_count INT DEFAULT NULL, poo_count INT DEFAULT NULL, nap_duration VARCHAR(255) DEFAULT NULL, other_info VARCHAR(255) DEFAULT NULL, INDEX IDX_3CEA744CDD62C21B (child_id), UNIQUE INDEX UNIQ_3CEA744CDA91866 (home_mood_id), UNIQUE INDEX UNIQ_3CEA744CB01FB030 (daycare_mood_id), UNIQUE INDEX UNIQ_3CEA744CDDC95A07 (morning_snack_qty_id), UNIQUE INDEX UNIQ_3CEA744CE6B0D9FA (lunch_qty_id), UNIQUE INDEX UNIQ_3CEA744C9B8BD8A8 (afternoon_snack_qty_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE level (id INT AUTO_INCREMENT NOT NULL, value VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mood (id INT AUTO_INCREMENT NOT NULL, value VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, child_id INT DEFAULT NULL, user_name VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649DD62C21B (child_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE day_record ADD CONSTRAINT FK_3CEA744CDD62C21B FOREIGN KEY (child_id) REFERENCES child (id)');
        $this->addSql('ALTER TABLE day_record ADD CONSTRAINT FK_3CEA744CDA91866 FOREIGN KEY (home_mood_id) REFERENCES mood (id)');
        $this->addSql('ALTER TABLE day_record ADD CONSTRAINT FK_3CEA744CB01FB030 FOREIGN KEY (daycare_mood_id) REFERENCES mood (id)');
        $this->addSql('ALTER TABLE day_record ADD CONSTRAINT FK_3CEA744CDDC95A07 FOREIGN KEY (morning_snack_qty_id) REFERENCES level (id)');
        $this->addSql('ALTER TABLE day_record ADD CONSTRAINT FK_3CEA744CE6B0D9FA FOREIGN KEY (lunch_qty_id) REFERENCES level (id)');
        $this->addSql('ALTER TABLE day_record ADD CONSTRAINT FK_3CEA744C9B8BD8A8 FOREIGN KEY (afternoon_snack_qty_id) REFERENCES level (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649DD62C21B FOREIGN KEY (child_id) REFERENCES child (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE day_record DROP FOREIGN KEY FK_3CEA744CDD62C21B');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649DD62C21B');
        $this->addSql('ALTER TABLE day_record DROP FOREIGN KEY FK_3CEA744CDDC95A07');
        $this->addSql('ALTER TABLE day_record DROP FOREIGN KEY FK_3CEA744CE6B0D9FA');
        $this->addSql('ALTER TABLE day_record DROP FOREIGN KEY FK_3CEA744C9B8BD8A8');
        $this->addSql('ALTER TABLE day_record DROP FOREIGN KEY FK_3CEA744CDA91866');
        $this->addSql('ALTER TABLE day_record DROP FOREIGN KEY FK_3CEA744CB01FB030');
        $this->addSql('DROP TABLE child');
        $this->addSql('DROP TABLE day_record');
        $this->addSql('DROP TABLE level');
        $this->addSql('DROP TABLE mood');
        $this->addSql('DROP TABLE user');
    }
}
