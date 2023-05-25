<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class relocateFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:relocate-files {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Move all the files in files table to the provided directory.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = $this->argument('path');
        $files = \App\Models\File::all();

        foreach ($files as $file) {
            if (file_exists($file->file_path)) {
                // echo "Moving $file->file_path to $path\n";
                $ext = pathinfo($file->file_path, PATHINFO_EXTENSION);
                $from = "$file->file_path";
                $to = $path . '/' . $file->original_name;
                
                echo "mv '" . $from .  "' '". $to . "'" . "\n";
                exec("mv '" . $from . "' '" . $to . "'");
                

                
                Storage::move($from, $to);
            }
        }
    }
}
