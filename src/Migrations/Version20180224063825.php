<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180224063825 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE branch_permission (id INT NOT NULL, branch_id VARCHAR(40) DEFAULT NULL, group_type VARCHAR(40) NOT NULL, permit BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FF919BF4DCD6CC49 ON branch_permission (branch_id)');
        $this->addSql('ALTER TABLE branch_permission ADD CONSTRAINT FK_FF919BF4DCD6CC49 FOREIGN KEY (branch_id) REFERENCES branch (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plan_route_item ADD group_type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE trunk DROP CONSTRAINT fk_78628d476d0c27c9');
        $this->addSql('DROP INDEX idx_78628d476d0c27c9');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE branch_permission');
        $this->addSql('ALTER TABLE plan_route_item DROP group_type');
        $this->addSql('ALTER TABLE trunk ADD CONSTRAINT fk_78628d476d0c27c9 FOREIGN KEY (dial_type) REFERENCES trunk_dial_type (value) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_78628d476d0c27c9 ON trunk (dial_type)');
    }
}
