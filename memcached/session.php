<?php
    //mamceche user
    /*
    session_start();
    $_SESSION['test'] = '111111111111111111';

    function destroy()
    {
        if($_COOKIE[session_name()])
        {
            setcookie(session_name(), '', time() - 100, '/');
        }
    }
    */

    header('Content-Type:text/html; charset=utf-8');

    /**
     * 手动处理session 到数据库或Memcache中
     */
    class selfSession implements SessionHandlerInterface
    {
        private $_savePath = '';
        public function open($savePath, $sessionName)
        {
            $this->_savePath = $savePath;
            return true;
        }

        public function close()
        {
            return true;
        }

        public function read($key)
        {
            return true;
        }

        public function write($key, $value)
        {
            var_dump($this->_savePath, $key, $value);
            echo '走到这里来了write()';
            return true;
        }

        public function destroy($key)
        {
            return true;
        }

        public function gc($maxlifetime)
        {
            return true;
        }
    }


    function session()
    {
        session_set_save_handler(new selfSession(), true);
        session_start();
    }

    session();

    $_SESSION['aaaaaaaa'] = 'bbbbbbbbbbbbbb';



    var_dump(filemtime(dirname(__FILE__)));
    var_dump(getlastmod());//获取当前文件的最后一次修改时间
    var_dump(time());
