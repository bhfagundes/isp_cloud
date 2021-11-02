<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Clientes",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="razao_social",
 *          description="razao_social",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cpf_cnpj",
 *          description="cpf_cnpj",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="descricao",
 *          description="descricao",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telefone",
 *          description="telefone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="situacao_contrato",
 *          description="situacao_contrato",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Clientes extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'clientes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'razao_social',
        'cpf_cnpj',
        'email',
        'descricao',
        'telefone',
        'situacao_contrato'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'razao_social' => 'string',
        'cpf_cnpj' => 'string',
        'email' => 'string',
        'descricao' => 'string',
        'telefone' => 'string',
        'situacao_contrato' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'razao_social' => 'nullable|string|max:255',
        'cpf_cnpj' => 'nullable|string|max:17',
        'email' => 'nullable|string|max:255',
        'descricao' => 'nullable|string|max:255',
        'telefone' => 'nullable|string|max:15',
        'situacao_contrato' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
