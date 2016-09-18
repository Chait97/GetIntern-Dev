<!DOCTYPE html>
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
   $name = addslashes ($_POST['name']);
   $mail = addslashes ($_POST['mail']);
   $password = addslashes ($_POST['password']);
   $sAge = addslashes ($_POST['sAge']);
   $place = addslashes ($_POST['place']);
   $college = addslashes ($_POST['college']);
   $Feild = addslashes ($_POST['Feild']);
   $branch = addslashes ($_POST['branch']);
   $Semester = addslashes ($_POST['Semester']);
   $cgpa = addslashes ($_POST['cgpa']);
   $PoI = addslashes ($_POST['PoI']);
   $dateIn = addslashes ($_POST['dateIn']);
   $dateOut = addslashes ($_POST['dateOut']);
   $soft = addslashes ($_POST['soft']);
}
else
{
   $name = ($_POST['name']);
   $mail =  ($_POST['mail']);
   $password =  ($_POST['password']);
   $sAge =  ($_POST['sAge']);
   $place =  ($_POST['place']);
   $college = ($_POST['college']);
   $Feild =  ($_POST['Feild']);
   $branch =($_POST['branch']);
   $Semester = ($_POST['Semester']);
   $cgpa =  ($_POST['cgpa']);
   $PoI =  ($_POST['PoI']);
   $dateIn = ($_POST['dateIn']);
   $dateOut =  ($_POST['dateOut']);
  $soft = ($_POST['soft']);
}
//$submission_date = $_POST['submission_date'];

$sql = "INSERT INTO details".
       "(name,mail,password, sAge,place,college,Feild,branch,Semester,cgpa,PoI,dateIn,dateOut,soft) ".
       "VALUES ".
       "('$name','$mail','$password', '$sAge','$place','$college','$Feild','$branch','$Semester','$cgpa','$PoI','$dateIn','$dateOut','$soft')";
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
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">

        <label for="mail">Email:</label>
        <input type="text" id="mail" name="mail">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">

        <label for="sAge">Age:</label>
        <input type="number" id="sAge" name="sAge">

        <label for="place">Place:</label>
        <input type="text" id="place" name="place">
      </fieldset>

      <fieldset>
        <legend><span class="number">2</span>Education</legend>
        <label for="college">College:</label>
            
                <input list="browsers">
                <datalist id="browsers">
                    <option value="Indian Institute of Technology Hyderabad">
                    <option value="International Institute of Information Technology Hyderabad">
                    <option value="XYZ College">
                </datalist>
           
        <label for="Field">Field:</label>
        <input type="text" id="Field" name="Field">
        <label for="branch">Branch:</label>
        <input type="text" id="branch" name="branch">
        <label for="Semester">Semester:</label>
        <input type="number" id="Semester" name="Semester">
        <label for="cgpa">CGPA out of 10:</label>
        <input type="number" min="0" max="10" id="cgpa" name="cgpa">
    </br>
    </br>
          <legend><span class="number">3</span>Your Internship</legend>
        <label for="PoI">Fields of Interests:</label>
        <input type="text" id="PoI" name="PoI">
        <p>Period of Internship</p>
            <div class="twocol">
                <div class="col1">
                    <label for="dateIn">From:</label>
                    <input type="date" id="dateIn" name="dateIn">
                </div class="col2">
                    <label for="dateOut">To:</label>
                    <input type="date" id="dateOut" name="dateOut">
                </div>
            </div>

        <label for="soft">Soft Skills:</label>
        <input type="text" id="soft" name="soft">
    </br>
        <button type="submit" name="add" id="add">Create My Profile</button>
      </fieldset>


    </form>
<?php
}
?>
  </body>
</html>
