<?php

// Enrico Simonetti
// 2018-10-02
// enricosimonetti.com

// post execute actions

require_once 'modules/Configurator/Configurator.php';

$configuratorObj = new Configurator();
$configuratorObj->loadConfig();

$new_config_options = [];
$new_config_options['search_engine']['force_async_index'] = true;
$new_config_options['bulk_import_settings']['modules']['Users']['sugar_key_field'] = 'user_name';
$new_config_options['bulk_import_settings']['modules']['Users']['external_key_field'] = 'user_name';
$new_config_options['bulk_import_settings']['modules']['Users']['sql_query'] = 'select id from users where user_name = ?';
$new_config_options['bulk_import_settings']['modules']['Accounts']['sugar_key_field'] = 'id';
$new_config_options['bulk_import_settings']['modules']['Accounts']['external_key_field'] = 'external_key';
$new_config_options['bulk_import_settings']['modules']['Accounts']['sql_query'] = 'select id from accounts where id = ?';
$new_config_options['bulk_import_settings']['modules']['Accounts']['custom_before_save']['file'] = 'custom/modules/Accounts/AccountsBulkImport.php';
$new_config_options['bulk_import_settings']['modules']['Accounts']['custom_before_save']['class'] = 'AccountsBulkImport';
$new_config_options['bulk_import_settings']['modules']['Accounts']['custom_after_save']['file'] = 'custom/modules/Accounts/AccountsBulkImport.php';
$new_config_options['bulk_import_settings']['modules']['Accounts']['custom_after_save']['class'] = 'AccountsBulkImport';
$new_config_options['bulk_import_settings']['modules']['Contacts']['sugar_key_field'] = 'id';
$new_config_options['bulk_import_settings']['modules']['Contacts']['external_key_field'] = 'external_key';
$new_config_options['bulk_import_settings']['modules']['Contacts']['sql_query'] = 'select id from contacts where id = ?';
$new_config_options['bulk_import_settings']['modules']['Contacts']['custom_before_save']['file'] = 'custom/modules/Contacts/ContactsBulkImport.php';
$new_config_options['bulk_import_settings']['modules']['Contacts']['custom_before_save']['class'] = 'ContactsBulkImport';
$new_config_options['bulk_import_settings']['modules']['Cases']['sugar_key_field'] = 'id';
$new_config_options['bulk_import_settings']['modules']['Cases']['external_key_field'] = 'external_key';
$new_config_options['bulk_import_settings']['modules']['Cases']['sql_query'] = 'select id from cases where id = ?';
$new_config_options['bulk_import_settings']['relationships']['Contacts']['accounts']['external_key_field_left'] = 'left_external_key';
$new_config_options['bulk_import_settings']['relationships']['Contacts']['accounts']['external_key_field_right'] = 'right_external_key';
$new_config_options['bulk_import_settings']['relationships']['Cases']['accounts']['external_key_field_left'] = 'left_external_key';
$new_config_options['bulk_import_settings']['relationships']['Cases']['accounts']['external_key_field_right'] = 'right_external_key';

$configuratorObj->config['search_engine'] = $new_config_options['search_engine'];
$configuratorObj->config['bulk_import_settings'] = $new_config_options['bulk_import_settings'];

$configuratorObj->saveConfig();
