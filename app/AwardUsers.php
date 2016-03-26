<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AwardUsers extends Model
{
    protected $table = 'award_user';

    protected $guarded = ['id'];

    public static function saveData($data, $openid){
        $AwardUsers = self::where('openid', $openid)
            ->update([
            'award_info' => $data
          ]);
        return $AwardUsers['id'];
    }


}
