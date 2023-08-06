<?php

namespace App\Http\Controllers;

use App\Jobs\LogJob;
use Carbon\Carbon;
use Illuminate\Support\Facades\Queue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LogController extends Controller
{
    public function createLog(Request $request)
    {
        Validator::make($request->all(), [
            'message' => 'required|string',
            'user_id' => 'required|integer',
        ])->validate();

        Queue::later(Carbon::now()->addSeconds(5), new LogJob(
            $request->input('message') ?? 'Log created successfully',
            $request->input('user_id') ?? 0,
            $request->input('level'),
            $request->input('channel'),
            $request->input('context'),
            $request->input('extra'),
            $request->input('formatted'),
            $request->input('remote_addr'),
            $request->input('user_agent'),
            $request->input('referrer'),
            $request->input('request_uri'),
            $request->input('http_method'),
            $request->input('server'),
            $request->input('cookies'),
        ));

        return response()->json([
            'message' => 'Log created successfully',
        ]);
    }
}
