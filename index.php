<!-- Main Page for Web Application: Allows a user to search patient recrds. -->

<html>
    <head>
        <title>Search Records</title>
        <link rel="stylesheet" href="styles.css">

        <a href="/bmes550FinalProject/index.php"><img src="https://icons.veryicon.com/png/o/miscellaneous/conventional-use/advanced-search.png" class="indexImage";></a>
        <a href="/bmes550FinalProject/statistics.php"><img src="https://www.iconpacks.net/icons/1/free-pie-chart-icon-660-thumb.png" class="statisticsImage";></a>
        <a href="/bmes550FinalProject/addrecord.php"><img src="https://icons.veryicon.com/png/o/miscellaneous/common/add-131.png" class="addRecordImage";></a>
    
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
        </style>
    </head>


    <!-- Logo -->
    <section class="header">
        <a href="/bmes550FinalProject/index.php"><img src="web_logo.png" width="234.4" height="62.4" alt="VaxTrax"></a>
    </section>

    <!-- Title -->
    <section class="searchRecords">
        <h1>SEARCH RECORDS</h1>
    </section>

    <!-- Title -->
    <table class="formFormat">
        <!-- Redirect to vaxhistory.php to push form results and display data table of vaccine records for patient -->
        <form action="vaxhistory.php" method="POST">    
            <tr>
                <td><label for="firstname" >FIRST NAME: </label></td>
                <td><input class="boxSize" type="text" id="firstname" name="firstname" size="20" required></td>
            </tr>

            <tr>
                <td><label for="lastname">LAST NAME: </label></td>
                <td><input class="boxSize" type="text" id="lastname" name="lastname" size="20" required></td>
            </tr>

            <tr>
                <td><label for="patient_dob">DOB: </label></td>
                <td><input class="boxSize" type="date" id="patient_dob" name="patient_dob" required></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" class="submitButton"></td>
            </tr>
        </form>
    </table>

</html>


