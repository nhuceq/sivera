<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Exports\SppExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Helper;

/**
 * 
 */
class SppController extends Controller
{
	// var $Hp = new Helper;
	public function cek_jarak($bapp, $terima)
	{
		// $t_bapp = date('z', strtotime($bapp));
		// $t_terima = date('z', strtotime($terima));

		// $db = DB::table('tb_libur')->get();
		// $libur = [];
		// foreach ($db as $v) {
		// 	$libur[] = date('z', strtotime($v->tanggal));
		// }
		// $jarak = 0;
		// for ($i=$t_bapp; $i < $t_terima; $i++) { 
		// 	if(!in_array($i, $libur)) {
		// 		$jarak++;
		// 	}
		// }

		$diff = date_diff(date_create($bapp), date_create($terima));
		$diff_day = $diff->days;
		// print_r($diff);
		// print_r($bapp);
		// print_r($terima);
		$db = DB::table('tb_libur')->where('tanggal', '>=', $bapp)->where('tanggal', '<', $terima)->count();
		$jarak = $diff_day - $db;
		return $jarak;
		// return 0;
	}

	public function dashboard(Request $request_spp)
	{
		$data_spp = $request_spp -> all();
		$jml_spp = DB::table('tb_spp') -> count();

		
		$spp = DB::table('tb_spp')
		-> select('tb_spp.*', 'tb_user.username as loket_nama')
		-> leftJoin('tb_user', 'tb_spp.kode_user_loket','=', 'tb_user.id');


		if( isset($data_spp['filter_pj']) && $data_spp['filter_pj'] != 'Semua' ) {
			$spp->where('pj', 'like' , '%'. $data_spp['filter_pj'] . '%');
		}	


		$spp = $spp-> orderBy('id_spp', 'desc')-> get()->toArray();



		$spp_final = [];
		$i = 0;
		foreach ($spp as $key => $value) {
			if( !empty($value->tgl_bapp) && $value->tgl_bapp != '0000-00-00') {
				$jarak = $this->cek_jarak($value->tgl_bapp, $value->tgl_terima);
				if($jarak > 17) {
					$valueArray = json_decode(json_encode($value),true);
					$valueArray['terlambat'] = $jarak-17;
					$valueObject = json_decode(json_encode($valueArray));
					$spp_final[$i] = $valueObject;
					$i++;
				}
			}
		}

		$jml_dispen = count($spp_final);

		return view ('dashboard', ['jml_spp' => $jml_spp, ], ['jml_dispen' => $jml_dispen, ] );

	}

	public function list_spp(Request $request_spp)
	{

		$data_spp = $request_spp -> all();

		//mengecek apakah pencarian atau bukan
		if (isset($data_spp['cari'])) 
		{
			$text=$data_spp['cari'];
		}
		else
		{
			$text = '';
		}	


		$spp = DB::table('tb_spp')
		-> select('tb_spp.*', 'tb_user.username as loket_nama')
		-> leftJoin('tb_user', 'tb_spp.kode_user_loket','=', 'tb_user.id')
		-> whereRaw('( nomor_spp LIKE ? OR id_spp LIKE ? )', ['%' .$text. '%', '%' .$text. '%'])
		-> orderBy('id_spp', 'desc')
		-> paginate(10);

		$sifat_bayar_list = DB::table('tb_bayar')
		->groupBy('sifat_bayar')
		->get();

		$user_id_pj = Auth::user()->id_pj;
		$pj = DB::table('penanggung_jawab')->where('id', $user_id_pj)->first();

		return view ('spp.list_spp', ['data_spp' => $spp, 'pj' => $pj ])->with('sifat_bayar_list', $sifat_bayar_list);;	

		
		// return view('spp.list_spp')
	}	
	function fetch(Request $request)
	{
		$select = $request->get('select');
		$value = $request->get('value');
		$dependent = $request->get('dependent');
		$data = DB::table('tb_bayar')
		->where($select, $value)
		->groupBy($dependent)
		->get();

		$output = '<option value="">Pilih '.ucfirst($dependent).'</option>';
		foreach($data as $row)
		{
			$output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
		}

		echo $output;
	}





	public function laporan_spp(Request $request_spp)
	{
		$data_spp = $request_spp -> all();

		$spp = DB::table('tb_spp')
		-> select('tb_spp.*', 'tb_user.username as loket_nama')
		-> leftJoin('tb_user', 'tb_spp.kode_user_loket','=', 'tb_user.id');

		if ( Auth::user()->role == "user_biasa"){
			$unit=Auth::user()->unit;
			$spp-> where ('pj', 'like', '%'. $unit . ' %');
		}	

		$filter_bulan = isset($data_spp['filter_bulan']) ? $data_spp['filter_bulan'] : 'Semua';
		$filter_pj = isset($data_spp['filter_pj']) ? $data_spp['filter_pj'] : 'Semua';
		$filter_status_spp = isset($data_spp['filter_status_spp']) ? $data_spp['filter_status_spp'] : 'Semua';

		if( $filter_bulan != 'Semua' ) {
			$spp->whereMonth('tgl_terima', $data_spp['filter_bulan'])
			->whereYear('tgl_terima', $data_spp['filter_tahun']);
		}

		if( $filter_pj != 'Semua' ) {
			$spp->where('pj', 'like' , '%'. $data_spp['filter_pj'] . '%');
		}

		if( $filter_status_spp != 'Semua' ) {
			$spp->where('status_spp', 'like', '%'.$data_spp['filter_status_spp'].'%');
		}

		if( isset($data_spp['download']) ) {
			$spp = $spp-> orderBy('id_spp', 'desc')->get();
			$sppfinal = $this->getVerifikator($spp);
			$export = new SppExport($sppfinal, 'laporan.export_filter');
			return Excel::download($export, 'Laporan Filter.xlsx');
		}

		$spp = $spp-> orderBy('id_spp', 'desc')->paginate(10)
		->appends('filter_bulan', $filter_bulan)
		->appends('filter_pj', $filter_pj)
		->appends('filter_status_spp', $filter_status_spp);

		$url = $request_spp->fullUrl();
		if( strpos($url, '?')) {
			$url .= '&download=true';
		}else{
			$url .= '?download=true';
		}

		return view ('laporan.laporan_filter', ['data_spp' => $spp, 'link_dl' => $url ]);	
	}

	public function getVerifikator($spp)
	{
		$spparray = Helper::toArray($spp);
		$ver1array = [];
		$ver2array = [];
		foreach ($spparray as $key => $value) {
			$ver1array[] = $value['kode_ver1'];
			$ver2array[] = $value['kode_ver2'];
		}
		$ver1array = array_unique($ver1array);
		$ver2array = array_unique($ver2array);

		$ver1data = Helper::toArray(DB::table('tb_user')->whereIn('id', $ver1array)->get());
		$ver2data = Helper::toArray(DB::table('tb_user')->whereIn('id', $ver2array)->get());

		foreach ($spparray as $key => $value) {
			$ver1id = $value['kode_ver1'];
			$namaver1 = '';
			$getver1user = array_filter($ver1data, function($item) use ($ver1id) {
				if($item['id'] == $ver1id) {
					return true;
				}
			});
			if(count($getver1user)>0) {
				$ver1user = array_values($getver1user);
				if($ver1user[0]) {
					$namaver1 = $ver1user[0]['username'];
				}
			}
			$spparray[$key]['nama_ver1'] = $namaver1;

			$ver2id = $value['kode_ver2'];
			$namaver2 = '';
			$getver2user = array_filter($ver2data, function($item) use ($ver2id) {
				if($item['id'] == $ver2id) {
					return true;
				}
			});
			if(count($getver2user)>0) {
				$ver2user = array_values($getver2user);
				if($ver2user[0]) {
					$namaver2 = $ver2user[0]['username'];
				}
			}
			$spparray[$key]['nama_ver2'] = $namaver2;
		}

		return Helper::toObject($spparray);
	}

	public function export() 
	{
		return Excel::download(new SppExport, 'SppAll.xlsx');
	}



	public function laporan_dispen(Request $request_spp)
	{
		$data_spp = $request_spp -> all();

		$spp = DB::table('tb_spp')
		-> select('tb_spp.*', 'tb_user.username as loket_nama')
		-> leftJoin('tb_user', 'tb_spp.kode_user_loket','=', 'tb_user.id');

		if ( Auth::user()->role == "user_biasa"){
			$unit=Auth::user()->unit;
			$spp-> where ('pj', 'like', '%'. $unit . ' %');
		}		


		if( isset($data_spp['filter_pj']) && $data_spp['filter_pj'] != 'Semua' ) {
			$spp->where('pj', 'like' , '%'. $data_spp['filter_pj'] . '%');
		}	

		if( isset($data_spp['filter_bulan']) && $data_spp['filter_bulan'] != 'Semua' ) {
			$spp->whereMonth('tgl_dok_spp', $data_spp['filter_bulan'])
			->whereYear('tgl_dok_spp', $data_spp['filter_tahun']);
		}


		$spp = $spp-> orderBy('id_spp', 'desc')-> get() -> toArray();



		$spp_final = [];
		$i = 0;
		foreach ($spp as $key => $value) {
			if( !empty($value->tgl_bapp) && $value->tgl_bapp != '0000-00-00') {
				$jarak = $this->cek_jarak($value->tgl_bapp, $value->tgl_terima);
				if($jarak > 17) {
					$valueArray = json_decode(json_encode($value),true);
					$valueArray['terlambat'] = $jarak-17;
					$valueObject = json_decode(json_encode($valueArray));
					$spp_final[$i] = $valueObject;
					$i++;
				}
			}
		}

		if( isset($data_spp['download']) ) {
			$export = new SppExport($spp_final, 'laporan.export_dispen');
			return Excel::download($export, 'Laporan Dispen.xlsx');
		}

		$url = $request_spp->fullUrl();
		if( strpos($url, '?')) {
			$url .= '&download=true';
		}else{
			$url .= '?download=true';
		}

		return view ('laporan.laporan_dispen', ['data_spp' => $spp_final, 'link_dl' => $url ]);	
	}

	public function detail_spp($id_spp)
	{

		$spp = DB::table ('tb_spp')->where('id_spp', $id_spp)->first();

		$user_pj = DB::table('tb_user')
			->select('nama_pj')
			->leftJoin('penanggung_jawab', 'penanggung_jawab.id', '=', 'tb_user.id_pj')
			->where('tb_user.id', $spp->kode_user_biasa)
			->first();
		$nama_pj = $user_pj ? $user_pj->nama_pj : '-';

		$loket = DB::table('tb_user')
		->where('tb_user.id', $spp->kode_user_loket)
		->first();
		$nama_loket = $loket ? $loket->nama_lengkap : '';

		$ver1 = DB::table('tb_user')
		->where('tb_user.id', $spp->kode_ver1)
		->first();
		$nama_ver1 = $ver1 ? $ver1->nama_lengkap : '';

		$ver2 = DB::table('tb_user')
		->where('tb_user.id', $spp->kode_ver2)
		->first();
		$nama_ver2 = $ver2 ? $ver2->nama_lengkap : '';

		return view ('spp.spp_detail', [
			'data_spp' => $spp,
			'nama_loket' => $nama_loket,
			'nama_ver1' => $nama_ver1,
			'nama_ver2' => $nama_ver2,
			'nama_pj' => $nama_pj,
		]);

	}

	public function spp_routing($id_spp)
	{
		$spp = DB::table ('tb_spp')
		-> where ('id_spp', $id_spp) -> first();

		return view ('spp.routing', [
			'data_spp' => $spp, ]);


	}

	public function spp_save(Request $request_spp)
	{
		$data_spp = $request_spp -> all();


		$nomor_spp = $data_spp ['nomor_spp'];
		$tgl_dok = $data_spp ['tgl_dok'];
		$ket_spp = $data_spp ['ket_spp'];
		$pj = $data_spp ['pj'];
		$jenis_belanja = $data_spp ['jenis_belanja'];
		$nilai_spp = $data_spp ['nilai_spp'];
		$tgl_bapp = $data_spp ['tgl_bapp'];
		$tgl_terima = $data_spp ['tgl_terima'];		
		$kode_user_loket = Auth::user()->id;

		$data_save = [
			'nomor_spp' => $nomor_spp,
			'tgl_dok_spp' => $tgl_dok,
			'ket_spp' => $ket_spp,
			'pj' => $pj,
			'jenis_belanja' => $jenis_belanja,
			'nilai_spp' => $nilai_spp,
			'tgl_bapp' => $tgl_bapp,
			'tgl_terima' => $tgl_terima,
			'tgl_input' => date('y-m-d H:i:s'),
			'kode_user_loket' => $kode_user_loket
		];
		if ($pj == 'KEK (Mardi Santoso)') {
			$opr = '=';
		} else {
			$opr = '!=';
		}

		$thisyear = date('Y');
		$spp = DB::table('tb_spp') -> where ('nomor_spp', $nomor_spp ) -> where('pj', $opr, 'KEK (Mardi Santoso)') -> whereYear('tgl_input', $thisyear) -> first();

		if($spp) {
			return redirect()->back()->with('error', 'Nomor SPP sudah ada');
		}
		else {
			DB::table('tb_spp') -> insert ($data_save);

			$data_lama = "";
			$data_baru = $data_save;
			$tipe = 'spp';
			$key = $nomor_spp;
			Helper::CreateLog($tipe, $key, $data_lama, $data_baru);

			return redirect ('spp_view');
		}

	}

	public function spp_edit_loket(Request $request_spp, $id_spp)
	{
		$data_spp = $request_spp->all();

		$nomor_spp = $data_spp ['nomor_spp'];		
		$tgl_dok = $data_spp ['tgl_dok'];
		$ket_spp = $data_spp ['ket_spp'];
		$pj = $data_spp ['pj'];
		$jenis_belanja = $data_spp ['jenis_belanja'];
		$nilai_spp = $data_spp ['nilai_spp'];
		$tgl_bapp = $data_spp ['tgl_bapp'];
		$tgl_terima = $data_spp ['tgl_terima'];
		$tgl_kembali = $data_spp ['tgl_kembali'];
		$tgl_terima_kembali = $data_spp ['tgl_terima_kembali'];
		$posisi_dok = $data_spp ['posisi_dok'];

		$data_edit = [
			'nomor_spp' => $nomor_spp,
			'tgl_dok_spp' => $tgl_dok,
			'ket_spp' => $ket_spp,
			'pj' => $pj,
			'jenis_belanja' => $jenis_belanja,
			'nilai_spp' => $nilai_spp,
			'tgl_bapp' => $tgl_bapp,
			'tgl_terima' => $tgl_terima,
			'tgl_dikembalikan' => $tgl_kembali,
			'tgl_penerimaan_kembali' => $tgl_terima_kembali,
			'posisi_dok' => $posisi_dok,
		];

		$data_lama = DB::table('tb_spp') -> where ('id_spp', $id_spp) ->first();
		$data_baru = $data_edit;
		$tipe = 'spp';
		$key = $nomor_spp;

		DB::table('tb_spp') -> where ('id_spp', $id_spp) -> update($data_edit);
		Helper::CreateLog($tipe, $key, $data_lama, $data_baru);

		return redirect ('spp_detail/'.$id_spp);
	}

	public function verifikasi1_edit(Request $request_spp, $id_spp)
	{
		$data_spp = $request_spp -> all();
		$verifikator2 = $data_spp ['verifikator2'];
		$jenis_dok_spp = $data_spp ['jenis_dok_spp'];
		$status_spp = $data_spp ['status_spp'];
		$kategori_catatan = '';
		if( isset($data_spp ['kategori_catatan'])) {
			$kategori_catatan = $data_spp['kategori_catatan'];
			$kategori_catatan = implode(",", $kategori_catatan);
		}
		$catatan_verifikator = $data_spp ['catatan_verifikator'];
		$tgl_spm = $data_spp ['tgl_spm'];
		$tgl_sp2d = $data_spp ['tgl_sp2d'];
		$nomor_sp2d = $data_spp ['nomor_sp2d'];

		$data_edit = [
			'kode_ver2' => $verifikator2,
			'jenis_dok' => $jenis_dok_spp,
			'status_spp' => $status_spp,
			'kategori_catatan' => $kategori_catatan,
			'catatan_verifikator' => $catatan_verifikator,
			'tgl_spm' => $tgl_spm,
			'tgl_sp2d' => $tgl_sp2d,
			'nomor_sp2d' => $nomor_sp2d,
		];
		if(Auth::user()->role == 'verifikator1') {
			$data_edit['kode_ver1'] = Auth::user()->id;
		}

		$data_lama = DB::table('tb_spp') -> where ('id_spp', $id_spp) ->first();
		$data_baru = $data_edit;
		$tipe = 'spp';
		$key = $id_spp;

		DB::table('tb_spp') -> where ('id_spp', $id_spp) -> update($data_edit);
		Helper::CreateLog($tipe, $key, $data_lama, $data_baru);

		return redirect ('spp_detail/'.$id_spp);
	}

	public function verifikasi2_edit(Request $request_spp, $id_spp)
	{

		$data_spp = $request_spp -> all();


		// $kategori_catatan = $data_spp ['kategori_catatan'];
		$catatan_verifikator = $data_spp ['catatan_verifikator'];
		$status_spp = $data_spp ['status_spp'];
		$kode_ver2 = Auth::user()->id;

		$data_edit = [


			// 'kategori_catatan' => $kategori_catatan,
			'catatan_verifikator' => $catatan_verifikator,
			'status_spp' => $status_spp,
			'kode_ver2' => $kode_ver2

		];
		DB::table('tb_spp') -> where ('id_spp', $id_spp) -> update($data_edit);
		return redirect ('spp_detail/'.$id_spp);
	}

	public function spp_delete(Request $request_spp, $id_spp)
	{
		DB::table('tb_spp') -> where ('id_spp', $id_spp) -> delete();
		return redirect ('spp_view');
	}



	// class DynamicDependent extends Controller
	// {
// public function index()
// {
// 	$sifat_bayar_list = DB::table('tb_bayar')
// 	->groupBy('sifat_bayar')
// 	->get();
// 	return view('spp.list_spp')->with('sifat_bayar_list', $sifat_bayar_list);
// }

// function fetch(Request $request)
// {
// 	$select = $request->get('select');
// 	$value = $request->get('value');
// 	$dependent = $request->get('dependent');
// 	$data = DB::table('tb_bayar')
// 	->where($select, $value)
// 	->groupBy($dependent)
// 	->get();
// 	$output = '<option value="">Select '.ucfirst($dependent).'</option>';
// 	foreach($data as $row)
// 	{
// 		$output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
// 	}
// 	echo $output;

	// }
}