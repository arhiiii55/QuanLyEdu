/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : educationdb

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 22/11/2021 07:05:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account_user
-- ----------------------------
DROP TABLE IF EXISTS `account_user`;
CREATE TABLE `account_user`  (
  `id_account` int(6) NOT NULL AUTO_INCREMENT,
  `ten_taikhoan` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mk_taikhoan` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(1) NOT NULL,
  `phone` int(10) NOT NULL,
  `ngaytao_tk` date NOT NULL,
  PRIMARY KEY (`id_account`) USING BTREE,
  INDEX `fk_account_id_role`(`role_id`) USING BTREE,
  CONSTRAINT `fk_account_id_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of account_user
-- ----------------------------
INSERT INTO `account_user` VALUES (1, 'admin@gmail.com', '123456', 3, 201234567, '2021-06-03');
INSERT INTO `account_user` VALUES (2, 'quanly@113', '123456', 2, 638126380, '2021-06-03');
INSERT INTO `account_user` VALUES (3, 'phamanhanh@113', '61075805', 3, 32372939, '2021-07-01');
INSERT INTO `account_user` VALUES (5, 'thanhpham@edu.com.vn', '123456', 2, 834050599, '2021-11-01');
INSERT INTO `account_user` VALUES (7, 'Phampham@gmail.com', '123456', 2, 834050599, '2021-05-05');
INSERT INTO `account_user` VALUES (9, 'anhtuan@gmail.com', '123456', 2, 0, '2021-05-05');
INSERT INTO `account_user` VALUES (10, 'anhanhpham@gmail.com', '123456', 3, 834050599, '2021-05-05');

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner`  (
  `id_banner` int(6) NOT NULL,
  `img_B` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngayhienthi` datetime(0) NOT NULL,
  `ghichu` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(6) NOT NULL,
  PRIMARY KEY (`id_banner`) USING BTREE,
  INDEX `account_id`(`account_id`) USING BTREE,
  CONSTRAINT `banner_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account_user` (`id_account`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for bill
-- ----------------------------
DROP TABLE IF EXISTS `bill`;
CREATE TABLE `bill`  (
  `id_bill` int(6) NOT NULL AUTO_INCREMENT,
  `total` int(10) NOT NULL,
  `sale_id` int(6) NOT NULL,
  `fee_id` int(6) NOT NULL,
  `student_id` int(6) NOT NULL,
  `tinhtrang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngaylap_hd` date NOT NULL,
  PRIMARY KEY (`id_bill`) USING BTREE,
  INDEX `fk_bill_id_sale`(`sale_id`) USING BTREE,
  INDEX `fk_bill_id_fee`(`fee_id`) USING BTREE,
  INDEX `fk_bill_id_student`(`student_id`) USING BTREE,
  CONSTRAINT `fk_bill_id_fee` FOREIGN KEY (`fee_id`) REFERENCES `fee` (`id_fee`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_bill_id_sale` FOREIGN KEY (`sale_id`) REFERENCES `sale` (`id_sale`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_bill_id_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id_students`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for billincoursedetail
-- ----------------------------
DROP TABLE IF EXISTS `billincoursedetail`;
CREATE TABLE `billincoursedetail`  (
  `id_bill` int(6) NOT NULL,
  `id_sourse_detail` int(6) NOT NULL,
  `class_id` int(6) NOT NULL,
  `ngay_laphd` date NOT NULL,
  `tinhtrang` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_bill`, `id_sourse_detail`) USING BTREE,
  INDEX `fk_billincoursedetail_id_bill`(`id_bill`) USING BTREE,
  INDEX `fk_billincoursedetail_id_class`(`class_id`) USING BTREE,
  INDEX `fk_billincoursedetail_id_soursedetail`(`id_sourse_detail`) USING BTREE,
  CONSTRAINT `fk_billincoursedetail_id_bill` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_billincoursedetail_id_class` FOREIGN KEY (`class_id`) REFERENCES `class` (`id_class`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_billincoursedetail_id_soursedetail` FOREIGN KEY (`id_sourse_detail`) REFERENCES `soursedetail` (`id_sourse_detail`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog`  (
  `id_blog` int(6) NOT NULL,
  `img_blog` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tieude` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tennguoiviet` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` datetime(0) NOT NULL,
  `account_id` int(6) NOT NULL,
  PRIMARY KEY (`id_blog`) USING BTREE,
  INDEX `account_id`(`account_id`) USING BTREE,
  CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account_user` (`id_account`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class`  (
  `id_class` int(6) NOT NULL AUTO_INCREMENT,
  `ten_lop` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `so_luongHV` int(3) NOT NULL,
  `sourse_detail_id` int(6) NOT NULL,
  `trangthai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_class`) USING BTREE,
  INDEX `fk_classs_id_soursedetail`(`sourse_detail_id`) USING BTREE,
  CONSTRAINT `fk_classs_id_soursedetail` FOREIGN KEY (`sourse_detail_id`) REFERENCES `soursedetail` (`id_sourse_detail`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES (1, 'LTCB_L1', 'C1', 21, 1, '');
INSERT INTO `class` VALUES (2, 'LTNC_L1', 'C2', 21, 2, '');
INSERT INTO `class` VALUES (3, 'LTC_L1', 'C3', 21, 3, '');
INSERT INTO `class` VALUES (7, 'JP_L1', 'C4', 31, 24, '??ang H???c');
INSERT INTO `class` VALUES (8, 'EL_L1', 'C1', 31, 36, 'D??? Ki???n');

-- ----------------------------
-- Table structure for edusourses
-- ----------------------------
DROP TABLE IF EXISTS `edusourses`;
CREATE TABLE `edusourses`  (
  `id_eduSource` int(6) NOT NULL AUTO_INCREMENT,
  `ten_daotao_khoahoc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datetime` date NOT NULL,
  PRIMARY KEY (`id_eduSource`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edusourses
-- ----------------------------
INSERT INTO `edusourses` VALUES (1, 'L???p Tr??nh Front_end', '?????y ????? kh??a h???c t??? FE ', '2021-07-06');
INSERT INTO `edusourses` VALUES (2, 'l???p tr??nh Back_end', 'l??m web v???i ng??n ng??? l???p tr??nh ??a d???ng li??n quan ?????n back end', '2021-07-02');
INSERT INTO `edusourses` VALUES (3, 'Ti???ng Anh', 'Ti???ng Anh chuy??n ng??nh cho c??ng ngh??? th??ng tin, giao ti???p cho doanh nghi???p', '2021-07-03');
INSERT INTO `edusourses` VALUES (4, 'Ti???ng Nh???t', 'Ti???ng Nh???t N5 , N4 , N3 ', '2021-06-08');

-- ----------------------------
-- Table structure for fee
-- ----------------------------
DROP TABLE IF EXISTS `fee`;
CREATE TABLE `fee`  (
  `id_fee` int(6) NOT NULL,
  `hocphi` int(9) NULL DEFAULT NULL,
  PRIMARY KEY (`id_fee`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for informationdetail
-- ----------------------------
DROP TABLE IF EXISTS `informationdetail`;
CREATE TABLE `informationdetail`  (
  `id_infor` int(6) NOT NULL,
  `tenchinhanh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bando` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_infor`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of informationdetail
-- ----------------------------
INSERT INTO `informationdetail` VALUES (0, 'gjg', 'hgjhg', 'jg');

-- ----------------------------
-- Table structure for mailinstudent
-- ----------------------------
DROP TABLE IF EXISTS `mailinstudent`;
CREATE TABLE `mailinstudent`  (
  `id_mailbox` int(6) NOT NULL AUTO_INCREMENT,
  `tendk` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tieude` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quantamKH` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tinhtrang` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thuphanhoi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_mailbox`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mailinstudent
-- ----------------------------
INSERT INTO `mailinstudent` VALUES (1, 'sdasd', 'dsasad', 'H???i ????p v??? kh??a h???c', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '???? ph???n h???i', 'c???m ??n b???n ???? g???i mail cho ch??ng t??i ');
INSERT INTO `mailinstudent` VALUES (2, 'Ph???m Ng???c ??nh', 'phamanhanhct14@gmail.com', 'H???i ????p v??? kh??a h???c', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '???? ph???n h???i', 'c???m ??n b???n ???? g???i mail cho ch??ng t??i');
INSERT INTO `mailinstudent` VALUES (10, 'Cao Ng???c Tuy???t Nhi', 'nhi@gmail.com', 't??i l?? nhi', '', 't??i r???t quan t??m ', '???? ph???n h???i', 'c???m ??n b???n ???? g???i mail cho ch??ng t??i ');
INSERT INTO `mailinstudent` VALUES (12, 'Tr???nh Ho??i Nam', '0750080150@sv.hcmunre.edu.vn', 'H???i ????p v??? kh??a h???c', '', 't??i quan t??m ....', 'Ch??a ?????c', '');
INSERT INTO `mailinstudent` VALUES (13, 'Cao Ng???c Tuy???t Nhi', 'nhi@gmail.com', 'H???i ????p', '', 'Ti???ng Nh???t', 'Ch??a ph???n h???i', 'ch??o e ch??? ???? th???y r???i ');
INSERT INTO `mailinstudent` VALUES (16, 'Cao Ng???c Tuy???t Nhi`', 'haru0489@yahoo.com.vn', 'H???i ????p', '', 'Ti???ng Nh???t', 'chua duyet', '');
INSERT INTO `mailinstudent` VALUES (17, 'Tr???nh Ho??i Nam', '0750080150@sv.hcmunre.edu.vn', 'H???i ????p', 'Ti???ng Anh', '', 'chua duyet', '');
INSERT INTO `mailinstudent` VALUES (18, 'Tr???nh Ho??i Nam', 'haru0489@yahoo.com.vn', 'H???i ????p', 'L???p tr??nh Back_End', 'QSWd??da', '???? ?????c', 'ch??o c???u ch??ng t??i gi??p g?? ???????c cho c???u ');
INSERT INTO `mailinstudent` VALUES (19, 'Nguy???n H???u Th???', 'nhi@gmail.com', 'H???i ????p', 'L???p tr??nh Back_End', 'S??DSD', '???? ph???n h???i', 'ch??o b???n !! c???m ??n b???n ???? g???i mail cho ch??ng t??i ');
INSERT INTO `mailinstudent` VALUES (20, 'Ph???m Lan Anh', 'tuyetnhi199@facebook.com', 'H???i ????p', 'L???p tr??nh Back_End', 'ch??o h???c vi??n !! em quan t??m ?????n kh??a h???c n??y n??y ......', '???? ph???n h???i', 'ch??o b???n');

-- ----------------------------
-- Table structure for mailsendback
-- ----------------------------
DROP TABLE IF EXISTS `mailsendback`;
CREATE TABLE `mailsendback`  (
  `id_back` int(6) NOT NULL AUTO_INCREMENT,
  `noidung` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mailbox_id` int(6) NOT NULL,
  `account_id` int(6) NOT NULL,
  `tinhtrang` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_back`) USING BTREE,
  INDEX `mailbox_id`(`mailbox_id`) USING BTREE,
  INDEX `account_id`(`account_id`) USING BTREE,
  CONSTRAINT `mailsendback_ibfk_1` FOREIGN KEY (`mailbox_id`) REFERENCES `mailinstudent` (`id_mailbox`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mailsendback_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account_user` (`id_account`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for quangcao
-- ----------------------------
DROP TABLE IF EXISTS `quangcao`;
CREATE TABLE `quangcao`  (
  `id_QC` int(6) NOT NULL,
  `img_QC` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TenQC` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngayBD` datetime(0) NOT NULL,
  `ngayKT` datetime(0) NOT NULL,
  `account_id` int(6) NOT NULL,
  PRIMARY KEY (`id_QC`) USING BTREE,
  INDEX `account_id`(`account_id`) USING BTREE,
  CONSTRAINT `quangcao_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account_user` (`id_account`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id_role` int(2) NOT NULL AUTO_INCREMENT,
  `ten_doituong` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_role`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'Admin');
INSERT INTO `role` VALUES (2, 'Gi??o Vi??n ');
INSERT INTO `role` VALUES (3, 'Qu???n l??');

-- ----------------------------
-- Table structure for sale
-- ----------------------------
DROP TABLE IF EXISTS `sale`;
CREATE TABLE `sale`  (
  `id_sale` int(6) NOT NULL,
  `sale_type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_sale`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sale
-- ----------------------------
INSERT INTO `sale` VALUES (1, '5', 'gi???m 5%');
INSERT INTO `sale` VALUES (2, '10', 'gi???m 10%');
INSERT INTO `sale` VALUES (3, '- 500', 'gi???m 500 ng??n ');

-- ----------------------------
-- Table structure for soursedetail
-- ----------------------------
DROP TABLE IF EXISTS `soursedetail`;
CREATE TABLE `soursedetail`  (
  `id_sourse_detail` int(6) NOT NULL AUTO_INCREMENT,
  `img_KH` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `edusource_id` int(6) NOT NULL,
  `tenkhoahoc` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mota` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `day_id` int(6) NOT NULL,
  `time_id` int(6) NOT NULL,
  `sl_tuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sl_tiet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngaykhaigiang` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `active` int(2) NOT NULL,
  `price` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_sourse_detail`) USING BTREE,
  INDEX `fk_soursedetail_id_day`(`day_id`) USING BTREE,
  INDEX `fk_soursedetail_id_time`(`time_id`) USING BTREE,
  INDEX `fk_soursedetail_id_edusource`(`edusource_id`) USING BTREE,
  CONSTRAINT `fk_soursedetail_id_day` FOREIGN KEY (`day_id`) REFERENCES `timeabledays` (`id_days`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_soursedetail_id_edusource` FOREIGN KEY (`edusource_id`) REFERENCES `edusourses` (`id_eduSource`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_soursedetail_id_time` FOREIGN KEY (`time_id`) REFERENCES `timeabletime` (`id_time`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of soursedetail
-- ----------------------------
INSERT INTO `soursedetail` VALUES (1, 'mvc\\photo\\course\\course-details-tab-1.png', 1, 'L???p tr??nh C++c??n b???n ', 'l??m web v???i ng??n ng??? l???p tr??nh', 1, 1, '1,5  th??ng ', '24 ti???t', '2021-07-01', '2021-08-01', 1, '5.000.000');
INSERT INTO `soursedetail` VALUES (2, 'mvc\\photo\\course\\course-details-tab-2.png', 1, 'L???p tr??nh n??ng cao OOP', 'X??y d???ng b??i t???p v??? t??? duy l???p tr??nh,h???c s??u v??? h?????ng ?????i t?????ng', 1, 1, '2 th??ng    ', '32 ti???t    ', '2021-07-01', '2021-09-13', 1, '5.500.000 ');
INSERT INTO `soursedetail` VALUES (3, 'mvc\\photo\\course\\course-details-tab-3.png', 2, 'Ng??n ng??? C# n??ng cao winfom', 'X??y d???ng b??i t???p v??? t??? duy l???p tr??nh, l??m quen v???i winform, x??y d???ng m???t ???ng d???ng t???t', 2, 2, '1,5 th??ng    ', '24 ti???t    ', '2021-06-03', '2021-08-04', 1, '5.000.000 ');
INSERT INTO `soursedetail` VALUES (24, '', 4, 'Ti???ng Nh???t giao Ti???p', 'Ti???ng Nh???t ??ang l?? m???t trong nh???ng ng??n ng??? hot ??? Vi???t Nam do v???y nhu c???u h???c ti???ng Nh???t ng??y c??ng nhi???u v?? tr??? n??n c???n thi???t. H??n n???a ti???ng Nh???t c???n thi???t cho c???ng vi???c li??n quan ?????n ng??nh IT. V?? ph??? bi???n', 1, 1, ' 2 th??ng  ', ' 38  ', '2021-06-06', '2021-07-09', 1, ' 2.000.000');
INSERT INTO `soursedetail` VALUES (36, '', 3, 'Ti???ng anh chuy??n s??u', 'Ti???ng anh r???t ph??? bi???n', 2, 2, '2,5 th??ng ', '32 ti???t  ', '2021-06-06', '2021-07-06', 1, '2.200.000 ');

-- ----------------------------
-- Table structure for studentinsoursedetaill
-- ----------------------------
DROP TABLE IF EXISTS `studentinsoursedetaill`;
CREATE TABLE `studentinsoursedetaill`  (
  `id_students` int(6) NOT NULL,
  `id_sourse_detail` int(6) NOT NULL,
  `tinhtrang` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_students`, `id_sourse_detail`) USING BTREE,
  INDEX `fk_studentinsoursedetaill_id_student`(`id_students`) USING BTREE,
  INDEX `fk_studentinsoursedetaill_id_soursedetail`(`id_sourse_detail`) USING BTREE,
  INDEX `tinhtrang`(`tinhtrang`) USING BTREE,
  CONSTRAINT `fk_studentinsoursedetaill_id_soursedetail` FOREIGN KEY (`id_sourse_detail`) REFERENCES `soursedetail` (`id_sourse_detail`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_studentinsoursedetaill_id_student` FOREIGN KEY (`id_students`) REFERENCES `students` (`id_students`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of studentinsoursedetaill
-- ----------------------------
INSERT INTO `studentinsoursedetaill` VALUES (108, 3, 'Ch??a thanh to??n');
INSERT INTO `studentinsoursedetaill` VALUES (4, 1, '???? thanh to??n');
INSERT INTO `studentinsoursedetaill` VALUES (4, 2, '???? thanh to??n');
INSERT INTO `studentinsoursedetaill` VALUES (5, 1, '???? thanh to??n');
INSERT INTO `studentinsoursedetaill` VALUES (5, 2, '???? thanh to??n');
INSERT INTO `studentinsoursedetaill` VALUES (9, 2, '???? thanh to??n');
INSERT INTO `studentinsoursedetaill` VALUES (10, 2, '???? thanh to??n');
INSERT INTO `studentinsoursedetaill` VALUES (10, 3, '???? thanh to??n');
INSERT INTO `studentinsoursedetaill` VALUES (12, 2, '???? thanh to??n');
INSERT INTO `studentinsoursedetaill` VALUES (12, 3, '???? thanh to??n');
INSERT INTO `studentinsoursedetaill` VALUES (81, 3, '???? thanh to??n');
INSERT INTO `studentinsoursedetaill` VALUES (87, 3, '???? thanh to??n');
INSERT INTO `studentinsoursedetaill` VALUES (90, 2, '???? thanh to??n');
INSERT INTO `studentinsoursedetaill` VALUES (99, 2, '???? thanh to??n');

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id_students` int(6) NOT NULL AUTO_INCREMENT,
  `imgHV` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenhv` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `truong` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(10) NOT NULL,
  `gmail` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `actived` int(1) NOT NULL,
  PRIMARY KEY (`id_students`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 123 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (4, 'gil.jpg', 'Nguy???n Ng???c Th???ch', '1999-02-04', '?????i H???c T??i Nguy??n v?? M??i Tr?????ng', 2147483647, 'thachnguyen@gmail.com', 1);
INSERT INTO `students` VALUES (5, 'gil.jpg', 'Ph???m Quang Vinh', '2000-05-05', '?????i H???c T??i Nguy??n v?? M??i Tr?????ng', 2147483647, 'vinhnguyen@gmail.com', 1);
INSERT INTO `students` VALUES (7, 'pr5.jpg', 'Nguy???n Th??? Kim', '2000-05-05', '?????i H???c T??i Nguy??n v?? M??i Tr?????ng', 2147483647, 'kimnguyen@gmail.com', 1);
INSERT INTO `students` VALUES (9, 'anhtest.jpg', 'Ch??u Nguy???n Ng???c Duy', '2000-05-05', '?????i H???c T??i Nguy??n v?? M??i Tr?????', 2147483647, 'hieungueyn@gmail.com', 1);
INSERT INTO `students` VALUES (10, 'trainer-2.jpg', 'Nguy???n Th??? Tu???n L??', '2000-05-05', '?????i H???c T??i Nguy??n v?? M??i Tr?????', 2147483647, 'hieungueyn@gmail.com', 1);
INSERT INTO `students` VALUES (11, 'trainer-2.jpg', 'Nguy???n Ng???c Anh', '2000-05-05', '?????i H???c T??i Nguy??n v?? M??i Tr?????ng', 2147483647, 'ngocanh@gmail.com', 1);
INSERT INTO `students` VALUES (12, 'trainer-1.jpg', 'Tr???n V??n Ph??c', '2000-05-05', '?????i H???c T??i Nguy??n v?? M??i Tr?????ng', 2147483647, 'phucnguyen@gmail.com', 1);
INSERT INTO `students` VALUES (81, 'anhtest.jpg', 'Nguy???n Th??? Y???n ', '2000-05-05', 'N??ng L??m', 2147483647, 'yennguyen@gmail.com', 1);
INSERT INTO `students` VALUES (82, '1.png', 'Pham Phan', '1999-02-04', 'N??ng L??m', 2147483647, 'phan@gmail.com', 1);
INSERT INTO `students` VALUES (83, '1.png', 'Pham H???u Khang', '2000-05-05', 'N??ng L??m', 2147483647, 'hoainam@gmail.com', 1);
INSERT INTO `students` VALUES (86, 'trainer-3.jpg', 'Nguy???n Th??? H????ng', '2000-05-05', '?????i H???c N??ng L??m', 2147483647, 'phan@gmail.com', 1);
INSERT INTO `students` VALUES (87, 'trainer-1.jpg', 'Ph???m Ng???c Di???p ', '1996-05-11', 'N??ng L??m', 2147483647, 'phan@gmail.com', 1);
INSERT INTO `students` VALUES (88, 'trainer-3.jpg', 'Pham H???u Khang', '2000-05-05', 'N??ng L??m', 2147483647, 'phan@gmail.com', 1);
INSERT INTO `students` VALUES (90, 'pr5.jpg', 'Nguy???n Th??? H????ng', '2000-05-05', 'N??ng L??m', 2147483647, 'phan@gmail.com', 1);
INSERT INTO `students` VALUES (98, 'anhtest.jpg', 'Pham Phan', '2000-05-05', 'N??ng L??m', 1321244103, 'phan@gmail.com', 1);
INSERT INTO `students` VALUES (99, 'anhtest.jpg', 'Pham H???u Khang', '2000-05-05', 'T??i Nguy??n V?? M??i Tr?????ng', 2147483647, 'phan@gmail.com', 1);
INSERT INTO `students` VALUES (104, 'anhtest.jpg', 'Pham Phan Anh', '2000-05-05', 'N??ng L??m', 2147483647, 'phan@gmail.com', 1);
INSERT INTO `students` VALUES (105, 'anhtest.jpg', 'Pham Phan Anh', '2000-05-05', 'N??ng L??m', 2147483647, 'phan@gmail.com', 1);
INSERT INTO `students` VALUES (108, 'gil.jpg', 'Pham L?? H???u ', '2000-05-05', '?????i H???c ?????ng Nai', 2147483647, 'phan@gmail.com', 1);
INSERT INTO `students` VALUES (114, 'trainer-2.jpg', 'Nguy???n Th??? Y???n ', '2000-05-05', 'N??ng L??m', 2147483647, 'phan@gmail.com', 1);
INSERT INTO `students` VALUES (115, 'pr5.jpg', 'Nguy???n Th??? Y???n ', '1999-12-15', 'N??ng L??m', 2147483647, 'phan@gmail.com', 1);
INSERT INTO `students` VALUES (121, 'trainer-2.jpg', 'Nguy???n Th??? Ho??i', '2000-05-05', '?????i H???c T??i Nguy??n v?? M??i Tr?????ng', 2147483647, 'phan@gmail.com', 1);
INSERT INTO `students` VALUES (122, '', 'Pham Phan Anh', '2000-05-05', '?????i H???c N??ng L??m', 79897979, 'phan@gmail.com', 1);

-- ----------------------------
-- Table structure for timeabledays
-- ----------------------------
DROP TABLE IF EXISTS `timeabledays`;
CREATE TABLE `timeabledays`  (
  `id_days` int(6) NOT NULL AUTO_INCREMENT,
  `lichhoc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `loaingayhoc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_days`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of timeabledays
-- ----------------------------
INSERT INTO `timeabledays` VALUES (1, '2 - 4 -6', '3 ng??y /tu???n');
INSERT INTO `timeabledays` VALUES (2, '3 - 5 -7 ', '3 ng??y /tu???n');
INSERT INTO `timeabledays` VALUES (3, '7 - CN', '2 ng??y /tu???n');

-- ----------------------------
-- Table structure for timeabletime
-- ----------------------------
DROP TABLE IF EXISTS `timeabletime`;
CREATE TABLE `timeabletime`  (
  `id_time` int(6) NOT NULL AUTO_INCREMENT,
  `thoigian` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `buoi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_time`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of timeabletime
-- ----------------------------
INSERT INTO `timeabletime` VALUES (1, '19h - 21h30', 'Ca T???i');
INSERT INTO `timeabletime` VALUES (2, '18h - 21h', 'Ca T???i');
INSERT INTO `timeabletime` VALUES (17, '8h - 10h ', 'Ca s??ng');

-- ----------------------------
-- Table structure for trainers
-- ----------------------------
DROP TABLE IF EXISTS `trainers`;
CREATE TABLE `trainers`  (
  `id_trainer` int(6) NOT NULL AUTO_INCREMENT,
  `img_trainer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten_gv` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chucvu` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dv_congtac` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thanhtich` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kinhnghiem` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(10) NOT NULL,
  `gmail` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `actived` int(1) NOT NULL,
  `account_id` int(6) NOT NULL,
  PRIMARY KEY (`id_trainer`) USING BTREE,
  INDEX `account_id`(`account_id`) USING BTREE,
  CONSTRAINT `trainers_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account_user` (`id_account`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trainers
-- ----------------------------
INSERT INTO `trainers` VALUES (1, 'giaovien1.jpg', 'Nguy???n Huy Anh', 'Th??c s???', 'Tr?????ng ?????i H???c T??i Nguy??n v?? M??i Tr?????ng', 'Nghi??n C???u Thu???t to??n AI, c?? nhi???u n??m trong ngh???', 'nhi???u n??m d???y h???c, 5 kinh nghi', 23127393, 'huyanh@gmail.com', 1, 2);
INSERT INTO `trainers` VALUES (2, 'giaovien2.jpg', 'Nguy???n H?? Anh Tu???n ', 'Ph?? b??? m??n C??ng ngh??? th??ng tin', 'Tr?????ng C??ng ngh??? th??ng tin TP.HCM', '????o t???o tr?????ng qu???c t???, chuy??n gia AI, Develop website ', '13 n??m d???y h???c', 57689898, 'anhtuan@gmail.com', 1, 9);
INSERT INTO `trainers` VALUES (3, 'gil.jpg', 'Ph???m Thanh', 'Junior', 'Cty Techbase Vietnam', 'Developer gi???i  , C?? kinh nghi???m v???i c??c d??? ??n th???c t???', '5 n??m kinh nghi???m ', 64647778, 'phamthanh@gmail.com', 1, 5);
INSERT INTO `trainers` VALUES (5, 'gil.jpg', 'Nguy???n H???u Th???', 'Gi???ng Vi??n Ngo???i Ng??? Tin H???c', 'Tr?????ng ?????i H???c Ngo???i Ng??? Tin H???c', 'Tr??nh ????? N2 n??m 2008', 'c?? 10 n??m kinh nghi???m d???y h???c,', 798979799, 'thohuynguyen@gmail.com', 1, 7);

-- ----------------------------
-- Table structure for trainnerincoursedetail
-- ----------------------------
DROP TABLE IF EXISTS `trainnerincoursedetail`;
CREATE TABLE `trainnerincoursedetail`  (
  `id_trainer` int(6) NOT NULL,
  `id_sourse_detail` int(6) NOT NULL,
  `class_id` int(6) NOT NULL,
  `danhgia` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_trainer`, `id_sourse_detail`) USING BTREE,
  INDEX `fk_trainnerincoursedetail_id_trainer`(`id_trainer`) USING BTREE,
  INDEX `fk_trainnerincoursedetail_id_class`(`class_id`) USING BTREE,
  INDEX `fk_trainnerincoursedetail_id_sourdedetail`(`id_sourse_detail`) USING BTREE,
  CONSTRAINT `fk_trainnerincoursedetail_id_class` FOREIGN KEY (`class_id`) REFERENCES `class` (`id_class`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_trainnerincoursedetail_id_sourdedetail` FOREIGN KEY (`id_sourse_detail`) REFERENCES `soursedetail` (`id_sourse_detail`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_trainnerincoursedetail_id_trainer` FOREIGN KEY (`id_trainer`) REFERENCES `trainers` (`id_trainer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trainnerincoursedetail
-- ----------------------------
INSERT INTO `trainnerincoursedetail` VALUES (1, 1, 1, '');
INSERT INTO `trainnerincoursedetail` VALUES (2, 2, 2, '');
INSERT INTO `trainnerincoursedetail` VALUES (2, 3, 3, '');
INSERT INTO `trainnerincoursedetail` VALUES (5, 24, 7, '');

SET FOREIGN_KEY_CHECKS = 1;
