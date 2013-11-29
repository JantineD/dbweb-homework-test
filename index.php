<?php
if (!isset($_REQUEST['submit'])) {
?>
<form method=get>
<p>Which option isn't a color?</p>
<input type="radio" name="radio" value="Red"> Red<br>
<input type="radio" name="radio" value="Green"> Green<br>
<input type="radio" name="radio" value="Blue"> Blue<br>
<input type="radio" name="radio" value="Zwart"> Black<br>
<input type="submit"
name="submit"
value="submit">
</form>
<?php
}
 else {
if ($_REQUEST['radio'] === "Zwart")
	{
	echo "Correct! Black isn't a color.";
	} else {
	echo "false" . " " . ($_REQUEST['radio']) . " " . "is a color!";
	}
}
?>