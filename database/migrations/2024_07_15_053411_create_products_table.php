<?php

use App\Models\Catalogue;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Catalogue::class)->constrained()->onDelete('cascade');
            $table->string('slug')->unique();
            $table->string('sku')->unique()->comment('mã sản phẩm');
            $table->string('name');
            $table->string('image')->nullable();
            $table->double('price_regular')->comment('giá bán thường');
            $table->double('price_sale')->nullable()->comment('giá bán sale');
            $table->text('description')->nullable()->comment('mô tả');
            $table->string('material')->nullable()->comment('chất liệu');
            $table->string('user_manual')->nullable()->comment('hướng dẫn sd');
            $table->text('content')->nullable()->comment('nội dung');
            $table->unsignedInteger('view')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
