<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Student Sign Up</title>
      <link rel="stylesheet" href="sources/studentForm.css">
  </head>
  <body>

<?php
if(isset($_POST['add']))

{
	$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'AAaa11``';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(!$conn )
{
  die('Could not connect: ' . mysql_error());
}
if(! get_magic_quotes_gpc() )
	
{
   $iq = addslashes ($_POST['iq']);
   $cgpa = addslashes ($_POST['cgpa']);
 
   
}
else
{
   $iq = ($_POST['iq']);
   $cgpa =  ($_POST['cgpa']);
}
//$submission_date = $_POST['submission_date'];
$sql = "INSERT INTO profNeed".
       "(iq ,cgpa) ".
       "VALUES ".
       "('$iq','$cgpa')";
mysql_select_db('signup');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully\n";
mysql_close($conn);
}
else
{
?>
    <form method="post" action="<?php $_PHP_SELF ?>">

      <h1>Sign Up</h1>

      <fieldset>
        <legend><span class="number">1</span>Basic Information</legend>
        <label for="iq">minimum required IQ:</label>
        <input type="text" id="iq" name="iq">


        <label for="cgpa">CGPA:</label>
        <input type="number" id="cgpa" name="cgpa">


        
      </fieldset>



    </form>
<?php
}
?>
  </body>
</html>