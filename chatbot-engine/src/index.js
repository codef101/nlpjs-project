const express = require('express');
const http = require('http');
const https = require('https');
const cors = require('cors');
const app = express();

// body parser
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

//build config from params
const config = require('./config');
const {https:{ key, cert}, port, isHttps, serviceName} = config;
const credentials = {key, cert};

//setup app & its routes
app.use(cors());
const routes = require('./routes/index.route');
app.use(routes);

//start http server
const httpServer = http.createServer(app);
httpServer.listen(port);
console.log(`[${serviceName}] http server listening at port ${port}`);

//start https server
if(isHttps) {
  const httpsServer = https.createServer(credentials, app);
  httpsServer.listen(port+1);
  console.log(`[${serviceName}] https server listening at port ${port + 1}`);
}

module.exports = { app };