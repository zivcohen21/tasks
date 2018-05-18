<?php
/**
 * Created by PhpStorm.
 * User: ZIV
 * Date: 17/05/2018
 * Time: 12:03
 */

class TodoTableSeeder extends Seeder
{
    public function run()
    {

        Eloquent::unguard();

        DB::table('todo')->delete();

        Todo::create(array(
            'title' => 'first task',
            'isCompleted' => false
        ));
    }
}

