<?php

class TodoController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        try{
            $statusCode = 200;
            $response = [
                'todo'  => []
            ];

            $tasks = Todo::all();

            foreach($tasks as $task){

                $response['todo'][] = [
                    'id' => $task->id,
                    'title' => $task->title,
                    'isCompleted' => $task->isCompleted
                ];
            }


        } catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        try{
            $statusCode = 200;
            error_log("hello");


            $todo = new Todo;
            $todo->title = Input::get('todo.title');
            $todo->isCompleted = Input::get('todo.isCompleted');
            $todo->save();

        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return $statusCode;
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $todo = Todo::find($id);
        $todo->title = Input::get('todo.title');
        $todo->isCompleted = Input::get('todo.isCompleted');
        $todo->save();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $todo = Todo::find($id);
        $todo->delete();
	}


}
