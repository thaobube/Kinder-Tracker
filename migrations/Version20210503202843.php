<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210503202843 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE day_record DROP FOREIGN KEY FK_3CEA744C9B8BD8A8');
        $this->addSql('ALTER TABLE day_record DROP FOREIGN KEY FK_3CEA744CDDC95A07');
        $this->addSql('ALTER TABLE day_record DROP FOREIGN KEY FK_3CEA744CE6B0D9FA');
        $this->addSql('ALTER TABLE day_record DROP FOREIGN KEY FK_3CEA744CB01FB030');
        $this->addSql('ALTER TABLE day_record DROP FOREIGN KEY FK_3CEA744CDA91866');
        $this->addSql('DROP TABLE level');
        $this->addSql('DROP TABLE mood');
        $this->addSql('DROP INDEX UNIQ_3CEA744CE6B0D9FA ON day_record');
        $this->addSql('DROP INDEX UNIQ_3CEA744CDA91866 ON day_record');
        $this->addSql('DROP INDEX UNIQ_3CEA744C9B8BD8A8 ON day_record');
        $this->addSql('DROP INDEX UNIQ_3CEA744CB01FB030 ON day_record');
        $this->addSql('DROP INDEX UNIQ_3CEA744CDDC95A07 ON day_record');
        $this->addSql('ALTER TABLE day_record ADD home_mood VARCHAR(255) DEFAULT NULL, ADD daycare_mood VARCHAR(255) DEFAULT NULL, ADD morning_snack_qty VARCHAR(255) DEFAULT NULL, ADD lunch_qty VARCHAR(255) DEFAULT NULL, ADD afternoon_snack_qty VARCHAR(255) DEFAULT NULL, DROP home_mood_id, DROP daycare_mood_id, DROP morning_snack_qty_id, DROP lunch_qty_id, DROP afternoon_snack_qty_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE level (id INT AUTO_INCREMENT NOT NULL, value VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mood (id INT AUTO_INCREMENT NOT NULL, value VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE day_record ADD home_mood_id INT DEFAULT NULL, ADD daycare_mood_id INT DEFAULT NULL, ADD morning_snack_qty_id INT DEFAULT NULL, ADD lunch_qty_id INT DEFAULT NULL, ADD afternoon_snack_qty_id INT DEFAULT NULL, DROP home_mood, DROP daycare_mood, DROP morning_snack_qty, DROP lunch_qty, DROP afternoon_snack_qty');
        $this->addSql('ALTER TABLE day_record ADD CONSTRAINT FK_3CEA744C9B8BD8A8 FOREIGN KEY (afternoon_snack_qty_id) REFERENCES level (id)');
        $this->addSql('ALTER TABLE day_record ADD CONSTRAINT FK_3CEA744CB01FB030 FOREIGN KEY (daycare_mood_id) REFERENCES mood (id)');
        $this->addSql('ALTER TABLE day_record ADD CONSTRAINT FK_3CEA744CDA91866 FOREIGN KEY (home_mood_id) REFERENCES mood (id)');
        $this->addSql('ALTER TABLE day_record ADD CONSTRAINT FK_3CEA744CDDC95A07 FOREIGN KEY (morning_snack_qty_id) REFERENCES level (id)');
        $this->addSql('ALTER TABLE day_record ADD CONSTRAINT FK_3CEA744CE6B0D9FA FOREIGN KEY (lunch_qty_id) REFERENCES level (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3CEA744CE6B0D9FA ON day_record (lunch_qty_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3CEA744CDA91866 ON day_record (home_mood_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3CEA744C9B8BD8A8 ON day_record (afternoon_snack_qty_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3CEA744CB01FB030 ON day_record (daycare_mood_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3CEA744CDDC95A07 ON day_record (morning_snack_qty_id)');
    }
}
