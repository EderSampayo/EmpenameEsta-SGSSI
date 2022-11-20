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
     
     Una vez se haya ejecutado el init.sh ponemos los siguientes comandos para acceder a la base de datos:
        $sudo docker-compose exec db mysql -uadmin -padmin1
        $USE empenameesta;
        
     Ahora crearemos las tablas:
        $DROP TABLE IF EXISTS PRODUCTO;
        $CREATE TABLE PRODUCTO (
          `Nombre` varchar(30) NOT NULL,
          `Descripcion` varchar(80) NOT NULL,
          `Valor` decimal(10,2) NOT NULL,
          `Antiguedad` int(6) NOT NULL,
          `MarcaAutor` varchar(20) NOT NULL,
          `Id` int(11) NOT NULL
        );
        $DROP TABLE IF EXISTS USUARIO;
        $CREATE TABLE USUARIO (
          `Username` varchar(30) NOT NULL,
          `Password` varchar(30) NOT NULL,
          `NombreYApellidos` varchar(30) NOT NULL,
          `DNI` varchar(9) NOT NULL,
          `Telefono` int(9) NOT NULL,
          `FechaNac` date NOT NULL,
          `Email` varchar(30) NOT NULL
        )
        $ALTER TABLE PRODUCTO ADD PRIMARY KEY (`Id`);
        $ALTER TABLE USUARIO ADD PRIMARY KEY (`Username`);
        $ALTER TABLE PRODUCTO MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
        $COMMIT;
     
     Para finalizar abrir Firefox y escribir en la barra de búsqueda la siguiente dirección: localhost:81
