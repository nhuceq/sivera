<?php
namespace App\Exports;
use App\Spp;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class SppExport implements FromView
{
    public function __construct($param_data, $param_view)
    {
        $this->data = $param_data;
        $this->view = $param_view;
    }

    public function view(): View
    {
        return view($this->view, [
            'data' => $this->data,
        ]);
    }
}

// class SppExport implements FromCollection
// {
//     *
//     * @return \Illuminate\Support\Collection
    
//     public function collection()
//     {
//         return Spp::all();
//     }
// }