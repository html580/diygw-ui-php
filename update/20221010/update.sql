CREATE TABLE IF NOT EXISTS `diy_order`  (
    `order_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '订单ID',
    `order_no` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '订单号',
    `total` decimal(10, 2) UNSIGNED NOT NULL DEFAULT 0.00 COMMENT '商品总金额',
    `body` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '商品详情',
    `pay_status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '付款状态(0未付款 1已付款)',
    `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '订单状态(0进行中 1已付款 2已取消)',
    `transaction_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '微信支付交易号',
    `platform` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '来源客户端 (APP、H5、小程序等)',
    `openid` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
    `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户ID',
    `create_time` datetime(0) DEFAULT NULL COMMENT '创建时间',
    `update_time` datetime(0) DEFAULT NULL COMMENT '更新时间',
    `delete_time` datetime(0) DEFAULT NULL COMMENT '删除时间',
    PRIMARY KEY (`order_id`) USING BTREE,
    UNIQUE INDEX `order_no`(`order_no`) USING BTREE,
    INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '支付订单记录表' ROW_FORMAT = Dynamic;
