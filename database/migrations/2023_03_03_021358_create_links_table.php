<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('links', function (Blueprint $table): void {
            $table->foreignUlid('project_id')->index()->constrained()->cascadeOnDelete();
            $table->string('name');

//            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    public function down()
    {
        Schema::dropIfExists('links');
    }
};
