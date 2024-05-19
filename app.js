const form = document.getElementById('contactForm');

form.addEventListener('submit', (e) => {
  e.preventDefault();

  const nombre = document.getElementById('nombre').value;
  const email = document.getElementById('email').value;
  const asunto = document.getElementById('asunto').value;
  const mensaje = document.getElementById('mensaje').value;

  saveTodos(nombre, email, asunto, mensaje);
});

const saveTodos = (nombre, email, asunto, mensaje) => {
  const mysql = require('mysql');

  const connection = mysql.createConnection({
    host: 'bx7loncqi8vnyihpduqt-mysql.services.clever-cloud.com',
    user: 'ufzywigq33rdmmaz',
    password: 'KjAdkfSUTAkvidNV9YdA',
    database: 'bx7loncqi8vnyihpduqt'
  });

  connection.connect((err) => {
    if (err) throw err;
    console.log('Conexión exitosa a la base de datos.');

    const sql = 'INSERT INTO Solicitudes (name, email, subject, message) VALUES (?, ?, ?, ?)';
    const params = [nombre, email, asunto, mensaje];

    connection.query(sql, params, (err, result) => {
      if (err) throw err;
      console.log('Datos insertados correctamente.');
    });
  });

  connection.end();
};