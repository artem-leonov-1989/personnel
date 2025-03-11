<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Form4_2Command extends Command
{
    protected $dodatokFileName = 'dodatok1-2.xlsx';
    protected $formFileName = 'form4-2_OS.xlsx';
    protected Worksheet $dodatokWorksheet;
    protected Spreadsheet $formSpreadsheet;
    protected Worksheet $formWorksheet;
    protected $signature = 'excel:form4_2';
    protected $description = 'Command description';

    public function handle()
    {
        ini_set('memory_limit', -1);
        $this->formSpreadsheet = $this->loadFile($this->formFileName);
        $this->formWorksheet = $this->formSpreadsheet->getSheetByName('А4576(41 омбр)');
        $this->dodatokWorksheet = $this->loadFile($this->dodatokFileName)->getSheetByName('додаток 1');
        $recordCount = 0;
        for($i = 7; $i <= 5718; $i++) {
            $qValue = $this->formWorksheet->getCell('Q'.$i)->getValue();
            if ($qValue === 'ураження' || $qValue === 'поранення') {
                $adValue = $this->formWorksheet->getCell('AD'.$i)->getValue();
                if ($adValue === '' || $adValue === null) {
                    $cValue = $this->formWorksheet->getCell('C'.$i)->getValue();
                    $rValue = $this->formWorksheet->getCell('R'.$i)->getValue();
                    $result = $this->findRecordInDodatok($cValue, $rValue);
                    if ($result !== null) {
                        $this->formWorksheet->getCell('AD'.$i)->setValue('TEST '.$result->addDay()->format('d.m.Y'));
                        $recordCount++;
                    }
                }
            }
        }

        $writer = IOFactory::createWriter($this->formSpreadsheet, 'Xlsx');
        $writer->setPreCalculateFormulas(false);
        $writer->save(Storage::disk('public')->path('test-'.$this->formFileName));
        $this->info($recordCount);
    }

    protected function loadFile(string $fileName): Spreadsheet
    {
        $file = Storage::disk('public')->path($fileName);
        return IOFactory::load($file);
    }
    protected function findRecordInDodatok(string $name, string $data): null|Carbon
    {
        $formData = Carbon::parse(Date::excelToDateTimeObject($data));
//        $startData = Carbon::parse('2024-09-15');
//        if ($formData->getTimestamp() >= $startData->getTimestamp()) {

        for ($i = 8; $i <= 2303; $i++) {
            $cValue = $this->dodatokWorksheet->getCell('C'.$i)->getValue();
            if (trim($cValue) === trim($name)) {
                $eValue = $this->dodatokWorksheet->getCell('H'.$i)->getValue();
                $iValue = $this->dodatokWorksheet->getCell('I'.$i)->getValue();
                $jValue = $this->dodatokWorksheet->getCell('J'.$i)->getValue();
                $kValue = $this->dodatokWorksheet->getCell('K'.$i)->getValue();
                $lValue = $this->dodatokWorksheet->getCell('L'.$i)->getValue();
                $mValue = $this->dodatokWorksheet->getCell('M'.$i)->getValue();
                if ($eValue != null && $iValue === null && $jValue === null && $kValue === null && $lValue === null && $mValue === null) {
                    $dodatokData = Carbon::parse(Date::excelToDateTimeObject($eValue));
                    if ($dodatokData->getTimestamp() >= $formData->subDays(1)->getTimestamp()
                        || $dodatokData->getTimestamp() <= $formData->getTimestamp()) {
                        return $dodatokData;
                    }
                }
            }
        }
//        }
        return null;
    }
}
