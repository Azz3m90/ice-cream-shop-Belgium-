<?php

    // Get user input
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];
    //$input_username = 'username';
    //$input_password = '123';
    // Read the JSON file with admin data
    $json_data = file_get_contents('../../data/user.json');
    $data = json_decode($json_data, true);
    //var_dump($data);
    if ($data !== null) {
        // Check if the input matches the admin data
        foreach ($data['admins'] as $admin) {
            if ($input_username === $admin['username'] && $input_password === $admin['password']) {
                // Successful login, redirect to the admin panel
                $response = array('status' => 'success', 'message' => 'Login Successful');
                echo json_encode($response);
                exit();
            }else{
            // If the login fails, send an error response
            $response = array('status' => 'error', 'message' => 'Invalid username or password. Please try again.');
            echo json_encode($response);
            }
        }
    }else{
    // If the login fails, send an error response
    $response = array('status' => 'error', 'message' => 'Invalid username or password. Please try again.');
    echo json_encode($response);
    }
?>