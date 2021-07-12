<?php
 $servername = "localhost";
 $username = "himanishinedezig_himanishinedezig";
 $password = "!K($4qHcoWjt";
 $dbname = "employee";

 // Create connection
 $db = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($db->connect_error) {
     die("Connection faileds: " . $db->connect_error);
 }
