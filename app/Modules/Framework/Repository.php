<?php
/**
 * Created by PhpStorm.
 * User: Abhishek Thapa
 * Date: 5/2/2017
 * Time: 12:01 PM
 */

namespace App\Modules\Framework;

interface Repository
{
    
    public function getData($query);

    /**
     * Create a new data.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create($query);

    /**
     * Update old data
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update($query);

    /**
     * Delete a specified data by given data id.
     *
     * @param int $id
     *
     * @return bool
     */
    public function delete($query);



}
