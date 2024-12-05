<?php
$hashedPassword = password_hash("123", PASSWORD_BCRYPT);

if(password_verify("123",$hashedPassword))
{
    echo '密碼ok';
    echo $hashedPassword;
}
else
{
    echo '不ok';
}

?>