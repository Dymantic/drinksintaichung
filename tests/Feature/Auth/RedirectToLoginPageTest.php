<?php


namespace Tests\Feature\Auth;


use Tests\TestCase;

class RedirectToLoginPageTest extends TestCase
{
    /**
     *@test
     */
    public function a_guest_will_be_redirected_to_the_login_page_when_visiting_admin_page()
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/admin/login');
    }
}