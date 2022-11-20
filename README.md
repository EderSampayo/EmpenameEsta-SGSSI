# EmpenameEsta-SGSSI
Miembros: Jon Robledo, Eder Sampayo y Endika Hernandez.
Instrucciones:
   # Si no se ha hecho anteriormente:
        $sudo groupadd docker
        $sudo usermod -aG docker $USER
     reiniciar la máquina
     
   # Instalar dependencias:
        $sudo apt install mysql-server
        $sudo apt install mysql-client
        $sudo apt install docker-compose
        
   # Si no funciona phpmyadmin al iniciar el servidor:
        $sudo aa-remove-unknown

   # A continuación:
     Buscar dentro de la carpeta EmpenameEsta-SGSSI el archivo init.sh y ejecutarlo mediante el comando: $sudo ./init.sh
     Aparecerán una serie de peticiones necesarias para utilizar https, se puede darle enter hasta que no se pidan mas imputs.
     Abrir firefox y escribir en la barra de busqueda la siguiente dirección: localhost:8890.
     Iniciar sesión utilizando el usuario "admin" y la contraseña "admin1" y importar el archivo empenameesta.sql
     Para finalizar abrir Firefox y escribir en la barra de búsqueda la siguiente dirección: localhost:81
