<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <input type="text" id="amt">
  <p id="balance"></p>
  <button onclick="deposit()">Deposit</button>
  <button onclick="withdraw()">Withdraw</button>

  <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.37/dist/web3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    var contract;
    $(document).ready(function(){
      web3 = new Web3(web3.currentProvider);
      var address="0x85e7acd146e607073375d9df09bf5cf8cfa10d90";
      var abi = [
        {
        "constant": false,
        "inputs": [
          {
            "name": "amt",
            "type": "int256"
          }
        ],
        "name": "deposit",
        "outputs": [],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "function"
        },
        {
        "constant": false,
        "inputs": [
          {
            "name": "amt",
            "type": "int256"
          }
        ],
        "name": "withdraw",
        "outputs": [],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "function"
        },
        {
        "inputs": [],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "constructor"
        },
        {
        "constant": true,
        "inputs": [],
        "name": "getBalance",
        "outputs": [
          {
            "name": "",
            "type": "int256"
          }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
        }
      ];
      contract = new web3.eth.Contract(abi,address);
      contract.methods.getBalance().call().then(function(bal){
        $('#balance').html(bal);
      });
    });
    function deposit(){
      web3.eth.getAccounts().then(function(acc){
        contract.methods.deposit(parseInt($("#amt").val())).send({from: acc[0]}).then(function(bal){
          $('#balance').empty();
          $('#balance').html(bal);
        });
      });
    }
    function withdraw(){
      contract.methods.withdraw($("#amt").val()).then(function(bal){
        $('#balance').empty();
        $('#balance').html(bal);
      });
    }
  </script>
</body>
</html>