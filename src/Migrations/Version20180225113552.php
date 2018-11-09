<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180225113552 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE abstract_protocol (id VARCHAR(40) NOT NULL, discr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE branch_permission (group_type VARCHAR(40) NOT NULL, branch_id VARCHAR(40) NOT NULL, permit TINYINT(1) NOT NULL, INDEX IDX_FF919BF4DCD6CC49 (branch_id), PRIMARY KEY(group_type, branch_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_number_items (id INT AUTO_INCREMENT NOT NULL, group_number_id VARCHAR(255) DEFAULT NULL, pattern LONGTEXT NOT NULL, help VARCHAR(255) DEFAULT NULL, INDEX IDX_B61120BCF01282F1 (group_number_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE incoming_items (id INT AUTO_INCREMENT NOT NULL, incoming_id INT DEFAULT NULL, time_group_id INT DEFAULT NULL, classname VARCHAR(64) DEFAULT NULL, reference VARCHAR(64) DEFAULT NULL, INDEX IDX_1E88DFE93F7C4BE7 (incoming_id), INDEX IDX_1E88DFE95AD19A8B (time_group_id), INDEX IDX_1E88DFE965C11F00AEA34913 (classname, reference), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE khomp (id VARCHAR(40) NOT NULL, group_id VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time_group (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time_group_items (id INT AUTO_INCREMENT NOT NULL, type_id VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, week VARCHAR(255) NOT NULL, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, INDEX IDX_6F01C6C3C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time_group_type (value VARCHAR(255) NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(value)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trunk_dial_type (value VARCHAR(255) NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(value)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trunk_register_type (name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, protocol VARCHAR(255) NOT NULL, mask VARCHAR(255) DEFAULT NULL, PRIMARY KEY(name)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE branch_permission ADD CONSTRAINT FK_FF919BF4DCD6CC49 FOREIGN KEY (branch_id) REFERENCES branch (id)');
        $this->addSql('ALTER TABLE group_number_items ADD CONSTRAINT FK_B61120BCF01282F1 FOREIGN KEY (group_number_id) REFERENCES group_number (id)');
        $this->addSql('ALTER TABLE incoming_items ADD CONSTRAINT FK_1E88DFE93F7C4BE7 FOREIGN KEY (incoming_id) REFERENCES incoming (id)');
        $this->addSql('ALTER TABLE incoming_items ADD CONSTRAINT FK_1E88DFE95AD19A8B FOREIGN KEY (time_group_id) REFERENCES time_group (id)');
        $this->addSql('ALTER TABLE incoming_items ADD CONSTRAINT FK_1E88DFE965C11F00AEA34913 FOREIGN KEY (classname, reference) REFERENCES forward (classname, reference)');
        $this->addSql('ALTER TABLE khomp ADD CONSTRAINT FK_158F8666BF396750 FOREIGN KEY (id) REFERENCES abstract_protocol (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE time_group_items ADD CONSTRAINT FK_6F01C6C3C54C8C93 FOREIGN KEY (type_id) REFERENCES time_group_type (value)');
        $this->addSql('DROP TABLE type_profile_sip');
        $this->addSql('ALTER TABLE branch ADD permit_phone TINYINT(1) DEFAULT NULL, ADD permit_mobile TINYINT(1) DEFAULT NULL, ADD permit_international TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE forward ADD context VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE group_number ADD `default` TINYINT(1) NOT NULL, DROP identify, CHANGE id id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE ivr ADD dial_branch_permit TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE plan_route_item ADD group_type VARCHAR(255) DEFAULT NULL, ADD count INT DEFAULT NULL, CHANGE group_number_id group_number_id VARCHAR(255) DEFAULT NULL, CHANGE trunk_id trunk_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cdr ADD monitor VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE queues DROP FOREIGN KEY FK_CFCA0296144645ED');
        $this->addSql('ALTER TABLE queues ADD CONSTRAINT FK_CFCA0296144645ED FOREIGN KEY (strategy) REFERENCES type_queue_strategy (value)');
        $this->addSql('ALTER TABLE sippeers ADD CONSTRAINT FK_3DC2982ABF396750 FOREIGN KEY (id) REFERENCES abstract_protocol (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trunk DROP FOREIGN KEY FK_78628D471645FA2D');
        $this->addSql('ALTER TABLE trunk DROP FOREIGN KEY FK_78628D4743153FDC');
        $this->addSql('DROP INDEX IDX_78628D471645FA2D ON trunk');
        $this->addSql('DROP INDEX IDX_78628D4743153FDC ON trunk');
        $this->addSql('ALTER TABLE trunk ADD register_type VARCHAR(255) DEFAULT NULL, ADD dial_type VARCHAR(255) DEFAULT NULL, ADD ddi VARCHAR(255) DEFAULT NULL, ADD ddd VARCHAR(255) DEFAULT NULL, ADD operator_code VARCHAR(255) DEFAULT NULL, ADD dial_prefix VARCHAR(255) DEFAULT NULL, ADD dial_sufix VARCHAR(255) DEFAULT NULL, DROP iax_friends_id, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE sip_peers_id protocol_id VARCHAR(40) DEFAULT NULL');
        $this->addSql('ALTER TABLE trunk ADD CONSTRAINT FK_78628D4758B94789 FOREIGN KEY (register_type) REFERENCES trunk_register_type (name)');
        $this->addSql('ALTER TABLE trunk ADD CONSTRAINT FK_78628D47CCD59258 FOREIGN KEY (protocol_id) REFERENCES abstract_protocol (id)');
        $this->addSql('CREATE INDEX IDX_78628D4758B94789 ON trunk (register_type)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_78628D47CCD59258 ON trunk (protocol_id)');
        $this->addSql('ALTER TABLE type_queue_strategy DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE type_queue_strategy ADD label VARCHAR(255) DEFAULT NULL, CHANGE name value VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE type_queue_strategy ADD PRIMARY KEY (value)');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E91EDB3112');
        $this->addSql('DROP INDEX IDX_1483A5E91EDB3112 ON users');
        $this->addSql('ALTER TABLE users ADD access_profile_id VARCHAR(255) DEFAULT NULL, DROP user_access_profile_id');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9E6C48A39 FOREIGN KEY (access_profile_id) REFERENCES user_access_profile (value)');
        $this->addSql('CREATE INDEX IDX_1483A5E9E6C48A39 ON users (access_profile_id)');
        $this->addSql('ALTER TABLE user_access_profile MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE user_access_profile DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE user_access_profile ADD label VARCHAR(255) NOT NULL, DROP id, CHANGE name value VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user_access_profile ADD PRIMARY KEY (value)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE khomp DROP FOREIGN KEY FK_158F8666BF396750');
        $this->addSql('ALTER TABLE sippeers DROP FOREIGN KEY FK_3DC2982ABF396750');
        $this->addSql('ALTER TABLE trunk DROP FOREIGN KEY FK_78628D47CCD59258');
        $this->addSql('ALTER TABLE incoming_items DROP FOREIGN KEY FK_1E88DFE95AD19A8B');
        $this->addSql('ALTER TABLE time_group_items DROP FOREIGN KEY FK_6F01C6C3C54C8C93');
        $this->addSql('ALTER TABLE trunk DROP FOREIGN KEY FK_78628D4758B94789');
        $this->addSql('CREATE TABLE type_profile_sip (name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, profile JSON NOT NULL COMMENT \'(DC2Type:json_array)\', PRIMARY KEY(name)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE abstract_protocol');
        $this->addSql('DROP TABLE branch_permission');
        $this->addSql('DROP TABLE group_number_items');
        $this->addSql('DROP TABLE incoming_items');
        $this->addSql('DROP TABLE khomp');
        $this->addSql('DROP TABLE time_group');
        $this->addSql('DROP TABLE time_group_items');
        $this->addSql('DROP TABLE time_group_type');
        $this->addSql('DROP TABLE trunk_dial_type');
        $this->addSql('DROP TABLE trunk_register_type');
        $this->addSql('ALTER TABLE branch DROP permit_phone, DROP permit_mobile, DROP permit_international');
        $this->addSql('ALTER TABLE cdr DROP monitor');
        $this->addSql('ALTER TABLE forward DROP context');
        $this->addSql('ALTER TABLE group_number ADD identify VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP `default`, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE ivr DROP dial_branch_permit');
        $this->addSql('ALTER TABLE plan_route_item DROP group_type, DROP count, CHANGE group_number_id group_number_id INT DEFAULT NULL, CHANGE trunk_id trunk_id VARCHAR(40) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE queues DROP FOREIGN KEY FK_CFCA0296144645ED');
        $this->addSql('ALTER TABLE queues ADD CONSTRAINT FK_CFCA0296144645ED FOREIGN KEY (strategy) REFERENCES type_queue_strategy (name)');
        $this->addSql('DROP INDEX IDX_78628D4758B94789 ON trunk');
        $this->addSql('DROP INDEX UNIQ_78628D47CCD59258 ON trunk');
        $this->addSql('ALTER TABLE trunk ADD iax_friends_id INT DEFAULT NULL, DROP register_type, DROP dial_type, DROP ddi, DROP ddd, DROP operator_code, DROP dial_prefix, DROP dial_sufix, CHANGE id id VARCHAR(40) NOT NULL COLLATE utf8_unicode_ci, CHANGE protocol_id sip_peers_id VARCHAR(40) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE trunk ADD CONSTRAINT FK_78628D471645FA2D FOREIGN KEY (sip_peers_id) REFERENCES sippeers (id)');
        $this->addSql('ALTER TABLE trunk ADD CONSTRAINT FK_78628D4743153FDC FOREIGN KEY (iax_friends_id) REFERENCES iaxfriends (id)');
        $this->addSql('CREATE INDEX IDX_78628D471645FA2D ON trunk (sip_peers_id)');
        $this->addSql('CREATE INDEX IDX_78628D4743153FDC ON trunk (iax_friends_id)');
        $this->addSql('ALTER TABLE type_queue_strategy DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE type_queue_strategy DROP label, CHANGE value name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE type_queue_strategy ADD PRIMARY KEY (name)');
        $this->addSql('ALTER TABLE user_access_profile DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE user_access_profile ADD id INT AUTO_INCREMENT NOT NULL, ADD name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP value, DROP label');
        $this->addSql('ALTER TABLE user_access_profile ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9E6C48A39');
        $this->addSql('DROP INDEX IDX_1483A5E9E6C48A39 ON users');
        $this->addSql('ALTER TABLE users ADD user_access_profile_id INT DEFAULT NULL, DROP access_profile_id');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E91EDB3112 FOREIGN KEY (user_access_profile_id) REFERENCES user_access_profile (id)');
        $this->addSql('CREATE INDEX IDX_1483A5E91EDB3112 ON users (user_access_profile_id)');
    }
}
