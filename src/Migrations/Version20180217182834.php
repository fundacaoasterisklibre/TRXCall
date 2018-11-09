<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180217182834 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql('INSERT INTO type_iax_encryption (name) VALUES (\'yes\')');
        $this->addSql('INSERT INTO type_iax_encryption (name) VALUES (\'no\')');
        $this->addSql('INSERT INTO type_iax_encryption (name) VALUES (\'aes128\')');
        $this->addSql('INSERT INTO type_iax_require_calltoken (name) VALUES (\'yes\')');
        $this->addSql('INSERT INTO type_iax_require_calltoken (name) VALUES (\'no\')');
        $this->addSql('INSERT INTO type_iax_require_calltoken (name) VALUES (\'auto\')');
        $this->addSql('INSERT INTO type_iax_transfer (name) VALUES (\'enum\')');
        $this->addSql('INSERT INTO type_iax_transfer (name) VALUES (\'no\')');
        $this->addSql('INSERT INTO type_iax_transfer (name) VALUES (\'mediaonly\')');
        $this->addSql('INSERT INTO type_sip_moh_mode (name) VALUES (\'custom\')');
        $this->addSql('INSERT INTO type_sip_moh_mode (name) VALUES (\'files\')');
        $this->addSql('INSERT INTO type_sip_moh_mode (name) VALUES (\'mp3nb\')');
        $this->addSql('INSERT INTO type_sip_moh_mode (name) VALUES (\'quietmp3nb\')');
        $this->addSql('INSERT INTO type_sip_moh_mode (name) VALUES (\'quietmp3\')');
        $this->addSql('INSERT INTO type_queue_auto_pause (name) VALUES (\'yes\')');
        $this->addSql('INSERT INTO type_queue_auto_pause (name) VALUES (\'no\')');
        $this->addSql('INSERT INTO type_queue_auto_pause (name) VALUES (\'all\')');
        $this->addSql('INSERT INTO type_queue_strategy (name) VALUES (\'ringall\')');
        $this->addSql('INSERT INTO type_queue_strategy (name) VALUES (\'roundrobin\')');
        $this->addSql('INSERT INTO type_queue_strategy (name) VALUES (\'leastrecent\')');
        $this->addSql('INSERT INTO type_queue_strategy (name) VALUES (\'fewestcalls\')');
        $this->addSql('INSERT INTO type_queue_strategy (name) VALUES (\'random\')');
        $this->addSql('INSERT INTO type_queue_strategy (name) VALUES (\'rrmemory\')');
        $this->addSql('INSERT INTO type_queue_strategy (name) VALUES (\'linear\')');
        $this->addSql('INSERT INTO type_queue_strategy (name) VALUES (\'wrandom\')');



        $this->addSql('INSERT INTO type_sip_calling_pres (name) VALUES (\'allowed_not_screened\')');
        $this->addSql('INSERT INTO type_sip_calling_pres (name) VALUES (\'allowed_passed_screen\')');
        $this->addSql('INSERT INTO type_sip_calling_pres (name) VALUES (\'allowed_failed_screen\')');
        $this->addSql('INSERT INTO type_sip_calling_pres (name) VALUES (\'allowed\')');
        $this->addSql('INSERT INTO type_sip_calling_pres (name) VALUES (\'prohib_not_screened\')');
        $this->addSql('INSERT INTO type_sip_calling_pres (name) VALUES (\'prohib_passed_screen\')');
        $this->addSql('INSERT INTO type_sip_calling_pres (name) VALUES (\'prohib_failed_screen\')');
        $this->addSql('INSERT INTO type_sip_calling_pres (name) VALUES (\'prohib\')');
        $this->addSql('INSERT INTO type_sip_direct_media (name) VALUES (\'yes\')');
        $this->addSql('INSERT INTO type_sip_direct_media (name) VALUES (\'no\')');
        $this->addSql('INSERT INTO type_sip_direct_media (name) VALUES (\'nonat\')');
        $this->addSql('INSERT INTO type_sip_direct_media (name) VALUES (\'update\')');
        $this->addSql('INSERT INTO type_sip_dtmf_mode (name) VALUES (\'rfc2833\')');
        $this->addSql('INSERT INTO type_sip_dtmf_mode (name) VALUES (\'info\')');
        $this->addSql('INSERT INTO type_sip_dtmf_mode (name) VALUES (\'shortinfo\')');
        $this->addSql('INSERT INTO type_sip_dtmf_mode (name) VALUES (\'inband\')');
        $this->addSql('INSERT INTO type_sip_dtmf_mode (name) VALUES (\'auto\')');
        $this->addSql('INSERT INTO type_sip_nat (name) VALUES (\'yes\')');
        $this->addSql('INSERT INTO type_sip_nat (name) VALUES (\'no\')');
        $this->addSql('INSERT INTO type_sip_nat (name) VALUES (\'never\')');
        $this->addSql('INSERT INTO type_sip_nat (name) VALUES (\'route\')');
        $this->addSql('INSERT INTO type_sip_progress_in_band (name) VALUES (\'yes\')');
        $this->addSql('INSERT INTO type_sip_progress_in_band (name) VALUES (\'no\')');
        $this->addSql('INSERT INTO type_sip_progress_in_band (name) VALUES (\'never\')');
        $this->addSql('INSERT INTO type_sip_session_refresher (name) VALUES (\'uac\')');
        $this->addSql('INSERT INTO type_sip_session_refresher (name) VALUES (\'uas\')');
        $this->addSql('INSERT INTO type_sip_session_timers (name) VALUES (\'accept\')');
        $this->addSql('INSERT INTO type_sip_session_timers (name) VALUES (\'refuse\')');
        $this->addSql('INSERT INTO type_sip_session_timers (name) VALUES (\'originate\')');
        $this->addSql('INSERT INTO type_sip_transport (name) VALUES (\'udp\')');
        $this->addSql('INSERT INTO type_sip_transport (name) VALUES (\'tcp\')');
        $this->addSql('INSERT INTO type_sip_transport (name) VALUES (\'udp,tcp\')');
        $this->addSql('INSERT INTO type_sip_transport (name) VALUES (\'tcp,udp\')');
        $this->addSql('INSERT INTO type_type (name) VALUES (\'friend\')');
        $this->addSql('INSERT INTO type_type (name) VALUES (\'user\')');
        $this->addSql('INSERT INTO type_type (name) VALUES (\'peer\')');
        $this->addSql('INSERT INTO type_yes_no (name) VALUES (\'yes\')');
        $this->addSql('INSERT INTO type_yes_no (name) VALUES (\'no\')');
        $this->addSql('INSERT INTO trunk_register_type (name, description, protocol, mask) VALUES (\'GATEWAY_SIP\', \'Prover autenticação SIP\', \'SIP\', \'${PROTOCOL}/${EXTEN}@${VALUE}\')');
        $this->addSql('INSERT INTO trunk_register_type (name, description, protocol, mask) VALUES (\'AUTH_SIP\', \'Autenticar em gateway SIP\', \'SIP\', \'${PROTOCOL}/${EXTEN}@${VALUE}\')');
        $this->addSql('INSERT INTO trunk_register_type (name, description, protocol, mask) VALUES (\'KHOMP\', \'Khomp\', \'KHOMP\', \'${PROTOCOL}/${VALUE}/${EXTEN}\')');
        $this->addSql('INSERT INTO oauth_client (id, name, client_id, secret_id) VALUES (1, \'Sistema principal\', \'development\', \'development\')');
        $this->addSql(' INSERT INTO trunk_dial_type (value, label) VALUES (\'SIMPLE\', \'Da maneira como foi discado\')');
        $this->addSql(' INSERT INTO trunk_dial_type (value, label) VALUES (\'DDD\', \'DDD - [DDD][Número]\')');
        $this->addSql(' INSERT INTO trunk_dial_type (value, label) VALUES (\'E164\', \'E164 - [PAIS][DDD][Número]\')');

        $this->addSql('DROP VIEW IF EXISTS queue_members');
        $this->addSql('CREATE VIEW queue_members AS SELECT queues.name AS queue_name, concat(\'SIP/\', queue_member.branch) AS interface, queue_member.id AS uniqueid, concat(\'SIP/\', queue_member.branch) AS membername, queue_member.penalty, (queue_member.paused)::integer AS paused FROM (queue_member JOIN queues ON (((queues.name)::text = (queue_member.queue)::text))) WHERE (queue_member.logged = true)');

    }

    public function down(Schema $schema)
    {
        $this->addSql('DELETE FROM type_iax_encryption WHERE name = \'yes\'');
        $this->addSql('DELETE FROM type_iax_encryption WHERE name = \'no\'');
        $this->addSql('DELETE FROM type_iax_encryption WHERE name = \'aes128\'');
        $this->addSql('DELETE FROM type_iax_require_calltoken WHERE name = \'yes\'');
        $this->addSql('DELETE FROM type_iax_require_calltoken WHERE name = \'no\'');
        $this->addSql('DELETE FROM type_iax_require_calltoken WHERE name = \'auto\'');
        $this->addSql('DELETE FROM type_iax_transfer WHERE name = \'enum\'');
        $this->addSql('DELETE FROM type_iax_transfer WHERE name = \'no\'');
        $this->addSql('DELETE FROM type_iax_transfer WHERE name = \'mediaonly\'');
        $this->addSql('DELETE FROM type_sip_moh_mode WHERE name = \'custom\'');
        $this->addSql('DELETE FROM type_sip_moh_mode WHERE name = \'files\'');
        $this->addSql('DELETE FROM type_sip_moh_mode WHERE name = \'mp3nb\'');
        $this->addSql('DELETE FROM type_sip_moh_mode WHERE name = \'quietmp3nb\'');
        $this->addSql('DELETE FROM type_sip_moh_mode WHERE name = \'quietmp3\'');
        $this->addSql('DELETE FROM type_queue_auto_pause WHERE name = \'yes\'');
        $this->addSql('DELETE FROM type_queue_auto_pause WHERE name = \'no\'');
        $this->addSql('DELETE FROM type_queue_auto_pause WHERE name = \'all\'');
        $this->addSql('DELETE FROM type_queue_strategy WHERE name = \'ringall\'');
        $this->addSql('DELETE FROM type_queue_strategy WHERE name = \'roundrobin\'');
        $this->addSql('DELETE FROM type_queue_strategy WHERE name = \'leastrecent\'');
        $this->addSql('DELETE FROM type_queue_strategy WHERE name = \'fewestcalls\'');
        $this->addSql('DELETE FROM type_queue_strategy WHERE name = \'random\'');
        $this->addSql('DELETE FROM type_queue_strategy WHERE name = \'rrmemory\'');
        $this->addSql('DELETE FROM type_queue_strategy WHERE name = \'linear\'');
        $this->addSql('DELETE FROM type_queue_strategy WHERE name = \'wrandom\'');
        $this->addSql('DELETE FROM type_sip_calling_pres WHERE name = \'allowed_not_screened\'');
        $this->addSql('DELETE FROM type_sip_calling_pres WHERE name = \'allowed_passed_screen\'');
        $this->addSql('DELETE FROM type_sip_calling_pres WHERE name = \'allowed_failed_screen\'');
        $this->addSql('DELETE FROM type_sip_calling_pres WHERE name = \'allowed\'');
        $this->addSql('DELETE FROM type_sip_calling_pres WHERE name = \'prohib_not_screened\'');
        $this->addSql('DELETE FROM type_sip_calling_pres WHERE name = \'prohib_passed_screen\'');
        $this->addSql('DELETE FROM type_sip_calling_pres WHERE name = \'prohib_failed_screen\'');
        $this->addSql('DELETE FROM type_sip_calling_pres WHERE name = \'prohib\'');
        $this->addSql('DELETE FROM type_sip_direct_media WHERE name = \'yes\'');
        $this->addSql('DELETE FROM type_sip_direct_media WHERE name = \'no\'');
        $this->addSql('DELETE FROM type_sip_direct_media WHERE name = \'nonat\'');
        $this->addSql('DELETE FROM type_sip_direct_media WHERE name = \'update\'');
        $this->addSql('DELETE FROM type_sip_dtmf_mode WHERE name = \'rfc2833\'');
        $this->addSql('DELETE FROM type_sip_dtmf_mode WHERE name = \'info\'');
        $this->addSql('DELETE FROM type_sip_dtmf_mode WHERE name = \'shortinfo\'');
        $this->addSql('DELETE FROM type_sip_dtmf_mode WHERE name = \'inband\'');
        $this->addSql('DELETE FROM type_sip_dtmf_mode WHERE name = \'auto\'');
        $this->addSql('DELETE FROM type_sip_nat WHERE name = \'yes\'');
        $this->addSql('DELETE FROM type_sip_nat WHERE name = \'no\'');
        $this->addSql('DELETE FROM type_sip_nat WHERE name = \'never\'');
        $this->addSql('DELETE FROM type_sip_nat WHERE name = \'route\'');
        $this->addSql('DELETE FROM type_sip_progress_in_band WHERE name = \'yes\'');
        $this->addSql('DELETE FROM type_sip_progress_in_band WHERE name = \'no\'');
        $this->addSql('DELETE FROM type_sip_progress_in_band WHERE name = \'never\'');
        $this->addSql('DELETE FROM type_sip_session_refresher WHERE name = \'uac\'');
        $this->addSql('DELETE FROM type_sip_session_refresher WHERE name = \'uas\'');
        $this->addSql('DELETE FROM type_sip_session_timers WHERE name = \'accept\'');
        $this->addSql('DELETE FROM type_sip_session_timers WHERE name = \'refuse\'');
        $this->addSql('DELETE FROM type_sip_session_timers WHERE name = \'originate\'');
        $this->addSql('DELETE FROM type_sip_transport WHERE name = \'udp\'');
        $this->addSql('DELETE FROM type_sip_transport WHERE name = \'tcp\'');
        $this->addSql('DELETE FROM type_sip_transport WHERE name = \'udp,tcp\'');
        $this->addSql('DELETE FROM type_sip_transport WHERE name = \'tcp,udp\'');
        $this->addSql('DELETE FROM type_type WHERE name = \'friend\'');
        $this->addSql('DELETE FROM type_type WHERE name = \'user\'');
        $this->addSql('DELETE FROM type_type WHERE name = \'peer\'');
        $this->addSql('DELETE FROM type_yes_no WHERE name = \'yes\'');
        $this->addSql('DELETE FROM type_yes_no WHERE name = \'no\'');
        $this->addSql('DELETE FROM trunk_register_type WHERE name = \'GATEWAY_SIP\'');
        $this->addSql('DELETE FROM trunk_register_type WHERE name = \'AUTH_SIP\'');
        $this->addSql('DELETE FROM trunk_register_type WHERE name = \'KHOMP\'');
        $this->addSql('DELETE FROM oauth_client WHERE id = 1');
        $this->addSql('DELETE FROM trunk_dial_type WHERE value = \'SIMPLE\'');
        $this->addSql('DELETE FROM trunk_dial_type WHERE value = \'DDD\'');
        $this->addSql('DELETE FROM trunk_dial_type WHERE value = \'E164\'');
        $this->addSql('DROP VIEW IF EXISTS queue_members');
    }
}
