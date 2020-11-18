
<!DOCTYPE html>
<html>
<head><title>Ürlap</title></head>
<body>
	<form action="feldolgoz.php"  method="POST" enctype="multipart/form-data" >
	<table>
		<tr>
			<td>Vezeték név:</td>
			<td><input type="text" name="name" /></td>
		</tr>
		<tr>
			<td>Kereszt név:</td>
			<td><input type="text" name="f_name" /></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email" /></td>
        </tr>
		<tr>
            <td>Jelszó:</td>
            <td><input type="password" name="password" /></td>
        </tr>
		<tr>
            <td>Megjegyzés:</td>
            <td><textarea name="comment" rows="6" cols="45"></textarea></td>
        </tr><tr></tr>
		<tr>
		<td>Fénykép:</td>
		<td><input type="file" name="imag" /></td>
		</tr><tr></tr>
		<tr>
            <td>Feltételek elfogadása:</td>
            <td><input type="radio" name="accept" /></td>
        </tr>
        <tr><td colspan="2"><input type="submit" name="ok" value="küld" /></td></tr>
		
	</table>
	</form>

</body>
</html>
