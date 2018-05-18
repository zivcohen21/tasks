<?php
/**
 * Created by PhpStorm.
 * User: ZIV
 * Date: 17/05/2018
 * Time: 12:03
 */

class TaskTableSeeder extends Seeder
{
    public function run()
    {

        Eloquent::unguard();

        DB::table('tasks')->delete();

        Task::create(array(
            'title' => 'first task',
            'isDone' => false
        ));
    }
}
