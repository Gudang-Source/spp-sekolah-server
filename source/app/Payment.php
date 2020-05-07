<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * Nama table yang digunakan
     */
    protected $table = 'payments';

    /**
     * Kolom yang dapat di isi
     */
    protected $fillable = [
        "student_id",
        "financing_category_id", 
        "jenis_pembayaran", 
        "persentase",
    ];

    /**
     * Relasi One to Many
     */
    public function paymentDetail()
    {
        return $this->hasMany('App\PaymentDetail');
    }

    public function paymentPeriode()
    {
        return $this->hasMany('App\PaymentPeriodeDetail');
    }

    /**
     * Relasi Many to Many
     */
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
 
    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }

    public function category()
    {
        return $this->belongsTo('App\FinancingCategory', 'financing_category_id');
    }
}
