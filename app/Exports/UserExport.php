<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
class UserExport implements FromCollection, WithHeadings, ShouldAutoSize,WithMapping
{
    use Exportable;
    protected $request;

    public function __construct($request)
    {
        $this->request=$request;
    }

    public function headings(): array
    {
        return [
            // 'Languages',
            'Role',
            'Name',
            'Email',
            'Phone',
            // "Image",
            
        ];
    }

    public function collection(): \Illuminate\Support\Collection
    {
        return User::query()
            // ->Where('Languages','like', '%' .$this->request->get('search'). '%')
            ->orWhere('role_id','like', '%' .$this->request->get('search'). '%')
            ->orWhere('name','like', '%' .$this->request->get('search'). '%')
            ->orWhere('email','like', '%' .$this->request->get('search'). '%')
            ->orWhere('phone_number','like', '%' .$this->request->get('search'). '%')
            ->get();
    }

    public function map($row): array
    {
        return [
            // $row->Languages->name,
            $row->role->name,
            $row->name,
            $row->email,
            $row->phone_number,
            // $row->image,
        ] ;
    }
}

