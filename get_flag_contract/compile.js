const path = require('path');
const fs = require('fs');
const solc = require('solc');
 
const adminPath = path.resolve(__dirname, 'contracts', 'Admin.sol');
const source = fs.readFileSync(adminPath, 'utf8');
 
const input = {
  language: 'Solidity',
  sources: {
    'Admin.sol': {
      content: source,
    },
  },
  settings: {
    outputSelection: {
      '*': {
        '*': ['*'],
      },
    },
  },
};
// console.log(JSON.parse(solc.compile(JSON.stringify(input))).contracts);
module.exports = JSON.parse(solc.compile(JSON.stringify(input))).contracts[
  'Admin.sol'
].Admin;



