<?php

namespace App\Http\Controllers;

use App\Jobs\IPLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SampleController extends Controller
{
    public function logIPthruQ(Request $request)
    {
        IPLogger::dispatch($request);
        return response()->json(['message' => 'IP logged successfully']);
    }

    public function createInS3()
    {
        Storage::put(date('Y-m-d-H-i-s').'.txt', date('Y-m-d H:i:s'));
        return response()->json(['message' => 'S3 file created successfully']);
    }

    public function createInRDS()
    {
        DB::table('logs')->insert(['created_at' => date('Y-m-d H:i:s')]);
        return response()->json(['message' => 'RDS insert successful']);
    }
}
