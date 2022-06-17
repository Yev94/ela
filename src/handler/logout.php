<?php
class Logout
{
    public function execute()
    {
        $userSession = new UserSession();
        $userSession->destroySession();
        header('Location: /ela/admin');
    }

}
