@echo off
echo A basic batch file that repeats FTPSync transfers until
echo all files are transfered successfully.

del %1.RES
:repeat
cd FTPSync
ftpsync  %1
if errorlevel 4 goto inierror

goto end

:inierror
echo "ERROR: Most likely there's a problem in %1.INI file!"

:end