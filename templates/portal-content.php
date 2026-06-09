<style>
    .camara-portal-wrapper {
        margin: 20px 0;
    }

    .camara-portal-body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: #f8f8f8;
        color: #5f6061;
    }

    .camara-portal-container {
        display: flex;
        min-height: calc(100vh - 200px);
        background: white;
        margin: 0 -999px;
        padding: 0 999px;
    }

    .camara-portal-sidebar {
        width: 280px;
        background: linear-gradient(135deg, #061E4F 0%, #0a2e6b 100%);
        padding: 30px 20px;
        box-shadow: 2px 0 10px rgba(6, 30, 79, 0.15);
    }

    .camara-portal-content {
        flex: 1;
        padding: 40px 30px;
        overflow-y: auto;
    }

    @media (max-width: 768px) {
        .camara-portal-container {
            flex-direction: column;
            min-height: auto;
        }

        .camara-portal-sidebar {
            width: 100%;
            padding: 15px;
            border-bottom: 2px solid #061E4F;
        }

        .camara-portal-content {
            padding: 20px 15px;
        }
    }
</style>

<div class="camara-portal-wrapper camara-portal-body">
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

        <!-- CONTENIDO -->
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

            <!-- DASHBOARD -->
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

            <!-- MIS TRÁMITES -->
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 40px; color: #5f6061;">
                                    <p style="font-size: 16px; margin-bottom: 10px;">📭 No hay trámites aún</p>
                                    <p style="font-size: 13px;">Crea una nueva solicitud para comenzar</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- NUEVA SOLICITUD -->
            <section id="nueva-solicitud" class="portal-section" style="display: none;">
                <h2 style="color: #061E4F; margin: 0 0 20px 0; font-size: 20px; font-weight: 600;">Nueva Solicitud</h2>
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
                            <textarea name="description" placeholder="Proporciona más detalles" required style="width: 100%; padding: 10px 12px; border: 1px solid #e8e8e8; border-radius: 4px; font-family: inherit; font-size: 14px; resize: vertical; min-height: 120px;"></textarea>
                        </div>
                        <button type="submit" class="camara-portal-btn camara-portal-btn-primary">Enviar Solicitud</button>
                    </form>
                </div>
            </section>

            <!-- PERFIL -->
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
                        <strong>Información importante:</strong> Todos tus trámites son confidenciales y seguros.
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<script>
(function() {
    document.querySelectorAll('.camara-portal-nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const section = this.dataset.section;
            
            document.querySelectorAll('.portal-section').forEach(s => s.style.display = 'none');
            const selectedSection = document.getElementById(section);
            if (selectedSection) {
                selectedSection.style.display = 'block';
            }
            
            document.querySelectorAll('.camara-portal-nav-link').forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        });
    });

    document.querySelectorAll('.camara-portal-servicio-card').forEach(card => {
        card.addEventListener('click', function() {
            document.querySelector('select[name="service_type"]').value = this.dataset.service;
            document.querySelectorAll('.portal-section').forEach(s => s.style.display = 'none');
            document.getElementById('nueva-solicitud').style.display = 'block';
            document.querySelectorAll('.camara-portal-nav-link').forEach(l => l.classList.remove('active'));
            document.querySelector('[data-section="nueva-solicitud"]').classList.add('active');
        });
    });
})();
</script>
