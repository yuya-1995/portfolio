<?php

namespace App\Console\Commands;

use App\Models\ChatGptConversation;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ImportChatGptConversations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:chatgpt {file?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ChatGPTからエクスポートした会話データをインポートする';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $file_path = $this->argument('file');

        if(is_null($file_path)) { // ファイル指定がないときはデフォルトのファイルを読み込む

            $file_path = storage_path('app/json/conversations.json');

        }

        if (! file_exists($file_path)) {

            $this->error('File not found: ' . $file_path);
            return Command::FAILURE;

        }

        // 会話データを全削除
        ChatGptConversation::truncate();

        // ファイルから会話データを読み込む
        $json_data = file_get_contents($file_path);
        $conversations = json_decode($json_data, true);

        if (! is_array($conversations) || count($conversations) === 0) {

            $this->error('Invalid file: '. $file_path);
            return Command::FAILURE;

        }

        foreach ($conversations as $conversation) {

            $topic = $conversation['title'];
            $mapping = $conversation['mapping'];

            foreach ($mapping as $mapping_item) {

                $uid = data_get($mapping_item, 'id');
                $parent_uid = data_get($mapping_item, 'parent');
                $child_uid = data_get($mapping_item, 'children.0');

                $content_type = data_get($mapping_item, 'message.content.content_type', '');
                $message = data_get($mapping_item, 'message.content.parts.0', '');

                if($content_type === 'text' && $message !== '') {

                    $author = data_get($mapping_item, 'message.author.role');
                    $created_time = data_get($mapping_item, 'message.create_time');
                    $updated_time = data_get($mapping_item, 'message.update_time');

                    $conversation = new ChatGptConversation([
                        'uid' => $uid,
                        'topic' => $topic,
                        'message' => $message,
                        'author' => $author,
                        'parent_uid' => $parent_uid,
                        'child_uid' => $child_uid,
                        'created_at' => $created_time,
                        'updated_at' => $updated_time,
                    ]);
                    $conversation->save();

                }

            }

        }

        $this->info('Imported ' . count($conversations) . ' conversations.');

        return Command::SUCCESS;
    }
}
