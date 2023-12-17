<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;


    protected $fillable = ['containerNumber', 'line_id', 'port_id', 'status_id', 'dateStart', 'datePort', 'dateStorage', 'dateEnd', 'containerGoods', 'containerWeight', 'note1', 'note2', 'destination', 'dateOver', 'dateUkraine', 'expeditor_id', 'client_id'];
    

    public function client()
    {
      return $this->belongsTo(client::class, 'client_id', 'id');
    }
    
    public function expeditor()
    {
      return $this->belongsTo(expeditor::class, 'expeditor_id', 'id');
    }
  
    public function port()
    {
      return $this->belongsTo(port::class, 'port_id', 'id');
    }

    public function line()
    {
      return $this->belongsTo(line::class, 'line_id', 'id');
    }

    public function status()
    {
      return $this->belongsTo(status::class, 'status_id', 'id');
    }

}
