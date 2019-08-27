<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
    margin: 0px;
    padding: 0px;
}
body{
    font-size: 120%;
    background: #F8F8FF;
}
.header{
    width: 30%;
    margin: 50px auto 0px;
    color: white;
    background: #5F9EA0;
    text-align: center;
    border: 1px solid #B0C4DE;
    border-bottom: none;
    border-radius: 10px 10px 0px 0px;
    padding: 20px;
}
form{
    width: 30%;
    margin: 0px auto;
    padding: 20px;
    border: 1px solid #B0C4DE;
    background: white;
    border-radius: 0px 0px 10px 10px;
}
.input-group{
    margin: 10px 0px 10px 0px;
}
.input-group label{
    display: block;
    text-align: left;
    margin: 3px;
}
.input-group input{
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
}
.btn{
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #5F9EA0;
    border: none;
    border-radius: 5px;
}
@media screen and (max-width: 300px) {

}
</style>
</head>
<body>
    <div class="header">
        <h2>Forgot Password Request</h2>
    </div>

<form method="post" action="mail.php">
    <div class="input-group">
        <label><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" pattern="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*" required>
    </div>
  
    <div class="input-group">
        <button type="submit" name="submit" class="btn">Submit</button>
    </div>

</form>

</body>
</html>

<!-- Use for Forgot Password-->

<!-- <script type="text/javascript">
function JSalert(){
    swal({   title: "Require Email!",   
    text: "Enter your email address:",   
    type: "input",   
    showCancelButton: true,   
    closeOnConfirm: false,   
    animation: "slide-from-top",   
    inputPlaceholder: "Your Email address" }, 
    
    function(inputValue){   
        if (inputValue === false) 
        return false;      
           if (inputValue === "") {     
            swal.showInputError("Please enter email!");     
            return false   
            }      
         swal("Action Saved!", "You entered following email: " + inputValue, "success"); });
}
</script> -->