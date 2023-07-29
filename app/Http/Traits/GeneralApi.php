<?php

namespace App\Http\Traits;

trait GeneralApi
{

    static public function returnData($status, $msg, $data) {
        return response()->json([
            'status' => $status,
            'msg' => $msg,
            'data' => $data
        ]);
    }

    static public function returnNoContent() {
        return response()->json([
            'status' => 204,
            'msg' => 'No Content',
            'data' => []
        ]);
    }

}
