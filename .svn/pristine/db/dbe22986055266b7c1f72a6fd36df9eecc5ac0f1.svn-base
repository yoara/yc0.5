/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : yc

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2013-08-24 22:43:11
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `blog`
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  `short_content` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `label` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `blog_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `read_time` int(11) DEFAULT '0',
  `reply_time` int(11) DEFAULT '0',
  `audtor` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of blog
-- ----------------------------
INSERT INTO `blog` VALUES ('0', 'gggg', '<!DOCTYPE html>\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n &lt;meta http-equiv=\"Content-Type\" c /&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n<p>dhasdfvawseflkhsadlkifhibcasufhbvaiuksjfsdafa</p>\r\n&lt;/body&gt;\r\n&lt;/html&gt;', 'asdfhaswetwgasdgas...', '杂文;fghjk;ddd;', '2013-08-24 21:55:31', '0', '0', 'yoara');
INSERT INTO `blog` VALUES ('10', '测试博文', '<!DOCTYPE html>\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n &lt;meta http-equiv=\"Content-Type\" c /&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n<p>无内容fffff</p>\r\n&lt;/body&gt;\r\n&lt;/html&gt;', '测试短序，很长很长很长的的顶顶顶顶顶顶顶顶顶顶得得得得得得得得得得得得得得得顶顶顶顶顶顶顶顶得得得得得得得得得得得得得得得顶顶顶顶顶顶顶顶得得得得得得得得得得得得得得得...', '杂文;测试;4444;', '2013-08-24 16:31:53', '0', '0', 'yoara');
INSERT INTO `blog` VALUES ('11', '测试博文', '无内容', '测试短序，很长很长很长的的顶顶顶顶顶顶顶顶顶顶得得得得得得得得得得得得得得得顶顶顶顶顶顶顶顶得得得得得得得得得得得得得得得顶顶顶顶顶顶顶顶得得得得得得得得得得得得得得得', '杂文;测试;', '2013-08-22 21:18:54', '0', '0', 'yoara');
INSERT INTO `blog` VALUES ('15', 'fff', '<!DOCTYPE html>\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n &lt;meta http-equiv=\"Content-Type\" c /&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n<p>asdfagasg</p>\r\n&lt;/body&gt;\r\n&lt;/html&gt;', 'fff', '杂文;asf;', '2013-08-24 22:34:49', '22', '0', 'yoara');

-- ----------------------------
-- Table structure for `blog_pic`
-- ----------------------------
DROP TABLE IF EXISTS `blog_pic`;
CREATE TABLE `blog_pic` (
  `pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `pic_url` varchar(0) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`pic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of blog_pic
-- ----------------------------

-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('0584dd05f297e2b347204701a08c7157', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.57 Safari/537.36', '1377355262', '');
INSERT INTO `ci_sessions` VALUES ('5480821b0d0f41d158d102a9e0075ea3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.57 Safari/537.36', '1377333023', 'a:2:{s:12:\"session_name\";s:5:\"yoara\";s:20:\"session_login_status\";b:1;}');

-- ----------------------------
-- Table structure for `label`
-- ----------------------------
DROP TABLE IF EXISTS `label`;
CREATE TABLE `label` (
  `name` varchar(200) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `contain_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of label
-- ----------------------------
INSERT INTO `label` VALUES ('4444', '2');
INSERT INTO `label` VALUES ('asf', '1');
INSERT INTO `label` VALUES ('cccccc', '1');
INSERT INTO `label` VALUES ('dd', '1');
INSERT INTO `label` VALUES ('ddd', '3');
INSERT INTO `label` VALUES ('ffggg', '1');
INSERT INTO `label` VALUES ('fghjk', '5');
INSERT INTO `label` VALUES ('hhhhh', '0');
INSERT INTO `label` VALUES ('大王', '2');
INSERT INTO `label` VALUES ('小妹', '1');
INSERT INTO `label` VALUES ('杂文', '14');
INSERT INTO `label` VALUES ('测试', '4');

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_content` text CHARACTER SET utf8 NOT NULL,
  `message_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `message_email` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `parent_message` int(11) DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `message_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', '1', '1', '1', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('2', '1', '2', '1', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('3', '1', '3', '2', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('4', '1', '4', '3', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('5', '1', '5', '4', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('6', '1', '6', '5', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('7', '1', '7', '65', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('8', '1', '8', '6', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('9', '1', '9', '7', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('10', '1', '10', '88', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('11', '1', '11', '9', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('12', '1', '12', '9', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('13', '1', '13', '2', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('14', '1', '14', '34', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('15', '1', '15', '53', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('16', '1', '16', '46', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('17', '1', '17', '3', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('18', '1', '18', '73', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('19', '1', '19', '47', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('20', '1', '20', '34', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('21', '1', '21', '7', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('22', '1', '22', '8', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('23', '1', '23', '8', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('24', '', '24', '9', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('25', 'aa', 'aa', 'aa', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('26', 'asdf', 'gasdg', 'asdg', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('27', 'gaga', 'sa', 'asdg', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('28', 'asdghasdh', 'sa', 'asdg', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('29', 'asdghasdhasdhasdh', 'sa', 'asdg', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('30', '11111111', '1', '1', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('31', '2222', '2', '2', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('32', '333', '3', '3', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('33', 'adfag', 'aa', 'aa', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('34', '123123', '14', '41', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('35', '?', '1', '1', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('36', '@1  aaaaa', '1', '1', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('37', '@1 asdafasg', '1', '1', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('38', 'aaaaa', 'anyone', 'any@mail', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('39', 'aaaa', 'anyone', 'any@mail', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('40', 'sdfasdfsad', 'anyone', 'any@mail', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('41', '123123123', 'anyone', 'any@mail', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('42', '@anyone? asaggg', 'anyone', 'any@mail', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('43', '@anyone： 撒的发生', 'anyone', 'any@mail', null, null, '2013-08-20 23:26:42');
INSERT INTO `message` VALUES ('44', 'asd', 'ff', 'ff', null, null, '2013-08-24 15:31:35');
INSERT INTO `message` VALUES ('45', 'asfasf', 'ff', 'ff', null, null, '2013-08-24 15:31:42');
INSERT INTO `message` VALUES ('46', 'ff', 'ff', 'ff', null, null, '2013-08-24 15:34:57');
INSERT INTO `message` VALUES ('47', 'fff', 'ff', 'ff', null, null, '2013-08-24 15:35:01');
INSERT INTO `message` VALUES ('48', '噶甩灯歌', 'aa', 'aa', null, null, '2013-08-24 15:38:59');
INSERT INTO `message` VALUES ('49', '好事儿啊', 'yoara', 'yoara@126.com', null, '15', '2013-08-24 22:31:42');
INSERT INTO `message` VALUES ('50', 'fasdfds', 'yoara', 'yoara@126.com', null, null, '2013-08-24 22:35:31');

-- ----------------------------
-- Table structure for `picture`
-- ----------------------------
DROP TABLE IF EXISTS `picture`;
CREATE TABLE `picture` (
  `ID` int(10) NOT NULL AUTO_INCREMENT COMMENT '程流id',
  `URL` varchar(256) CHARACTER SET utf8 NOT NULL COMMENT '服务器存储url',
  `PIC_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '上传时间',
  `MEMO` text CHARACTER SET utf8 COMMENT '简介',
  `AUDTOR` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '作者',
  `PRODUCT_ID` int(10) DEFAULT NULL COMMENT '从属于其他产品的产品ID，如果该值为空，则是纯图片作品',
  `IS_PRODUCT_PIC` varchar(1) DEFAULT NULL COMMENT '是否产品主图片，Y是，N不是',
  `PICTURE_NAME` varchar(250) CHARACTER SET utf8 DEFAULT NULL COMMENT '图片名',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of picture
-- ----------------------------
INSERT INTO `picture` VALUES ('1', '111.jpg', '2013-08-19 20:55:35', '没什么好介绍啦', 'yoara', null, null, '111');
INSERT INTO `picture` VALUES ('2', '200.jpg', '2013-08-19 20:55:35', '没什么好介绍啦', 'yoara', null, null, '200');
INSERT INTO `picture` VALUES ('3', '201.jpg', '2013-08-19 20:55:35', '没什么好介绍啦', 'yoara', null, null, '201');
INSERT INTO `picture` VALUES ('6', 'xiong_01.jpg', '2013-08-19 20:55:35', '没什么好介绍啦', 'yoara', null, null, 'xiong_01');
INSERT INTO `picture` VALUES ('7', '毕业证.jpg', '2013-08-19 21:02:12', '简单介绍', 'yoara', '1', 'Y', '安啦');

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `memo` text CHARACTER SET utf8,
  `audtor` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `product_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `short_memo` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `pro_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '上传时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '二级.jpg', '没什么好介绍啦', 'yoara', '安啦', '简单介绍', '2013-08-19 21:02:12');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('ciara', '8023');
INSERT INTO `user` VALUES ('yoara', '8023');
