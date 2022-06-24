<?php
class LogoutController
{
    public function execute()
    {
        $userSession = new UserSession();
        $userSession->destroySession();
        header('Location:' . DOMAIN .'admin');
    }

}
