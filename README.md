# PowerFit Gym - Sistema de Gestión de Membresías

Sistema web desarrollado para la gestión administrativa de miembros del gimnasio "PowerFit Gym", optimizado para uso móvil y cumplimiento de auditoría de datos.

## Decisiones de Diseño y Arquitectura

Para cumplir con los requerimientos del cliente (Marco y su socio) y la rúbrica de evaluación, se tomaron las siguientes decisiones técnicas:

### 1. Estrategia de Persistencia de Datos (Soft Deletes)
* **Problema:** El socio del gimnasio exigió "guardar todo por temas legales", incluso si un cliente se da de baja.
* **Decisión:** Se implementó **Soft Deletes** (Eliminación Lógica) de Laravel.
* **Implementación:** Al hacer clic en "Eliminar", el registro no se borra de la base de datos; simplemente se marca con una fecha en la columna `deleted_at`. Esto limpia la interfaz visual para el administrador pero mantiene la integridad histórica de la data.

### 2. Diseño "Mobile-First" para Operatividad
* **Problema:** Marco necesita verificar miembros "desde el celular" mientras está en la entrada.
* **Decisión:** Se utilizó **Bootstrap 5** con un enfoque responsivo agresivo.
* **Implementación:**
    * Uso de `table-responsive` para evitar que las tablas rompan el diseño en pantallas verticales.
    * Botones grandes (`btn-lg`) y espaciados para facilitar el toque en pantallas táctiles.
    * Tarjetas (`cards`) para agrupar la información visualmente.

### 3. Automatización de Lógica de Negocio
* **Problema:** "La fecha de inscripción que se ponga sola" y evitar errores manuales.
* **Decisión:** Automatización a nivel de Controlador.
* **Implementación:**
    * El campo `start_date` no es editable; se asigna automáticamente usando `Carbon::now()` al momento de guardar.
    * El estado (`is_active` o Vencido) se calcula dinámicamente comparando la fecha actual con la `end_date` en la vista, mostrando *badges* visuales (Verde/Rojo) instantáneos.

### 4. Stack Tecnológico
* **Backend:** PHP 8 + Laravel 10/11 (Robusteza y rapidez de desarrollo).
* **Base de Datos:** PostgreSQL (Elegido por su fiabilidad en integridad de datos y manejo estricto de tipos).
* **Frontend:** Blade Templates + Bootstrap CDN (Ligero y compatible).

---

## Instalación y Configuración

Sigue estos pasos para desplegar el proyecto en local:

### Requisitos Previos
* PHP > 8.1
* PostgreSQL
* Composer
* Git

### Paso a Paso

1.  **Clonar el repositorio:**
    ```bash
    git clone [https://github.com/TU_USUARIO/powerfit-gym.git](https://github.com/TU_USUARIO/powerfit-gym.git)
    cd powerfit-gym
    ```

2.  **Instalar dependencias:**
    ```bash
    composer install
    ```

3.  **Configurar entorno:**
    * Duplicar el archivo `.env.example` y renombrarlo a `.env`.
    * Configurar las credenciales de PostgreSQL:
        ```ini
        DB_CONNECTION=pgsql
        DB_HOST=127.0.0.1
        DB_PORT=5432
        DB_DATABASE=powerfit_db
        DB_USERNAME=postgres
        DB_PASSWORD=tu_password
        ```

4.  **Generar key y migrar:**
    * Asegúrate de tener los drivers de PDO_PGSQL habilitados en tu `php.ini`.
    ```bash
    php artisan key:generate
    php artisan migrate
    ```

5.  **Ejecutar servidor:**
    ```bash
    php artisan serve
    ```
    Visita `http://127.0.0.1:8000` en tu navegador.

---
