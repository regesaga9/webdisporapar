# scan_backdoor.ps1
$targetPath = "C:\xampp\htdocs\web"   # Ganti ke lokasi folder WordPress
$logFile = "$targetPath\hasil_scan_backdoor.txt"

# Pola yang dianggap berbahaya
$patterns = "wp_set_auth_cookie","WP_User_Query","base64_decode","eval","gzinflate","shell_exec","passthru"

# Hapus log lama kalau ada
if (Test-Path $logFile) {
    Remove-Item $logFile -Force
}

Get-ChildItem -Recurse -Include *.php -Path $targetPath | ForEach-Object {
    $file = $_.FullName
    $content = Get-Content $file -ErrorAction SilentlyContinue

    foreach ($pattern in $patterns) {
        if ($content -match $pattern) {
            $message = "Pola '$pattern' terdeteksi di file: $file"
            Add-Content -Path $logFile -Value $message
            break   # cukup sekali catat walau ada banyak pola
        }
    }
}

Write-Host "Scan selesai. Lihat hasil di: $logFile"
