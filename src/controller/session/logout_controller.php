<?php
class LogoutController
{
    public function execute()
    {
        $roles = [
            '1' => 'login',
            '2' => 'login',
            '3' => 'admin'
        ];
        $userSession = new UserSession();
        $userRole = $userSession->getRoleId();
        $userSession->destroySession();
        header('Location:' . DOMAIN . $roles[$userRole]);
    }

}
