<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use League\Csv\Reader;
use League\Csv\Writer;
use League\Csv\Statement;

class EncryptPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:encrypt-passwords {file} {output}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Encrypt passwords in a CSV file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $csvFile = $this->argument('file');
        $updatedCsvFile = $this->argument('output');

        // Open the CSV file for reading
        if (($handle = fopen($csvFile, 'r')) !== false) {
            // Read the header line
            $header = fgetcsv($handle);

            // Prepare an array to hold the updated CSV data
            $updatedData = [];

            // Add the header to the updated data
            $updatedData[] = $header;

            // Loop through the rows
            while (($row = fgetcsv($handle)) !== false) {
                // Assuming the password is in the 12th column (index 11)
                $row[11] = password_hash($row[11], PASSWORD_BCRYPT);

                // Add the updated row to the updated data
                $updatedData[] = $row;
            }

            // Close the file
            fclose($handle);
        }

        // Open a new file for writing
        if (($handle = fopen($updatedCsvFile, 'w')) !== false) {
            // Write the updated data to the new file
            foreach ($updatedData as $row) {
                fputcsv($handle, $row);
            }

            // Close the file
            fclose($handle);

            $this->info('Passwords have been encrypted and the updated CSV file has been saved.');
        } else {
            $this->error('Failed to open the file for writing.');
        }

        return 0;
    }
}
