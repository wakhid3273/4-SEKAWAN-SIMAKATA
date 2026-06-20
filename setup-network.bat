@echo off
title Setup Network Access - SIMAKATA
color 0B
echo ========================================
echo   SETUP NETWORK ACCESS - SIMAKATA
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
echo Your IP Address: %IP%
echo.
echo ========================================
echo   IMPORTANT INFORMATION
echo ========================================
echo.
echo Your friends can access the website at:
echo    http://%IP%:8000
echo.
echo ========================================
echo.
echo NEXT STEPS:
echo.
echo 1. Update .env file with this IP address
echo    REVERB_HOST=%IP%
echo    VITE_REVERB_HOST=%IP%
echo    APP_URL=http://%IP%:8000
echo.
echo 2. Rebuild assets: npm run build
echo.
echo 3. Clear cache: php artisan config:clear
echo.
echo 4. Open firewall ports (run as Administrator):
echo    - Port 8000 for Laravel
echo    - Port 8080 for Reverb
echo.
echo ========================================
echo.
pause
