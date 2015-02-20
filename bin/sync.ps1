$a = (Get-Host).UI.RawUI
$a.WindowTitle = "Sync Folder To Ftp"
 
$ftp = "ftp://localhost/data/"
$localDirectory = "C:\projects\website\backend"
$user = "moneyiq"
$pass = "ShowMeTh3Money"
 
$webclient = New-Object System.Net.WebClient 
$webclient.Credentials = New-Object System.Net.NetworkCredential($user,$pass)  
$Files = get-childitem $localDirectory -recurse -force 
Write-Host  $Files.Count
foreach ($File in $Files)
{
    Write-Host "$LocalFile"
    $LocalFile = $File.FullName
 
    $RemoveDirectory = $LocalFile.Replace($localDirectory,"")
    $ChangeSlashes = $RemoveDirectory.Replace('\', '/')
    $RemoveSpaces = $ChangeSlashes.Trim()
    $RemoteFile = $ftp+$RemoveSpaces
    $uri = New-Object System.Uri($RemoteFile) 
    $webclient.UploadFile($uri, $LocalFile)
    
    Write-Host "Getting $File from $localDirectory" -Foreground "Red"
    Write-Host "Puting $File to $ftp" -Foreground "Yellow"
    break
} 
 
Write-Host "Finished Sync to $ftp" -Foreground "Green"