<?php
/**
 * Created by PhpStorm.
 * User: geekman
 * Date: 2019/10/14
 * Time: 4:32 PM
 */
if (!function_exists('get_application_osver')) {
    /**
     * @return array|string
     */
    function get_application_osver(){
        return request()->header('u-application-osver','');
    }
}

if (!function_exists('get_application_mfr')) {
    /**
     * @return array|string
     */
    function get_application_mfr(){
        return request()->header('u-application-mfr','');
    }
}

if (!function_exists('get_application_devid')) {
    /**
     * @return array|string
     */
    function get_application_devid(){
        return request()->header('u-application-devid','');
    }
}

if (!function_exists('get_application_context')) {
    /**
     * @return array|string
     */
    function get_application_context(){
        return request()->header('u-application-context','');
    }
}

if (!function_exists('get_application_version')) {
    /**
     * @return array|string
     */
    function get_application_version(){
        return request()->header('u-application-version','');
    }
}


if (!function_exists('get_ios_audit_status')) {
    /**
     * @return array|string
     */
    function get_ios_audit_status(){

        $iosAuditSwitch = env('IOS_AUDIT_SWITCH');
        $iosAuditVersion = env('IOS_AUDIT_VERSION');

        if($iosAuditSwitch){
            $applicationContext = get_application_context();
            $applicationVersion = get_application_version();
            if(APPLICATION_CONTEXT_YOUYICOO_IOS == $applicationContext){
                if($applicationVersion == $iosAuditVersion){
                    return true;
                }
            }
        }

        return false;
    }
}



if(!function_exists('wdreplace')){
    /**
     * @param $str
     * @return mixed
     */
    function wdreplace($str){
        $str = str_replace( '~', "~", $str);
        $str = str_replace( '<', "《", $str);
        $str = str_replace( '>', "》", $str);
        $str = str_replace( '&', "&", $str);
        $str = str_replace( '#', "#", $str);
        $str = str_replace( '$', "￥", $str);
        $str = str_replace( '[', "【", $str);
        $str = str_replace( ']', "】", $str);
        $str = str_replace( '(', "（", $str);
        $str = str_replace( ')', "）", $str);
        $str = str_replace( ';', "；", $str);
        $str = str_replace( '"', "“", $str);
        $str = str_replace( "'", "’", $str);
        $str = str_replace( '\\', "、", $str);
        $str = str_replace(array("\r\n", "\r", "\n"), "", $str);
        //$str = addslashes($str);
        return $str;
    }
}

if (!function_exists('uek_log')) {
    /**
     * @param string $level
     * @param $des
     * @param $message
     * @param string $srcFile
     * @param int $line
     * @param string $func
     */
    function uek_log($level = 'error',$des, $message,$srcFile = __FILE__, $line= __LINE__,$func=__FUNCTION__)
    {

        if(is_array($message)){
            $fullmsg = $srcFile.'::'.$func.'('.$line.')'."\n".$des.print_r($message,true);
        }
        else{
            $fullmsg = $srcFile.'::'.$func.'('.$line.')'."\n".$des.$message;
        }

        switch($level)
        {
            case 'debug':
                return app('uek_log')->debug($fullmsg);
                break;
            case 'info':
                return app('uek_log')->info($fullmsg);
                break;
            case 'notice':
                return app('uek_log')->notice($fullmsg);
                break;
            case 'warning':
                return app('uek_log')->warning($fullmsg);
                break;
            case 'error':
                return app('uek_log')->error($fullmsg);
                break;
            case 'critical':
                return app('uek_log')->critical($fullmsg);
                break;
            case 'alert':
                return app('uek_log')->alert($fullmsg);
                break;
            case 'emergency':
                return app('uek_log')->emergency($fullmsg);
                break;

        }
    }
}

if (!function_exists('uek_sql_log')) {
    /**
     * @param string $level
     * @param $time
     * @param $sql
     * @return mixed
     */
    function uek_sql_log($level = 'info', $sql)
    {
        $fullmsg = $sql;

        switch($level)
        {
            case 'debug':
                return app('uek_sql_log')->debug($fullmsg);
                break;
            case 'info':
                return app('uek_sql_log')->info($fullmsg);
                break;
            case 'notice':
                return app('uek_sql_log')->notice($fullmsg);
                break;
            case 'warning':
                return app('uek_sql_log')->warning($fullmsg);
                break;
            case 'error':
                return app('uek_sql_log')->error($fullmsg);
                break;
            case 'critical':
                return app('uek_sql_log')->critical($fullmsg);
                break;
            case 'alert':
                return app('uek_sql_log')->alert($fullmsg);
                break;
            case 'emergency':
                return app('uek_sql_log')->emergency($fullmsg);
                break;

        }
    }
}

if (!function_exists('uek_pay_log')) {
    /**
     * @param string $level
     * @param $des
     * @param $message
     * @param string $srcFile
     * @param int $line
     * @param string $func
     */
    function uek_pay_log($level = 'error',$des, $message,$srcFile = __FILE__, $line= __LINE__,$func=__FUNCTION__)
    {

        if(is_array($message)){
            $fullmsg = $srcFile.'::'.$func.'('.$line.')'."\n".$des.print_r($message,true);
        }
        else{
            $fullmsg = $srcFile.'::'.$func.'('.$line.')'."\n".$des.$message;
        }

        switch($level)
        {
            case 'debug':
                return app('uek_pay_log')->debug($fullmsg);
                break;
            case 'info':
                return app('uek_pay_log')->info($fullmsg);
                break;
            case 'notice':
                return app('uek_pay_log')->notice($fullmsg);
                break;
            case 'warning':
                return app('uek_pay_log')->warning($fullmsg);
                break;
            case 'error':
                return app('uek_pay_log')->error($fullmsg);
                break;
            case 'critical':
                return app('uek_pay_log')->critical($fullmsg);
                break;
            case 'alert':
                return app('uek_pay_log')->alert($fullmsg);
                break;
            case 'emergency':
                return app('uek_pay_log')->emergency($fullmsg);
                break;
        }
    }
}

if (!function_exists('uek_settlement_log')) {
    /**
     * @param string $level
     * @param $des
     * @param $message
     * @param string $srcFile
     * @param int $line
     * @param string $func
     */
    function uek_settlement_log($level = 'error',$des, $message,$srcFile = __FILE__, $line= __LINE__,$func=__FUNCTION__)
    {

        if(is_array($message)){
            $fullmsg = $srcFile.'::'.$func.'('.$line.')'."\n".$des.print_r($message,true);
        }
        else{
            $fullmsg = $srcFile.'::'.$func.'('.$line.')'."\n".$des.$message;
        }

        switch($level)
        {
            case 'debug':
                return app('uek_settlement_log')->debug($fullmsg);
                break;
            case 'info':
                return app('uek_settlement_log')->info($fullmsg);
                break;
            case 'notice':
                return app('uek_settlement_log')->notice($fullmsg);
                break;
            case 'warning':
                return app('uek_settlement_log')->warning($fullmsg);
                break;
            case 'error':
                return app('uek_settlement_log')->error($fullmsg);
                break;
            case 'critical':
                return app('uek_settlement_log')->critical($fullmsg);
                break;
            case 'alert':
                return app('uek_settlement_log')->alert($fullmsg);
                break;
            case 'emergency':
                return app('uek_settlement_log')->emergency($fullmsg);
                break;
        }
    }
}

if (!function_exists('uek_withdraw_log')) {
    /**
     * @param string $level
     * @param $des
     * @param $message
     * @param string $srcFile
     * @param int $line
     * @param string $func
     */
    function uek_withdraw_log($level = 'error',$des, $message,$srcFile = __FILE__, $line= __LINE__,$func=__FUNCTION__)
    {

        if(is_array($message)){
            $fullmsg = $srcFile.'::'.$func.'('.$line.')'."\n".$des.print_r($message,true);
        }
        else{
            $fullmsg = $srcFile.'::'.$func.'('.$line.')'."\n".$des.$message;
        }

        switch($level)
        {
            case 'debug':
                return app('uek_withdraw_log')->debug($fullmsg);
                break;
            case 'info':
                return app('uek_withdraw_log')->info($fullmsg);
                break;
            case 'notice':
                return app('uek_withdraw_log')->notice($fullmsg);
                break;
            case 'warning':
                return app('uek_withdraw_log')->warning($fullmsg);
                break;
            case 'error':
                return app('uek_withdraw_log')->error($fullmsg);
                break;
            case 'critical':
                return app('uek_withdraw_log')->critical($fullmsg);
                break;
            case 'alert':
                return app('uek_withdraw_log')->alert($fullmsg);
                break;
            case 'emergency':
                return app('uek_withdraw_log')->emergency($fullmsg);
                break;
        }
    }
}

if (! function_exists('desensitize')) {

    /**
     * 脱敏函数
     * @param $string
     * @param int $start
     * @param int $length
     * @param string $re
     * @return string
     */
    function desensitize($string, $start = 0, $length = 0, $re = '*')
    {
        if (empty($string) || empty($length) || empty($re)) return $string;
        $end = $start + $length;
        $strlen = mb_strlen($string);
        $str_arr = array();
        for ($i = 0; $i < $strlen; $i++) {
            if ($i >= $start && $i < $end)
                $str_arr[] = $re;
            else
                $str_arr[] = mb_substr($string, $i, 1);
        }
        return implode('', $str_arr);
    }

}

if (!function_exists('escape'))
{
    /**
     * Unicode加密
     * 字符串加密算法
     * @param $string
     * @param string $in_encoding
     * @param string $out_encoding
     * @return string
     */
    function escape($string, $in_encoding = 'UTF-8',$out_encoding = 'UCS-2') {
        $return = '';
        if (function_exists('mb_get_info')) {
            for($x = 0; $x < mb_strlen ( $string, $in_encoding ); $x ++) {
                $str = mb_substr ( $string, $x, 1, $in_encoding );
                if (strlen ( $str ) > 1) {
                    $return .= '%u' . strtoupper ( bin2hex ( mb_convert_encoding ( $str, $out_encoding, $in_encoding ) ) );
                } else {
                    $return .= '%' . strtoupper ( bin2hex ( $str ) );
                }
            }
        }
        return $return;
    }
}

if (!function_exists('unescape'))
{
    /**
     * Unicode解密
     * 字符串解密算范
     * @param $str
     * @return string
     */
    function unescape($str) {
        try {
            $ret = '';
            $len = strlen($str);
            for ($i = 0; $i < $len; $i++) {
                if ($str[$i] == '%' && $str[$i + 1] == 'u') {
                    $val = hexdec(substr($str, $i + 2, 4));
                    if ($val < 0x7f)
                        $ret .= chr($val);
                    else
                        if ($val < 0x800)
                            $ret .= chr(0xc0 | ($val >> 6)) .
                                chr(0x80 | ($val & 0x3f));
                        else
                            $ret .= chr(0xe0 | ($val >> 12)) .
                                chr(0x80 | (($val >> 6) & 0x3f)) .
                                chr(0x80 | ($val & 0x3f));
                    $i += 5;
                } else
                    if ($str[$i] == '%') {
                        $ret .= urldecode(substr($str, $i, 3));
                        $i += 2;
                    } else
                        $ret .= $str[$i];
            }
            return $ret;
        } catch (\Exception $e){
            return '';
        }
    }
}

if(!function_exists('api_encrypt')){
    /**
     * @param $value
     * @param bool $serialize
     * @return string
     */
    function api_encrypt($value, $serialize = false){
        $encrypter = new \Illuminate\Encryption\Encrypter(base64_decode(env('API_SECRET')),'AES-256-CBC');
        return base64_encode(base64_encode($encrypter->encrypt($value,$serialize)));
    }
}

if (! function_exists('api_decrypt')) {
    /**
     * Decrypt the given value.
     *
     * @param  string  $value
     * @param  bool   $unserialize
     * @return string
     */
    function api_decrypt($value, $unserialize = false)
    {
        $encrypter = new \Illuminate\Encryption\Encrypter(base64_decode(env('API_SECRET')),'AES-256-CBC');
        return $encrypter->decrypt(base64_decode(base64_decode($value)), $unserialize);
    }
}

if(!function_exists('data_encryption'))
{
    /**
     * 数据库 字符串加密
     * @param $str
     * @return string
     */
    function data_encryption($str)
    {
        return base64_encode(escape($str));
    }
}

if(!function_exists('data_decryption'))
{
    /**
     * 数据库 字符串解密
     * @param $str
     * @return string
     */
    function data_decryption($str)
    {
        return unescape(base64_decode($str));
    }
}

if(!function_exists('url_encryption'))
{
    /**
     * 接口 url地址加密
     * @param $str
     * @return string
     */
    function url_encryption($str)
    {
        return base64_encode(base64_encode($str));
    }
}

if (! function_exists('get_url')) {
    function get_url($url)
    {
        if (empty($url)) {
            return '';
        } elseif (preg_match('/^http/',$url)) {
            return $url;
        } elseif (preg_match('/^uppic/',$url)){
            return env('WEB_ADDR').'/'.$url;
        }else{
            return Storage::disk('oss')->getAdapter()->getUrl($url);
        }
    }
}

if(!function_exists('getShortTime')){
    function getShortTime($date){
        return date('Y-m-d',strtotime($date));
    }
}


if(!function_exists('password_encryption')){
    function password_encryption($password){
        return  md5(md5($password.config('gyx.password_salt')));
    }
}

if (! function_exists('get_live_url')) {

    /**
     * 获取直播观看地址
     * @param $channel_type  直播渠道
     * @param $channel_id    第三方直播频道ID
     * @return string
     */
    function get_live_url($channel_type,$channel_id)
    {
        if (LIVE_CHANNEL_TYPE_POLYV == $channel_type) {
            return "https://live.polyv.cn/watch/".$channel_id;
        }

        if (LIVE_CHANNEL_TYPE_SHANGTV == $channel_type) {
            return "https://shangzhibo.tv/watch/".$channel_id;
        }

        return '';
    }
}

if (!function_exists('get_url_path'))
{

    /**
     * 获取url 路径地址
     * @param $url
     * @return string
     */
    function get_url_path($url)
    {
        return ltrim(parse_url($url)['path'],'/');
    }
}

if (!function_exists('get_share_title'))
{

    /**
     * 获取资源分享标题
     * @param $st     资源类型
     * @param $sTitle 资源标题
     * @return string
     */
    function get_share_title($sTitle,$default_content)
    {
        if($sTitle) return $sTitle;

        return $default_content;
    }
}

if (!function_exists('get_share_content'))
{

    /**
     * 获取资源分享标题
     * @param $st     资源类型
     * @param $sTitle 资源标题
     * @return string
     */
    function get_share_content($content,$default_contet)
    {
        if($content) return $content;
        return $default_contet;
    }
}

if (!function_exists('get_share_img'))
{

    /**
     * 获取资源分享封面
     * @param $st  资源类型
     * @param $sImg 资源封面
     * @return string
     */
    function get_share_img($sImg,$default_img)
    {
        if($sImg) return $sImg;
        return $default_img;
    }
}


if (!function_exists('get_share_url'))
{

    /**
     * 获取资源分享地址
     * @param $st  资源类型
     * @param $sid 资源ID
     * @return string
     */
    function get_share_url($st,$sid)
    {
        return env('APP_ADDR')."/share?uek_st={$st}&uek_sid={$sid}";
    }
}

if (!function_exists('format_nums'))
{
    function format_nums($hit)
    {
        if($hit >= 1000 * 10000){
            return '1000万+';
        }elseif($hit >= 100 * 10000){
            return intval($hit/10000).'万';
        }elseif($hit >= 10000){
            return sprintf('%.1f万',substr(sprintf('%.2f',$hit/10000),0,-1));
        }else{
            return strval($hit);
        }
    }
}


if (!function_exists('array_filter_null'))
{
    function array_filter_null($arr)
    {
        return array_filter($arr,function($v,$k){
            return !is_null($v);
        },ARRAY_FILTER_USE_BOTH);
    }
}


if (!function_exists('get_default_head_img'))
{
    function get_default_head_img($sex)
    {
        if($sex==1)return "https://youyicoo.oss-cn-shenzhen.aliyuncs.com/userHeadImg/008f8a84c24ba11179c1f5872e0f8837.png";
        if($sex==2)return "https://youyicoo.oss-cn-shenzhen.aliyuncs.com/userHeadImg/11052190bd77323debdc76eedaa8154f.jpg";
        return "https://youyicoo.oss-cn-shenzhen.aliyuncs.com/userHeadImg/008f8a84c24ba11179c1f5872e0f8837.png";
    }
}


/*
 * 二维数组去重
 * 注意：二维数组中的元素个数必须一致，且键值也得一致，否则无意义
 * @param array $arr
 * @return array $arr_after
 */
function array_unique_2DArr($arr=array()){
    if(empty($arr) || !is_array($arr)){
        return array();
    }
    /*******处理二维数组个数不一致问题  start 其他项目用可以去掉*******/
    //判断数组中二维数组是否包含uniqueId，存在的话需要处理其他的日志信息，全部加上uniqueId，且uniqueId值必须相同
    $hasUniqueId = false;
    foreach($arr as $val){
        if(array_key_exists('uniqueId', $val)){
            $hasUniqueId = true;
            break;
        }
    }
    //如果$arr中的二维数组中uniqueId存在，则其他也增加
    if($hasUniqueId){
        foreach($arr as $_k=>$_val){
            if(!array_key_exists('uniqueId', $_val)){
                //在$_val中增加unique,只是为了和其他的带有uniqueId键值的数组元素个数保持一致
                $_val_keys = array_keys($_val);
                $_val_vals = array_values($_val);
                array_unshift($_val_keys, 'uniqueId');
                array_unshift($_val_vals, '0_0');
                $arr[$_k] = array_combine($_val_keys, $_val_vals);
            }
        }
    }
    /********处理二维数组个数不一致问题  end********/
    foreach($arr[0] as $k => $v){
        $arr_inner_key[]= $k;   //先把二维数组中的内层数组的键值记录在在一维数组中
    }
    foreach ($arr as $k => $v){
        $v =join("^",$v);   //降维 用implode()也行 ，注意，拆分时不能用逗号，用其他的不常用符号，逗号可能会由于数据本身含有逗号导致失败
        $temp[$k] =$v;      //保留原来的键值
    }
    $temp =array_unique($temp);    //去重：去掉重复的字符串
    foreach ($temp as $k => $v){
        $a = explode("^",$v);   //拆分后的重组
        $arr_after[$k]= array_combine($arr_inner_key,$a);  //将原来的键与值重新合并
    }
    return $arr_after;
}


