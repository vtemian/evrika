<?php require_once("../tophead.php"); require_once("../counters.php"); ?>
<META http-equiv=Content-Type content="text/html; charset=windows-1251">
<TITLE> Obninsk DOC2TEXT converter v 1.0.alpha by Max Brown</TITLE>
��� ����������� ������������� .doc-����� �������� index.php � ���������� ?file=���_�����.doc<br />
���������� �� ������ ����������� ����� � �����-���� ���������� ��������� ����.<br />
<?php
/*

��������� �������: ������ ���������� ���� obninsk_doc.php � �����-���� ����������

�������������: require_once("obninsk_doc.php");
(���, ���� ������� ���������� ��������, ������������ �� ������ ����������, 
�� require_once("����\obninsk_doc.php"); , ��� ���� - ��� ���� � �����, 
� ������� �� ����������� ��� ������ ������������ ��� �����, �� ������� ���������� 
��� ������, ������������ obninsk_doc) 
��������: require_once("../includes/obninsk_doc.php");

������������� �������:

$text_content = obninsk_doc($doc_file_content, $saveHTML, $continue_on_break); , ���:

$text_content - ������, � ������� �� ������ ��������� ��������� ������ �������,
�� ����, ��������� ���������� ����������� �����

$doc_file_content - ������, � ������� �� �������������� ������� �������� ����������
����������� �����. ��� ��� ������� - �������� � ������ � ����� ����� ����� php-����.

$saveHTML - �������������� ��������, ������������, ������ �� ������ ����������
��������� ������� ��������������� ���������, ������� ������ ��� ������ �����.
�� ��������� $saveHTML=1, �� ����, ��, ����������.

$continue_on_break - �������������� ��������, ������������, ������ �� ������,
��������� � ���������� ����� ������ ������ ������, ���������� ����� ������ ��� �����������.
�� ��������� ��� �������� ����� 1, ��� ������� ���������� � ����� ����������� ������
���������� ������. � ������ �������, ������� ����� ��������� ������ 0 ����� ��������
� ����, ��� �� �������� ������ ������ ������, � ����������� "�����������".

*/
require_once("obninsk_doc.php");
if(isset($_GET["file"])) $filename=$_GET["file"]; else $filename="readme.doc"; 
if( strpos($filename, "/") !== false ) die("Hack atempt detected!");
if( $fileext=substr($filename, strrpos($filename, ".") ) !== ".doc" ) die("�������������� ������ ������ ���������� ����������");
$s="";
// �������� ��� ����������� �����, ������� ����� ���������� �� ��������. 
// ���� ��� ��� �� ������, �� ����� ��� ����� ���� "readme.doc"
$fp = fopen($filename,'rb'); if(!$fp) die("file \"$filename\" not found!");
// ��������� ���� ���� ��� ������
while (($fp != false) && !feof($fp)) $s.=fread($fp,filesize($filename));
// ��������� �� ��� �������� ���������� � ���������� $s
fclose($fp); // ��������� ����. � �� ��� ��������?

// ����������� ���������� ����� ����� � ����� � ������� �� ��������:
$text_with_html=obninsk_doc($s); 
echo "<br>������ ����������� �������� ����� <a href=\"$filename\">$filename</a> � ����������� �� ���������: <hr color=red>".$text_with_html."<hr color=red>"; 

$text_without_html=obninsk_doc($s, 0); 
echo "<br>������ ����������� �������� ����� <a href=\"$filename\">$filename</a> ��� ���������� ��������� �����������: <hr color=red>".$text_without_html."<hr color=red>"; 

$text_without_html_breaked=obninsk_doc($s,0,0); 
echo "<br>������ ����������� �������� ����� <a href=\"$filename\">$filename</a> ��� ���������� ��������� ����������� � � ������������ ������� �� ������ �� ������� ������: <br />";
echo "<hr color=red>".$text_without_html_breaked."<hr color=red>"; 
require_once("../down.htm"); 
exit; 
?>