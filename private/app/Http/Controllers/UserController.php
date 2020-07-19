<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class UserController extends Controller
{
    // halaman listing
    public function list_user(Request $request_user)
    {
    	$data_user = $request_user->all();

        // ngecek apakah pencarian atau bukan
    	if (isset($data_user['cari']))
    	{	
			$text=$data_user['cari'];
		}
		else 
		{
			$text ='';
		}

    	$user = DB::table('tb_user')
        -> where ('deleted', 0)
    	-> where ( function($user) use($text) {
            $user -> where('username', 'LIKE', '%' .$text. '%')
    	   -> orwhere ('role', 'LIKE', '%' .$text. '%' );
        })
    	-> paginate(10); // 5 = jml baris per halaman

    	return view ('user.user_listing', ['data_user' => $user,
    	]);
    }

    // halaman detail user
    public function detail_user($id)
    {
      
        // mengambil 1 data yang sesuai kriteria (id = ...)
    	$user = DB::table('tb_user')
        -> where ('id', $id)
        -> first();

    	return view ('user.user_detail', [
            'menu_profil'=>true,
    		'data_user' => $user,
    	]);

    }

    // menampilkan form saat create user
    // public function form_user()
    // {
    // 	return view ('user.user_form');
    // }

    // saat submit form create / submit user
    public function save_user(Request $request_user)
    {
    	$data_user = $request_user->all();

        // variable = name di form
        
    	$nm_user = $data_user['username'];
    	$nm_lengkap = $data_user['nama_lengkap'];
    	$pass = $data_user['password'];
    	$hak_akses = $data_user['hak_akses'];
    	$no_hp = $data_user['no_hp'];
        $email = $data_user['email'];
        $unit = $data_user['unit'];


    	$data_save = [
            // field di db => varible
    		
    		'username' => $nm_user,
    		'nama_lengkap' => $nm_lengkap,
    		'password_asli' => $pass,
            'role' => $hak_akses,
            'no_hp' => $no_hp,
            'email' => $email,
            'unit' => $unit,
            'password' => bcrypt($pass)
    	];

        // ngecek apakah kodeuser sudah ada atau belum ( cek duplikat)
    	$user_save = DB::table('tb_user') -> where ('username', $nm_user) ->first();

        // jika tidak duplikat
    	if($user_save == false){
    		DB::table ('tb_user') -> insert($data_save);
            return redirect ('user_view');
    	}
        // jika ada duplikat
    	else{
            return redirect() -> back() -> with ('error', 'Username sudah ada'); 
    	}
    	
    }

    
    public function user_edit (Request $request_user, $id)
    {
    	$data_user = $request_user->all();
// print_r($data_user);exit;
        // variable = name di form
    	$nm_user = $data_user['username'];
        $nm_lengkap = $data_user['nama_lengkap'];
        $pass = $data_user['password'];
        $hak_akses = $data_user['hak_akses'];
        $no_hp = $data_user['no_hp'];
        $email = $data_user['email'];
        $unit = $data_user['unit'];


        $data_edit = [
            // field di db => varible
            
            'username' => $nm_user,
            'nama_lengkap' => $nm_lengkap,
            'password_asli' => $pass,
            'role' => $hak_akses,
            'no_hp' => $no_hp,
            'email' => $email,
            'unit' => $unit,
            'password' => bcrypt($pass)
        ];

        // ngupdate
    	DB::table('tb_user') -> where ('id', $id) -> update($data_edit);
        // mengalihkan ke halaman listing user
    	return redirect ('user_detail/'.$id);

    }


    public function user_delete(Request $request, $id)
    {
        //delete user sesuai dengan id
        $deleted = [
            'deleted' => 1
        ];
        DB::table('tb_user') -> where ('id', $id) -> update($deleted);

        //mengalihkan
        return redirect ('user_view');
    }
    
}
