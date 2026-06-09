<?php
namespace CamaraPortal;

if (!defined('ABSPATH')) {
    exit;
}

class Template {
    public static function get_template($template_name, $args = []) {
        $template_path = CAMARA_PORTAL_PATH . 'templates/' . $template_name . '.php';

        if (!file_exists($template_path)) {
            return '';
        }

        extract($args);
        ob_start();
        include $template_path;
        return ob_get_clean();
    }

    public static function get_service_icon($service_type) {
        $icons = [
            'inspecciones' => '📋',
            'marchamado' => '🚛',
            'tramitologia' => '📄',
            'asesorias' => '💼',
            'capacitaciones' => '📚',
            'seguros' => '🛡️',
        ];

        return $icons[$service_type] ?? '📌';
    }

    public static function get_status_label($status) {
        $labels = [
            'recibida' => 'Recibida',
            'en_proceso' => 'En Proceso',
            'completada' => 'Completada',
            'rechazada' => 'Rechazada',
            'pendiente' => 'Pendiente',
        ];

        return $labels[$status] ?? $status;
    }

    public static function get_status_class($status) {
        $classes = [
            'recibida' => 'status-recibida',
            'en_proceso' => 'status-en-proceso',
            'completada' => 'status-completada',
            'rechazada' => 'status-rechazada',
            'pendiente' => 'status-pendiente',
        ];

        return $classes[$status] ?? '';
    }
}
