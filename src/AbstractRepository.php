<?php 

namespace DevxPackage;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{

    abstract function crudName(): string;
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->orderBy('id', 'DESC')->get();
    } 

    public function pagination($offset, $limit)
    {
        // return $this->model->with($this->model->model_relations())->withCount($this->model->model_relations_counts())->unArchive()->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT); 
        return $this->model->with($this->model->model_relations())->withCount($this->model->model_relations_counts())->unArchive()->orderBy('id', 'DESC')->offset($offset)->limit(PAGINATION_COUNT)->get();
    }

    public function findOne($id)
    {
        return $this->model->find($id)->load($this->model->model_relations());
    }

    public function store($request)
    {
        $request = $this->handle_request($request);
        return $this->model->create($request);
    }

    public function update($request, $id)
    {
        $request = $this->handle_request($request);
        return $this->model->where("id", $id)->update($request);
    }

    public function activate($id)
    {
        $record = $this->model->find($id);
        $record->is_activate = $record->is_activate == 1 ? 0 : 1;
        return $record->save();
    }

    public function removeRecord($id)
    {
        $record = $this->model->find($id);
        return $record->delete(); 
    }

    public function delete($id)
    {
        return $this->model->where("id", $id)->update(['deleted_at' => date("Y-m-d h:m:s")]);
    }

    public function search($request)
    {
        $query = $request->get('q');
        $records = [];
        
        if( !is_null($query) ){
            $searchButton = 0;
            $records = $this->model->with($this->model->model_relations())->withCount($this->model->model_relations_counts())->unArchive()->modelSearch($query)->get();
        }else{
            $searchButton = 1;
            $records = $this->model->latest()->with($this->model->model_relations())->withCount($this->model->model_relations_counts())->unArchive()->limit(PAGINATION_COUNT)->get(); 
        }
        
        if($records && count($records) > 0){
            $records[0]->searchButton = $searchButton;
        }
        return $records;
    }

    public function searchByColumn($request)
    {
        $query = $request->get('q');
        $record = $request->get('record');
        $records = [];
        
        if( !is_null($query) ){
            $records = $this->model->with($this->model->model_relations())->withCount($this->model->model_relations_counts())->where($record, '=', $query)->unArchive()->limit(PAGINATION_COUNT)->get();
        }
        return $records;
    }

    public function archives($offset, $limit)
    {
        return $this->model->latest()->with($this->model->model_relations())->withCount($this->model->model_relations_counts())->archive()->offset($offset)->limit(PAGINATION_COUNT)->get();
    }

    public function back($id)
    {
        return $this->model->where("id", $id)->update(['deleted_at' => NULL]);
    }

    public function archivesSearch($request)
    {
        $query = $request->get('q');
        $records = [];
        
        if( !is_null($query) ){
            $searchButton = 0;
            $records = $this->model->with($this->model->model_relations())->withCount($this->model->model_relations_counts())->archive()->scopeModelSearch($query)->get();
        }else{
            $searchButton = 1;
            $records = $this->model->latest()->with($this->model->model_relations())->withCount($this->model->model_relations_counts())->archive()->limit(PAGINATION_COUNT)->get();
        }
        
        if($records && count($records) > 0){
            $records[0]->searchButton = $searchButton;
        }
        return $records;
    }

    public function archivesSearchByColumn($request)
    {
        $query = $request->get('q');
        $record = $request->get('record');
        $records = [];
        
        if( !is_null($query) ){
            $records = $this->model->with($this->model->model_relations())->withCount($this->model->model_relations_counts())->where($record, '=', $query)->archive()->limit(PAGINATION_COUNT)->get();
        }
        return $records;
    }

    public function handle_request($request)
    {
        $request->password ? $request->merge(['password' => bcrypt($request->password)]) : "";
        if (!$request->hasFile('file') == null) {
            $file = uploadIamge($request->file('file'), $this->crudName()); // function on helper file to upload file
            $request->merge(['img' => $file]);
        }
        if (!$request->hasFile('files') == null) {
            $files = uploadIamges($request->file('files'), $this->crudName()); // function on helper file to upload file
            $request->merge(['imgs' => $files]);
        }
        $request = array_filter(array_intersect_key($request->all(), $this->model->fildes()));
        return $request;
    }

}
