<?php require_once("../tophead.php"); require_once("../counters.php"); ?>
<META http-equiv=Content-Type content="text/html; charset=windows-1251">
<TITLE> Obninsk DOC2TEXT converter v 1.0.alpha by Max Brown</TITLE>
Для отображения произвольного .doc-файла вызовите index.php с параметром ?file=ИМЯ_ФАЙЛА.doc<br />
Инструкции по чтению содержимого файла в какую-либо переменную приведены ниже.<br />
<?php
/*

Установка скрипта: просто скопируйте файл obninsk_doc.php в какую-либо директорию

Инициализация: require_once("obninsk_doc.php");
(или, если функция вызывается скриптом, стартовавшим из другой директории, 
то require_once("ПУТЬ\obninsk_doc.php"); , где ПУТЬ - это путь к папке, 
в которую Вы скопировали мой скрипт относительно той папки, из которой запустился 
Ваш скрипт, использующий obninsk_doc) 
Например: require_once("../includes/obninsk_doc.php");

Использование скрипта:

$text_content = obninsk_doc($doc_file_content, $saveHTML, $continue_on_break); , где:

$text_content - строка, в которой Вы хотите запомнить результат работы функции,
то есть, текстовое содержимое вордовского файла

$doc_file_content - строка, в которую Вы предварительно считали БИНАРНОЕ содержимое
вордовского файла. Как это сделать - смотрите в идущем в конце этого файла php-коде.

$saveHTML - необязательный параметр, определяющий, должен ли скрипт попытаться
сохранить столько гипернтекстовых элементов, сколько данная его версии знает.
По умолчанию $saveHTML=1, то есть, да, попытаться.

$continue_on_break - необязательный параметр, определяющий, должен ли скрипт,
обнаружив в вордовском файле первый разрыв текста, попытаться найти дальше его продолжение.
По умолчанию это параметр равен 1, что чревато попаданием в конец полученного текста
всяческого мусора. С другой стороны, задание этого параметра равным 0 может привести
к тому, что Вы получите только начало текста, а продолжение "проглотится".

*/
require_once("obninsk_doc.php");
if(isset($_GET["file"])) $filename=$_GET["file"]; else $filename="readme.doc"; 
if( strpos($filename, "/") !== false ) die("Hack atempt detected!");
if( $fileext=substr($filename, strrpos($filename, ".") ) !== ".doc" ) die("Поддерживается только чтение вордовских документов");
$s="";
// Получаем имя вордовского файла, который хотим отобразить на странице. 
// Если это имя не задано, то пусть это будет файл "readme.doc"
$fp = fopen($filename,'rb'); if(!$fp) die("file \"$filename\" not found!");
// Открываем этот файл для чтения
while (($fp != false) && !feof($fp)) $s.=fread($fp,filesize($filename));
// Считываем всё его бинарное содержимое в переменную $s
fclose($fp); // Закрываем файл. А Вы что подумали?

// Преобразуем содержимое этого файла в текст и выводим на страницу:
$text_with_html=obninsk_doc($s); 
echo "<br>Пример отображения скриптом файла <a href=\"$filename\">$filename</a> с параметрами по умолчанию: <hr color=red>".$text_with_html."<hr color=red>"; 

$text_without_html=obninsk_doc($s, 0); 
echo "<br>Пример отображения скриптом файла <a href=\"$filename\">$filename</a> без сохранения элементов гипертекста: <hr color=red>".$text_without_html."<hr color=red>"; 

$text_without_html_breaked=obninsk_doc($s,0,0); 
echo "<br>Пример отображения скриптом файла <a href=\"$filename\">$filename</a> без сохранения элементов гипертекста и с прекращением анализа на первом же разрыве текста: <br />";
echo "<hr color=red>".$text_without_html_breaked."<hr color=red>"; 
require_once("../down.htm"); 
exit; 
?>