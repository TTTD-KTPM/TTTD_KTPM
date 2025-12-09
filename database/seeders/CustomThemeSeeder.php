<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CustomThemeSeeder extends Seeder
{
    /**
     * Existing files in storage mapped to their usage
     */
    protected $existingFiles = [
        // Theme 1 - Image Carousel (4 images)
        1 => [
            'theme/1/7d5lOxaimtDL9LYHLO7gxqCrB2EvcdAEKzro20HW.webp',
            'theme/1/DwsIkBcBzoaVJEmase9RqferEPNp0xXv7U0Ghlmv.webp',
            'theme/1/Ohi9GMDgiksPpbMxN9rYQ6NAPE7n5uOyFlv5oK2n.webp',
            'theme/1/tky4aZDtcv3fhToelYSRpmT1r9cBRvy6iV8XxnuH.webp',
        ],
        
        // Theme 5 - Top Collections (6 images)
        5 => [
            'theme/5/0kPpA9zwm5mx40LrzqCp3x4WYCaqhOmNv3RjmNXM.webp',
            'theme/5/4uvEqtHK25sDzcKNZwYTu42MViyQ8k9IZ6tIcSaO.webp',
            'theme/5/BsqJGuqt2bx98HPpEMIKyF9AHZf4O1ybfTnUNaBo.webp',
            'theme/5/ii5PJHKFEGxgiRwX2H2NhpgsxIsK98Itbm3g39MH.webp',
            'theme/5/rSMoIXu0p399XUuesg9lo8eb1qu5skft1dWNr4Dt.webp',
            'theme/5/tgWQaoqfl20RP8mvHnKuwPwh6I3OAvDq3NClueln.webp',
        ],
        
        // Theme 6 - Bold Collections (1 image)
        6 => [
            'theme/6/qLm2gayYG9f7XVmRwzHBEr0dm6GWhLoQ8yiDxlpH.webp',
        ],
        
        // Theme 8 - Game Section (2 images)
        8 => [
            'theme/8/CH1YJzrjSdF7N2oAKStpiLTAjW6kXFSoVFDZT0XC.webp',
            'theme/8/pFWYUK8sSUfZeodIJ0Uzr7cLpgmtZGNJhPDyMGJJ.webp',
        ],
        
        // Theme 10 - Bold Collections reversed (1 image)
        10 => [
            'theme/10/rKlUujjwV4ahto6SjCyE989RGAwQXNfyJ8aPRosQ.webp',
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update database with existing image paths from storage
        $this->updateThemeImages();
        
        $this->command->info('Theme images updated to use existing files in storage!');
    }

    /**
     * Update theme customization translations with existing image paths
     */
    protected function updateThemeImages(): void
    {
        // Theme 1 - Image Carousel
        DB::table('theme_customization_translations')
            ->where('theme_customization_id', 1)
            ->where('locale', 'en')
            ->update([
                'options' => json_encode([
                    'images' => [
                        [
                            'title' => 'Get Ready For New Collection',
                            'link' => '',
                            'image' => 'storage/' . $this->existingFiles[1][0],
                        ],
                        [
                            'title' => 'Get Ready For New Collection',
                            'link' => '',
                            'image' => 'storage/' . $this->existingFiles[1][1],
                        ],
                        [
                            'title' => 'Get Ready For New Collection',
                            'link' => '',
                            'image' => 'storage/' . $this->existingFiles[1][2],
                        ],
                        [
                            'title' => 'Get Ready For New Collection',
                            'link' => '',
                            'image' => 'storage/' . $this->existingFiles[1][3],
                        ],
                    ],
                ])
            ]);

        // Theme 5 - Top Collections - Update HTML with existing image paths
        $currentOptions = DB::table('theme_customization_translations')
            ->where('theme_customization_id', 5)
            ->where('locale', 'en')
            ->value('options');
        
        if ($currentOptions) {
            $options = json_decode($currentOptions, true);
            $html = $options['html'];
            
            // Replace all image paths at once using the existing files
            foreach ($this->existingFiles[5] as $index => $file) {
                $html = preg_replace('/data-src="storage\/theme\/5\/[a-zA-Z0-9]+\.webp"/', 'data-src="storage/' . $file . '"', $html, 1);
            }
            
            $options['html'] = $html;
            
            DB::table('theme_customization_translations')
                ->where('theme_customization_id', 5)
                ->where('locale', 'en')
                ->update(['options' => json_encode($options)]);
        }

        // Theme 6 - Bold Collections
        $currentOptions = DB::table('theme_customization_translations')
            ->where('theme_customization_id', 6)
            ->where('locale', 'en')
            ->value('options');
        
        if ($currentOptions) {
            $options = json_decode($currentOptions, true);
            $html = $options['html'];
            $html = preg_replace('/data-src="storage\/theme\/6\/[a-zA-Z0-9]+\.webp"/', 'data-src="storage/' . $this->existingFiles[6][0] . '"', $html);
            $options['html'] = $html;
            
            DB::table('theme_customization_translations')
                ->where('theme_customization_id', 6)
                ->where('locale', 'en')
                ->update(['options' => json_encode($options)]);
        }

        // Theme 8 - Game Section
        $currentOptions = DB::table('theme_customization_translations')
            ->where('theme_customization_id', 8)
            ->where('locale', 'en')
            ->value('options');
        
        if ($currentOptions) {
            $options = json_decode($currentOptions, true);
            $html = $options['html'];
            $html = preg_replace('/data-src="storage\/theme\/8\/[a-zA-Z0-9]+\.webp"/', 'data-src="storage/' . $this->existingFiles[8][0] . '"', $html, 1);
            $html = preg_replace('/data-src="storage\/theme\/8\/[a-zA-Z0-9]+\.webp"/', 'data-src="storage/' . $this->existingFiles[8][1] . '"', $html, 1);
            $options['html'] = $html;
            
            DB::table('theme_customization_translations')
                ->where('theme_customization_id', 8)
                ->where('locale', 'en')
                ->update(['options' => json_encode($options)]);
        }

        // Theme 10 - Bold Collections (reversed)
        $currentOptions = DB::table('theme_customization_translations')
            ->where('theme_customization_id', 10)
            ->where('locale', 'en')
            ->value('options');
        
        if ($currentOptions) {
            $options = json_decode($currentOptions, true);
            $html = $options['html'];
            $html = preg_replace('/data-src="storage\/theme\/10\/[a-zA-Z0-9]+\.webp"/', 'data-src="storage/' . $this->existingFiles[10][0] . '"', $html);
            $options['html'] = $html;
            
            DB::table('theme_customization_translations')
                ->where('theme_customization_id', 10)
                ->where('locale', 'en')
                ->update(['options' => json_encode($options)]);
        }
    }
}
