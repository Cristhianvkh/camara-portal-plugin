<?php
/**
 * Plugin Name: Portal de Trámites - Cámara de Empresarios del Combustible
 * Plugin URI: https://empresariosdelcombustible.com
 * Description: Portal profesional de solicitud y seguimiento de trámites para asociados de la Cámara
 * Version: 1.0.0
 * Author: Cámara de Empresarios del Combustible
 * Author URI: https://empresariosdelcombustible.com
 * License: GPL v2 or later
 * Text Domain: camara-portal
 * Domain Path: /languages
 * Requires at least: 5.8
 * Requires PHP: 7.4
 */

if (!defined('ABSPATH')) {
    exit;
}

// Definir constantes del plugin
define('CAMARA_PORTAL_VERSION', '1.0.0');
define('CAMARA_PORTAL_PATH', plugin_dir_path(__FILE__));
define('CAMARA_PORTAL_URL', plugin_dir_url(__FILE__));
define('CAMARA_PORTAL_ASSETS', CAMARA_PORTAL_URL . 'assets/');

// Autoloader para las clases del plugin
spl_autoload_register(function ($class) {
    $prefix = 'CamaraPortal\\';
    $base_dir = CAMARA_PORTAL_PATH . 'includes/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

require_once CAMARA_PORTAL_PATH . 'includes/class-plugin.php';

// Inicializar el plugin
add_action('plugins_loaded', function () {
    CamaraPortal\Plugin::getInstance();
});
