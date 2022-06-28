-- 增加附件存储表
DROP TABLE IF EXISTS `sys_storage`;
CREATE TABLE `sys_storage`  (
                                `storage_id` bigint(20) NOT NULL AUTO_INCREMENT,
                                `parent_id` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
                                `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '名称',
                                `ext` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '后缀',
                                `path` varchar(4000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '路径',
                                `rows` int(10) DEFAULT NULL COMMENT '全景图片行数',
                                `url` varchar(4000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '外链',
                                `driver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                `source_url` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                `type` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'image=图片 mp4=视频 mp3=音频',
                                `md5` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文件MD5 判断是否重复',
                                `width` int(10) DEFAULT NULL COMMENT '全景图片宽度',
                                `cols` int(10) DEFAULT NULL COMMENT '全景图片列数',
                                `user_id` bigint(20) DEFAULT NULL,
                                `size` int(11) UNSIGNED DEFAULT 0 COMMENT '大小',
                                `create_time` datetime(0) DEFAULT NULL,
                                `update_time` datetime(0) DEFAULT NULL,
                                `delete_time` datetime(0) DEFAULT NULL,
                                PRIMARY KEY (`storage_id`) USING BTREE,
                                INDEX `type`(`type`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = '资源管理器' ROW_FORMAT = Dynamic;
