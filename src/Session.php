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
