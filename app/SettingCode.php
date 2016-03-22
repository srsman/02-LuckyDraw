<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingCode extends Model
{
    protected $table = 'award_setting_code';

    protected $guarded = ['id'];

    public static function saveData($data){
        $SettingCode = self::create([
            'category_id' => $data['category_id'],
            'prize'   => $data['prize'],
            'name'   => $data['name'],
            'weight'   => $data['weight'],
          ]);
        return $SettingCode['id'];
    }

    public static function saveUploadImg($path, $id){
        $saveUploadImg = self::find($id);
        $saveUploadImg->url = $path;
        $saveUploadImg->save();
    }

    public static function saveUploadExcel($path, $id){
        $saveUploadExcel = self::find($id);
        $saveUploadExcel->code_price = $path;
        $saveUploadExcel->save();
    }
}
