<?php

namespace App\Http\Controllers\dashboard;

use App\Exceptions\GeneralException;
use App\Exports\TenantExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\tenant\CreateTenantRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Property;
use App\Models\Tenant;
use App\Repositories\dashboard\TenantRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TenantController extends Controller
{
    private $tenantRepository;
    public function __construct(TenantRepository $tenantRepository)
    {
        return $this->tenantRepository = $tenantRepository;
    }

    public function tenant_list(Request $request){
        $properties = Property::all();
        $cities = City::all();
        $countries = Country::all();
        if ($request->ajax()){
            $data = Tenant::query();
            try {
                $search = $request->get('search');
                    $data->where('name','like', '%' .$search. '%')
                        ->orWhere('email','like', '%' .$search. '%')
                        ->orWhere('mobile_number','like', '%' .$search. '%')
                        ->orWhere('nationality','like', '%' .$search. '%')
                        ->orWhere('state','like', '%' .$search. '%')
                        ->orWhere('address1','like', '%' .$search. '%')
                        ->orWhere('address2','like', '%' .$search. '%')
                        ->orWhere('postcode','like', '%' .$search. '%')
                        ->property($request->get('property_id'))
                        ->city($request->get('city_id'))
                        ->get();
                return datatables($data)
                    ->addColumn('checkbox', function ($item) {
                        return '<input type="checkbox" id="'.$item->id.'" name="someCheckbox" />';
                    })->addColumn('property',function (Tenant $tenant){
                        return $tenant->property->name;
                    })->addColumn('city',function (Tenant $tenant){
                        return $tenant->city->name;
                    })->addColumn('action', function ($item) {
                        return '<div class="activity-icon">
                     <ul style="list-style: none">
                        <li><a id="delete" data-tenant="'.$item->id.'" data-url="' . route('delete_tenant') . '" class=""><i class="mdi mdi-trash-can"></i></a></li>
                        <li><a  href="' . route('tenants.edit', $item->id) . '" class=""><i class="mdi mdi-grease-pencil"></i></a></li>
                        <li><a  href="' . route('tenants.show', $item->id) . '" class=""><i class="mdi mdi-eye"></i></a></li>
                     </ul>
                </div>';
                    })->rawColumns(['checkbox','action'])->make(true);
            } catch (\Exception $e) {
                return new GeneralException($e);
            }
        }
        return view('dashboard.tenant.index',compact('properties','countries'));
    }

    public function export_excel(Request $request){
        $date=Carbon::now();
        return Excel::download(new TenantExport($request),'tenants_'.$date.'.xls');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $properties = Property::all();
        $cities = City::all();
        return view('dashboard.tenant.create',compact('properties','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTenantRequest $request)
    {
        $this->tenantRepository->create($request->all());
        session()->flash('success', 'Tenant has been added successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        return view('dashboard.tenant.show',compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        $properties = Property::all();
        $cities = City::all();
        return view('dashboard.tenant.edit',compact('tenant','properties','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        $this->tenantRepository->update($tenant,$request->all());
        session()->flash('success', 'Tenant has been updated successfully!');
        return redirect()->back();
    }

    public function delete_tenant(Request $request){
        $this->tenantRepository->deleteById($request->id);
        session()->flash('success', 'Tenant has been deleted successfully!');

    }

}
