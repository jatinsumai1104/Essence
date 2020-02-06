<!-- ##### Footer Area Start ##### -->
<?php
require_once(__DIR__.'/footer.php')

?>
    <!-- ##### Footer Area End ##### -->

<?php
require_once(__DIR__.'/scripts.php');
require_once(__DIR__.'/add-cart-modal.php');
require_once(__DIR__.'/delete-cart-modal.php');
?>

<script>
    $(".add_to_cart").on("click", function(e) {
        // console.log($(this).attr("id"))
        $("#recordId").val($(this).attr("id"));
        $("#delete_class_name").val($(this).attr("class_name"));
    });

    $(".delete-from-cart").on("click", function(e) {
        console.log("hii");
        console.log($(this).attr("id"))
        $("#recordId2").val($(this).attr("id"));
        
    });
</script>
    
<script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.37/dist/web3.min.js"></script>
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
            // parseInt(parseInt($("#amt").val())/73)
            contract.methods.deposit(parseInt(parseInt($("#amt").val())/73)).send({from: acc[0]}).then(function(bal){
                console.log("Rs. "+parseInt(parseInt($("#amt").val())/73)+" Credited");
            });
        });
    }

    function withdraw(){
        checkSufficientBalance(function(data){
            if(data){
                web3.eth.getAccounts().then(function(acc){
                    // parseInt(parseInt($("#amt").val())/73)
                    contract.methods.withdraw(parseInt(parseInt($("#amt").val())/73)).send({from: acc[0]}).then(function(bal){
                        console.log("Rs. "+parseInt(parseInt($("#amt").val())/73)+" Debited");
                    });
                });
                console.log("Success");
            }else{
                console.log("Not Enough Balance");
            }
        });
    }

    function checkSufficientBalance(callback){
        contract.methods.getBalance().call().then(function(bal){
            var res = false;
            if(bal > (parseInt(parseInt($("#amt").val())/73))){
                res = true;
            }
            callback(res);
        });
    }

    
    function checkBalance(callback){
        contract.methods.getBalance().call().then(function(bal){
            callback(bal);
        });
    }
    
</script>
</body>

</html>