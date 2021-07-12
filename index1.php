<?php

// require 'vendor/autoload.php';
require 'vendor/autoload.php';
require "config1.php";

   
$installer = new \CodedHeartInside\DataMining\Apriori\Installer();
$installer->createRunningEnvironment();



$aprioriConfiguration = new \CodedHeartInside\DataMining\Apriori\Configuration();

// Configuring the boundries is optional


$aprioriConfiguration->setDisplayDebugInformation();

$aprioriConfiguration->setMinimumThreshold(2) 
    ->setMinimumSupport(0.4) 
    ->setMinimumConfidence(0.5) 
;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  

 
    
 
    $stmt = $dbo->prepare("select All_Products,Product_Category
    from project12.bbw_allyears_10  ");

    
   
 
    


 







    



   

    $stmt->execute(array("$Product_Category"));
    while ($row = $stmt->fetch()) {	
	$Id =  $row['Id'];
      

	$Product_Category =  $row['Product_Category'];
        
$All_Products =  $row['All_Products'];
        

	

    


$dataSet = array(
'Id' => $Id,
'Product_Category' => $Product_Category,
'All_Products' => $All_Products);
    }
      
    // Encoding array in JSON format
    // echo json_encode($projects);
}

// $dataSet = array(
//      array('Variable vane Pumps','Gear Pumps','Bladders','Fixed Vane Pumps','Spare Parts PV7'),
//      array('Bladders', 'Fixed Vane Pumps', 'Gear Pumps'),
//      array('Gear Pumps', 'Fixed Vane Pumps'),
//      array('Gear Pumps'),
//  );

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

?>




