<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class BuildingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  double  $long
     * @param  double  $lat
     * @return \Illuminate\Http\Response
     */
    public function buildingsAround($long, $lat)
    {
        $buildings = DB::table('room_me_buildings')
                    ->join('kecamatan', 'kecamatan.kecamatan_id', '=', 'room_me_buildings.build_kecamatan')
                    ->join('kabupaten', 'kecamatan.kota_id', '=', 'kabupaten.kabupaten_id')
                    ->join('provinsi', 'kecamatan.provinsi_id', '=', 'provinsi.provinsi_id')
                    ->select(
                        'room_me_buildings.build_id', 
                        'room_me_buildings.build_name', 
                        'room_me_buildings.build_longitude', 
                        'room_me_buildings.build_latitude', 
                        'room_me_buildings.build_photos', 
                        'kecamatan.nama_kecamatan as build_kecamatan', 
                        'kabupaten.nama_kabupaten as build_kabupaten', 
                        'provinsi.nama_provinsi as build_provinsi', 
                        'room_me_buildings.build_price'
                    )
                    ->whereRaw('(6371 * acos(cos(radians('.$lat.')) * cos(radians(room_me_buildings.build_latitude)) * cos(radians(room_me_buildings.build_longitude) - radians('.$long.')) + sin(radians('.$lat.')) * sin(radians(room_me_buildings.build_latitude)))) < 3')
                    ->get();
        $data = response()->json($buildings, Response::HTTP_OK);
        
        return $data;
    }
}
