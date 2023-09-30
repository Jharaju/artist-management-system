<?php


namespace App\Modules\Framework;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


abstract class RepositoryImplementation
{
    protected $entity_name = "";

    protected $log;

    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    /**
     * Gets model for operation.
     *
     * @return mixed
     */
    

    public function getData($query){
        return DB::select($query);
    }

    
    /**
     * Create a new data.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create($query)
    {
        DB::beginTransaction();
        try {
            // $entity = $this->getModel()->create($data);
            $entity = DB::insert($query);
            // DB::raw();
            DB::commit();
            return $entity;
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            $this->log->error($this->entity_name . ' create : ' . $e->getMessage());
            return false;
        }

    }

    /**
     * Updates the row with the provided data and id
     *
     * @param array $data
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($query)
    {
        DB::beginTransaction();
        try {
            // $entity = $this->findById($id);
            // $entity->update($data);
            $entity = DB::update($query);
            DB::commit();
            return $entity;
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            $this->log->error($this->entity_name . ' update : ' . $e->getMessage());
            return false;
        }

    }

    /**
     * Deletes a row with the provided id.
     *
     * @param $id
     * @return bool
     */
    public function delete($query)
    {
        $object = DB::delete($query);
        if($object){
            return true;
        }    
    
        return false;
    }


    /**
     * Hard Deletes a row with the provided id.
     *
     * @param $id
     * @return bool
     */

    

}
