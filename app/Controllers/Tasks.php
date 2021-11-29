<?php

namespace App\Controllers;

use App\Entities\Task;

class Tasks extends BaseController
{
	private $model;

    public function __construct()
    {
        $this->model = new \App\Models\TaskModel;
    }

    public function index()
    {

        $data = $this->model->findAll();

        return view("Tasks/index", ['tasks' => $data]);
    }

    public function show($id)
    {
        $task = $this->model->find($id);

        $task = $this->getServiceOr404($id);

        // if ($task === null) {

        //     throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("No service with ID $id was found");

        //     // throw new \CodeIgniterExceptions\PageNotFoundException("No service with ID $id was found"); This did not work for me
            
        // }

        return view('Tasks/show', [
            'task' => $task
        ]);
    }

    public function new ()
    {

        $task = new Task;

        return view ('Tasks/new', [
            'task' => $task
        ]);
    }

    public function create()
    {
        $task = new Task($this->request->getPost());

        if ($this->model->insert($task)) {
            
            return redirect()->to("/tasks/show/{$this->model->insertID}")
                             ->with('info', 'Service Created Successfully');

        } else {

            return redirect()->back()
                             ->with('errors', $this->model->errors())
                             ->with('warning', 'Invalid Data Provided')
                             ->withInput();
 
        }
    }

    public function edit($id)
    {
        $task = $this->getServiceOr404($id);

        return view ('Tasks/edit', [
            'task' => $task
        ]);
    }

    public function update($id)
    {
        
        $task = $this->getServiceOr404($id);

        $task->fill($this->request->getPost());

        if (! $task->hasChanged()) {
            return  redirect()->back()
                              ->with('warning', 'Nothing to Update')
                              ->withInput();
        }

        if ($this->model->save($task)) {
        
        return redirect()->to("/tasks/show/$id")
                         ->with('info', 'Service updated sucessfully');

        } else {

            return redirect()->back()
                             ->with('errors', $this->model->errors())
                             ->with('warning', 'Invalid data')
                             ->withInput();

        }
    }

    public function delete($id)
    {
        $task = $this->getServiceOr404($id);

        if ($this->request->getMethod() === 'post'){

            $this->model->delete($id);

            return redirect()->to('/tasks')
                             ->with('info', 'Service deleted successfully');
        }

        return view ('Tasks/delete',[
            'task' => $task
        ]);
    }

    private function getServiceOr404($id)
    {
        $task = $this->model->find($id);

        if ($task === null) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("No service with ID $id was found");

        }

        return $task;
    }
}