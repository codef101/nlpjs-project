const { StopwordsEn } = require('@nlpjs/lang-en');

const stopwords = new StopwordsEn();
stopwords.dictionary = {};
stopwords.build(['is', 'your']);
console.log(stopwords.removeStopwords(['who', 'is', 'your', 'develop']));
