@echo off
rem set MYSQLPATH=F:\xampp\mysql\
rem del /s uatdb.sql
echo %MYSQLPATH%
call %MYSQLPATH%\mysql -h localhost -uroot --password="" moneyiq < uatdb.sql
REM mysqldump -h moneyiq.jp  -umoneyiqadmin -pShowM3Th3Mon3y  --routines --triggers moneyiq_uat > uatdb.sql 
echo DONE