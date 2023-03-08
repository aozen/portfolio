<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('project_tag', function (Blueprint $table): void {
            $table->foreignUlid('project_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignUlid('tag_id')->index()->constrained()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_tag');
    }
};
