<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlaceholder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!is_dir(storage_path('app/public/application_files'))) {
            mkdir(storage_path('app/public/application_files'));
        }
        File::copy(public_path('img/placeholder.jpg'), storage_path('app/public/application_files/placeholder.jpg'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
