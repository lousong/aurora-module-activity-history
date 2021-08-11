<?php
/**
 * This code is licensed under Afterlogic Software License.
 * For full statements of the license see LICENSE file.
 */

namespace Aurora\Modules\ActivityHistory\Models;

/**
 * @license https://afterlogic.com/products/common-licensing Afterlogic Software License
 * @copyright Copyright (c) 2019, Afterlogic Corp.
 *
 * @property int $Id
 * @property int $UserId
 * @property string $ResourceType
 * @property string $ResourceId
 * @property string $IpAddress
 * @property string $Action
 * @property int $Timestamp
 * @property string $GuestPublicId
 */
class ActivityHistory extends \Aurora\System\Classes\Model
{
	protected $table = 'core_activity_history';

	protected $fillable = [
		'Id',
		'UserId',
		'ResourceType',
		'ResourceId',
		'IpAddress',
		'Action',
		'Timestamp',
		'GuestPublicId'
	];
}
