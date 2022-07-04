/*
  This program and the accompanying materials are
  made available under the terms of the Eclipse Public License v2.0 which accompanies
  this distribution, and is available at https://www.eclipse.org/legal/epl-v20.html
  
  SPDX-License-Identifier: EPL-2.0
  
  Copyright IBM Corporation 2020
*/
const fs = require("fs");
const chatbotService = require("../services/chatbot.service");

const get = async function (req, res) {
  let response = await chatbotService.get(req.body.message, req.body.user_id);
  res.send(response);
};

const getCorpus = function (req, res) {
  fs.readFile("./corpus-en.json", "utf8", (err, data) => {
    if (err) {
      console.error(err);
      res.send({ message: "Data not available" });
      return;
    }
    res.send(data);
  });
};

const addKnowledge = function (req, res) {
  var products = './products.json';
  var corpus = './corpus-en.json';
  
  var m = JSON.parse(fs.readFileSync(products).toString());
  let title = req.body.title;
  m[title] = { price: req.body.price, quantity: req.body.unit};
  fs.writeFileSync(products, JSON.stringify(m,null, '\t'));

  var file = JSON.parse(fs.readFileSync(corpus).toString());
  console.dir(file);
  file['entities']['product']['options'][title] = [title];
  fs.writeFileSync(corpus, JSON.stringify(file,null, '\t'));

  res.send({'message':"file products file updated"});
};

module.exports = {
  get,
  getCorpus,
  addKnowledge
};
