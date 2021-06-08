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

Agregar también un VirtualHost apuntando a la aplicacion de pantalla de pedidos


    <VirtualHost *:80>  
    # The ServerName directive sets the request scheme, hostname and port t$  
    # the server uses to identify itself. This is used when creating  
    # redirection URLs. In the context of virtual hosts, the ServerName  
    # specifies what hostname must appear in the request's Host: header to  
    # match this virtual host. For the default virtual host (this file) this  
    # value is not decisive as it is used as a last resort host regardless.  
    # However, you must set it for any further virtual host explicitly.  
    #ServerName [www.example.com](http://www.example.com/)  
      
    ServerAdmin webmaster@localhost  
    ServerName <mi-dominio>  
    DocumentRoot <directorio-raiz-proyecto>/public  
    DirectoryIndex index.html  
      
    # Available loglevels: trace8, ..., trace1, debug, info, notice, warn,  
    # error, crit, alert, emerg.  
    # It is also possible to configure the loglevel for particular  
    # modules, e.g.  
    #LogLevel info ssl:warn  
      
    ErrorLog ${APACHE_LOG_DIR}/<mi-dominio>_error.log  
    CustomLog ${APACHE_LOG_DIR}/<mi-dominio>_access.log combined  
      
    # For most configuration files from conf-available/, which are  
    # enabled or disabled at a global level, it is possible to  
    # include a line for only one particular virtual host. For example the  
    # following line enables the CGI configuration for this host only  
    # after it has been globally disabled with "a2disconf".  
    #Include conf-available/serve-cgi-bin.conf  
      
    <Directory <directorio-raiz-mi-proyecto>>  
    AllowOverride All  
    Require host <mydomain>  
    #php_admin_flag engine Off  
    php_admin_value open_basedir <directorio-raiz-mi-proyecto>  
    </Directory>  
    </VirtualHost>

**Obs.**: cambiar `<directorio-raiz-mi-proyecto>` por la ubicación raíz del proyecto en el servidor.
 - Guarde los cambios 
 - Reinicie Apache2
