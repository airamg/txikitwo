# Aplicación web Txikitwo desarrollada con Symfony 2.5.x para PFG '14 #

1) Instalando Symfony Standard Edition
----------------------------------

### Usar Composer

Descargar y seguir las instrucciones en http://getcomposer.org/ o ejecutar estos comandos:

    curl -s http://getcomposer.org/installer | php
	php composer.phar

    php composer.phar create-project symfony/framework-standard-edition <pathNombreProyecto> 2.5.5

Si usamos XAMPP, el path debe ser: C:/xampp/htdocs/NombreProyecto


2) Comprobar la configuración de la instalación
-------------------------------------

Desde la carpeta de nuestro proyecto: 
    
	php app/check.php
	php app/console

Desde el navegador:
	
	txikitwo.local/app_dev.php


CONTENIDO
---------------

Bundles principales del proyecto:

  * **ArticuloBundle**

  * **AlmacenBundle**

  * **UsuarioBundle**
  
  * **PersonalizacionBundle**
  
  * **CompraBundle**

  * **WebBundle**

  * **BackendBundle** 

Bundles por defecto de configuración:

  * [**DoctrineBundle**][1] - Adds support for the Doctrine ORM

  * [**AsseticBundle**][2] - Adds support for Assetic, an asset processing
    library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][3] (in dev/test env) - Adds code generation
    capabilities
	
	
[1]:  http://symfony.com/doc/2.5/book/doctrine.html
[2]: http://symfony.com/doc/2.5/cookbook/assetic/asset_management.html
[3]: http://symfony.com/doc/2.5/bundles/SensioGeneratorBundle/index.html