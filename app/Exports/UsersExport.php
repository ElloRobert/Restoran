<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromCollection, WithMapping,WithHeadings
{
   

    public function map($user): array
    {
        return[
         $user->id,
         $user->name,
         $user->email,
         $user -> getRoleNames()[0],
         $user->created_at,
         $user->updated_at,
         $user->bodovi,
         $user->vip
        ];
    }

    public function headings(): array{
        return [
         'Id',
         'Ime',
         'E-mail',
         'Uloga',
         'Kreirano',
         'Ažurirano',
         'Bodovi',
         'Status'
        ];
    }

    
    
    public function collection()
    {
        return User::all();
    }

}
