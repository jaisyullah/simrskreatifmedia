<?php

include_once('../lib/php/base_ini.inc.php');

nm_load_class('page', 'PageAdminSysAllConectionsCreateWizard');
$obj_page = new nmPageAdminSysAllConectionsCreateWizard();
$obj_page->Display();
        
?>