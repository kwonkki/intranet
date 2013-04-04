## ######################################################
## �Ҵ��� SQL
## ######################################################

# �״����� Ʃ��
ALTER TABLE `$g4[board_table]` ADD `min_wr_num` INT( 11 ) NOT NULL;

# ��ó����(CCL)
ALTER TABLE `$g4[board_table]` ADD `bo_ccl` tinyint(4) NOT NULL default '0';

# �״����� Ʃ��
ALTER TABLE `$g4[member_table]` ADD `mb_auth_count` TINYINT( 4 ) NOT NULL default '0';

# �׷�����, �˻����
ALTER TABLE `$g4[group_table]` ADD `gr_use_search` tinyint(4) NOT NULL default '0';
ALTER TABLE `$g4[group_table]` ADD `gr_order_search` int(11) NOT NULL default '0';

# ����/��������� ����� ������ ���� ����
ALTER TABLE `$g4[config_table]` ADD `cf_use_sex` tinyint(4) NOT NULL default '0';
ALTER TABLE `$g4[config_table]` ADD `cf_use_birthdate` tinyint(4) NOT NULL default '0';

# �ֽű� �Խ��� Ȯ��
ALTER TABLE `$g4[board_new_table]` ADD `wr_option` set('html1','html2','secret','mail') NOT NULL,
  ADD `parent_mb_id` varchar(20) NOT NULL,
  ADD `wr_is_comment` tinyint(4) NOT NULL default '0',
  ADD `gr_id` varchar(255) NOT NULL default '',
  ADD `my_datetime` datetime NOT NULL ;

ALTER TABLE `$g4[board_new_table]` ADD INDEX `g4_board_new` (`wr_parent`) ;
ALTER TABLE `$g4[board_new_table]` ADD INDEX `g4_board_new1` (`wr_id`) ;
ALTER TABLE `$g4[board_new_table]` ADD INDEX `g4_board_new2` (`bo_table`) ;
ALTER TABLE `$g4[board_new_table]` ADD INDEX `gr_id` (`gr_id`) ;
ALTER TABLE `$g4[board_new_table]` ADD INDEX `wr_is_comment` (`wr_is_comment`) ;

# ���̸޴�
DROP TABLE IF EXISTS `$g4[my_menu_table]`;
CREATE TABLE `$g4[my_menu_table]` (
  `id` int(11) NOT NULL auto_increment,
  `mb_id` varchar(20) NOT NULL,
  `bo_table` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `mb_id` (`mb_id`,`bo_table`)
);

## ����� �׷�� 
DROP TABLE IF EXISTS `$g4[member_group_table]`;
CREATE TABLE `$g4[member_group_table]` ( 
`gl_id` tinyint(4) NOT NULL, 
`gl_name` varchar(255) NOT NULL default '', 
PRIMARY KEY (`gl_id`) 
);

INSERT INTO `$g4[member_group_table]` (`gl_id`, `gl_name`) VALUES (1, '��ȸ��'); 
INSERT INTO `$g4[member_group_table]` (`gl_id`, `gl_name`) VALUES (2, '�Ϲ�ȸ��'); 
INSERT INTO `$g4[member_group_table]` (`gl_id`, `gl_name`) VALUES (3, '��ȸ��'); 
INSERT INTO `$g4[member_group_table]` (`gl_id`, `gl_name`) VALUES (4, 'Ư��ȸ��'); 
INSERT INTO `$g4[member_group_table]` (`gl_id`, `gl_name`) VALUES (5, ''); 
INSERT INTO `$g4[member_group_table]` (`gl_id`, `gl_name`) VALUES (6, ''); 
INSERT INTO `$g4[member_group_table]` (`gl_id`, `gl_name`) VALUES (7, ''); 
INSERT INTO `$g4[member_group_table]` (`gl_id`, `gl_name`) VALUES (8, ''); 
INSERT INTO `$g4[member_group_table]` (`gl_id`, `gl_name`) VALUES (9, ''); 
INSERT INTO `$g4[member_group_table]` (`gl_id`, `gl_name`) VALUES (10, '������');

# ����2 - ����ڱ׷�
DROP TABLE IF EXISTS `$g4[memo_group_table]`;
CREATE TABLE `$g4[memo_group_table]` (
  `gr_id` int(11) NOT NULL auto_increment,
  `mb_id` varchar(255) NOT NULL,
  `gr_name` varchar(255) NOT NULL,
  `gr_datetime` datetime NOT NULL,
  PRIMARY KEY  (`gr_id`)
);

DROP TABLE IF EXISTS `$g4[memo_group_member_table]`;
CREATE TABLE `$g4[memo_group_member_table]` (
  `gr_mb_no` int(11) NOT NULL auto_increment,
  `gr_id` int(11) NOT NULL,
  `gr_mb_id` varchar(255) NOT NULL,
  `gr_mb_datetime` datetime NOT NULL,
  PRIMARY KEY  (`gr_mb_no`)
);

# ����2 - �������̺�
DROP TABLE IF EXISTS `$g4[memo_notice_table]`;
CREATE TABLE `$g4[memo_notice_table]` (
  `me_id` int(11) NOT NULL auto_increment,
  `me_recv_mb_id` varchar(255) NOT NULL default '',
  `me_send_mb_id` varchar(255) NOT NULL default '',
  `me_send_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
  `me_read_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
  `me_memo` mediumtext NOT NULL,
  `me_file_local` varchar(255) NOT NULL,
  `me_file_server` varchar(255) NOT NULL,
  `me_subject` varchar(255) NOT NULL,
  `memo_type` varchar(255) NOT NULL,
  `memo_owner` varchar(255) NOT NULL,
  PRIMARY KEY  (`me_id`),
  KEY `me_recv_mb_id_idx` (`me_recv_mb_id`),
  KEY `me_send_mb_id_idx` (`me_send_mb_id`),
  KEY `datetime` (`me_send_datetime`),
  KEY `memo_owner` (`memo_owner`),
  KEY `me_file_local` (`me_file_local`)
);

# ����2 - �������̺�
DROP TABLE IF EXISTS `$g4[memo_recv_table]`;
CREATE TABLE `$g4[memo_recv_table]` (
  `me_id` int(11) NOT NULL auto_increment,
  `me_recv_mb_id` varchar(255) NOT NULL default '',
  `me_send_mb_id` varchar(255) NOT NULL default '',
  `me_send_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
  `me_read_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
  `me_memo` mediumtext NOT NULL,
  `me_file_local` varchar(255) NOT NULL,
  `me_file_server` varchar(255) NOT NULL,
  `me_subject` varchar(255) NOT NULL,
  `memo_type` varchar(255) NOT NULL,
  `memo_owner` varchar(255) NOT NULL,
  PRIMARY KEY  (`me_id`),
  KEY `me_recv_mb_id_idx` (`me_recv_mb_id`),
  KEY `me_send_mb_id_idx` (`me_send_mb_id`),
  KEY `datetime` (`me_send_datetime`),
  KEY `memo_owner` (`memo_owner`),
  KEY `me_file_local` (`me_file_local`)
);

# ����2 - �������̺�
DROP TABLE IF EXISTS `$g4[memo_save_table]`;
CREATE TABLE `$g4[memo_save_table]` (
  `me_id` int(11) NOT NULL,
  `me_recv_mb_id` varchar(255) NOT NULL default '',
  `me_send_mb_id` varchar(255) NOT NULL default '',
  `me_send_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
  `me_read_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
  `me_memo` mediumtext NOT NULL,
  `me_file_local` varchar(255) NOT NULL,
  `me_file_server` varchar(255) NOT NULL,
  `me_subject` varchar(255) NOT NULL,
  `memo_type` varchar(255) NOT NULL,
  `memo_owner` varchar(255) NOT NULL,
  PRIMARY KEY  (`me_id`),
  KEY `me_recv_mb_id_idx` (`me_recv_mb_id`),
  KEY `me_send_mb_id_idx` (`me_send_mb_id`),
  KEY `datetime` (`me_send_datetime`),
  KEY `memo_owner` (`memo_owner`),
  KEY `me_file_local` (`me_file_local`)
);

# ����2 - �߽����̺�
DROP TABLE IF EXISTS `$g4[memo_send_table]`;
CREATE TABLE `$g4[memo_send_table]` (
  `me_id` int(11) NOT NULL,
  `me_recv_mb_id` varchar(255) NOT NULL default '',
  `me_send_mb_id` varchar(255) NOT NULL default '',
  `me_send_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
  `me_read_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
  `me_memo` mediumtext NOT NULL,
  `me_file_local` varchar(255) NOT NULL,
  `me_file_server` varchar(255) NOT NULL,
  `me_subject` varchar(255) NOT NULL,
  `memo_type` varchar(255) NOT NULL,
  `memo_owner` varchar(255) NOT NULL,
  PRIMARY KEY  (`me_id`),
  KEY `me_recv_mb_id_idx` (`me_recv_mb_id`),
  KEY `me_send_mb_id_idx` (`me_send_mb_id`),
  KEY `datetime` (`me_send_datetime`),
  KEY `memo_owner` (`memo_owner`),
  KEY `me_file_local` (`me_file_local`)
);

# ����2 - �������̺�
DROP TABLE IF EXISTS `$g4[memo_spam_table]`;
CREATE TABLE `$g4[memo_spam_table]` (
  `me_id` int(11) NOT NULL,
  `me_recv_mb_id` varchar(255) NOT NULL default '',
  `me_send_mb_id` varchar(255) NOT NULL default '',
  `me_send_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
  `me_read_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
  `me_memo` mediumtext NOT NULL,
  `me_file_local` varchar(255) NOT NULL,
  `me_file_server` varchar(255) NOT NULL,
  `me_subject` varchar(255) NOT NULL,
  `memo_type` varchar(255) NOT NULL,
  `memo_owner` varchar(255) NOT NULL,
  PRIMARY KEY  (`me_id`),
  KEY `me_recv_mb_id_idx` (`me_recv_mb_id`),
  KEY `me_send_mb_id_idx` (`me_send_mb_id`),
  KEY `datetime` (`me_send_datetime`),
  KEY `memo_owner` (`memo_owner`),
  KEY `me_file_local` (`me_file_local`)
);

# ����2 - ģ�����̺�
DROP TABLE IF EXISTS `$g4[friend_table]`;
CREATE TABLE `$g4[friend_table]` (
  `fr_no` int(11) NOT NULL auto_increment,
  `mb_id` varchar(20) NOT NULL,
  `fr_id` varchar(20) NOT NULL,
  `fr_memo` varchar(255) default NULL,
  `fr_type` varchar(20) NOT NULL,
  `fr_datetime` datetime NOT NULL,
  PRIMARY KEY  (`fr_no`),
  UNIQUE KEY `mb_id` (`mb_id`,`fr_id`),
  KEY `fr_datetime` (`fr_datetime`),
  KEY `fr_relation` (`fr_type`)
);

## ����Ʈ���
DROP TABLE IF EXISTS `$g4[auction_tender_table]`;
create table `$g4[auction_tender_table]` ( 
`td_id` INT NOT NULL AUTO_INCREMENT , 
`wr_id` INT NOT NULL , 
`mb_id` VARCHAR( 30 ) NOT NULL , 
`mb_name` VARCHAR( 255 ) NOT NULL , 
`mb_nick` VARCHAR( 255 ) NOT NULL , 
`mb_email` VARCHAR( 255 ) NOT NULL , 
`mb_homepage` VARCHAR( 255 ) NOT NULL , 
`td_inter_point` INT NOT NULL , 
`td_tender_point` INT NOT NULL , 
`td_status` CHAR( 1 ) NOT NULL , 
`td_last` DATETIME NOT NULL , 
`td_datetime` DATETIME NOT NULL , 
PRIMARY KEY ( `td_id` ) , 
INDEX ( `wr_id` ) 
);

# �Խ��Ǻ� �湮�� ī���� - �����־�
DROP TABLE IF EXISTS `$mw[board_visit_table]`;
CREATE TABLE `$mw[board_visit_table]` (
  `bv_date` date NOT NULL,
  `gr_id` varchar(20) NOT NULL,
  `bo_table` varchar(20) NOT NULL,
  `bv_count` int(11) NOT NULL,
  PRIMARY KEY  (`bv_date`,`gr_id`,`bo_table`)
);

# �Խ��Ǻ� �湮�� ī���� - �����־�
DROP TABLE IF EXISTS `$mw[board_visit_log_table]`;
CREATE TABLE `$mw[board_visit_log_table]` (
  `log` varchar(68) NOT NULL,
  PRIMARY KEY  (`log`)
);

# ��ó ���� �����ϱ�
ALTER TABLE `$g4[board_table]` ADD `bo_source` TINYINT( 4 ) NOT NULL ;

# �������� �������׿� ��� ���� ���ϰ� �ϱ�
ALTER TABLE `$g4[board_table]` ADD `bo_notice_comment_allow` VARCHAR( 255 ) NOT NULL ;

# �ڸ�Ʈ ��������
ALTER TABLE `$g4[board_table]` ADD `bo_comment_notice` TEXT NOT NULL ;

# ���ñ�
ALTER TABLE `$g4[board_table]` ADD `bo_related` TINYINT( 4 ) NOT NULL ;

# ȸ�� �г��� �����丮 ����
DROP TABLE IF EXISTS `$g4[mb_nick_table]`;
CREATE TABLE `$g4[mb_nick_table]` (
  `nick_no` int(11) NOT NULL auto_increment,
  `mb_id` varchar(20) NOT NULL,
  `mb_nick` varchar(255) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  PRIMARY KEY  (`nick_no`)
);

# �Խ��Ǻ� �α�� (utf-8�� ��ġ���� ������ mb_id�� 255���� 20���� ����
ALTER TABLE `$g4[popular_table]` ADD `bo_table` VARCHAR( 20 ) NOT NULL ,
ADD `mb_id` VARCHAR( 20 ) NOT NULL,
ADD `sfl` VARCHAR( 255 ) NOT NULL ;

# utf-8���� ������ �Ǿ��׿�...
ALTER TABLE `$g4[popular_table]` ADD INDEX `bo_table_idx` ( `bo_table` ) ;
ALTER TABLE `$g4[popular_table]` ADD INDEX `mb_id_idx` ( `mb_id` ) ;

ALTER TABLE `$g4[popular_table]` DROP INDEX `index1` ,
ADD UNIQUE `index1` ( `pp_date` , `pp_word` , `pp_ip` , `bo_table` , `mb_id` ) ;

# ����2 - �ǽð� �޸�
ALTER TABLE `$g4[member_table]` ADD `mb_realmemo` TINYINT( 4 ) NOT NULL ,
ADD `mb_realmemo_sound` TINYINT( 4 ) NOT NULL ;

# �ڸ�Ʈ �б� ����
ALTER TABLE `$g4[board_table]` ADD `bo_comment_read_level` TINYINT( 4 ) NOT NULL AFTER `bo_comment_level` ;

# �Խ��� �Ű�
DROP TABLE IF EXISTS `$g4[singo_table]`;
CREATE TABLE `$g4[singo_table]` ( 
  `sg_id` int(11) NOT NULL auto_increment, 
  `mb_id` varchar(20) NOT NULL default '', 
  `bo_table` varchar(20) NOT NULL default '', 
  `wr_id` int(11) NOT NULL default '0', 
  `wr_parent` int(11) NOT NULL default '0', 
  `sg_mb_id` varchar(20) NOT NULL default '', 
  `sg_reason` varchar(255) NOT NULL default '', 
  `sg_datetime` datetime NOT NULL default '0000-00-00 00:00:00', 
  `sg_ip` varchar(255) NOT NULL default '', 
  PRIMARY KEY  (`sg_id`), 
  KEY `fk1` (`bo_table`,`wr_id`), 
  KEY `fk2` (`bo_table`,`wr_parent`) 
); 

ALTER TABLE `$g4[board_table]` ADD `bo_singo` TINYINT NOT NULL;

ALTER TABLE `$g4[config_table]` ADD `cf_singo_intercept_count` INT( 11 ) NOT NULL ,
                        ADD `cf_singo_point` INT( 11 ) NOT NULL ,
                        ADD `cf_singo_today_count` INT( 11 ) NOT NULL ;

# ���� �湮�� �Խ���
DROP TABLE IF EXISTS `$g4[my_board_table]`;
CREATE TABLE `$g4[my_board_table]` (
  `my_id` int(11) NOT NULL auto_increment,
  `mb_id` varchar(20) NOT NULL,
  `bo_table` varchar(20) NOT NULL,
  `my_datetime` datetime NOT NULL,
  PRIMARY KEY  (`my_id`),
  KEY `mb_id` (`mb_id`, `bo_table`)
) ;

# ����� �׷�
DROP TABLE IF EXISTS `$g4[user_group_table]`;
CREATE TABLE `$g4[user_group_table]` (
  `ug_id` varchar(10) NOT NULL default '',
  `ug_subject` varchar(255) NOT NULL default '',
  `ug_admin` varchar(255) NOT NULL default '',
  `ug_1_subj` varchar(255) NOT NULL default '',
  `ug_2_subj` varchar(255) NOT NULL default '',
  `ug_3_subj` varchar(255) NOT NULL default '',
  `ug_4_subj` varchar(255) NOT NULL default '',
  `ug_5_subj` varchar(255) NOT NULL default '',
  `ug_1` varchar(255) NOT NULL default '',
  `ug_2` varchar(255) NOT NULL default '',
  `ug_3` varchar(255) NOT NULL default '',
  `ug_4` varchar(255) NOT NULL default '',
  `ug_5` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ug_id`)
);

ALTER TABLE `$g4[member_table]` ADD `ug_id` VARCHAR( 10 ) NOT NULL ;

# �ڵ��� ����
ALTER TABLE `$g4[config_table]` ADD `cf_hp_certify` TINYINT( 4 ) NOT NULL ,
ADD `cf_hp_certify_message` VARCHAR( 255 ) NOT NULL ,
ADD `cf_hp_certify_return` VARCHAR( 20 ) NOT NULL ;

ALTER TABLE `$g4[member_table]` ADD `mb_hp_certify_datetime` DATETIME NOT NULL ;

# ��ũ��
ALTER TABLE `$g4[scrap_table]` 
ADD `ms_memo` TEXT NOT NULL ,
ADD `wr_mb_id` VARCHAR( 255 ) NOT NULL ,
ADD `wr_subject` VARCHAR( 255 ) NOT NULL ;

# sms4
ALTER TABLE `$g4[config_table]` ADD `cf_sms4_member` TINYINT NOT NULL ,
ADD `cf_sms4_level` TINYINT NOT NULL ;

# ��ǥ�ϱ� 
ALTER TABLE `$g4[poll_table]` ADD `po_skin` VARCHAR( 255 ) NOT NULL ;
ALTER TABLE `$g4[poll_table]` ADD `po_end_date` DATE NOT NULL ; 
ALTER TABLE `$g4[poll_etc_table]` ADD `pc_password` VARCHAR( 255 ) NOT NULL ;

# �Ű����� ���̺�
DROP TABLE IF EXISTS `$g4[singo_reason_table]`;
CREATE TABLE `$g4[singo_reason_table]` (
  `sg_id` int(11) NOT NULL auto_increment,
  `sg_reason` varchar(255) NOT NULL,
  `sg_use` tinyint(4) NOT NULL,
  `sg_print` tinyint(4) NOT NULL,
  `sg_datetime` datetime NOT NULL,
  PRIMARY KEY  (`sg_id`)
) ;

INSERT INTO `$g4[singo_reason_table]` (`sg_id`, `sg_reason`, `sg_use`, `sg_print`, `sg_datetime`) VALUES 
(1, '���ǹ��� �����', 0, 0, '0000-00-00 00:00:00'),
(2, '�Խ��Ǹ����� ������ �Խñ�', 0, 0, '0000-00-00 00:00:00'),
(3, '�������� ��ǰ�Ǹ�', 0, 1, '0000-00-00 00:00:00'),
(4, '����.ȫ��.�湮����', 0, 1, '0000-00-00 00:00:00'),
(5, '����� �� ���� �Խñ�', 0, 0, '0000-00-00 00:00:00'),
(6, '�弳.��� �Խñ�', 0, 0, '0000-00-00 00:00:00'),
(7, '���۱ǹ��� ����', 0, 0, '0000-00-00 00:00:00'),
(8, '�ݻ�ȸ�� �Խñ�', 0, 0, '0000-00-00 00:00:00');

# �湮�� Ʃ��
ALTER TABLE `$g4[visit_table]` CHANGE `vi_id` `vi_id` INT( 11 ) NOT NULL AUTO_INCREMENT ;

# ����2 - 2.0.36 (�������� ���̺��� �̵�)
#ALTER TABLE `$g4[config_table]` ADD `cf_memo_user_dhtml` TINYINT( 4 ) NOT NULL DEFAULT '1' ;
#ALTER TABLE `$g4[config_table]` ADD `cf_memo_use_file` TINYINT( 4 ) NOT NULL DEFAULT '1' ;

# �����ڴ� �Ű���� 
ALTER TABLE `$g4[board_table]` ADD `bo_singo_action` TINYINT( 4 ) NOT NULL AFTER `bo_singo` ;

# pre31 - ������ �ۿ� �ڸ�Ʈ �޶� ����Ʈ ���ֱ�
ALTER TABLE `$g4[config_table]` ADD `cf_no_comment_point_days` INT( 11 ) NOT NULL ;

# pre32 - �α�� ��� ����
ALTER TABLE `$g4[board_table]` ADD `bo_popular` TINYINT( 4 ) NOT NULL ;
ALTER TABLE `$g4[board_table]` ADD `bo_popular_days` INT( 11 ) NOT NULL DEFAULT '14';

# pre32 - �޸� call
ALTER TABLE `$g4[member_table]` CHANGE `mb_memo_call` `mb_memo_call` TEXT NOT NULL ;

# pre32 - �����ɱ�
DROP TABLE IF EXISTS `$g4[hidden_comment_table]`;
CREATE TABLE `$g4[hidden_comment_table]` (
  `co_id` int(11) NOT NULL auto_increment,
  `bo_table` varchar(20) NOT NULL,
  `wr_id` int(11) NOT NULL,
  `mb_id` varchar(20) NOT NULL,
  `co_content` varchar(255) NOT NULL,
  `co_link` varchar(255) NOT NULL,
  `co_datetime` datetime NOT NULL,
  `wr_singo` tinyint(4) NOT NULL,
  `wr_ip` varchar(255) NOT NULL,  
  PRIMARY KEY  (`co_id`),
  KEY `bo_table` (`bo_table`,`wr_id`),
  KEY `mb_id` (`mb_id`)
) ;

ALTER TABLE `$g4[board_table]` ADD `bo_hidden_comment` TINYINT( 4 ) NOT NULL ;

# pre33 - Ʃ��
ALTER TABLE `$g4[member_table]` ADD INDEX `mb_email` ( `mb_email` ) ; 
ALTER TABLE `$g4[member_table]` ADD INDEX `mb_nick` ( `mb_nick` ) ;

# pre34 - ��ǥ���� ����
ALTER TABLE `$g4[poll_table]` ADD `po_etc_level` TINYINT( 4 ) NOT NULL ;

# pre34 - ��ǥ Ʃ��
ALTER TABLE `$g4[poll_etc_table]` ADD INDEX `po_id` ( `po_id` ) ;

# pre35 - �α�� Ʃ��
ALTER TABLE `$g4[popular_table]` ADD INDEX `pp_word_idx` ( `pp_word` ) ;

# pre36 - �Խñ� ����
ALTER TABLE `$g4[board_table]` ADD `bo_move_bo_table` VARCHAR( 20 ) NOT NULL ;

# pre36 - 00���� ��������(��й�ȣ) �����ϰ� �ϱ�
ALTER TABLE `$g4[config_table]` ADD `cf_password_change_dates` INT( 11 ) NOT NULL ;
ALTER TABLE `$g4[member_table]` ADD `mb_password_change_datetime` DATETIME NOT NULL ;

# pre36 - ���������� ����� Ʋ���� ip�� �����ϱ�
DROP TABLE IF EXISTS `$g4[login_fail_log_table]`;
CREATE TABLE `$g4[login_fail_log_table]` ( 
`log_id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`mb_id` VARCHAR( 255 ) NOT NULL ,
`ip_addr` VARCHAR( 255 ) NOT NULL ,
`log_datetime` DATETIME NOT NULL ,
`log_url` VARCHAR( 255 ) NOT NULL 
);

ALTER TABLE `$g4[config_table]` 
ADD `cf_retry_time_interval` INT( 11 ) NOT NULL ,
ADD `cf_retry_count` INT( 11 ) NOT NULL ;

# pre36 - gr_id�� 10�ڸ����� 20�ڸ��� �ø���
ALTER TABLE `$g4[board_table]` CHANGE `gr_id` `gr_id` VARCHAR( 20 ) ;
ALTER TABLE `$g4[board_new_table]` CHANGE `gr_id` `gr_id` VARCHAR( 20 ) ;
ALTER TABLE `$g4[group_table]` CHANGE `gr_id` `gr_id` VARCHAR( 20 ) NOT NULL;
ALTER TABLE `$g4[group_member_table]` CHANGE `gr_id` `gr_id` VARCHAR( 20 ) ;

# pre36 - config db�� �и�
DROP TABLE IF EXISTS `$g4[config_reg_table]`;
CREATE TABLE `$g4[config_reg_table]` (
`cf_stipulation` TEXT NOT NULL ,
`cf_privacy` TEXT NOT NULL ,
`cf_privacy_1` TEXT NOT NULL ,
`cf_privacy_2` TEXT NOT NULL ,
`cf_privacy_3` TEXT NOT NULL ,
`cf_privacy_4` TEXT NOT NULL 
);

ALTER TABLE `$g4[config_table]`
  DROP `cf_stipulation`,
  DROP `cf_privacy`;

## pre36 - ����Ʈ ��� ���̺�

DROP TABLE IF EXISTS `$g4[point_table]_backup`;
CREATE TABLE `$g4[point_table]_backup` (
  `po_id` int(11) NOT NULL auto_increment,
  `mb_id` varchar(20) NOT NULL default '',
  `po_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
  `po_content` varchar(255) NOT NULL default '',
  `po_point` int(11) NOT NULL default '0',
  `po_rel_table` varchar(20) NOT NULL default '',
  `po_rel_id` varchar(20) NOT NULL default '',
  `po_rel_action` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`po_id`),
  KEY `index1` (`mb_id`,`po_rel_table`,`po_rel_id`,`po_rel_action`)
);

## pre36 - �г��� history ���� ����
ALTER TABLE `$g4[mb_nick_table]` ADD UNIQUE ( `mb_nick` ) ;

# pre36 - ��ǥ ���ٻ��
ALTER TABLE `$g4[poll_table]` ADD `po_use_access` TINYINT( 4 ) NOT NULL ;

# pre36 - �ڸ�Ʈ html ����
ALTER TABLE `$g4[board_table]` ADD `bo_html_level_comment` TINYINT( 4 ) NOT NULL AFTER `bo_html_level` ;

# pre37 - �ٿ�ε� ����
DROP TABLE IF EXISTS `$g4[board_file_download_table]`;
CREATE TABLE `$g4[board_file_download_table]` (
  `dn_id` int(11) NOT NULL auto_increment,
  `bo_table` varchar(20) NOT NULL,
  `wr_id` int(11) NOT NULL,
  `bf_no` int(11) NOT NULL,
  `mb_id` varchar(255) NOT NULL,
  `download_point` int(11) NOT NULL,
  `dn_count` int(11) NOT NULL,
  `dn_datetime` datetime NOT NULL,
  `dn_ip` varchar(255) NOT NULL,
  UNIQUE KEY `dn_id` (`dn_id`),
  KEY `index1` (`bo_table`,`wr_id`),
  KEY `mb_id` (`mb_id`)
);

# pre37 - ���� 4, ���� ���� ���̺��� �̸� �ٲٱ�
#DROP TABLE IF EXISTS `$g4[table_prefix]memo_backup`;
#RENAME TABLE `$g4[table_prefix]memo` TO `$g4[table_prefix]memo_backup` ;

# pre37 - ���� 4, g4_memo��� view�� ����� (MySQL 5.x���� view�� �ִ�ϴ� ��..��...)
# CREATE VIEW $g4[memo_table] AS SELECT * FROM $g4[memo_table]_recv ;

# pre37 - �Ű��� ���/�Ű��� ����� ����Ʈ ����
ALTER TABLE `$g4[config_table]` ADD `cf_singo_point_send` INT( 11 ) NOT NULL AFTER `cf_singo_point` ,
ADD `cf_singo_point_recv` INT( 11 ) NOT NULL AFTER `cf_singo_point_send` ;

# ����4 - �ű� ���̺� (���� - 4.0.23���� �����)
DROP TABLE IF EXISTS `$g4[memo_config_table]`;
CREATE TABLE `$g4[memo_config_table]` (
  `cf_memo_page_rows` int(11) NOT NULL,
  `cf_memo_del_unread` int(11) NOT NULL default '180',
  `cf_memo_del_trash` int(11) NOT NULL default '7',
  `cf_memo_delete_datetime` datetime NOT NULL,
  `cf_memo_user_dhtml` tinyint(4) NOT NULL default '1',
  `cf_memo_use_file` tinyint(4) NOT NULL default '0',
  `cf_friend_management` tinyint(4) NOT NULL default '1',
  `cf_memo_notice_board` varchar(255) default NULL,
  `cf_memo_before_after` tinyint(4) NOT NULL,
  `cf_memo_notice_memo` text NOT NULL
) ;

INSERT INTO `$g4[memo_config_table]` 
(`cf_memo_page_rows`, `cf_memo_del_unread`, `cf_memo_del_trash`, `cf_memo_delete_datetime`, `cf_memo_user_dhtml`, `cf_memo_use_file`, `cf_friend_management`, `cf_memo_notice_board`, `cf_memo_before_after`) VALUES 
(20, 180, 7, '0000-00-00 00:00:00', 1, 0, 0, '', 0);

# ����4- �ű� ���̺� (�ӽ�����)
DROP TABLE IF EXISTS `$g4[memo_temp_table]`;
CREATE TABLE `$g4[memo_temp_table]` (
  `me_id` int(11) NOT NULL auto_increment,
  `me_recv_mb_id` varchar(255) NOT NULL default '',
  `me_send_mb_id` varchar(255) NOT NULL default '',
  `me_send_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
  `me_read_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
  `me_memo` mediumtext NOT NULL,
  `me_file_local` varchar(255) NOT NULL,
  `me_file_server` varchar(255) NOT NULL,
  `me_subject` varchar(255) NOT NULL,
  `memo_type` varchar(255) NOT NULL,
  `memo_owner` varchar(255) NOT NULL,
  PRIMARY KEY  (`me_id`),
  KEY `me_recv_mb_id_idx` (`me_recv_mb_id`),
  KEY `me_send_mb_id_idx` (`me_send_mb_id`),
  KEY `datetime` (`me_send_datetime`),
  KEY `memo_owner` (`memo_owner`),
  KEY `me_file_local` (`me_file_local`)
);

# ����4 - �ű����̺� (������)
DROP TABLE IF EXISTS `$g4[memo_trash_table]`;
CREATE TABLE `$g4[memo_trash_table]` (
  `me_id` int(11) NOT NULL auto_increment,
  `me_recv_mb_id` varchar(255) NOT NULL default '',
  `me_send_mb_id` varchar(255) NOT NULL default '',
  `me_send_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
  `me_read_datetime` datetime NOT NULL default '0000-00-00 00:00:00',
  `me_memo` mediumtext NOT NULL,
  `me_file_local` varchar(255) NOT NULL,
  `me_file_server` varchar(255) NOT NULL,
  `me_subject` varchar(255) NOT NULL,
  `memo_type` varchar(255) NOT NULL,
  `memo_owner` varchar(255) NOT NULL,
  PRIMARY KEY  (`me_id`),
  KEY `me_recv_mb_id_idx` (`me_recv_mb_id`),
  KEY `me_send_mb_id_idx` (`me_send_mb_id`),
  KEY `datetime` (`me_send_datetime`),
  KEY `memo_owner` (`memo_owner`),
  KEY `me_file_local` (`me_file_local`)
);

# ����4 - �ɼ��ʵ� �߰�
ALTER TABLE `$g4[memo_recv_table]` ADD `me_option` SET( 'html1', 'html2', 'secret', 'mail' ) NOT NULL ;
ALTER TABLE `$g4[memo_send_table]` ADD `me_option` SET( 'html1', 'html2', 'secret', 'mail' ) NOT NULL ;
ALTER TABLE `$g4[memo_save_table]` ADD `me_option` SET( 'html1', 'html2', 'secret', 'mail' ) NOT NULL ;
ALTER TABLE `$g4[memo_temp_table]` ADD `me_option` SET( 'html1', 'html2', 'secret', 'mail' ) NOT NULL ;
ALTER TABLE `$g4[memo_notice_table]` ADD `me_option` SET( 'html1', 'html2', 'secret', 'mail' ) NOT NULL ;
ALTER TABLE `$g4[memo_spam_table]` ADD `me_option` SET( 'html1', 'html2', 'secret', 'mail' ) NOT NULL ;
ALTER TABLE `$g4[memo_trash_table]` ADD `me_option` SET( 'html1', 'html2', 'secret', 'mail' ) NOT NULL ;

# pre37 - db���� ���ǰ���
DROP TABLE IF EXISTS `$g4[session_table]`;
CREATE TABLE `$g4[session_table]` (
  `id` varchar(32) NOT NULL,
  `ss_datetime` datetime NOT NULL,
  `ss_data` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `se_datetime` (`ss_datetime`)
);

# pre37 - ����4 �ڵ�������
ALTER TABLE `$g4[member_table]` ADD `mb_memo_no_reply` TINYINT( 4 ) NOT NULL AFTER `mb_realmemo_sound` ;
ALTER TABLE `$g4[member_table]` ADD `mb_memo_no_reply_text` text NOT NULL AFTER `mb_memo_no_reply` ;

# pre37 - �Խ��Ǻ� ����Ʈ ��� ��������
ALTER TABLE `$g4[board_table]` ADD `bo_print_level` TINYINT( 4 ) NOT NULL ;

# pre37 - �ߺ��α��� ����
ALTER TABLE `$g4[config_table]` ADD `cf_double_login` TINYINT( 4 ) NOT NULL ;

# pre37 - �Ű� �Խ��Ǿ��� ����
ALTER TABLE `$g4[board_table]` ADD `bo_singo_nowrite` VARCHAR( 255 ) NOT NULL ;

# 1.0.1 - �ߺ� �α��� ���� (�Ҵ���)
ALTER TABLE `$g4[session_table]` ADD `ip_addr` VARCHAR( 255 ) NOT NULL ;

# 1.0.4 - �ߺ��α��� ���� (������)
ALTER TABLE `$g4[session_table]` ADD `mb_id` VARCHAR( 20 ) NOT NULL AFTER `ss_data` ;
ALTER TABLE `$g4[session_table]` ADD INDEX `mb_id` ( `mb_id` , `ip_addr` ) ;
ALTER TABLE `$g4[session_table]` CHANGE `ip_addr` `ip_addr` VARCHAR( 20 ) ;

# 1.0.4 - �ڵ��� ������ ȸ���� �۾���
ALTER TABLE `$g4[board_table]` ADD `bo_hhp` TINYINT( 4 ) NOT NULL ;

# 1.0.4 - �α� �Խù� ��� (���߽�Ų)
ALTER TABLE `$g4[board_table]` ADD `bo_hot_list` TINYINT( 4 ) NOT NULL DEFAULT '0',
ADD `bo_hot_list_basis` VARCHAR( 5 ) NOT NULL DEFAULT 'hit';

# 1.0.6 - ����4 ��¼���
ALTER TABLE `$g4[memo_config_table]` ADD `cf_memo_print` TINYINT( 4 ) NOT NULL ;

# 1.0.8 - meta ����
ALTER TABLE `$g4[config_table]` ADD `cf_meta_author` VARCHAR( 255 ) NOT NULL ,
ADD `cf_meta_keywords` VARCHAR( 255 ) NOT NULL ,
ADD `cf_meta_description` VARCHAR( 255 ) NOT NULL ;

# 1.0.8 - g4_login index �߰�
ALTER TABLE `$g4[login_table]` ADD INDEX `lo_datetime` ( `lo_datetime` ) ;

# 1.0.19 - ������/�����ٿ�
DROP TABLE IF EXISTS `$g4[member_level_table]`;
CREATE TABLE `$g4[member_level_table]` (
  `member_level` tinyint(4) NOT NULL,
  `use_levelup` tinyint(4) NOT NULL,
  `use_leveldown` int(11) NOT NULL,
  `up_days` int(11) NOT NULL,
  `up_point` int(11) NOT NULL,
  `up_post` int(11) NOT NULL,
  `up_post_all` int(11) NOT NULL,
  `up_audit_days` int(11) NOT NULL,
  `down_point` int(11) NOT NULL,
  `down_post` int(11) NOT NULL,
  `down_post_all` int(11) NOT NULL,
  `down_audit_days` int(11) NOT NULL,
  `good` int(11) NOT NULL,
  `nogood` int(11) NOT NULL,
  `singo` tinyint(4) NOT NULL,
  PRIMARY KEY  (`member_level`),
  KEY `level_up` (`use_levelup`),
  KEY `level_down` (`use_leveldown`)
);

DROP TABLE IF EXISTS `$g4[member_level_history_table]`;
CREATE TABLE `$g4[member_level_history_table]` (
  `id` int(11) NOT NULL auto_increment,
  `mb_id` varchar(255) NOT NULL,
  `from_level` tinyint(4) NOT NULL,
  `to_level` tinyint(4) NOT NULL,
  `level_datetime` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `mb_id` (`mb_id`),
  KEY `level_datetime` (`level_datetime`)
);

INSERT INTO `$g4[member_level_table]` set `member_level`='2' ;
INSERT INTO `$g4[member_level_table]` set `member_level`='3' ;
INSERT INTO `$g4[member_level_table]` set `member_level`='4' ;
INSERT INTO `$g4[member_level_table]` set `member_level`='5' ;
INSERT INTO `$g4[member_level_table]` set `member_level`='6' ;
INSERT INTO `$g4[member_level_table]` set `member_level`='7' ;
INSERT INTO `$g4[member_level_table]` set `member_level`='8' ;

ALTER TABLE `$g4[member_table]` ADD `mb_level_datetime` DATETIME NOT NULL ;

# 1.0.23 - ��ǥ���� ��� �߰�
ALTER TABLE `$g4[poll_table]` ADD `po_summary` TEXT NOT NULL ;

# 1.0.23 - ����4 ÷������ ���� ��� �߰�
ALTER TABLE `$g4[memo_config_table]` ADD `cf_memo_del_file` TINYINT( 4 ) NOT NULL ;

# 1.0.24 - ����4 temp, trash ���̺� key �߰�
ALTER TABLE `$g4[memo_temp_table]` ADD `me_from_kind` VARCHAR( 255 ) NOT NULL ;
ALTER TABLE `$g4[memo_trash_table]` ADD `me_from_kind` VARCHAR( 255 ) NOT NULL ;

ALTER TABLE `$g4[memo_temp_table]` DROP PRIMARY KEY , ADD PRIMARY KEY ( `me_id` , `me_from_kind` ) ;
ALTER TABLE `$g4[memo_trash_table]` DROP PRIMARY KEY , ADD PRIMARY KEY ( `me_id` , `me_from_kind` ) ;

# 1.0.26 - ����4 �����߰� (�ǽð��޸�)
ALTER TABLE `$g4[memo_config_table]` ADD `cf_memo_realtime` TINYINT( 4 ) NOT NULL ;

# 1.0.26 - ����4 �����߰� (�Ǹ� ���)
ALTER TABLE `$g4[memo_config_table]` ADD `cf_memo_mb_name` TINYINT( 4 ) NOT NULL ;

# 1.0.31 - ����4 �����߰� (���ε� ���Ͽ뷮)
ALTER TABLE `$g4[memo_config_table]` ADD `cf_memo_file_size` VARCHAR( 20 ) NOT NULL ;

# 1.0.32 - ����4 save ���� ����
ALTER TABLE `$g4[memo_save_table]` DROP PRIMARY KEY , ADD PRIMARY KEY ( `me_id` , `memo_type` ) ;

# 1.0.36 - ���԰�� ����ϱ�
DROP TABLE IF EXISTS `$g4[member_register_table]`;
CREATE TABLE `$g4[member_register_table]` ( 
  `mb_no` INT( 11 ) NOT NULL ,
  `mb_id` VARCHAR( 255 ) NOT NULL ,
  `ref_url` VARCHAR( 255 ) NOT NULL ,
  KEY `mb_no` (`mb_no`),
  KEY `mb_id` (`mb_id`),
  KEY `ref_url` (`ref_url`)
);

# 1.0.36 - ���� �Խ���
ALTER TABLE `$g4[board_table]` ADD `bo_sex` CHAR( 1 ) NOT NULL ;

# 1.0.37 - ����4
ALTER TABLE `$g4[memo_config_table]` ADD `cf_max_memo_file_size` INT( 11 ) NOT NULL ;

# 1.0.38 - Ȩ������ ����
ALTER TABLE `$g4[member_table]` ADD `mb_homepage_certify` DATETIME NOT NULL AFTER `mb_email_certify` ;

# 1.0.40 - �Ϻ� �۾��� ����
ALTER TABLE `$g4[board_table]` ADD `bo_day_nowrite` VARCHAR( 255 ) NOT NULL ;

# 1.0.41 - ����Ʈ ���� index ����
ALTER TABLE `$g4[point_table]` ADD INDEX `mb_id` ( `mb_id` ) ;
ALTER TABLE `$g4[point_table]` ADD INDEX `po_rel_table` ( `po_rel_table` ) ;
ALTER TABLE `$g4[point_table]` ADD INDEX `po_rel` ( `po_rel_table` , `po_rel_id` ) ;

# 1.0.41 - ����4 - 4.0.19
ALTER TABLE `$g4[member_table]` ADD `mb_memo_no_reply_datetime` DATETIME NOT NULL ;

# 1.0.45 - �����ɱ�
ALTER TABLE `$g4[hidden_comment_table]` ADD `co_mb_id` VARCHAR( 255 ) NOT NULL ;

# 1.0.45 - ����ȯ�� ����
ALTER TABLE `$g4[config_table]` ADD `cf_memo_mb_member` TINYINT( 4 ) NOT NULL ;

# 1.0.45 - n���� �۾��� ����
ALTER TABLE `$g4[board_table]` ADD `bo_comment_nowrite` TINYINT( 4 ) NOT NULL ;

# 1.0.45 - ���������ڼ� Ʃ��
ALTER TABLE `$g4[login_table]` ADD INDEX `mb_id` ( `mb_id` ) ;

# 1.0.45 - ������ �Խ��� ���� / Ʃ��
ALTER TABLE `$g4[board_table]` ADD `bo_gallery` TINYINT( 4 ) NOT NULL ;

# 1.0.45 - ��õ�� �ʼ��Է�
ALTER TABLE `$g4[config_table]` ADD `cf_req_recommend` TINYINT( 4 ) NOT NULL AFTER `cf_use_recommend` ;

# 1.0.55 - �Խ��� ���̺��� ���� ������Ʈ��¥ (�Խñ�/�ڸ�Ʈ�� ��ϵ� ��¥)
ALTER TABLE `$g4[board_table]` ADD `bo_modify_datetime` DATETIME NOT NULL ;

# 1.0.55 - db������Ʈ�� ���� config ���̺��� db ���������� �߰� (�ڵ� ���������� �ƴϱ���)
ALTER TABLE `$g4[config_table]` ADD `cf_db_version` INT( 11 ) NOT NULL ;

# 1.0.56 - db Ʃ��
ALTER TABLE `$g4[board_table]` ADD INDEX `gr_id` ( `gr_id` ) ;
ALTER TABLE `$g4[board_table]` ADD INDEX `bo_use_search` ( `bo_use_search` ) ;
ALTER TABLE `$g4[board_table]` ADD INDEX `bo_order_search` ( `bo_order_search` ) ;
ALTER TABLE `$g4[board_file_table]` ADD INDEX `bo_table` ( `bo_table` );
ALTER TABLE `$g4[board_file_table]` ADD INDEX `wr_id` ( `wr_id` );
ALTER TABLE `$g4[board_file_table]` ADD INDEX `bf_no` ( `bf_no` ) ;
#ALTER TABLE `$g4[board_file_table]` ADD INDEX `bf_datetime` ( `bf_datetime` );
ALTER TABLE `$g4[board_new_table]` ADD INDEX `parent_mb_id` ( `parent_mb_id` );
ALTER TABLE `$g4[group_table]` ADD INDEX `gr_use_access` ( `gr_use_access` );
#ALTER TABLE `$g4[member_table]` ADD INDEX `mb_open` ( `mb_open` ) ;

# 1.0.64 - ��������
ALTER TABLE `$g4[config_table]` ADD `cf_use_recycle` TINYINT( 4 ) NOT NULL , ADD `cf_recycle_table` VARCHAR( 255 ) NOT NULL ;
ALTER TABLE `$g4[config_table]` ADD `cf_recycle_days` INT( 11 ) NOT NULL ;
ALTER TABLE `$g4[board_table]` ADD `bo_use_recycle` TINYINT( 4 ) NOT NULL ;

DROP TABLE IF EXISTS `$g4[recycle_table]`;
CREATE TABLE `$g4[recycle_table]` (
  `rc_no` int(11) NOT NULL auto_increment,
  `rc_mb_id` varchar(255) NOT NULL,
  `rc_bo_table` varchar(255) NOT NULL,
  `rc_wr_id` int(11) NOT NULL,
  `rc_wr_parent` int(11) NOT NULL,
  `rc_parent_mb_id` varchar(255) NOT NULL,
  `rc_delete` tinyint(4) NOT NULL,
  `mb_id` varchar(255) NOT NULL,
  `bo_table` varchar(255) NOT NULL,
  `wr_id` int(11) NOT NULL,
  `wr_is_comment` tinyint(4) NOT NULL,
  `bn_id` int(11) NOT NULL,
  `rc_datetime` datetime NOT NULL,
  PRIMARY KEY  (`rc_no`),
  KEY `mb_id` (`mb_id`),
  KEY `bo_table` (`bo_table`),
  KEY `wr_id` (`wr_id`),
  KEY `bn_id` (`bn_id`),
  KEY `wr_is_comment` (`wr_is_comment`),
  KEY `rc_delete` (`rc_delete`),
  KEY `recycle_table` (`rc_bo_table`)
);

# 1.0.66 - �Ű���� ����
ALTER TABLE `$g4[singo_table]` ADD `sg_notes` VARCHAR( 255 ) NOT NULL ;

# 1.0.69 - ��� Ʃ��
ALTER TABLE `$g4[board_good_table]` ADD INDEX `bg_flag` ( `bg_flag` ) ;
ALTER TABLE `$g4[my_menu_table]` ADD INDEX `mb_id2` ( `mb_id` ) ;
ALTER TABLE `$g4[scrap_table]` ADD INDEX `bo_table` ( `bo_table` ) ;
ALTER TABLE `$g4[singo_table]` ADD INDEX `mb_id` ( `mb_id` ) ;

# 1.0.70 - ����4 4.0.26 ����
ALTER TABLE `$g4[member_table]` ADD `mb_memo_unread` INT( 11 ) NOT NULL ; 

# 1.0.73 - �ڸ�Ʈ dhtml ������ ���
ALTER TABLE `$g4[board_table]` ADD `bo_use_dhtml_comment` TINYINT( 4 ) NOT NULL ;

# 1.0.76 - ������ script
DROP TABLE IF EXISTS `$g4[board_file_download_table]`;
CREATE TABLE IF NOT EXISTS `$g4[board_file_download_table]` (
  `dn_id` int(11) NOT NULL AUTO_INCREMENT,
  `bo_table` varchar(20) NOT NULL,
  `wr_id` int(11) NOT NULL,
  `bf_no` int(11) NOT NULL,
  `mb_id` varchar(255) NOT NULL,
  `download_point` int(11) NOT NULL,
  `dn_count` int(11) NOT NULL,
  `dn_datetime` datetime NOT NULL,
  `dn_ip` varchar(255) NOT NULL,
  `gr_id` varchar(20) NOT NULL,
  UNIQUE KEY `dn_id` (`dn_id`),
  KEY `index1` (`bo_table`,`wr_id`),
  KEY `mb_id` (`mb_id`),
  KEY `gr_id` (`gr_id`)
);

# �̹��� �뷮����
ALTER TABLE `$g4[board_table]` ADD `bo_image_info` TINYINT( 4 ) NOT NULL ;
ALTER TABLE `$g4[board_table]` ADD `bo_image_max_size` INT( 11 ) NOT NULL ;

# 1.0.84 - cheditor �̹��� ���ϸ��
DROP TABLE IF EXISTS `$g4[board_cheditor_table]`;
CREATE TABLE IF NOT EXISTS `$g4[board_cheditor_table]` (
  `bo_table` varchar(255) DEFAULT NULL,
  `wr_id` int(11) DEFAULT NULL,
  `bc_url` varchar(255) NOT NULL,
  `bc_dir` varchar(255) NOT NULL,
  `bc_source` varchar(255) NOT NULL,
  `bc_file` varchar(255) NOT NULL,
  `bc_filesize` int(11) NOT NULL,
  `bc_width` int(11) NOT NULL,
  `bc_height` smallint(6) NOT NULL,
  `bc_type` tinyint(4) NOT NULL,
  `bc_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `bo_table` (`bo_table`,`wr_id`)
);

# 1.0.89 - cheditor ���ε� ���
ALTER TABLE `$g4[board_cheditor_table]` ADD `bc_ip` VARCHAR( 255 ) NOT NULL ;
ALTER TABLE `$g4[board_cheditor_table]` ADD `mb_id` VARCHAR( 255 ) NOT NULL ;

# 1.0.89 - ��ü����
DROP TABLE IF EXISTS `$g4[notice_table]`;
CREATE TABLE IF NOT EXISTS `$g4[notice_table]` (
  `no_id` int(11) NOT NULL AUTO_INCREMENT,
  `bo_table` varchar(255) NOT NULL,
  `wr_id` mediumint(11) NOT NULL,
  `no_datetime` datetime NOT NULL,
  PRIMARY KEY (`no_id`)
);

# 1.0.89 - bo_dhtml_editor_level �߰�
ALTER TABLE `$g4[board_table]` 
ADD `bo_dhtml_editor_level` TINYINT( 4 ) NOT NULL AFTER `bo_html_level` ,
ADD `bo_dhtml_editor_level_comment` TINYINT( 4 ) NOT NULL AFTER `bo_dhtml_editor_level` ;

# 1.0.89 - �Լ�~
DROP TABLE IF EXISTS `$g4[whatson_table]`;
CREATE TABLE IF NOT EXISTS `$g4[whatson_table]` (
  `wo_id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(255) NOT NULL,
  `wo_type` varchar(20) NOT NULL,
  `bo_table` varchar(20) NOT NULL,
  `wr_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `wr_subject` varchar(255) NOT NULL,
  `wo_count` tinyint(4) NOT NULL,
  `wo_datetime` datetime NOT NULL,
  `wo_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`wo_id`),
  KEY `mb_id` (`mb_id`),
  KEY `wo_datetime` (`wo_datetime`)
);

# 1.0.92 - ��ü���� �Խ��� ����
ALTER TABLE `$g4[board_table]` ADD `bo_naver_notice` TINYINT( 4 ) NOT NULL DEFAULT '1';

# 1.0.92 - ���� 5 ���׷��̵�
ALTER TABLE `$g4[member_table]` ADD `mb_memo_call_datetime` DATETIME NOT NULL AFTER `mb_memo_call` ;

# 1.0.92 - geoip
DROP TABLE IF EXISTS `$g4[geoip_table]`;
CREATE TABLE IF NOT EXISTS `$g4[geoip_table]` (
  `ip_start` char(15) NOT NULL,
  `ip_end` char(15) NOT NULL,
  `ip32_start` int(10) unsigned NOT NULL,
  `ip32_end` int(10) unsigned NOT NULL,
  `country_code` char(2) NOT NULL,
  `country_full` varchar(50) NOT NULL,
  KEY `ip32` (`ip32_start`,`ip32_end`)
);

# 1.0.93 - ���̵�/��� ã��
ALTER TABLE `$g4[member_table]` ADD `mb_lost_certify` VARCHAR( 255 ) NOT NULL ;

# 1.0.93 - ����
DROP TABLE IF EXISTS `$g4[popular_sum_table]`;
CREATE TABLE IF NOT EXISTS `$g4[popular_sum_table]` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `pp_word` varchar(255) NOT NULL,
  `pp_date` date NOT NULL,
  `pp_count` int(11) NOT NULL,
  `pp_level` tinyint(4) NOT NULL,
  `bo_table` varchar(255) NOT NULL,
  PRIMARY KEY (`pp_id`),
  KEY `pp_index` (`pp_word`,`pp_date`),
  KEY `pp_level` (`pp_level`),
  KEY `bo_table` (`bo_table`)
);

DROP TABLE IF EXISTS `$g4[filter_table]`;
CREATE TABLE IF NOT EXISTS `$g4[filter_table]` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `pp_word` varchar(255) NOT NULL,
  `pp_level` tinyint(4) NOT NULL DEFAULT '1',
  `pp_datetime` datetime NOT NULL,
  PRIMARY KEY (`pp_id`),
  KEY `pp_word` (`pp_word`)
);

# 1.0.94 - �Ű����� ���̺�
DROP TABLE IF EXISTS `$g4[unsingo_table]`;
CREATE TABLE IF NOT EXISTS `$g4[unsingo_table]` (
  `unsg_id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(20) NOT NULL DEFAULT '',
  `bo_table` varchar(20) NOT NULL DEFAULT '',
  `wr_id` int(11) NOT NULL DEFAULT '0',
  `wr_parent` int(11) NOT NULL DEFAULT '0',
  `unsg_mb_id` varchar(20) NOT NULL DEFAULT '',
  `unsg_reason` varchar(255) NOT NULL DEFAULT '',
  `unsg_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `unsg_ip` varchar(255) NOT NULL DEFAULT '',
  `unsg_notes` varchar(255) NOT NULL,
  PRIMARY KEY (`unsg_id`),
  KEY `fk1` (`bo_table`,`wr_id`),
  KEY `fk2` (`bo_table`,`wr_parent`),
  KEY `mb_id` (`mb_id`)
);

# 1.0.94 - chimage �ɼ�ȭ
ALTER TABLE `$g4[board_table]` ADD `bo_chimage` TINYINT( 4 ) NOT NULL ;

# 1.0.94 - chimage ���̺� ����
ALTER TABLE `$g4[board_cheditor_table]` ADD INDEX `mb_id` (`mb_id`) ;
ALTER TABLE `$g4[board_cheditor_table]` ADD `del` TINYINT( 4 ) NOT NULL ;
ALTER TABLE `$g4[board_cheditor_table]` ADD `bc_id` INT( 11) NOT NULL AUTO_INCREMENT PRIMARY KEY ;
ALTER TABLE `$g4[board_cheditor_table]` ADD `wr_session` VARCHAR( 255 ) NOT NULL ;
ALTER TABLE `$g4[board_cheditor_table]` ADD INDEX `wr_session` ( `wr_session` ) ;
ALTER TABLE `$g4[board_cheditor_table]` ADD INDEX `bc_file` ( `bc_file` ) ;

# 1.0.94 - �ӽ����� ���̺�
DROP TABLE IF EXISTS `$g4[tempsave_table]`;
CREATE TABLE IF NOT EXISTS `$g4[tempsave_table]` (
  `tmp_id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(255) NOT NULL,
  `bo_table` varchar(255) NOT NULL,
  `wr_id` int(11) NOT NULL,
  `wr_subject` varchar(255) NOT NULL,
  `wr_content` text NOT NULL,
  `wr_datetime` datetime NOT NULL,
  `ip_addr` varchar(255) NOT NULL,
  `wr_session` varchar(255) NOT NULL,
  PRIMARY KEY (`tmp_id`),
  KEY `mb_id` (`mb_id`),
  KEY `wr_session` (`wr_session`),
  KEY `bo_table` (`bo_table`)
);

# 1.0.95 - visit log ���̺� ����
ALTER TABLE `$g4[login_table]` ADD `lo_referer` TEXT NOT NULL , ADD `lo_agent` VARCHAR( 255 ) NOT NULL;


# 1.0.99 - ��������
ALTER TABLE `$g4[board_table]` ADD `bo_realcheck` TINYINT( 4 ) NOT NULL ;

CREATE TABLE IF NOT EXISTS `g4_namecheck` (
  `cb_id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(255) NOT NULL,
  `mb_jumin` varchar(255) NOT NULL,
  `mb_name` varchar(255) NOT NULL,
  `cb_ip` varchar(255) NOT NULL,
  `cb_datetime` datetime NOT NULL,
  `cb_returncode` tinyint(4) NOT NULL,
  PRIMARY KEY (`cb_id`),
  KEY `mb_id` (`mb_id`)
);

CREATE TABLE IF NOT EXISTS `g4_realcheck` (
  `cb_id` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(255) NOT NULL,
  `cb_ip` varchar(255) NOT NULL,
  `cb_datetime` datetime NOT NULL,
  `cb_authtype` char(1) NOT NULL,
  `cb_errorcode` char(4) NOT NULL,
  PRIMARY KEY (`cb_id`),
  KEY `mb_id` (`mb_id`)
);

ALTER TABLE `$g4[board_table]` ADD `bo_list_good` INT( 11 ) NOT NULL  ;
ALTER TABLE `$g4[board_table]` ADD `bo_list_nogood` INT( 11 ) NOT NULL ;
ALTER TABLE `$g4[board_table]` ADD `bo_list_view` INT( 11 ) NOT NULL  ;
ALTER TABLE `$g4[board_table]` ADD `bo_list_comment` INT( 11 ) NOT NULL  ;

CREATE TABLE IF NOT EXISTS `g4_good_list` (
  `gl_id` int(11) NOT NULL AUTO_INCREMENT,
  `gr_id` varchar(255) NOT NULL,
  `bo_table` varchar(255) NOT NULL,
  `wr_id` int(11) NOT NULL,
  `wr_datetime` datetime NOT NULL,
  `gl_datetime` datetime NOT NULL,
  `good` mediumint(11) NOT NULL,
  `nogood` int(11) NOT NULL,
  `hit` int(11) NOT NULL,
  `comment` int(11) NOT NULL,
  PRIMARY KEY (`gl_id`),
  KEY `bo_table` (`bo_table`),
  KEY `hit` (`hit`),
  KEY `comment` (`comment`),
  KEY `good` (`good`),
  KEY `wr_datetime` (`wr_datetime`),
  KEY `gr_id` (`gr_id`)
);

# 1.0.100 - ���̳ʽ� ����Ʈ ���б� ����
ALTER TABLE `$g4[board_table]` ADD `bo_read_point_lock` TINYINT( 4) NOT NULL ;

# 1.1.01 - �ߺ����� ����
ALTER TABLE `$g4[board_table]` ADD `bo_notice_joongbok` TINYINT( 4 ) NOT NULL ;

# 1.1.02 - ����Ʈ�ۿ� mb_id ���� �߰�
 ALTER TABLE `$g4[good_list_table]` ADD `mb_id` VARCHAR( 255 ) NOT NULL ;
 
# 1.1.02 - ����Ʈ�ۿ� unique index �߰�
ALTER TABLE `$g4[good_list_table]` ADD UNIQUE `unique` (`bo_table` ,`wr_id`) ;

# 1.1.03 - �α�ۿ� �������� ������� �ʰ� �ϱ�
ALTER TABLE `$g4[popular_sum_table]` ADD `mb_info` TINYINT( 4) NOT NULL ;
ALTER TABLE `$g4[popular_sum_table]` ADD INDEX `mb_info` (`mb_info`)  ;

# 1.1.04 - db_cache
CREATE TABLE IF NOT EXISTS `$g4[cache_table]` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) NOT NULL,
  `c_text` text NOT NULL,
  `c_datetime` datetime NOT NULL,
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `c_name` (`c_name`)
);

# 1.1.05 - search
ALTER TABLE $g4[board_table] ADD `bo_search_level` TINYINT( 4) NOT NULL ;

# 1.1.07 - ��õ, ����, ȸ������ ��õ
ALTER TABLE `$g4[member_table]` ADD `mb_good` INT( 11 ) NOT NULL , ADD `mb_nogood` INT( 11 ) NOT NULL ;
ALTER TABLE `$g4[session_table]` CHANGE `id` `ss_id` VARCHAR( 32);
ALTER TABLE `$g4[session_table]` CHANGE `ss_data` `ss_data` TEXT  ;
ALTER TABLE `$g4[session_table]` ADD INDEX `ss_datetime` (`ss_datetime`);

DROP TABLE IF EXISTS `$g4[member_suggest_table]`;
CREATE TABLE IF NOT EXISTS `$g4[member_suggest_table]` (
  `join_no` int(11) NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(255) NOT NULL,
  `mb_hp` varchar(255) NOT NULL,
  `mb_email` varchar(255) NOT NULL,
  `suggest_datetime` datetime NOT NULL,
  `join_hp` varchar(255) NOT NULL,
  `join_email` varchar(255) NOT NULL,
  `join_code` varchar(255) NOT NULL,
  `join_datetime` datetime NOT NULL,
  `join_mb_id` varchar(255) NOT NULL,
  `email_certify` varchar(255) NOT NULL,
  PRIMARY KEY (`join_no`),
  KEY `mb_id` (`mb_id`),
  KEY `email_certify` (`email_certify`)
);

# ����Ʈ�� �����ϴ� keyword�� ���� �� ���� �Խñ�
DROP TABLE IF EXISTS `$g4[seo_tag_table]`;
CREATE TABLE IF NOT EXISTS `$g4[seo_tag_table]` (
            `tag_id` int(11) NOT NULL AUTO_INCREMENT,
            `tag_name` varchar(255) NOT NULL,
            `tag_date` date NOT NULL,
            `bo_table` varchar(20) NOT NULL,
            `wr_id` int(11) NOT NULL,
            `count` int(11) NOT NULL,
            PRIMARY KEY (`tag_id`),
            UNIQUE KEY `unique_key` (`tag_name`,`bo_table`,`wr_id`)
          ) ;

# ����Ʈ�� �����ϴ� agent�� ��
DROP TABLE IF EXISTS `$g4[seo_server_table]`;
CREATE TABLE IF NOT EXISTS `$g4[seo_server_table]` (
            `server_id` int(11) NOT NULL AUTO_INCREMENT,
            `server_name` varchar(255) NOT NULL,
            `server_date` date NOT NULL,
            `count` int(11) NOT NULL,
            PRIMARY KEY (`server_id`),
            UNIQUE KEY `server` (`server_name`,`server_date`)
          ) ;

# History
DROP TABLE IF EXISTS `$g4[seo_history_table]`;
CREATE TABLE IF NOT EXISTS `$g4[seo_history_table]` (
            `seo_id` int(11) NOT NULL AUTO_INCREMENT,
            `seo_datetime` datetime NOT NULL,
            `server_name` varchar(255) NOT NULL,
            `tag_name` varchar(255) NOT NULL,
            `bo_table` varchar(255) NOT NULL,
            `wr_id` int(11) NOT NULL,
            PRIMARY KEY (`seo_id`),
            KEY `server_name` (`server_name`),
            KEY `bo_table` (`bo_table`),
            KEY `tag_name` (`tag_name`)
          ) ;

# �������� ��3�� ���� �׸� �߰�
ALTER TABLE `g4_config_reg` ADD `cf_privacy_5` TEXT NOT NULL ;

# �������� ��3�� ����, �����Ź ���� ���� �ޱ�
ALTER TABLE `$g4[member_table]` ADD `mb_agree_3rd_pty` TINYINT( 4) NOT NULL ;

# �Խ��Ǻ� ��õ, ����õ ����Ʈ
ALTER TABLE `$g4[board_table]` ADD `bo_good_point` INT( 11 ) NOT NULL ;
ALTER TABLE `$g4[board_table]` ADD `bo_nogood_point` INT( 11 ) NOT NULL ;

# 1.1.07 - wr_mb_id �ʵ� �߰� - ��õ�� ���� �۾���
ALTER TABLE `$g4[board_good_table]` ADD `wr_mb_id` VARCHAR( 255 ) NOT NULL;
ALTER TABLE `$g4[board_good_table]` ADD INDEX `wr_mb_id` ( `wr_mb_id` );