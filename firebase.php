<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* - select()
* - update()
* - delete()
* Classes list:
* - firebase 

* Set Rule  <project>.firebase.io/api/<user>
############
  {
  "rules": {
    "api":{
      "$user": {
        ".read": true, 
        ".write": true,
      }
      },
      ".read":false, 
        ".write":false 
    }
  }
############
*/
class firebase
{
    public $url = '';
    function __construct($name)
    {
        $this->url = $name;
    }
    function select($node ='/')
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->url. $node. '.json');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, true);
        return $response;
    }
    function update($node ='/', $json)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->url. $node. '.json');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, true);
        return $response;
    }
    function delete($node)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->url. $node. '.json');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, true);
        return $response;
    }
}

?>