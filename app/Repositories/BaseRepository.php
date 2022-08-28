<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    /**
     * Construct repository
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Get model
     */
    abstract public function getModel();

    /**
     * Set model
     */


    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function builder()
    {
        return $this->model->newQuery();
    }

    /**
     * Get all of records
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Find a record with its id
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->model->find($id);
        return $result;
    }
    

    /**
     * Create a new model
     *
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    /**
     * Update a record
     *
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
    }

    /**
     * Delete a record
     *
     * @param $id
     * @return boolean
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();
            return true;
        }
        return false;
    }
}
