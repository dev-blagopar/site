<?php

$dir_path = array();

function scan($dir)
{
        $d = array('');
        $arr = opendir($dir);
 
        while($v = readdir($arr))
        {
                if($v == '.' or $v == '..') continue;
                if(!is_dir($dir.DIRECTORY_SEPARATOR.$v)){ $d[] = $v;};			
                if(is_dir($dir.DIRECTORY_SEPARATOR.$v)) {$d[$v] = scan($dir.DIRECTORY_SEPARATOR.$v);};	
   }
 
        return $d;
}

function find_php_dir($dir,$path)
{
	global $dir_path;
	foreach($dir as $key => $value) 	
	{if (is_array($value)){
		$next_dir = $value;
		ksort($next_dir);
		find_php_dir($next_dir,$path.DIRECTORY_SEPARATOR.$key);
	} else {
		$info = new SplFileInfo($value);
	    if ($info->getExtension() == 'php') {$dir_path[] = $path; break;};
		}
		}
	return;
};


$dir = $_SERVER['DOCUMENT_ROOT'];
$mas_dir = scan($dir);
ksort($mas_dir);

find_php_dir($mas_dir,$_SERVER['DOCUMENT_ROOT']);
$file_name = "php.ini";
$srcfile = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.$file_name;

echo '<!DOCTYPE html>';
echo '<html xmlns="""http://www.w3.org/1999/xhtml""" lang="""ru""">';
echo '<head>';
echo '</head>';
echo '<body>';
echo '<meta charset="utf-8">';
 foreach($dir_path as $key => $value) {
  $dstfile = $value.DIRECTORY_SEPARATOR.$file_name;
  if ($value == $_SERVER['DOCUMENT_ROOT']) continue;
  if (copy($srcfile, $dstfile)){ echo("Файл ".$srcfile." скопирован в папку ".$value."<br>");} else {
  echo("Ошибка! - Не удалось скопировать файл ".$srcfile." в папку ".$value."<br>");
  }
  } ;
echo '</body>';
echo '</html>';

?>