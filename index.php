<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, content-type, X-Requested-With, Accept, Authorization');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');


// require 'vendor/autoload.php';
require 'vendor/autoload.php';

require "config1.php"; // Database details
   
$installer = new \CodedHeartInside\DataMining\Apriori\Installer();
$installer->createRunningEnvironment();



$aprioriConfiguration = new \CodedHeartInside\DataMining\Apriori\Configuration();

// Configuring the boundries is optional


$aprioriConfiguration->setDisplayDebugInformation();

$aprioriConfiguration->setMinimumThreshold(2) 
    ->setMinimumSupport(0.3) 
    ->setMinimumConfidence(0.3) 
;

$dataset = array();



        $tables = array('one', 'two', 'three');

        foreach ($tables as $table)  { 


            $array = array();
            $sql = "SELECT name FROM " .$table;

            $result = $con->query($sql);
            
            
            // print_r($result);

            while($row = $result-> fetch_assoc()){

              
            print_r($row);

                $dataset[] = $row['name'];

            };
            // array_push($dataset);
        }

//   echo $dataSet;


$dataSet = array(
     array('Variable vane Pumps','Gear Pumps','Bladders','Fixed Vane Pumps','Spare Parts PV7'),
     array('Bladders', 'Fixed Vane Pumps', 'Gear Pumps'),
     array('Gear Pumps', 'Fixed Vane Pumps'),
     array('Pumps'),
     array('External Gear Pumps','Fixed Mortors','Screws and Nuts',)
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
    echo ("Numnber");
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
