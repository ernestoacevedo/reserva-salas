<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('to_excel')){
    function to_excel_2003($datos, $filename='exceloutput'){

    }
    function to_excel_2007($header,$datos, $filename='exceloutput',$titulo=""){
        $columnas=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
        require_once BASEPATH.'../plugins/PHPExcel/PHPExcel.php';
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Biblioteca UCM")
        							 ->setLastModifiedBy("Biblioteca UCM")
        							 ->setTitle($titulo)
        							 ->setSubject("")
        							 ->setDescription("")
        							 ->setKeywords("")
        							 ->setCategory("");

        for($i=0;$i<count($header);$i++ ){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($columnas[$i].'1',$header[$i] );
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnas[$i])->setAutoSize(true);
        }
        for($i=0;$i<count($datos);$i++){
            $j=0;
            foreach($datos[$i] as $valor){
                error_log($valor);
                $cell=$i+2;
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($columnas[$j].$cell,$valor);
                $j++;
            }
        }

        $objPHPExcel->getActiveSheet()->setTitle($titulo);
        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }
}
