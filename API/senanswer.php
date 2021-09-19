<?php
$arrays = json_decode(file_get_contents("../source/answers.json"), true);
$msg = $_POST["inp"];
if ($_POST["ans"] == "not") {
    setcookie("answer", "true", time() + (86400 * 30), "/");
    array_push($arrays, [
        "weeb" => false,
        "message" => $msg
    ]);
    file_put_contents('../source/answers.json', json_encode($arrays));
    header("Location: https://weebsout.herokuapp.com/");
} else {
    setcookie("answer", "true", time() + (86400 * 30), "/");
    array_push($arrays, [
        "weeb" => true,
        "message" => $msg
    ]);
    file_put_contents('../source/answers.json', json_encode($arrays));
    header("Location: https://weebsout.herokuapp.com/");
}
