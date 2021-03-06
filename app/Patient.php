<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    //
    protected $fillable = [
        'user_id',
        'type',
        'slug',
        'idno',
        'name',
        'age'  ,
        'sex',
        'status',
        'address',
        'date_birth',
        'weight',
        'height',
        'course',
        'year',
        'religion',
        'work',
        'name2',
        'contact',
        'address2',
        'allergies',
        'illness',
        'medics',
        'hospital'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   public function getRouteKeyName()
   {
       return 'slug';
   }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($patient) {
            $patient->update(['slug' => $patient->type]);
        });
    }

/**
     * Set the proper slug attribute
     *
     * @param string $value
     */
    public function setSlugAttribute($value)
    {
        if (static::whereSlug($slug = str_slug($value))->exists()) {
            $slug = "{$slug}-{$this->id}";
        }
        $this->attributes['slug'] = $slug;
    }


    public function getImageUrlAttribute($value){

        $imageUrl="";

        if(! is_null($this->image)){

            $imagePath= public_path() . "/img/" . $this->image;

            if(file_exists($imagePath))  $imageUrl = asset("img/" . $this->image);

        }

        return   $imageUrl;
    }

    public function histories()
    {
        return $this->belongsToMany(History::class,'history_patient','patient_id', 'history_id');
    }
    public function immunizations()
    {
        return $this->belongsToMany(Immunization::class,'immunize_patient','patient_id', 'immunize_id');
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

     public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function dental()
    {
        return $this->hasMany(Dental::class);
    }
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }

    public function teeths()
    {
        return $this->belongsToMany(Teeth::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
