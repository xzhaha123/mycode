<?php

namespace common\models;

use Yii;
/**
 * 获取页面变量快捷方法
 * @author zhouxin
 */
class Request {
    public static function __callStatic($funcName, $args){
        static $_request = null;
        if($_request === null){
            $_request = Yii::app()->getRequest();
        }
        return call_user_func_array(array($_request, $funcName), $args);
    }
    //获取页面 $_GET $_POST 参数
    public static function getParam($param=false,$defaultValue=null) {
        if(!$param){
            return $_REQUEST;
        }else{
            return Yii::app()->getRequest()->getParam($param,$defaultValue);
        }
    }
    //设置get或者post参数
    public static function setParam($param,$value){
        $_GET[$param] = $value;
    }
    public static function setPost($param,$value){
        $_POST[$param] = $value;
    }
    //获取页面 $_GET 参数
    public static function getQuery($param=false,$defaultValue=null) {
        if(!$param){
            return $_GET;
        }else{
            return Yii::app()->getRequest()->getQuery($param,$defaultValue);
        }
    }
    //获取页面 $_POST 参数,支持name=value&name=value2&name=value3方式提交数组
    public static function getPost($param=false,$defaultValue=null) {
        if(!$param){
            return $_POST;
        }else{
            return Yii::app()->getRequest()->getPost($param,$defaultValue);
        }
    }
    //获取server参数
    public static function getServer($param=false,$defaultValue=null){
        if(!$param){
            return $_SERVER;
        }
        if(isset($_SERVER[$param])){
            return $_SERVER[$param] ? $_SERVER[$param] : $defaultValue;
        }
        return $defaultValue;
    }

    public static function isXmlRequest(){
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
            return true;
        }else{
            return false;
        }
    }

}