# 🚀 Challenge PHP-Laravel

El **Challenge PHP-Laravel** es un proyecto incompleto creado con el framework Laravel. El desafío consiste en identificar los elementos faltantes, resolver los requerimientos funcionales solicitados y cumplir con las mejores prácticas de programación. 🧑‍💻 Debes entregar el proyecto en una nueva rama en el repositorio de GitHub.

Entendiendo que en programación existen muchas formas de dar solución a los requerimientos, también se entiende que hay mejores y peores soluciones. Queda a criterio del programador elegir la mejor estrategia de solución, por la cual será evaluado.

## 📋 Requerimientos

1. ⚙️ **Levantar el proyecto** en tu entorno local.
2. 📝 **Crear un ABM de productos** con los siguientes campos:
    - Título (string)
    - Descripción (string)
    - Precio (number)
    - Categoría (string)
3. 📂 **Crear un menú lateral** similar a los ya existentes, pero para el menú de artículos.
4. ✅ **Validar formularios** tanto en el front-end como en el back-end.
5. 🌱 **Crear un seeder** con 2 artículos.
6. 📧 **Notificar por correo electrónico** cuando se crea un artículo.

## 🛠️ Comandos de Ayuda

- Utiliza el gestor de dependencias para cargar los elementos necesarios:  
  ```bash
  > composer install && composer update  
  ```

- Crea el archivo `.env`:  
  ```bash
  > sudo cp .env.example .env
  ```

- Agrega la clave de encriptación:  
  ```bash
  > php artisan key:generate
  ```

- Inicia el servidor local:  
  ```bash
  > php artisan serve
  ```
- El proyecto cuenta con un stack de contenedores para resolver los servicios de mail y base de datos  
  ```bash 
  > docker compose up -d
  ```

## 📚 Documentación

- Enlace a la documentación de Laravel:  
  [Laravel Documentation](https://laravel.com)


Se realizan todos los puntos. En el punto donde se pide crear un seeder con 2 articulos, se realiza con el nombre   ```bash SeederCon2Articulos.php ```.