<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429065648 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Voucher (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(10) NOT NULL, reduction_value INT NOT NULL, created_date DATETIME NOT NULL, updated_at DATETIME NOT NULL, start_date DATETIME DEFAULT NULL, end_date DATETIME DEFAULT NULL, order_min_amount INT DEFAULT NULL, order_max_amount INT DEFAULT NULL, usage_limit INT DEFAULT NULL, active TINYINT(1) DEFAULT 1 NOT NULL, new_customers_only TINYINT(1) DEFAULT NULL, image_url VARCHAR(100) DEFAULT NULL, blurb LONGBLOB DEFAULT NULL, active_on_campaign TINYINT(1) DEFAULT 0, usage_limit_restriction VARCHAR(100) DEFAULT NULL, status VARCHAR(100) DEFAULT NULL, summary LONGBLOB DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE VoucherConstraint (id INT AUTO_INCREMENT NOT NULL, voucher_id INT NOT NULL, `type` VARCHAR(100) DEFAULT \'\' NOT NULL, `key` VARCHAR(100) DEFAULT \'\' NOT NULL, `values` JSON NOT NULL, description VARCHAR(100) DEFAULT NULL, INDEX IDX_81D2821928AA1B6F (voucher_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE VoucherConstraint ADD CONSTRAINT FK_81D2821928AA1B6F FOREIGN KEY (voucher_id) REFERENCES Voucher (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE VoucherConstraint DROP FOREIGN KEY FK_81D2821928AA1B6F');
        $this->addSql('DROP TABLE Voucher');
        $this->addSql('DROP TABLE VoucherConstraint');
    }
}
