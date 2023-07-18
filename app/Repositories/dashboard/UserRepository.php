<?php

namespace App\Repositories\dashboard;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use App\Events\Backend\User\UserCreated;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Language;
use App\Exceptions\GeneralException;


class UserRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }

    public function create(array $data): User
    {
    
        // dd($string);
         
        return DB::transaction(function () use ($data) {
            $Fadel=DB::table('languages')->whereIn('id',$data['language'])->get('name')->toArray();
            $string = "";
            foreach($Fadel as $str){
              
               $string = $string . $str->name . ',';
            }
           // 
            // dd(json_encode($data['language']));
            $user = parent::create([
                'name' =>  strtolower($data['name']),
                'email' =>  strtolower($data['email']),
                'phone_number' =>  strtolower($data['phone_number']),
                'password' => Hash::make($data['password']),
                'role_id' => strtolower($data['role_id']), 
                'language' => $string,
            ]);

            // dd((json_encode($data['language'])));
            // $item= implode(',', $user->language[]);

            // $data['language'] = json_decode($user->language, true);

            // dd($data['language']);

            if (isset($data['image'])) {
                $user->update([
            'image' => $this->UploadFile($data['image'],'/images/employees/image'), 
                    
                ]);
            } else {
                $user->update([
                    'image' => $user->image
                ]);
            }

            $provider=User::where('email',$user->email)->first();
            foreach($data['language'] as $item){
                // dd($item);
                $lang =DB::table('language_user')->insert([
                    'language_id'=>$item,
                    'user_id'=>$user->id,            
                ]);
                 
         }
            if ($user) {
                event(new UserCreated($user));
                return $user;
            }
        });
    }
    
    public function UploadFile($file, $name)
    {
        // dd($file);
        //get file name with extention
        $filenameWithExt = $file->getClientOriginalName();
        //get just file name
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //GET EXTENTION
        $extention = $file->getClientOriginalExtension();
        //file name to store
        $fileNameToStore = $filename . '_' . time() . '.' . $extention;
        //upload image
        $path = $file->storeAs('public/' . $name . '/', $fileNameToStore);
        return $fileNameToStore;
    }

    public function update(User $user, array $data): User
    {
        $this->checkUserByEmail($user, $data['email']);
        return DB::transaction(function () use ($user, $data) {
            $Fadel = DB::table('languages')->whereIn('id', $data['language'])->get('name')->toArray();
            $string = "";
            foreach ($Fadel as $str) {

                $string = $string . $str->name . ',';
            }
            
            if ($user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'role_id' => $data['role_id'],
                'language' => $string,
                // 'password' => Hash::make($data['password']),
            ]))
                if (isset($data['image'])) {
                    $user->update([
                        'image' => $this->UploadFile($data['image'], '/images/employees/image'),
                    ]);
                } else {
                    $user->update([
                        'image' => $user->image
                    ]);
                }
            DB::table('language_user')->where('user_id', $user->id)->delete();
            foreach ($data['language'] as $item) {
                $lang = DB::table('language_user')->insert([
                    'language_id' => $item,
                    'user_id' => $user->id,
                ]);
            } {
                return $user;
            }
            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }
        public function createpassword(User $user, array $data): User
        { 
            return DB::transaction(function () use ($user, $data) {
                if ($user->update([
                    'password' => Hash::make($data['password']),
                    ]))
                    {
                        return $user;
                    }
                    throw new GeneralException(__('exceptions.backend.access.users.update_error'));
                });
        }
        
        public function update_imge(User $user, array $data): User
        {
            return DB::transaction(function () use ($user, $data) {
                    if (isset($data['image'])) {
                        $user->update([
                            'image' => $this->UploadFile($data['image'],'/images/employees/image'),
                        ]);
                    } else {
                        $user->update([
                            'image' => $user->image
                        ]);
                    }
                    {
                        return $user;
                    }
                    throw new GeneralException(__('exceptions.backend.access.users.update_error'));
                });
            }
}



