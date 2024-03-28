<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;


class AuthControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_registring_without_filling_details_gives_validation_error()
    {
        $response = $this->post('/create_user');
        $response->assertStatus(412);

        // dd(json_decode($response->getContent()));
        $response->assertJsonPath('email', 'The email field is required.');
        $response->assertJsonPath('password', 'The password field is required.');
    }

    public function test_registring_without_email_and_password_details_gives_validation_error()
    {
        $response = $this->post('/create_user', [
            'fullname' => 'Palak22'
        ]);
        $response->assertStatus(412);

        $response->assertJsonPath('email', 'The email field is required.');
        $response->assertJsonPath('password', 'The password field is required.');
        $response->assertJsonMissingPath('fullname');
    }

    // public function test_registring_without_password_details_gives_validation_error()
    // {
    //     $response = $this->post('/create_user', [
    //         'fullname' => 'Palak22',
    //         'email' => 'test@test.com',
    //     ]);
    //     $response->assertStatus(412);

    //     $response->assertJsonPath('password', 'The password field is required.');
    //     $response->assertJsonMissingPath('fullname');
    //     $response->assertJsonMissingPath('email');

    // }

public function test_registring_without_email_details_gives_validation_error()
{
    $response = $this->post('/create_user');
    $response->assertStatus(412);

    $response->assertJsonPath('email', 'The email field is required.');
}

// public function test_registring_with_all_details_gives_validation_error()
// {
//     $response = $this->post('/create_user', [
//         'fullname' => 'test24',
//         'email' => 'test@test.com',
//         'password' => 'Password@1'
//     ]);
//     $response->assertStatus(200);
//     $response->assertJsonPath('success', 'you have been successfully registered.');
// }

// public function test_registring_with_already_registered_email_gives_validation_error()
// {
//     $response = $this->post('/create_user', [
//         'fullname' => 'test24',
//         'email' => 'test@test.com',
//         'password' => 'Password@1'
//     ]);
//     $response->assertStatus(200);
//     // $response->assertJsonPath('success', 'you have been successfully registered.');

//     $response = $this->post('/create_user', [
//         'fullname' => 'test24',
//         'email' => 'test@test.com',
//         'password' => 'Password@1'
//     ]);
//     $response->assertStatus(412);

//     $response->assertJsonPath('email', 'The email has already been taken.');
// }


public function test_login_without_filling_details_gives_validation_error()
{
    $response = $this->post('/auth_login');
    $response->assertStatus(412);

    // dd(json_decode($response->getContent()));
    $response->assertJsonPath('email', 'The email field is required.');
    $response->assertJsonPath('password', 'The password field is required.');
}

public function test_login_without_password_details_gives_validation_error()
    {
        $response = $this->post('/auth_login', [
            'email' => 'test@test.com'
        ]);
        $response->assertStatus(412);

        //  dd(json_decode($response->getContent()));
        $response->assertJsonPath('password', 'The password field is required.');
        $response->assertJsonMissingPath('email');

        // $response->assertJsonMissingPath('email');
    }

    public function test_login_without_email_details_gives_validation_error()
    {
        $response = $this->post('/auth_login', ['password' => 'Password@2']);
        $response->assertStatus(412);

        //  dd(json_decode($response->getContent()));
        $response->assertJsonPath('email', 'The email field is required.');
        $response->assertJsonMissingPath('password');

        // $response->assertJsonMissingPath('email');
    }


    public function test_login_with_wrong_email_details_gives_validation_error()
    {
        $response = $this->post('/auth_login', [
            'email' => 'te@ts.com', 
            'password' => 'edrftgyhujikol']);
              $response->assertStatus(400);
    }


    public function test_login_with_registered_email_and_password_gives_validation_error()
    {
        $response = $this->post('/create_user', [
                    'fullname' => 'test24',
                    'email' => 'test23@test.com',
                    'password' => 'Password@1'
                ]);
                $response->assertStatus(200);

        $this->assertDatabaseHas('users', ['email' =>'test23@test.com']);

        $response = $this->post('/auth_login',[
                     'email' => 'test23@test.com',
                    'password' => 'Password@1'
                ]);  
                $response->assertStatus(200);
            // $response->assertJsonPath('success', 'you have been successfully registered.');
    }






 
}