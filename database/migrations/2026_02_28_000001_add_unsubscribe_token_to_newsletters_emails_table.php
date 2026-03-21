<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddUnsubscribeTokenToNewslettersEmailsTable extends Migration
{
    public function up()
    {
        Schema::table('newsletters_emails', function (Blueprint $table) {
            $table->string('unsubscribe_token', 64)->nullable()->unique()->after('status');
        });

        // Backfill existing rows
        foreach (\App\Models\NewsletterEmail::whereNull('unsubscribe_token')->cursor() as $row) {
            $row->update(['unsubscribe_token' => Str::random(32)]);
        }
    }

    public function down()
    {
        Schema::table('newsletters_emails', function (Blueprint $table) {
            $table->dropColumn('unsubscribe_token');
        });
    }
}
