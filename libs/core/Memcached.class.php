<?php
if(!defined('SNAIL')) exit('Illegal Request');

class Memcached
{
	private $mem;
	private $server_host;
	private $server_port;

	public function __construct()
	{
		$this->server_host = MEMCACHE_HOST;
		$this->server_port = MEMCACHE_PORT;

		$this->mem = new Memcache;
		$this->connectServer($this->server_host, $this->server_port);
	}

	private function connectServer($server_host= 'localhost', $server_port = '12111') {
		$this->mem->connect($server_host, $server_port);
	}

	public function addServer($server_host= 'localhost', $server_port = '12111')
	{
		$this->mem->addServer($server_host,$server_port);
	}

	public function add($key, $val, $flag = 0, $expire = 0)
	{
		if($this->mem->add($key, $val, $flag, $expire)){
			return true;
		}
		return false;
	}

	public function set($key, $val, $flag = 0, $expire = 0)
	{
		if($this->mem->set($key, $val, $flag, $expire)){
			return true;
		}
		return false;
	}

	public function get($key)
	{
		$result = $this->mem->get($key);
		return $result;
	}

	public function close()
	{
		if($this->mem->close()){
			return true;
		}
		return false;
	}

	public function delete($key, $timeout = 0)
	{
		if($this->mem->delete($key, $timeout)){
			return true;   
		}
		return false;
	}

}


?>
