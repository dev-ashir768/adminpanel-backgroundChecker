<?php
    try {
        include("../main.php");
        validateApiRequest("GET");
        $request = json_decode(file_get_contents('php://input'));
        extract((array) $request);
        $query = "SELECT `id`, `name`, `quantity`, `price`, `cost_price`, `status` FROM `products` WHERE `is_deleted` = '0'";
        $dbobjx->query($query);
        $return = $dbobjx->resultset();
        if (count($return) > 0 && !empty($return)) {
            echo response(1, "SUCCESSFULLY OPERATED", $return);
        } else {
            echo response(0, "NO DATA!", []);
        }
        $dbobjx->close();
    } catch (Exception $error) {
        echo response(0, "API ERROR!, UNPROCESSABLE ENTITY", $error->getMessage());
    }
#code ends
#mtech