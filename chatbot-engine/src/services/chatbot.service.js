/*
  This program and the accompanying materials are
  made available under the terms of the Eclipse Public License v2.0 which accompanies
  this distribution, and is available at https://www.eclipse.org/legal/epl-v20.html
  
  SPDX-License-Identifier: EPL-2.0
  
  Copyright IBM Corporation 2020
*/

const { dockStart } = require("@nlpjs/basic");
const axios = require("axios");
var userId = null;
async function onIntent(nlp, input) {
  if (input.intent === "product.buy") {
    const output = input;
    if (input.entities.length === 0) {
      output.answer = "Sorry can't find that product on my manifest";
    } else {
      await axios
        .post("http://localhost:8000/api/makeOrder", {
          product: input.entities[0].option,
          user_id: userId,
        })
        .then((res) => {
          output.answer =
            "Done. You order has been place check the shopping tab";
        })
        .catch((error) => {
          output.answer = "Error occurred seems product is not available";
        });
    }
    return output;
  }
  return input;
}

const get = async function (message, user_id) {
  userId = user_id;
  const dock = await dockStart({ use: ["Basic"] });
  const nlp = dock.get("nlp");
  const newLocal = "./corpus-en.json";
  await nlp.addCorpus(newLocal);
  await nlp.train();
  nlp.onIntent = onIntent;
  const response = await nlp.process("en", message);
  return response.answer;
};

module.exports = {
  get,
};
