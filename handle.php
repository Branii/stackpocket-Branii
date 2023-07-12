<?php
class ExceptionHandler {
    /**
     * Summary of HandleExceptions
     * @param Throwable $th
     * @return void
     */
    public static function handleException(Throwable $th) : void {
        (int)$code = $th->getCode() ?: 500;
        http_response_code(500);
        if($code == 404){
            echo json_encode(['error' => 'Resource not found 404']);
        }else{
            //echo json_encode(['error' => 'Something went wrong']);
            echo json_encode([
                "code" => $th->getCode(),
                "file" => $th->getFile(),
                "message" => $th->getMessage(),
                "line" => $th->getLine(),
                "trace" => $th->getTrace()
            ]);
        }
    }

    
}