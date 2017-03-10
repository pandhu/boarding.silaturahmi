<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
class BaseController extends Controller
{
    public function _search(Request $request){
        $query = $request->input('q');
        $peserta = Peserta::where('code', $query)->first();

        if(is_null($peserta)){
            $data = ['response'=>404, 'message'=>'not found', 'data'=>null];
            return response()->json($data);
        } else {
            $data = ['response'=>200, 'message'=>'success', 'data'=>$peserta];
            return response()->json($data);
        }
    }

    public function _konfirmasi(Request $request){
        $code = $request->input('code');
        $peserta = Peserta::where('code', $code)->first();

        try{
            $peserta->present_date = date("Y-m-d H:i:s");
            $peserta->save();
            $data = ['response'=>200, 'message'=>"success", 'data'=>$peserta];
            return response()->json($data);
        }catch(\Exception $e){
            $data = ['response'=>404, 'message'=>$e->getMessage(), 'data'=>null];
            return response()->json($data);
        }
        $data = ['response'=>404, 'message'=>$e->getMessage(), 'data'=>null];
        return response()->json($data);
    }

    public function _cancel(Request $request){
        $code = $request->input('code');
        $peserta = Peserta::where('code', $code)->first();

        try{
            $peserta->present_date = null;
            $peserta->save();
            $data = ['response'=>200, 'message'=>"success", 'data'=>$peserta];
            return response()->json($data);
        }catch(\Exception $e){
            $data = ['response'=>404, 'message'=>$e->getMessage(), 'data'=>null];
            return response()->json($data);
        }
        $data = ['response'=>404, 'message'=>$e->getMessage(), 'data'=>null];
        return response()->json($data);
    }

    public function listPeserta(){
        $pesertas = Peserta::all();
        $data = ['pesertas'=>$pesertas];

        return view('list', $data);
    }
}
