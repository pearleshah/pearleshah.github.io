# **Web App: VaxTrax**

This web application, **VaxTrax**, is meant to bridge the gap between healthcare providers and patients. The goal is for healthcare providers to universally access and update patient records securely when a patient receives an immunization. The hope is that a universal database system will allow patient immunization records to be up-to-date, regardless of the provider that the patient receives the immunization at. This will help decrease missed or incorrect immunization records for patients, especially if immunizations are received at places other than just a primary care doctor's office. This database is made to included the most common U.S. immunizations needed from birth till the age of 18 years based on the [CDC] (https://www.cdc.gov/vaccines/vpd/vaccines-age.html). However, it can be utilized for patients over the age of 18 if they are immunized with any of the common vaccines as well throughout their lifetime.
#
## **Getting Started**

These instructions will help you run these files on your local machine. This file contains all the relevant information regarding the individual files contained within this project that aided in the web application's development. 

### **Running the Web Application**

This web application will be able to run locally on any desktop browser through an alias made with localhost in the appropriate directory that these files are located in. A database file will be created in a temporary folder on the machine as the web application is interacted with and used by a user. No additional installations are necessary to run this web application.
#
## **Built With**

#### _ _Database_ _
* SQL: Stores all the patient vaccine records. 
#### _ _Web_ _
* HTML: Mainly used for forms and user-interactiion within the web application. 
* CSS: Used for the styling of the various webpages. 
* PHP: Utilized for the functionality of the webpages to interact with the webpages dynamically. 
#
## **Files**

#### design.docx
    This document covers the overall design of the web application, including a design of each of the webpages, database schema, and user-application interaction figure.

#### thumb.png
    This file is a thumbnail or png of our web application's logo.

#### web_logo.png
    This file is the logo used on the web application pages. 

#### sketch.png
    This file consists of a preliminary sketch of the home page for our web application.

#### styles.css
    This is the CSS file that allows for universal styling accoss all of the webpages. For instance, the logo and menu icons are specifically kept the same across all the pages so that the user can navigate from page to page efficiently.

#### init.php
    This file contains some functions that allow for the creation and connection of a database in SQL, along with a table for the vaccine history records for each patient. The database (SQL file) is stored in a temporary folder on the machine running the web application.

    Additionally, this file has other common functions that are called from other php files within this application.  
    
#### index.php
    This is the starting webpage for the VaxTrax. It consists of a simple entry form that maps a patient's immunization records based on their first name, last name, and date of birth (unique fields for each patient in the database system). If a user clicks on submit, they will be redirected to another page displaying the results of the immunization record search. The results from the index.php file are pushed to vaxhistory.php.

#### vaxhistory.php
    This file uses the results pushed from the index.php webpage and creates a table of results. This table has all the relevant records and information pertaining to past immunizations that a patient has received. A patient's age, gender, vaccine administration site address, vaccine name, vaccine lot number, vaccine expiration date, vaccine administration date, and arm will be listed for each past vaccine received under the patient's records. If no records are found for a particular patient, a warning message will pop up accordingly. Records pulled from the database will be determined via various functions called from the init.php file. 

#### addrecord.php
    * This file has a form that allows users to add new patient immunization records with all the relevant information. The file will also ensure that duplicate patient information is not submitted, and if done, then a warning message will be displayed. 

#### statistics.php
    * This file enables a healthcare provider to submit a vaccine type and obtain a pie chart showing the percentage of males to females who hava received that particular vaccine from the entire database. It will also display an error message if no records of that vaccine are found. 

#

#### **Authors**
* **Pearle Shah** - *Primary Author*
    * index.php
    * vaxhistory.php
# 
* **Anusha Shinde** - *Primary Author* 
    * statistics.php
#
* **Rahul Barla** - *Primary Author* 
    * addrecord.php
#
* **Pearle Shah, Anusha Shinde, Rahul Barla** - *Co-Authors* 
    * design.docx
    * styles.css
    * init.php
    * vaccinerecordsdb.php
    * sketch.png
    * thumb.png / web_logo.png

#

## **Acknowledgments**

* BMES 550: Dr. Ahmet Sacan
