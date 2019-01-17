<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\IOFactory;
use App\MyReadFilter;
use DB;

class ExelController extends Controller
{
	public function index()
	{
		$data = DB::table('magic_cards')->select('id', 'name', 'price')->get();
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		foreach($data as $n=>$item) {
			$sheet->getCellByColumnAndRow(1, ($n + 2))->setValue($item->id);
			$sheet->getCellByColumnAndRow(2, ($n + 2))->setValue($item->name);
			$sheet->getCellByColumnAndRow(3, ($n + 2))->setValue($item->price);
		}
		$writer = new Xlsx($spreadsheet);
		$writer->save('storage/price.xlsx');

		return 'ok';
	}


	public function reader($file="storage/price.xlsx") {
		// Создаём ридер 
		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		 
		// Читаем файл и записываем информацию в переменную
		$spreadsheet = $reader->load($file);
		 
		// Так можно достать объект Cells, имеющий доступ к содержимому ячеек
		$cells = $spreadsheet->getActiveSheet()->getCellCollection();	 
		// Далее перебираем все заполненные строки
		for ($row = 1; $row <= $cells->getHighestRow(); $row++){
			DB::table('magic_cards')
				->where('id', $cells->get("A".$row))
				->update(['price' => $cells->get("C".$row), 'name' => $cells->get("B".$row)]);
		}            
		return 1;
	}
}
