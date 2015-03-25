<?php 
class Log{
	// public $fileName = date("Y-m-d");
	public $fileName = '';
	public function logMessage($logLevel, $message){
		$handle = fopen($this->fileName, 'a');
		fwrite($handle, date("H:i:s")." ".$logLevel." ".$message."\n");
		fclose($handle);
	}
	public function info($message){
		$this->logMessage('Info', $message);
	}
	public function error($message){
		$this->logMessage('Error', $message);
	}
	public function __construct($logLevel, $message, $prefix = "log", $suffix = "txt"){
		$this->fileName = "data/{$prefix}-".date("Y-m-d").".{$suffix}";
		$this->logMessage($logLevel, $message);
	}
}
?>