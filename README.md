# Block-PHP - Backend de Gestión de Posts en Laravel

## Descripción del Proyecto

**Block-PHP** es una API RESTful desarrollada en Laravel, centrada en la gestión de publicaciones, usuarios e interacciones. Esta aplicación permite registrar usuarios, asignar roles y gestionar posts mediante funcionalidades como creación, edición, eliminación, vistas y likes. Es un backend autónomo y modular pensado para integrarse fácilmente con un frontend (web o móvil).

## Funcionalidades Principales

- 📝 CRUD completo de publicaciones (posts).
- 👤 Registro y autenticación de usuarios con **Laravel Sanctum**.
- 🔐 Gestión de roles y permisos con **Spatie Laravel Permission**.
- 📈 Seguimiento de interacciones: vistas y likes por usuario/post.
- 📂 Manejo de archivos (imágenes de post si aplica).
- 🔍 Búsqueda y filtrado de publicaciones.
- 🛡️ Protección de rutas según roles y permisos.

## Tecnologías y Paquetes Utilizados

- **Framework:** Laravel 10+
- **Autenticación:** Laravel Sanctum
- **Roles y permisos:** Spatie Laravel-Permission
- **Base de datos:** MySQL / PostgreSQL
- **ORM:** Eloquent
- **Documentación API (opcional):** Laravel Swagger / Scribe (si aplica)
- **Testing (opcional):** PHPUnit

