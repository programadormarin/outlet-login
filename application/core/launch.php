<?php
date_default_timezone_set('America/Sao_Paulo');

require 'application/br.com.lcobucci.action-mapper/autoloader/ActionMapperAutoLoader.php';
require 'application/br.com.lcobucci.display-objects/autoloader/DisplayObjectsAutoloader.php';
require 'application/core/LoginAutoloader.php';
require 'application/org.outlet-orm/autoloader/OutletAutoloader.php';

ActionMapperAutoLoader::register();
DisplayObjectsAutoloader::register();
LoginAutoloader::register();
OutletAutoloader::register();

UIComponent::appendHtmlDir(dirname(__FILE__) . '/../../templates/');
UIComponent::appendHtmlDir(dirname(__FILE__) . '/../../../display-objects/templates/');

//Outlet::init(dirname(__FILE__) . '/../../config/outlet-config.php');
Outlet::init(dirname(__FILE__) . '/../../config/db.xml');
?>