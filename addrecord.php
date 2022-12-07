<!-- Contains all the relevant functions and calls for a user to update the database with new patient records for immunizations. -->
<!-- Duplicate entries will be searched for before updating the database. -->

<html>
    <head>
        <title>Add Record</title>
        <link rel="stylesheet" href="styles.css">

        <a href="/bmes550FinalProject/index.php"><img src="https://icons.veryicon.com/png/o/miscellaneous/conventional-use/advanced-search.png" class="indexImage";></a>
        <a href="/bmes550FinalProject/statistics.php"><img src="https://www.iconpacks.net/icons/1/free-pie-chart-icon-660-thumb.png" class="statisticsImage";></a>
        <a href="/bmes550FinalProject/addrecord.php"><img src="https://icons.veryicon.com/png/o/miscellaneous/common/add-131.png" class="addRecordImage";></a>
    
        <!-- Styling -->
        <style>
            input[type=submit] {
                background-color: rgb(0, 255, 251);
                font-size: 15;
                transform: translate(239px, 20%);
            }

            a:link {
                color: black;
                text-decoration: none;
            }

            /* visited link */
            a:visited {
                color: black;
                text-decoration: none;
            }
      </style>
    </head>


    <!-- Logo -->
    <section class="header">
        <a href="/bmes550FinalProject/index.php"><img src="web_logo.png" width="234.4" height="62.4" alt="VaxTrax"></a>
    </section>

    <!-- TITLE -->
    <section class="searchRecords">
        <h1>ENTER PATIENT INFO</h1>
    </section>

    <!-- Form to add a new patient record -->
    <table class="formFormat">
        <form action="" method="POST">
            <tr>
                <td><label for="firstname">FIRST NAME: </label></td>
                <td><input class="boxSize_addRecord" type="text" id="firstname" name="firstname" size="20" required></td>
            </tr>

            <tr>
                <td><label for="lastname">LAST NAME: </label></td>
                <td><input class="boxSize_addRecord" type="text" id="lastname" name="lastname" size="20" required></td>
            </tr>

            <tr>
                <td><label for="patient_dob">DOB: </label></td>
                <td><input class="boxSize_addRecord2" type="date" id="patient_dob" name="patient_dob" required></td>
            </tr>

            <tr>
                <td><label for="age">AGE: </label></td>
                <td><input class="boxSize_addRecord" type="number" id="age" name="age" size="20" required></td>
            </tr>

            <tr>
            <td><label for="gender">GENDER: </label></td>
            <td><select class="boxSize_addRecord3" name="gender" id="gender" required>
                <option value="M">M</option>
                <option value="F">F</option>
            </select></td>
            </tr>
            
            <tr>
                <td><label for="address">ADDRESS OF VACCINE <div>ADMINISTRATION SITE:</div></label></td>
                <td><input class="boxSize_addRecord" type="text" id="address" name="address" size="20" required></td>
            </tr>

            <!-- https://www.cdc.gov/vaccines/vpd/vaccines-age.html-->
            
            <tr>
            <td><label for="vax_name">VACCINE NAME: </label></td>
            <td><select name="vax_name" id="vax_name" required>
                <option value="Hepatitis B (1st Dose)">Hepatitis B (1st Dose)</option>
                <option value="Hepatitis B (2nd Dose)">Hepatitis B (2nd Dose)</option>
                <option value="Diphtheria, tetanus, and whooping cough (pertussis) (DTaP)">Diphtheria, tetanus, and whooping cough (pertussis) (DTaP)</option>
                <option value="Haemophilus influenzae type b (Hib)">Haemophilus influenzae type b (Hib)</option>
                <option value="Polio (IPV)">Polio (IPV)</option>
                <option value="Pneumococcal (PCV)">Pneumococcal (PCV)</option>
                <option value="Rotavirus (RV)">Rotavirus (RV)</option>
                <option value="Hepatitis B (HepB)">Hepatitis B (HepB)</option>
                <option value="Chickenpox (Varicella)">Chickenpox (Varicella)</option>
                <option value="Measles, mumps, rubella (MMR)">Measles, mumps, rubella (MMR)</option>
                <option value="Hepatitis A (HepA)">Hepatitis A (HepA)</option>
                <option value="Influenza (flu)">Influenza (flu)</option>
                <option value="Meningococcal conjugate vaccine">Meningococcal conjugate vaccine</option>
                <option value="HPV vaccine">HPV vaccine</option>
                <option value="Tdap">Tdap</option>
            </select></td>
            </tr>

            <tr>
                <td><label for="lot_number">VACCINE LOT #: </label></td>
                <td><input class="boxSize_addRecord" type="text" id="lot_number" name="lot_number" size="20" required></td>
            </tr>

            <tr>
                <td><label for="expiration_date">VACCINE EXPIRATION DATE: </label></td>
                <td><input class="boxSize_addRecord2" type="date" id="expiration_date" name="expiration_date" size="20" required></td>
            </tr>

            <tr>
                <td><label for="administer_date">VACCINE ADMINISTRATION DATE: </label></td>
                <td><input class="boxSize_addRecord2" type="date" id="administer_date" name="administer_date" size="20" required></td>
            </tr>

            <tr>
            <td><label for="arm">ARM: </label></td>
            <td><select class="boxSize_addRecord4" name="arm" id="arm" required>
                <option value="L">L</option>
                <option value="R">R</option>
            </select></td>
            </tr>

            <tr>
                <td></td>
                <td><input class="submitButtonAddRecord" type="submit" name="submit"></td>
            </tr>

        </form>
    </table>




<!-- EXECUTE PHP CODE TO GET RESULTS BASED ON FORM ENTRY AND UPDATE DATABASE-->
<?php

require_once 'init.php';

####################################################
#if table does not exist, create it and add sample entries.
if(!$db->query("SELECT name FROM sqlite_master WHERE type='table' AND name='vaccinerecords'")->fetch()){

    $db->exec("BEGIN TRANSACTION"); #group statements that should work together in a transaction.

	$db->exec("CREATE TABLE   IF NOT EXISTS vaccinerecords (
    id DATE PRIMARY KEY,
    fname VARCHAR,
    lname VARCHAR,
    dob DATE,
    age INT,
    gender VARCHAR,
    vaxAddress VARCHAR,
    vaxName VARCHAR, 
    vaxLN VARCHAR,
    vaxExp DATE,
    vaxDate DATE,
    arm VARCHAR
    )");

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $patient_dob = $_POST['patient_dob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $vaxName = $_POST['vax_name'];
    $vaxLN = $_POST['lot_number'];
    $vaxExp = $_POST['expiration_date'];
    $vaxDate = $_POST['administer_date'];
    $arm = $_POST['arm'];

    $db->exec("INSERT INTO vaccinerecords(fname, lname, dob, age, gender, vaxAddress, vaxName, vaxLN, vaxExp, vaxDate, arm) VALUES ('$firstname', '$lastname', '$patient_dob',
    '$age', '$gender', '$address', '$vaxName', '$vaxLN', '$vaxExp', '$vaxDate', '$arm')");

    ?>
    <div class="message">Patient records updated successfully!</div>
    <?php
   
	$db->exec("COMMIT");
    }

# if table is already made in sql, update entries
else {

    # make sure none of the entries in form are empty, otherwise, output error message
    # make sure they are unique entries

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $patient_dob = $_POST['patient_dob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $vaxName = $_POST['vax_name'];
    $vaxLN = $_POST['lot_number'];
    $vaxExp = $_POST['expiration_date'];
    $vaxDate = $_POST['administer_date'];
    $arm = $_POST['arm'];

    # check if duplicate records are found; if so, display warning message
    $sql = "SELECT count(*) FROM vaccinerecords WHERE fname = '$firstname' and lname = '$lastname' and dob = '$patient_dob' and age = '$age' and
    gender = '$gender' and vaxAddress = '$address' and vaxName = '$vaxName' and vaxLN = '$vaxLN' and 
    vaxExp = '$vaxExp' and vaxDate = '$vaxDate' and arm = '$arm'";

    if (isset($_POST['submit'])) {
        if(db_getsinglevalue($db, $sql)>0){
            ?>
            <div class="warning">Duplicate patient record found. Please try again!</div>
            <?php
            die();
        }
        else{    
            $db->exec("INSERT INTO vaccinerecords(fname, lname, dob, age, gender, vaxAddress, vaxName, vaxLN, vaxExp, vaxDate, arm) VALUES ('$firstname', '$lastname', '$patient_dob',
            '$age', '$gender', '$address', '$vaxName', '$vaxLN', '$vaxExp', '$vaxDate', '$arm')");    

            ?>
            <div class="message">Patient records updated successfully!</div>
            <?php
            }
        }
    }

    ?>
</html>

