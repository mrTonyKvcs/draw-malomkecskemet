<?php

namespace App\Exports;

use App\Models\Gift;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GiftsExport implements FromCollection, WithMapping, WithHeadings
{
    public function collection()
    {
        return Gift::all();
    }

    /**
     * @var Invoice $invoice
     */
    public function map($gift): array
    {
        return [
            $gift->name,
            $gift->winner->store,
            $gift->winner->name,
            $gift->winner->email,
            $gift->winner->receipt_number,
            $gift->winner->city,
            $gift->winner->age,
            $gift->secondaryWinner->store ?? null,
            $gift->secondaryWinner->name ?? null,
            $gift->secondaryWinner->email ?? null,
            $gift->secondaryWinner->receipt_number ?? null,
            $gift->secondaryWinner->city ?? null,
            $gift->secondaryWinner->age ?? null
        ];
    }

    public function headings(): array
    {
        return [
            'Nyeremény',
            'Üzlet neve',
            'Nyertes neve',
            'Nyertes email címe',
            'Nyertes nyugtaszáma',
            'Nyertes városa',
            'Nyertes életkora',
            'Üzlet neve (Pót)',
            'Pót nyertes neve',
            'Pót nyertes email címe',
            'Pót nyertes nyugtaszáma',
            'Pót nyertes városa',
            'Pót nyertes életkora'
        ];
    }

    // /**
    //  * @var Invoice $invoice
    //  */
    // public function map($gift): array
    // {
    //     return [
    //         $gift->name,
    //         $gift->wish->name,
    //         $gift->wish->email,
    //         $gift->wish->city,
    //         $gift->wish->age
    //     ];
    // }

    // public function headings(): array
    // {
    //     return [
    //         'Nyeremény',
    //         'Nyertes neve',
    //         'Nyertes email címe',
    //         'Nyertes városa',
    //         'Nyertes életkora'
    //     ];
    // }
}
