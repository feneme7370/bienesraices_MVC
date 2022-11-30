<?php


function conectarDB(){
	$db = new mysqli('localhost','root', '', 'u272235147_bienesraices');
	if(!$db){
		echo "no se conecto";
		exit;
	}else{
		return $db;
	}
};
//conectarDB();
