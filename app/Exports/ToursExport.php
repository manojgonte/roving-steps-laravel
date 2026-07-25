<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ToursExport implements FromView
{
    protected $tours;

    public function __construct($tours) {
        $this->tours = $tours;
    }

    public function view(): View {
        $tours = $this->tours;
        return view('admin.export.tours_export', compact('tours'));
    }
}
