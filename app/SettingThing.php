<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingThing extends Model
{
    protected $table = 'award_setting_thing';

    protected $guarded = ['id'];
    //protected $fillable = array('category_id', 'email', 'password');

    public static function saveData($data){
        $SettingThing = self::create([
            'category_id' => $data['category_id'],
            'prize'   => $data['prize'],
            'name'   => $data['name'],
            'amount' => $data['amount'],
            'weight'   => $data['weight'],
          ]);
        return $SettingThing['id'];
    }

    public static function updateData($data){
        $SettingThing = self::where('id', $data['data_id'])
            ->update([
            'category_id' => $data['category_id'],
            'prize'   => $data['prize'],
            'name'   => $data['name'],
            'amount' => $data['amount'],
            'weight'   => $data['weight'],
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

    public static function saveUploadExcel($path, $id){
        $saveUploadExcel = self::find($id);
        $saveUploadExcel->url = $path;
        $saveUploadExcel->save();
    }
}
