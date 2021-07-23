<?php

use App\models\history;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class up_history_sos_json extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('history')->delete();
        $json = File::get('database/json/history_sos.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            history::create(array(
            'type_document' => $obj->type_document,
            'document' => $obj->document,
            'url' => $obj->url

        ));
        }
    }
}
