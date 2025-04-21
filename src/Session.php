<?php

namespace Flowaxy;

use Flowaxy\Cookie;

/**
 * Class Session
 *
 * A lightweight and convenient PHP session manager for Flowaxy-based projects.
 * Supports secure cookie settings, easy API, and optional integration with Flowaxy\Cookie.
 *
 * ✅ Features:
 * - Secure and simple session start
 * - `set()`, `get()`, `remove()`, and `destroy()` methods
 * - Namespaced session keys to avoid collision
 * - PHP 8.2+ compatible
 *
 * @package Flowaxy
 */

class Session
{
    /**
     * Indicates whether the session has started.
     *
     * @var bool
     */

    private static bool $started = false;

    /**
     * The name of the session cookie.
     *
     * @var string
     */

    private static string $sessionName = 'FLOWAXY_SESSION';

    /**
     * Starts the session with secure cookie parameters.
     *
     * @param string $path   The path on the server in which the cookie will be available.
     * @param bool   $secure Whether to only send the cookie over HTTPS.
     */

    public static function start(string $path = '/', bool $secure = false): void
    {
        // Set session lifetime to 1 hour
        ini_set('session.gc_maxlifetime', 3600);

        $cookieParams = session_get_cookie_params();

        session_set_cookie_params([
            'lifetime' => $cookieParams["lifetime"],
            'path' => $path,
            'domain' => $cookieParams["domain"],
            'secure' => $secure,
            'httponly' => true
        ]);

        session_name(self::$sessionName);
        self::$started = session_start();
    }

    /**
     * Checks if the session has already started.
     *
     * @return bool
     */

    public static function started(): bool
    {
        return self::$started;
    }

    /**
     * Destroys the current session and unsets all session and cookie data.
     *
     * @return bool Returns true if the session was destroyed successfully.
     */

    public static function destroy(): bool
    {
        session_destroy();
        unset($_SESSION);
        unset($_COOKIE[self::$sessionName]);

        // Also remove via Flowaxy\Cookie, if available
        if (class_exists(Cookie::class)) {
            Cookie::set(self::$sessionName, '', -1);
        }

        self::$started = false;
        return !isset($_SESSION);
    }

    /**
     * Sets a session variable.
     *
     * @param string $key   The key name (will be prefixed internally).
     * @param mixed  $value The value to store.
     */

    public static function set(string $key, mixed $value): void
    {
        $_SESSION['s_' . $key] = $value;
    }

    /**
     * Retrieves a session variable.
     *
     * @param string $key The key name (without prefix).
     * @return mixed Returns the stored value or false if not set.
     */

    public static function get(string $key): mixed
    {
        return $_SESSION['s_' . $key] ?? false;
    }

    /**
     * Removes a session variable.
     *
     * @param string $key The key name (without prefix).
     */

    public static function remove(string $key): void
    {
        unset($_SESSION['s_' . $key]);
    }
}
