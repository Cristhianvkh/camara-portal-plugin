<?php
// Registrar template de página
add_filter('theme_page_templates', function($templates) {
    $templates['camara-portal-template'] = 'Portal de Trámites Completo';
    return $templates;
});

// Filtrar template para la página del portal
add_filter('page_template', function($template) {
    if (is_page('portal')) {
        return CAMARA_PORTAL_PATH . 'templates/portal-page.php';
    }
    return $template;
});

// Remover admin bar
add_action('init', function() {
    if (is_page('portal')) {
        show_admin_bar(false);
    }
});
