<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->float('totalPayer');
            $table->float('totalDette');
            $table->float('revenus');
            $table->float('depense');
            $table->decimal('profit', 15, 3);
            $table->decimal('profitNet', 15, 3);
            $table->decimal('RR', 5, 2);
            $table->float('ROI');
            $table->decimal('revenueNet', 15, 3);
            $table->float('sommeTotal');
            $table->double('sommeProduit');
            $table->double('sommePret');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};
