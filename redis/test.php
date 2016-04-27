<?php
	$redis = new Redis();
	$result = $redis->connect('127.0.0.1', 6379);
	

	//set  get  
	/*
	$redis->set('key1', 'value1');
	$result = $redis->get('key1');
	*/

	//mset mget  同时设置、删除多个键值

	/*
	$setArray = array(
		'key1' => 'value1',
		'key2' => 'value2',
		'key3' => 'value3',
		'key4' => 'value4',
	);
	
	$redis->mset($setArray);
	*/
	
	//$redis->del(array('key1', 'key2', 'key3', 'key4',));
	//$result = $redis->mget(array('key1', 'key2', 'key3', 'key4',));

	

	//$redis->FLUSHALL(); //删除所有key
	//$redis->randomkey(); //随机获取key
	//$keys = $redis->keys('*');
	
	//$redis->flushdb();# 删除当前数据库所有key
	
	/**
	 * TTL 生存时间
	 */
	//$redis->expire('key1', 5);
	
	//$redis->ttl('key1');
	//sleep(5);


	/**
	 * MOVE
	 */
	
	/*
	$redis->select(0);//默认使用数据库0
	
	var_dump($redis->move('key1', 1));
	
	
	$redis->select(1);
	$result = $redis->mget(array('key1', 'key2', 'key3', 'key4'));
	var_dump($result);

	$redis->select(0);
	var_dump($redis->exists('key1'));
	*/

	/**
	 * rename key重命名  newkey 存在时会覆盖
	 */

	/*
	$redis->rename('key1', 'key1');

	var_dump($redis->exists('key1'));
	*/

	
	/**
	 * renamenx key重命名 返回true/false newkey 存在时会报错返回false
	 */

	 /*
	$redis->renamenx('key1', 'key5');

	var_dump($redis->exists('key1'));
	var_dump($redis->exists('key5'));
	*/

	/**
	 * type  数据类型
	 * none(key不存在) int(0)
	 * string(字符串) int(1)
	 * list(列表) int(3)
	 * set(集合) int(2)
	 * zset(有序集) int(4)
	 * hash(哈希表) int(5)
	 */
	
	/*
	$redis->flushall();

	$redis->set('string', '这是字符串类型');
	echo('字符串类型=============');
	var_dump($redis->get('string'));
	var_dump($redis->type('string'));
	echo('=============');

	$redis->sadd('set', '这是集合类型');
	echo('集合类型=============');
	//var_dump($redis->get('string'));
	var_dump($redis->type('set'));
	echo('=============');

	$redis->lpush('list', '这是个列表');
	echo('列表类型=============');
	//var_dump($redis->get('list'));
	var_dump($redis->type('list'));
	echo('=============');

	$redis->zadd('zset', 1, '有序集合');
	echo('有序集合类型=============');
	var_dump($redis->zRange('zset', 0, -1));
	var_dump($redis->type('zset'));
	echo('=============');

	$redis->hset('hash', 'google', '哈希表');
	echo('哈希表类型=============');
	var_dump($redis->hget('hash', 'google'));
	var_dump($redis->type('hash'));
	echo('=============');
	*/
	
	/**
	 * expire  设置key生存时间
	 * 语法 $redis->expire('keyName', (int)time);
	 * $redis->ttl('keyName'); 查看生存时间
	 */

	 /**
	 * expireat  设置key生存时间
	 * 语法 $redis->expire('keyName', time(时间戳));
	 * $redis->ttl('keyName'); 查看生存时间
	 */

	/**
	 * object  OBJECT命令允许从内部察看给定key的Redis对象。
	 * REFCOUNT 返回给定key引用所储存的值次数
	 * ENCODING 返回给定key锁储存的值所使用的内部表示(类型)
	 * IDLETIME 返回给定key自储存以来的空转时间 (没有被操作的时间)
	 */
	 /*
	 $redis->select(1);
	 $redis->set('key', 'value');
	 $result = $redis->object('REFCOUNT', 'key');

	 $result = $redis->object('ENCODING', 'key');

	 sleep(5);
	 $result = $redis->object('IDLETIME', 'key');
	 var_dump($result);
	 */

	/**
	 * persist 移除给定key的生存时间
	 */
	/*
	 $redis->select(2);
	 $redis->set('key', 'value');
	 $redis->expire('key', 5);
	 var_dump($redis->ttl('key'));

	 $redis->persist('key');
	 var_dump($redis->ttl('key'));
	 var_dump($redis->get('key'));
	 */

	/**
	 * sort 排序 分页等
	 */
	 $redis->select(3);
	 $redis->flushall();
	 
	 //值为数字正序排序
	 /*
	 $redis->lpush('key1', 4);
	 $redis->lpush('key1', 5);
	 $redis->lpush('key1', 2);
	 $redis->lpush('key1', 3);
	 
	 $result = $redis->sort('key1');
	 
	 $redis->LPUSH('website', "www.reddit.com");
	 $redis->LPUSH('website', "www.slashdot.com");
	 $redis->LPUSH('website', "www.infoq.com");

	 var_dump($redis->SORT('key1'));
	 */
	$redis->LPUSH('user_id', 1);//(integer) 1
	$redis->SET('user_name_1', 'admin');
	$redis->SET('user_level_1',9999);

	# huangz
	$redis->LPUSH('user_id', 2);//(integer) 2
	$redis->SET('user_name_2', 'huangz');
	$redis->SET('user_level_2', 10);

	# jack
	$redis->LPUSH('user_id', 59230);//(integer) 3
	$redis->SET('user_name_59230','jack');
	$redis->SET('user_level_59230', 3);

	# hacker
	$redis->LPUSH('user_id', 222);  //(integer) 4
	$redis->SET('user_name_222', 'hacker');
	$redis->SET('user_level_222', 9999);
	//获取多个值
	//BY 排序字段  sort  排序方式
	/*
	$redisSortOptions = array('BY' => 'user_level_*', 'SORT' => 'DESC', 'GET' => array('user_name_*', 'user_level_*'));
	print_r($redis->sort('user_id', $redisSortOptions));
	*/
	
	$redisSortOptions = array('BY' => 'user_level_*', 'STORE' => 'testKey1', 'GET' => array('user_name_*', 'user_level_*'));

	var_dump($redis->sort('user_id', $redisSortOptions));

	print_r($redis->lrange('testKey1', 0, -1));