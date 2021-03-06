<?php

/*
 * This file is part of Piplin.
 *
 * Copyright (C) 2016-2017 piplin.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Piplin\Validators;

/**
 * Class for validating server hostnames & IP addresses.
 */
class HostValidator
{
    /**
     * Validate that the host is either a hostname or IP valid.
     *
     * @param  string $attribute
     * @param  mixed  $value
     * @param  mixed  $parameters
     * @return bool
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function validate($attribute, $value, $parameters)
    {
        if (filter_var($value, FILTER_VALIDATE_IP)) {
            return true;
        }

        if (filter_var(gethostbyname($value), FILTER_VALIDATE_IP)) {
            return true;
        }

        return false;
    }
}
