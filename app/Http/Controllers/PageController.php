<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Province;
use App\City;

class PageController extends Controller
{
    public function pageProvince(){
        return 'Berikut Adalah Halaman page Controller';
    }

    public function p_list(){
        $p = Province::all();
        return view('l_province',compact('p'));
    }

    public function c_list(){
        $c = City::join('provinces','provinces.id','cities.province_id')->get();
        return view('l_city',compact('c'));
    }

    public function getProvince(){
        $client = new Client();
        try {
            $response = $client->get('https://api.rajaongkir.com/starter/province',
            array(
                'headers'   =>  array(
                    'key'   => '5cb0a66c2865f1b23c777510e0572692',
                )
            )
        );
        } catch (RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();

        $array_result   =   json_decode($json,true);
        // return response()->json($array_result);
        // echo $array_result["rajaongkir"]["results"][1]["province"];

        // for ($i=0; $i <count($array_result['rajaongkir']['results']) ; $i++) { 
        //     $province = new Province;
        //     $province->id   =  $array_result['rajaongkir']['results'][$i]['province_id'];
        //     $province->province   =  $array_result['rajaongkir']['results'][$i]['province'];
        //     $province->save();
        // }

        // return 'success';
    }

    public function getCity(){
        $client = new Client();
        try {
            $response = $client->get('https://api.rajaongkir.com/starter/city',
            array(
                'headers'   =>  array(
                    'key'   => '5cb0a66c2865f1b23c777510e0572692',
                )
            )
        );
        } catch (RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();

        $array_result   =   json_decode($json,true);
        return response()->json($array_result);
        // echo $array_result['rajaongkir']['results'][0]['city_name'];
        // for ($i=0; $i <count($array_result['rajaongkir']['results']) ; $i++) { 
        //     $province = new City;
        //     $province->id   =  $array_result['rajaongkir']['results'][$i]['city_id'];
        //     $province->province_id   =  $array_result['rajaongkir']['results'][$i]['province_id'];
        //     $province->city   =  $array_result['rajaongkir']['results'][$i]['city_name'];
        //     $province->save();
        // }

        // return 'success';
    
    }
    public function checkShipping(){
        $title  =   "Check Shipping";
        $city   =   City::get();
        return view('check-shipping',compact('title','city'));
    }

    public function processShipping(Request $request){
        $title  =   "Check Shipping Resource";
        $client = new Client();
        try {
            $response = $client->request('POST','https://api.rajaongkir.com/starter/cost',
            [
                'body'  =>  'origin='.$request->origin.'&destination='.$request->destination.'&weight='.$request->weight.'&courier=jne',
                'headers'   =>  [
                    'key'   =>  '5cb0a66c2865f1b23c777510e0572692',
                    'content-type'  =>  'application/x-www-form-urlencoded',
                ]
            ]
            
        );
    } catch (RequestException $e) {
        var_dump($e->getResponse()->getBody()->getContents());
    }

        $client = new Client();
        try {
            $response1 = $client->request('POST','https://api.rajaongkir.com/starter/cost',
            [
                'body'  =>  'origin='.$request->origin.'&destination='.$request->destination.'&weight='.$request->weight.'&courier=tiki',
                'headers'   =>  [
                    'key'   =>  '5cb0a66c2865f1b23c777510e0572692',
                    'content-type'  =>  'application/x-www-form-urlencoded',
                ]
            ]
            
        );
    } catch (RequestException $e) {
        var_dump($e->getResponse()->getBody()->getContents());
    }


        $client = new Client();
        try {
            $response2 = $client->request('POST','https://api.rajaongkir.com/starter/cost',
            [
                'body'  =>  'origin='.$request->origin.'&destination='.$request->destination.'&weight='.$request->weight.'&courier=pos',
                'headers'   =>  [
                    'key'   =>  '5cb0a66c2865f1b23c777510e0572692',
                    'content-type'  =>  'application/x-www-form-urlencoded',
                ]
            ]
            
        );
        
        } catch (RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();
        $json1 = $response1->getBody()->getContents();
        $json2 = $response2->getBody()->getContents();

        $array_result   =   json_decode($json,true);
        $array_result1   =   json_decode($json1,true);
        $array_result2   =   json_decode($json2,true);
        $origin =   $array_result['rajaongkir']['origin_details']['city_name'];
        $origin1 =   $array_result1['rajaongkir']['origin_details']['city_name'];
        $origin2 =   $array_result2['rajaongkir']['origin_details']['city_name'];
        $destination =   $array_result['rajaongkir']['destination_details']['city_name'];
        $destination1 =   $array_result1['rajaongkir']['destination_details']['city_name'];
        $destination2 =   $array_result2['rajaongkir']['destination_details']['city_name'];

        return view('check-shipping-result',compact('title','origin','origin1','origin2','destination','destination1','destination2','array_result','array_result1','array_result2'));
    }
}