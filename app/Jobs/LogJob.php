<?php

namespace App\Jobs;

use App\Models\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LogJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $message,
        public int $userId,
        public string | null $level = 'info',
        public string | null $channel = 'local',
        public string | null $context = null,
        public string | null $extra = null,
        public string | null $formatted = null,
        public string | null $remoteAddr = null,
        public string | null $userAgent = null,
        public string | null $referrer = null,
        public string | null $requestUri = null,
        public string | null $httpMethod = null,
        public string | null $server = null,
        public string | null $cookies = null,
    ) {
        Log::create([
            'message' => $this->message,
            'user_id' => $this->userId,
            'level' => $this->level ?? 'info',
            'channel' => $this->channel ?? 'local',
            'context' => $this->context,
            'extra' => $this->extra,
            'formatted' => $this->formatted,
            'remote_addr' => $this->remoteAddr,
            'user_agent' => $this->userAgent,
            'referrer' => $this->referrer,
            'request_uri' => $this->requestUri,
            'http_method' => $this->httpMethod,
            'server' => $this->server,
            'cookies' => $this->cookies,
        ]);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
