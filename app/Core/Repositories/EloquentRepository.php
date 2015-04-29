<?php namespace ThreeAccents\Core\Repositories;

abstract class EloquentRepository
{
    /**
     * @var null
     */
    protected $model;

    /**
     * @param null $model
     */
    public function __construct($model = null)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * @param $count
     * @return mixed
     */
    public function getAllPaginated($count)
    {
        return $this->model->paginate($count);
    }

    /**
     * @return mixed
     */
    public function getLatest()
    {
        return $this->model->latest()->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug)
    {
        return $this->model->where('slug', '=', $slug)->first();
    }

    /**
     * @param Model $model
     * @return mixed
     */
    public function save(Model $model)
    {
        if ($model->getDirty()) {
            return $model->save();
        } else {
            return $model->touch();
        }
    }

    /**
     * @param Model $model
     * @return mixed
     */
    public function delete(Model $model)
    {
        return $model->delete();
    }

    /**
     * @param Model $model
     */
    public function update(Model $model)
    {
        $this->model->update();
    }

    public function getFromIds($ids)
    {
        return $this->model->whereIn('id', $ids)->get();
    }

}