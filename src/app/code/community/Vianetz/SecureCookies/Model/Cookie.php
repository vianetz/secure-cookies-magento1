<?php
declare(strict_types=1);

/**
 * @section LICENSE
 * This file is created / modified by vianetz ({@link https://www.vianetz.com}).
 * The Magento extension is distributed under the GPL license.
 *
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@vianetz.com so we can send you a copy immediately.
 *
 * @license https://www.gnu.org/licenses/gpl-3.0.txt GNU GENERAL PUBLIC LICENSE
 */

/**
 * @package Vianetz_SecureCookies
 */
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
            'expires' => (int)$period === 0 ? 0 : time() + $period,
            'path' => $path ?? $this->getPath(),
            'domain' => $domain ?? $this->getDomain(),
            'secure' => $secure ?? $this->isSecure(),
            'httponly' => $httponly ?? $this->getHttponly(),
            'samesite' => $this->getSameSite(),
        ];

        $this->setCookie($name, (string)$value, $cookieOptions);

        return $this;
    }

    /**
     * @param array<string,mixed> $cookieOptions
     */
    private function setCookie(string $name, string $value, array $cookieOptions): void
    {
        if (PHP_VERSION_ID < 70300) {
            // a bit ugly but we use a bug in setcookie() method for PHP versions below 7.3 to set the samesite attribute
            $path = $cookieOptions['path'] . '; samesite=' . $cookieOptions['samesite'];
            setcookie($name, $value, $cookieOptions['expires'], $path, $cookieOptions['domain'], $cookieOptions['secure'], $cookieOptions['httponly']);
        } else {
            setcookie($name, $value, $cookieOptions);
        }
    }
}