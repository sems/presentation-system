<?php
    /**
     *
     */
    class General
    {
        // Base function for posting
        public function postApi($data, $job)
        {
            // NOTE: Het format van $data is te vinden bij een subtask
            // Graag ook houden aan de indentatie en inhoud anders kan er een fout ontstaan.

            $data_json = json_encode($data);

            // NOTE: Only change this line if the servers ip adress changes'
            // But only,
            $baseUrl = "http://localhost:63502";
            $ch = curl_init($baseUrl.$job);

            // Test if the url is correct
            //echo $baseUrl.$job;
            
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$job);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response  = curl_exec($ch);

            curl_close($ch);
            //return $response;
            echo $response;
        }

        public function accountAanmaken($data) {
            // NOTE: Op deze manier moet de data mee gegeven worden aan een post van de api
            // Graag ook op deze manier schrijven, inclusief the inditatiesl
            /*
                $data = array(
                    'Name' => $_POST['b_name'],
                    'Email' => $_POST['b_email'],
                    'Password' => $_POST['b_password']
                );
            */
            General::postApi($data, "/api/account/create");
        }
        public function accountLogin($data) {
            /*
                $data = array(
                    'Email' => $_POST['l_email'],
                    'Password' => $_POST['l_password']
                );
            */
            General::postApi($data, "/api/account/login");
            return $response;
        }
    }

?>
