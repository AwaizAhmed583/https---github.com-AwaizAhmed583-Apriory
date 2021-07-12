<?php
// require_once 'PHPExcel/IOFactory.php';

if (isset($_FILES['excelFile']) && !empty($_FILES['excelFile']['tmp_name'])){

$excelObject = PHPExcel_IOFactory ::load($_FILES['excelFile']['tmp_name']);
$getsheet = $excelObject->getActiveSheet()->toArray(null);
echo'<pre>';
echo json_encode($getsheet);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="excelfile">
<input type="submit" value="submit">
</form>
    
</body>
</html>




<?php

// require 'vendor/autoload.php';
require 'vendor/autoload.php';

require "config1.php"; // Database details
   
$installer = new \CodedHeartInside\DataMining\Apriori\Installer();
$installer->createRunningEnvironment();



$aprioriConfiguration = new \CodedHeartInside\DataMining\Apriori\Configuration();

// Configuring the boundries is optional


$aprioriConfiguration->setDisplayDebugInformation();

$aprioriConfiguration->setMinimumThreshold(2) 
    ->setMinimumSupport(0.4) 
    ->setMinimumConfidence(0.5) 
;

$dataset = array();



$tables = array('one', 'two', 'three');

foreach ($tables as $table)  { 


    $array = array();
    $sql = "SELECT name FROM " .$table;

    $result = $con->query($sql);

    // echo $result;

    // echo  nl2br (" \n ");


    

    while($row = mysqli_query(($con)){

        $array[] = $row['name'];

    }
    array_push($dataset,$array);
  }

//   echo $dataSet;

$dataSet = array(
     array('Variable vane Pumps','Gear Pumps','Bladders','Fixed Vane Pumps','Spare Parts PV7'),
     array('Bladders', 'Fixed Vane Pumps', 'Gear Pumps'),
     array('Gear Pumps', 'Fixed Vane Pumps'),
     array('Gear Pumps'),
 );

 $dataInput = new CodedHeartInside\DataMining\Apriori\Data\Input($aprioriConfiguration);
 $dataInput->flushDataSet()
     ->addDataSet($dataSet)
     ->addDataSet($dataSet) // In this case, the data set is added twice to create more testing data
 ;
$aprioriClass = new CodedHeartInside\DataMining\Apriori\Apriori($aprioriConfiguration);
$aprioriClass->run();


foreach ($aprioriClass->getSupportRecords() as $record) {
    print_r($record);
    // echo  nl2br (" \n ");



  
    // Outputs
    // Array
    // (
    //     [if] => Array
    //     (
    //       [0] => 1
    //       [1] => 7
    //     )
    //
    //     [then] => 3
    //     [confidence] => 1
    // )
}





<?php

// require 'vendor/autoload.php';
require 'vendor/autoload.php';

require "config1.php"; // Database details
   
$installer = new \CodedHeartInside\DataMining\Apriori\Installer();
$installer->createRunningEnvironment();



$aprioriConfiguration = new \CodedHeartInside\DataMining\Apriori\Configuration();

// Configuring the boundries is optional


$aprioriConfiguration->setDisplayDebugInformation();

$aprioriConfiguration->setMinimumThreshold(2) 
    ->setMinimumSupport(0.4) 
    ->setMinimumConfidence(0.5) 
;

$dataset = array();



$tables = array('one', 'two', 'three');

foreach ($tables as $table)  { 


    $array = array();
    $sql = "SELECT name FROM " .$table;

    $result = $con->query($sql);

    while($row = mysql_fetch_assoc($result)){

        $array[] = $row['name'];

    }
    array_push($dataset,$array);
  }

  echo $dataSet;

$dataSet = array(
     array('Variable vane Pumps','Gear Pumps','Bladders','Fixed Vane Pumps','Spare Parts PV7'),
     array('Bladders', 'Fixed Vane Pumps', 'Gear Pumps'),
     array('Gear Pumps', 'Fixed Vane Pumps'),
     array('Gear Pumps'),
 );

 $dataInput = new CodedHeartInside\DataMining\Apriori\Data\Input($aprioriConfiguration);
 $dataInput->flushDataSet()
     ->addDataSet($dataSet)
     ->addDataSet($dataSet) // In this case, the data set is added twice to create more testing data
 ;
$aprioriClass = new CodedHeartInside\DataMining\Apriori\Apriori($aprioriConfiguration);
$aprioriClass->run();


foreach ($aprioriClass->getSupportRecords() as $record) {
    print_r($record);
    echo  nl2br (" \n ");



  
    // Outputs
    // Array
    // (
    //     [if] => Array
    //     (
    //       [0] => 1
    //       [1] => 7
    //     )
    //
    //     [then] => 3
    //     [confidence] => 1
    // )
}
