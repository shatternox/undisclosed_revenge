/**
 * 
 *  Contract Address: 0xb60956EF2469f30F2CEAE16B0D627f2837120D4a
 * 
 */

const HDWalletProvider = require('@truffle/hdwallet-provider');
const Web3 = require('web3');
 
const { abi, evm } = require('./compile');
 
provider = new HDWalletProvider(
    'kidney debate foil book illness grant drama clog market under party carpet',
    'https://goerli.infura.io/v3/a6f3a6efb1f44ba399ca1d087dc7e5bb'
);
 
const web3 = new Web3(provider);
 
const deploy = async () => {
  const accounts = await web3.eth.getAccounts();
 
  console.log('Attempting to deploy from account', accounts[0]);
 
  const result = await new web3.eth.Contract(abi)
    .deploy({ data: evm.bytecode.object, arguments: ['NCW22{bl0ckch41n_1n_th3_m1x_5231672129}'] })
    .send({ gas: '1000000', from: accounts[0] });
 
  console.log('Contract deployed to', result.options.address);
  provider.engine.stop();
};
 
deploy();