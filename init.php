<!-- Contains the relevant information for creating a connection to a database and executing various SQL queries needed in other scripts. -->

<?php

################## DATABASE CREATION ############################

# Define path to temporary data directory
$dbdir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "bmeproject";

# Create directory if it doesn't exist already
if (!file_exists($dbdir)) {
    mkdir($dbdir, 0777, true); 
}

# define path for where SQL file will be created and stored
$dbfile= ($dbdir . DIRECTORY_SEPARATOR . '/vaccinerecordsdb.sqlite');

# error_reporting(E_ALL&~E_NOTICE);

#create database connection
$db=new PDO("sqlite:$dbfile");
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

# checks if database table exists
function doesdbtableexist($db, $tablename) {
	return $db->query("SELECT name FROM sqlite_master WHERE type='table' AND name='$tablename'")->fetch();
}

################## FUNCTIONS ##################################

# checks how many rows exist based on specific query and returns the query
function db_getsinglevalue($db, $sql) {
    $rows=$db->query($sql)->fetchColumn();
    #echo "<h3>Rows:</h3><pre>"; print_r($rows); echo "</pre>";
    return $db->query($sql)->fetchColumn();
}

# counts the number of rows with for a particular column and row
function db_statistics($db, $sql) {
    $rows=$db->query($sql)->fetchColumn();
    #print_r($rows);
    return $rows;
}

# searches the records in the db based on sql query and outputs all the relevant information for a particular patient stored in db
function search_records($db, $sql, $sql_count) {
    $rows=$db->query($sql)->fetchAll();

    # find how many mtches there are, and echo all results via loop
    $i = db_statistics($db, $sql_count);

    # goes through each subarray (row) of information
    for ($j = 0 ; $j < $i; $j++) {
        echo "<tr>";
        # prints each column of information in each row
        for ($k = 4 ; $k < 12; $k++) {
            echo "<td>"; print_r($rows[$j][$k]); echo "</td>";
        }
        echo "</tr>";
    }
}

