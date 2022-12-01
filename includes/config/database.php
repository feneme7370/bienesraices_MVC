<?php


function conectarDB(){
	//$db = new mysqli('localhost','u272235147_bienesraices', 'Mate1882!hostinger', 'u272235147_bienesraices');
	$db = new mysqli('localhost','root', '', 'u272235147_bienesraices');
	if(!$db){
		echo "no se conecto";
		exit;
	}else{
		return $db;
	}
};
//conectarDB();
