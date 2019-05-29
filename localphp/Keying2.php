<?php
function Keying($json_data)
{
    include "Keying.php";
    $value = $_POST['value'];

    $p_Server = $value['p_Server'];
    $q_Server = $value['q_Server'];
    $Public_Key_Client = $value['Public_Key_Client'];
    $Public_Key_Server = $value['Public_Key_Server'];
    $Private_Key_Server = $value['Private_Key_Server'];

    $Encrypted_Session_Key = $json_data['Encrypted_Session_Key'];

    $n_Server = getN($p_Server, $q_Server);

    $decryptedKey = decrypt($Private_Key_Server, $n_Server, $Encrypted_Session_Key); //decrypt

    $confirm = 1;

    $Keying = array(
        'confirm' => $confirm,
        'encryptedKey' => $Encrypted_Session_Key,
        'decryptedKey' => $decryptedKey
    );

    echo json_encode($Keying);
}
?>