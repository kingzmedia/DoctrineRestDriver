<?php
/**
 * This file is part of DoctrineRestDriver.
 *
 * DoctrineRestDriver is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * DoctrineRestDriver is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with DoctrineRestDriver.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Circle\DoctrineRestDriver\Types;

use Circle\DoctrineRestDriver\Validation\Assertions;

/**
 * RestClientOptions type
 *
 * @author    Tobias Hauck <tobias@circle.ai>
 * @copyright 2015 TeeAge-Beatz UG
 */
class RestClientOptions extends \ArrayObject {

    /**
     * Request constructor
     *
     * @param array $options
     *
     * @SuppressWarnings("PHPMD.StaticAccess")
     */
    public function __construct(array $options) {
        Assertions::assertHashMap('params', $options);
        Assertions::assertHashMapEntryExists('params', $options, 'driverOptions');
        Assertions::assertHashMap('params["driverOptions"]', $options['driverOptions']);

        parent::__construct((array) new CurlOptions($options['driverOptions']));
    }
}