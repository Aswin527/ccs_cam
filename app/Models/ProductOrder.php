<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class ProductOrder extends Model
    {
        use HasFactory;
        // protected $fillable=[
        //     'name', 'email','mobile','location','message','gst','drug','about','status'
        // ];
        protected $table = 'order_product';
    
    }
    
?>