<?php

include_once('../lib/php/base_ini.inc.php');

nm_load_class('page', 'PageAdminSysAllConectionsCreateWizard2');
$obj_page = new nmPageAdminSysAllConectionsCreateWizard2();
$obj_page->Display();
        
?>