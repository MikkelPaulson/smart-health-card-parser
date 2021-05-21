<?php
require_once(__DIR__.'/vendor/autoload.php');

use Jose\Component\Signature\Serializer\JWSSerializerManager;
use Jose\Component\Signature\Serializer\CompactSerializer;

$input_raw = file_get_contents('php://stdin');
$input_token = implode(
    '',
    array_map(
        function ($ord) { return chr($ord + 45); },
        str_split(preg_replace('/[^0-9]+/', '', $input_raw), 2)
    )
);

$serializerManager = new JWSSerializerManager([
    new CompactSerializer(),
]);
$jws = $serializerManager->unserialize($input_token);

echo "Header:\n";
echo json_encode($jws->getSignature(0)->getProtectedHeader(), JSON_PRETTY_PRINT);

echo "\n\nBody:\n";
echo json_encode(json_decode(gzinflate($jws->getPayload())), JSON_PRETTY_PRINT);
echo "\n";
