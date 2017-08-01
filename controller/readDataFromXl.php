<?php
require_once "../vendor/autoload.php";
require '../vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php';



if((isset($_FILES['xl'])) && (!empty($_FILES['xl']['name']))) {

    $imageName = time().$_FILES['xl']['name'];
    //  Utility::dd($imageNa
    $temporary_location = $_FILES['xl']['tmp_name'];


    move_uploaded_file($temporary_location,'../resource/xl/'.$imageName);


    // $_POST['image']=$imageName;
    //   echo $temporary_location;
    //  Utility::dd($temporary_location);


    $fileName = "../resource/xl/".$imageName;

    /** automatically detect the correct reader to load for this file type */
    $excelReader = PHPExcel_IOFactory::createReaderForFile($fileName);

    /** Create a reader by explicitly setting the file type.
     * // $inputFileType = 'Excel5';
     * // $inputFileType = 'Excel2007';
     * // $inputFileType = 'Excel2003XML';
     * // $inputFileType = 'OOCalc';
     * // $inputFileType = 'SYLK';
     * // $inputFileType = 'Gnumeric';
     * // $inputFileType = 'CSV';
     * $excelReader = PHPExcel_IOFactory::createReader($inputFileType);**/
//if we dont need any formatting on the data
    $excelReader->setReadDataOnly();

//load only certain sheets from the file
    $loadSheets = array('Sheet1', 'Sheet2');
    $excelReader->setLoadSheetsOnly($loadSheets);

//the default behavior is to load all sheets
    $excelReader->setLoadAllSheets();

    class SampleReadFilter implements PHPExcel_Reader_IReadFilter
    {
        public function readCell($column, $row, $worksheetName = '')
        {
            // Read rows 1 to 10 and columns A to C only
            if ($row >= 1 && $row <= 7) {
                if (in_array($column, range('A', 'C'))) {
                    return true;
                }
            }
            return false;
        }
    }

    $sampleFilter = new SampleReadFilter();
    /*$objReader->setReadFilter($chunkFilter);*/
    $excelObj = $excelReader->load($fileName);
    $excelObj->getActiveSheet()->toArray(null, true, true, true);
//get all sheet names from the file
    $worksheetNames = $excelObj->getSheetNames($fileName);
    $return = array();
    foreach ($worksheetNames as $key => $sheetName) {
//set the current active worksheet by name
        $excelObj->setActiveSheetIndexByName($sheetName);
//create an assoc array with the sheet name as key and the sheet contents array as value
        $return = $excelObj->getActiveSheet()->toArray(null, true, true, true);
    }
//show the final array
    foreach ($return as $key => $value) {
        $expid[] = $value['A'];
        /*$expstatus[] = $value['B'];*/
    }


}
$accounts=new \App\koli\Accounts();
$accounts->delete();
$accounts->insert($expid);
