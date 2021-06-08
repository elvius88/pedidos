### Descargar el proyecto del repo Git  
* [Repo de pantalla de Pedidos](https://github.com/elvius88/pedidos)

### Instalación de las siguientes herramientas  
* [PHP 7.4+](https://www.php.net/downloads.php)
* [Apache2](https://httpd.apache.org/download.cgi)
* [Composer 2.0](https://getcomposer.org/download/)

### Modificar configuración de _php.ini_ 
_upload_max_filesize = 50M_  
_post_max_size = 50M_
_max_execution_time =180_
_memory_limit = 256M_
_date.timezone= "America/Asuncion"_


### Instrucciones para levantar la aplicación  
_composer install_

### Configurar PHP en Apache2

### Configurar PHP en Apache2
 Editar el archivo httpd.conf
 Agregar el siguiente código:

    # PHP Configuration for Apache
    #
    # Load the apache module
    #
    LoadModule php4_module modules/libphp4.so
    #
    # Cause the PHP interpreter handle files with a .php extension.
    #
    <Files *.php>
    SetOutputFilter PHP
    SetInputFilter PHP
    LimitRequestBody 9524288
    </Files>
    AddType application/x-httpd-php .php
    AddType application/x-httpd-php-source .phps
    #
    # Add index.php to the list of files that will be served as directory
    # indexes.
    #
    DirectoryIndex index.php  

Reinicie Apache2
