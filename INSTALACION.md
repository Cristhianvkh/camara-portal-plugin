# Guía de Instalación - Portal de Trámites

## Pasos Rápidos

### 1. Descargar el Plugin

**Opción A: Desde GitHub (Más fácil)**
- Ve a: https://github.com/Cristhianvkh/camara-portal-plugin
- Haz clic en **Code** (botón verde)
- Selecciona **Download ZIP**
- Descarga el archivo

**Opción B: Clonar con Git**
```bash
cd wp-content/plugins/
git clone https://github.com/Cristhianvkh/camara-portal-plugin.git
```

### 2. Extraer en la Carpeta Correcta

**Para WordPress Local (Local by Flywheel)**
```
C:\Users\[TU_USUARIO]\Local Sites\prueba\app\public\wp-content\plugins\camara-portal\
```

**Para WordPress Online**
```
/home/usuario/public_html/wp-content/plugins/camara-portal/
```

### 3. Activar en WordPress

1. Ve a: `http://prueba.local/wp-admin`
2. Entra a **Plugins**
3. Busca "Portal de Trámites"
4. Haz clic en **Activar**

### 4. Acceder al Portal

**Para usuarios (asociados):**
```
http://prueba.local/portal/
```

**Para administrador:**
```
http://prueba.local/wp-admin
→ Menú: "Portal Trámites"
```

## Verificación

Depués de activar, verifica que:

✅ El plugin aparece en la lista de plugins
✅ La página `/portal/` se creó automáticamente
✅ El menú "Portal Trámites" aparece en el admin
✅ No hay errores en error.log

## Primeros Pasos

1. **Crea un usuario de prueba** (si no tienes uno)
   - Admin → Usuarios → Añadir nuevo
   - Dale un rol de "Suscriptor" o "Editor"

2. **Cierra sesión e inicia con ese usuario**
   - Verifica que veas el portal en `/portal/`

3. **Explora los servicios**
   - Prueba hacer clic en cada tarjeta de servicio

4. **Administra desde el admin**
   - Ve a "Portal Trámites" para ver el dashboard

## Solución de Problemas

### El plugin no aparece en Plugins
- Verifica que la carpeta está en: `wp-content/plugins/camara-portal/`
- Que el archivo principal se llama: `camara-portal.php`
- Recarga: `http://prueba.local/wp-admin/plugins.php`

### Error al activar
- Verifica que PHP 7.4+ está activo
- Ve a: `wp-admin/edit.php?post_type=page` para ver si se creó la página
- Revisa el archivo `wp-content/debug.log`

### No veo `/portal/`
- Refresca tu sitio (Ctrl+F5)
- Reconstruye permalinks: Admin → Ajustes → Enlaces permanentes → Guardar
- Verifica que iniciaste sesión

### Estilos no se cargan correctamente
- Vacía la caché (si uses caché plugin)
- Limpia caché del navegador (Ctrl+Shift+Supr)
- Recarga: `http://prueba.local/?nocache=true`

## Soporte

Para reportar problemas:
- Abre un issue en GitHub
- Describe el error exacto
- Indica tu versión de WordPress y PHP

---

¡Ya estás listo! El portal debería funcionar correctamente. 🚀
