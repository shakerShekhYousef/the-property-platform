<?php

namespace App\Exports;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PropertyExport implements FromCollection, WithHeadings, ShouldAutoSize,WithMapping
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
            'Makani Number',
            'P-Number',
            'Price',
            'Payment Frequency',
            'Property Type',
            'Furniture Type',
            'Property Category',
            'Property Status',
            'Landlord'
        ];
    }

    public function collection(): \Illuminate\Support\Collection
    {
        return Property::query()
            ->where('name','like', '%' .$this->request->get('search'). '%')
            ->orWhere('makani_number','like', '%' .$this->request->get('search'). '%')
            ->orWhere('P-Number','like', '%' .$this->request->get('search'). '%')
            ->propertyType($this->request->get('property_type_id'))
            ->propertyCategory($this->request->get('property_category_id'))
            ->propertyStatus($this->request->get('property_status_id'))
            ->furnitureType($this->request->get('furniture_type_id'))
            ->city($this->request->get('city_id'))
            ->with(['propertyType','propertyCategory','propertyStatus','furnitureType','city'])
            ->get();
    }

    public function map($row): array
    {
        return [
            $row->name,
            $row->makani_number,
            $row["p-number"],
            $row->price,
            $row->paymentFrequency->name,
            $row->propertyType->name,
            $row->furnitureType->name,
            $row->propertyCategory->name,
            $row->propertyStatus->name,
            $row->landlord->name
        ] ;
    }
}
