<?php

/**
 * Configuration personnalisée pour phpMyAdmin
 */

// Configuration pour HTTPS derrière un proxy
$cfg['ForceSSL'] = true;
$cfg['is_https'] = true;

// Configuration des sessions avec HTTPS
$cfg['SessionSavePath'] = '/tmp';

// Configuration pour les requêtes AJAX
$cfg['AjaxEnable'] = true;

// Configuration supplémentaire pour AJAX derrière un proxy
$cfg['TrustedProxies'] = array('172.19.0.0/16');
$cfg['AllowThirdPartyFraming'] = true;

// Configuration pour éviter les problèmes avec les sessions derrière un proxy
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_samesite', 'Lax');

// Configuration pour éviter les timeouts
$cfg['ExecTimeLimit'] = 300;
$cfg['MemoryLimit'] = '512M';

// Configuration des cookies sécurisés
$cfg['CookieSameSite'] = 'Lax';
$cfg['CookieSecure'] = true;
$cfg['CookieHttpOnly'] = true;

// Désactiver les vérifications qui peuvent poser problème derrière un proxy
$cfg['CheckConfigurationPermissions'] = false;

// Désactiver l'avertissement sur le stockage phpMyAdmin
$cfg['PmaNoRelation_DisableWarning'] = true;

// Configuration pour les uploads
$cfg['UploadDir'] = '/tmp';
$cfg['SaveDir'] = '/tmp';

// Configuration pour détecter HTTPS via les en-têtes de proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
  $_SERVER['HTTPS'] = 'on';
  $_SERVER['SERVER_PORT'] = 443;
}

// Configuration du stockage phpMyAdmin (optionnel - supprime l'avertissement)
$i = 1;
$cfg['Servers'][$i]['controluser'] = '';
$cfg['Servers'][$i]['controlpass'] = '';
$cfg['Servers'][$i]['pmadb'] = '';
$cfg['Servers'][$i]['bookmarktable'] = '';
$cfg['Servers'][$i]['relation'] = '';
$cfg['Servers'][$i]['table_info'] = '';
$cfg['Servers'][$i]['table_coords'] = '';
$cfg['Servers'][$i]['pdf_pages'] = '';
$cfg['Servers'][$i]['column_info'] = '';
$cfg['Servers'][$i]['history'] = '';
$cfg['Servers'][$i]['table_uiprefs'] = '';
$cfg['Servers'][$i]['tracking'] = '';
$cfg['Servers'][$i]['userconfig'] = '';
$cfg['Servers'][$i]['recent'] = '';
$cfg['Servers'][$i]['favorite'] = '';
$cfg['Servers'][$i]['users'] = '';
$cfg['Servers'][$i]['usergroups'] = '';
$cfg['Servers'][$i]['navigationhiding'] = '';
$cfg['Servers'][$i]['savedsearches'] = '';
$cfg['Servers'][$i]['central_columns'] = '';
$cfg['Servers'][$i]['designer_settings'] = '';
$cfg['Servers'][$i]['export_templates'] = '';

// Configuration supplémentaire pour éviter les problèmes AJAX
$cfg['ServerDefault'] = 1;
$cfg['MaxNavigationItems'] = 50;
$cfg['NavigationTreePointerEnable'] = true;

// Configuration pour corriger les problèmes JSON/AJAX
$cfg['SendErrorReports'] = 'never';
$cfg['ConsoleEnterExecutes'] = false;
$cfg['EnableAutocompleteForTablesAndColumns'] = false;

// Désactiver certaines fonctionnalités qui peuvent causer des problèmes
$cfg['ShowHint'] = false;
$cfg['ShowServerInfo'] = false;
