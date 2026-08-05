<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
	/** @use HasFactory<UserFactory> */
    use HasFactory;
    
	/*Which attributes can be set during the creation*/
    protected $fillable = ["name", "description", "price", "capacity", "owner_id"];
    
    /*By default, everything is a string, so I have to present the true type*/
    protected $casts = [
    	'price' => 'decimal:2',
    	'capacity' => 'integer',
    	'validated' => 'boolean'
    ];
    
    /*Relation to user*/
    public function owner(){
    	return $this->belongsTo(User::class, 'owner_id');    
	}
	
	/*Scope to filter validated properties*/
	public function scopeValidated($query){
		return $query->where('validated', true);
	}
	
	/*Scope to filter unvalidated properties*/
	public function scopeUnvalidated($query){
		return $query->where('validated', false);
	}
}
