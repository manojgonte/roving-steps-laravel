<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    protected $users;

    function __construct($users) {
        $this->users = $users;
    }

    public function view(): View {
        $users = $this->users;
        return view('admin.export.users_export',compact('users'));
    }
}
