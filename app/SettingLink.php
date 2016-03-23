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
            'prize_url'   => $data['prize_url'],
          ]);
        return $SettingLink['id'];
    }

    public static function updateData($data){
        $SettingLink = self::where('id', $data['data_id'])
            ->update([
            'category_id' => $data['category_id'],
            'prize'   => $data['prize'],
            'name'   => $data['name'],
            'weight'   => $data['weight'],
            'prize_url'   => $data['prize_url'],
          ]);
        return $data['data_id'];
    }

    public static function deleteData($id){
        //todo
    }

    public static function saveUploadImg($path, $id){
        $saveUploadImg = self::find($id);
        $saveUploadImg->url = $path;
        $saveUploadImg->save();
    }
   
}
