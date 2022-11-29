<?php


function conectarDB(){
	$db = new mysqli('localhost','root', '', 'bienesraices');
	if(!$db){
		echo "no se conecto";
		exit;
	}else{
		return $db;
	}
};
//conectarDB();
