<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Excel;//使用excel包
use App\SettingThing;   
use App\SettingLink;   
use App\SettingCode;   
use App\Code;   
use App\Category;   
use App\AwardUsers;   

class AdminController extends Controller
{
    public function index(){
        //需要检查是否登录todo
        $links =  SettingLink::all()->toArray();
        $codes =  SettingCode::all()->toArray();
        $things =  SettingThing::all()->toArray();
        return view('setPrize',['links' => $links, 'codes' => $codes, 'things' => $things]);
    }

    public function queryAward(){
        $links =  AwardUsers::where('award_type','link')->orderBy('award_prize')->get()->toArray();
        $codes =  AwardUsers::where('award_type','code')->orderBy('award_prize')->get()->toArray();
        $things =  AwardUsers::where('award_type','thing')->orderBy('award_prize')->get()->toArray();
        /*echo '<br/>';
        echo '<br/>';
        echo '<br/>';
        print_r($links);
        print_r($codes);
        print_r($things);*/
        return view('queryPrize',['links' => $links, 'codes' => $codes, 'things' => $things]);
    }

    public function setLink(Request $request){
        //设置链接类奖品
        //循环获取表单信息并保存
        $input = $request->input();
        //print_r($input);
        
        $data = array();
        $url = array();
        $i = 1;
        while (!empty($input['selectPrizePlaces'.$i]) && !empty($input['inputNumber'.$i]) && !empty($input['inputURL'.$i])) {
            $data['category_id'] = 1;
            $data['data_id'] = $input['data_id'.$i];
            $data['prize'] = $input['selectPrizePlaces'.$i];
            $data['name'] = $input['inputPrizeName'.$i];
            $data['weight'] = $input['inputNumber'.$i];
            $data['prize_url'] = $input['inputURL'.$i];
            $SettingLink = SettingLink::find($data['data_id']);
            if(!empty($SettingLink)){
                $url['id'.$i] = SettingLink::updateData($data);
            }else{
                $url['id'.$i] = SettingLink::saveData($data);
            }
            $i++;
        }
        
        //循环获取所有上传的图片并保存
        $j = 1;
        $destinationPath = public_path().'\uploads\img';
        $file = $request->file('inputImg'.$j);
        //print_r($request->file());
        while (!empty($file)) {
           $fileName = str_random(20).'.'.$request->file('inputImg'.$j)->getClientOriginalExtension();
           //$fileName = $request->file('inputImg'.$j)->getClientOriginalName();
           $fileInfo = $request->file('inputImg'.$j)->move($destinationPath, $fileName);
           if(!empty($fileName)){
               SettingLink::saveUploadImg($fileName, $url['id'.$j]);
           }
           $j++;
           $file = $request->file('inputImg'.$j);
        }
        return redirect()->action('Admin\AdminController@index');
    }

    public function setCode(Request $request){
        //循环获取表单信息并保存
        $input = $request->input();
        

        $data = array();
        $url = array();
        $i = 1;
        while (!empty($input['selectPrizePlaces'.$i]) && !empty($input['inputNumber'.$i]) && !empty($input['inputURL'.$i])) {
            $data['data_id'] = $input['data_id'.$i];
            $data['category_id'] = 2;
            $data['prize'] = $input['selectPrizePlaces'.$i];
            $data['name'] = $input['inputPrizeName'.$i];
            $data['weight'] = $input['inputNumber'.$i];
            $data['prize_url'] = $input['inputURL'.$i];
            $SettingCode = SettingCode::find($data['data_id']);
            if(!empty($SettingCode)){
                $url['id'.$i] = SettingCode::updateData($data);
            }else{
                $url['id'.$i] = SettingCode::saveData($data);
            }
            $i++;
        }
        
        //循环获取所有上传的图片并保存
        $j = 1;
        $destinationPath = public_path().'\uploads\img';
        $file = $request->file();
        print_r($file);
        exit();

        $file = $request->file('inputImg'.$j);
        while (!empty($file)) {
           $fileName = str_random(20).'.'.$request->file('inputImg'.$j)->getClientOriginalExtension();
           $fileInfo = $request->file('inputImg'.$j)->move($destinationPath, $fileName);
           SettingCode::saveUploadImg($fileName, $url['id'.$j]);
           $j++;
           $file = $request->file('inputImg'.$j);
        }

        // return redirect('/admin/setPrize');

        //循环获取所有上传的excel文件并保存
        $k = 1;
        $destinationPath2 = public_path().'\uploads\excel';
        $file = $request->file('inputExcel'.$k);
        // print_r($request->file());
        while (!empty($file)) {
            // print_r($url['id'.$k]);
           $fileName = str_random(20).'.'.$request->file('inputExcel'.$k)->getClientOriginalExtension();
           //sprint_r($fileName);
           $fileInfo = $request->file('inputExcel'.$k)->move($destinationPath2, $fileName);
           // SettingCode::saveUploadExcel($fileName, $url['id'.$k]);\
           //把excel领取码录入数据表Code
           $excelpath=$destinationPath2.'/'.$fileName;
           $cid=$url['id'.$k];
            $excel_data_array= Excel::load($excelpath, function($reader) {

             $excel_data = $reader->all();
             $excel_data=$excel_data->toArray();           
             $pd=$excel_data['0']['0'];
             if(key($pd)=='领取码')
             {  
                return $excel_data;
                
             }
             else
             { 
                    echo  "格式错误";
             }
          }      
         )->toArray();
            // print_r($excel_data_array);
            foreach ($excel_data_array[0] as  $value)
                {
                   
                    $new_code= new Code();
                    $new_code->code=$value['领取码'];
                    $new_code->cid=$url['id'.$k];
                    $new_code->status=1;
                    $new_code->save();
                }
           $k++;
           $file = $request->file('inputExcel'.$k);
        }
        return redirect()->action('Admin\AdminController@index');
    }

    public function setThing(Request $request){
        //设置实物类奖品
        //循环获取表单信息并保存
        $i = 1;
        $destinationPath = public_path().'\uploads\img';
        $input = $request->input();
        /*print_r($input);
        exit();*/
        
        $data = array();
        $url = array();
        while (!empty($input['selectPrizePlaces'.$i]) && !empty($input['inputPowerNumber'.$i]) && !empty($input['inputPrizeName'.$i]) && !empty($input['inputAmount'.$i])) {
            $data['data_id'] = $input['data_id'.$i];
            $data['category_id'] = 3;
            $data['prize'] = $input['selectPrizePlaces'.$i];
            $data['name'] = $input['inputPrizeName'.$i];
            $data['weight'] = $input['inputPowerNumber'.$i];
            $data['amount']=$input['inputAmount'.$i];
            $SettingThing = SettingThing::find($data['data_id']);
            if(!empty($SettingThing)){
                $url['id'.$i] = SettingThing::updateData($data);
            }else{
                $url['id'.$i] = SettingThing::saveData($data);
            }
            $i++;
        }
        
        //循环获取所有上传的图片并保存
        $j = 1;
        $file = $request->file('inputImg'.$j);
        while ($j<31) {
           $fileName = str_random(20).'.'.$request->file('inputImg'.$j)->getClientOriginalExtension();
           //$fileName = $request->file('inputImg'.$j)->getClientOriginalName();
           $fileInfo = $request->file('inputImg'.$j)->move($destinationPath, $fileName);
           SettingThing::saveUploadImg($fileName, $url['id'.$j]);
           $j++;
           $file = $request->file('inputImg'.$j);
        }

    return redirect()->action('Admin\AdminController@index');

    }

    public function setRate(){
        //设置三个类别奖品的中奖率
        return redirect('/admin');
    }

    public function deletePrizeItem(){
        //设置三个类别奖品的中奖率
        //return redirect('/admin');
    }

}
