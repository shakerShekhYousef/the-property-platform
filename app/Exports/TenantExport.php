<?php

namespace App\Exports;

use App\Models\Tenant;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TenantExport implements FromCollection, WithHeadings, ShouldAutoSize,WithMapping
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
            'Name',
            'Email',
            'Mobile Number',
            'Nationality',
            'State',
            'Address1',
            'Address2',
            'Postcode',
            'City',
            'Property'
        ];
    }

    public function collection(): \Illuminate\Support\Collection
    {
        return Tenant::query()
            ->where('name','like', '%' .$this->request->get('search'). '%')
            ->orWhere('email','like', '%' .$this->request->get('search'). '%')
            ->orWhere('mobile_number','like', '%' .$this->request->get('search'). '%')
            ->orWhere('nationality','like', '%' .$this->request->get('search'). '%')
            ->orWhere('state','like', '%' .$this->request->get('search'). '%')
            ->orWhere('address1','like', '%' .$this->request->get('search'). '%')
            ->orWhere('address2','like', '%' .$this->request->get('search'). '%')
            ->orWhere('postcode','like', '%' .$this->request->get('search'). '%')
            ->property($this->request->get('property_id'))
            ->city($this->request->get('city_id'))
            ->get();
    }

    public function map($row): array
    {
        return [
            $row->name,
            $row->email,
            $row->mobile_number,
            $row->nationality,
            $row->state,
            $row->address1,
            $row->address2,
            $row->postcode,
            $row->property->name,
            $row->city->name
        ] ;
    }
}
