# 🚗 Concesionario de Automóviles

![Laravel](https://img.shields.io/badge/Laravel-12.54.1-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.5.4-777BB4?style=for-the-badge&logo=php)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-316192?style=for-the-badge&logo=postgresql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap)

Aplicación web completa para la gestión de un concesionario de automóviles, desarrollada con **Laravel** y **PostgreSQL**. Incluye autenticación de usuarios, CRUD de vehículos, búsqueda avanzada, carga de imágenes y panel administrativo con estadísticas.

---

## ✨ Características

### ✅ Implementado
- **Sistema de autenticación** (registro, login, logout)
- **CRUD completo de carros** (crear, leer, actualizar, eliminar)
- **Búsqueda y filtrado** por marca, modelo, año y precio
- **Carga de imágenes** para cada vehículo
- **Panel de administración** con estadísticas y gráficos
- **Interfaz moderna** con Bootstrap 5, Font Awesome y diseño responsive
- **Protección de rutas** (solo usuarios autenticados pueden gestionar carros)

### 🎨 Diseño
- Barra de navegación fija
- Páginas de login/registro
- Tablas responsivas con miniaturas de imágenes
- Iconografía con Font Awesome para mejor experiencia visual

---

## 📋 Requisitos previos

Antes de comenzar, asegúrate de tener instalado:

- **PHP** >= 8.1
- **Composer** (gestor de dependencias de PHP)
- **PostgreSQL** >= 12
- **Node.js** y **NPM** (para compilar assets)
- **Git** (para clonar el repositorio)

---

## 🚀 Instalación paso a paso

### 1. Clonar el repositorio
git clone https://github.com/JeremyBenitez/Prueba-Practica.git
cd Prueba-Practica

2. Instalar dependencias de PHP -> composer install
3. Configurar el archivo de entorno -> cp .env.example .env
4. Generar la clave de la aplicación -> php artisan key:generate
5. composer require laravel/ui
php artisan ui bootstrap --auth
6. Iniciar PostgreSQL
7. psql postgres
8. CREATE DATABASE concesionario_db;
9. Configurar el archivo .env
10. Ejecutar las migraciones
11. Crear la migración para la tabla de carros
12. Edita el archivo creado en database/migrations/
13. Ejecutar la migración de carros
14. Agregar campo de imagen a la tabla cars
15. Crear enlace simbólico para imágenes
16. Crear Modelos, Controladores y Vistas
17. Crear las carpetas para las vistas

Ejecutar la aplicacion: npm run dev. 

Ejecutar el servidor en otra terminal: php artisan serve
