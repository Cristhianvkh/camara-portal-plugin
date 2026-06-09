# Portal de Trámites - Cámara de Empresarios del Combustible

## Descripción

Plugin profesional de WordPress que proporciona un portal completo para la solicitud y seguimiento de trámites para asociados de la Cámara de Empresarios del Combustible.

## Características

✅ **Portal privado** con zona de asociados
✅ **6 servicios**: Inspecciones, Marchamado, Tramitología, Asesorías, Capacitaciones, Seguros
✅ **Sistema de trámites** con códigos únicos y estados
✅ **Dashboard administrativo** para gestionar solicitudes
✅ **Diseño responsivo** adaptado a móvil, tablet y desktop
✅ **Identidad visual** de la Cámara (colores institucionales)
✅ **REST API** para integración futura con Microsoft 365
✅ **Ocultación de admin bar** para usuarios normales
✅ **Interfaz limpia** sin elementos genéricos de WordPress

## Instalación

### Opción 1: Desde GitHub (Recomendado)

1. Ve a https://github.com/Cristhianvkh/camara-portal-plugin
2. Haz clic en **Code** → **Download ZIP**
3. Extrae la carpeta en: `wp-content/plugins/`
4. Activa desde el admin de WordPress

### Opción 2: Manual

1. Crea la carpeta: `wp-content/plugins/camara-portal/`
2. Copia todos los archivos
3. Activa desde WordPress

## Estructura

```
camara-portal/
├── camara-portal.php              # Archivo principal
├── includes/
│   ├── class-plugin.php           # Clase principal
│   ├── class-database.php         # Base de datos
│   ├── class-rest-api.php         # API REST
│   └── class-template.php         # Utilidades
├── templates/
│   ├── portal-main.php            # Portal usuario
│   └── admin/
│       ├── dashboard.php          # Admin dashboard
│       ├── tramites.php           # Gestión
│       └── servicios.php          # Config
├── assets/
│   ├── css/
│   │   ├── portal.css             # Estilos
│   │   ├── admin.css              # Admin
│   │   └── responsive.css         # Mobile
│   └── js/
│       └── portal.js              # JavaScript
└── README.md                      # Este archivo
```

## Uso

### Para Asociados

1. Accede a `/portal/` (solo usuarios logueados)
2. Selecciona un servicio
3. Completa el formulario
4. Recibe código de trámite
5. Consulta estado en "Mis Trámites"

### Para Administradores

1. Ve a **Portal Trámites** en el menú de WordPress
2. **Dashboard**: Estadísticas generales
3. **Trámites**: Gestiona solicitudes
4. **Servicios**: Configuración

## Colores Institucionales

- Azul Principal: `#061E4F`
- Rojo Principal: `#901a1d`
- Rojo Hover: `#830d10`
- Gris Texto: `#5f6061`
- Blanco: `#ffffff`
- Gris Claro: `#f8f8f8`

## Integraciones Futuras

- Microsoft 365 (Graph API)
- Power Automate
- SharePoint
- Google OAuth

## Requisitos

- WordPress 5.8+
- PHP 7.4+
- MySQL 5.7+

## Licencia

GPL v2 o superior

## Autor

Cámara de Empresarios del Combustible - Costa Rica

---

**Versión**: 1.0.0
**Última actualización**: Junio 2025
