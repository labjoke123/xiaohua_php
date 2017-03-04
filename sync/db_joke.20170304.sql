/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Version : 50547
 Source Host           : 127.0.01
 Source Database       : db_joke

 Target Server Version : 50547
 File Encoding         : utf-8

 Date: 03/04/2017 18:05:45 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `joke_app_version`
-- ----------------------------
DROP TABLE IF EXISTS `joke_app_version`;
CREATE TABLE `joke_app_version` (
  `version_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `version_sn` varchar(32) NOT NULL COMMENT '用户序列号',
  `app_id` varchar(32) NOT NULL,
  `channel` varchar(128) NOT NULL,
  `version_name` varchar(128) DEFAULT NULL,
  `version_code` varchar(32) NOT NULL,
  `version_info` text,
  `update_type` smallint(6) DEFAULT NULL,
  `download_url` varchar(128) NOT NULL,
  `is_del` tinyint(2) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`version_id`,`version_sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户基础表\n';

-- ----------------------------
--  Table structure for `joke_audio`
-- ----------------------------
DROP TABLE IF EXISTS `joke_audio`;
CREATE TABLE `joke_audio` (
  `audio_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `audio_sn` varchar(32) NOT NULL,
  `audio_name` varchar(64) NOT NULL COMMENT '音频名称',
  `audio_title` varchar(128) NOT NULL COMMENT '音频Title',
  `is_origin` tinyint(4) NOT NULL COMMENT '是否原创音频',
  `is_pub` tinyint(4) NOT NULL DEFAULT '0' COMMENT '发布状态',
  `user_id` bigint(20) NOT NULL,
  `text_id` bigint(20) NOT NULL,
  `is_del` tinyint(4) DEFAULT '0',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  `audio_type` char(16) DEFAULT NULL COMMENT '音频格式（后缀）',
  `audio_duration` int(11) DEFAULT NULL COMMENT '音频时长',
  `audio_icon` varchar(255) DEFAULT NULL COMMENT '音频icon',
  `audio_url` varchar(255) DEFAULT NULL COMMENT '音频地址',
  `audio_intro` varchar(255) DEFAULT NULL COMMENT '音频描述',
  PRIMARY KEY (`audio_id`,`audio_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='音频信息表';

-- ----------------------------
--  Table structure for `joke_audio_stats`
-- ----------------------------
DROP TABLE IF EXISTS `joke_audio_stats`;
CREATE TABLE `joke_audio_stats` (
  `count_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `count_sn` varchar(32) NOT NULL,
  `audio_id` bigint(20) NOT NULL,
  `play_num` int(11) DEFAULT '0',
  `praise_num` int(11) DEFAULT '0',
  `collect_num` int(11) DEFAULT '0',
  `is_delete` tinyint(4) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`count_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `joke_collect_audio`
-- ----------------------------
DROP TABLE IF EXISTS `joke_collect_audio`;
CREATE TABLE `joke_collect_audio` (
  `collect_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `collect_sn` varchar(32) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `audio_id` bigint(20) NOT NULL,
  `is_delete` tinyint(4) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`collect_id`,`collect_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `joke_comment_audio`
-- ----------------------------
DROP TABLE IF EXISTS `joke_comment_audio`;
CREATE TABLE `joke_comment_audio` (
  `comment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `comment_sn` varchar(32) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `audio_id` bigint(20) NOT NULL,
  `comment_content` text NOT NULL,
  `is_delete` tinyint(4) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`comment_id`,`comment_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `joke_play_audio`
-- ----------------------------
DROP TABLE IF EXISTS `joke_play_audio`;
CREATE TABLE `joke_play_audio` (
  `play_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `play_sn` varchar(32) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `audio_id` bigint(20) NOT NULL,
  `is_delete` tinyint(4) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`play_id`,`play_sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `joke_praise_audio`
-- ----------------------------
DROP TABLE IF EXISTS `joke_praise_audio`;
CREATE TABLE `joke_praise_audio` (
  `praise_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `praise_sn` varchar(32) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `audio_id` bigint(20) NOT NULL,
  `praise_level` text NOT NULL,
  `is_delete` tinyint(4) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`praise_id`,`praise_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `joke_share_audio`
-- ----------------------------
DROP TABLE IF EXISTS `joke_share_audio`;
CREATE TABLE `joke_share_audio` (
  `share_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `share_sn` varchar(32) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `audio_id` bigint(20) NOT NULL,
  `is_delete` tinyint(4) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`share_id`,`share_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `joke_suggest`
-- ----------------------------
DROP TABLE IF EXISTS `joke_suggest`;
CREATE TABLE `joke_suggest` (
  `suggest_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `suggest_sn` varchar(32) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `content` text NOT NULL,
  `is_delete` tinyint(4) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  `is_reply` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`suggest_id`,`suggest_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `joke_system_message`
-- ----------------------------
DROP TABLE IF EXISTS `joke_system_message`;
CREATE TABLE `joke_system_message` (
  `mess_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mess_sn` varchar(32) NOT NULL,
  `trigger_user_id` bigint(20) NOT NULL,
  `target_user_id` bigint(20) NOT NULL,
  `mess_type` smallint(8) NOT NULL COMMENT '1 点赞 2 收藏',
  `audio_id` bigint(20) DEFAULT '0',
  `text_id` bigint(20) DEFAULT '0',
  `is_delete` tinyint(4) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  `mess_content` text NOT NULL,
  PRIMARY KEY (`mess_id`,`mess_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `joke_text`
-- ----------------------------
DROP TABLE IF EXISTS `joke_text`;
CREATE TABLE `joke_text` (
  `text_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `text_sn` varchar(32) NOT NULL,
  `text_title` varchar(128) NOT NULL COMMENT '笑话标题',
  `is_origin` tinyint(4) NOT NULL COMMENT '是否原创',
  `is_pub` tinyint(4) NOT NULL DEFAULT '0' COMMENT '发布状态',
  `user_id` bigint(20) NOT NULL,
  `is_del` tinyint(4) DEFAULT '0' COMMENT '删除状态',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  `text_author` varchar(32) DEFAULT NULL COMMENT '笑话作者',
  `text_labels` varchar(128) DEFAULT NULL COMMENT '笑话标签',
  `text_intro` varchar(255) DEFAULT NULL COMMENT '笑话简介',
  `text_content` text COMMENT '笑话完整内容',
  PRIMARY KEY (`text_id`,`text_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='文本笑话表';

-- ----------------------------
--  Table structure for `joke_text_stats`
-- ----------------------------
DROP TABLE IF EXISTS `joke_text_stats`;
CREATE TABLE `joke_text_stats` (
  `count_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `count_sn` varchar(32) NOT NULL,
  `text_id` bigint(20) NOT NULL,
  `speak_num` int(11) NOT NULL COMMENT '笑话标题',
  `is_del` tinyint(4) DEFAULT '0' COMMENT '删除状态',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`count_id`,`count_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='文本笑话表';

-- ----------------------------
--  Table structure for `joke_third_user`
-- ----------------------------
DROP TABLE IF EXISTS `joke_third_user`;
CREATE TABLE `joke_third_user` (
  `third_user_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `third_user_sn` varchar(64) NOT NULL COMMENT '用户序列号',
  `identifier` varchar(256) NOT NULL,
  `user_info` text,
  `type` smallint(6) NOT NULL DEFAULT '0' COMMENT '0 自有 1 微信 2 QQ 3 微博 4 豆瓣 ',
  `is_del` tinyint(4) DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`third_user_id`,`third_user_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户基础表\n';

-- ----------------------------
--  Table structure for `joke_user`
-- ----------------------------
DROP TABLE IF EXISTS `joke_user`;
CREATE TABLE `joke_user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `user_sn` varchar(64) NOT NULL COMMENT '用户序列号',
  `is_del` tinyint(4) DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `user_name` varchar(64) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `age` smallint(6) DEFAULT NULL,
  `gender` smallint(6) DEFAULT NULL,
  `profile` mediumtext,
  `portrait` varchar(256) DEFAULT NULL,
  `address` mediumtext,
  `phone` varchar(32) DEFAULT NULL,
  `type` smallint(6) NOT NULL DEFAULT '0' COMMENT '0 自有 1 微信 2 QQ 3 微博 4 豆瓣 ',
  `third_user_id` bigint(20) DEFAULT '0',
  PRIMARY KEY (`user_id`,`user_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=1000007 DEFAULT CHARSET=utf8 COMMENT='用户基础表\n';

SET FOREIGN_KEY_CHECKS = 1;
