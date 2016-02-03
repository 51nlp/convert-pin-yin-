<?php
ini_set('error_reporting', E_ALL & ~E_USER_NOTICE);
ini_set('display_errors', 1);
define('DS', DIRECTORY_SEPARATOR);
define('DOCROOT', realpath(__DIR__) . DS);
define('SYSPATH', DOCROOT . 'utils' . DS);
require_once SYSPATH . 'encoded.php';
require_once SYSPATH . 'pinyin.php';
$data = '这是一个符合UTF-8标准拼音转换类，使用PHP编写（共25961字，包含20902个基本汉字+5059生僻字）'.
    '一起开始数：12345开始测试生僻字:㐀㐁㐄㐅㐆㐌㐖㐜';
echo "演示程序执行结果如下：<br/>";
echo "演示样本:<br/>{$data}<br/>";

echo "基本使用:<br/>";
echo \utils\pinyin::getPinYin($data);
echo "<br/>";
echo "结果分隔:<br/>";
echo \utils\pinyin::getPinYin($data, 'string', true);
echo "<br/>";
echo "结果指定分隔:<br/>";
echo \utils\pinyin::getPinYin($data, 'string', true, ',');
echo "<br/>";
echo "结果数组返回值:<br/>";
print_r(\utils\pinyin::getPinYin($data, 'array'));
echo "<br/>";
