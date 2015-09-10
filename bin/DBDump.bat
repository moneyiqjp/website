@echo off
set MYSQLPATH=F:\xampp\mysql\bin
echo %MYSQLPATH%
call %MYSQLPATH%\mysqldump.exe -u moneyiqadmin -h moneyiq.jp -p ShowM3Th3Mon3y --routines --triggers %1 > uatdb.sql 
echo DONE