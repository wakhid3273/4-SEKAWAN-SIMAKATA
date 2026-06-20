@echo off
title SIMAKATA - Network Mode (Multi-Device)
color 0A

echo ========================================
echo   SIMAKATA - NETWORK MODE
echo ========================================
echo.
echo Detecting your IP address...
echo.

for /f "tokens=2 delims=:" %%a in ('ipconfig ^| findstr /c:"IPv4 Address"') do (
    set IP=%%a
    goto :found
)

:found
set IP=%IP:~1%
echo.
echo ========================================
echo   SERVER INFORMATION
echo ========================================
echo.
echo Your IP Address: %IP%
echo.
echo Laravel Server : http://%IP%:8000
echo Reverb Server  : ws://%IP%:8080
echo.
echo Friends can access at: http://%IP%:8000
echo.
echo ========================================
echo.
echo Starting servers...
echo.
echo [Press Ctrl+C to stop all servers]
echo.
echo ========================================
echo.

start "Laravel Server" cmd /k "echo Laravel Server Running... & echo. & echo Access: http://%IP%:8000 & echo. & php artisan serve --host=0.0.0.0 --port=8000"

timeout /t 3 /nobreak >nul

start "Reverb Server" cmd /k "echo Reverb WebSocket Server Running... & echo. & echo Connection: ws://%IP%:8080 & echo. & php artisan reverb:start --host=0.0.0.0 --port=8080 --debug"

echo.
echo ========================================
echo   SERVERS STARTED!
echo ========================================
echo.
echo Two windows opened:
echo   1. Laravel Server (Port 8000)
echo   2. Reverb Server (Port 8080)
echo.
echo Share this URL with your friends:
echo    http://%IP%:8000
echo.
echo To stop servers: Close both windows
echo.
echo ========================================
echo.
pause
