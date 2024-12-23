<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $headings, $users;
    public function __construct(array $headings, $users) {
        $this->headings = $headings;
        $this->users = $users;
    }

    public function collection()
    {
        return $this->users;
    }

    public function headings(): array {
        return $this->headings;
    }
}
