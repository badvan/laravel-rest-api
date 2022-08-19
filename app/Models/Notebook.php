<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *   schema="Notebook",
 *   required={"Notebook"},
 *   description="Notebook model",
 *   @OA\Property(
 *       property="notebooks",
 *       type="array",
 *       @OA\Items(
 *           @OA\Property(property="full_name", type="string"),
 *           @OA\Property(property="company", type="string"),
 *           @OA\Property(property="phone", type="string"),
 *           @OA\Property(property="email", type="string"),
 *           @OA\Property(property="birthday", type="string"),
 *           @OA\Property(property="photo", type="string"),
 *       ),
 *    )
 * )
 */
class Notebook extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'company', 'phone', 'email', 'birthday', 'photo'];
}
