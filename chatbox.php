<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>


<table> <tbody>
        <tr>
                <form method = "POST"> <!--FORM: will submit to same page (index.php), and if ($_SERVER["REQUEST_METHOD"] == "POST") will catch it --> 
                    <td colspan = "2">
                    <input type = "text" style = "width:100%" name = "message" autofocus onchange="saveChange(this)" onkeydown="onKey(event)"></input>
                    </td>
                    <td>
                        <button class = "mybutton" type = "submit">Add New Message</button></td></tr>
                    </td> 
                </form>
            </tr>
            </tbody>
        </table>

</body>
</html>
