<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FixThemeImagesSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Fixing theme customization images...');

        // Update image carousel options with proper image paths (using actual hashed filenames)
        DB::table('theme_customization_translations')
            ->where('theme_customization_id', 1)
            ->update([
                'options' => json_encode([
                    'images' => [
                        [
                            'title' => 'Get Ready For New Collection',
                            'link'  => '',
                            'image' => 'storage/theme/1/PDN8o9x39zMMJu9xpR5qeC6NesqNQEZgSpIHjHEM.webp',
                        ],
                        [
                            'title' => 'Get Ready For New Collection',
                            'link'  => '',
                            'image' => 'storage/theme/1/8F4azpeAqHKkzAjjNgdj7mPtKP5pCkfW5cP4iBf5.webp',
                        ],
                        [
                            'title' => 'Get Ready For New Collection',
                            'link'  => '',
                            'image' => 'storage/theme/1/pviTJYtrSes74ehTHIM4mCW20ocNStaO6YloThYD.webp',
                        ],
                        [
                            'title' => 'Get Ready For New Collection',
                            'link'  => '',
                            'image' => 'storage/theme/1/nJAhPgkpqiylQ09OAMEiCxq9D6Euf8bmSBRmXwVJ.webp',
                        ],
                    ],
                ])
            ]);

        // Update static content with images using actual hashed filenames from their respective theme directories
        $staticContents = [
            5 => [ // Top collections - using theme/5 directory
                'html' => '<div class="top-collection-container"><div class="top-collection-header"><h2>Top Collections</h2></div><div class="top-collection-grid"><div class="top-collection-card"><img src="storage/theme/5/Bc7pNX7rNOGGCNtu7kwkA1EfBfmDFKSbv2ELkaFf.webp" alt="Collection 1"/></div><div class="top-collection-card"><img src="storage/theme/5/42nEaIOLJPcLdk8hxDmyw7s8zaGuN9a2cl6OYWWy.webp" alt="Collection 2"/></div><div class="top-collection-card"><img src="storage/theme/5/3OPjXL3Xx91r50MDEs9RthdYhwimLBS6YhUjUBqj.webp" alt="Collection 3"/></div></div></div>',
                'css' => '.top-collection-container{padding:40px 0}.top-collection-header h2{font-size:32px;margin-bottom:30px}.top-collection-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}.top-collection-card img{width:100%;height:auto;border-radius:8px}@media(max-width:768px){.top-collection-grid{grid-template-columns:1fr}}',
            ],
            6 => [ // Bold collections - using theme/6 directory
                'html' => '<div class="bold-collection-container"><div class="bold-collection-grid"><div class="bold-collection-card"><img src="storage/theme/6/6I9c8tLLOKyRBeAfq1SMRh0TSkPxOyoMCvLCVxLq.webp" alt="Bold Collection 1"/></div><div class="bold-collection-card"><img src="storage/theme/6/CSdDEhhy5WLrAdKL2nXe9JYMyKupPdLkyHz03UAU.webp" alt="Bold Collection 2"/></div></div></div>',
                'css' => '.bold-collection-container{padding:40px 0}.bold-collection-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:20px}.bold-collection-card img{width:100%;height:auto;border-radius:8px}@media(max-width:768px){.bold-collection-grid{grid-template-columns:1fr}}',
            ],
            8 => [ // Game container - using theme/8 directory
                'html' => '<div class="game-container"><img src="storage/theme/8/doN3QC9Q8cAoYedZqjtLZ36Ky5fESiJlbKtteUFb.webp" alt="Game" style="width:100%;height:auto;border-radius:8px"/></div>',
                'css' => '.game-container{padding:40px 0}',
            ],
        ];

        foreach ($staticContents as $id => $content) {
            DB::table('theme_customization_translations')
                ->where('theme_customization_id', $id)
                ->update([
                    'options' => json_encode($content)
                ]);
        }

        $this->command->info('Theme images fixed successfully!');
    }
}
