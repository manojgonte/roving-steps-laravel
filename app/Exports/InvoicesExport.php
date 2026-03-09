<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InvoicesExport implements FromView
{
    protected $invoices;

    function __construct($invoices) {
        $this->invoices = $invoices;
    }

    public function view(): View {
        $invoices = $this->invoices;
        return view('admin.export.invoices_export', compact('invoices'));
    }
}
