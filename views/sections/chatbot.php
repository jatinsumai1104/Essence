<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .btn-voice-input {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-image: linear-gradient(to right, #649bff, #0070fa, #649bff);
        color: #fff;
        border-radius: 50px;
        text-align: center;
        z-index: 100000;
        font-size: 20px;
      }
      .chat-popup {
        display: none;
        position: fixed;
        bottom: 70px;
        right: 15px;
        border: 3px solid #f1f1f1;
        z-index: 9;
      }
    </style>
  </head>
  <body>
    <button type="button" class="btn btn-voice-input" id="voice-input" name="voice_input" onclick="toggle();">C
    </button>
    <div class="chat-popup" id="myForm" style="border-radius: 10px">
      <h2>Hello</h2>
    </div>

    <script>
    var status = "none";
    function toggle(){
      status == "block" ? status = "none" : status = "block";
      document.getElementById("voice-input").style.display = status;
      document.getElementById("myForm").style.display = status;
    }
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>