<?php
namespace CamaraPortal;

if (!defined('ABSPATH')) {
    exit;
}

class RestAPI {
    public static function register_routes() {
        register_rest_route('camara-portal/v1', '/tramites', [
            'methods' => 'GET',
            'callback' => [__CLASS__, 'get_tramites'],
            'permission_callback' => function() {
                return is_user_logged_in();
            }
        ]);

        register_rest_route('camara-portal/v1', '/tramites/(?P<id>\\d+)', [
            'methods' => 'GET',
            'callback' => [__CLASS__, 'get_tramite'],
            'permission_callback' => function() {
                return is_user_logged_in();
            }
        ]);

        register_rest_route('camara-portal/v1', '/tramites', [
            'methods' => 'POST',
            'callback' => [__CLASS__, 'create_tramite'],
            'permission_callback' => function() {
                return is_user_logged_in();
            }
        ]);
    }

    public static function get_tramites($request) {
        $user_id = get_current_user_id();
        $tramites = Database::get_user_tramites($user_id);
        return new \WP_REST_Response($tramites, 200);
    }

    public static function get_tramite($request) {
        $tramite_id = $request['id'];
        $tramite = Database::get_tramite($tramite_id);

        if (!$tramite) {
            return new \WP_REST_Response(['error' => 'No encontrado'], 404);
        }

        if ($tramite->user_id != get_current_user_id()) {
            return new \WP_REST_Response(['error' => 'No autorizado'], 403);
        }

        return new \WP_REST_Response($tramite, 200);
    }

    public static function create_tramite($request) {
        $params = $request->get_json_params();
        $user_id = get_current_user_id();

        $data = [
            'user_id' => $user_id,
            'service_type' => sanitize_text_field($params['service_type']),
            'title' => sanitize_text_field($params['title']),
            'description' => wp_kses_post($params['description']),
        ];

        $result = Database::create_tramite($data);

        if ($result) {
            return new \WP_REST_Response($result, 201);
        }

        return new \WP_REST_Response(['error' => 'Error al crear'], 500);
    }
}
