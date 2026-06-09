<style>
    .camara-portal-login-container {
        background: linear-gradient(135deg, #061E4F 0%, #0a2e6b 100%);
        padding: 40px 20px;
        border-radius: 8px;
        max-width: 420px;
        margin: 40px auto;
        text-align: center;
    }

    .camara-portal-login-box {
        background: white;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    .camara-portal-login-logo {
        font-size: 48px;
        margin-bottom: 15px;
    }

    .camara-portal-login-title {
        color: #061E4F;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .camara-portal-login-subtitle {
        color: #5f6061;
        font-size: 14px;
        margin-bottom: 30px;
    }

    .camara-portal-login-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .camara-portal-login-form input {
        padding: 12px;
        border: 1px solid #e8e8e8;
        border-radius: 6px;
        font-size: 14px;
    }

    .camara-portal-login-form input:focus {
        outline: none;
        border-color: #901a1d;
        box-shadow: 0 0 0 3px rgba(144, 26, 29, 0.1);
    }

    .camara-portal-login-btn {
        padding: 12px;
        background: linear-gradient(135deg, #901a1d 0%, #830d10 100%);
        color: white;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .camara-portal-login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(144, 26, 29, 0.3);
    }

    .camara-portal-login-footer {
        font-size: 12px;
        color: #5f6061;
        margin-top: 20px;
    }
</style>

<div class="camara-portal-login-container">
    <div class="camara-portal-login-box">
        <div class="camara-portal-login-logo">🏢</div>
        <h2 class="camara-portal-login-title">Cámara de Empresarios</h2>
        <p class="camara-portal-login-subtitle">Portal de Trámites</p>
        <form method="post" action="<?php echo esc_url(wp_login_url()); ?>" class="camara-portal-login-form">
            <input type="text" name="log" placeholder="Usuario o Email" required>
            <input type="password" name="pwd" placeholder="Contraseña" required>
            <button type="submit" class="camara-portal-login-btn">Iniciar Sesión</button>
        </form>
        <div class="camara-portal-login-footer">
            <p>¿Problemas para acceder? Contacta al administrador.</p>
        </div>
    </div>
</div>
