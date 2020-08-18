<?php
declare(strict_types=1);

final class Vianetz_SecureCookies_Model_Cookie extends Mage_Core_Model_Cookie
{
    public const SAMESITE_LAX = 'Lax';
    public const SAMESITE_STRICT = 'Strict';

    public function isSecure(): bool
    {
        return $this->_getRequest()->isSecure();
    }

    public function getSameSite(): string
    {
        return $this->getStore()->isAdmin() ? self::SAMESITE_STRICT : self::SAMESITE_LAX;
    }

    /**
     * Overwrite parent method to support setting the SameSite attribute for cookies.
     *
     * @inheritDoc
     */
    public function set($name, $value, $period = null, $path = null, $domain = null, $secure = null, $httponly = null)
    {
        if (! $this->_getResponse()->canSendHeaders(false)) {
            return $this;
        }

        if ($period === true) {
            $period = 3600 * 24 * 365;
        } elseif ($period === null) {
            $period = $this->getLifetime();
        }

        $cookieOptions = [
            'expires' => $period == 0 ? 0 : time() + $period,
            'path' => $path ?? $this->getPath(),
            'domain' => $domain ?? $this->getDomain(),
            'secure' => $secure ?? $this->isSecure(),
            'httponly' => $httponly ?? $this->getHttponly(),
            'samesite' => $this->getSameSite(),
        ];

        setcookie($name, $value, $cookieOptions);

        return $this;
    }
}