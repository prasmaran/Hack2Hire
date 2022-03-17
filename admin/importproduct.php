<?php
// Load the database configuration file
include_once '../config.php';

if (isset($_POST['import'])) {

    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

    // Validate whether selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {

        // If the file is uploaded
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {

            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            // Parse data from CSV file line by line
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $validationString = true;
                $validationNumeric = true;
                $errorArray = array();
                // Get row data
                $modelID     = $line[0];
                $modelName   = $line[1];
                $modelBrand   = $line[2];
                $modelCategory   = $line[3];
                $modelPrice   = $line[4];
                $modelQuantity   = $line[5];
                $modelSupplier  = $line[6];

                if ($modelName != "" &&  $modelBrand != "" && $modelBrand != "" && $modelSupplier != "") {
                    //set error string input contains invalid entry
                    $validationString = false;
                }

                if ($modelID != "" && $modelPrice != "" &&  $modelQuantity != "") {
                    //set error string input contains invalid entry
                    $validationNumeric = false;
                    if (!is_numeric($modelID)) {
                        $validationNumeric = false;
                        echo "<br>";
                        echo "Input for model id is incorrect";
                    }
                    if (!is_numeric($modelPrice)) {
                        $validationNumeric = false;
                        echo "<br>";
                        echo "Input for modelPrice id is incorrect";
                    }
                    if (!is_numeric($modelQuantity)) {
                        $validationNumeric = false;
                        echo "<br>";
                        echo "Input for modelQuantity id is incorrect";
                    }
                }
                // echo "<br>";
                // echo "String " . json_encode($validationString);
                // echo "<br>";
                // echo "Integer " . json_encode($validationNumeric);
                // echo "<br>";

                if (!$validationString && !$validationNumeric) {
                    // Check whether member already exists in the database with the same email
                    $prevQuery = "DELETE FROM product WHERE modelID = '" . $line[0] . "'";
                    $prevResult = mysqli_query($mysqli, $prevQuery);
                    // Insert member data in the database
                    mysqli_query($mysqli, "INSERT INTO product (modelID, modelName, modelBrand, modelCategory, modelPrice, modelQuantity, modelSupplier) VALUES ('" . $modelID . "','" . $modelName . "', '" . $modelBrand . "', '" . $modelCategory . "', '" . $modelPrice . "', '" . $modelQuantity . "', '" . $modelSupplier . "')");
                } else {
                    array_push($errorArray, $modelID);
                    echo "<br>";
                    echo '<script type="text/javascript">alert("row number '.$modelID.' is not uploaded into db");</script>';
                }
            }
            // if (count($errorArray) > 0) {
            //     foreach ($errorArray as $value) {
            //         echo '<script type="text/javascript">alert("row number '.$value.' is not uploaded into db");</script>';
            //     }
            // }

            // Close opened CSV file
            fclose($csvFile);

            $qstring = '?status=succ';
        } else {
            $qstring = '?status=err';
        }
    } else {
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header("Location: keyinproduct.php" . $qstring);
