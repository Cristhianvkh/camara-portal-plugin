<?php
namespace CamaraPortal;

if (!defined('ABSPATH')) {
    exit;
}

class Database {
    public static function create_tables() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();

        // Tabla de trámites
        $sql_tramites = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}camara_tramites (
            ID bigint(20) unsigned NOT NULL auto_increment,
            user_id bigint(20) unsigned NOT NULL,
            service_type varchar(50) NOT NULL,
            status varchar(20) NOT NULL DEFAULT 'pendiente',
            code varchar(20) NOT NULL UNIQUE,
            title varchar(255) NOT NULL,
            description longtext,
            created_at datetime DEFAULT CURRENT_TIMESTAMP,
            updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (ID),
            KEY user_id (user_id),
            KEY status (status),
            KEY code (code)
        ) $charset_collate;";

        // Tabla de comentarios
        $sql_comments = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}camara_tramite_comments (
            ID bigint(20) unsigned NOT NULL auto_increment,
            tramite_id bigint(20) unsigned NOT NULL,
            user_id bigint(20) unsigned NOT NULL,
            comment_text longtext NOT NULL,
            created_at datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (ID),
            KEY tramite_id (tramite_id),
            KEY user_id (user_id)
        ) $charset_collate;";

        // Tabla de archivos
        $sql_attachments = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}camara_tramite_attachments (
            ID bigint(20) unsigned NOT NULL auto_increment,
            tramite_id bigint(20) unsigned NOT NULL,
            attachment_id bigint(20) unsigned NOT NULL,
            uploaded_by bigint(20) unsigned NOT NULL,
            uploaded_at datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (ID),
            KEY tramite_id (tramite_id),
            KEY attachment_id (attachment_id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql_tramites);
        dbDelta($sql_comments);
        dbDelta($sql_attachments);
    }

    public static function get_tramite($tramite_id) {
        global $wpdb;
        return $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM {$wpdb->prefix}camara_tramites WHERE ID = %d",
                $tramite_id
            )
        );
    }

    public static function get_user_tramites($user_id) {
        global $wpdb;
        return $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM {$wpdb->prefix}camara_tramites WHERE user_id = %d ORDER BY created_at DESC",
                $user_id
            )
        );
    }

    public static function create_tramite($data) {
        global $wpdb;
        $code = 'TRM-' . date('Y') . '-' . str_pad(mt_rand(1, 9999), 5, '0', STR_PAD_LEFT);

        $result = $wpdb->insert(
            $wpdb->prefix . 'camara_tramites',
            [
                'user_id' => $data['user_id'],
                'service_type' => $data['service_type'],
                'title' => $data['title'],
                'description' => $data['description'],
                'code' => $code,
                'status' => 'recibida',
            ],
            ['%d', '%s', '%s', '%s', '%s', '%s']
        );

        if ($result) {
            return [
                'id' => $wpdb->insert_id,
                'code' => $code,
            ];
        }
        return false;
    }

    public static function update_tramite_status($tramite_id, $status) {
        global $wpdb;
        return $wpdb->update(
            $wpdb->prefix . 'camara_tramites',
            ['status' => $status],
            ['ID' => $tramite_id],
            ['%s'],
            ['%d']
        );
    }
}
