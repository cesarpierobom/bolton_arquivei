<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *     schema="NFe",
 *     description="Representação de uma NFe cadastrada",
 *     title="NFe",
 *     required={"access_key", "value"},
 *     @OA\Xml(
 *         name="NFe"
 *     ),
 *     @OA\Property(
 *          property="id",
 *          type="integer",
 *          title="ID",
 *          description="ID do registro no banco de dados",
 *          example="1"
 *    ),
 *     @OA\Property(
 *          property="access_key",
 *          type="integer",
 *          title="Chave de Acesso",
 *          description="Numero de 44 digitos que corresponde Chave de acesso da NFe",
 *          example="99999999999999999999999999999999999999999999"
 *    ),
 *     @OA\Property(
 *          property="value",
 *          type="number",
 *          description="Valor da Nota",
 *          title="Valor da Nota",
 *          example="230.50"
 *    ),
 *     @OA\Property(
 *          property="created_at",
 *          type="string",
 *          format="datetime",
 *          title="Data de Cadastro",
 *          description="Data de cadastro da nota no sistema",
 *          example="2011-03-01 00:00:00"
 *    ),
 *     @OA\Property(
 *          property="updated_at",
 *          type="string",
 *          format="datetime",
 *          title="Data de Atualização",
 *          description="Data de atualizacao da nota no sistema",
 *          example="2017-03-01 00:00:00"
 *    )
 * ),
 * @OA\Schema(
 *      description="Representação de uma mensagem de erro",
 *      title="Internal Server Error",
 *      @OA\Xml(
 *          name="Error"
 *      ),
 *      schema="Error",
 *      required={"code", "message"},
 *      @OA\Property(
 *          title="Codigo",
 *          description="Codigo do erro",
 *          example="500",
 *          property="code",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          title="Mensagem de Erro",
 *          description="Mensagem de Erro",
 *          example="Internal Server Error",
 *          property="message",
 *          type="string"
 *      )
 * ),
 * @OA\Schema(
 *      description="Recurso nao encontrado.",
 *      title="Not Found",
 *      @OA\Xml(
 *          name="NotFound"
 *      ),
 *      schema="NotFound",
 *      required={"code", "message"},
 *      @OA\Property(
 *          title="Codigo",
 *          description="Codigo do Erro",
 *          example="404",
 *          property="code",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          title="Mensagem",
 *          description="Mensagem do Erro",
 *          example="Not Found",
 *          property="message",
 *          type="string"
 *      )
 * ),
 * @OA\Schema(
 *      schema="BadRequest",
 *      title="Bad Request",
 *      @OA\Xml(
 *          name="BadRequest"
 *      ),
 *      required={"code", "message"},
 *      @OA\Property(
 *          title="Codigo",
 *          description="Codigo do Erro",
 *          example="400",
 *          property="code",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          title="Mensagem",
 *          description="Mensagem do Erro",
 *          example="Bad Request",
 *          property="message",
 *          type="string"
 *      )
 * ),
 * @OA\Schema(
 *      schema="OK",
 *      title="OK",
 *      @OA\Xml(
 *          name="OK"
 *      ),
 *      required={"code", "message"},
 *      @OA\Property(
 *          title="Codigo",
 *          description="Codigo de Resultado",
 *          example="200",
 *          property="code",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          title="Mensagem",
 *          description="Mensagem",
 *          example="OK",
 *          property="message",
 *          type="string"
 *      )
 * ),
 * 
 * @OA\Schema(
 *      schema="BadGateway",
 *      title="Bad Gateway",
 *      @OA\Xml(
 *          name="BadGateway"
 *      ),
 *      required={"code", "message"},
 *      @OA\Property(
 *          title="Codigo",
 *          description="Codigo de Resultado",
 *          example="502",
 *          property="code",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          title="Mensagem",
 *          description="Mensagem",
 *          example="Bad Gateway",
 *          property="message",
 *          type="string"
 *      )
 * ),
 */
class NFe extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "nfes";

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = "id";

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;


    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = "integer";

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    // protected $dateFormat = "U";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "access_key",
        "value"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
        
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return "access_key";
    }
}
