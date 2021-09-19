<?php
$arrays = json_decode(file_get_contents("../source/answers.json"), true);
$msg = $_POST["inp"];
if ($_POST["ans"] == "not") {
    array_push($arrays, [
        "weeb" => false,
        "message" => $msg
    ]);
    file_put_contents('../source/answers.json', json_encode($arrays));
    header("Location: https://weebsout.herokuapp.com/");
} else {
    array_push($arrays, [
        "weeb" => true,
        "message" => $msg
    ]);
    file_put_contents('../source/answers.json', json_encode($arrays));
    header("Location: https://weebsout.herokuapp.com/");
}
