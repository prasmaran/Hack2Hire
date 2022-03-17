<?php
// Load the database configuration file
include_once '../config.php';

			$filename = $_GET['filename'];
            $csvFile = fopen($filename, 'r');
			
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $validationString = true;
                $validationNumeric = true;
                $numberOfEmptyCell = 0;

                $errorArray = array();
                // Get row data
                $modelID     = $line[0];
                $modelName   = $line[1];
                $modelBrand   = $line[2];
                $modelCategory   = $line[3];
                $modelPrice   = $line[4];
                $modelQuantity   = $line[5];
				$modelMax = $line[6];
                $modelSupplier  = $line[7];

                $valueArray = array($modelID, $modelName, $modelBrand, $modelCategory, $modelPrice, $modelQuantity, $modelMax, $modelSupplier);

                if ($modelName != "" &&  $modelBrand != "" && $modelBrand != "" && $modelSupplier != "" && $modelCategory != "") {
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
					if (!is_numeric($modelMax)) {
                        $validationNumeric = false;
                        echo "<br>";
                        echo "Input for modelMax id is incorrect";
                    }
                }

                if (!$validationString && !$validationNumeric) {
                    // Check whether member already exists in the database with the same email
                    $prevQuery = "DELETE FROM product WHERE modelID = '" . $line[0] . "'";
                    $prevResult = mysqli_query($mysqli, $prevQuery);
                    // Insert member data in the database
                    mysqli_query($mysqli, "INSERT INTO product (modelID, modelName, modelBrand, modelCategory, modelPrice, modelQuantity, modelMax, modelSupplier) VALUES ('" . $modelID . "','" . $modelName . "', '" . $modelBrand . "', '" . $modelCategory . "', '" . $modelPrice . "', '" . $modelQuantity . "','" . $modelMax . "', '" . $modelSupplier . "')");
                } else {

                    foreach ($valueArray as $value) {
                        if ($value == "") {
                            $numberOfEmptyCell++;
                        }
                    }

                    if ($numberOfEmptyCell > 4) {

                    } else {
                        mysqli_query($mysqli, "INSERT INTO invalidproduct (modelID, modelName, modelBrand, modelCategory, modelPrice, modelQuantity, modelMax, modelSupplier) VALUES ('" . $modelID . "','" . $modelName . "', '" . $modelBrand . "', '" . $modelCategory . "', '" . $modelPrice . "', '" . $modelQuantity . "','" . $modelMax . "', '" . $modelSupplier . "')");
                    }
                }
            }


            // Close opened CSV file
            fclose($csvFile);

            $qstring = '?status=succ';
 
// Redirect to the listing page
header("Location: keyinproduct.php".$qstring);