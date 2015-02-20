#script to load files into mysql
param (
    [string]$server = "localhost",
    [string]$user = "root",
    [string]$password =  $(throw "-password is required.")
#    ,[string]$file = $(throw "-file is required.")
)

$folders = 'tables', 'constraints', 'triggers', 'views'
$path_base = resolve-path "./../database/"
$mysql_dll = resolve-path "MySql.Data.dll"
write-host $mysql_dll

[void][system.reflection.Assembly]::LoadFrom("$mysql_dll")
write-host "Connecting to mysql on $mysql_server as $mysql_user"
$cn = New-Object -TypeName MySql.Data.MySqlClient.MySqlConnection
$cn.ConnectionString = "SERVER=$server;DATABASE=mysql;UID=$user;PWD=$password"
$cn.Open()

write-host "Loading database scrips from $path_base into $mysql_server as $mysql_user"
foreach($folder in $folders)
{
    write-host "Loading $path_base$folder"
    $files = Get-ChildItem("$path_base$folder")
    #write-host $files
    for($i=0;$i -lt $files.Count;$i++)
    {
        $file = $files[$i]
        write-host ($i+1)"/"$files.Count" "$file
        $cm = New-Object -TypeName MySql.Data.MySqlClient.MySqlCommand
        $cm.Connection = $cn
        $sql = [io.file]::ReadAllText("$path_base$folder\$file") 
        $cm.CommandText = $sql
        try{
            if($cm.ExecuteNonQuery())
            {
                Write-Host "Encountered unknown error"
                return -1;
            }
        } catch{
            write-host "Failed to execute sql for $path_base$folder\$file"
            return $Error[0]
            exit
        }
    }
}

write-host "Closing connection"
$cn.Close()
return 0;


return $result