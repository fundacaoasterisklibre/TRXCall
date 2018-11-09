<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180218145454 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP TABLE type_profile_sip');
        $this->addSql('ALTER TABLE branch ADD permit_phone BOOLEAN DEFAULT NULL');
        $this->addSql('ALTER TABLE branch ADD permit_mobile BOOLEAN DEFAULT NULL');
        $this->addSql('ALTER TABLE branch ADD permit_international BOOLEAN DEFAULT NULL');
        $this->addSql('ALTER TABLE queues DROP CONSTRAINT FK_CFCA0296144645ED');

        $this->addSql('ALTER TABLE  type_queue_strategy DROP CONSTRAINT type_queue_strategy_pkey;');

        $this->addSql('ALTER TABLE type_queue_strategy ADD label VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE type_queue_strategy RENAME COLUMN name TO value');
        $this->addSql('ALTER TABLE type_queue_strategy ADD PRIMARY KEY (value)');

        $this->addSql('ALTER TABLE queues ADD CONSTRAINT FK_CFCA0296144645ED FOREIGN KEY (strategy) REFERENCES type_queue_strategy (value) NOT DEFERRABLE INITIALLY IMMEDIATE');

        $this->addSql('UPDATE type_queue_strategy SET label = \'Tocar em todos\' WHERE value = \'ringall\'');
        $this->addSql('UPDATE type_queue_strategy SET label = \'Tocar o mais recente\' WHERE value = \'leastrecent\'');
        $this->addSql('UPDATE type_queue_strategy SET label = \'Tocar o com menor número de chamadas\' WHERE value = \'fewestcalls\'');
        $this->addSql('UPDATE type_queue_strategy SET label = \'Aleatório\' WHERE value = \'random\'');
        $this->addSql('UPDATE type_queue_strategy SET label = \'Tocar o próximo agente que não atendeu\' WHERE value = \'rrmemory\'');
        $this->addSql('UPDATE type_queue_strategy SET label = \'Tocar como configurado\' WHERE value = \'linear\'');
        $this->addSql('UPDATE type_queue_strategy SET label = \'Aleatório usando a penalidade\' WHERE value = \'wrandom\'');

        $this->addSql('DELETE FROM type_queue_strategy WHERE value = \'roundrobin\'');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE type_profile_sip (name VARCHAR(255) NOT NULL, profile JSON NOT NULL, PRIMARY KEY(name))');
        $this->addSql('COMMENT ON COLUMN type_profile_sip.profile IS \'(DC2Type:json_array)\'');
        $this->addSql('DROP INDEX type_queue_strategy_pkey');
        $this->addSql('ALTER TABLE type_queue_strategy DROP label');
        $this->addSql('ALTER TABLE type_queue_strategy RENAME COLUMN value TO name');
        $this->addSql('ALTER TABLE type_queue_strategy ADD PRIMARY KEY (name)');
        $this->addSql('ALTER TABLE queues DROP CONSTRAINT fk_cfca0296144645ed');
        $this->addSql('ALTER TABLE queues ADD CONSTRAINT fk_cfca0296144645ed FOREIGN KEY (strategy) REFERENCES type_queue_strategy (name) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE branch DROP permit_phone');
        $this->addSql('ALTER TABLE branch DROP permit_mobile');
        $this->addSql('ALTER TABLE branch DROP permit_international');
    }
}
