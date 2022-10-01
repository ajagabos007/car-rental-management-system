<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\PaymentGateway;
use App\Models\user;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->nullOnDelete();
            $table->string('transaction_reference')->unique();
            $table->integer("transaction_id")->unique()->nullable(); //transaction id from flutterwave
            $table->unsignedDecimal('amount', $precision = 19, $scale = 2);  
            $table->string('for');
            $table->string('type')->nullable(); // card, bank transfer, usdd
            $table->nullableMorphs('paymentable');
            $table->string('paymentable_url');

            $table->foreignIdFor(PaymentGateway::class)->nullable()->nullOnDelete();

            $table->string('link')->nullable();
            
            $table->string('status')->nullabe()->default('pending');
            $table->dateTime('paid_on')->nullable();

            $table->dateTime('verified_on')->nullable();
            $table->foreignId('verifier_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');

            // Compying with Generally Accepted Accounting Principles (GAAP) rules
            // We set the amount to precision 19 using 4 decimal place
            // reference https://www.mysqltutorial.org/mysql-decimal/ for more details

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
