<?php

namespace App\Http\Controllers\dashboard;

use App\Exceptions\GeneralException;
use App\Exports\PropertyExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\property\CreatePropertyRequest;
use App\Http\Requests\property\UpdatePropertyRequest;
use App\Models\City;
use App\Models\InventoryItemImage;
use App\Models\PropertyAmenity;
use App\Models\PropertyImage;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Country;
use App\Models\Landlord;
use App\Models\Property;
use App\Models\PropertyType;
use App\Repositories\dashboard\PropertyRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\FurnitureType;
use App\Models\PropertyStatus;
use App\Models\PaymentFrequency;
use App\Models\PropertyCategory;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $propertyRepository;

    public function __construct(PropertyRepository $propertyRepository)
    {
        return $this->propertyRepository=$propertyRepository;
    }

    public function property_list(Request $request)
    {
        $types = PropertyType::all();
        $categories = PropertyCategory::all();
        $furnitureTypes = FurnitureType::all();
        $propertyCategories = PropertyCategory::all();
        $cities = City::all();
        $propertyStatuses = PropertyStatus::all();
        $countries = Country::all();
        if ($request->ajax()){
            $data = Property::query();
            try {

                $search = $request->get('search');
                $data->where('name','like', '%' .$search. '%')
                    ->orWhere('makani_number','like', '%' .$search. '%')
                    ->orWhere('p-number','like', '%' .$search. '%')
                    ->propertyType($request->get('property_type_id'))
                    ->propertyCategory($request->get('property_category_id'))
                    ->propertyStatus($request->get('property_status_id'))
                    ->furnitureType($request->get('furniture_type_id'))
                    ->city($request->get('city_id'))
                    ->get();
                return datatables($data)
                    ->addColumn('checkbox', function ($item) {
                        return '<input type="checkbox" id="'.$item->id.'" name="someCheckbox" />';
                    })->addColumn('payment_frequency',function (Property $property){
                        return $property->paymentFrequency->name;
                    })->addColumn('property_type',function (Property $property){
                        return $property->propertyType->name;
                    })->addColumn('furniture_type',function (Property $property){
                        return $property->furnitureType->name;
                    })->addColumn('property_category',function (Property $property){
                        return $property->propertyCategory->name;
                    })->addColumn('property_status',function (Property $property){
                        return $property->propertyStatus->name;
                    })->addColumn('landlord',function (Property $property){
                        return $property->landlord->name;
                    })
                    ->addColumn('action', function ($item) {
                    return '<div class="activity-icon">
                     <ul style="list-style: none">
                        <li><a id="delete" onclick="fire()" data-property="'.$item->id.'" data-url="' . route('delete_property') . '" class=""><i class="mdi mdi-trash-can"></i></a></li>
                        <li><a  href="' . route('properties.edit', $item->id) . '" class=""><i class="mdi mdi-grease-pencil"></i></a></li>
                        <li><a  href="' . route('properties.show', $item->id) . '" class=""><i class="mdi mdi-eye"></i></a></li>
                     </ul>
                </div>';
                })->rawColumns(['checkbox','action'])->make(true);
            } catch (\Exception $e) {
                return new GeneralException($e);
            }
        }
        return view('dashboard.property.index',compact('types','categories',
            'furnitureTypes','propertyCategories','cities','propertyStatuses','countries'));

    }
    public function export_excel(Request $request){
        $date=Carbon::now();
        return Excel::download(new PropertyExport($request),'properties_'.$date.'.xls');
    }
    public function get_cities(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $select = $select . "_id";
        $data = DB::table('cities')
            ->where('country_id', $value)
            ->get();
        $output = '<option class="" value="" >Select a city</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        echo $output;
    }
    public function create()
    {
        $types = PropertyType::all();
        $categories = PropertyCategory::all();
        $landlords = Landlord::all();
        $furnitureTypes = FurnitureType::all();
        $propertyCategories = PropertyCategory::all();
        $propertyStatuses = PropertyStatus::all();
        $payments = PaymentFrequency::all();
        $tenants = Tenant::all();
        $countries = Country::all();
        $amenities = PropertyAmenity::all();
        return view('dashboard.property.create',compact('types','categories','landlords',
        'furnitureTypes','propertyCategories','countries','propertyStatuses','payments','tenants','amenities'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePropertyRequest $request)
    {
        $this->propertyRepository->create($request->all());
        session()->flash('success', 'Property has been added successfully!');
        return redirect()->back();
    }

    public function show(Property $property)
    {
        $inventoryImages=DB::table('inventory_item_images')
            ->whereIn('inventory_item_id',function ($query) use ($property){
            $query->from('inventory_items')->select('id');
        })->get();
        $types = PropertyType::all();
        $categories = PropertyCategory::all();
        $landlords = Landlord::all();
        $furnitureTypes = FurnitureType::all();
        $propertyCategories = PropertyCategory::all();
        $countries = Country::all();
        $propertyStatuses = PropertyStatus::all();
        $payments = PaymentFrequency::all();
        $tenants = Tenant::all();
        $amenities = DB::table('property_amenities')->whereNotIn('id',function ($query) use ($property){
            $query->from('property_amenity_property')->where('property_id',$property->id)->select('property_amenity_id');
        })->get();
        $inventoryItem=$property->inventoryItems()->first();
        $property_tenant = Tenant::where('property_id',$property->id)->first();
        return view('dashboard.property.show',compact('types','categories','landlords',
            'furnitureTypes','propertyCategories','countries','propertyStatuses','payments','property','tenants',
            'amenities','property_tenant','inventoryImages','inventoryItem'
        ));
    }


    public function edit(Property $property)
    {
        $inventoryImages=DB::table('inventory_item_images')->whereIn('inventory_item_id',function ($query) use ($property){
            $query->from('inventory_items')->select('id');
        })->get();
        $types = PropertyType::all();
        $categories = PropertyCategory::all();
        $landlords = Landlord::all();
        $furnitureTypes = FurnitureType::all();
        $propertyCategories = PropertyCategory::all();
        $countries = Country::all();
        $propertyStatuses = PropertyStatus::all();
        $payments = PaymentFrequency::all();
        $tenants = Tenant::all();
        $amenities = DB::table('property_amenities')->whereNotIn('id',function ($query) use ($property){
            $query->from('property_amenity_property')->where('property_id',$property->id)->select('property_amenity_id');
        })->get();
        $inventoryItem=$property->inventoryItems()->first();
        $property_tenant = Tenant::where('property_id',$property->id)->first();
        return view('dashboard.property.edit',compact('types','categories','landlords',
            'furnitureTypes','propertyCategories','countries','propertyStatuses','payments','property','tenants',
            'amenities','property_tenant','inventoryImages','inventoryItem'
        ));
    }


    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $this->propertyRepository->update($property,$request->all());
        session()->flash('success', 'Property has been updated successfully!');
        return redirect()->route('properties_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {

        $this->propertyRepository->deleteById($property->id);
        session()->flash('success', 'Property has been deleted successfully!');
        return redirect()->back();
    }

    public function delete_property(Request $request){
        $this->propertyRepository->deleteById($request->id);
        session()->flash('success', 'Property has been deleted successfully!');
    }

    public function delete_inventory_images(Request $request): bool
    {
        $image = InventoryItemImage::query()->where('id',$request->id)->first();
        $image->delete();
        return true;
    }

    public function delete_property_images(Request $request): bool
    {
        $image = PropertyImage::query()->where('id',$request->id)->first();
        $image->delete();
        return true;
    }
}
