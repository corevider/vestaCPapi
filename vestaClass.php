<?php

class vestaClass
{
    
    // basic
    
    protected $vst_hostname;
    protected $vst_port;
    protected $vst_username;
    protected $vst_password;
    protected $vst_returncode;
    
    // User settings
    
    protected $username;
    protected $password;
    protected $email;
    protected $fist_name;
    protected $last_name;
    
    // end user settings
    // For make database
    
    protected $db_name;
    protected $db_user;
    protected $db_pass;
    
    // Package
    
    protected $package;
    
    // making domain
    
    protected $domain;
    
    // https://vestacp.com/docs/api/
    
    public function makeDatabase($vst_hostname, $vst_port, $vst_username, $vst_password, $username, $vst_returncode, $db_name, $db_user, $db_pass)
    {
        $vst_command = 'v-add-database';
        
        // Prepare POST query
        
        $postvars = array(
            'user' => $vst_username,
            'password' => $vst_password,
            'returncode' => $vst_returncode,
            'cmd' => $vst_command,
            'arg1' => $username,
            'arg2' => $db_name,
            'arg3' => $db_user,
            'arg4' => $db_pass
        );
        $postdata = http_build_query($postvars);
        
        // Send POST query via cURL
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':'.$vst_port.'/api/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        $answer = curl_exec($curl);
        
        // Check result
        
        if ($answer == 0) {
            return "Database has been successfuly created\n";
        } else {
            return "Query returned error code: " . $answer . "\n";
        }
    }
    
    public function makeUser($vst_hostname, $vst_port, $vst_username, $vst_password, $username, $vst_returncode, $password, $email, $fist_name, $last_name, $package)
    {
        
        // Server credentials
        
        $vst_command = 'v-add-user';
        
        // Prepare POST query
        
        $postvars = array(
            'user' => $vst_username,
            'password' => $vst_password,
            'returncode' => $vst_returncode,
            'cmd' => $vst_command,
            'arg1' => $username,
            'arg2' => $password,
            'arg3' => $email,
            'arg4' => $package,
            'arg5' => $fist_name,
            'arg6' => $last_name
        );
        $postdata = http_build_query($postvars);
        
        // Send POST query via cURL
        
        $postdata = http_build_query($postvars);
        $curl     = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':'.$vst_port.'/api/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        $answer = curl_exec($curl);
        
        // Check result
        
        if ($answer == 0) {
            return "User account has been successfuly created\n";
        } else {
            return "Query returned error code: " . $answer . "\n";
        }
    }
    
    public function makeWebDNSMail($vst_hostname, $vst_port, $vst_username, $vst_password, $username, $vst_returncode, $domain)
    {
        
        // Server credentials
        
        $vst_command = 'v-add-domain';
        
        // Prepare POST query
        
        $postvars = array(
            'user' => $vst_username,
            'password' => $vst_password,
            'returncode' => $vst_returncode,
            'cmd' => $vst_command,
            'arg1' => $username,
            'arg2' => $domain
        );
        $postdata = http_build_query($postvars);
        
        // Send POST query via cURL
        
        $postdata = http_build_query($postvars);
        $curl     = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':'.$vst_port.'/api/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        $answer = curl_exec($curl);
        
        // Check result
        
        if ($answer == 0) {
            return "Domain has been successfuly created\n";
        } else {
            return "Query returned error code: " . $answer . "\n";
        }
    }
        public function getUserFromServer($vst_hostname, $vst_port, $vst_username, $vst_password, $username)
    {
        $vst_command = 'v-list-user';
		$format = 'json';
        // Prepare POST query
        
        $postvars = array(
            'user' => $vst_username,
            'password' => $vst_password,
            'cmd' => $vst_command,
            'arg1' => $username,
            'arg2' => $format
        );
        $postdata = http_build_query($postvars);
        
        // Send POST query via cURL
        
        $postdata = http_build_query($postvars);
        $curl     = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':'.$vst_port.'/api/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        $answer = curl_exec($curl);
        
        // Parse JSON output
        
        $data = json_decode($answer, true);
        
        // Print result
        
        return ($data);
    }
    
	public function getUsersFromServer($vst_hostname, $vst_port, $vst_username, $vst_password)
    {
        $vst_command = 'v-list-users';
		$format = 'json';
        // Prepare POST query
        
        $postvars = array(
            'user' => $vst_username,
            'password' => $vst_password,
            'cmd' => $vst_command,
            'arg1' => $format
        );
        $postdata = http_build_query($postvars);
        
        // Send POST query via cURL
        
        $postdata = http_build_query($postvars);
        $curl     = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':'.$vst_port.'/api/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        $answer = curl_exec($curl);
        
        // Parse JSON output
        
        $data = json_decode($answer, true);
        
        // Print result
        
        return ($data);
    }
    
    public function deleteUser($vst_hostname, $vst_port, $vst_username, $vst_password, $username, $vst_returncode)
    {
        $vst_command = 'v-delete-user';
        // Prepare POST query
        
        $postvars = array(
            'user' => $vst_username,
            'password' => $vst_password,
            'returncode' => $vst_returncode,
            'cmd' => $vst_command,
            'arg1' => $username
        );
        $postdata = http_build_query($postvars);
        
        // Send POST query via cURL
        
        $postdata = http_build_query($postvars);
        $curl     = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':'.$vst_port.'/api/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        $answer = curl_exec($curl);
        
        // Check result
        
        if ($answer == 0) {
            echo "User account has been successfuly deleted\n";
        } else {
            echo "Query returned error code: " . $answer . "\n";
        }
    }
}
?> 