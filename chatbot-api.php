<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$api_key = "AIzaSyD0SX_E7kIrPFN07lDTjVwTPskkg-dUxTo";

$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$api_key}";

$body = file_get_contents('php://input');

// decode the json data
$decoded = json_decode($body, true);

// check if the json data is not empty
if (empty($decoded)) {
    echo json_encode(
        array(
            "error" => "Invalid data."
        )
    );
    exit;
}

// check if the message is not empty

if (empty($decoded['message'])) {
    echo json_encode(
        array(
            "error" => "Message is required."
        )
    );
    exit;
}

$data = array(
    "contents" => array(

        array(
            "role" => "user",
            "parts" => array(
                array(
                    "text" => "คุณคือแพทย์ผู้เชี่ยวชาญด้านโรคประสาทและสมองเพียงแค่คำถามที่เกี่ยวข้องกับโรคประสาทและสมองและการวินิจฉัยเท่านั้นคุณจะไม่ตอบอย่างอื่นนอกจากนั้นหากผู้ใช้ถามอย่างอื่นนอกเหนือจากที่คุณรู้ให้คุณตอบว่า ขออภัยฉันคือผู้เชี่ยวชาญด้านโรคประสาทและสมองไม่สามารถตอบคำถามอื่นๆได้"
                )
            )
        ),
        array(
            "role" => "model",
            "parts" => array(
                array(
                    "text" => "รับทราบฉันจะไม่ลืม"
                )
            )
        ), array(
            "role" => "user",
            "parts" => array(
                array(
                    "text" => $decoded['message']
                )
            )
        ),
    )
);


$json_data = json_encode($data);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

curl_close($ch);


if ($response) {

    echo $response;
} else {

    echo json_encode(
        array(
            "error" => "An error occurred while processing your request."
        )
    );
}