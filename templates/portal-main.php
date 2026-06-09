<div class="camara-portal-container camara-portal-body">
  <aside class="camara-portal-sidebar">
    <div class="camara-portal-logo">
      <div class="camara-portal-logo-text">
        <strong>CÁMARA</strong>
        <small>Empresarios del Combustible</small>
      </div>
    </div>
    <nav class="camara-portal-nav">
      <li class="camara-portal-nav-item">
        <a href="#dashboard" class="camara-portal-nav-link active">
          <span class="camara-portal-nav-icon">📊</span>
          <span>Panel Principal</span>
        </a>
      </li>
      <li class="camara-portal-nav-item">
        <a href="#tramites" class="camara-portal-nav-link">
          <span class="camara-portal-nav-icon">📋</span>
          <span>Mis Trámites</span>
        </a>
      </li>
      <li class="camara-portal-nav-item">
        <a href="#nueva-solicitud" class="camara-portal-nav-link">
          <span class="camara-portal-nav-icon">✏️</span>
          <span>Nueva Solicitud</span>
        </a>
      </li>
      <li class="camara-portal-nav-item">
        <a href="#documentos" class="camara-portal-nav-link">
          <span class="camara-portal-nav-icon">📄</span>
          <span>Documentos</span>
        </a>
      </li>
      <li class="camara-portal-nav-item">
        <a href="#configuracion" class="camara-portal-nav-link">
          <span class="camara-portal-nav-icon">⚙️</span>
          <span>Configuración</span>
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

  <main class="camara-portal-content">
    <div class="camara-portal-header">
      <div>
        <h1 class="camara-portal-title">Panel de Trámites</h1>
        <p class="camara-portal-subtitle">Bienvenido al portal de servicios de la Cámara</p>
      </div>
      <div class="camara-portal-user-info">
        <div class="camara-portal-user-avatar">
          <?php echo strtoupper(substr(wp_get_current_user()->user_firstname ?: 'U', 0, 1)); ?>
        </div>
        <div class="camara-portal-user-name">
          <strong><?php echo wp_get_current_user()->display_name; ?></strong>
          <small><?php echo wp_get_current_user()->user_email; ?></small>
        </div>
      </div>
    </div>

    <section id="dashboard">
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

    <section id="tramites" style="margin-top: 40px;">
      <h2 style="color: #061E4F; margin: 0 0 20px 0; font-size: 20px; font-weight: 600;">Mis Trámites Recientes</h2>
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
            <tr class="camara-portal-tramite-row" data-tramite-id="1">
              <td><span class="camara-portal-tramite-code">TRM-2025-00001</span></td>
              <td>Inspección</td>
              <td>Inspección técnica regular</td>
              <td><span class="camara-portal-status status-completada"><span class="camara-portal-status-indicator"></span>Completada</span></td>
              <td>15 Jun 2025</td>
              <td><button class="camara-portal-btn camara-portal-btn-small camara-portal-btn-secondary">Ver</button></td>
            </tr>
            <tr class="camara-portal-tramite-row" data-tramite-id="2">
              <td><span class="camara-portal-tramite-code">TRM-2025-00002</span></td>
              <td>Marchamado</td>
              <td>Solicitud de marchamado</td>
              <td><span class="camara-portal-status status-en-proceso"><span class="camara-portal-status-indicator"></span>En Proceso</span></td>
              <td>08 Jun 2025</td>
              <td><button class="camara-portal-btn camara-portal-btn-small camara-portal-btn-secondary">Ver</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

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
