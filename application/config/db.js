const mysql = require('mysql2');

// Configuración de la conexión a la base de datos
const db = mysql.createConnection({
  host: 'localhost',  // Cambia esto por tu host de la base de datos
  user: 'root',       // Cambia esto por tu usuario de MySQL
  password: '',       // Cambia esto por tu contraseña de MySQL
  database: 'DBRestorantFav', // Cambia esto por el nombre de tu base de datos
});

// Conectar a la base de datos
db.connect((err) => {
  if (err) {
    console.error('Error al conectar a la base de datos:', err);
    return;
  }
  console.log('Conectado a la base de datos MySQL');
});

module.exports = db;
