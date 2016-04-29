/*
Navicat MySQL Data Transfer

Source Server         : dc-khoyao
Source Server Version : 50505
Source Host           : 192.168.1.253:3306
Source Database       : hmis

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-04-28 14:49:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `_user`
-- ----------------------------
DROP TABLE IF EXISTS `_user`;
CREATE TABLE `_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE,
  UNIQUE KEY `password_reset_token` (`password_reset_token`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of _user
-- ----------------------------
INSERT INTO `_user` VALUES ('1', 'admin', '-iY62s3St99BwI_S8NAuHo0AOHjoLQ5A', '$2y$13$hoP.N5DPg7fN/lL68GE/COChFoSlCkM7DUWquuw5ze6Ask0slJrU.', 'D4gRmTOMyvEoGgEnDlt28KNI0UbbJrzd_1450427689', 'wichian.joe@gmail.com', '10', '1448804355', '1450427689');

-- ----------------------------
-- Table structure for `appstore`
-- ----------------------------
DROP TABLE IF EXISTS `appstore`;
CREATE TABLE `appstore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL COMMENT 'ชื่อโปรแกรม',
  `detail` varchar(200) NOT NULL COMMENT 'รายละเอียด',
  `img` text COMMENT 'รูปภาพ',
  `visit` int(11) DEFAULT NULL COMMENT 'จำนวนการใช้งาน',
  `status` tinyint(1) NOT NULL COMMENT 'สถานะ',
  `create_date` datetime DEFAULT NULL COMMENT 'วันบันทึก',
  `modify_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันปรับปรุง',
  `created_by` int(11) DEFAULT NULL COMMENT 'บันทึกโดย',
  `updated_by` int(11) DEFAULT NULL COMMENT 'อับเดทโดย',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of appstore
-- ----------------------------
INSERT INTO `appstore` VALUES ('1', 'รายงานอุบัติการณ์ความเสี่ยง', 'รายงานอุบัติการณ์ความเสี่ยง', '0c34762f87bea2a12237feea595ac698.png', null, '1', '2015-12-19 00:00:00', '2016-01-01 00:26:23', '1', '1');
INSERT INTO `appstore` VALUES ('2', 'บันทึกการปฏิบัติงาน', 'ระบบบันทึกการปฏิบัติงานออนไลน์', '', null, '1', '2015-12-19 00:00:00', '2015-12-19 15:13:59', '1', '1');
INSERT INTO `appstore` VALUES ('3', 'ขอรายงานสาธารณสุข', 'ขอรายงานสาธารณสุข', '', null, '1', '2015-12-19 00:00:00', '2015-12-19 15:14:11', '1', '1');
INSERT INTO `appstore` VALUES ('4', 'จองห้องประชุมออนไลน์', 'จองห้องประชุมออนไลน์', '', null, '1', '2015-12-19 00:00:00', '2015-12-19 15:14:53', '1', '1');
INSERT INTO `appstore` VALUES ('5', 'ขอใช้รถยนต์ออนไลน์', 'ขอใช้รถยนต์ออนไลน์', '', null, '1', '2015-12-19 00:00:00', '2015-12-19 15:15:06', '1', '1');
INSERT INTO `appstore` VALUES ('6', 'ระบบเอกสารอิเล็กทรอนิกส์', 'ระบบเอกสารอิเล็กทรอนิกส์', '', null, '1', '2015-12-19 00:00:00', '2015-12-19 15:15:17', '1', '1');

-- ----------------------------
-- Table structure for `auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('Admin', '6', '1451116274');
INSERT INTO `auth_assignment` VALUES ('Manager', '4', '1451123615');
INSERT INTO `auth_assignment` VALUES ('SystemAdmin', '1', '1451116037');
INSERT INTO `auth_assignment` VALUES ('User', '7', '1451123601');

-- ----------------------------
-- Table structure for `auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`) USING BTREE,
  KEY `idx-auth_item-type` (`type`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/*', '2', null, null, null, '1451115973', '1451115973');
INSERT INTO `auth_item` VALUES ('/department/*', '2', null, null, null, '1451116143', '1451116143');
INSERT INTO `auth_item` VALUES ('/gii/*', '2', null, null, null, '1451540073', '1451540073');
INSERT INTO `auth_item` VALUES ('/gridview/*', '2', null, null, null, '1451126808', '1451126808');
INSERT INTO `auth_item` VALUES ('/hospital/*', '2', null, null, null, '1451116151', '1451116151');
INSERT INTO `auth_item` VALUES ('/hosxpwarning/*', '2', null, null, null, '1457681279', '1457681279');
INSERT INTO `auth_item` VALUES ('/oppp/*', '2', null, null, null, '1451126951', '1451126951');
INSERT INTO `auth_item` VALUES ('/personal/*', '2', null, null, null, '1451116156', '1451116156');
INSERT INTO `auth_item` VALUES ('/qof/*', '2', null, null, null, '1451126984', '1451126984');
INSERT INTO `auth_item` VALUES ('/right/right/index', '2', null, null, null, '1451128154', '1451128154');
INSERT INTO `auth_item` VALUES ('/right/right/view', '2', null, null, null, '1451128154', '1451128154');
INSERT INTO `auth_item` VALUES ('/site/*', '2', null, null, null, '1451116369', '1451116369');
INSERT INTO `auth_item` VALUES ('/user/*', '2', null, null, null, '1451116191', '1451116191');
INSERT INTO `auth_item` VALUES ('/user/profile/*', '2', null, null, null, '1451117258', '1451117258');
INSERT INTO `auth_item` VALUES ('/user/recovery/*', '2', null, null, null, '1451117280', '1451117280');
INSERT INTO `auth_item` VALUES ('/user/security/*', '2', null, null, null, '1451117324', '1451117324');
INSERT INTO `auth_item` VALUES ('/user/settings/*', '2', null, null, null, '1451117874', '1451117874');
INSERT INTO `auth_item` VALUES ('/workrecord/*', '2', null, null, null, '1452411196', '1452411196');
INSERT INTO `auth_item` VALUES ('Admin', '1', 'ผู้ดูแลระบบของหน่วยงาน', null, null, '1451116236', '1451116236');
INSERT INTO `auth_item` VALUES ('Manager', '1', 'ผู้บริหาร', null, null, '1451117434', '1451117434');
INSERT INTO `auth_item` VALUES ('SystemAdmin', '1', 'ผู้ดูแลระบบหลัก', null, null, '1451116025', '1451116025');
INSERT INTO `auth_item` VALUES ('User', '1', 'ผู้ใช้งานทั่วไป', null, null, '1451117504', '1451117504');

-- ----------------------------
-- Table structure for `auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('Admin', '/department/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/hospital/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/personal/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/site/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user/*');
INSERT INTO `auth_item_child` VALUES ('Manager', '/user/profile/*');
INSERT INTO `auth_item_child` VALUES ('Manager', '/user/recovery/*');
INSERT INTO `auth_item_child` VALUES ('Manager', '/user/security/*');
INSERT INTO `auth_item_child` VALUES ('SystemAdmin', '/*');
INSERT INTO `auth_item_child` VALUES ('SystemAdmin', '/gii/*');
INSERT INTO `auth_item_child` VALUES ('User', '/gridview/*');
INSERT INTO `auth_item_child` VALUES ('User', '/oppp/*');
INSERT INTO `auth_item_child` VALUES ('User', '/personal/*');
INSERT INTO `auth_item_child` VALUES ('User', '/qof/*');
INSERT INTO `auth_item_child` VALUES ('User', '/right/right/index');
INSERT INTO `auth_item_child` VALUES ('User', '/right/right/view');
INSERT INTO `auth_item_child` VALUES ('User', '/site/*');
INSERT INTO `auth_item_child` VALUES ('User', '/user/profile/*');
INSERT INTO `auth_item_child` VALUES ('User', '/user/recovery/*');
INSERT INTO `auth_item_child` VALUES ('User', '/user/security/*');
INSERT INTO `auth_item_child` VALUES ('User', '/user/settings/*');
INSERT INTO `auth_item_child` VALUES ('User', '/workrecord/*');

-- ----------------------------
-- Table structure for `auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `department`
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `depart_id` int(3) NOT NULL AUTO_INCREMENT,
  `depart_name` varchar(150) NOT NULL COMMENT 'ชื่อแผนก',
  `depart_group_id` int(2) DEFAULT NULL COMMENT 'รหัสฝ่าย',
  `create_date` datetime DEFAULT NULL COMMENT 'วันบันทึก',
  `modify_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันปรับปรุง',
  `created_by` int(11) DEFAULT NULL COMMENT 'บันทึกโดย',
  `updated_by` int(11) DEFAULT NULL COMMENT 'อับเดทโดย',
  PRIMARY KEY (`depart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('1', 'ผู้ป่วยนอก OPD', '3', '2015-12-19 16:36:31', '2016-01-01 00:04:37', '1', '1');
INSERT INTO `department` VALUES ('2', 'ผู้ป่วยใน IPD', '3', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('3', 'ห้องคลอด LR', '3', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('4', 'อุบัติเหตุฉุกเฉิน ER', '3', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('5', 'คลินกพิเศษ', '3', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('6', 'LAB', '4', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('7', 'X-Ray', '4', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('8', 'ห้องยา Rx', '7', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('9', 'ทันตกรรม DENT', '6', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('10', 'เวชปฏิบัติครอบครัวและชุมชน PCU', '5', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('11', 'ห้องบัตร', '3', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('12', 'ศูนย์ประกัน', '2', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('13', 'ศูนย์คุณภาพ', '3', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('14', 'องค์กรแพทย์', '1', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('15', 'สำนักการพยาบาล', '3', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('16', 'โรงครัว', '2', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('17', 'จ่ายกลาง', '2', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('18', 'ซักฟอก', '2', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('19', 'บริหาร', '2', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('20', 'สารสนเทศ IT', '2', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('21', 'ช่าง', '2', '2015-12-19 16:36:31', '2016-01-01 00:06:11', '1', '1');
INSERT INTO `department` VALUES ('22', 'พัสดุ', '2', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('23', 'การเงิน', '2', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('24', 'ธุรการ', '2', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('25', 'ยานพาหนะ', '2', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('26', 'ประชาสัมพันธ์', '2', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('27', 'งานสวน', '2', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');
INSERT INTO `department` VALUES ('28', 'รักษาความปลอดภัย (ยาม)', '2', '2015-12-19 16:36:31', '2015-12-19 16:36:53', '1', '1');

-- ----------------------------
-- Table structure for `department_group`
-- ----------------------------
DROP TABLE IF EXISTS `department_group`;
CREATE TABLE `department_group` (
  `depart_group_id` int(2) NOT NULL AUTO_INCREMENT,
  `depart_group_name` varchar(255) NOT NULL COMMENT 'ชื่อฝ่าย',
  `create_date` datetime DEFAULT NULL COMMENT 'วันบันทึก',
  `modify_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันปรับปรุง',
  `created_by` int(11) DEFAULT NULL COMMENT 'บันทึกโดย',
  `updated_by` int(11) DEFAULT NULL COMMENT 'อับเดทโดย',
  PRIMARY KEY (`depart_group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department_group
-- ----------------------------
INSERT INTO `department_group` VALUES ('1', 'องค์กรแพทย์', '2015-12-19 16:44:11', '2016-01-01 00:05:37', '1', '1');
INSERT INTO `department_group` VALUES ('2', 'ฝ่ายบริหาร', '2015-12-19 16:44:11', '2015-12-19 16:44:11', '1', '1');
INSERT INTO `department_group` VALUES ('3', 'ฝ่ายการพยาบาล', '2015-12-19 16:44:11', '2015-12-19 16:44:11', '1', '1');
INSERT INTO `department_group` VALUES ('4', 'เทคนิคการแพทย์', '2015-12-19 16:44:11', '2015-12-19 16:44:11', '1', '1');
INSERT INTO `department_group` VALUES ('5', 'ศูยน์เวชปฏิบัติครอบครัวและชุมชน', '2015-12-19 16:44:11', '2015-12-19 16:44:11', '1', '1');
INSERT INTO `department_group` VALUES ('6', 'ทันตกรรม', '2015-12-19 16:44:11', '2015-12-19 16:44:11', '1', '1');
INSERT INTO `department_group` VALUES ('7', 'เภสัชกรรม', '2015-12-19 16:44:11', '2015-12-19 16:44:11', '1', '1');

-- ----------------------------
-- Table structure for `hospital`
-- ----------------------------
DROP TABLE IF EXISTS `hospital`;
CREATE TABLE `hospital` (
  `hos_id` int(11) NOT NULL AUTO_INCREMENT,
  `hos_code` varchar(5) NOT NULL COMMENT 'รหัสสถานพยาบาล',
  `hos_name` varchar(150) NOT NULL COMMENT 'ชื่อโรงพยาบาล',
  `hos_address` varchar(200) NOT NULL COMMENT 'ที่อยู่',
  `hos_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทรสำนักงาน',
  `hos_phone` varchar(11) DEFAULT NULL COMMENT 'เบอร์โทรมือถือ',
  `hos_fax` varchar(10) DEFAULT NULL COMMENT 'แฟกซ์',
  `hos_email` varchar(200) DEFAULT NULL COMMENT 'อีเมล์',
  `hos_website` text COMMENT 'เว็บไซต์',
  `hos_active_code` text NOT NULL COMMENT 'รหัสยืนยัน',
  `create_date` datetime DEFAULT NULL COMMENT 'วันบันทึก',
  `modify_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันปรับปรุง',
  `created_by` int(11) DEFAULT NULL COMMENT 'บันทึกโดย',
  `updated_by` int(11) DEFAULT NULL COMMENT 'อับเดทโดย',
  PRIMARY KEY (`hos_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hospital
-- ----------------------------
INSERT INTO `hospital` VALUES ('1', '11347', 'โรงพยาบาลเกาะยาวชัยพัฒน์', '52 ม.2 ต.เกาะยาวน้อย อ.เกาะยาว จ.พังงา 82160', '076-597119', '087-2888200', '065-597119', 'hospital11347@gmail.com', 'http://kohyaohos.pngo.moph.go.th', '123456789', '2015-12-19 00:00:00', '2016-01-01 00:07:24', '1', '1');

-- ----------------------------
-- Table structure for `l_bloodgroup`
-- ----------------------------
DROP TABLE IF EXISTS `l_bloodgroup`;
CREATE TABLE `l_bloodgroup` (
  `bloodgroup_id` varchar(1) CHARACTER SET utf8 NOT NULL,
  `bloodgroup_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'กรุ๊ปเลือด',
  PRIMARY KEY (`bloodgroup_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of l_bloodgroup
-- ----------------------------
INSERT INTO `l_bloodgroup` VALUES ('1', 'A');
INSERT INTO `l_bloodgroup` VALUES ('2', 'B');
INSERT INTO `l_bloodgroup` VALUES ('3', 'AB');
INSERT INTO `l_bloodgroup` VALUES ('4', 'O');

-- ----------------------------
-- Table structure for `l_education`
-- ----------------------------
DROP TABLE IF EXISTS `l_education`;
CREATE TABLE `l_education` (
  `education_id` varchar(1) CHARACTER SET utf8 NOT NULL,
  `education_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT 'การศึกษา',
  PRIMARY KEY (`education_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of l_education
-- ----------------------------
INSERT INTO `l_education` VALUES ('1', 'ประถมศึกษา');
INSERT INTO `l_education` VALUES ('2', 'มัธยมศึกษาตอนต้น');
INSERT INTO `l_education` VALUES ('3', 'มัธยมศึกษาตอนปลาย');
INSERT INTO `l_education` VALUES ('4', 'อนุปริญญา');
INSERT INTO `l_education` VALUES ('5', 'ปริญญาตรี');
INSERT INTO `l_education` VALUES ('6', 'ปริญญาโท');
INSERT INTO `l_education` VALUES ('7', 'ปริญญาเอก');
INSERT INTO `l_education` VALUES ('8', 'ไม่ทราบ');

-- ----------------------------
-- Table structure for `l_labgroup`
-- ----------------------------
DROP TABLE IF EXISTS `l_labgroup`;
CREATE TABLE `l_labgroup` (
  `lab_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `lab_group_name` varchar(250) DEFAULT NULL COMMENT 'กลุ่มแลป',
  PRIMARY KEY (`lab_group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of l_labgroup
-- ----------------------------
INSERT INTO `l_labgroup` VALUES ('1', 'HEMATOLOGY');
INSERT INTO `l_labgroup` VALUES ('2', 'CHEMISTRY');
INSERT INTO `l_labgroup` VALUES ('3', 'IMMUNOLOGY');
INSERT INTO `l_labgroup` VALUES ('4', 'MICROBIOLOGY');
INSERT INTO `l_labgroup` VALUES ('5', 'MICROSCOPY');
INSERT INTO `l_labgroup` VALUES ('6', 'OTHER');

-- ----------------------------
-- Table structure for `l_link`
-- ----------------------------
DROP TABLE IF EXISTS `l_link`;
CREATE TABLE `l_link` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'แหล่งดาวน์โหลด',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of l_link
-- ----------------------------
INSERT INTO `l_link` VALUES ('1', 'โปรแกรม hosxp');
INSERT INTO `l_link` VALUES ('2', 'อีเมล์');
INSERT INTO `l_link` VALUES ('3', 'ftp server');
INSERT INTO `l_link` VALUES ('4', 'เว็บไซต์');

-- ----------------------------
-- Table structure for `l_marrystatus`
-- ----------------------------
DROP TABLE IF EXISTS `l_marrystatus`;
CREATE TABLE `l_marrystatus` (
  `marrystatus_id` varchar(1) CHARACTER SET utf8 NOT NULL,
  `marrystatus_name` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'สถานภาพ',
  PRIMARY KEY (`marrystatus_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of l_marrystatus
-- ----------------------------
INSERT INTO `l_marrystatus` VALUES ('1', 'โสด');
INSERT INTO `l_marrystatus` VALUES ('2', 'สมรส');
INSERT INTO `l_marrystatus` VALUES ('3', 'หม้าย');
INSERT INTO `l_marrystatus` VALUES ('4', 'หย่า');
INSERT INTO `l_marrystatus` VALUES ('5', 'ร้าง');
INSERT INTO `l_marrystatus` VALUES ('6', 'สมณะ');

-- ----------------------------
-- Table structure for `l_persontype`
-- ----------------------------
DROP TABLE IF EXISTS `l_persontype`;
CREATE TABLE `l_persontype` (
  `persontype_id` varchar(1) CHARACTER SET utf8 NOT NULL COMMENT 'สถานะ',
  `persontype_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`persontype_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of l_persontype
-- ----------------------------
INSERT INTO `l_persontype` VALUES ('1', 'ทำงานปกติ');
INSERT INTO `l_persontype` VALUES ('2', 'ลาศึกษาต่อ');
INSERT INTO `l_persontype` VALUES ('3', 'ช่วยราชการ');
INSERT INTO `l_persontype` VALUES ('4', 'พักราชการ');
INSERT INTO `l_persontype` VALUES ('5', 'ลาทำพิธีทางศาสนา');
INSERT INTO `l_persontype` VALUES ('6', 'ลาออก');
INSERT INTO `l_persontype` VALUES ('7', 'ให้ออก');

-- ----------------------------
-- Table structure for `l_pname`
-- ----------------------------
DROP TABLE IF EXISTS `l_pname`;
CREATE TABLE `l_pname` (
  `pname_id` varchar(2) CHARACTER SET utf8 NOT NULL,
  `pname_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`pname_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of l_pname
-- ----------------------------
INSERT INTO `l_pname` VALUES ('01', 'นาย');
INSERT INTO `l_pname` VALUES ('02', 'นางสาว');
INSERT INTO `l_pname` VALUES ('03', 'นาง');
INSERT INTO `l_pname` VALUES ('04', 'นายแพทย์');
INSERT INTO `l_pname` VALUES ('05', 'แพทย์หญิง');
INSERT INTO `l_pname` VALUES ('06', 'ทันตแพทย์');
INSERT INTO `l_pname` VALUES ('07', 'ทันตแพทย์หญิง');
INSERT INTO `l_pname` VALUES ('08', 'ดอกเตอร์');
INSERT INTO `l_pname` VALUES ('09', 'ผู้ช่วยศาสตราจารย์');
INSERT INTO `l_pname` VALUES ('10', 'รองศาสตราจารย์');
INSERT INTO `l_pname` VALUES ('11', 'ศาสตราจารย์');
INSERT INTO `l_pname` VALUES ('12', 'เภสัชกรชาย');
INSERT INTO `l_pname` VALUES ('13', 'เภสัชกรหญิง');
INSERT INTO `l_pname` VALUES ('14', 'ศาสตราจารย์ดอกเตอร์');

-- ----------------------------
-- Table structure for `l_position`
-- ----------------------------
DROP TABLE IF EXISTS `l_position`;
CREATE TABLE `l_position` (
  `position_id` varchar(2) CHARACTER SET utf8 NOT NULL,
  `position_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'ตำแหน่ง',
  PRIMARY KEY (`position_id`),
  KEY `ix_name` (`position_name`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of l_position
-- ----------------------------
INSERT INTO `l_position` VALUES ('01', 'แพทย์');
INSERT INTO `l_position` VALUES ('02', 'ทันตแพทย์');
INSERT INTO `l_position` VALUES ('03', 'เภสัชกร');
INSERT INTO `l_position` VALUES ('04', 'พยาบาลเทคนิค');
INSERT INTO `l_position` VALUES ('05', 'พยาบาลวิชาชีพ');
INSERT INTO `l_position` VALUES ('06', 'ผู้ช่วยทันตแพทย์');
INSERT INTO `l_position` VALUES ('07', 'จพ.เภสัชกรรม');
INSERT INTO `l_position` VALUES ('08', 'เทคนิคการแพทย์');
INSERT INTO `l_position` VALUES ('09', 'เจ้าหน้าที่กายภาพ');
INSERT INTO `l_position` VALUES ('10', 'ผู้ช่วยข้างเก้าอี้ทันตกรรม');
INSERT INTO `l_position` VALUES ('11', 'แพทย์แผนไทย');
INSERT INTO `l_position` VALUES ('12', 'จพ.เวชสถิติ');
INSERT INTO `l_position` VALUES ('13', 'นักจัดการทั่วไป');
INSERT INTO `l_position` VALUES ('14', 'จพ.การเงิน');
INSERT INTO `l_position` VALUES ('15', 'จพ.ธุรการ');
INSERT INTO `l_position` VALUES ('16', 'จพ.วิทยาศาสตร์การแพทย์');
INSERT INTO `l_position` VALUES ('17', 'จพ.สถิติ');
INSERT INTO `l_position` VALUES ('18', 'เจ้าหน้าที่การเงิน');
INSERT INTO `l_position` VALUES ('19', 'เจ้าหน้าที่ประชาสัมพันธ์');
INSERT INTO `l_position` VALUES ('20', 'จพ.รังสีการแพทย์');
INSERT INTO `l_position` VALUES ('21', 'เจ้าหน้าที่บันทึกข้อมูล');
INSERT INTO `l_position` VALUES ('22', 'พนักงานรับโทรศัพท์');
INSERT INTO `l_position` VALUES ('23', 'ผู้ช่วยเหลือคนไข้');
INSERT INTO `l_position` VALUES ('24', 'พนักงานเปล');
INSERT INTO `l_position` VALUES ('25', 'คนสวน');
INSERT INTO `l_position` VALUES ('26', 'คนงาน');
INSERT INTO `l_position` VALUES ('27', 'ลูกมือช่าง');
INSERT INTO `l_position` VALUES ('28', 'พนักงานขับรถ');
INSERT INTO `l_position` VALUES ('29', 'พนักงานซักฟอก');
INSERT INTO `l_position` VALUES ('30', 'ผู้ช่วยพยาบาล');
INSERT INTO `l_position` VALUES ('31', 'นักวิชาการสาธารณสุข');
INSERT INTO `l_position` VALUES ('32', 'จพ.สาธารณสุขชุมชน');
INSERT INTO `l_position` VALUES ('33', 'ผู้ช่วยเจ้าหน้าที่อนามัย');
INSERT INTO `l_position` VALUES ('34', 'พนักงานทำความสะอาด');
INSERT INTO `l_position` VALUES ('35', 'จพ.ทันตสาธารณสุข');
INSERT INTO `l_position` VALUES ('36', 'โภชนากร');
INSERT INTO `l_position` VALUES ('37', 'นักศึกษาฝึกงานเภสัชกร');
INSERT INTO `l_position` VALUES ('38', 'นักศึกษาฝึกงานแพทย์');
INSERT INTO `l_position` VALUES ('39', 'นักศึกษาฝึกงานพยาบาล');
INSERT INTO `l_position` VALUES ('40', 'นักวิชาการคอมพิวเตอร์');
INSERT INTO `l_position` VALUES ('41', 'ผู้ช่วยนักวิชาการสาธารณสุข');

-- ----------------------------
-- Table structure for `l_program`
-- ----------------------------
DROP TABLE IF EXISTS `l_program`;
CREATE TABLE `l_program` (
  `program_id` int(2) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of l_program
-- ----------------------------
INSERT INTO `l_program` VALUES ('1', 'hosxp');
INSERT INTO `l_program` VALUES ('2', 'hosxp_pcu');
INSERT INTO `l_program` VALUES ('3', 'jhcis');
INSERT INTO `l_program` VALUES ('4', 'อื่น');

-- ----------------------------
-- Table structure for `l_religion`
-- ----------------------------
DROP TABLE IF EXISTS `l_religion`;
CREATE TABLE `l_religion` (
  `religion_id` varchar(2) CHARACTER SET utf8 NOT NULL COMMENT 'ศาสนา',
  `religion_name` varchar(40) CHARACTER SET utf8 DEFAULT NULL COMMENT 'ศาสนา',
  PRIMARY KEY (`religion_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of l_religion
-- ----------------------------
INSERT INTO `l_religion` VALUES ('01', 'พุทธ');
INSERT INTO `l_religion` VALUES ('02', 'คริสต์');
INSERT INTO `l_religion` VALUES ('03', 'อิสลาม');
INSERT INTO `l_religion` VALUES ('04', 'ฮินดู');
INSERT INTO `l_religion` VALUES ('05', 'ซิกข์');
INSERT INTO `l_religion` VALUES ('06', 'ยิว');
INSERT INTO `l_religion` VALUES ('07', 'เชน');
INSERT INTO `l_religion` VALUES ('08', 'โซโรอัสเตอร์');
INSERT INTO `l_religion` VALUES ('09', 'บาไฮ');
INSERT INTO `l_religion` VALUES ('10', 'ไม่ระบุ');

-- ----------------------------
-- Table structure for `l_report_status`
-- ----------------------------
DROP TABLE IF EXISTS `l_report_status`;
CREATE TABLE `l_report_status` (
  `report_status_id` int(2) NOT NULL AUTO_INCREMENT,
  `report_status_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'สถานะรายงาน',
  PRIMARY KEY (`report_status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of l_report_status
-- ----------------------------
INSERT INTO `l_report_status` VALUES ('1', 'ยังไม่ดำเนินการ');
INSERT INTO `l_report_status` VALUES ('2', 'กำลังดำเนินการ');
INSERT INTO `l_report_status` VALUES ('3', 'ตอบสนองไม่ได้');
INSERT INTO `l_report_status` VALUES ('4', 'ดำเนินการแล้วเสร็จ');

-- ----------------------------
-- Table structure for `l_report_type`
-- ----------------------------
DROP TABLE IF EXISTS `l_report_type`;
CREATE TABLE `l_report_type` (
  `reporttype_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีประเภทรายงาน',
  `reporttype_name` varchar(100) NOT NULL COMMENT 'ชื่อประเภทรายงาน',
  PRIMARY KEY (`reporttype_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of l_report_type
-- ----------------------------
INSERT INTO `l_report_type` VALUES ('1', 'รายงานประจำเดือน');
INSERT INTO `l_report_type` VALUES ('2', 'รายงานประจำปี');
INSERT INTO `l_report_type` VALUES ('3', 'รายงานของหน่วยงาน');
INSERT INTO `l_report_type` VALUES ('4', 'รายงานโรงพยาบาล');
INSERT INTO `l_report_type` VALUES ('5', 'รายงานส่ง สสจ.');
INSERT INTO `l_report_type` VALUES ('6', 'รายงานส่ง สปสช.');
INSERT INTO `l_report_type` VALUES ('7', 'รายงานส่งกระทรวง');
INSERT INTO `l_report_type` VALUES ('8', 'รายงานอื่น');

-- ----------------------------
-- Table structure for `l_sex`
-- ----------------------------
DROP TABLE IF EXISTS `l_sex`;
CREATE TABLE `l_sex` (
  `sex_id` varchar(1) CHARACTER SET utf8 NOT NULL,
  `sex_name` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`sex_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of l_sex
-- ----------------------------
INSERT INTO `l_sex` VALUES ('1', 'ชาย');
INSERT INTO `l_sex` VALUES ('2', 'หญิง');

-- ----------------------------
-- Table structure for `labstore`
-- ----------------------------
DROP TABLE IF EXISTS `labstore`;
CREATE TABLE `labstore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hn` varchar(7) NOT NULL COMMENT 'เลขที่รพ.',
  `lab_number` varchar(5) NOT NULL COMMENT 'เลขที่สั่งแลป',
  `file` text COMMENT 'ไฟล์ใบแลป',
  `token_upload` varchar(100) DEFAULT NULL,
  `lab_group_id` varchar(1) DEFAULT NULL COMMENT 'กลุ่มแลป',
  `note` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ',
  `visit` int(11) DEFAULT NULL COMMENT 'จำนวนการใช้งาน',
  `create_date` date DEFAULT NULL COMMENT 'วันบันทึก',
  `modify_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันปรับปรุง',
  `created_by` int(11) DEFAULT NULL COMMENT 'บันทึกโดย',
  `updated_by` int(11) DEFAULT NULL COMMENT 'อับเดทโดย',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of labstore
-- ----------------------------
INSERT INTO `labstore` VALUES ('3', '0003348', '39110', 'lab_0003348_39110.pdf', 'u8znuLu1FgfeUtGkpMZ6D3', '5', 'aaaaaaaaaaaaa', '3', '2016-03-13', '2016-03-27 15:39:21', '1', '1');
INSERT INTO `labstore` VALUES ('4', '0003348', '39111', 'lab_0003348_39111.pdf', 'zaVmEQ4CxPjvYnPDPxexNg', '4', 'xxxxxxxxxxxx', '1', '2016-03-13', '2016-03-13 15:04:12', '1', '1');
INSERT INTO `labstore` VALUES ('5', '0001348', '39120', 'lab_0001348_39120.pdf', '6BvyQQwHNd8YKrhJ8cqzgz', '1', 'สร้างไฟล์จัดเก็บใบแลป', '1', '2016-03-15', '2016-03-14 15:07:07', '1', '1');

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`) USING BTREE,
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------

-- ----------------------------
-- Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1448804293');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1448804297');
INSERT INTO `migration` VALUES ('m140209_132017_init', '1450537602');
INSERT INTO `migration` VALUES ('m140403_174025_create_account_table', '1450537602');
INSERT INTO `migration` VALUES ('m140504_113157_update_tables', '1450537603');
INSERT INTO `migration` VALUES ('m140504_130429_create_token_table', '1450537603');
INSERT INTO `migration` VALUES ('m140830_171933_fix_ip_field', '1450537603');
INSERT INTO `migration` VALUES ('m140830_172703_change_account_table_name', '1450537603');
INSERT INTO `migration` VALUES ('m141222_110026_update_ip_field', '1450537603');
INSERT INTO `migration` VALUES ('m141222_135246_alter_username_length', '1450537604');
INSERT INTO `migration` VALUES ('m150614_103145_update_social_account_table', '1450537604');
INSERT INTO `migration` VALUES ('m150623_212711_fix_username_notnull', '1450537604');
INSERT INTO `migration` VALUES ('m140602_111327_create_menu_table', '1451103850');
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', '1451103943');

-- ----------------------------
-- Table structure for `personal`
-- ----------------------------
DROP TABLE IF EXISTS `personal`;
CREATE TABLE `personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(4) NOT NULL COMMENT 'รหัสบุคลากร',
  `cid` varchar(17) NOT NULL COMMENT 'เลขบัตรประชาชน',
  `pname_id` varchar(2) NOT NULL COMMENT 'คำนำหน้า',
  `fname` varchar(150) NOT NULL COMMENT 'ชื่อ',
  `lname` varchar(150) NOT NULL COMMENT 'นามสกุล',
  `nickname` varchar(50) NOT NULL COMMENT 'ชื่อเล่น',
  `sex_id` varchar(1) NOT NULL COMMENT 'เพศ',
  `age` varchar(2) NOT NULL COMMENT 'อายุ',
  `religion_id` varchar(2) NOT NULL COMMENT 'ศาสนา',
  `bloodgroup_id` varchar(1) NOT NULL COMMENT 'กรุ๊ปเลือด',
  `marrystatus_id` varchar(1) NOT NULL COMMENT 'สถานภาพการสมรส',
  `birthdate` date NOT NULL COMMENT 'วันเกิด',
  `address1` text NOT NULL COMMENT 'ที่อยู่ตามทะเบียนบ้าน',
  `address2` text COMMENT 'ที่อยู่ปัจจุบัน',
  `phone` varchar(11) NOT NULL COMMENT 'โทรศัพท์มือถือ',
  `email` varchar(100) NOT NULL COMMENT 'อีเมล์',
  `line` varchar(50) DEFAULT NULL COMMENT 'ไลน์ไอดี',
  `facebook` varchar(50) DEFAULT NULL COMMENT 'เฟสบุ๊ค',
  `skill` text COMMENT 'ความสามารถพิเศษ',
  `education_id` varchar(1) DEFAULT NULL COMMENT 'ระดับการศึกษา',
  `img` text COMMENT 'รูปประจำตัว',
  `startwork_date` date NOT NULL COMMENT 'วันเข้าทำงาน',
  `position_id` varchar(2) NOT NULL COMMENT 'ตำแหน่ง',
  `salary` decimal(10,2) DEFAULT '0.00' COMMENT 'เงินเดือน',
  `depart_group_id` varchar(2) NOT NULL COMMENT 'ฝ่าย',
  `depart_id` varchar(3) NOT NULL COMMENT 'แผนก',
  `persontype_id` varchar(1) NOT NULL COMMENT 'สถานของบุคคล',
  `create_date` datetime DEFAULT NULL COMMENT 'วันลงทะเบียน',
  `modify_date` timestamp NULL DEFAULT NULL COMMENT 'วันอับเดท',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`pid`,`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of personal
-- ----------------------------
INSERT INTO `personal` VALUES ('1', '0001', '2-9306-00011-62-1', '01', 'วิเชียร', 'นุ่นศรี', 'โจ', '1', '31', '01', '1', '1', '1984-12-25', '197 ม.4 ต.หารเทา อ.ปากพะยูน จ.พัทลุง 93120', '52/2 ม.1 ต.เกาะยาวน้อย อ.เกาะยาว จ.พังงา 82160', '087-2888200', 'wichain.joe@gmail.com', 'JoeNi', 'Jingjoe', 'Skill: Web Application ,Web Server ,Linux Server ,Windows Server ,MySQL ,Network design ,Computer technical officer ,Graphic design', '5', 'f81652be96106591e40d0f9d9e541da5.jpg', '2013-11-25', '40', '20000.00', '2', '20', '1', '2015-12-31 22:35:36', '2015-12-31 23:22:29', '1', '1');
INSERT INTO `personal` VALUES ('2', '0002', '8-5946-15146-66-1', '02', 'รุ่งทิพย์', 'พลศรี', 'แพร', '2', '27', '01', '4', '1', '1995-10-25', 'aaaaaaaaaa', 'vvvvvvvvvvv', '086-6511951', 'dfasdfdasfdasfd@dfsaf.com', 'fdsf', 'dsfas', 'dfdasf', '4', '60c6a82bd803067ebfb7e83633b40e14.png', '2016-01-01', '30', '17900.00', '3', '15', '1', '2016-01-01 13:40:23', '2016-01-01 23:39:43', '1', '1');

-- ----------------------------
-- Table structure for `profile`
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `gravatar_email` varchar(255) DEFAULT NULL,
  `gravatar_id` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES ('1', 'นายวิเชียร นุ่นศรี', 'wichian.joe@gmail.com', 'wichian.joe@gmail.com', 'bc3cc2cedf30cdda6a3176c3cdfdd806', 'โรงพยาบาลเกาะยาวชัยพัฒน์', 'https://www.kohyaohos.pngo.moph.go.th', 'เปลี่ยนรูปประจำตัวที่ Gravatar.com');
INSERT INTO `profile` VALUES ('2', 'นางสาวรุ่งทิพย์ พลศรี', 'rungtip@hotmail.com', 'rungtip@hotmail.com', '9636ea74ede394ad64697b26cecdf7a2', 'สำนักงานสาธารณสุขอำเภอเกาะยาว', 'http://www.sso.kohyao.go.th', 'สำนักงานสาธารณสุขอำเภอเกาะยาว');
INSERT INTO `profile` VALUES ('3', 'นางสาวรุ่งทิพย์ พลศรี', 'verkon26@hotmail.com', 'verkon26@hotmail.com', '0fce5cfab62b3871e03b31a7d9977ce1', 'สำนักงานสาธารณสุขอำเภอเกาะยาว', 'http://www.sso.kohyao.go.th', '');
INSERT INTO `profile` VALUES ('4', 'นางสาวรุ่งทิพย์ พลศรี', 'verkon26@hotmail.com', 'verkon26@hotmail.com', '0fce5cfab62b3871e03b31a7d9977ce1', 'สำนักงานสาธารณสุขอำเภอเกาะยาว', 'http://www.sso.kohyao.go.th', 'เปลี่ยนรูปประจำตัวที่');
INSERT INTO `profile` VALUES ('6', 'นายทดสอบ การส่งเมล์', 'N.wichian@outlook.com', 'N.wichian@outlook.com', 'fcbedc9b565086f93fc402158587982e', 'พัทลุง', 'http://www.kohyao.go.th', 'เปลี่ยนรูปประจำตัวที่ Gravatar.com');
INSERT INTO `profile` VALUES ('7', 'นายชื่อ ทดสอบ ', 'testting@localhost.com', '', 'd41d8cd98f00b204e9800998ecf8427e', 'สถานที่ทดสอบ', 'http://www.testting.com', '');

-- ----------------------------
-- Table structure for `pttype`
-- ----------------------------
DROP TABLE IF EXISTS `pttype`;
CREATE TABLE `pttype` (
  `pttype_id` int(11) NOT NULL AUTO_INCREMENT,
  `pttype_code` varchar(2) DEFAULT NULL COMMENT 'รหัสสิทธิ',
  `pttype_name` varchar(200) NOT NULL COMMENT 'ชื่อสิทธิ',
  `create_date` datetime DEFAULT NULL COMMENT 'วันบันทึก',
  `modify_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันปรับปรุง',
  `created_by` int(255) DEFAULT NULL COMMENT 'บันทึกโดย',
  `updated_by` int(11) DEFAULT NULL COMMENT 'อับเดทโดย',
  PRIMARY KEY (`pttype_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pttype
-- ----------------------------
INSERT INTO `pttype` VALUES ('1', 'O1', 'O1 : สิทธิเบิกกรมบัญชีกลาง (ข้าราชการ)', '2015-12-19 17:24:32', '2016-01-01 00:41:10', '1', '1');
INSERT INTO `pttype` VALUES ('2', 'O2', 'O2 : สิทธิเบิกกรมบัญชีกลาง (ลูกจ้างประจำ)', '2015-12-19 17:24:32', '2015-12-19 17:24:32', '1', '1');
INSERT INTO `pttype` VALUES ('3', 'O3', 'O3 : สิทธิเบิกกรมบัญชีกลาง (ผู้รับเบี้ยหวัดบำนาญ)', '2015-12-19 17:24:32', '2015-12-19 17:24:32', '1', '1');
INSERT INTO `pttype` VALUES ('4', 'O4', 'O4 : สิทธิเบิกกรมบัญชีกลาง (บุคคลในครอบครัว)', '2015-12-19 17:24:32', '2015-12-19 17:24:32', '1', '1');
INSERT INTO `pttype` VALUES ('5', 'O5', 'O5 : สิทธิเบิกกรมบัญชีกลาง (บุคคลในครอบครัวผู้รับเบี้ยหวัดบำนาญ)', '2015-12-19 17:24:32', '2015-12-19 17:24:32', '1', '1');
INSERT INTO `pttype` VALUES ('6', 'L1', 'L1 : สิทธิ อปท. (ข้าราชการ/พนักงาน/ลูกจ้างประจำ/ครูผู้ดูแลเด็ก/ครูผู้ช่วย)', '2015-12-19 17:24:32', '2015-12-19 17:24:32', '1', '1');
INSERT INTO `pttype` VALUES ('7', 'L2', 'L2 : สิทธิ อปท. (บุคคลในครอบครัว)', '2015-12-19 17:24:32', '2015-12-19 17:24:32', '1', '1');
INSERT INTO `pttype` VALUES ('8', 'L3', 'L3 : สิทธิ อปท. (ผู้รับเบี้ยหวัดบำนาญ)', '2015-12-19 17:24:32', '2015-12-19 17:24:32', '1', '1');
INSERT INTO `pttype` VALUES ('9', 'L4', 'L4 : สิทธิ อปท. (บุคคลในครอบครัวผู้รับเบี้ยหวัดบำนาญ)', '2015-12-19 17:24:32', '2015-12-19 17:24:32', '1', '1');
INSERT INTO `pttype` VALUES ('10', 'L5', 'L5 : สิทธิ อปท. (ข้าราชการการเมือง)', '2015-12-19 17:24:32', '2015-12-19 17:24:32', '1', '1');
INSERT INTO `pttype` VALUES ('11', 'L6', 'L6 : สิทธิ อปท. (บุคคลในครอบครัวข้าราชการการเมือง)', '2015-12-19 17:24:32', '2015-12-19 17:24:32', '1', '1');
INSERT INTO `pttype` VALUES ('12', 'L7', 'L7: สิทธิ อปท.กรณีอุบัติเหตุฉุกเฉิน (ยังไม่ขึ้นทะเบียน)', '2015-12-19 17:24:32', '2015-12-19 17:24:32', '1', '1');
INSERT INTO `pttype` VALUES ('13', 'L9', 'L9 : สิทธิ อปท. (ยังไม่ระบุตำแหน่ง)', '2015-12-19 17:24:32', '2015-12-19 17:24:32', '1', '1');
INSERT INTO `pttype` VALUES ('15', 'NL', 'NL : รอพิสูจน์สิทธิ', '2015-12-19 17:24:32', '2015-12-19 17:24:32', '1', '1');

-- ----------------------------
-- Table structure for `reportonline`
-- ----------------------------
DROP TABLE IF EXISTS `reportonline`;
CREATE TABLE `reportonline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personal_id` int(11) NOT NULL COMMENT 'เลขบุคลากร',
  `pname` varchar(50) DEFAULT NULL,
  `fname` varchar(150) DEFAULT NULL,
  `lname` varchar(150) DEFAULT NULL,
  `depart_group_id` varchar(2) NOT NULL COMMENT 'ฝ่าย',
  `depart_id` varchar(2) NOT NULL COMMENT 'แผนก',
  `reporttype_id` varchar(2) NOT NULL COMMENT 'ประเภทรายงาน',
  `name` varchar(250) NOT NULL COMMENT 'ชื่อรายงาน',
  `details` text NOT NULL COMMENT 'รายละเอียดรายงาน',
  `image` text COMMENT 'หน้าจอบันทึกโปรแกรม',
  `files` text COMMENT 'ตัวอย่างรายงาน',
  `order_date` date NOT NULL COMMENT 'วันขอรายงาน',
  `defined_date` date NOT NULL COMMENT 'วันกำหนดส่ง',
  `unit` decimal(2,0) NOT NULL DEFAULT '0' COMMENT 'จำนวนรายงาน',
  `link_id` varchar(2) NOT NULL COMMENT 'ดาวน์โหลดรายงาน',
  `finish_date` date DEFAULT NULL COMMENT 'วันแล้วเสร็จ',
  `report_status_id` varchar(2) DEFAULT NULL COMMENT 'สถานะการขอ',
  `create_date` datetime DEFAULT NULL COMMENT 'วันบันทึก',
  `modify_date` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันอับเดท',
  `created_by` int(11) DEFAULT NULL COMMENT 'บันทึกโดย',
  `updated_by` int(11) DEFAULT NULL COMMENT 'อับเดทโดย',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reportonline
-- ----------------------------
INSERT INTO `reportonline` VALUES ('1', '1', null, null, null, '2', '20', '1', 'กกกกกกกกกกกกกกกกกก', 'ขขขขขขขขขขขขขขขขขขขข', '87d9cc9a512ab11cffc318e9f325c247.png,806c04e7c18a4eff86885a799ceb54dc.png,a67be4c3c2976bb8095f9ebbf4319d1c.png,afaf6f8ea2ebc9f6173ada3192aebf80.png', '58db14e1de603fce3823f529e14db904.pdf', '2016-01-04', '2016-01-07', '1', '1', '2016-03-14', '1', '2016-01-04 00:26:51', '2016-03-15 15:36:13', '1', '1');
INSERT INTO `reportonline` VALUES ('2', '2', null, null, null, '3', '1', '3', 'ขขขขขขขขขขขขขขขขขขขขขขขขขขขขขขข', 'กดหฟกด่กหาฟ่ด่กหฟ่ดากหฟ่งดกหยด', '', '', '2016-01-06', '2016-01-13', '2', '2', '2016-01-04', '3', '2016-01-04 00:47:07', '2016-01-05 00:16:06', '1', '1');
INSERT INTO `reportonline` VALUES ('3', '2', null, null, null, '4', '6', '3', 'vxvxzxxzczxc', 'zxcxzxzvcxvcxvxvxvxxzvx', 'b6c0b2a474ff67d61bbf6014d631a065.jpg', 'e88ed7d5d55f43b8aab3a2ed572fc212.docx', '2016-01-04', '2016-01-11', '10', '4', '2016-01-04', '1', '2016-01-04 21:41:12', '2016-03-12 14:26:28', null, null);
INSERT INTO `reportonline` VALUES ('4', '1', null, null, null, '2', '20', '6', 'ssssssssssssssssssssssss', 'ffffffffffffffff', '2d00baaa1ffd7a75c3040ac3d151ad84.png,4cb28e8b4c2f2b9c104650f8fbe7a173.png,2e9a7b0a38bc8c9ed405335271c7947f.png', '4722f26f61c92951a722905b6ce05c83.pdf', '2016-01-04', '2016-01-04', '1', '1', '2016-01-04', '1', '2016-01-04 21:53:41', '2016-03-12 14:26:33', '1', null);
INSERT INTO `reportonline` VALUES ('5', '2', null, null, null, '7', '8', '4', 'gggggggggggggggggg', 'gjjjjjjjjjjjjjjjjj', '', '', '2016-01-04', '2016-01-11', '1', '1', '2016-01-04', '1', '2016-01-04 21:55:42', '2016-01-04 21:55:42', '1', '1');

-- ----------------------------
-- Table structure for `right`
-- ----------------------------
DROP TABLE IF EXISTS `right`;
CREATE TABLE `right` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hn` varchar(7) NOT NULL COMMENT 'HN',
  `cid` varchar(17) NOT NULL COMMENT 'เลข13หลัก',
  `fullname` varchar(100) NOT NULL COMMENT 'ชื่อนามสกุล',
  `regdate` date NOT NULL COMMENT 'วันขึ้นทะเบียน',
  `dateaffect` date NOT NULL COMMENT 'วันใช้สิทธิ',
  `pttype_id` varchar(2) NOT NULL COMMENT 'ประเภทสิทธิ',
  `create_date` datetime DEFAULT NULL COMMENT 'วันบันทึก',
  `modify_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันปรับปรุง',
  `created_by` int(255) DEFAULT NULL COMMENT 'บันทึกโดย',
  `updated_by` int(11) DEFAULT NULL COMMENT 'อับเดทโดย',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of right
-- ----------------------------

-- ----------------------------
-- Table structure for `social_account`
-- ----------------------------
DROP TABLE IF EXISTS `social_account`;
CREATE TABLE `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text,
  `code` varchar(32) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`) USING BTREE,
  UNIQUE KEY `account_unique_code` (`code`) USING BTREE,
  KEY `fk_user_account` (`user_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of social_account
-- ----------------------------

-- ----------------------------
-- Table structure for `sqlscript`
-- ----------------------------
DROP TABLE IF EXISTS `sqlscript`;
CREATE TABLE `sqlscript` (
  `sql_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(2) DEFAULT NULL COMMENT 'โปรแกรม',
  `sql_name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'ชื่อ sql',
  `sql_script` text CHARACTER SET utf8 COMMENT 'คำสั่ง sql',
  `files` text CHARACTER SET utf8 COMMENT 'ไฟล์แนบ',
  `token_upload` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL COMMENT 'วันบันทึก',
  `modify_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันอับเดท',
  `created_by` int(11) DEFAULT NULL COMMENT 'บันทึกโดย',
  `updated_by` int(11) DEFAULT NULL COMMENT 'อับเดทโดย',
  PRIMARY KEY (`sql_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of sqlscript
-- ----------------------------
INSERT INTO `sqlscript` VALUES ('1', '3', 'ประชากรกลุ่มเป้าหมายอายุ 60 ปีขึ้นไปคัดกรองตาต้อกระจก', '# by ลุงหนวด หมออนามัย\r\n# ประชากรกลุ่มเป้าหมายอายุ60ปีขึ้นไปคัดกรองตาต้อกระจก\r\n# ==================;\r\nSELECT person.pid\r\n,CONCAT_WS(\'-\',substring(idcard,1,1),substring(idcard,2,4),substring(idcard,6,5),substring(idcard,11,2),substring(idcard,13,1))AS idcardd\r\n,CONCAT(ctitle.titlename,\' \',person.fname,\' \',person.lname) AS pname\r\n,CONCAT(DATE_FORMAT(person.birth,\'%d-%m-\'),DATE_FORMAT(person.birth,\'%Y\')+543) AS tbirth\r\n,YEAR( FROM_DAYS( DATEDIFF( NOW( ) ,person.birth ) ) ) AS age\r\n,person.hnomoi\r\n,SUBSTRING(house.villcode,7,2) AS villno\r\nFROM person\r\nLEFT JOIN ctitle ON person.prename = ctitle.titlecode\r\nLEFT JOIN persondeath ON person.pcucodeperson = persondeath.pcucodeperson AND person.pid = persondeath.pid\r\nLEFT JOIN house ON house.pcucode = person.pcucodeperson AND house.hcode = person.hcode\r\nLEFT JOIN village ON village.pcucode = house.pcucode AND village.villcode = house.villcode\r\nWHERE persondeath.pid IS NULL\r\nAND getAgeYearNum (birth,CURDATE()) >= 60\r\nAND person.typelive in (\'0\',\'1\',\'3\')\r\nAND right((house.villcode),2) != 00\r\nORDER BY villno,hnomoi*1;\r\n', 'e268fc4ddbdbc9ea5c2ad74b2655f24d.pdf', 'hr5tFMgZZPIXrZ_DG5fO0E', '3', '2016-01-03 14:31:33', '2016-03-12 14:29:22', null, null);
INSERT INTO `sqlscript` VALUES ('2', '1', 'รายงานการบันทึกกิจกรรมทางการพยาบาลแผนกผู้ป่วยใน', 'รายงานการบันทึกกิจกรรมทางการพยาบาลแผนกผู้ป่วยใน', '18a59a1614daafbe7ed3b40b15da60e5.cds', 'XL9xr7G4ihJb8mnUYmsqKh', '5', '2016-01-03 15:34:31', '2016-03-12 14:30:11', '1', null);

-- ----------------------------
-- Table structure for `token`
-- ----------------------------
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of token
-- ----------------------------
INSERT INTO `token` VALUES ('1', 'G9xaVSwVaLgfg_Gb5GOIPDYIV-v5L0Lr', '1450538624', '0');
INSERT INTO `token` VALUES ('4', 'nVBXUXBq2EZjlqMVYhBXMPI96zGEWBGZ', '1450587558', '0');
INSERT INTO `token` VALUES ('3', 'MtW1DfjCq8Y22MCUzlZwO-gjaOxCOSl1', '1450585419', '0');
INSERT INTO `token` VALUES ('3', 'U0yHUYnf55_ZcxBcL7VAtOSxnhRRJ0b4', '1450586940', '1');
INSERT INTO `token` VALUES ('5', 'mt599UpUhWSj3bvxl2FijtN9lytHxGSf', '1450587984', '0');
INSERT INTO `token` VALUES ('7', 'peOWDIPc1RQ05HP2NsgYeY3BDq-zaEE9', '1451123403', '0');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_email` (`email`) USING BTREE,
  UNIQUE KEY `user_unique_username` (`username`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'wichian.joe@gmail.com', '$2y$12$BrJmDe7OI93op4JqXaIc8e0.bbE7K7OoLEOtc8CwUjT8P4264lQfW', 'UtjIRYhluvVkY9lPcQS1mRKc69n9DZhw', '1450539002', null, null, '::1', '1450538624', '1457780073', '0');
INSERT INTO `user` VALUES ('6', 'wichian', 'N.wichian@outlook.com', '$2y$12$1rROGbc2Ba0Zq1eRYpEJ4Oqlgxbhki8a2By8xa6vI1C.YOQmHrFHm', '3ErKKcO6QdWZFVi23xHxw5Buht8o62Y5', '1450588477', null, '1457857642', '::1', '1450588386', '1450588386', '0');
INSERT INTO `user` VALUES ('4', 'rungtip', 'verkon26@hotmail.com', '$2y$12$ZAZPUxvWfRDhgZK.4uFp7OxDwFBQ6VW/bmBJe2LOQ1HEKxXB1XhHu', 'qjbq290oTpl-loCOqkwqQ4VHbovbjth3', '1450588788', null, '1457857638', '::1', '1450587558', '1451118026', '0');
INSERT INTO `user` VALUES ('7', 'user', 'user@localhost.com', '$2y$12$UKF.s/uoHpMwaLX0mLkaSOVGie.4LowLVXBl8lLOQ2p22qeZ2mh2W', 'rk6CpUna9UN9kz5HJ_zmmMpKMxybXkjs', '1451123403', null, '1457857636', '::1', '1451123403', '1451140491', '0');

-- ----------------------------
-- Table structure for `workrecord`
-- ----------------------------
DROP TABLE IF EXISTS `workrecord`;
CREATE TABLE `workrecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL COMMENT 'ชื่องาน',
  `detail` text COMMENT 'รายละเอียดงาน',
  `order_date` date NOT NULL COMMENT 'วันหมอบหมาย',
  `defined_date` date NOT NULL COMMENT 'วันแล้วเสร็จ',
  `create_date` datetime DEFAULT NULL COMMENT 'วันบันทึก',
  `modify_date` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันอับเดท',
  `created_by` int(11) DEFAULT NULL COMMENT 'บันทึกโดย',
  `updated_by` int(11) DEFAULT NULL COMMENT 'อับเดทโดย',
  `assign_id` int(11) DEFAULT NULL COMMENT 'ชื่อผู้มอบหมาย',
  `status_id` int(2) NOT NULL COMMENT 'สถานะ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of workrecord
-- ----------------------------
INSERT INTO `workrecord` VALUES ('14', 'บันทึกการปฏิบัติงาน', 'hgfhgfhfhfghfhffds', '2016-01-01', '2016-01-12', '2016-01-10 15:43:12', '2016-01-10 15:43:12', '7', '7', '2', '1');
INSERT INTO `workrecord` VALUES ('2', 'Create Workrecord', 'รายละเอียดงาน Create Workrecord', '2016-01-10', '2016-01-18', '2016-01-10 14:28:24', '2016-01-24 21:12:03', '1', '1', '1', '4');
INSERT INTO `workrecord` VALUES ('3', 'vvvvvvvvvvvvvv', 'รายละเอียดงาน  dddddddddddddddd dfsgdgdgdasf', '2016-01-10', '2016-01-17', '2016-01-10 14:35:04', '2016-01-10 15:36:08', '7', '7', '1', '1');
INSERT INTO `workrecord` VALUES ('15', 'kgpofk;gdjgjadklg\'daih', 'fdfdsajfkadsjkfdsf', '2016-01-10', '2016-01-19', '2016-01-10 16:08:42', '2016-01-10 16:08:42', '1', '1', '2', '1');
INSERT INTO `workrecord` VALUES ('5', 'fdsafdsafdsaf', 'fdsafdsafdasf', '2016-01-15', '2016-01-21', '2016-01-10 15:09:30', '2016-01-10 15:09:30', '1', '1', '1', '1');
INSERT INTO `workrecord` VALUES ('6', 'fdsfsdafdasfds', 'fdfsdafadsfdasf', '2016-01-21', '2016-01-10', '2016-01-10 15:09:41', '2016-01-10 15:09:41', '1', '1', '1', '1');
INSERT INTO `workrecord` VALUES ('7', 'fdsfdsfdsfdsfhkh', 'hgjggfh', '2016-01-28', '2016-01-11', '2016-01-10 15:09:53', '2016-01-10 15:33:04', '1', '1', '2', '4');
INSERT INTO `workrecord` VALUES ('8', 'fsdfdsafdshgjhjh', 'jhkuykhkhjkhk', '2016-01-15', '2016-01-19', '2016-01-10 15:10:03', '2016-01-10 15:10:03', '1', '1', '1', '1');
INSERT INTO `workrecord` VALUES ('9', 'rrydsfgdgdd', 'oipiuouyiytu', '2016-01-07', '2016-01-18', '2016-01-10 15:10:15', '2016-01-10 15:10:15', '1', '1', '1', '1');
INSERT INTO `workrecord` VALUES ('10', 'qqqqqqqqqqq', 'gggggggggg', '2016-01-21', '2016-01-17', '2016-01-10 15:10:26', '2016-01-10 15:10:26', '1', '1', '2', '1');
INSERT INTO `workrecord` VALUES ('11', 'fdgfdfhgfhgf', 'uiouiouioui', '2016-01-16', '2016-01-19', '2016-01-10 15:10:41', '2016-01-10 15:10:41', '1', '1', '2', '1');
INSERT INTO `workrecord` VALUES ('12', 'aaaaaaaaaaaa', 'gggggggggggggggggg', '2016-01-09', '2016-01-10', '2016-01-10 15:10:53', '2016-01-10 15:10:53', '1', '1', '2', '1');
INSERT INTO `workrecord` VALUES ('13', 'llllllllllllll', 'lljghjghfh', '2016-01-15', '2016-01-20', '2016-01-10 15:11:03', '2016-01-10 15:33:16', '1', '1', '2', '3');
