<?php
    try {
        include("../main.php");
        validateApiRequest("POST");
        $request = json_decode(file_get_contents('php://input'));
            $image = $request->image;
            $query = "INSERT INTO `packages` (`image`, `created_at`) VALUES ('$image', NOW())";
            $dbobjx->query($query);
            if ($dbobjx->execute($query)) {
                echo response("1", "SUCCESSFULLY UPLOADED", []);
            } else {
                echo response("0", "Something went wrong!", []);
            }
        $dbobjx->close();
    } catch (Exception $error) {
        echo response(0, "API ERROR!, UNPROCESSABLE ENTITY", $error->getMessage());
    }
#code ends
#mtech