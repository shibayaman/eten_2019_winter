<?php

use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //field (IT or Web or グラフィック)

        //IT
        DB::table('classes')->insert([
            'id' => 'IE1A',
            'subject' => '高度情報処理研究学科IT開発エキスパートコース',
            'field' => 'IT',
            'graduation_year' => '23',
            'grade' => '1',
        ]);

        DB::table('classes')->insert([
            'id' => 'IE1B',
            'subject' => '高度情報処理研究学科IT開発エキスパートコース',
            'field' => 'IT',
            'graduation_year' => '23',
            'grade' => '1',
        ]);

        DB::table('classes')->insert([
            'id' => 'IE2A',
            'subject' => '高度情報処理研究学科IT開発エキスパートコースシステムエンジニア専攻',
            'field' => 'IT',
            'graduation_year' => '22',
            'grade' => '2',
        ]);

        DB::table('classes')->insert([
            'id' => 'IE3A',
            'subject' => '高度情報処理研究学科IT開発エキスパートコースシステムエンジニア専攻',
            'field' => 'IT',
            'graduation_year' => '21',
            'grade' => '3',
        ]);

        DB::table('classes')->insert([
            'id' => 'IE4A',
            'subject' => '高度情報処理研究学科IT開発エキスパートコースシステムエンジニア専攻',
            'field' => 'IT',
            'graduation_year' => '20',
            'grade' => '4',
        ]);

        DB::table('classes')->insert([
            'id' => 'IN2A',
            'subject' => '高度情報処理研究学科IT開発エキスパートコースネットワークエンジニア専攻',
            'field' => 'IT',
            'graduation_year' => '22',
            'grade' => '2',
        ]);

        DB::table('classes')->insert([
            'id' => 'IN3A',
            'subject' => '高度情報処理研究学科IT開発エキスパートコースネットワークエンジニア専攻',
            'field' => 'IT',
            'graduation_year' => '21',
            'grade' => '3',
        ]);

        DB::table('classes')->insert([
            'id' => 'IN4A',
            'subject' => '高度情報処理研究学科IT開発エキスパートコースネットワークエンジニア専攻',
            'field' => 'IT',
            'graduation_year' => '20',
            'grade' => '4',
        ]);

        DB::table('classes')->insert([
            'id' => 'NK2A',
            'subject' => 'マルチメディア研究学科IT開発研究コースネットワークエンジニア専攻',
            'field' => 'IT',
            'graduation_year' => '21',
            'grade' => '2',
        ]);

        DB::table('classes')->insert([
            'id' => 'NK3A',
            'subject' => 'マルチメディア研究学科IT開発研究コースネットワークエンジニア専攻',
            'field' => 'IT',
            'graduation_year' => '20',
            'grade' => '3',
        ]);

        DB::table('classes')->insert([
            'id' => 'SK1A',
            'subject' => 'マルチメディア研究学科IT開発研究コース',
            'field' => 'IT',
            'graduation_year' => '22',
            'grade' => '1',
        ]);

        DB::table('classes')->insert([
            'id' => 'SK2A',
            'subject' => 'マルチメディア研究学科IT開発研究コースシステムエンジニア専攻',
            'field' => 'IT',
            'graduation_year' => '21',
            'grade' => '2',
        ]);

        DB::table('classes')->insert([
            'id' => 'SK3A',
            'subject' => 'マルチメディア研究学科IT開発研究コースシステムエンジニア専攻',
            'field' => 'IT',
            'graduation_year' => '20',
            'grade' => '3',
        ]);

        DB::table('classes')->insert([
            'id' => 'SE1A',
            'subject' => 'マルチメディア研究学科システムエンジニアコースシステムエンジニア専攻',
            'field' => 'IT',
            'graduation_year' => '21',
            'grade' => '1',
        ]);

        DB::table('classes')->insert([
            'id' => 'SE2A',
            'subject' => 'マルチメディア研究学科システムエンジニアコースシステムエンジニア専攻',
            'field' => 'IT',
            'graduation_year' => '20',
            'grade' => '2',
        ]);

        //Web
        DB::table('classes')->insert([
            'id' => 'WD1A',
            'subject' => 'マルチメディア研究学科Webデザインコース',
            'field' => 'Web',
            'graduation_year' => '22',
            'grade' => '1',
        ]);

        DB::table('classes')->insert([
            'id' => 'WD2A',
            'subject' => 'マルチメディア研究学科Webデザイナーコース',
            'field' => 'Web',
            'graduation_year' => '21',
            'grade' => '2',
        ]);

        DB::table('classes')->insert([
            'id' => 'WD3A',
            'subject' => 'マルチメディア研究学科Webデザイナーコース',
            'field' => 'Web',
            'graduation_year' => '20',
            'grade' => '3',
        ]);

        DB::table('classes')->insert([
            'id' => 'WE2A',
            'subject' => 'マルチメディア研究学科Webエンジニアコース',
            'field' => 'Web',
            'graduation_year' => '21',
            'grade' => '2',
        ]);

        DB::table('classes')->insert([
            'id' => 'WE3A',
            'subject' => 'マルチメディア研究学科Webエンジニアコース',
            'field' => 'Web',
            'graduation_year' => '20',
            'grade' => '3',
        ]);

        //グラフィック
        DB::table('classes')->insert([
            'id' => 'CD2A',
            'subject' => 'マルチメディア研究学科グラフィックデザインコース',
            'field' => 'グラフィック',
            'graduation_year' => '21',
            'grade' => '2',
        ]);

        DB::table('classes')->insert([
            'id' => 'CD3A',
            'subject' => 'マルチメディア研究学科グラフィックデザインコース',
            'field' => 'グラフィック',
            'graduation_year' => '20',
            'grade' => '3',
        ]);
    }
}
