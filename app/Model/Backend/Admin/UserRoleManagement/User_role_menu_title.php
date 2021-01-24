<?php

namespace App\Model\Backend\Admin\UserRoleManagement;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Admin\UserRoleManagement\User_role_menu_action_permition;
use Illuminate\Support\Facades\Auth;
class User_role_menu_title extends Model
{

        public function menuTitleUseMenePermission() 
        {
            $user_role_menu_action_id =  User_role_menu_action_permition::where('role_id',Auth::user()->role_id)
                    ->where('is_active',1)
                    ->whereNull('is_deleted')
                    ->pluck('user_role_menu_action_id')->toArray();

            if(maximumAccessPermission_HP())
            {
                return $this->hasMany(User_role_menu_action::class,'user_role_menu_title_id','id')
                ->whereNull('is_deleted');
            }else{
                return $this->hasMany(User_role_menu_action::class,'user_role_menu_title_id','id')
                            ->whereNull('is_deleted')
                            ->whereIn('id',$user_role_menu_action_id);
            }
              #return $this->hasMany(User_role_menu_action::class,'user_role_menu_title_id','id');
        }
}
