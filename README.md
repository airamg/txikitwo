# Aplicación web Txikitwo desarrollada con Symfony 2.5.x para PFG '14 #

1) Instalando Symfony Standard Edition
----------------------------------

### Usar Composer

Descargar y seguir las instrucciones en http://getcomposer.org/ o ejecutar estos comandos:

    curl -s http://getcomposer.org/installer | php
	php composer.phar

Comprobar que está lista la configuración de los archivos: 
	- hosts - windows/system32/drivers/etc/
	- httpd-vhosts.conf - xampp/apache/conf/extra/
	- php.ini - xampp/php/ - php_fileinfo.dll y php_intl.dll

Ahora podemos crear el proyecto:
	
    php composer.phar create-project symfony/framework-standard-edition <pathNombreProyecto> 2.5.5

Si usamos XAMPP, el path debe ser: C:/xampp/htdocs/NombreProyecto


2) Comprobar la configuración de la instalación
-------------------------------------

Desde la carpeta de nuestro proyecto: 
    
	php app/check.php
	php app/console

Desde el navegador:
	
	txikitwo.local/app_dev.php


3) Empezando a desarrollar
---------------------

Base de datos: 
    
	php app/console doctrine:database:create
	php app/console doctrine:schema:create
	php app/console doctrine:fixtures:load

Crear los bundles (ejemplo: --namespace=Proyecto/WebBundle --bundle-name=WebBundle):
	
	php app/console generate:bundle

Crear las entidades (ejemplo: --shortcutname: NombreBundle:NombreEntidad):

	php app/console doctrine:generate:entity 
	php app/console generate:doctrine:entities NombreBundle (generación get y set)

Cargar los estilos:
	
	php app/console cache:clear --env=dev
	php app/console assets:install
	php app/console assetic:dump
	
Cambios en repositorio:

	git init 
	git remote add origin <urlgitrepositorio>
	git add . / git add --all
	git commit -m "descripción"
	git push origin <nombrerama>
	git status 
	git pull 
	git merge <nombrerama>


CONTENIDO
---------------

Bundles principales del proyecto:

  * **ArticuloBundle**

  * **AlmacenBundle**

  * **UsuarioBundle**
  
  * **PersonalizacionBundle**
  
  * **CompraBundle**

  * **WebBundle**

Bundles configurados pero no utilizados en este proyecto:

  * **BackendBundle**