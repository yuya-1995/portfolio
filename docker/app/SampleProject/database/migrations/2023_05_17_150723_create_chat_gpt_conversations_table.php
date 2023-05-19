<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatGptConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_gpt_conversations', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->comment('ユニークID');
            $table->string('parent_uid')->nullable()->comment('前の会話ID');
            $table->string('child_uid')->nullable()->comment('次の会話ID');
            $table->string('topic')->comment('トピック');
            $table->text('message')->comment('メッセージ');
            $table->string('author')->comment('ユーザータイプ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_gpt_conversations');
    }
}
