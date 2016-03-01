<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model 
{
	protected $fillable = ['user_id','file_name','file_size','file_mime','file_path','created_by'];
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
