<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HOMEPAGE</title>
    <h1>welcome to stores......</h1>
  </head>
  <body>
    <form action="SearchByRoll.php" method="post">
      <label for="roll"><b>Enter roll no :  </b></label>
        <input type="text" placeholder="eg : 160218735031" name="rollno" required>
      <input type="submit" name="search1" value="Search" />
    </form>
<br>

    <form action="SearchByComp.php" method="post">
      <label for="comps">Component :   </label>
    <select name="comp">
      <option value="default">--Choose comp--</option>
      <option value="nodemcu">Nodemcu(ESP8266)</option>
      <option value="raspberry pi">Raspberry pi 3</option>
      <option value="relay">relay</option>
      <option value="servo">Servo</option>
    </select>
    <input type="submit" name="search2" value="Search" />
    </form>
<br>
<form action="update.php" method="post">
  <h2>Update Records</h2><br>
  <label for="rolls"><b>Enter roll no   :  </b></label>
    <input type="text" placeholder="eg : 160218735031" name="roll_no" required><br>
    <label for="phno"><b>Enter Phone no :  </b></label>
      <input type="tel" placeholder="eg : 9123456782" name="phno" required><br>
      <label for="date1"><b>Enter Date of Return :  </b></label>
        <input type="date" placeholder="eg : 2020-04-01" name="date" required><br>
        <label for="comps">Component :   </label>
      <select name="comps">
        <option value="default">--Choose comp--</option>
        <option value="nodemcu">Nodemcu(ESP8266)</option>
        <option value="raspberry pi">Raspberry pi 3</option>
        <option value="relay">relay</option>
        <option value="servo">Servo</option>
      </select><br>
      <label for="count"><b>Enter count :  </b></label>
        <input type="number" placeholder="default 1" name="count"><br>
  <input type="submit" name="update" value="Update" />

</form>

  </body>
</html>
