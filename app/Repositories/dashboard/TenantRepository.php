<?php

namespace App\Repositories\dashboard;

use App\Exceptions\GeneralException;
use App\Models\Property;
use App\Models\Tenant;
use App\Repositories\BaseRepository;
use App\Repositories\traits\UploadFiles;
use Illuminate\Support\Facades\DB;

class TenantRepository extends BaseRepository
{
    use UploadFiles;

    public function model()
    {
        return Tenant::class;
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data){
            $tenant = parent::create([
                'name'=>$data['name'],
                'email'=>$data['email'],
                'password'=>$data['password'],
                'trade_licence'=>$data['trade_licence'],
                'trade_licence_expiry'=>$data['trade_licence_expiry'],
                'TRN'=>$data['TRN'],
                'date_of_birthday'=>$data['date_of_birthday'],
                'gender'=>$data['gender'],
                'marital_status'=>$data['marital_status'],
                'mobile_number'=>$data['mobile_number'],
                'additional_mobile_number'=>$data['additional_mobile_number'],
                'national_number'=>$data['national_number'],
                'national_id_expiry'=>$data['national_id_expiry'],
                'passport_number'=>$data['passport_number'],
                'passport_expiry'=>$data['passport_expiry'],
                'visa_state'=>$data['visa_state'],
                'nationality'=>$data['nationality'],
                'state'=>$data['state'],
                'address1'=>$data['address1'],
                'address2'=>$data['address2'],
                'postcode'=>$data['postcode'],
                'national_id_photo'=>$this->UploadImage(
                    $data['national_id_photo'],
                    FILE_TENANT_NATIONAL_ID_PHOTO_PATH.'/'.$data['name']),
                'visa_photo'=>$this->UploadImage(
                    $data['visa_photo'],
                    FILE_TENANT_VISA_PHOTO_PATH.'/'.$data['name']),
                'passport_photo'=>$this->UploadImage(
                    $data['passport_photo'],
                    FILE_PASSPORT_PHOTO_PATH.'/'.$data['name']),
                'is_company'=>isset($data['is_company']) ? 1 : 0,
                'company_name'=>$data['company_name'],
                'city_id'=>$data['city_id'],
                'property_id'=>$data['property_id']
            ]);

            return $tenant;
        });
        throw new GeneralException('error');
    }

    public function update(Tenant $tenant,array $data){
        //check email
        $email = DB::table('tenants')->where([['email',$data['email']],['id','<>',$tenant->id]])->first();
        if ($email){
            throw new GeneralException('Email has been already taken.');
        }
        //update tenant
        return DB::transaction(function () use ($tenant,$data){
            if ($tenant->update([
                'name'=>$data['name'] !== null ? $data['name'] : $tenant->name,
                'email'=>$data['email'] !== null ? $data['email'] : $tenant->email,
                'password'=>isset($data['password'])  ? $data['password'] : $tenant->password,
                'trade_licence'=>$data['trade_licence'] !== null ? $data['trade_licence'] : $tenant->trade_licence,
                'trade_licence_expiry'=>$data['trade_licence_expiry'] !== null ? $data['trade_licence_expiry'] : $tenant->trade_licence_expiry,
                'TRN'=>$data['TRN'] !== null ? $data['TRN'] : $tenant->TRN,
                'date_of_birthday'=>$data['date_of_birthday'] !== null ? $data['date_of_birthday'] : $tenant->date_of_birthday,
                'gender'=>$data['gender'] !== null ? $data['gender'] : $tenant->gender,
                'marital_status'=>$data['marital_status'] !== null ? $data['marital_status'] : $tenant->marital_status,
                'mobile_number'=>$data['mobile_number'] !== null ? $data['mobile_number'] : $tenant->mobile_number,
                'additional_mobile_number'=>$data['additional_mobile_number'] !== null ? $data['additional_mobile_number'] : $tenant->additional_mobile_number,
                'national_number'=>$data['national_number'] !== null ? $data['national_number'] : $tenant->national_number,
                'national_id_expiry'=>$data['national_id_expiry'] !== null ? $data['national_id_expiry'] : $tenant->national_id_expiry,
                'passport_number'=>$data['passport_number'] !== null ? $data['passport_number'] : $tenant->passport_number,
                'passport_expiry'=>$data['passport_expiry'] !== null ? $data['passport_expiry'] : $tenant->passport_expiry,
                'visa_state'=>$data['visa_state'] !== null ? $data['visa_state'] : $tenant->visa_state,
                'nationality'=>$data['nationality'] !== null ? $data['nationality'] : $tenant->nationality,
                'state'=>$data['state'] !== null ? $data['state'] : $tenant->state,
                'address1'=>$data['address1'] !== null ? $data['address1'] : $tenant->address1,
                'address2'=>$data['address2'] !== null ? $data['address2'] : $tenant->address2,
                'postcode'=>$data['postcode'] !== null ? $data['postcode'] : $tenant->postcode,
                'national_id_photo'=>isset($data['national_id_photo']) ? $this->UpdateImage(
                    $data['national_id_photo'],
                    FILE_TENANT_NATIONAL_ID_PHOTO_PATH.'/'.$data['name'],$tenant->national_id_photo) : $tenant->national_id_photo,
                'visa_photo'=>isset($data['visa_photo']) ? $this->UpdateImage(
                    $data['visa_photo'],
                    FILE_TENANT_VISA_PHOTO_PATH.'/'.$data['name'],$tenant->visa_photo) : $tenant->visa_photo,
                'passport_photo'=>isset($data['passport_photo']) ? $this->UpdateImage(
                    $data['passport_photo'],
                    FILE_PASSPORT_PHOTO_PATH.'/'.$data['name'],$tenant->passport_photo) : $tenant->passport_photo,
                'is_company'=>isset($data['is_company']) ? 1 : 0,
                'company_name'=>isset($data['is_company']) ? $data['company_name'] : null,
                'city_id'=>$data['city_id'] !== null ? $data['city_id'] : $tenant->city_id,
                'property_id'=>$data['property_id'] !== null ? $data['property_id'] : $tenant->property_id,
            ])){
                return $tenant;
            }
            throw new GeneralException('error');
        });
    }


}
