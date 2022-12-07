<!-- Redirect Page for index.php: Allows a user to view the immunization history based on a patient search. -->

<html>
    <head>
        <title>Search Records</title>
        <link rel="stylesheet" href="styles.css">

        <a href="/bmes550FinalProject/index.php"><img src="https://icons.veryicon.com/png/o/miscellaneous/conventional-use/advanced-search.png" class="indexImage";></a>
        <a href="/bmes550FinalProject/statistics.php"><img src="https://www.iconpacks.net/icons/1/free-pie-chart-icon-660-thumb.png" class="statisticsImage";></a>
        <a href="/bmes550FinalProject/addrecord.php"><img src="https://icons.veryicon.com/png/o/miscellaneous/common/add-131.png" class="addRecordImage";></a>

        <!-- Styling of Vaccine History Table -->
        <style>
            a:link {
                color: black;
                text-decoration: none;
            }

            /* visited link */
            a:visited {
                color: black;
                text-decoration: none;
            }

            /* Table Styling */
            table.tb {       
                margin-left: auto;
                margin-right: auto;
            }
            
            .tb th, .tb td { 
                border: solid 1px #777; 
                padding: 5px;  
                text-align:center; 
            }
            
            .theader { 
                background: white;
                text-align: center; 
            }

            .tcell { 
                background: rgb(248, 195, 195);; 
                text-align: center; 
            }

      </style>
    </head>

    <!-- Logo -->
    <section class="header">
        <a href="/bmes550FinalProject/index.php"><img src="web_logo.png" width="234.4" height="62.4" alt="VaxTrax"></a>
    </section>

    <body>


    <!-- Call to init.php to search sql database and display records based on function calls -->
    <?php

    require_once 'init.php';

    # retrieve results of submitted search record firm
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['patient_dob'];

    # find all the males and females in database who have received the vaccine based on name and DOB
    $sql = "SELECT * FROM vaccinerecords WHERE fname = '$firstname' and lname = '$lastname' and dob = '$dob'";
    # Count how many records there are fr the patient
    $sql_count = "SELECT count(*) FROM vaccinerecords WHERE fname = '$firstname' and lname = '$lastname' and dob = '$dob'";

    # only print table if records are found
    $num_rows = db_statistics($db, $sql_count);
    if ($num_rows > 0) {
        ?>
        <h1 class="searchRecords"><?php echo "Patient: $firstname $lastname"?>
        <div><?php echo "(DOB: $dob)"; ?></h1></div>

        <!-- print results as table -->
        <table class="tb">
            <thead class="theader">
                <tr>
                    <td><b>AGE</b></td>
                    <td><b>GENDER</b></td>
                    <td><b>ADDRESS OF VACCINE ADMINISTRATION SITE</b></td>
                    <td><b>VACCINE NAME</b></td>
                    <td><b>VACCINE LOT #</b></td>
                    <td><b>VACCINE EXPIRATION DATE</b></td>
                    <td><b>VACCINE ADMINISTRATION DATE</b></td>
                    <td><b>ARM</b></td>
                </tr>
            </thead>

            <tbody class="tcell">
                <!-- PRINT EACH RECORD IN TABLE -->
                <?php search_records($db, $sql, $sql_count); ?>
            </tbody>
        </table>
        <?php
        } 

    # Warning sign if no records found
    else {
        ?>
        <div class="warning">No Records Found for 
            <?php echo "Patient $firstname $lastname" ?>
            <p><?php echo "(DOB: $dob)"; ?></p>
            <p>Please enter new patient in search and try again.</p></div>
        <?php
        }
        ?>

    </body>
</html>
