<?php
/**
 * Template Name: Portal de Trámites
 * Description: Página completa del portal - zona privada
 */

if (!defined('ABSPATH')) {
    exit;
}

// Verificar que el usuario esté logueado
if (!is_user_logged_in()) {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portal de Trámites - Cámara de Empresarios del Combustible</title>
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background: linear-gradient(135deg, #061E4F 0%, #0a2e6b 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }
            .login-container {
                background: white;
                border-radius: 12px;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
                width: 100%;
                max-width: 420px;
                padding: 40px;
            }
            .login-header {
                text-align: center;
                margin-bottom: 30px;
            }
            .login-logo {
                font-size: 48px;
                margin-bottom: 15px;
            }
            .login-title {
                color: #061E4F;
                font-size: 24px;
                font-weight: 600;
                margin-bottom: 5px;
            }
            .login-subtitle {
                color: #5f6061;
                font-size: 14px;
            }
            .login-form {
                margin-bottom: 20px;
            }
            .form-group {
                margin-bottom: 20px;
            }
            .form-group label {
                display: block;
                margin-bottom: 8px;
                color: #061E4F;
                font-weight: 600;
                font-size: 14px;
            }
            .form-group input {
                width: 100%;
                padding: 12px;
                border: 1px solid #e8e8e8;
                border-radius: 6px;
                font-size: 14px;
                transition: border-color 0.3s;
            }
            .form-group input:focus {
                outline: none;
                border-color: #901a1d;
                box-shadow: 0 0 0 3px rgba(144, 26, 29, 0.1);
            }
            .btn-login {
                width: 100%;
                padding: 12px;
                background: linear-gradient(135deg, #901a1d 0%, #830d10 100%);
                color: white;
                border: none;
                border-radius: 6px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s;
            }
            .btn-login:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(144, 26, 29, 0.3);
            }
            .login-footer {
                text-align: center;
                font-size: 12px;
                color: #5f6061;
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <div class="login-header">
                <div class="login-logo">🏛️</div>
                <h1 class="login-title">Cámara de Empresarios</h1>
                <p class="login-subtitle">Portal de Trámites</p>
            </div>
            <form method="post" action="<?php echo esc_url(wp_login_url()); ?>" class="login-form">
                <div class="form-group">
                    <label for="user_login">Usuario o Email</label>
                    <input type="text" name="log" id="user_login" placeholder="usuario@ejemplo.com" required>
                </div>
                <div class="form-group">
                    <label for="user_pass">Contraseña</label>
                    <input type="password" name="pwd" id="user_pass" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn-login">Iniciar Sesión</button>
            </form>
            <div class="login-footer">
                <p>¿Problemas para acceder? Contacta al administrador.</p>
            </div>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Si está logueado, mostrar el portal completo
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Trámites - Cámara de Empresarios del Combustible</title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo CAMARA_PORTAL_ASSETS; ?>css/portal.css">
    <link rel="stylesheet" href="<?php echo CAMARA_PORTAL_ASSETS; ?>css/responsive.css">
</head>
<body class="camara-portal-body" style="margin: 0; padding: 0;">
    <div class="camara-portal-container">
        <!-- SIDEBAR -->
        <aside class="camara-portal-sidebar">
            <div class="camara-portal-logo">
                <div class="camara-portal-logo-text">
                    <strong>CÁMARA</strong>
                    <small>Empresarios del Combustible</small>
                </div>
            </div>
            <nav class="camara-portal-nav">
                <li class="camara-portal-nav-item">
                    <a href="#dashboard" class="camara-portal-nav-link active" data-section="dashboard">
                        <span class="camara-portal-nav-icon">📊</span>
                        <span>Panel Principal</span>
                    </a>
                </li>
                <li class="camara-portal-nav-item">
                    <a href="#tramites" class="camara-portal-nav-link" data-section="tramites">
                        <span class="camara-portal-nav-icon">📋</span>
                        <span>Mis Trámites</span>
                    </a>
                </li>
                <li class="camara-portal-nav-item">
                    <a href="#nueva-solicitud" class="camara-portal-nav-link" data-section="nueva-solicitud">
                        <span class="camara-portal-nav-icon">✏️</span>
                        <span>Nueva Solicitud</span>
                    </a>
                </li>
                <li class="camara-portal-nav-item">
                    <a href="#perfil" class="camara-portal-nav-link" data-section="perfil">
                        <span class="camara-portal-nav-icon">👤</span>
                        <span>Mi Perfil</span>
                    </a>
                </li>
                <li class="camara-portal-nav-item" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid rgba(255, 255, 255, 0.2);">
                    <a href="<?php echo wp_logout_url(home_url()); ?>" class="camara-portal-nav-link">
                        <span class="camara-portal-nav-icon">🚪</span>
                        <span>Cerrar Sesión</span>
                    </a>
                </li>
            </nav>
        </aside>

        <!-- CONTENIDO PRINCIPAL -->
        <main class="camara-portal-content">
            <div class="camara-portal-header">
                <div>
                    <h1 class="camara-portal-title" id="page-title">Panel de Trámites</h1>
                    <p class="camara-portal-subtitle" id="page-subtitle">Bienvenido al portal de servicios de la Cámara</p>
                </div>
                <div class="camara-portal-user-info">
                    <div class="camara-portal-user-avatar">
                        <?php echo strtoupper(substr(wp_get_current_user()->user_firstname ?: wp_get_current_user()->user_login, 0, 1)); ?>
                    </div>
                    <div class="camara-portal-user-name">
                        <strong><?php echo wp_get_current_user()->display_name; ?></strong>
                        <small><?php echo wp_get_current_user()->user_email; ?></small>
                    </div>
                </div>
            </div>

            <!-- SECCIÓN: DASHBOARD -->
            <section id="dashboard" class="portal-section active">
                <h2 style="color: #061E4F; margin: 30px 0 20px 0; font-size: 20px; font-weight: 600;">Servicios Disponibles</h2>
                <div class="camara-portal-servicios">
                    <div class="camara-portal-servicio-card" data-service="inspecciones">
                        <div class="camara-portal-servicio-icon">📋</div>
                        <div class="camara-portal-servicio-name">Inspecciones</div>
                        <div class="camara-portal-servicio-desc">Solicita una inspección técnica</div>
                    </div>
                    <div class="camara-portal-servicio-card" data-service="marchamado">
                        <div class="camara-portal-servicio-icon">🚛</div>
                        <div class="camara-portal-servicio-name">Marchamado</div>
                        <div class="camara-portal-servicio-desc">Solicita el servicio de marchamado</div>
                    </div>
                    <div class="camara-portal-servicio-card" data-service="tramitologia">
                        <div class="camara-portal-servicio-icon">📄</div>
                        <div class="camara-portal-servicio-name">Tramitología</div>
                        <div class="camara-portal-servicio-desc">Asistencia en trámites legales</div>
                    </div>
                    <div class="camara-portal-servicio-card" data-service="asesorias">
                        <div class="camara-portal-servicio-icon">💼</div>
                        <div class="camara-portal-servicio-name">Asesorías</div>
                        <div class="camara-portal-servicio-desc">Asesoría profesional especializada</div>
                    </div>
                    <div class="camara-portal-servicio-card" data-service="capacitaciones">
                        <div class="camara-portal-servicio-icon">📚</div>
                        <div class="camara-portal-servicio-name">Capacitaciones</div>
                        <div class="camara-portal-servicio-desc">Programas de capacitación</div>
                    </div>
                    <div class="camara-portal-servicio-card" data-service="seguros">
                        <div class="camara-portal-servicio-icon">🛡️</div>
                        <div class="camara-portal-servicio-name">Seguros</div>
                        <div class="camara-portal-servicio-desc">Información sobre seguros</div>
                    </div>
                </div>
            </section>

            <!-- SECCIÓN: MIS TRÁMITES -->
            <section id="tramites" class="portal-section" style="display: none;">
                <h2 style="color: #061E4F; margin: 0 0 20px 0; font-size: 20px; font-weight: 600;">Mis Trámites</h2>
                <div class="camara-portal-card">
                    <table class="camara-portal-tramites-table">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Servicio</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 40px; color: #5f6061;">
                                    <p style="font-size: 16px; margin-bottom: 10px;">📭 No hay trámites aún</p>
                                    <p style="font-size: 13px;">Crea una nueva solicitud para comenzar</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- SECCIÓN: NUEVA SOLICITUD -->
            <section id="nueva-solicitud" class="portal-section" style="display: none;">
                <h2 style="color: #061E4F; margin: 0 0 20px 0; font-size: 20px; font-weight: 600;">Nueva Solicitud de Trámite</h2>
                <div class="camara-portal-form">
                    <form id="form-nueva-solicitud">
                        <div class="camara-portal-form-group">
                            <label>Tipo de Servicio</label>
                            <select name="service_type" required style="width: 100%; padding: 10px 12px; border: 1px solid #e8e8e8; border-radius: 4px; font-size: 14px;">
                                <option value="">-- Selecciona un servicio --</option>
                                <option value="inspecciones">Inspecciones</option>
                                <option value="marchamado">Marchamado</option>
                                <option value="tramitologia">Tramitología</option>
                                <option value="asesorias">Asesorías</option>
                                <option value="capacitaciones">Capacitaciones</option>
                                <option value="seguros">Seguros</option>
                            </select>
                        </div>
                        <div class="camara-portal-form-group">
                            <label>Asunto</label>
                            <input type="text" name="title" placeholder="Describe brevemente tu solicitud" required>
                        </div>
                        <div class="camara-portal-form-group">
                            <label>Descripción Detallada</label>
                            <textarea name="description" placeholder="Proporciona más detalles sobre tu solicitud" required style="width: 100%; padding: 10px 12px; border: 1px solid #e8e8e8; border-radius: 4px; font-family: inherit; font-size: 14px; resize: vertical; min-height: 120px;"></textarea>
                        </div>
                        <button type="submit" class="camara-portal-btn camara-portal-btn-primary">Enviar Solicitud</button>
                    </form>
                </div>
            </section>

            <!-- SECCIÓN: PERFIL -->
            <section id="perfil" class="portal-section" style="display: none;">
                <h2 style="color: #061E4F; margin: 0 0 20px 0; font-size: 20px; font-weight: 600;">Mi Perfil</h2>
                <div class="camara-portal-card">
                    <div style="padding: 20px;">
                        <div style="display: flex; gap: 20px; align-items: flex-start;">
                            <div class="camara-portal-user-avatar" style="width: 80px; height: 80px; font-size: 32px; border-radius: 50%;">
                                <?php echo strtoupper(substr(wp_get_current_user()->user_firstname ?: wp_get_current_user()->user_login, 0, 1)); ?>
                            </div>
                            <div>
                                <h3 style="color: #061E4F; margin-bottom: 10px;"><?php echo wp_get_current_user()->display_name; ?></h3>
                                <p style="margin: 5px 0; color: #5f6061;"><strong>Email:</strong> <?php echo wp_get_current_user()->user_email; ?></p>
                                <p style="margin: 5px 0; color: #5f6061;"><strong>Usuario:</strong> <?php echo wp_get_current_user()->user_login; ?></p>
                                <p style="margin: 5px 0; color: #5f6061;"><strong>Miembro desde:</strong> <?php echo date_i18n('d \d\e F \d\e Y', strtotime(wp_get_current_user()->user_registered)); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- INFO -->
            <section style="margin-top: 40px; margin-bottom: 40px;">
                <div class="camara-portal-alert camara-portal-alert-info">
                    <span class="camara-portal-alert-icon">ℹ️</span>
                    <div>
                        <strong>Información importante:</strong> Todos tus trámites son confidenciales y seguros. El equipo de la Cámara procesará tu solicitud en el menor tiempo posible.
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        // Navegación entre secciones
        document.querySelectorAll('.camara-portal-nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const section = this.dataset.section;
                
                // Ocultar todas las secciones
                document.querySelectorAll('.portal-section').forEach(s => s.style.display = 'none');
                
                // Mostrar la sección seleccionada
                const selectedSection = document.getElementById(section);
                if (selectedSection) {
                    selectedSection.style.display = 'block';
                }
                
                // Actualizar título
                let title = 'Panel de Trámites';
                let subtitle = 'Bienvenido al portal de servicios de la Cámara';
                
                switch(section) {
                    case 'tramites':
                        title = 'Mis Trámites';
                        subtitle = 'Consulta el estado de tus solicitudes';
                        break;
                    case 'nueva-solicitud':
                        title = 'Nueva Solicitud';
                        subtitle = 'Crea una nueva solicitud de trámite';
                        break;
                    case 'perfil':
                        title = 'Mi Perfil';
                        subtitle = 'Información de tu cuenta';
                        break;
                }
                
                document.getElementById('page-title').textContent = title;
                document.getElementById('page-subtitle').textContent = subtitle;
                
                // Actualizar nav activo
                document.querySelectorAll('.camara-portal-nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Servicios - abrir formulario
        document.querySelectorAll('.camara-portal-servicio-card').forEach(card => {
            card.addEventListener('click', function() {
                const service = this.dataset.service;
                document.querySelector('select[name="service_type"]').value = service;
                
                // Ir a nueva solicitud
                document.querySelectorAll('.portal-section').forEach(s => s.style.display = 'none');
                document.getElementById('nueva-solicitud').style.display = 'block';
                document.getElementById('page-title').textContent = 'Nueva Solicitud';
                document.getElementById('page-subtitle').textContent = 'Crea una nueva solicitud de trámite';
                
                // Actualizar nav
                document.querySelectorAll('.camara-portal-nav-link').forEach(l => l.classList.remove('active'));
                document.querySelector('[data-section="nueva-solicitud"]').classList.add('active');
                
                // Scroll al formulario
                document.querySelector('.camara-portal-form').scrollIntoView({ behavior: 'smooth' });
            });
        });
    </script>
    <?php wp_footer(); ?>
</body>
</html>
