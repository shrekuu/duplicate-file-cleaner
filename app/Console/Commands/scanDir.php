<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\File;

class scanDir extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:scan-dir {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scan directory and save file and file path in the files table.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = $this->argument('path');
        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file) {
            File::firstOrCreate(
                ['content_hash' => md5_file("$path/$file")],
                [
                    'original_name' => $file,
                    'file_path' => "$path/$file",
                ]
            );
        }
    }
}
