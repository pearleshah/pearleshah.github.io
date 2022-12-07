<!-- Contains the relevant functions and calls in order to display statistics from the database 
as a pie chart for males vs. females based on a specific vaccine type -->

<html>
    <head>
        <title>Statistics</title>
        <link rel="stylesheet" href="styles.css">

        <a href="/bmes550FinalProject/index.php"><img src="https://icons.veryicon.com/png/o/miscellaneous/conventional-use/advanced-search.png" class="indexImage";></a>
        <a href="/bmes550FinalProject/statistics.php"><img src="https://www.iconpacks.net/icons/1/free-pie-chart-icon-660-thumb.png" class="statisticsImage";></a>
        <a href="/bmes550FinalProject/addrecord.php"><img src="https://icons.veryicon.com/png/o/miscellaneous/common/add-131.png" class="addRecordImage";></a>
    
        <!-- Styling -->
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

            .resultTitle {
                width: 100%;
                text-align: left;
                color: rgb(255, 255, 255);
                font-size: 26;
                text-align: center;
            }
      </style>
    </head>

    <!-- Logo -->
    <section class="header">
        <a href="/bmes550FinalProject/index.php"><img src="web_logo.png" width="234.4" height="62.4" alt="VaxTrax"></a>
    </section>
    
    <!-- Title -->
    <section class="searchRecords">
        <h1>STATISTICS</h1>
    </section>


    <table class="formFormat">
        <form method="POST">
            <!-- Most Common Vaccines For Up To Age 18 Based off of CDC: https://www.cdc.gov/vaccines/vpd/vaccines-age.html -->
            <tr>
                <td><label for="vax_name">VACCINE NAME: </label><td>
                    <td><select class="boxSize_statistics" name="vax_name" id="vax_name">
                        <!-- Dropdown menu of all the most common vaccines -->
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
                <td></td>
                <td></td>
                <td><input type="submit" class="submitButton2"></td>
            </tr>
        </form>
    </table>

    <br></br>

    <!-- Call to init.php to search sql database and display records based on function calls -->
    <?php
        require_once 'init.php';
        # Retrieve results from submitted form entry
        $vaxName = $_POST['vax_name'];
    ?>

    <!-- PIE CHART COUNT MALES VS. FEMALE -->
    <?php
        # find all the males and females in database who have received the vaccine
        $sql_male = "SELECT count(*) FROM vaccinerecords WHERE vaxName = '$vaxName' and gender = 'M'";
        $sql_female = "SELECT count(*) FROM vaccinerecords WHERE vaxName = '$vaxName' and gender = 'F'";

        $males = db_statistics($db, $sql_male);
        $females = db_statistics($db, $sql_female);

        # only display messages after form has been submitted at least once
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        # add warning if there are no records
        if (($males + $females)==0) {
            ?>
            <div class="warning"><b><u>WARNING:</u></b> No Records Exist for <b><?php echo $vaxName ?></b></div>
            <?php
            die();
        }
    ?>

    <!-- PIE CHART TITLE -->
    <div class="resultTitle"><i>Showing Results for <b><?php echo $vaxName ?></b></i></div>
    <br></br>

    <div class="#my-pie-chart" id="my-pie-chart-container">
    <div class="#my-pie-chart" id="my-pie-chart"></div>

    <?php
    # if there are records, display pie chart
        $male_perc_nosign = ($males/($males + $females)) * 100;
        $female_perc_nosign = ($females/($males + $females)) * 100;
        $male_perc = round($male_perc_nosign, 2) . '%';
        $female_perc = round($female_perc_nosign, 2) . '%';
    ?>

    <!-- DISPLAY PIE CHART -->
    <style>
        #my-pie-chart {
        height: 300;
        width: 300;
        border-radius: 50%;        
        background: conic-gradient(rgb(0, 255, 251) <?php echo $male_perc; ?>, rgb(248, 195, 195) 0 <?php echo $female_perc; ?>); 
        margin-left: auto;
        margin-right: auto;
        }
    </style>

    <!-- PIE CHART LEGEND -->
    <br></br>
    <div class="legend"><b><u>Legend</u></b></div>
    <div class="piecharttextfemale">Pink = Female (<?php echo $female_perc; ?>)</div>
    <div class="piecharttextmale">Blue = Male (<?php echo $male_perc; ?>)</div>
    </div>
    </div>

    <?php
        }
    ?>

</html>

