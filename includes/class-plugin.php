<?php
namespace CamaraPortal;

if (!defined('ABSPATH')) {
    exit;
}

class Plugin {
    private static $instance = null;

    public static function getInstance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {
        $this->load_dependencies();
        $this->hooks();
    }

    private function load_dependencies() {
        require_once CAMARA_PORTAL_PATH . 'includes/class-database.php';
        require_once CAMARA_PORTAL_PATH . 'includes/class-rest-api.php';
        require_once CAMARA_PORTAL_PATH . 'includes/class-template.php';
    }

    private function hooks() {
        register_activation_hook(CAMARA_PORTAL_PATH . 'camara-portal.php', [$this, 'activate']);
        register_deactivation_hook(CAMARA_PORTAL_PATH . 'camara-portal.php', [$this, 'deactivate']);

        add_action('plugins_loaded', [$this, 'init']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_assets']);
        add_filter('show_admin_bar', [$this, 'hide_admin_bar']);
        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action('rest_api_init', [$this, 'register_rest_routes']);
        add_shortcode('camara_portal', [$this, 'render_portal_shortcode']);
    }

    public function activate() {
        Database::create_tables();
        flush_rewrite_rules();
    }

    public function deactivate() {
        flush_rewrite_rules();
    }

    public function init() {
        load_plugin_textdomain('camara-portal', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }

    public function enqueue_assets() {
        // Solo cargar en páginas con el shortcode
        if (!$this->has_portal_shortcode()) {
            return;
        }

        wp_enqueue_style(
            'camara-portal-main',
            CAMARA_PORTAL_ASSETS . 'css/portal.css',
            [],
            CAMARA_PORTAL_VERSION
        );

        wp_enqueue_style(
            'camara-portal-responsive',
            CAMARA_PORTAL_ASSETS . 'css/responsive.css',
            [],
            CAMARA_PORTAL_VERSION
        );

        wp_enqueue_script(
            'camara-portal-main',
            CAMARA_PORTAL_ASSETS . 'js/portal.js',
            ['jquery'],
            CAMARA_PORTAL_VERSION,
            true
        );

        wp_localize_script('camara-portal-main', 'camaraPortal', [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('camara_portal_nonce'),
            'homeUrl' => home_url(),
            'apiUrl' => rest_url('camara-portal/v1/'),
            'currentUser' => get_current_user_id(),
        ]);
    }

    public function enqueue_admin_assets() {
        wp_enqueue_style(
            'camara-portal-admin',
            CAMARA_PORTAL_ASSETS . 'css/admin.css',
            [],
            CAMARA_PORTAL_VERSION
        );
    }

    public function add_admin_menu() {
        add_menu_page(
            'Portal de Trámites',
            'Portal Trámites',
            'manage_options',
            'camara-portal',
            [$this, 'admin_dashboard'],
            'dashicons-clipboard',
            25
        );

        add_submenu_page(
            'camara-portal',
            'Trámites',
            'Trámites',
            'manage_options',
            'camara-portal-tramites',
            [$this, 'admin_tramites']
        );

        add_submenu_page(
            'camara-portal',
            'Servicios',
            'Servicios',
            'manage_options',
            'camara-portal-servicios',
            [$this, 'admin_servicios']
        );
    }

    public function admin_dashboard() {
        include CAMARA_PORTAL_PATH . 'templates/admin/dashboard.php';
    }

    public function admin_tramites() {
        include CAMARA_PORTAL_PATH . 'templates/admin/tramites.php';
    }

    public function admin_servicios() {
        include CAMARA_PORTAL_PATH . 'templates/admin/servicios.php';
    }

    public function hide_admin_bar($show) {
        if (!current_user_can('manage_options')) {
            return false;
        }
        return $show;
    }

    public function register_rest_routes() {
        RestAPI::register_routes();
    }

    public function render_portal_shortcode() {
        if (!is_user_logged_in()) {
            return $this->render_login_form();
        }
        return $this->render_portal_content();
    }

    private function render_login_form() {
        ob_start();
        include CAMARA_PORTAL_PATH . 'templates/portal-login.php';
        return ob_get_clean();
    }

    private function render_portal_content() {
        ob_start();
        include CAMARA_PORTAL_PATH . 'templates/portal-content.php';
        return ob_get_clean();
    }

    private function has_portal_shortcode() {
        global $post;
        if (!$post) {
            return false;
        }
        return has_shortcode($post->post_content, 'camara_portal');
    }
}
