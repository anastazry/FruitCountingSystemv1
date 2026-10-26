param(
    [int]$Port = 8085,
    [string]$PhpPath
)

$ErrorActionPreference = 'Stop'
$projectRoot = Split-Path -Parent $PSScriptRoot
Set-Location -LiteralPath $projectRoot

if (!$PhpPath) {
    $phpCommand = Get-Command php -ErrorAction SilentlyContinue
    if ($phpCommand) {
        $PhpPath = $phpCommand.Source
    } else {
        $PhpPath = Get-ChildItem 'C:\laragon\bin\php\*\php.exe' -ErrorAction SilentlyContinue |
            Sort-Object FullName -Descending | Select-Object -First 1 -ExpandProperty FullName
    }
}
if (!$PhpPath -or !(Test-Path -LiteralPath $PhpPath)) {
    throw 'PHP 8.2+ is required. Pass -PhpPath with the path to php.exe.'
}
if (!(Test-Path vendor/autoload.php) -or !(Test-Path public/build/manifest.json)) {
    throw 'Install dependencies and build assets first. See README.md.'
}

$phpArgs = @()
$opcachePath = Join-Path (Split-Path -Parent $PhpPath) 'ext\php_opcache.dll'
$opcacheLoaded = (& $PhpPath -m) -contains 'Zend OPcache'
if (!$opcacheLoaded -and (Test-Path -LiteralPath $opcachePath)) {
    $phpArgs += @('-d', "zend_extension=$opcachePath")
}
# Keep source edits visible immediately; settings apply only to this server.
$phpArgs += @('-d', 'opcache.enable=1', '-d', 'opcache.enable_cli=1',
    '-d', 'opcache.validate_timestamps=1', '-d', 'opcache.revalidate_freq=0',
    '-d', 'opcache.memory_consumption=128')
$PhpPath = (Resolve-Path -LiteralPath $PhpPath).Path
$routerPath = Join-Path $projectRoot 'vendor/laravel/framework/src/Illuminate/Foundation/resources/server.php'
Set-Location -LiteralPath (Join-Path $projectRoot 'public')
Write-Host "Serving http://127.0.0.1:$Port (Ctrl+C to stop)"
& $PhpPath @phpArgs -S "127.0.0.1:$Port" -t . $routerPath
exit $LASTEXITCODE
