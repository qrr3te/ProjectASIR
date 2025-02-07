# Alameda Motor - Página Web

Este repositorio contiene el código fuente de la página web oficial de **Alameda Motor**, una plataforma diseñada para proporcionar información, servicios y soporte a los clientes de esta empresa.

## Objetivo del Proyecto
El propósito del proyecto es desarrollar una página web moderna y funcional para Alameda Motor, que ofrezca una experiencia de usuario optimizada y facilite el acceso a los servicios ofrecidos por la empresa.

## Estructura del Proyecto
La estructura del proyecto incluye los siguientes componentes principales:

- **Frontend:**  
  Construido con [HTML5](https://developer.mozilla.org/es/docs/Web/HTML), [CSS3](https://developer.mozilla.org/es/docs/Web/CSS), y [JavaScript](https://developer.mozilla.org/es/docs/Web/JavaScript).  
  Herramientas: [Tailwind CSS](https://tailwindcss.com/) para estilos rápidos y responsivos.

- **Backend:**  
  Implementado con [PHP](https://www.php.net/) para la lógica del servidor.  
  Base de datos: [MariaDB](https://mariadb.org/) para la gestión de los datos, como usuarios, productos y servicios.

- **DevOps:**  
  Infraestructura configurada usando [Docker](https://www.docker.com/) para la creación de contenedores que facilitan el despliegue y la gestión del entorno de desarrollo y producción.

## Normas de desarrollo

### Reglas de estilo
+ Uso de **snake case** ejemplo: $variable\_ejemplo o funcion\_ejemplo().
+ Tabulaciones de 3 espacios.

### Añadir funcionalidades
Para añadir una funcionalidad compleja deberás de crear una rama para esa funcionalidad, con un nombre descriptivo.
No se pueden hacer cambios en una rama sin avisar previamente al creador de la rama.

### Merge
Si tu merge tiene conflicto con **main**:
+ El codigo preexistente en main tiene prioridad sobre lo que se esta por añadir.

### Rama main
Se puede trabajar directamente en la rama main si:
+ Refactorizas codigo.
+ Arreglas errores.
+ Implementas una caracteristica sencilla que conlleva 1 solo commit.

## TODO List

### Cliente
- [x] Portada de la web
- [ ] Formulario de presupuesto **Branched**
- [x] Conocenos
- [x] Formulario de contacto - **Branched**
- [ ] vehículos - **Branched**
- [ ] Servicios - **Branched**
- [x] Login/Registro cliente
- [ ] Sesiones y middleware de login
- [ ] Mostrar citas del cliente
- [ ] Mostrar carburantes - **Branched** 

### Administrador
- [x] Login
- [x] Abstracción de la base de datos (CRUD)
- [ ] Validación de datos y manejo de errores
- [ ] Estadisticas del servidor como página principal 

## Setup del proyecto:
1. Clona el repositorio:
    ```bash
    git clone https://github.com/tu-usuario/ProjectASIR.git
    cd ProjectASIR
    ```
2. Instalar docker-compose o docker desktop
3. Despliegue del proyecto
   + **Linux**: `./setup.sh`
   + **Windows**: `./setup.exe`,

