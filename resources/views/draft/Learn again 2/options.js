const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');
const app = express();
const port = 3000;

// Database connection
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'password',  // Replace with your actual password
    database: 'test_db'    // Replace with your actual database name
});

connection.connect((err) => {
    if (err) {
        console.error('Error connecting to the database:', err);
        return;
    }
    console.log('Connected to the database.');
});

app.use(bodyParser.json());

// Endpoint to handle saving the selected option
app.post('/save-option', (req, res) => {
    const selectedOption = req.body.option;
    
    const query = 'INSERT INTO options (selected_option) VALUES (?)';
    connection.query(query, [selectedOption], (err, result) => {
        if (err) {
            console.error('Error saving option:', err);
            res.status(500).send('Database error');
            return;
        }
        res.json({ option: selectedOption });
    });
});

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});
