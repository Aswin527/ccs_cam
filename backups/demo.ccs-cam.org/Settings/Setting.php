<?php

namespace App\Settings;

use App\Models\Setting as AppSetting;

class Setting
{
    public function getsettings($name){
        $value=AppSetting::where('name',$name)
                ->first()
                ->value;
        return $value;
    }
}