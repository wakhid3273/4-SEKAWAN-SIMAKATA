<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckReverbConnection
{
    /**
     * Handle an incoming request.
     * 
     * Middleware ini mengecek koneksi Reverb dan set flag
     * untuk graceful degradation jika Reverb tidak tersedia.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah Reverb server running
        $reverbHost = config('broadcasting.connections.reverb.options.host', 'localhost');
        $reverbPort = config('broadcasting.connections.reverb.options.port', 8080);
        
        $isReverbRunning = @fsockopen($reverbHost, $reverbPort, $errno, $errstr, 1);
        
        if ($isReverbRunning) {
            fclose($isReverbRunning);
            view()->share('reverbStatus', 'connected');
        } else {
            view()->share('reverbStatus', 'disconnected');
            
            // Log warning hanya sekali per 5 menit untuk menghindari spam
            $cacheKey = 'reverb_warning_logged';
            if (!cache()->has($cacheKey)) {
                Log::warning('Reverb server is not running. Real-time features are disabled.');
                cache()->put($cacheKey, true, 300); // 5 menit
            }
        }
        
        return $next($request);
    }
}
