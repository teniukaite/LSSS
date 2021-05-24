<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'id',
        'order_date',
        'price',
        'comment',
        'fk_client_id',
        'fk_freelancer_id',
        'fk_project_id',
        'fk_service_id',
    ];
    public function offers()
    {
        return $this->hasOne(Offers::class);
    }

}
