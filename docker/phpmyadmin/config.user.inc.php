<?php
/**
 * Configuration personnalisée pour phpMyAdmin
 */

// Configuration pour fonctionner derrière un proxy
$cfg['PmaAbsoluteUri'] = 'https://api.bentoweb.fr/phpmyadmin/';

// Configuration des sessions
$cfg['SessionSavePath'] = '/tmp';

// Configuration pour les requêtes AJAX
$cfg['AjaxEnable'] = true;

// Configuration pour éviter les timeouts
$cfg['ExecTimeLimit'] = 300;
$cfg['MemoryLimit'] = '512M';

// Configuration des cookies
$cfg['CookieSameSite'] = 'Lax';
$cfg['CookieSecure'] = true;

// Désactiver les vérifications qui peuvent poser problème derrière un proxy
$cfg['CheckConfigurationPermissions'] = false;

// Configuration pour les uploads
$cfg['UploadDir'] = '/tmp';
$cfg['SaveDir'] = '/tmp';
