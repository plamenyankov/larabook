<?php

class DatabaseSeeder extends Seeder {

 protected $seeder = [
'UsersTableSeeder',
'StatusesTableSeeder'
];
    protected $tables = [
        'users',
        'statuses'
    ];
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
        $this->cleanDatabase();
    foreach($this->seeder as $table){
        $this->call($table);
    }

	}
    public function cleanDatabase(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach($this->tables as $table){
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
