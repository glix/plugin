<?php  session_start(); ?>
<html>
<head>
<script>
function getVote(int)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("wrap-poll_2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","demo.php?vote="+int,true);
xmlhttp.send();
}
</script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/uniform.css">
<script type="text/javascript" src="js/jquery.min.js" ></script>
<script type="text/javascript" src="js/jquery.uniform.js" ></script>

</head>

<body>


<script type="text/javascript">
$(function() {
	$("input[type='radio']").uniform();
	$('button').click(function(e) {
		e.preventDefault();
		var radioValue =  $('input:radio[name=vote]:checked').val();
		if( radioValue ) {
			getVote(radioValue);	
		} else {
			var msg = 'Select a option.';
			$('.alert.alert-error').html(msg).slideDown().delay(5000).slideUp();
		}
		
	});
})
</script>

<script type="text/javascript">
   // Every two seconds....      
   var i = 1;
    setInterval(function() {
       var height = $('body').height() + 16;
       
       parent.postMessage( height +"px","*");
       // Send the message "Hello" to the parent window
       // ...if the domain is still "davidwalsh.name"
       //parent.postMessage(($('body').height() +110)+"px","*");
   },2000);

   
</script>
<div id="wrap-poll_2" class="pollData">
	<?php if( !$_SESSION['check'] ): ?>
	<h3>Do you like this website ?</h3>
	<form>
	<div class="alert alert-error"></div>
	<div class="field">
		Yes:
		<input type="radio" name="vote" value="1" >
	</div>
	<div class="field">
		No:
		<input type="radio" name="vote" style value="2">
	</div>
	<div class="field">
		Not Sure:
		<input type="radio" name="vote" style value="3">
	</div>
	<div class="field">
		Maybe:
		<input type="radio" name="vote" value="4" >
	</div>
	
	<button class="submit-vote btn"> Vote</button>
	</form>
	<?php else : ?>
		<?php include_once('demo.php'); ?>
	<?php endif;  ?>
</div>

</body>
</html>