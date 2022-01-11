<?php

namespace App\Exports;

use App\Models\TransactionDetails;
use http\Env\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class TransactionHistoryExport implements
    FromCollection,
    WithMapping,
    WithHeadings,
    WithDrawings,
    WithEvents,
    WithCustomStartCell
{

    private $id;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TransactionDetails::select('product_id', 'seller_id', 'quantity', 'created_at')->where('transaction_id', $this->id)->with('products')->get();
    }

    public function headings(): array{
        return [
            'Product name',
            'Seller',
            'Quantity',
            'Date'
        ];
    }

    public function map($details): array{
        return [
            $details->products->name,
            $details->products->user->name,
            $details->quantity,
            $details->created_at
        ];
    }

    public function setId($id){
        $this->id = $id;
    }

    public function registerEvents() :array{
        return [
          AfterSheet::class =>function(AfterSheet $event){
            $event->sheet->getStyle('A5:C5')->applyFromArray([
                'font'=>[
                    'bold'=>true
                ]
            ]);
          }
        ];
    }

    public function drawings(){
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Brand Logo');
        $drawing->setPath(public_path('/asset/HireMe 1 - Black Transparent.png'));
        $drawing->setHeight(96);
        $drawing->setCoordinates('A1');
        return $drawing;
    }

    public function startCell(): string{
        return 'A5';
    }




}
