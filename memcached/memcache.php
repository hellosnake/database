<?php

/**
 * session 存放在Memcache中
 */

class mem
{
    public function memcache()
    {
        $Memcache = new Memcache();
        //连接Memcache
        $Memcache->connect('localhost', '11211');
        //$Memcache->pconnect('localhost', '11211'); 长连接
        //$Memcache->addServer('url', 'prot'); 添加多个服务

        $Memcache->add('key1', 'value1', MEMCACHE_COMPRESSED, 3600); //3、标记对数据进行压缩 4、0为永不过期，设置时间不能超30天
        $Memcache->add('key1', 'addValue');
        print_r($Memcache->get('key1'));
    }

}
$session = new mem();
$session->memcache();
