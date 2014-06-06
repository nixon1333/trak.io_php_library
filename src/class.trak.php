<?php
/**
* @name Trak
* @author Ashraful Islam Nixon<nixon@ainixon.me>
*
* This class will deal with Trak.io
*/

class Trak {
    
    //insert API token for your trak.Io here
    private $trakToken;


    /**
     * constructor
     */
    public function __construct ($token)
    {
	//set the API token at the beginning
	$this->trakToken = $token;
    }
    
    /**
     * @name identify
     * @param type $id
     * @param type $name
     * @param type $email
     * @return json
     */
    public function identify($id, $name, $email)
    {
	//prepare the json data for identify users to trak.io
	$data = array(
	    'token' => $this->trakToken,
	    'data' => array(
			"distinct_id" => $id,
			"properties" => array(
						"name" => $name,
						"email" => $email,
					      )
			   )
	);
	
	$data_string = json_encode($data);                                                                                   

	//create a new cURL resource using trak.io identify url
	$ch = curl_init('https://api.trak.io/v1/identify');   
	//create a custome POST request
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");   
	//insert the json post data here
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
	//return the transfer as a string of the return value of curl_exec()
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//set the content type as json and
	//content length
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
	    'Content-Type: application/json',                                                                                
	    'Content-Length: ' . strlen($data_string))                                                                       
	);                                                                                                                   
	
	//execute curl 
	$result = curl_exec($ch);
	
	//return the output 
	return $result;
    }

    /**
     * @name trakUser
     * @param type $event
     * @param type $page
     * @return json
     */
    public function trakUser($uniqueId, $event, $page)
    {
	//prepare the json data for identify users to trak.io
	$data = array(
	    'token' => $this->trakToken,
	    'data' => array(
			"distinct_id" => $uniqueId,
			"event" => $event,
			"channel" => $page,
			"properties" => array(
					'title' => $event,
					),
			   )
	);

	$data_string = json_encode($data);                                                                                   

	//create a new cURL resource using trak.io track url
	$ch = curl_init('https://api.trak.io/v1/track'); 
	//create a custome POST request
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
	//insert the json post data here
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); 
	//return the transfer as a string of the return value of curl_exec()
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	//set the content type as json and
	//content length
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
	    'Content-Type: application/json',                                                                                
	    'Content-Length: ' . strlen($data_string))                                                                       
	);                                                                                                                   

	//execute curl 
	$result = curl_exec($ch);
	
	//return the output 
	return $result;
    }
    
    
    /**
     * @name createAlias
     * @param type $newId
     * @param type $existingId
     * @return json
     */
    public function createAlias($newId, $existingId)
    {
	//prepare the json data for identify users to trak.io
	$data = array(
		'token' => $this->trakToken,
		'data' => array(
			    "distinct_id" => $existingId,
			    "alias" => $newId

	    )); 

	$data_string = json_encode($data);                                                                                   

	//create a new cURL resource using trak.io alias url
	$ch = curl_init('https://api.trak.io/v1/alias');
	//create a custome POST request
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	//insert the json post data here
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); 
	//return the transfer as a string of the return value of curl_exec()
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	//set the content type as json and
	//content length
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
	    'Content-Type: application/json',                                                                                
	    'Content-Length: ' . strlen($data_string))                                                                       
	);                                                                                                                   

	//execute curl 
	$result = curl_exec($ch);
	
	//return the output 
	return $result;
    }

}