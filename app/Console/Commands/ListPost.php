<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class ListPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

   //get the table name as argument and optional argument as limit of record by default it will return only 5 records
    protected $signature = 'Data:list {table : Name of the table} {--L | limit=5 : Limit of the record to return} '; 

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List the table data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $username = $this->ask('Enter username');

        $password = $this->secret('Enter password');

        // here check the username and password to make sure legitimacy of user from Users. 

        if($username!='vivek' && $password!='123456'){ //just hardcoding, recommended to connect user table and check

            $this->error('Invalid credentials');

            exit();
        }

        $confirm = $this->confirm('Are you sure to list the data ?');

        if($confirm===TRUE){

            $table = $this->argument('table');

            $limit = $this->option('limit');

            $columns = DB::getSchemaBuilder()->getColumnListing($this->argument('table'));

            $data = DB::table($table)->limit($limit)->get();

            $formattedData = json_decode(json_encode($data),TRUE);

            $this->table($columns,$formattedData);

       }

    }
}
