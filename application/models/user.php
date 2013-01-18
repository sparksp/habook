<?php

class User extends Eloquent {

    public function set_password($value)
    {
        $this->set_attribute('password', Hash::make($value));
    }

}
