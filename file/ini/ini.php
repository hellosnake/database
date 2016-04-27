<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/27
 * Time: 13:57
 * Description ini文件读写
 */
class ini
{
    public function read()
    {

    }

    /**
     * 写ini文件
     */
    public function write(Array $data)
    {
        $iniString = '';
        foreach($data as $key => $value)
        {
            $iniString .= "[{$key}]\r\n";
        }
    }
}