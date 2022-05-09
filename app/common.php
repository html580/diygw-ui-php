<?php
// 应用公共文件
use itbdw\Ip\IpLocation;

/**
 *
 * @time 2022年03月12日
 * @param $agent
 * @return string
 */
function getOs($agent): string
{
    if (false !== stripos($agent, 'win') && preg_match('/nt 6.1/i', $agent)) {
        return 'Windows 7';
    }
    if (false !== stripos($agent, 'win') && preg_match('/nt 6.2/i', $agent)) {
        return 'Windows 8';
    }
    if(false !== stripos($agent, 'win') && preg_match('/nt 10.0/i', $agent)) {
        return 'Windows 10';#添加win10判断
    }
    if (false !== stripos($agent, 'win') && preg_match('/nt 5.1/i', $agent)) {
        return 'Windows XP';
    }
    if (false !== stripos($agent, 'linux')) {
        return 'Linux';
    }
    if (false !== stripos($agent, 'mac')) {
        return 'mac';
    }
    return $agent;
}

/**
 *
 * @time 2022年03月12日
 * @param $agent
 * @return string
 */
function getBrowser($agent): string
{
    if (false !== stripos($agent, "MSIE")) {
        return 'MSIE';
    }
    if (false !== stripos($agent, "Firefox")) {
        return 'Firefox';
    }
    if (false !== stripos($agent, "Chrome")) {
        return 'Chrome';
    }
    if (false !== stripos($agent, "Safari")) {
        return 'Safari';
    }
    if (false !== stripos($agent, "Opera")) {
        return 'Opera';
    }
    return $agent;
}

function getIpLocation($ip){
    $location  = IpLocation::getLocation($ip);
    return $location['area']?$location['area']:'未知';
}



/*
    参数：
    $sql_path:sql文件路径；
    $old_prefix:原表前缀；
    $new_prefix:新表前缀；
    $separator:分隔符 参数可为";\n"或";\r\n"或";\r"
*/
function get_mysql_data($sql_path, $old_prefix = "", $new_prefix = "", $separator = ";\n")
{

    $commenter = array('#', '--');
    //判断文件是否存在
    if (!file_exists($sql_path))
        return false;

    $content = file_get_contents($sql_path);   //读取sql文件
    $content = str_replace(array($old_prefix, "\r"), array($new_prefix, "\n"), $content);//替换前缀

    //通过sql语法的语句分割符进行分割
    $segment = explode($separator, trim($content));

    //去掉注释和多余的空行
    $data = array();
    foreach ($segment as $statement) {
        $sentence = explode("\n", $statement);
        $newStatement = array();
        foreach ($sentence as $subSentence) {
            if ('' != trim($subSentence)) {
                //判断是会否是注释
                $isComment = false;
                foreach ($commenter as $comer) {
                    if (preg_match("/^(" . $comer . ")/is", trim($subSentence))) {
                        $isComment = true;
                        break;
                    }
                }
                //如果不是注释，则认为是sql语句
                if (!$isComment)
                    $newStatement[] = $subSentence;
            }
        }
        $data[] = $newStatement;
    }

    //组合sql语句
    foreach ($data as $statement) {
        $newStmt = '';
        foreach ($statement as $sentence) {
            $newStmt = $newStmt . trim($sentence) . "\n";
        }
        if (!empty($newStmt)) {
            $result[] = $newStmt;
        }
    }
    return $result;
}
