<?php
declare(strict_types=1);

/**
 * @method \Vianetz_SecureCookies_Model_Cookie getCookie()
 */
final class Vianetz_SecureCookies_Model_Session extends Mage_Core_Model_Session
{
    /**
     * @inheritDoc
     */
    public function start($sessionName = null)
    {
        ini_set('session.cookie_samesite', $this->getCookie()->getSameSite());

        return parent::start($sessionName);
    }
}