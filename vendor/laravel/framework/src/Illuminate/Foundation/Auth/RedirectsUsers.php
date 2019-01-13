<?php

namespace Illuminate\Foundation\Auth;
use Session;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        if (Session::has('login_redirect_url')) {
            return Session::get('login_redirect_url');
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}
