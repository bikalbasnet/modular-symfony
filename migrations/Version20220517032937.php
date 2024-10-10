<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220517032937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Voucher CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE type type VARCHAR(10) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE image_url image_url VARCHAR(100) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE usage_limit_restriction usage_limit_restriction VARCHAR(100) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE status status VARCHAR(100) DEFAULT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE VoucherConstraint CHANGE `type` type VARCHAR(100) DEFAULT \'\' NOT NULL COLLATE `utf8_unicode_ci`, CHANGE `key` `key` VARCHAR(100) DEFAULT \'\' NOT NULL COLLATE `utf8_unicode_ci`, CHANGE description description VARCHAR(100) DEFAULT NULL COLLATE `utf8_unicode_ci`');
    }
}
