<?php
namespace Dadi;

use core\LogAbstract;
use core\LogInterface;

Class Log extends LogAbstract implements LogInterface {

  public static function write() {
	return Log::Instance()->_write();
  }

  public static function log($str) {
    Log::Instance()->log[] = $str;
  }

  public function _write() {
	$d = new \DateTime();
	file_put_contents(BASEURI . '/log/' . $d->format('d.m.Y_H-i-s') . '.log', implode("\r\n", Log::Instance()->log));
	echo implode("\n", Log::Instance()->log);
  }
}

?>
