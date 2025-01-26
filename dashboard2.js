const express = require('express');
const jwt = require('jsonwebtoken');
const bodyParser = require('body-parser');

const app = express();
const PORT = 3000;


app.use(bodyParser.json());


const adminUser = {
  email: 'admin@bookstore.com',
  password: '12345', 
  role: 'admin',
};


app.post('/api/login', (req, res) => {
  const { email, password } = req.body;

  if (email === adminUser.email && password === adminUser.password) {
   
    const token = jwt.sign({ email: adminUser.email, role: adminUser.role }, 'sekret', { expiresIn: '1h' });
    res.json({ token });
  } else {
    res.status(401).json({ message: 'Email ose fjalëkalim i gabuar!' });
  }
});


app.get('/api/dashboard', (req, res) => {
  const token = req.headers.authorization?.split(' ')[1];

  if (!token) {
    return res.status(403).json({ message: 'Nuk keni autorizim!' });
  }

  try {
    const user = jwt.verify(token, 'sekret');
    res.json({ message: `Mirësevini, ${user.email}!`, role: user.role });
  } catch (err) {
    res.status(403).json({ message: 'Token i pavlefshëm!' });
  }
});


app.listen(PORT, () => console.log(`Serveri po punon në http://localhost:${PORT}`));
