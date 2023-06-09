 <html>
<head>
   <title>jQuery AJAX POST Example</title>
   <style>
    body{
       font-family: "Arial Black", Gadget, sans-serif;
    }
     #container{
       text-align: center;
     }
    #container table{
      margin: 0 auto;
      text-align: left;
    }

    .btn {
      background-color: #008CBA;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 4px;
    }

    input[type='text'], input[type='email'] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

  .success, .error{
    width: 20%;
    border: 1px solid;
    margin: 10px 0px;
    padding:15px 10px 15px 50px;
    background-repeat: no-repeat;
    background-position: 10px center;
    display: inline-block;
  }
.success {
  color: #4F8A10;
  background-color: #DFF2BF;
}

.error {
  color: #D8000C;
  background-color: #FFBABA;
  }
</style>
</head>
<body>
 <div id = "container" >
   <h3>jQuery AJAX Post method example with php and MySQL</h3>
   <p><strong>Please fill in the form and click save.</strong></p>
   <div id="message"></div>
    <form name='form1'>
      <table align = "">
        <tr><td></td></tr>
         <tr>
            <td>
              <label>First Name:</label>&nbsp;
            </td>
            <td>
              <input type='text' placeholder='First Name' name='first_name' id= 'first_name' required ><br />
            </td>
          </tr>
          <tr>
            <td>
                <label>Last Name:</label>&nbsp;
            </td>
            <td>
              <input type='text' placeholder='Last Name' name='last_name' id='last_name' required ><br />
            </td>
          </tr>
          <tr>
            <td>
              <label>Email:</label>&nbsp;
            </td>
            <td>
              <input type='email' name='email' placeholder='Email' id='email' required ><br />
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <input class='btn' type="button" id = "saveusers" value = "Save" />
            </td>
          </tr>
        </table>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
    $(function(){
        $("#saveusers").on('click', function(){
            var first_name  = $("#first_name").val();
            var last_name   = $("#last_name").val();
            var email       = $("#email").val();

            $.ajax({
              method: "POST",
              url:    "saverecords_ajax.php",
              data: { "first_name": first_name, "last_name": last_name, "email": email},
             }).done(function( data ) {
                var result = data;
                var str = '';
                var cls = '';
                if(result == 1) {
                  str = 'User record saved successfully.';
                  cls = 'success';
                }else if( result == 2) {
                  str = 'All fields are required.';
                  cls = 'error';
                }else if( result == 3) {
                  str = 'Enter a valid email address.';
                  cls = 'error';
                }else{
                  str = 'User data could not be saved. Please try again';
                  cls = 'error';
                }
              $("#message").show(3000).html(str).addClass('success').hide(5000);
          });
       });
     });

  </script>
</body>
</html>