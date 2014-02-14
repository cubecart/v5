<?php
if(!defined('CC_DS')) die('Access Denied');

require 'modules/gateway/PayVector/PayVector/Core/PayVector.php';

$GLOBALS['db'] -> misc(PayVectorSQL::createGEP_EntryPoints());
$GLOBALS['db'] -> misc(PayVectorSQL::createCRT_CrossReference());


$module		= new Module(__FILE__, $_GET['module'], 'admin/index.tpl', true);
$page_content = $module->display();