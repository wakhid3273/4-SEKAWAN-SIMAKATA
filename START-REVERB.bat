@echo off
title Laravel Reverb Server - SIMAKATA
color 0A
echo ========================================
echo   LARAVEL REVERB SERVER - SIMAKATA
echo ========================================
echo.
echo Starting Reverb WebSocket Server...
echo Server: ws://localhost:8080
echo.
echo Press Ctrl+C to stop the server
echo ========================================
echo.

php artisan reverb:start --debug

pause
