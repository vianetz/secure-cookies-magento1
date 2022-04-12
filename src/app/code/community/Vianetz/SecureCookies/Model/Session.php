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
 * @method \Vianetz_SecureCookies_Model_Cookie getCookie()
 */
class Vianetz_SecureCookies_Model_Session extends Mage_Core_Model_Session
{
    /**
     * @inheritDoc
     */
    public function start($sessionName = null)
    {
        // We use ini_set() here to avoid copying the whole method only to adjust the cookie parameters
        ini_set('session.cookie_samesite', $this->getCookie()->getSameSite());

        return parent::start($sessionName);
    }
}