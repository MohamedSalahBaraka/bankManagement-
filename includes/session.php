<?php
class Session
{
    private $signed_in = false;
    public $user_id;
    public $count;
    function __construct()
    {
        session_start();
        $this->vistor_count();
        $this->check_login();
    }
    private function check_login()
    {
        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }
    }
    public function vistor_count()
    {
        if (isset($_SESSION['count'])) {
            return $this->count = $_SESSION['count']++;
        } else {
            return $_SESSION['count'] = 1;
        }
    }
    public function is_signed()
    {
        return $this->signed_in;
    }
    public function login($user)
    {
        if ($user) {
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }
    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }
}
$session = new Session();
