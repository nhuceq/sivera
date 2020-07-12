<?php

namespace App\Exports;

use App\Spp;
use Maatwebsite\Excel\Concerns\FromCollection;

class SppExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Spp::all();
    }
}
