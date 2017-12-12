<?php

namespace Huasituo\Ftp\Contracts;

interface Repository
{
	public function  connection();
	public function  reconnect();
	public function  disconnect();
}
