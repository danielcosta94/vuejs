<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 27 Jun 2018 10:51:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Person
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Person extends Eloquent
{
	protected $table = 'persons';

	protected $fillable = [
		'name',
		'description'
	];

    public static function all_persons_info() {
        return Person::select('id', 'name', 'description')->get();
    }

    public static function person_info($id) {
        return Person::findOrFail($id, ['id', 'name', 'description']);
    }
}
