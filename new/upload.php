<?php
$target = "C:\xampp\htdocs\Plagiarism\new\files";
$target = $target . basename( $_FILES['Filename']['name']);
//echo "$target";
//This gets all the other information from the form
$Filename=basename( $_FILES['Filename']['name']);



$Description=$_POST['Description'];


//Writes the Filename to the server
if(move_uploaded_file($_FILES['Filename']['tmp_name'], $target)) {
    //Tells you if its all ok
    echo "The file ". basename( $_FILES['Filename']['name']). " has been uploaded, and your information has been added to the directory";
    // Connects to your Database
    mysql_connect("localhost", "atharva", "ath") or die(mysql_error()) ;
    mysql_select_db("plagiarism") or die(mysql_error()) ;

    //Writes the information to the database
    mysql_query("INSERT INTO files (Filename,Description)
    VALUES ('$Filename', '$Description')") ;
} else {
    //Gives and error if its not
    echo "Sorry, there was a problem uploading your file.";
}



?>