Param (
    [Parameter(Mandatory = $True)]
    [SecureString] $Password
)

$ClearPassword = [System.Runtime.InteropServices.Marshal]::PtrToStringAuto([System.Runtime.InteropServices.Marshal]::SecureStringToBSTR($Password));
$ProjectName = (Get-Item $PSScriptRoot).Parent.Parent.Parent.Name

$CaCrt = Join-Path -Path $PSScriptRoot -ChildPath "root.crt"
$CaCnf = Join-Path -Path $PSScriptRoot -ChildPath "root.cnf"
$CaKey = Join-Path -Path $PSScriptRoot -ChildPath "root.key"
$ProjectCrt = Join-Path -Path $PSScriptRoot -ChildPath "$ProjectName.crt"
$ProjectCnf = Join-Path -Path $PSScriptRoot -ChildPath "$ProjectName.cnf"
$ProjectCsr = Join-Path -Path $PSScriptRoot -ChildPath "$ProjectName.csr"
$ProjectKey = Join-Path -Path $PSScriptRoot -ChildPath "$ProjectName.key"

If ((-Not (Test-Path -Path $CaCrt)) -And (-Not (Test-Path -Path $CaKey))) {
    Write-Host "Creating CA certificate & private key..." -ForegroundColor "Cyan"
    openssl req -config $CaCnf -days 365 -keyout $CaKey -new -out $CaCrt -passout pass:$ClearPassword -x509
} Else {
    Write-Host "CA certificate & private key already exist." -ForegroundColor "Cyan"
}

Write-Host "Creating server certificate & private key..." -ForegroundColor "Cyan"
openssl req -config $ProjectCnf -days 365 -keyout $ProjectKey -new -nodes -out $ProjectCsr

Write-Host "Signing with CA..." -ForegroundColor "Cyan"
openssl x509 -CA $CaCrt -CAkey $CaKey -extensions x509_ext -extfile $ProjectCnf -in $ProjectCsr -out $ProjectCrt -passin pass:$ClearPassword -req -set_serial (Get-Random)
