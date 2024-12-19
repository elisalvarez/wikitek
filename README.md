# 🚀 Proyecto Laravel 11 - Prueba Técnica para Wikitek

¡Bienvenido a este proyecto desarrollado en Laravel 11 como parte de la prueba técnica para la empresa **Wikitek**! Este README te guiará paso a paso para configurar, instalar y ejecutar el proyecto en tu entorno local. 🛠️

---

## 📋 Requisitos del Proyecto

Antes de comenzar, asegúrate de tener instaladas las siguientes herramientas en tu sistema:

- **PHP 8.2** o superior
- **Composer**
- **MySQL** o cualquier base de datos compatible
- **Node.js y npm** (opcional, si el proyecto incluye recursos frontend)
- Servidor web como **Apache** o **Nginx**

---

## ⚙️ Instalación

Sigue estos pasos para poner en marcha el proyecto:

1. Clona este repositorio en tu máquina local:
   ```bash
   git clone git@github.com:elisalvarez/wikitek.git
   cd tu-repo
   ```

2. Instala las dependencias de PHP utilizando Composer:
   ```bash
   composer install
   ```

3. Configura las variables de entorno:
   - Copia el archivo `.env.example` y renómbralo como `.env`:
     ```bash
     cp .env.example .env
     ```
   - Abre el archivo `.env` y configura los valores de la base de datos:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=nombre_de_tu_base
     DB_USERNAME=tu_usuario
     DB_PASSWORD=tu_contraseña
     ```

4. Genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

---

## 🗃️ Creación de la Base de Datos

1. Crea una base de datos en tu sistema MySQL con el nombre configurado en el archivo `.env`.
2. Ejecuta las migraciones y el llenado de datos iniciales (seeders):
   ```bash
   php artisan migrate --seed
   ```

---

## 🧹 Limpieza y Optimización

Para asegurarte de que la aplicación funcione correctamente, ejecuta los siguientes comandos:

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

También puedes verificar las rutas registradas:

```bash
php artisan route:list
```

---

## 🚀 Ejecución del Proyecto

Inicia el servidor de desarrollo con el siguiente comando:

```bash
php artisan serve
```

Accede a la aplicación en tu navegador en [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## ✨ Notas Importantes

- Este proyecto forma parte de una prueba técnica para evaluar habilidades en Laravel.
- Si encuentras algún problema, no dudes en comunicarte conmigo o revisar los logs en `storage/logs/`.

---

## 💡 ¿Preguntas?

Si tienes alguna duda o comentario, ¡estaré encantada de ayudarte! 😊
