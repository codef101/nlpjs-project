/*
  This program and the accompanying materials are
  made available under the terms of the Eclipse Public License v2.0 which accompanies
  this distribution, and is available at https://www.eclipse.org/legal/epl-v20.html
  
  SPDX-License-Identifier: EPL-2.0
  
  Copyright IBM Corporation 2020
*/

const { dockStart } = require('@nlpjs/basic');

function onIntent(nlp, input) {
  console.dir(input.intent);
  if (input.intent === 'user.buy') {
      const output = input;
      
      return output;
  }
  return input;
}

const get = async function(message){
    const dock = await dockStart({ use: ['Basic']});
    const nlp = dock.get('nlp');
    await nlp.addCorpus('http://localhost:8000/storage/corpus-en.json');
    nlp.onIntent = onIntent;
    await nlp.train();
    const response = await nlp.process('en', message);
    return response.answer;
}

module.exports = {
    get
};
