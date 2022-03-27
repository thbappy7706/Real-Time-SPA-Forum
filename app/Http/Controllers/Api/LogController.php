<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Monolog\Handler\IFTTTHandler;
use Spatie\Valuestore\Valuestore;

class LogController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      $requestData = $request->all();
      if ($request->has('ip')){
          $ip = $request->ip;
      }else{
          $ip = $request->ip();
      }
        $store = Valuestore::make(resource_path('logs\logs.json'));
        $storeLog =   json_encode($store->put($ip,$requestData)) ;

       return $storeLog;

    }
}
