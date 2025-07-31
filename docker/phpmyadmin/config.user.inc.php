<?php
/**
 * Configuration personnalisée pour phpMyAdmin
 */

// Ne pas définir PmaAbsoluteUri ici car c'est géré par la variable d'environnement
// et ça évite la duplication des chemins

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
