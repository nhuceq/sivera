<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class Helper extends Controller
{
	static public function CreateLog($tipe, $key, $data_lama, $data_baru)
	{
		if(gettype($data_lama) == 'array' || gettype($data_lama) == 'object') {
			$data_lama = json_encode($data_lama);
		}
		if(gettype($data_baru) == 'array' || gettype($data_baru) == 'object') {
			$data_baru = json_encode($data_baru);
		}
		$data_log = [
			'tipe' => $tipe,
			'data_lama' => $data_lama,
			'data_baru' => $data_baru
		];
		if($tipe=='spp') {
			$data_log['nomor_spp'] = $key;
		}
		if($tipe=='user') {
			$data_log['user_id'] = $key;
		}
		$data_log['created_at'] = date('Y-m-d H:i:s');
		$data_log['created_by'] = Auth::user()->id;

		DB::table('system_log')->insert($data_log);
		return true;
	}

	static public function toArray($obj)
	{
		return json_decode(json_encode($obj), true);
	}

	static public function toObject($array)
	{
		return json_decode(json_encode($array));
	}
}