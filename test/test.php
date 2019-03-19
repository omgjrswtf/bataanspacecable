<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="nextpage.php" name="myform" id="myform">
<div id=rout_markers>asdsa</div>
<input type="hidden" name="someNewName" id="someNewName" value="" />
<input type="text" id="rout_markers2"  name="rout_markers2"/>
<input type="hidden" name="someNewName2" id="someNewName2" value="" />
<input type="submit" id="send-btn"  class="button" value="SEND NOW" onclick="submitform()" />
</form>


<script type="text/javascript">
function submitform()
{
  var hiddenData = document.getElementById('rout_markers').value;
  var hiddenData2 = document.getElementById('rout_markers2').value;
  document.getElementById('someNewName').value = hiddenData;
  document.getElementById('someNewName2').value = hiddenData2;
  document.myform.submit();
}
</script>

</body>
</html>