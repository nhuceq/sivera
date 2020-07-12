<?php

//DynamicDepdendent.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DynamicDependent extends Controller
{
    function index()
    {
       $sifat_bayar_list = DB::table('tb_bayar')
       ->groupBy('sifat_bayar')
       ->get();
       return view('dynamic_dependent')->with('sifat_bayar_list', $sifat_bayar_list);
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
       $output = '<option value="">Select '.ucfirst($dependent).'</option>';
       foreach($data as $row)
       {
          $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
      }
      echo $output;
  }
}

?>
