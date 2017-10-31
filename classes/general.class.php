<?php
    /** Summary General Class
     * ----------------------
     *  In this class all bass function are layend out, some
     *  cookies are still in commend for debugging. All these
     *  function are called in other classes, e.g.
     *  account.class.php.
     *
     *  All fuctions in General are called with one or two
     *  parameters, almost all must be called with $data
     *  an example of that variable you can find in the
     *  that they're called in.
     *
     *  IMPORTANT NOTE:
     *  Only open the commented code to debug it. Do not
     *  forget to commend the debug code before pushing.
     *  When pushing to the live server do not forget to
     *  change the $baseUrl.
     */
    class General
    {
        // Base function for posting to the C# API.
        public function postApi($data, $job, $secure, $token = "false")
        {
            // Encoding the received $data for the API.
            $data_json = json_encode($data);

            /*
            *  Only change this varible if the servers ip adress changes.
            *  The $job is added to the baseUrl to get the route to
            *  the API.
            */
            $baseUrl = "http://10.0.0.12:7002";
            $ch = curl_init($baseUrl.$job);

            // NOTE: Debugging code.
            //echo $baseUrl.$job;

            /*
            *  Preparing the CURL for the API call.
            *  Letting the server what data it's going to
            *  receive, JSON in this case. Also give
            *  It's a POST. Then put the JSON in the POST.
            *  And give that there will be an return.
            */
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$job);

            $header = array();
            $header[] = 'Content-type: application/json';
            if ($secure == 1) {
                $header[] = 'Authorization: '.$token;
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER,$header);

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Put the response from the API in variable.
            $response  = curl_exec($ch);

            // Close the API call.
            curl_close($ch);

            // NOTE: Debugging code.
            //echo $response;

            // End the fuction by returning the response.
            return $response;

        }

        /*
        * Base function for deleting to the C# API.
        *
        * NOTE: this function will not return anything
        * by default, it must be echo'd when debugging.
        */
        public function deleteApi($job , $secure, $token = "false") {

            /*
            *  Only change this varible if the servers ip adress changes.
            *  The $job is added to the baseUrl to select the ID that
            *  must be deleted.
            */
            $baseUrl =  "http://10.0.0.12:7002";
            $ch = curl_init($baseUrl.$job);

            /*
            *  Preparing the CURL for the API call.
            *  Letting the API known the call will be an
            *  delete. And that there will be an return.
            */
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$job);

            $header = array();
            $header[] = 'Content-type: application/json';
            if ($secure == 1) {
                $header[] = 'Authorization: '.$token;
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER,$header);

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Put the response from the API in variable.
            $response  = curl_exec($ch);

            // Close the API call.
            curl_close($ch);

            // NOTE: Debugging code.
            return $response;
        }

        /*
        * Base function for PUTting (Changes) to the C# API.
        *
        * IMPORTANT NOTE: still not sure if it workes.
        * must be tested when API is ready for it.
        * NOTE the return is not turned on(commend) yet.
        */
        public function putApi($data, $job, $secure, $token = "false")
        {
            // Encoding the received $data for the API.
            $data_json = json_encode($data);

            /*
            * Only change this varible if the servers ip adress changes.
            * Not sure if parameters must be given with $ch; the init.
            */
            $baseUrl = "http://10.0.0.12:7002";
            $ch = curl_init($baseUrl.$job);

            /*
            *  Preparing the CURL for the API call.
            *  Letting the server what data it's going to
            *  receive, JSON in this case. Also give
            *  the API the knownledge the call will be an
            *  PUT. And that there will be an return.
            */
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$job);

            $header = array();
            $header[] = 'Content-type: application/json';
            if ($secure == 1) {
                $header[] = 'Authorization: '.$token;
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER,$header);

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Put the response from the API in variable.
            $response  = curl_exec($ch);

            // Close the API call.
            curl_close($ch);

            // NOTE: Debugging code.
            //echo $response;

            // End the fuction by returning the response.
            return $response;
        }

        public function getApi($job, $secure, $token = "false") {
            /*
            *  Only change this varible if the servers ip adress changes.
            *  The $job is added to the baseUrl to get the route to
            *  the API.
            */
            $baseUrl = "http://10.0.0.12:7002";
            $ch = curl_init($baseUrl.$job);

            // NOTE: Debugging code.
            //echo $baseUrl.$job;

            /*
            *  Preparing the CURL for the API call.
            *  Letting the server what data it's going to
            *  receive, JSON in this case. Also give
            *  It's a GET.
            *  And give that there will be an return.
            */
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$job);

            $header = array();
            $header[] = 'Content-type: application/json';
            if ($secure == 1) {
                $header[] = 'Authorization: '.$token;
            }

            curl_setopt($ch, CURLOPT_HTTPHEADER,$header);

            curl_setopt($ch, CURLOPT_POST, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Put the response from the API in variable.
            $response  = curl_exec($ch);

            // Close the API call.
            curl_close($ch);

            // NOTE: Debugging code.
            //echo $response;
            //var_dump($response);
            // End the fuction by returning the response.
            return $response;
        }
    }

?>
