<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190918115303 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blockchain_transaction ADD address_wallet_id INT NOT NULL, ADD transaction_type TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE blockchain_transaction ADD CONSTRAINT FK_1FEDC99EB641CBB FOREIGN KEY (address_wallet_id) REFERENCES blockchain_wallet (id)');
        $this->addSql('CREATE INDEX IDX_1FEDC99EB641CBB ON blockchain_transaction (address_wallet_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blockchain_transaction DROP FOREIGN KEY FK_1FEDC99EB641CBB');
        $this->addSql('DROP INDEX IDX_1FEDC99EB641CBB ON blockchain_transaction');
        $this->addSql('ALTER TABLE blockchain_transaction DROP address_wallet_id, DROP transaction_type');
    }
}
