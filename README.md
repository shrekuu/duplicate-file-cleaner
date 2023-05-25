# Duplicate File Cleaner

I use this app to help me remove duplicates when I organize my photos and videos.

## NOT ready yet. DO NOT USE.

## How To Use

### Step 1

Create a database and run db migration.

  ```bash
  php artisan migrate:fresh
  ```

### Step 2

Record all the files in the files table. Replace the path with your own. This will take some time since it will scan all the files in the directory and sub-directories, and get some info from every file.

  ```bash
  php artisan app:scan-dir /Volumes/DATA-TRAVELER-4T/all-videos
  ```

### Step 3

Move unique files into another folder. Replace the path with your own. Use the same hard disk to avoid moving files between hard disks, which may take too much time.

  ```bash
  php artisan app:relocate-files /Volumes/DATA-TRAVELER-4T/all-videos
  ```
