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
     
     Para finalizar abrir Firefox y escribir en la barra de búsqueda la siguiente dirección: localhost:81
