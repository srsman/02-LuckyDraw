<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingLink extends Model
{
    protected $table = 'award_setting_link';

    protected $guarded = ['id'];

    public static function saveData($data){
        $SettingLink = self::create([
            'category_id' => $data['category_id'],
            'prize'   => $data['prize'],
            'name'   => $data['name'],
            'weight'   => $data['weight'],
          ]);
        return $SettingLink['id'];
    }

    public static function saveUploadImg($path, $id){
        $saveUploadImg = self::find($id);
        $saveUploadImg->url = $path;
        $saveUploadImg->save();
    }
    
}
