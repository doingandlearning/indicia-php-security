const express = require('express');
const fs = require('fs');
const path = require('path');

const app = express();
const port = 3000;

// Middleware to log each request
app.use((req, res, next) => {
	const logEntry = `Time: ${new Date().toISOString()}, IP: ${req.ip}, Cookie: ${req.query.cookie}\n`;
	fs.appendFile(path.join(__dirname, 'log.txt'), logEntry, (err) => {
		if (err) {
			console.error('Error writing to log:', err);
		}
	});
	next();
});


// Serve a script from /public/xss.js at /scripts/xss.js
app.use('/scripts', express.static(path.join(__dirname, 'public')));


// Route to handle root URL
app.get('/xss/:challenge', (req, res) => {
	const { challenge } = req.params;
	const { cookie, name } = req.query;
	console.log(`Name: ${name}, Cookie: ${cookie}`);
	const logEntry = `Time: ${new Date().toISOString()}, Name: ${name}, Cookie: ${cookie}, Challenge: ${challenge}\n`;
	fs.appendFile(path.join(__dirname, 'log.txt'), logEntry, (err) => {
		if (err) {
			console.error('Error writing to log:', err);
		}
	});
	console.log(`Name: ${name}, Cookie: ${cookie}, Challenge: ${challenge}`)
	res.send(`Name: ${name}, Cookie: ${cookie}, Challenge: ${challenge}`);
});

// Route to display log file content
app.get('/log', (req, res) => {
	fs.readFile(path.join(__dirname, 'log.txt'), 'utf8', (err, data) => {
		if (err) {
			res.status(500).send('Error reading log file');
			return;
		}
		res.send(`<pre>${data}</pre>`);
	});
});

// Start the server
app.listen(port, () => {
	console.log(`Server running on http://localhost:${port}`);
});

