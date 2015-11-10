<?php

function pp($v)
{
	$s = "";
	$s .= "<pre>";
	$s .= print_r($v, true);
	$s .= "</pre>";

	echo $s;
}

function ppv($v)
{
	ob_start();
	var_dump($v);
	pp(ob_get_clean());
}

function ppd()
{
	$trace = (new \Exception)->getTrace();
	ppv($trace);
}

function dateSql($time = null)
{
	$time = isset($time) ? $time : time();
	return date("Y-m-s H:i:s" ,$time);
}